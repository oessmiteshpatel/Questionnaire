import { Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';
import { Globals } from '../globals';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html'

})
export class HeaderComponent implements OnInit {
  constructor(private authService: AuthService, private router: Router, public globals: Globals) { }
  ngOnInit() { }

  logout() {
    var panel = { 'CandidateId': this.globals.authData.CandidateId };
    this.authService.logout(panel)
      .then((data) => {
        window.location.href = '/login';

      },
        (error) => {
        });
  }
}
