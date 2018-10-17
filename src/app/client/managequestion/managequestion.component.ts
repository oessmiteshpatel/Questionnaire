import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ManagequestionService } from '../services/managequestion.service';
declare var $: any;
@Component({
  selector: 'app-managequestion',
  providers: [ManagequestionService],
  templateUrl: './managequestion.component.html',
  styleUrls: ['./managequestion.component.css']
})
export class ManagequestionComponent implements OnInit {

  queAnsTypeList;
  questionEntity;
	submitted;
	btn_disable;
	header;
	msgflag;
	message;
  	type;

  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private ManagequestionService: ManagequestionService) { }

  ngOnInit() {

  
  	this.questionEntity={};
    this.questionEntity.AnswerTypeId='';
      this.ManagequestionService.getAllDefaultData()
      .then((data) => {
        this.queAnsTypeList = data['quetypeans'];
      
      },
      (error) => {
        //alert('error');
        
      });
  

  }


  // addQuestion(questionForm) {
	// 	debugger
			
	// 		let id = this.route.snapshot.paramMap.get('id');
		
	// 		if (questionForm.valid) {
				
				
	// 			this.ManagequestionService.add(questionEntity)
	// 				.then((data) => {

					
	// 					alert('success');
	// 					this.btn_disable = false;
	// 					this.submitted = false;
	// 					this.questionEntity = {};
	// 					questionForm.form.markAsPristine();
	// 					if (id) {
						
	// 					} else {
						
	// 					}						
	// 						this.router.navigate(['/thankyou']);
	// 				},
	// 				(error) => {
	// 					//alert('error');
	// 					this.btn_disable = false;
	// 					this.submitted = false;
						
	// 					//this.router.navigate(['/admin/pagenotfound']);
	// 				});
	// 		}
	// 	}
	

  textadd(){
    debugger
    $("#customFields").append('<tr valign="top"><td><input type="text" class="code" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <input type="text" class="code" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp; <a href="javascript:void(0);" class="remCF"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>');
   
      $("#customFields").on('click','.remCF',function(){
          $(this).parent().parent().remove();
      });

  }

  multietextadd(){
    debugger
    $("#customFields").append('<tr valign="top"><td><input type="text" class="code" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <a href="javascript:void(0);" class="remCF"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>');
   
      $("#customFields").on('click','.remCF',function(){
          $(this).parent().parent().remove();
      });

  }

}