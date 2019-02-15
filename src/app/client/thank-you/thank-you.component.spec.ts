import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ThankYouComponent } from './thank-you.component';

describe('ThankYouComponent', () => {
  let component: ThankyouComponent;
  let fixture: ComponentFixture<ThankyouComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ThankYouComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ThankYouComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
