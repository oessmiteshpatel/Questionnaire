import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-thankyou',
  templateUrl: './thankyou.component.html',
  styleUrls: ['./thankyou.component.css']
})
export class ThankyouComponent implements OnInit {

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
