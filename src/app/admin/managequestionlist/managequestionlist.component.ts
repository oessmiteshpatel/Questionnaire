import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ManagequestionService } from '../services/managequestion.service';
declare var $,unescape	: any;
import { debug } from 'util';
declare var $,swal: any;
@Component({
  selector: 'app-managequestionlist',
  providers: [ManagequestionService],
  templateUrl: './managequestionlist.component.html',
  styleUrls: ['./managequestionlist.component.css']
})
export class ManagequestionlistComponent implements OnInit {
  questionList;
  deleteEntity;
  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private ManagequestionService: ManagequestionService) { }

  ngOnInit() {
    	setTimeout(function(){
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
		}      
		else{  
				$('footer').removeClass('footer_fixed');    
		}
		},100);
  
            this.ManagequestionService.getAll()

            .then((data) => 
            {
              
              this.questionList = data;
              setTimeout(function(){
              var table = $('#dataTables-example').DataTable( {
                  "oLanguage": {
                    "sLengthMenu": "_MENU_ Question per Page",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Question",
                    "sInfoFiltered": "(filtered from _MAX_ total Question)"
                  },
                });
              
            },500); 

            }, 
            (error) => 
            {
            // this.msgflag = false;
            });	
            

   }


    deleteQuestion(question)
    { 
      this.deleteEntity =  question;
      $('#Delete_Modal').modal('show');					
    }
        
   deleteConfirm(question)
	{ debugger
		this.ManagequestionService.deleteQuestion(question.QuestionId)
		.then((data) => 
		{
			let index = this.questionList.indexOf(question);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.questionList.splice(index, 1);
				//this.router.navigate(['/domain/list']);
				// setTimeout(function(){
				// 	$('#dataTables-example').dataTable( {
				// 		"oLanguage": {
				// 			"sLengthMenu": "_MENU_ Domains per Page",
				// 			"sInfo": "Showing _START_ to _END_ of _TOTAL_ Domains",
				// 			"sInfoFiltered": "(filtered from _MAX_ total Domains)"
				// 		}
				// 	});
				// },3000); 
			}			
			//alert(data);
			
			swal({
				position: 'top-end',
				type: 'success',
				title: 'Data Deleted successfully!',
				showConfirmButton: false,
				timer: 1500
			})
		}, 
		(error) => 
		{
			$('#Delete_Modal').modal('hide');
			if(error.text){
				this.globals.message = "You can't delete this record because of their dependency!";
				this.globals.type = 'danger';
				this.globals.msgflag = true;
			}	
		});	
	}
  




  }
