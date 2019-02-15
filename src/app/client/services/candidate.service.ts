import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { HttpClient } from "@angular/common/http";
import { Router } from '@angular/router';


@Injectable()
export class CandidateService {

  constructor(private http: Http, private globals: Globals, private router: Router) { }

  getJobTitleList() {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Candidate/getJobTitleList')
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
  getCandidateInfo(CandidateInfo) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Candidate/getCandidateInfo', CandidateInfo)
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
  setCandidateInfo(CandidateInfo) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Candidate/setCandidateInfo', CandidateInfo)
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
  insertQuestion(CandidateInfo) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Candidate/insertQuestion', CandidateInfo)
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
