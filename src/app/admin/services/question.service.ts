import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { HttpClient } from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class QuestionService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) { }


  // ###################################### SET QUESTION ######################################
  setQuestion(Question) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Question/setQuestion', Question)
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
          },
          msg => { // Error
            reject(msg);
          }
        );
    });
    return promise;
  }
  // ###################################### END - SET QUESTION ######################################

  //###################################### GET ALL QUESTIONS #######################################
  getAllQuestion() {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Question/getAllQuestion')
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
          },
          msg => { // Error
            reject(msg);
          }
        );
    });
    return promise;
  }
  //###################################### END - GET ALL QUESTIONS #######################################

  // ###################################### DELETE QUESTION ######################################
  deleteQuestion(QuestionId) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Question/deleteQuestion/' + QuestionId)
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
          },
          msg => { // Error
            reject(msg);
          }
        );
    });
    return promise;
  }
  // ###################################### END - DELETE QUESTION ######################################

  // ###################################### GET QUESTION BY ID ######################################
  getQuestionById(QuestionId) {
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Question/getQuestionById/' + QuestionId)
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
          },
          msg => { // Error
            reject(msg);
          }
        );
    });
    return promise;
  }
  // ###################################### END - GET QUESTION BY ID ######################################


  // ###################################### FETCH ANSWER TYPE FOR DROPDOWN ######################################
  getAnswerTypeList() {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Question/getAnswerTypeList')
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
          },
          msg => { // Error
            reject(msg);
          }
        );
    });
    return promise;
  }
  // ###################################### END - FETCH ANSWER TYPE FOR DROPDOWN ######################################


}
