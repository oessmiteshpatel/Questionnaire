import { Component, OnInit } from '@angular/core';
declare var $: any;
@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent implements OnInit {

  constructor() { }

  ngOnInit() {

        var scrolled = $(window).scrollTop();
        if (scrolled > 200){ $('.go_top').fadeIn('slow');}
        if (scrolled < 200){ $('.go_top').fadeOut('slow');}
      
      
      $('.go_top').click(function () {
        $("html, body").animate({ scrollTop: "0" },  500);
      });
    
    
  }

}
