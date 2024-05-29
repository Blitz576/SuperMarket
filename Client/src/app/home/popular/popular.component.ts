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

  @Input() imageUrl: any = '';
  @Input() name: string = '';
  @Input() price: any = 0;
  @Input() originalPrice: any = 0;
  @Input() category: any = '';
  @Input() stock: any = 0;
  @Input() rating: any = 0;
  @Input() id: any = '';

  viewDetails(id:any){
    console.log(id);
  }

  addToWishlist(id:any){
    console.log(id);

  }
}
