import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { FormsModule} from '@angular/forms';
import { LocalStorageService } from '../../service/localstorage.service';
@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterLink, RouterOutlet , FormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  user_mail:string="";
  passowrd:string="";
  passwordIcon: string = 'fas fa-eye-slash';
  passwordFieldType: string = 'password';
  
  constructor(private localStorage:LocalStorageService,private router:Router){} 
  
  login(){
    this.localStorage.setValue('user',this.user_mail);
    this.localStorage.setValue('password',this.passowrd);
    this.router.navigate(['/home']);
   }

   togglePasswordVisibility() {
    if (this.passwordFieldType === 'password') {
      this.passwordFieldType = 'text';
      this.passwordIcon = 'fa-solid fa-eye'; // Updated icon class for Bootstrap Icons
    } else {
      this.passwordFieldType = 'password';
      this.passwordIcon = 'fas fa-eye-slash'; // Reverting back to FontAwesome icon
    }
  }
}
