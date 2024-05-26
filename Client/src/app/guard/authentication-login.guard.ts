import { CanActivateFn, Router } from '@angular/router';
import { LocalStorageService } from '../service/localstorage.service';
import { inject } from '@angular/core';

export const authenticationLoginGuard: CanActivateFn = (route, state) => {
  const localStorage = inject(LocalStorageService);
  const router = inject(Router);
  
  

  if(localStorage.getValue('user')===null){
    router.navigate(['/auth']);
    return false;
  }
  else{
     console.log(localStorage);
     return true;
  }

  
  
  return true;
};
