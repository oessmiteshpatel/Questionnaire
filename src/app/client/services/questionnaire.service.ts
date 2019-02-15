import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { HttpClient } from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class QuestionnaireService {

  constructor(private http: Http, private globals: Globals, private router: Router) { }

  getQuestion(CandidateInfo) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Questionnaire/getQuestion', CandidateInfo)
        .toPromise()
        .then(
          res => { // Success
            resolve(res.json());
          },
          msg => { // Error
            reject(msg);
          }
        );
    });
    return promise;
  }
  setAnswer(questionAnswer) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Questionnaire/setAnswer', questionAnswer)
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
  questionnaireSubmit(questionnaire) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Questionnaire/questionnaireSubmit', questionnaire)
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

}
