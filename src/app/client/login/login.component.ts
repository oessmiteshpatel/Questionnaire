import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { debug } from 'util';

declare var $,swal: any;


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  loginEntity;
	submitted;
	btn_disable;
	type;
	invalid;
  constructor(private http: Http, private router: Router, private route: ActivatedRoute, private AuthService : AuthService,public globals: Globals) { }

  ngOnInit() {
    //this.globals = this.global;
   
      this.loginEntity={};
    
    
      
    }
     login(loginForm)
    {		debugger
      this.submitted = true;
      if(loginForm.valid){
        this.btn_disable = true;
       
        this.AuthService.login(this.loginEntity)
        .then((data) => 
        {
          if(data='Code duplicate')
          {
            //alert('success');
            swal({
							position: 'top-end',
							type: 'success',
							title: 'User Login Successfully',
							showConfirmButton: false,
							timer: 1500
						})
						
          }else
            {
          //alert('error');
          this.btn_disable = false;
          this.submitted = false;
          this.invalid = false;
          this.loginEntity = {};
          loginForm.form.markAsPristine();
        
            }
            this.router.navigate(['']);
           //this.router.navigate(['/userprofile/edit/{{globals.authData.UserId}}']);
        }, 
        (error) => 
        { 
              this.btn_disable = false;
              this.submitted = false;
              swal({
                position: 'top-end',
                type: 'danger',
                title: 'Invalid Email Address or Password',
                showConfirmButton: false,
                timer: 1500
              })
          //this.globals.isLoading = false;
          // if(error.text){
          // 	this.invalid = true;
          // }				
          //this.btn_disable = false;
          //this.submitted = false;
        });
      } 		
    }
  
  }
  