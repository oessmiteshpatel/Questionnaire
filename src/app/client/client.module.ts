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
    FooterComponent
    
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
