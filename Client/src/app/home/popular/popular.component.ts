import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CartService } from '../../service/cart.service';
import { Router, RouterLink } from '@angular/router';



@Component({
  selector: 'app-popular',
  standalone: true,
  imports: [CommonModule,FormsModule],
  templateUrl: './popular.component.html',
  styleUrl: './popular.component.css'
})
export class PopularComponent {

  constructor(private cartService:CartService ,private router:Router){}
  @Input() imageUrl: any = '';
  @Input() name: string = '';
  @Input() price: any = 0;
  @Input() originalPrice: any = 0;
  @Input() category: any = '';
  @Input() stock: any = 0;
  @Input() rating: any = 0;
  @Input() id: any = '';
  @Input() slug:any = "";

  viewDetails(slug:any){
    this.router.navigate(['/product/details/',slug]);
  }

  addToWishlist(id:any){
    console.log(id);

  }

  addToCart(id:any){
    this.cartService.addToCart(id).subscribe(res=>{
      console.log(res);
    })
  }
}
