import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { JobTitleService } from '../services/job-title.service';
declare var $, swal: any;

@Component({
	selector: 'app-job-title',
	providers: [JobTitleService],
	templateUrl: './job-title.component.html',
	styleUrls: ['./job-title.component.css']
})
export class JobTitleComponent implements OnInit {
	JobTitleEntity;
	submitted;
	btn_disable;
	header;

	constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute, private JobTitleService: JobTitleService) { }

	ngOnInit() {
		debugger
		setTimeout(function () {
			if ($("body").height() < $(window).height()) {
				$('footer').addClass('footer_fixed');
			}
			else {
				$('footer').removeClass('footer_fixed');
			}
		}, 100);

		const body = document.querySelector('body');
		var count = jQuery(window).height() - 270;
		body.style.setProperty('--screen-height', count + "px");


		let JobTitleId = this.route.snapshot.paramMap.get('id');
		if (JobTitleId) {
			this.header = 'Edit';
			this.JobTitleService.getJobTitleById(JobTitleId)
				.then((data) => {
					this.JobTitleEntity = data;
				},
					(error) => {
						this.btn_disable = false;
						this.submitted = false;
					});
		}
		else {
			this.header = 'Add';
			this.JobTitleEntity = {};
			this.JobTitleEntity.JobTitleId = 0;
			this.JobTitleEntity.IsActive = '1';
		}
	}

	addTitle(titleForm) {
		debugger
		let JobTitleId = this.route.snapshot.paramMap.get('id');

		if (JobTitleId) {
			this.JobTitleEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.JobTitleEntity.CreatedBy = this.globals.authData.UserId;
			this.JobTitleEntity.UpdatedBy = this.globals.authData.UserId;
			this.JobTitleEntity.JobPositionId = 0;
			this.submitted = true;
		}

		if (titleForm.valid) {
			this.btn_disable = true;
			this.JobTitleService.setJobTitle(this.JobTitleEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.JobTitleEntity = {};
					titleForm.form.markAsPristine();
					if (JobTitleId) {
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Job Title updated successfully!',
							showConfirmButton: false,
							timer: 1500
						})
					} else {

						swal({
							position: 'top-end',
							type: 'success',
							title: 'Job Title added successfully!',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/admin/title/list']);
				},
					(error) => {
						alert('error');
						this.btn_disable = false;
						this.submitted = false;
					});
		}
	}
}
