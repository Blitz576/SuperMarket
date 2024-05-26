import { Component } from '@angular/core';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [],
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {

  passwordIcon: string = 'fas fa-eye-slash';
  passwordFieldType: string = 'password';
  

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
