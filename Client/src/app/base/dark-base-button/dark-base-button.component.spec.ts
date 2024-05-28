import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DarkBaseButtonComponent } from './dark-base-button.component';

describe('DarkBaseButtonComponent', () => {
  let component: DarkBaseButtonComponent;
  let fixture: ComponentFixture<DarkBaseButtonComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [DarkBaseButtonComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(DarkBaseButtonComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
