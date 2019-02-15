import { BrowserModule } from '@angular/platform-browser';
import { Component, NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { Globals } from './globals';
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from "@angular/common";
import { ClientComponent } from './client.component.module';

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


const routes: Routes = [
	{
		path: '',
		component: ClientComponent,
		children: [
			{ path: '', component: LoginComponent },
			{ path: 'login', component: LoginComponent, canActivate : [AuthGuard] },
			{ path: 'candidate', component: CandidateComponent, canActivate : [AuthGuard] },
			{ path: 'questionnaire', component: QuestionnaireComponent, canActivate : [AuthGuard] },
			{ path: 'thank-you', component: ThankYouComponent, canActivate : [AuthGuard] },
		]
	}
];

@NgModule({
	imports: [RouterModule.forChild(routes)],
	exports: [RouterModule],
	providers: [Globals, AuthService, AuthGuard, CandidateService, QuestionnaireService
	],

	bootstrap: [ClientComponent]
})
export class ClientRoutingModule { }
