import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { WatchListService } from '../service/watch-list.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-watch-list',
  standalone: true,
  imports: [CommonModule , FormsModule],
  templateUrl: './watch-list.component.html',
  styleUrl: './watch-list.component.css'
})
export class WatchListComponent {
constructor(private router:Router , private watchListService:WatchListService){} 
  cartItems = this.watchListService.getWatchListItems();

  removeItem(currentItemId:number){
    console.log("destroyed");
    this.watchListService.removeFromWatchList(currentItemId);
    this.cartItems = this.watchListService.getWatchListItems();
  }

  goHome(){
    this.router.navigate(['/home']);
  }

}
