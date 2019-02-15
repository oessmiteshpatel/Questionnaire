import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionService } from '../services/question.service';
declare var $, unescape: any;
import { debug } from 'util';
declare var $, swal: any;
@Component({
	selector: 'app-question-list',
	providers: [QuestionService],
	templateUrl: './question-list.component.html',
	styleUrls: ['./question-list.component.css']
})
export class QuestionListComponent implements OnInit {
	QuestionEntity;
	constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private QuestionService: QuestionService) { }

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
		this.globals.isLoading = true;
		this.QuestionService.getAllQuestion()
			.then((data) => {
				this.QuestionEntity = data;
				setTimeout(function () {
					var table = $('#dataTables-Questions').DataTable({
						responsive: {
							details: {
								display: $.fn.dataTable.Responsive.display.childRowImmediate,
								type: ''
							}
						},
						scrollCollapse: true,
						"oLanguage": {
							"sLengthMenu": "_MENU_ Questions per Page",
							"sInfo": "Showing _START_ to _END_ of _TOTAL_ Questions",
							"sInfoFiltered": "(filtered from _MAX_ total Questions)"
						},
					});
				}, 500);
				this.globals.isLoading = false;
			},
				(error) => {
					this.globals.isLoading = false;
					// this.msgflag = false;
				});
	}

	deleteQuestion(Question) {
		swal({
			title: 'Are you sure?',
			text: "You want to delete this Question?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})
			.then((result) => {
				if (result.value) {
					this.QuestionService.deleteQuestion(Question.QuestionId)
						.then((data) => {
							let index = this.QuestionEntity.indexOf(Question);
							if (index != -1) {
								this.QuestionEntity.splice(index, 1);
							}
							swal({
								position: 'top-end',
								type: 'success',
								title: 'Question deleted successfully!',
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
