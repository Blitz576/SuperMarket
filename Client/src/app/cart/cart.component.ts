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
  cartItemsByProductId: { [key: number]: { product: any, totalQuantity: number , cart_id:number} } = {};
  cart:Cart[] = [];
  quintity:number = 0;
  totalPrice:number = 0;
  cartItem:CartItem[] = [];
  product!:Product[];
  productImage!:Image;


  ngOnInit(): void {
    this.cartService.getCartItems().subscribe(
      (data)=>{
        if(data.data.length > 0){
          this.cart = data.data;
          // console.log(this.cart);

          this.groupCartItemsByProductId();
          console.log(this.cartItemsByProductId);
          // for (const index in this.cartItemsByProductId) {
          //   console.log('sale_price: ',this.cartItemsByProductId[index].product.sale_price);
          //   console.log('product_id: ',this.cartItemsByProductId[index].product.id);
          //   console.log('image: ',this.cartItemsByProductId[index].product.images[0].image);
          //   console.log('qutitiy: ',this.cartItemsByProductId[index].totalQuantity);
          // }
        }
      });
  }

  groupCartItemsByProductId(): void {
    // Iterate through the cart items and group them by product_id
    for(const cartItem of this.cart) {
      for(const item of cartItem.cart_items) {
        const productId = item.product_id;
        if (this.cartItemsByProductId[productId]) {
          this.cartItemsByProductId[productId].totalQuantity += item.quantity;
        } else {
          this.cartItemsByProductId[productId] = {
            product: item.product,
            totalQuantity: item.quantity,
            cart_id: item.cart_id
          };
        }
      }
    }
  }

  increase(productId:any){
    this.cartItemsByProductId[productId].totalQuantity++;
  }
  decrease(productId:any){
    if (this.cartItemsByProductId[productId].totalQuantity > 1) {
      this.cartItemsByProductId[productId].totalQuantity--;
    }
  }

  removeItem(productId:any){
    console.log(productId);

  }

  goHome(){
    this.router.navigate(['/home']);
  }
}
