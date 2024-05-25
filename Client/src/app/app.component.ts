import { Component, NgModule } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { NavElementComponent } from './base/nav-element/nav-element.component';
import { HeroComponent } from './home/hero/hero.component';
import { PopularComponent } from './home/popular/popular.component';


@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, NavElementComponent,HeroComponent,PopularComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'fe';
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
