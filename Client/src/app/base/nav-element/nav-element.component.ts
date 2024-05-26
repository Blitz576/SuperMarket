import { Component, OnInit } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LocalStorageService } from '../../service/localstorage.service';

@Component({
  selector: 'app-nav-element',
  standalone: true,
  imports:[RouterLink],
  templateUrl: './nav-element.component.html',
  styleUrls: ['./nav-element.component.css'], // Fixed typo: should be styleUrls instead of styleUrl
})
export class NavElementComponent{

  constructor(private localStorage:LocalStorageService,private router:Router){}
  isOpen = false;
  isLoggedIn=false;
  openNav(event: Event) {
    event.preventDefault();
    this.isOpen = true;
    this.checkLogin();
  }

  closeNav(event: Event) {
    event.preventDefault();
    this.isOpen = false;
  }

  checkLogin(){
     if(this.localStorage.checkValue('user')){
       this.isLoggedIn=true;
     }
    else
       this.isLoggedIn=false;
  }

  logout(){
    this.localStorage.removeValue('user');
    this.localStorage.removeValue('password');
    this.isLoggedIn=false;
    this.router.navigate(['/auth']);
  }

}
