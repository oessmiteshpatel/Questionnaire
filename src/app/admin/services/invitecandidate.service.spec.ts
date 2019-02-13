import { TestBed, inject } from '@angular/core/testing';

import { InvitecandidateService } from './invitecandidate.service';

describe('InvitecandidateService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [InvitecandidateService]
    });
  });

  it('should be created', inject([InvitecandidateService], (service: InvitecandidateService) => {
    expect(service).toBeTruthy();
  }));
});
