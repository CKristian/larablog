import { TestBed } from '@angular/core/testing';
1


import { PostService } from './post.service';
import { HttpClient, HttpClientModule } from '@angular/common/http';

describe('PostService', () => {
  let service: PostService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientModule, HttpClient ]
    });
    service = TestBed.inject(PostService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
