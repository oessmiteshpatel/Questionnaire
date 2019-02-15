import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { Globals } from '.././globals';
import { JwtHelper } from 'angular2-jwt';


@Injectable()
export class AuthService {

	constructor(private http: Http, private globals: Globals, private router: Router) { }

	login(loginEntity) {
		debugger
		let promise = new Promise((resolve, reject) => {
			this.http.post(this.globals.baseAPIUrl + 'Admin_Login/check_login', loginEntity, this.globals.headerpath)
				.toPromise()
				.then(
					res => { // Success 
						let result = res.json();
						if (result && result.token) {
							localStorage.setItem('token', result.token);
							this.globals.authData = new JwtHelper().decodeToken(result.token);
						}
						resolve(res.json());
					},
					msg => { // Error
						reject(msg.json());


					}
				);
		});
		return promise;
	}

	logout(UserInfo) {
		let promise = new Promise((resolve, reject) => {
			this.http.post(this.globals.baseAPIUrl + 'Admin_Login/logout', UserInfo, this.globals.headerpath)
				.toPromise()
				.then(
					res => { // Success
						this.globals.authData = '';
						localStorage.removeItem('token');
						resolve(res.json());
					},
					msg => { // Error
						reject(msg);
					}
				);
		});
		return promise;

	}

	isLoggedIn() {
		let jwtHelper = new JwtHelper();
		let token = localStorage.getItem('token');
		if (!token) {
			return false;
		}
		let isExpired = jwtHelper.isTokenExpired(token) ? true : false;
		return !isExpired;
	}

}
