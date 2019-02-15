import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { InvitedCandidateListComponent } from './invited-candidate-list.component';

describe('InvitedCandidateListComponent', () => {
  let component: InvitedCandidateListComponent;
  let fixture: ComponentFixture<InvitedCandidateListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InvitedCandidateListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(InvitedCandidateListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
