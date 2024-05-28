import { Routes } from '@angular/router';
import { AuthComponent } from './auth/auth.component';
import { ForgetPasswordComponent } from './auth/forget-password/forget-password.component';
import { CartComponent } from './cart/cart.component';
import { HomeComponent } from './home/home.component';
import { authenticationLoginGuard } from './guard/authentication-login.guard';
import { WatchListComponent } from './watch-list/watch-list.component';
import { NotFoundComponent } from './not-found/not-found.component';

export const routes: Routes = [


  //Add  ,canActivate:[authenticationLoginGuard] To Your Critial Route For Authentication

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
  { path: "cart", component: CartComponent ,canActivate:[authenticationLoginGuard] },
  { path: "watch-list", component:WatchListComponent ,canActivate:[authenticationLoginGuard] }
  ,{path:"**",component:NotFoundComponent}
];
