import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-popular',
  standalone: true,
  imports: [CommonModule,FormsModule],
  templateUrl: './popular.component.html',
  styleUrl: './popular.component.css'
})
export class PopularComponent {

  @Input() imageUrl: string = '';
  @Input() name: string = '';
  @Input() price: number = 0;
  @Input() originalPrice: number = 0;
  @Input() category: string = '';
  @Input() stock: number = 0;
  @Input() rating: number = 0;

}
