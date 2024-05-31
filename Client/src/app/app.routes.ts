import { Routes } from '@angular/router';
import { AuthComponent } from './auth/auth.component';
import { ForgetPasswordComponent } from './auth/forget-password/forget-password.component';
import { CartComponent } from './cart/cart.component';
import { HomeComponent } from './home/home.component';
import { authenticationLoginGuard } from './guard/authentication-login.guard';
import { ProductPageComponent } from './product-page/product-page.component';
import { WatchListComponent } from './watch-list/watch-list.component';
import { NotFoundComponent } from './not-found/not-found.component';
import { CategoryComponent } from './category/category.component';
import { ProductDetalisComponent } from './product-detalis/product-detalis.component';
import { UserProfileComponent } from './user-profile/user-profile.component';

export const routes: Routes = [
  // Add canActivate:[authenticationLoginGuard] To Your Critical Route For Authentication

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
  {
    path: 'categories/:id',
    component: CategoryComponent,
  },
  {
    path: 'watch-list',
    component: WatchListComponent,
    canActivate: [authenticationLoginGuard],
  },
  {
    path: 'product/details/:slug',
    component: ProductDetalisComponent
  },
  {
    path: 'profile/:id',
    component: UserProfileComponent
  },
  { path: '**', component: NotFoundComponent },
];
