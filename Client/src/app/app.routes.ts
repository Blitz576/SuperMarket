import { Routes } from '@angular/router';
import { AuthComponent } from './auth/auth.component';
import { ForgetPasswordComponent } from './auth/forget-password/forget-password.component';
import { CartComponent } from './cart/cart.component';
import { HomeComponent } from './home/home.component';
import { authenticationLoginGuard } from './guard/authentication-login.guard';
import { ProductPageComponent } from './product-page/product-page.component';

export const routes: Routes = [
  //Add  ,canActivate:[authenticationLoginGuard] To Your Critial Route For Authentication

  {
    path: '',
    redirectTo: '/home',
    pathMatch: 'full',
  },
  { path: 'home', component: HomeComponent },
  {
    path: 'auth',
    component: AuthComponent,
    children: [{ path: 'forget-password', component: ForgetPasswordComponent }],
  },
  {
    path: 'cart',
    component: CartComponent,
    canActivate: [authenticationLoginGuard],
  },
  { path: 'product/:id', component: ProductPageComponent },
];
