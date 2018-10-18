import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ManagequestionService } from '../services/managequestion.service';


@Component({
  selector: 'app-managequestionlist',
  providers: [ManagequestionService],
  templateUrl: './managequestionlist.component.html',
  styleUrls: ['./managequestionlist.component.css']
})
export class ManagequestionlistComponent implements OnInit {

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
