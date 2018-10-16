import {  Component, OnInit, Inject  } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CandidateuserService } from '../services/candidateuser.service';
//import { setTimeout } from 'timers';
declare var $,unescape,newWin,html2pdf: any;
declare var angular: any;
import { SampleModule } from 'angular-pdf-generator';
import * as jsPDF from 'jspdf';


@Component({
  
  selector: 'app-candidatelist',
  providers: [CandidateuserService],
  templateUrl: './candidatelist.component.html',
  styleUrls: ['./candidatelist.component.css']
})
export class CandidatelistComponent implements OnInit {

  candidateList;
  deleteEntity;
	msgflag;
	message;
  type;

  questionList;
  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private CandidateuserService: CandidateuserService) { }

 
    ngOnInit()
    {

      this.CandidateuserService.getAllDefaultData()
      .then((data) => {
      
        this.questionList = data['question'];
      

      
      },
      (error) => {
        //alert('error');
        
      });


    
     
    this.CandidateuserService.getAll()

    .then((data) => 
    {
      
      this.candidateList = data;
      setTimeout(function(){
      var table = $('#dataTables-example').DataTable( {
          "oLanguage": {
            "sLengthMenu": "_MENU_ Candidate per Page",
            "sInfo": "Showing _START_ to _END_ of _TOTAL_ Candidate",
            "sInfoFiltered": "(filtered from _MAX_ total Candidate)"
          },
      dom: 'lBfrtip',
          buttons: [
                //'pageLength','print','excel'
               ]
        });
        var buttons = new $.fn.dataTable.Buttons(table, {
          buttons: [
              {
              extend: 'excel',
              title: 'Candidate List',
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                  }
                },
                  {
                  extend: 'print',
                  title: 'Candidate List',
                  exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                  }
                },
              ]
            }).container().appendTo($('#buttons'));
          
          $('.buttons-excel').attr('data-original-title', 'Export All Candidates').tooltip();
          $('.buttons-print').attr('data-original-title', 'Print').tooltip();
          
          $('#dataTables-example').dataTable();
          $('#dataTables-example_filter input').addClass('input-sm');
        
        
        $(".user").addClass("selected");
    },500); 

    }, 
    (error) => 
    {
     
      this.router.navigate(['/admin/pagenotfound']);	});	
      this.msgflag = false;
    }



  viewCandidate(CandidateId)
	{ 
    debugger
			this.CandidateuserService.getById(CandidateId)
				.then((data) => {
					this.questionList = data;
          console.log(this.questionList);
         	
      
          setTimeout(function(){
            var innerContents = document.getElementById('printSectionId').innerHTML;
            var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');
            popupWinindow.document.open();
            popupWinindow.document.write(innerContents);
            popupWinindow.document.close();
            popupWinindow.print();
            popupWinindow.close();
          }, 1000);      	
				},
				(error) => {
          alert('error');
          	
				});
			
  }
  


 


  download() {
debugger
    
    var element = document.getElementById('PdfDiv').innerHTML;
    var doc = new jsPDF();
   // html2pdf(element);
    doc.text(20, 30,element);
   // doc.text(20, 30, 'This is client-side Javascript, pumping out a PDF.');
   // doc.addPage();
    //doc.text(20, 20, 'Do you like that?');

    // Save the PDF
    doc.save('Test.pdf');
}
  
 

}
