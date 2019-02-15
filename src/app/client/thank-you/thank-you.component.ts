import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionnaireService } from '../services/questionnaire.service';
import { CandidateService } from '../services/candidate.service';
import { debug } from 'util';
declare var $, unescape: any;
declare function myInput(): any;
declare var $, swal: any;
declare var $, PerfectScrollbar: any;

@Component({
  selector: 'app-thank-you',
  providers: [QuestionnaireService],
  templateUrl: './thank-you.component.html',
  styleUrls: ['./thank-you.component.css']
})
export class ThankYouComponent implements OnInit {

  questionEntity;
  candidateEntity;

  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
    private QuestionnaireService: QuestionnaireService, private CandidateService: CandidateService) { }

  ngOnInit() {

    this.questionEntity = [];
    this.candidateEntity = [];

    setTimeout(function () {
      if ($("body").height() < $(window).height()) {
        $('footer').addClass('footer_fixed');
      }
      else {
        $('footer').removeClass('footer_fixed');
      }
    }, 100);
  }

  printQuestionnaire() {
    debugger
    var CandidateInfo = { 'CandidateId': this.globals.authData.CandidateId };

    this.CandidateService.getCandidateInfo(CandidateInfo)
      .then((data) => {
        this.candidateEntity = data;
        this.QuestionnaireService.getQuestion(CandidateInfo)
          .then((data) => {
            this.questionEntity = data;
            setTimeout(function () {
              var innerContents = document.getElementById('printQuestionnaire').innerHTML;
              var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');
              popupWinindow.document.open();
              popupWinindow.document.write(innerContents);
              popupWinindow.document.close();
              popupWinindow.print();
              popupWinindow.close();
            }, 1000);

          },
            (error) => {
            });
      },
        (error) => {
        });


  }

}
