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
  selector: 'app-invite-candidate',
  templateUrl: './invite-candidate.component.html',
  styleUrls: ['./invite-candidate.component.css']
})
export class InviteCandidateComponent implements OnInit {

  inviteEntity;
  submitted;
  btn_disable;
  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
    private InvitecandidateService: InvitecandidateService) { }

  ngOnInit() {
  
    this.inviteEntity = {};
  }

  
 /*############# FORM SUBMIT START ################ */
 


inviteCandidate(inviteCandidateForm) {
  debugger
 
  if (inviteCandidateForm.valid) {
   
   //let uid = this.globals.authData.UserId;
    
   this.InvitecandidateService.inviteCandidate(this.inviteEntity)
   .then((data) => {
    this.btn_disable = false;
    this.submitted = false;

    inviteCandidateForm.form.markAsPristine();

    swal({
      position: 'top-end',
      type: 'success',
      title: 'candidate invited successfully!',
      showConfirmButton: false,
      timer: 5000
    })
    window.location.reload(); 
   },
   (error) => {
             
    this.btn_disable = false;
    this.submitted = false;
  });

  }
  else{
   
  }


}
}
