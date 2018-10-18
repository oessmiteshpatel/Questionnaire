import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  constructor() { }

  ngOnInit() {
    if ($("body").height() < $(window).height()) {  
      $('footer').addClass('footer_fixed');     
  }      
  else{  
      $('footer').removeClass('footer_fixed');    
  }
  }

}
