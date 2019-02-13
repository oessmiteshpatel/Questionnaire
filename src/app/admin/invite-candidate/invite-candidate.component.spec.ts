import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { InviteCandidateComponent } from './invite-candidate.component';

describe('InviteCandidateComponent', () => {
  let component: InviteCandidateComponent;
  let fixture: ComponentFixture<InviteCandidateComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InviteCandidateComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(InviteCandidateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
