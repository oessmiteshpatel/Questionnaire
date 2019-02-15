import { BrowserModule } from '@angular/platform-browser';
import { Component, NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { Globals } from './globals';
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from "@angular/common";
import { AdminComponent } from './admin.component.module';

// final

import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { SidebarComponent } from './sidebar/sidebar.component';

import { LoginComponent } from './login/login.component';
import { AuthService } from './services/auth.service';
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

import { RegisterComponent } from './register/register.component';
import { RegisterService } from './services/register.service';
import { RegisterlistComponent } from './registerlist/registerlist.component';

import { UserroleComponent } from './userrole/userrole.component';
import { UserrolelistComponent } from './userrolelist/userrolelist.component';
import { UserroleService } from './services/userrole.service';

import { ChangepassComponent } from './changepass/changepass.component';
import { ChangepassService } from './services/changepass.service';

import { DashboardComponent } from './dashboard/dashboard.component';




import { InviteCandidateComponent } from './invite-candidate/invite-candidate.component';
import { InvitecandidateService } from './services/invitecandidate.service';

import { ActivityLogComponent } from './activity-log/activity-log.component';
import { AuditLogService } from './services/audit-log.service';

const routes: Routes = [
  {
    path: '',
    component: AdminComponent,
    children: [

      // final
      { path: '', component: LoginComponent, canActivate: [AuthGuard] },
      { path: 'login', component: LoginComponent, canActivate: [AuthGuard] },

      { path: 'title', component: JobTitleComponent, canActivate: [AuthGuard] },
      { path: 'title/list', component: JobTitleListComponent, canActivate: [AuthGuard] },
      { path: 'title/edit/:id', component: JobTitleComponent, canActivate: [AuthGuard] },

      { path: 'question/add', component: QuestionComponent, canActivate: [AuthGuard] },
      { path: 'question/edit/:id', component: QuestionComponent, canActivate: [AuthGuard] },
      { path: 'question/list', component: QuestionListComponent, canActivate: [AuthGuard] },
      // final end

      { path: 'candidateuser', component: CandidateuserComponent, canActivate: [AuthGuard] },
      { path: 'candidate/list', component: CandidatelistComponent, canActivate: [AuthGuard] },
      { path: 'candidateuser/edit/:id', component: CandidateuserComponent, canActivate: [AuthGuard] },
      { path: 'candidateuser/edits/:id', component: CandidateuserComponent, canActivate: [AuthGuard] },


      { path: 'userrole/add', component: UserroleComponent, canActivate: [AuthGuard] },
      { path: 'userrole/list', component: UserrolelistComponent, canActivate: [AuthGuard] },
      { path: 'userrole/edit/:id', component: UserroleComponent, canActivate: [AuthGuard] },

      { path: 'register/add', component: RegisterComponent, canActivate: [AuthGuard] },
      { path: 'register/list', component: RegisterlistComponent, canActivate: [AuthGuard] },
      { path: 'register/edit/:id', component: RegisterComponent, canActivate: [AuthGuard] },



      { path: 'changepass', component: ChangepassComponent, canActivate: [AuthGuard] },


      { path: 'inviteCandidate', component: InviteCandidateComponent, canActivate: [AuthGuard] },

      { path: 'activity-log', component: ActivityLogComponent, canActivate: [AuthGuard] }


    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],

  providers: [Globals, AuthService, AuthGuard, JobTitleService, CandidateuserService, QuestionService, RegisterService, ChangepassService,
    UserroleService, InvitecandidateService, AuditLogService
  ],
  bootstrap: [AdminComponent]
})
export class AdminRoutingModule { }
