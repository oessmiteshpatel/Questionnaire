import {  Component, OnInit, Inject,ViewChild,ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AuditLogService } from '../services/audit-log.service';

declare var $,swal: any;

@Component({
  selector: 'app-email-log',
  templateUrl: './email-log.component.html',
  styleUrls: ['./email-log.component.css']
})
export class EmailLogComponent implements OnInit {

  emailLogData;

  constructor(private http: Http, public globals: Globals,private elem: ElementRef, private router: Router, private route: ActivatedRoute,
		private AuditLogService: AuditLogService) { }

  ngOnInit() {

    this.emailLogData = [];
    
    setTimeout(function(){
      if ($("body").height() < $(window).height()) {  
        $('footer').addClass('footer_fixed');     
    }      
    else{  
        $('footer').removeClass('footer_fixed');    
    }
    },100);

    this.globals.isLoading = true;

    /* #########  EMAIL LOG DATA START ########## */
    this.AuditLogService.getEmailLog()
    .then((data) => 
    {
      this.emailLogData = data;
      setTimeout(function(){
      var table = $('#dataTables-example').DataTable( {
		  responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
		  scrollCollapse: true,
          "oLanguage": {
            "sLengthMenu": "_MENU_ Email Log",
            "sInfo": "Showing _START_ to _END_ of _TOTAL_ Candidates",
            "sInfoFiltered": "(filtered from _MAX_ total Candidates)"
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
      this.globals.isLoading = false;
    }, 
    (error) => 
    {
    
      this.globals.isLoading = false;
    	});	
     
    }
    /* ######### EMAIL LOG DATA END ########## */
  }


