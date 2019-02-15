import { Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';
import { Globals } from '../globals';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html'

})
export class HeaderComponent implements OnInit {
  db_mode;
  constructor(private authService: AuthService, private router: Router, public globals: Globals) { }
  firstNameChar;
  lastNameChar;
  ngOnInit() {
    this.firstNameChar = this.globals.authData.FirstName.slice(0, 1);
    this.lastNameChar = this.globals.authData.LastName.slice(0, 1);
  }

  logout() {
    var UserInfo = { 'UserId': this.globals.authData.UserId };
    this.authService.logout(UserInfo)
      .then((data) => {
        // this.globals.isLoading = true;
        window.location.href = '/admin/login';

      },
        (error) => {
          //alert('error');
          //this.globals.isLoading = false;

        });

  }
  register() {
    window.location.href = '/invitation';
  }
  home() {
    //this.globals.check_login=false;
    this.router.navigate(['/dashboard']);
  }
  log() {
    window.location.href = '/login';
  }
}
