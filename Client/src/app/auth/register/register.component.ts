import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule, NgForm } from '@angular/forms';
import { LocalStorageService } from '../../service/localstorage.service';
import { UserInfo } from '../../models/user-info';
import { UserService } from '../../service/user.service';
import { Token } from '../../models/token';

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

  constructor(
    private localStorage: LocalStorageService,
    private token: Token,
    private userData: UserInfo,
    private userService: UserService
  ) {}

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

  setregisterToken(token: string) {
    this.localStorage.setValue('registerToken', token);
  }

  submitRegister() {
    try {
      // Create user info object
      let registedUser: UserInfo = {
        name: `${this.first_name} ${this.last_name}`,
        email: this.email,
        password: this.password,
        gender: this.gender,
        mobile_number: '01205891977'
      };

      this.userService.register(registedUser).subscribe({
        next: (response: any) => {
          this.setregisterToken(response.access_token);
          this.errorInSubmitting = 'hide-error';
        },
        error: () => {
          throw new Error('Error');
        }
      });
    } catch (error) {
      this.errorInSubmitting = 'show-error';
    }
  }
}
