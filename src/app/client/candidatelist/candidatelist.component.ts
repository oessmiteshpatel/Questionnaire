import {  Component, OnInit, Inject,ViewChild,ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CandidateuserService } from '../services/candidateuser.service';
declare var $,unescape,newWin,html2pdf: any;
declare var angular: any;
import { SampleModule } from 'angular-pdf-generator';
import * as jsPDF from 'jspdf';
import * as html2canvas from 'html2canvas';


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
  candidateData;

  @ViewChild('content')content:ElementRef;

  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
		private CandidateuserService: CandidateuserService) { }

 
    ngOnInit()
    {

      setTimeout(function(){
        if ($("body").height() < $(window).height()) {  
          $('footer').addClass('footer_fixed');     
      }      
      else{  
          $('footer').removeClass('footer_fixed');    
      }
      },100);
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
      this.msgflag = false;
    
    	});	
     
    }


  	deleteCompany(CandidateId)
	{ 
    this.CandidateuserService.getAllDefaultData()
    .then((data) => {
    
      this.questionList = data['question'];
    
    
    },
    (error) => {
      //alert('error');
      
    });
    this.CandidateuserService.getById(CandidateId)
    .then((data) => {
      this.candidateData = data['Users'];
      this.questionList = data['QuestionAnswer'];
     
      $('#Delete_Modal').modal('show');
      	
    },
    (error) => {
      alert('error');
        
    });
  

						
	} 

  viewCandidate(CandidateId)
	{ 
    debugger
			this.CandidateuserService.getById(CandidateId)
				.then((data) => {
          this.candidateData = data['Users'];
					this.questionList = data['QuestionAnswer'];
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
  
  download(){
    let doc = new jsPDF();
    let specialElementHandlers ={
        '#editor':function(element,renderer){
          return true;
        }
    };
    let content=this.content.nativeElement;
  
    doc.fromHTML(content.innerHTML,15,15,{
      'width':190,
      'elementHandlers':specialElementHandlers
    });
    doc.save('Candidate.pdf');   
  }

 public downloadPDF(CandidateId) 
  {
debugger
let doc = new jsPDF();
let specialElementHandlers ={
    '#editor':function(element,renderer){
      return true;
    }
};
let content=this.content.nativeElement;

doc.fromHTML(content.innerHTML,15,15,{
  'width':190,
  'elementHandlers':specialElementHandlers
});
doc.save('Candidate.pdf');  

}
  


//   download() 
//   {
// debugger
    
//     var element = document.getElementById('PdfDiv').innerHTML;
//     var doc = new jsPDF();
//    // html2pdf(element);
//     doc.text(20, 30,element);
//    // doc.addPage();
//     // Save the PDF
//  
  
 

}
