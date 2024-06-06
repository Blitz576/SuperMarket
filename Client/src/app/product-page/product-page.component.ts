import { Component } from '@angular/core';
import { ProductImageCarouselComponent } from './product-image-carousel/product-image-carousel.component';
import { ProductDiscComponent } from './product-disc/product-disc.component';

@Component({
  selector: 'app-product-page',
  standalone: true,
  imports: [ProductImageCarouselComponent, ProductDiscComponent],
  templateUrl: './product-page.component.html',
  styleUrl: './product-page.component.css',
})
export class ProductPageComponent {}
