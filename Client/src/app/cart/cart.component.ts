import { Component, OnDestroy, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LocalStorageService } from '../service/localstorage.service';

@Component({
  selector: 'app-cart',
  standalone: true,
  imports: [],
  templateUrl: './cart.component.html',
  styleUrl: './cart.component.css'
})
export class CartComponent {
  constructor(private router:Router, private localStorage:LocalStorageService){}
  
  


  goHome(){
    this.router.navigate(['/home']);
  }
}
