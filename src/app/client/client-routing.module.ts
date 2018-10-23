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

import { ManagequestionComponent } from './managequestion/managequestion.component';
import { ManagequestionlistComponent } from './managequestionlist/managequestionlist.component';
import { ManagequestionService } from './services/managequestion.service';

import { RegisterComponent } from './register/register.component';
import { RegisterService } from './services/register.service';
import { RegisterlistComponent } from './registerlist/registerlist.component';

import { UserroleComponent } from './userrole/userrole.component';
import { UserrolelistComponent } from './userrolelist/userrolelist.component';
import { UserroleService } from './services/userrole.service';

import { LoginComponent } from './login/login.component';

//import { AuthGuard } from './services/auth-guard.service';
import { AuthService } from './services/auth.service'

import { ChangepassComponent } from './changepass/changepass.component';
import { ChangepassService } from './services/changepass.service';

const routes: Routes = [	
	{
		path: '',
			component: ClientComponent,
			children: [
				
				{ path : '', component : LoginComponent},
				// { path : '', component : CandidateuserComponent  },

				{ path : 'home', component : HomeComponent  },

				{ path : 'question', component : QuestionComponent  },
				
				{ path : 'position', component : JobpositionComponent  },
				{ path : 'position/list', component : JobpositionlistComponent  },

				{ path : 'candidateuser', component : CandidateuserComponent  },
				{ path : 'candidateuser/edit/:id', component : CandidateuserComponent  },
				{ path : 'candidate/list', component : CandidatelistComponent  },

				{ path : 'thankyou', component : ThankyouComponent  },

				{ path : 'question/add', component : ManagequestionComponent  },
				{ path : 'question/edit/:id', component : ManagequestionComponent  },
				{ path : 'question/list', component : ManagequestionlistComponent  },

				{ path : 'userrole/add', component : UserroleComponent  },	
				{ path : 'userrole/list', component : UserrolelistComponent  },
				{ path : 'userrole/edit/:id', component : UserroleComponent },

				{ path : 'register/add', component : RegisterComponent},
				{ path : 'register/list', component : RegisterlistComponent },
				{ path : 'register/edit/:id', component : RegisterComponent},

				{ path : 'login', component : LoginComponent},

				{ path: 'changepass', component: ChangepassComponent}
				
			]
	}
];
  
 @NgModule({
	imports: [RouterModule.forChild(routes)],
	exports: [RouterModule],
	providers: [Globals,QuestionService,JobpositionService,CandidateuserService,ManagequestionService,RegisterService,ChangepassService,
		AuthService,UserroleService,AuthService,
	
	],

	bootstrap: [ClientComponent]
})
export class ClientRoutingModule { }
