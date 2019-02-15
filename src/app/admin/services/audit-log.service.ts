import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import {HttpClient} from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class AuditLogService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) { }
 
 
  /* ######### GET  ACTIVITY LOG DATA ########## */
  getActivitylog(){
  debugger
  let promise = new Promise((resolve, reject) => {
    this.http.get(this.globals.baseAPIUrl + 'Auditlog/getActivitylog')
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

   /* ######### GET EMAIL LOG DATA ########## */
   getEmailLog(){
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Auditlog/getEmailLog')
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

  /* ######### GET LOGIN LOG DATA ########## */
  getLoginLog(){
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Auditlog/getLoginLog')
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
  

}
