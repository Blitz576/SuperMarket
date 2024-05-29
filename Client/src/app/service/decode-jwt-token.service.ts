import { Injectable } from '@angular/core';
import jwt_decode from 'jwt-decode'
@Injectable({
  providedIn: 'root'
})
export class DecodeJwtTokenService {
   
  constructor() { }

  decodeToken(token: string): any {
    try {
      return jwt_decode.jwtDecode(token)
    } catch (error) {
      console.error('Error decoding token:', error);
      return null;
    }
  }
}
