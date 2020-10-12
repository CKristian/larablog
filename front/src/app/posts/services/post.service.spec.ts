import { TestBed } from '@angular/core/testing';
1


import { PostService } from './post.service';
import { HttpClientTestingModule } from '@angular/common/http/testing';

describe('PostService', () => {
  let service: PostService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule],
      providers: [PostService]
    });
    service = TestBed.inject(PostService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
