import { Component } from "@angular/core";
import { HeroComponent } from "./hero/hero.component";
import { PopularComponent } from "./popular/popular.component";
@Component({
  selector: 'app-home',
  standalone:true,
  imports:[HeroComponent,PopularComponent],
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
    products = [
    {
      imageUrl: 'https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/4.webp',
      name: 'HP Notebook',
      price: 999,
      originalPrice: 1099,
      category: 'Laptops',
      stock: 6,
      rating: 5
    },
    {
      imageUrl: 'https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/4.webp',
      name: 'Dell Inspiron',
      price: 899,
      originalPrice: 999,
      category: 'Laptops',
      stock: 8,
      rating: 4
    },
    {
      imageUrl: 'https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/4.webp',
      name: 'MacBook Pro',
      price: 1299,
      originalPrice: 1499,
      category: 'Laptops',
      stock: 3,
      rating: 5
    }
  ];
 }