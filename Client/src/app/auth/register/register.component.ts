import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule, NgForm } from '@angular/forms';

@Component({
  selector: 'app-register',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent {
  first_name: string = '';
  last_name: string = '';
  gender: string = '';
  email: string = '';
  password: string = '';
  confirm_password: string = '';

  passwordIcon: string = 'fas fa-eye-slash';
  passwordFieldType: string = 'password';
  errorInSubmitting: string = 'hide-error';

  togglePasswordVisibility() {
    if (this.passwordFieldType === 'password') {
      this.passwordFieldType = 'text';
      this.passwordIcon = 'fa-solid fa-eye';
    } else {
      this.passwordFieldType = 'password';
      this.passwordIcon = 'fas fa-eye-slash';
    }
  }

  register(registerForm: NgForm) {
    if (registerForm.valid && this.password === this.confirm_password) {
      this.submitRegister();
    } else {
      registerForm.form.markAllAsTouched();
    }
  }

  submitRegister() {
    try {
            
      this.errorInSubmitting = 'hide-error';
      // Redirect to login or home page
    } catch (error) {
      this.errorInSubmitting = 'show-error';
    }
  }
}
