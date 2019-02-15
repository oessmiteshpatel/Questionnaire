import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { QuestionService } from '../services/question.service';
declare var $: any;
declare function myInput(): any;
declare var $, swal: any;

@Component({
  selector: 'app-question',
  providers: [QuestionService],
  templateUrl: './question.component.html',
  styleUrls: ['./question.component.css']
})
export class QuestionComponent implements OnInit {

  AnswerTypeList;
  QuestionEntity;
  submitted;
  btn_disable;
  header;
  msgflag;
  message;
  PlaceholderEntity;

  constructor(private http: Http, public globals: Globals, private router: Router, private route: ActivatedRoute,
    private QuestionService: QuestionService) { }

  ngOnInit() {
    debugger

    setTimeout(function () {
      if ($("body").height() < $(window).height()) {
        $('footer').addClass('footer_fixed');
      }
      else {
        $('footer').removeClass('footer_fixed');
      }
    }, 100);
    const body = document.querySelector('body');
    var count = jQuery(window).height() - 270;
    body.style.setProperty('--screen-height', count + "px");

    // ############# FETCH ANSWER TYPE FOR DROPDOWN ##############
    this.AnswerTypeList = [];
    this.QuestionService.getAnswerTypeList()
      .then((data) => {
        this.AnswerTypeList = data;
        console.log(this.AnswerTypeList);
      },
        (error) => {
        });
    // ############# END - FETCH ANSWER TYPE FOR DROPDOWN ##############

    let QuestionId = this.route.snapshot.paramMap.get('id');

    if (QuestionId) {
      this.header = 'Edit';
      this.QuestionEntity = {};
      this.PlaceholderEntity = [];
      this.QuestionService.getQuestionById(QuestionId)
        .then((data) => {
          this.QuestionEntity = data['Question'];
          this.PlaceholderEntity = data['Placeholder'];
        },
          (error) => {
            this.btn_disable = false;
            this.submitted = false;
          });

    } else {
      this.header = 'Add';
      this.QuestionEntity = {};
      this.QuestionEntity.QuestionId = 0;
      var item = { 'Placeholder': '' };
      this.PlaceholderEntity = [];
      this.PlaceholderEntity.push(item);
      this.QuestionEntity.AnswerTypeId = '';
      this.QuestionEntity.IsActive = '1';
    }
  }

  // ################## RESET PLACEHOLDER/MCQ OPTION WHEN CHANGE IN DROPDOWN ##################
  Reset() {
    this.PlaceholderEntity = [];
    var item = { 'Placeholder': '' };
    this.PlaceholderEntity.push(item);
    setTimeout(function () {
      myInput();
    }, 100);
  }
  // ################## END - RESET PLACEHOLDER/MCQ OPTION WHEN CHANGE IN DROPDOWN ##################

  // ################## ADD PLACEHOLDER/MCQ OPTION ##################
  AddPlaceholder(index) {
    var item = { 'Placeholder': '' };
    if (this.PlaceholderEntity.length <= index + 1) {
      this.PlaceholderEntity.splice(index + 1, 0, item);
    }
  }
  // ################## END - ADD PLACEHOLDER/MCQ OPTION ##################

  // ################## REMOVE PLACEHOLDER/MCQ OPTION ##################
  RemovePlaceholder(item) {
    var index = this.PlaceholderEntity.indexOf(item);
    this.PlaceholderEntity.splice(index, 1);
  }
  // ################## END - REMOVE PLACEHOLDER/MCQ OPTION ##################

  // ################## SET QUESTION ##################
  setQuestion(QuestionForm) {
    let QuestionId = this.route.snapshot.paramMap.get('id');
    this.submitted = true;
    if (QuestionForm.valid) {
      this.submitted = false;
      var Question = { 'Placeholder': this.PlaceholderEntity, 'Question': this.QuestionEntity };
      console.log(Question);
      this.QuestionService.setQuestion(Question)
        .then((data) => {
          this.btn_disable = false;
          this.submitted = false;
          this.QuestionEntity = {};
          QuestionForm.form.markAsPristine();
          if (QuestionId) {
            swal({
              position: 'top-end',
              type: 'success',
              title: 'Question updated successfully!',
              showConfirmButton: false,
              timer: 1500
            })
          } else {
            swal({
              position: 'top-end',
              type: 'success',
              title: 'Question added successfully!',
              showConfirmButton: false,
              timer: 1500
            })
          }
          this.router.navigate(['/admin/question/list']);
        },
          (error) => {
            //alert('error');
            this.btn_disable = false;
            this.submitted = false;

            //this.router.navigate(['/admin/pagenotfound']);
          });
    }
  }
  // ################## END - SET QUESTION ##################



}