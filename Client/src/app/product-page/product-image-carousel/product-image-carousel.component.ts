import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-product-image-carousel',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './product-image-carousel.component.html',
  styleUrl: './product-image-carousel.component.css',
})
export class ProductImageCarouselComponent {
  @Input() images: string[] = [
    '../../../assets/iphone.png',
    'https://placehold.co/800x800',
    '../../../assets/iphone.png',
  ];
}
