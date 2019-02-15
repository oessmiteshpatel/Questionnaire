import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import {HttpClient} from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class InvitecandidateService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) { }

  /*############################### INVITE CANDIDATE ######################## */
  inviteCandidate(inviteEntity){ 
    debugger
    let promise = new Promise((resolve, reject) => { 
      this.http.post(this.globals.baseAPIUrl + 'Candidateuser/inviteCandidate' ,inviteEntity)
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

    /*############################### INVITED LIST OF CANDIDATE ######################## */
  

      invitedCandidateList(){ 
        debugger
        let promise = new Promise((resolve, reject) => { 
          this.http.get(this.globals.baseAPIUrl + 'Candidateuser/invitedCandidateList')
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

       /*############################### REVOKE CANDIDATE ######################## */
      revokeCandidate(revoke){ 
      debugger
      let promise = new Promise((resolve, reject) => { 
        this.http.post(this.globals.baseAPIUrl + 'Candidateuser/revokeCandidate',revoke)
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
      /*############################### REVOKE CANDIDATE  END ######################## */


        /*############################### REINVITE CANDIDATE START ######################## */
        reInviteCandidate(reinvite){ 
          debugger
          let promise = new Promise((resolve, reject) => { 
            this.http.post(this.globals.baseAPIUrl + 'Candidateuser/reInviteCandidate',reinvite)
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
        /*############################### REINVITE CANDIDATE  END ######################## */
      

}
