import { Component, OnDestroy, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LocalStorageService } from '../service/localstorage.service';
import { CartService } from '../service/cart.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CartItem } from '../models/cart-item';
import { Cart } from '../models/cart';
import { Product } from '../models/product';
import { Image } from '../models/image';


@Component({
  selector: 'app-cart',
  standalone: true,
  imports: [CommonModule , FormsModule],
  templateUrl: './cart.component.html',
  styleUrl: './cart.component.css'
})

export class CartComponent implements OnInit{
  constructor(
    private router:Router,
    private localStorage:LocalStorageService,
    private cartService:CartService)
    {

    }

  cart!:Cart;
  quintity:number = 0;
  totalPrice:number = 0;
  cartItem:CartItem[] = [];
  product!:Product[];
  productImage!:Image;


  ngOnInit(): void {
    this.cartService.getCartItems().subscribe(
      (data:Cart)=>{
        if(data){
          this.cart = data;
          this.cartItem = data.cart_items;
          
          console.log(data.cart_items);
        }


    });
  }

  increase(targetItemId:number){

  }
  decrease(targetItemId:number){

  }

  removeItem(currentItemId:number){

  }

  goHome(){
    this.router.navigate(['/home']);
  }
}
