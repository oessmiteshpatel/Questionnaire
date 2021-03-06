import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import {HttpClient} from "@angular/common/http";
import { Router } from '@angular/router';


@Injectable()
export class CandidateuserService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) { }

  /* ######### FORM SUBMIT START ########## */
  add(candidateEntity){ 
    debugger
    let promise = new Promise((resolve, reject) => { 
      this.http.post(this.globals.baseAPIUrl + 'Candidateuser/addUser', candidateEntity)
      
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
   /* ######### FORM SUBMIT END ########## */

    /* ######### UPLOAD FILE START ########## */
    uploadFile(file,CandidateId){
      let promise = new Promise((resolve, reject) => {
      this.http.post(this.globals.baseAPIUrl + 'Candidateuser/uploadFile/'+CandidateId, file )
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
      /* ######### UPLOAD FILE END ########## */
      
     /* ######### GET ALL CANDIDATE START ########## */
    getAllCandidate()
    {
      debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'Candidateuser/getAllCandidate')
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
  /* ######### GET ALL CANDIDATE END ########## */

  
    getById(CandidateId){
      debugger
    
      let promise = new Promise((resolve, reject) => {
        this.http.get(this.globals.baseAPIUrl + 'Candidateuser/getById/' + CandidateId)
          .toPromise()
          .then(
            res => { // Success
              resolve(res);
            },
            msg => { // Error
          reject(msg);
       //   this.globals.isLoading = false;
         // this.router.navigate(['/pagenotfound']);
            }
          );
      });		
      return promise;
      }  
      getAllDefaultData(){
        debugger
        let promise = new Promise((resolve, reject) => {
          this.http.get(this.globals.baseAPIUrl + 'Candidateuser/getAllDefaultData')
            .toPromise()
            .then(
              res => { // Success
                resolve(res);
              },
              msg => { // Error
            reject(msg);
            //this.globals.isLoading = false;
           // this.router.navigate(['/pagenotfound']);
              }
            );
        });		
        return promise;
        }

        /* ######### DELETE START ########## */
        delete(del){  
          let promise = new Promise((resolve, reject) => {
            this.http.post(this.globals.baseAPIUrl + 'Candidateuser/delete' , del)
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
        /* ######### DELETE END ########## */

}
