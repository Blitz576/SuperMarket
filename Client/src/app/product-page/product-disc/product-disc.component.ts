import { Component, Input } from '@angular/core';
import { NgIf } from '@angular/common';

@Component({
  selector: 'app-product-disc',
  standalone: true,
  imports: [],
  templateUrl: './product-disc.component.html',
  styleUrl: './product-disc.component.css',
})
export class ProductDiscComponent {
  @Input()
  isFeatured: boolean = true;
}
