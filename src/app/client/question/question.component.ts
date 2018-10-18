import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionService } from '../services/question.service';

@Component({
  selector: 'app-question',
  providers: [QuestionService],
  templateUrl: './question.component.html',
  styleUrls: ['./question.component.css']
})
export class QuestionComponent implements OnInit {
  ansEntity;
  submitted;
  btn_disable;
  opendesciption;
  submitted1;
  isDisabled;
  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private QuestionService: QuestionService) { }

  ngOnInit() {
    if ($("body").height() < $(window).height()) {  
      $('footer').addClass('footer_fixed');     
    }      
    else{  
      $('footer').removeClass('footer_fixed');    
    }
    this.ansEntity= {};
      this.ansEntity.IsActive =1;
  }

  addAns(userAnsForm) {
    debugger
			let id = this.route.snapshot.paramMap.get('id');
      if (userAnsForm.valid) {
				this.submitted = true;
				//this.btn_disable = true;
				this.QuestionService.add(this.ansEntity)
					.then((data) => {
						
						alert('success');
						this.btn_disable = false;
						this.submitted = false;
						this.ansEntity = {};
						userAnsForm.form.markAsPristine();	
				
					
					},
					(error) => {
						alert('error');
						this.btn_disable = false;
						this.submitted = false;
					
						//this.router.navigate(['/admin/pagenotfound']);
					});
			}
    }
    


    

    com()
    {
      this.opendesciption=!this.opendesciption;
    
      this.submitted1 = false;
		this.btn_disable = false;
  
    }
    del(){
      this.opendesciption=false;
    }
	

}
