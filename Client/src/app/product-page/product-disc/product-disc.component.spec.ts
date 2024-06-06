import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductDiscComponent } from './product-disc.component';

describe('ProductDiscComponent', () => {
  let component: ProductDiscComponent;
  let fixture: ComponentFixture<ProductDiscComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ProductDiscComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ProductDiscComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
