import { Component } from '@angular/core';
import { Router, RouterLink, RouterOutlet } from '@angular/router';
import { FormsModule, NgForm} from '@angular/forms';
import { LocalStorageService } from '../../service/localstorage.service';
import { CommonModule } from '@angular/common';
@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterLink, RouterOutlet ,CommonModule, FormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  user_mail:string="";
  password:string="";
  passwordIcon: string = 'fas fa-eye-slash';
  passwordFieldType: string = 'password';
  errorInSubmitting ="hide-error"
  constructor(private localStorage:LocalStorageService,private router:Router){} 

   togglePasswordVisibility() {
    if (this.passwordFieldType === 'password') {
      this.passwordFieldType = 'text';
      this.passwordIcon = 'fa-solid fa-eye'; // Updated icon class for Bootstrap Icons
    } else {
      this.passwordFieldType = 'password';
      this.passwordIcon = 'fas fa-eye-slash'; // Reverting back to FontAwesome icon
    }
  }

  login(signInForm: NgForm) {
    if (signInForm.valid) {
      this.submitLogin(); 
    } else {
      signInForm.form.markAllAsTouched();
    }
  }
    submitLogin(){
    try{  
    
    this.router.navigate(['/home']);
    }
    catch(error){
      this.errorInSubmitting='show-error'
    }
   }

}
