import { BrowserModule } from '@angular/platform-browser';
import { Component, NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { CommonModule } from "@angular/common";
import { AdminRoutingModule } from './admin-routing.module';
import { AdminComponent } from './admin.component.module';

// final

import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { SidebarComponent } from './sidebar/sidebar.component';

import { LoginComponent } from './login/login.component';
import { AuthService } from './services/auth.service'
import { AuthGuard } from './services/auth-guard.service';

import { JobTitleComponent } from './job-title/job-title.component';
import { JobTitleService } from './services/job-title.service';
import { JobTitleListComponent } from './job-title-list/job-title-list.component';

import { QuestionComponent } from './question/question.component';
import { QuestionService } from './services/question.service';
import { QuestionListComponent } from './question-list/question-list.component';

// final end









import { CandidateuserComponent } from './candidateuser/candidateuser.component';
import { CandidatelistComponent } from './candidatelist/candidatelist.component';
import { CandidateuserService } from './services/candidateuser.service';

import { ThankyouComponent } from './thankyou/thankyou.component';




import { UserroleComponent } from './userrole/userrole.component';
import { UserrolelistComponent } from './userrolelist/userrolelist.component';
import { UserroleService } from './services/userrole.service';

import { RegisterComponent } from './register/register.component';
import { RegisterService } from './services/register.service';
import { RegisterlistComponent } from './registerlist/registerlist.component';

import { ChangepassComponent } from './changepass/changepass.component';
import { ChangepassService } from './services/changepass.service';

import { DashboardComponent } from './dashboard/dashboard.component';





import { InviteCandidateComponent } from './invite-candidate/invite-candidate.component';
import { InvitedCandidateListComponent } from './invited-candidate-list/invited-candidate-list.component';

import { ActivityLogComponent } from './activity-log/activity-log.component';

import { EmailLogComponent } from './email-log/email-log.component';

import { LoginLogComponent } from './login-log/login-log.component';




@NgModule({
  declarations: [
    // final

    AdminComponent,

    HeaderComponent,
    FooterComponent,
    SidebarComponent,

    LoginComponent,

    JobTitleComponent,
    JobTitleListComponent,

    QuestionComponent,
    QuestionListComponent,

    // final end

    CandidateuserComponent,
    CandidatelistComponent,


    RegisterComponent,
    RegisterlistComponent,
    ChangepassComponent,
    UserroleComponent,
    UserrolelistComponent,
    DashboardComponent,
    InviteCandidateComponent,
    ActivityLogComponent,
    EmailLogComponent,
    LoginLogComponent,
    InvitedCandidateListComponent,

  ],
  imports: [
    //BrowserModule,
    CommonModule,
    HttpModule,
    FormsModule,
    AdminRoutingModule
  ]
})
export class AdminModule { }
