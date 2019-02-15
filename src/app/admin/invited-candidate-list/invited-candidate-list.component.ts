import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { InvitecandidateService} from '../services/invitecandidate.service';
declare var $: any;
declare function myInput(): any;
declare var $, swal: any;

@Component({
  selector: 'app-invited-candidate-list',
  templateUrl: './invited-candidate-list.component.html',
  styleUrls: ['./invited-candidate-list.component.css']
})
export class InvitedCandidateListComponent implements OnInit {

  invitedCandidateList;
  EmailId;
    
  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
    private InvitecandidateService: InvitecandidateService) { }

  ngOnInit() {

    this.invitedCandidateList = [];
   
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
    this.InvitecandidateService.invitedCandidateList()
    .then((data) => 
    {
      this.invitedCandidateList = data;
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
            "sLengthMenu": "_MENU_ Invited Candidate List",
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



      /* #########  REVOKE CANDIDATE ########## */
      revokeCandidate(email)
      {
              debugger
              swal({
                title: 'Are you sure?',
                text: "You want to revoke this invitation?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, revoke it!'
              })
        
            var revoke = { 'UserId': this.globals.authData.UserId,'Email': email };
            this.globals.isLoading = true;
            this.InvitecandidateService.revokeCandidate(revoke)
              .then((data) => {
                this.globals.isLoading = false;
             ///   let index = this.inviteEntity.indexOf(inviteEntity);
             //   this.userList[index].StatusId = '0';
  
                swal({
                  position: 'top-end',
                  type: 'success',
                  title: 'Revoke successfully!',
                  showConfirmButton: false,
                  timer: 1500
                })
              },
                (error) => {
                  this.globals.isLoading = false;
                  if (error.text) {
                    swal({
                      position: 'top-end',
                      type: 'success',
                      title: "You can't delete this record because of their dependency!",
                      showConfirmButton: false,
                      timer: 1500
                    })
                  }
                });
           
        }
         /* #########  REVOKE CANDIDATE  END ########## */
    


        /* ######### RE INVITE CANDIDATE START ########## */
        reInviteCandidate(email)
         {
          alert(email);

          debugger
              swal({
                title: 'Are you sure?',
                text: "You want to reinvite this Candidate?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ReInvite'
              })

            var reinvite = { 'UserId': this.globals.authData.UserId,'Email': email };
            this.globals.isLoading = true;

            /* #########  CALL METHOD IN SERVICE ########## */
            this.InvitecandidateService.reInviteCandidate(reinvite)
              .then((data) => {
                this.globals.isLoading = false;
        
  
                swal({
                  position: 'top-end',
                  type: 'success',
                  title: 'Candidate ReInvited successfully!',
                  showConfirmButton: false,
                  timer: 1500
                })
              },
              (error) => {
                this.globals.isLoading = false;
                if (error.text) {
                  swal({
                    position: 'top-end',
                    type: 'success',
                    title: "You can't delete this record because of their dependency!",
                    showConfirmButton: false,
                    timer: 1500
                  })
                }
              });
              /* #########  CALL END ########## */

         }

          /* ######### RE INVITE CANDIDATE END ########## */
      
  }



