import { Component, OnInit } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { LocalStorageService } from '../../service/localstorage.service';
import { UserService } from '../../service/user.service';

@Component({
  selector: 'app-nav-element',
  standalone: true,
  imports:[RouterLink],
  templateUrl: './nav-element.component.html',
  styleUrls: ['./nav-element.component.css'], // Fixed typo: should be styleUrls instead of styleUrl
})
export class NavElementComponent{

  id:any;
  constructor(private localStorage:LocalStorageService,private router:Router,private userService:UserService){
    this.checkLogin();
    this.id = this.localStorage.getValue("user_id");
  }
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
     if(this.localStorage.checkValue('loginToken')){
       this.isLoggedIn=true;
     }
    else
       this.isLoggedIn=false;
  }

  logout(){
    let stringfiedToken = this.localStorage.getValue("loginToken");
    let encodedToken = ""
    if(stringfiedToken !== null){
      encodedToken = stringfiedToken;
      console.log(encodedToken);
    }


   let logoutProcess = this.userService.logout(encodedToken).subscribe(
    {next:()=>{
      this.localStorage.removeValue('uEmail');
      this.localStorage.removeValue('loginToken');
      this.isLoggedIn=false;
      this.router.navigate(['/auth']);
    },
    error:(error)=>{
      console.log(error);
    }
  }
   )

  }

}
