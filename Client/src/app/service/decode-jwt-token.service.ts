import { Injectable } from '@angular/core';
import {jwtDecode} from 'jwt-decode'
@Injectable({
  providedIn: 'root'
})
export class DecodeJwtTokenService {
   
  constructor() { }

  decodeToken(token: string|null): any {
    try {
      if(token === null){
        throw new Error("invalid token")
      }
      let decodedToken = token
      return jwtDecode(decodedToken)
    } catch (error) {
      console.error('Error', error);
      return null;
    }
  }
}
