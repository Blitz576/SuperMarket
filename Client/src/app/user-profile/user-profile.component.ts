import { Component, OnInit } from '@angular/core';
import { Profile } from '../models/profile';
import { UserService } from '../service/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user-profile',
  standalone: true,
  imports: [],
  templateUrl: './user-profile.component.html',
  styleUrl: './user-profile.component.css'
})
export class UserProfileComponent implements OnInit{

  user:Profile={
    id:0,
  name:"",
  email:"",
  mobile_number:"",
  email_verified_at:"",
  gender:"",
  role:"",
  image:"",
  status:"",
  created_at:"",
  updated_at:"",
  } ;
  image:string = "localhost:8000/images/"

  constructor(private UserService:UserService , private router:Router){}

  ngOnInit(): void {
    const id = localStorage.getItem('user_id');
    this.UserService.getProfile(id).subscribe(data=>{
      this.user=data;
      this.user.image = `localhost:8000/images/${this.user.image}`
      this.image += this.user.image;
    });

    this.UserService.getUserOrders().subscribe(data=>{
      console.log(data);
    })
  }



}
