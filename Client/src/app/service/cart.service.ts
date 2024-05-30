import { Injectable } from '@angular/core';
import { CartItem } from '../models/cart-item';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Cart } from '../models/cart';
import { map } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class CartService {


  apiUrl: string = `http://localhost:8000/api/cart`;

  constructor(private http: HttpClient) { }


  addToCart(newCartItem: CartItem) {

  }

  getCartItems() {
    const user_id = 1 || localStorage.getItem('user_id') ;
    const params = new HttpParams().set('user_id', user_id);

    return this.http.get<any>(this.apiUrl, { params }).pipe(
      map(response => new Cart(response.data))
    );
  }

  removeFromCart(targetItemId: number) {
  }

}
