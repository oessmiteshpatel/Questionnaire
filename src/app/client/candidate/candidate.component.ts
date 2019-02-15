import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { CandidateService } from '../services/candidate.service';
import { debug } from 'util';
declare var $, unescape: any;
declare function myInput(): any;
declare var $, swal: any;
declare var $, PerfectScrollbar: any;

@Component({
  selector: 'app-candidate',
  providers: [CandidateService],
  templateUrl: './candidate.component.html',
  styleUrls: ['./candidate.component.css']
})
export class CandidateComponent implements OnInit {
  JobTitleList;
  submitted;
  btn_disable;
  candidateEntity;

  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
    private CandidateService: CandidateService) { }

  ngOnInit() {
    debugger

    if (this.globals.authData.StatusId == 1) {
      this.router.navigate(['/thank-you']);
    }

    var CandidateInfo = { 'CandidateId': this.globals.authData.CandidateId };
    this.candidateEntity = {};
    this.candidateEntity.JobPositionId = '';
    this.candidateEntity.GenderId = '';

    if (this.globals.authData.StatusId == 0) {
      this.CandidateService.insertQuestion(CandidateInfo)
        .then((data) => {
          this.globals.authData.StatusId = 2;
        },
          (error) => {
            this.btn_disable = false;
            this.submitted = false;
          });
    }



    this.CandidateService.getJobTitleList()
      .then((data) => {
        this.JobTitleList = data;
        this.CandidateService.getCandidateInfo(CandidateInfo)
          .then((data) => {
            this.candidateEntity = data;
            console.log(this.candidateEntity);
          },
            (error) => {
              this.btn_disable = false;
              this.submitted = false;
            });
      },
        (error) => {
          this.btn_disable = false;
          this.submitted = false;
        });
  }

  setCandidateInfo(candidateForm) {
    debugger

    this.submitted = true;

    if (candidateForm.valid) {
      this.btn_disable = true;
      //this.globals.isLoading = true;
      this.CandidateService.setCandidateInfo(this.candidateEntity)
        .then((data) => {
          this.btn_disable = false;
          this.submitted = false;
          this.candidateEntity = {};
          candidateForm.form.markAsPristine();
          this.router.navigate(['/questionnaire']);
        },
          (error) => {
            alert('error');
            this.btn_disable = false;
            this.submitted = false;
            this.globals.isLoading = false;
          });
    }
  }

}
