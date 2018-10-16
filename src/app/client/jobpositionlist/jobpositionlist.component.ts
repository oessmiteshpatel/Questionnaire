import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { JobpositionService } from '../services/jobposition.service';
declare var $,swal: any;

@Component({
  selector: 'app-jobpositionlist',
  providers: [JobpositionService],
  templateUrl: './jobpositionlist.component.html',
  styleUrls: ['./jobpositionlist.component.css']
})
export class JobpositionlistComponent implements OnInit {
  positionList;
  deleteEntity;
	msgflag;
	message;
  type;
  
  constructor(private http: Http, private router: Router, private route: ActivatedRoute, private JobpositionService: JobpositionService, public globals: Globals) { }


    
  ngOnInit()
  {
		// this.globals.isLoading = true;	
		//this.globals = this.global;
	this.JobpositionService.getAll()
	//.map(res => res.json())
	.then((data) => 
	{
		this.positionList = data;
				setTimeout(function(){
      $('#dataTables-example').dataTable( {
        "oLanguage": {
          "sLengthMenu": "_MENU_ Userrole per Page",
					"sInfo": "Showing _START_ to _END_ of _TOTAL_ Userrole",
					"sInfoFiltered": "(filtered from _MAX_ total Userrole)"
        }
      });
		},100); 
	//	this.globals.isLoading = false;	
	}, 
	(error) => 
	{
		//alert('error');
	//	this.globals.isLoading = false;
		this.router.navigate(['/admin/pagenotfound']);	});	
	  this.msgflag = false;
  }
  
  deleteUserrole(userrole)
	{ 
		this.deleteEntity =  userrole;
		$('#Delete_Modal').modal('show');					
	}
  
  deleteConfirm(userrole)
	{ 
		var del={'Userid':this.globals,'id':userrole.RoleId};
		this.JobpositionService.delete(del)
		.then((data) => 
		{
			let index = this.positionList.indexOf(userrole);
			$('#Delete_Modal').modal('hide');
			if (index != -1) {
				this.positionList.splice(index, 1);
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
			// this.globals.message = 'Data Deleted successfully!';
			// this.globals.type = 'success';
			// this.globals.msgflag = true;
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
				// this.globals.message = "You can't delete this record because of their dependency!";
				// this.globals.type = 'danger';
				// this.globals.msgflag = true;
			}	
		});	
	}
  

}
