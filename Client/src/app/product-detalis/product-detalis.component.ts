import { Component, OnInit } from '@angular/core';
import { ProductDetails } from '../models/product-details';
import { ActivatedRoute, Router } from '@angular/router';
import { ProdcutsService } from '../service/prodcuts.service';
import { Image } from '../models/image';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-product-detalis',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './product-detalis.component.html',
  styleUrl: './product-detalis.component.css'
})
export class ProductDetalisComponent implements OnInit{

  product!: ProductDetails;
  defaultImage = 'https://via.placeholder.com/400x400.png?text=No+Image+Available';
  images:Image[] = [];
  constructor(private productService:ProdcutsService, private router:ActivatedRoute) {}


  ngOnInit(): void {
    this.router.params.subscribe(params => {
      const slug = params['slug'];
      this.productService.getProductBySlug(slug).subscribe(product => {
        this.product = product.data;
        console.log(this.product);
        // console.log(this.product.images);
        if(this.product.images.length > 0){
          this.defaultImage = this.product.images[0].image;
          this.images = this.product.images;
          // console.log(this.images);
        }
      });
    });

  }


}
