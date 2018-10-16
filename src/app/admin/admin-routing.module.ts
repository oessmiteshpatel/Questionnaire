import { BrowserModule } from '@angular/platform-browser';
import { Component,NgModule } from '@angular/core';
import { Routes,RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { Globals } from './globals';
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from "@angular/common";
import { AdminComponent  } from './admin.component.module';

import { DashboardComponent } from './dashboard/dashboard.component';

const routes: Routes = [	
  {
    path: '',
        component: AdminComponent,
        children: [
      
              { path : '', component : DashboardComponent },
		          { path : 'dashboard', component : DashboardComponent }
                        
		
        ]
  }
];

@NgModule({
imports: [RouterModule.forChild(routes)],
exports: [RouterModule],
 
  providers: [Globals
  ],
  bootstrap: [AdminComponent]
})
export class AdminRoutingModule  { }
