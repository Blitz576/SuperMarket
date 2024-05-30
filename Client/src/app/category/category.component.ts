import { Component, OnInit } from '@angular/core';
import { PopularComponent } from '../home/popular/popular.component';
import { Category } from '../models/category';
import { CategoryService } from '../service/category.service';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { Product } from '../models/product';
import { Image } from '../models/image';

@Component({
  selector: 'app-category',
  standalone: true,
  imports: [PopularComponent,RouterLink,CommonModule],
  templateUrl: './category.component.html',
  styleUrl: './category.component.css'
})
export class CategoryComponent implements OnInit{

  constructor(private categoryService: CategoryService ,private route: ActivatedRoute) {}


  categories: Category[] = [];
  categoryProducts: Product[] = [];
  productImages: Image[] = [];
  defalutProductImage:any = "";
  categoryId!:number;

  ngOnInit(): void {
    this.categoryService.getAllCategory().subscribe(
      (response: Category[]) => {
        this.categories = response;
      });

    this.route.params.subscribe(params => {
      this.categoryId = +params['id'];
      if (this.categoryId) {
        this.categoryService.getCategoryById(this.categoryId).subscribe(
          (response: Category) => {
            this.categoryProducts = response.products;
            console.log(this.categoryProducts);
            if(this.categoryProducts.length > 0){
              for(let i = 0; i < this.categoryProducts.length; i++){
                if(response.products[i].images.length > 0){
                  this.productImages.push(this.categoryProducts[i].images[i]);
                }
              }
            }
            console.log(this.productImages);
            if(this.productImages.length > 0){
              this.defalutProductImage = this.productImages[0].image
            }else{
              this.defalutProductImage ="/defaultimage";
            }
            console.log(this.defalutProductImage);
        })
      }
    });

  }



  

}
