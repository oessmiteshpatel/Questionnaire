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

    if ($("body").height() < $(window).height()) {  
      $('footer').addClass('footer_fixed');     
  }      
  else{  
      $('footer').removeClass('footer_fixed');    
  }
  	this.questionEntity={};
    this.questionEntity.AnswerTypeId='';
      this.ManagequestionService.getAllDefaultData()
      .then((data) => {
        this.queAnsTypeList = data['quetypeans'];
      
      },
      (error) => {
        //alert('error');
        
      });

	 
      let id = this.route.snapshot.paramMap.get('id');
     if(id)
     {	
     //  this.header = 'Edit';
      this.ManagequestionService.getById(id)
        .then((data) => 
        {
          this.questionEntity=data;
        
          
        }, 
        (error) => 
        {
          //alert('error');
          this.btn_disable = false;
          this.submitted = false;
        
        });
     }
     else
     {
         this.questionEntity = {};
         this.questionEntity.QuestionId = 0;
          this.questionEntity.IsActive = '1';
        
     }
  

  }


  addQuestion(questionForm) {
		debugger
			
			let id = this.route.snapshot.paramMap.get('id');
      this.submitted = true;
			if (questionForm.valid) {
				
				this.submitted = false;
				this.ManagequestionService.add(this.questionEntity)
					.then((data) => {

					
						alert('success');
						this.btn_disable = false;
						this.submitted = false;
						this.questionEntity = {};
						questionForm.form.markAsPristine();
						if (id) {
						
						} else {
						
						}						
							this.router.navigate(['/question/list']);
					},
					(error) => {
						//alert('error');
						this.btn_disable = false;
						this.submitted = false;
						
						//this.router.navigate(['/admin/pagenotfound']);
					});
			}
		}
	

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