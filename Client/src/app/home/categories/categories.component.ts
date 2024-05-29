import { Component, OnInit } from '@angular/core';
import { Category } from '../../models/category';
import { CategoryService } from '../../service/category.service';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-categories',
  standalone: true,
  imports: [CommonModule,RouterLink],
  templateUrl: './categories.component.html',
  styleUrl: './categories.component.css'
})


export class CategoriesComponent implements OnInit{

  categories: Category[] = [];
  constructor(private categoryService: CategoryService){}

  ngOnInit(): void {
    this.categoryService.getAllCategory().subscribe(
      (response: Category[]) => {
        this.categories = response;
      }
    )
  }




}
