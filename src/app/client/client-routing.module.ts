import { BrowserModule } from '@angular/platform-browser';
import { Globals } from './globals';
import { Component,NgModule } from '@angular/core';
import { Routes,RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { CommonModule } from "@angular/common";
import { ClientComponent  } from './client.component.module';

import { HomeComponent } from './home/home.component';
import { HttpClientModule } from '@angular/common/http';

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

const routes: Routes = [	
	{
		path: '',
			component: ClientComponent,
			children: [
				
				// { path: 'dashboard', component : DashbordComponent },

				{ path : '', component : HomeComponent  },
				{ path : 'home', component : HomeComponent  },

				{ path : 'question', component : QuestionComponent  },
				
				{ path : 'position', component : JobpositionComponent  },
				{ path : 'position/list', component : JobpositionlistComponent  },

				{ path : 'candidateuser', component : CandidateuserComponent  },
				{ path : 'candidateuser/edit/:id', component : CandidateuserComponent  },
				{ path : 'candidate/list', component : CandidatelistComponent  },

				{ path : 'thankyou', component : ThankyouComponent  }
			]
	}
];
  
 @NgModule({
	imports: [RouterModule.forChild(routes)],
	exports: [RouterModule],
	providers: [Globals,QuestionService,JobpositionService,CandidateuserService
	
	],

	bootstrap: [ClientComponent]
})
export class ClientRoutingModule { }
