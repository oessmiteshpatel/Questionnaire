import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionnaireService } from '../services/questionnaire.service';
import { debug } from 'util';
declare var $, unescape: any;
declare function myInput(): any;
declare var $, swal: any;
declare var $, PerfectScrollbar: any;

@Component({
  selector: 'app-questionnaire',
  providers: [QuestionnaireService],
  templateUrl: './questionnaire.component.html',
  styleUrls: ['./questionnaire.component.css']
})
export class QuestionnaireComponent implements OnInit {

  questionEntity;
  answer;
  submitted;
  btn_disable;


  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
    private QuestionnaireService: QuestionnaireService) { }

  ngOnInit() {
    debugger

    if (this.globals.authData.StatusId == 1) {
      this.router.navigate(['/thank-you']);
    }

    var item = { 'PlaceholderId': '', 'AnswerText': '' };
    this.answer = [];
    this.answer.push(item);

    var CandidateInfo = { 'CandidateId': this.globals.authData.CandidateId };

    this.QuestionnaireService.getQuestion(CandidateInfo)
      .then((data) => {
        this.questionEntity = data;
        for (let obj of this.questionEntity) {
          let j = this.questionEntity.indexOf(obj);
          let totalAnswer = obj.child.length;
          let count = 0;
          for (let row of obj.child) {
            if (row.AnswerText == "") {
              count = count;
            } else {
              count++;
            }
          }
          if (count == totalAnswer) {
            this.questionEntity[j].IsSubmitted = true;
          } else {
            this.questionEntity[j].IsSubmitted = false;
          }
        }
      },
        (error) => {
          this.btn_disable = false;
          this.submitted = false;
        });

    //slider
    setTimeout(function () {
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 250,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function (slider) {
          $('body').removeClass('loading');
        }
      });
    }, 500);
    //slider


  }

  setAnswer(i, length, question, objAnswer) {

    var questionAnswer = { 'CandidateId': this.globals.authData.CandidateId, 'Answer': question, 'ObjAnswer': objAnswer };

    this.QuestionnaireService.setAnswer(questionAnswer)
      .then((data) => {
        if (question.AnswerTypeId == 2 || question.AnswerTypeId == 3) {
          let count = 0;
          for (let row of question.child) {
            if (row.AnswerText == "") {
              count = count;
            } else {
              count++;
            }
          }
          if (count == length) {
            this.questionEntity[i].IsSubmitted = true;
          } else {
            this.questionEntity[i].IsSubmitted = false;
          }
        } else if (question.AnswerTypeId == 1) {
          this.questionEntity[i].IsSubmitted = true;
          this.questionEntity[i].objAnswer = objAnswer;
        }
      },
        (error) => {
          this.btn_disable = false;
          this.submitted = false;
        });
  }

  setQuestionnaire(questionnaireForm) {
    let count = 0;
    let totalQuestion = this.questionEntity.length;
    for (let question of this.questionEntity) {
      if (question.IsSubmitted) {
        count++;
      }
    }
    if (count == totalQuestion) {
      $('#QuestionnairePreview_Modal').modal('show');
      $('.right_content_block').addClass('style_position');
    } else {
      swal({
        type: 'warning',
        title: 'Oops...',
        text: 'Please attend all the question!',
      })
    }
  }

  questionnaireSubmit() {
    $('#QuestionnairePreview_Modal').modal('hide');
    $('.right_content_block').removeClass('style_position');

    var questionnaire = { 'CandidateId': this.globals.authData.CandidateId };

    this.QuestionnaireService.questionnaireSubmit(questionnaire)
      .then((data) => {
        this.globals.authData.StatusId = 1;
        this.router.navigate(['/thank-you']);
      },
        (error) => {
          this.btn_disable = false;
          this.submitted = false;
        });
  }

}
