import { BrowserModule } from '@angular/platform-browser';
import { Globals } from './globals';
import { Component,NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { CommonModule } from "@angular/common";

import { ClientRoutingModule } from './client-routing.module';
import { ClientComponent } from './client.component.module';
import { HttpClientModule } from '@angular/common/http';

import { HomeComponent } from './home/home.component';

import { QuestionComponent } from './question/question.component';
import { QuestionService } from './services/question.service';

import { JobpositionComponent } from './jobposition/jobposition.component';
import { JobpositionService } from './services/jobposition.service';
import { JobpositionlistComponent } from './jobpositionlist/jobpositionlist.component';

import { CandidateuserComponent } from './candidateuser/candidateuser.component';
import { CandidatelistComponent } from './candidatelist/candidatelist.component';
import { CandidateuserService } from './services/candidateuser.service';

import { ThankyouComponent } from './thankyou/thankyou.component';

import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';

import { ManagequestionComponent } from './managequestion/managequestion.component';
import { ManagequestionlistComponent } from './managequestionlist/managequestionlist.component';

import { UserroleComponent } from './userrole/userrole.component';
import { UserrolelistComponent } from './userrolelist/userrolelist.component';
import { UserroleService } from './services/userrole.service';

import { LoginComponent } from './login/login.component';

import { RegisterComponent } from './register/register.component';
import { RegisterService } from './services/register.service';
import { RegisterlistComponent } from './registerlist/registerlist.component';

//import { AuthGuard } from './services/auth-guard.service';
import { AuthService } from './services/auth.service'

import { ChangepassComponent } from './changepass/changepass.component';
import { ChangepassService } from './services/changepass.service';

import { DashboardComponent } from './dashboard/dashboard.component';

@NgModule({
  declarations: [
    ClientComponent,
    HomeComponent,
    QuestionComponent,
    JobpositionComponent,
    JobpositionlistComponent,
    CandidateuserComponent,
    CandidatelistComponent,
    ThankyouComponent,
    HeaderComponent,
    FooterComponent,
    ManagequestionComponent,
    ManagequestionlistComponent,
    RegisterComponent,
    RegisterlistComponent,
    ChangepassComponent,
    LoginComponent,
    UserroleComponent,
    UserrolelistComponent,
    DashboardComponent
    
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
