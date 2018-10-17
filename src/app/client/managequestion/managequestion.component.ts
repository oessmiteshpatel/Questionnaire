import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { ManagequestionService } from '../services/managequestion.service';

@Component({
  selector: 'app-managequestion',
  providers: [ManagequestionService],
  templateUrl: './managequestion.component.html',
  styleUrls: ['./managequestion.component.css']
})
export class ManagequestionComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
