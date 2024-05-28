import { Injectable } from '@angular/core';
import { CartItem } from '../models/cart-item';

@Injectable({
  providedIn: 'root'
})
export class CartService {

  imageWidth: string = "100px";
  imageHeight: string = "123.075px";
  
  private cartItems: CartItem[] = [
    {
      id: 1,
      image: "https://scontent.fcai19-3.fna.fbcdn.net/v/t39.30808-1/335299117_159878670216978_3831529047356252070_n.jpg?stp=dst-jpg_p200x200&_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=fhMcRbDNEtIQ7kNvgHu_46t&_nc_ht=scontent.fcai19-3.fna&oh=00_AYBAYWvWVz0nWhIjGXTMMP__H0y_nmXBAMjuDDZ38lURtA&oe=6659B34D",
      name: "Mohamed Ismail Elsayed Harby (ITI Best Student Can Finish Your Task In 2 minutes)",
      price: 800.00,
      quantity: 1,
      imageWidth: this.imageWidth,
      imageHeight: this.imageHeight,
      total_price: 800.00
    },
    {
      id: 2,
      image: "https://theme905-computer-shop.myshopify.com/cdn/shop/products/img_11_130x160_crop_center.png?v=1644319013",
      name: "Galaxy Tab S3 9.7 Wifi Tablet (Black)",
      price: 200.00,
      quantity: 1,
      imageWidth: this.imageWidth,
      imageHeight: this.imageHeight,
      total_price: 200.00
    },
    {
      id: 3,
      image: "https://theme905-computer-shop.myshopify.com/cdn/shop/products/samsung_gear_s2_smartwatch_silver_1_130x160_crop_center.jpg?v=1651575252",
      name: "S2 Smartwatch Silver",
      price: 80.00,
      quantity: 1,
      imageWidth: this.imageWidth,
      imageHeight: this.imageHeight,
      total_price: 80.00
    },
    {
      id: 4,
      image: "https://theme905-computer-shop.myshopify.com/cdn/shop/products/apple_12.9_ipad_pro__256gb_wifi___4g_lte_space_gray__1_786c1cd4-e563-41ed-a1ae-3bac155cc951_130x160_crop_center.png?v=1597055202",
      name: "Apple 12",
      price: 200.00,
      quantity: 1,
      imageWidth: this.imageWidth,
      imageHeight: this.imageHeight,
      total_price: 200.00
    }
  ];

  constructor() { }

  increaseItemQuantity(targetItemId: number) {
    const item = this.cartItems.find(item => item.id === targetItemId);
    if (item) {
      item.quantity += 1;
      item.total_price = item.price * item.quantity;
    }
  } 

  decreaseItemQuantity(targetItemId: number) {
    const item = this.cartItems.find(item => item.id === targetItemId);
    if (item && item.quantity > 1) {
      item.quantity -= 1;
      item.total_price = item.price * item.quantity;
    }
  }

  checkCartItem(targetItemId: number): boolean {
    return this.cartItems.some(item => item.id === targetItemId);
  }

  getCartItems(): CartItem[] {
    return this.cartItems;
  }

  addToCart(newCartItem: CartItem) {
    if (this.checkCartItem(newCartItem.id)) {
      console.error("this item already exists")
    } else {
      this.cartItems.push(newCartItem);
    }
  }

  removeFromCart(targetItemId: number) {
    this.cartItems = this.cartItems.filter(item => item.id !== targetItemId);
  }

}
