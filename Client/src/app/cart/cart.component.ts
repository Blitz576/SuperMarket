import { Component, OnDestroy, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LocalStorageService } from '../service/localstorage.service';
import { CartService } from '../service/cart.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-cart',
  standalone: true,
  imports: [CommonModule , FormsModule],
  templateUrl: './cart.component.html',
  styleUrl: './cart.component.css'
})
export class CartComponent {
  constructor(private router:Router, private localStorage:LocalStorageService , private cartService:CartService){} 
  cartItems = this.cartService.getCartItems();

  increase(targetItemId:number){
      this.cartService.increaseItemQuantity(targetItemId);
      this.cartItems=this.cartService.getCartItems();
  }
  decrease(targetItemId:number){
      this.cartService.decreaseItemQuantity(targetItemId);
      this.cartItems=this.cartService.getCartItems();
  }

  removeItem(currentItemId:number){
    console.log("destroyed");
    this.cartService.removeFromCart(currentItemId);
    this.cartItems = this.cartService.getCartItems();
  }

  goHome(){
    this.router.navigate(['/home']);
  }
}
