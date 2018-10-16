import { BrowserModule } from '@angular/platform-browser';
import { Component,NgModule } from '@angular/core';
import { Routes,RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { CommonModule } from "@angular/common";

import { AdminRoutingModule } from './admin-routing.module';
import { AdminComponent } from './admin.component.module';


import { DashboardComponent } from './dashboard/dashboard.component';



@NgModule({
  declarations: [
    AdminComponent,
	
    DashboardComponent
    
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
