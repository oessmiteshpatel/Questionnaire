import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CandidateuserService } from '../services/candidateuser.service';

@Component({
  selector: 'app-candidateuser',
  providers: [CandidateuserService],
  templateUrl: './candidateuser.component.html',
  styleUrls: ['./candidateuser.component.css']
})
export class CandidateuserComponent implements OnInit {
  jobpositionList;
  candidateEntity;
  questionList;
  cansEntity;
	submitted;
	btn_disable;
	header;
	msgflag;
	message;
  	type;
	primary;
	second1;
	first1;
  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private CandidateuserService: CandidateuserService) { }

    ngOnInit() {

					this.first1=true;
					this.candidateEntity={};
					this.cansEntity={};
					this.CandidateuserService.getAllDefaultData()
					.then((data) => {
						this.jobpositionList = data['jobpositon'];
						this.questionList = data['question'];
					console.log(this.questionList);

					
					},
					(error) => {
						//alert('error');
						
					});
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
	
	
			 this.header = 'Edit';
			this.CandidateuserService.getById(id)
				.then((data) => {
					// option 
			//		this.candidateEntity = data;
					this.questionList = data;
				//	console.log(this.questionList);
					
				},
				(error) => {
					alert('error');
				
				//	this.router.navigate(['/admin/pagenotfound']);
					this.btn_disable = false;
					this.submitted = false;
				});
				}
				else {
					this.header = 'Add';
					this.candidateEntity = {};
					this.candidateEntity.CandidateId = 0;
					this.candidateEntity.IsActive = '1';

				}
	
		}
	
	
		addUser(candidateForm) {
		debugger
			
			let id = this.route.snapshot.paramMap.get('id');
		
			if (candidateForm.valid) {
				
				//this.btn_disable = true;
				this.CandidateuserService.add({'candidatevalue':this.candidateEntity,'questionvalue':this.questionList})
					.then((data) => {

					
						alert('success');
						this.btn_disable = false;
						this.submitted = false;
						this.candidateEntity = {};
						candidateForm.form.markAsPristine();
						if (id) {
						
						} else {
						
						}						
							this.router.navigate(['/thankyou']);
					},
					(error) => {
						//alert('error');
						this.btn_disable = false;
						this.submitted = false;
						
						//this.router.navigate(['/admin/pagenotfound']);
					});
			}
		}
	
		clearForm(candidateForm) {
			this.candidateEntity = {};
			this.candidateEntity.CandidateId = 0;
			this.candidateEntity.IsActive = '1';
			this.submitted = false;
			candidateForm.form.markAsPristine();
    }

  

    first(candidateForm)
		{
			this.submitted = true;
			if(candidateForm.valid){
			this.primary=true;
			this.submitted = false;
			this.btn_disable = false;
			this.second1=false;
			this.first1=false;	
			}
	
		}
		pre(){
			this.primary=false;
			this.first1=true;
			this.second1=false;
		
		}

		Third(candidateForm)
		{
			this.submitted = true;
			if(candidateForm.valid){
			this.second1=true;
			this.submitted = false;
			this.btn_disable = false;
			this.primary=false;
			this.first1=false;
			}
		}
		pre1(){
			this.primary=true;
			this.second1=false;
			this.first1=false;
			
		}


		

	
	
	}
	

