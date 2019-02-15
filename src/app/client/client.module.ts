import { BrowserModule } from '@angular/platform-browser';
import { Globals } from './globals';
import { Component, NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { CommonModule } from "@angular/common";

import { ClientRoutingModule } from './client-routing.module';
import { ClientComponent } from './client.component.module';

import { HttpClientModule } from '@angular/common/http';


import { LoginComponent } from './login/login.component';
import { AuthService } from './services/auth.service';
import { AuthGuard } from './services/auth-guard.service';

import { CandidateComponent } from './candidate/candidate.component';
import { CandidateService } from './services/candidate.service';

import { QuestionnaireComponent } from './questionnaire/questionnaire.component';
import { QuestionnaireService } from './services/questionnaire.service';

import { ThankYouComponent } from './thank-you/thank-you.component';

import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';


@NgModule({
  declarations: [
    ClientComponent,
    CandidateComponent,
    QuestionnaireComponent,
    ThankYouComponent,
    HeaderComponent,
    FooterComponent,
	LoginComponent

  ],
  imports: [
    CommonModule,
    HttpModule,
    FormsModule,
    HttpClientModule,
    ClientRoutingModule
  ]
})
export class ClientModule { }
