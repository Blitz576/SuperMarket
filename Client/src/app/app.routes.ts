import { Routes } from '@angular/router';
import { AuthComponent } from './auth/auth.component';
import { ForgetPasswordComponent } from './auth/forget-password/forget-password.component';
import { CartComponent } from './cart/cart.component';
import { HomeComponent } from './home/home.component';

export const routes: Routes = [
  {
    path: "", redirectTo: "/home", pathMatch: "full"
  },
  { path: "home", component: HomeComponent },
  {
    path: "auth",
    component: AuthComponent,
    children: [
      { path: "forget-password", component: ForgetPasswordComponent },
    ]
  },
  { path: "cart", component: CartComponent }
];
