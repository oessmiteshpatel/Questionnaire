import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { HttpClient } from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class JobTitleService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) { }

  setJobTitle(JobTitleEntity) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Job_Title/setJobTitle', JobTitleEntity)
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

  getAllJobTitle() {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Job_Title/getAllJobTitle')
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

  deleteJobTitle(JobTitleId) {
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Job_Title/deleteJobTitle/' + JobTitleId)
        .toPromise()
        .then(
          res => { // Success
            resolve(res);
          },
          msg => { // Error
            reject(msg);
            this.router.navigate(['/pagenotfound']);
          }
        );
    });
    return promise;
  }

  getJobTitleById(JobTitleId) {
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Job_Title/getJobTitleById/' + JobTitleId)
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
