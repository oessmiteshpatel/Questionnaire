import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { JobTitleService } from '../services/job-title.service';
declare var $, swal: any;

@Component({
	selector: 'app-job-title-list',
	providers: [JobTitleService],
	templateUrl: './job-title-list.component.html',
	styleUrls: ['./job-title-list.component.css']
})
export class JobTitleListComponent implements OnInit {
	JobTitleEntity;
	msgflag;
	message;
	type;

	constructor(private http: Http, private router: Router, private route: ActivatedRoute, private JobTitleService: JobTitleService, public globals: Globals) { }



	ngOnInit() {
		$('body').tooltip({
			selector: '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])',
			trigger: 'hover',
			container: 'body'
		}).on('click mousedown mouseup', '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])', function () {
			$('[data-toggle="tooltip"], [title]:not([data-toggle="popover"])').tooltip('destroy');
		});

		setTimeout(function () {
			if ($("body").height() < $(window).height()) {
				$('footer').addClass('footer_fixed');
			}
			else {
				$('footer').removeClass('footer_fixed');
			}
		}, 100);

		this.JobTitleService.getAllJobTitle()
			.then((data) => {
				this.JobTitleEntity = data;
				setTimeout(function () {
					$('#dataTables-JobTitle').dataTable({
						responsive: {
							details: {
								display: $.fn.dataTable.Responsive.display.childRowImmediate,
								type: ''
							}
						},
						scrollCollapse: true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ Titles per Page",
							"sInfo": "Showing _START_ to _END_ of _TOTAL_ Titles",
							"sInfoFiltered": "(filtered from _MAX_ total Titles)"
						}
					});
				}, 100);
				this.globals.isLoading = false;
			},
				(error) => {
					this.globals.isLoading = false;
				});
		this.msgflag = false;
	}

	deleteJobTitle(JobTitle) {
		swal({
			title: 'Are you sure?',
			text: "You want to delete this Job Title?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
			.then((result) => {
				if (result.value) {
					this.JobTitleService.deleteJobTitle(JobTitle.JobTitleId)
						.then((data) => {
							let index = this.JobTitleEntity.indexOf(JobTitle);
							if (index != -1) {
								this.JobTitleEntity.splice(index, 1);
							}
							swal({
								position: 'top-end',
								type: 'success',
								title: 'Job Title deleted successfully!',
								showConfirmButton: false,
								timer: 1500
							})
						},
							(error) => {
								if (error.text) {
									swal({
										position: 'top-end',
										type: 'success',
										title: "You can't delete this record because of their dependency!",
										showConfirmButton: false,
										timer: 1500
									})
								}
							});
				}
			})
	}
}
