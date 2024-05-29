import { Injectable } from '@angular/core';
import {jwtDecode} from 'jwt-decode'
import * as jwt from 'jsonwebtoken';
@Injectable({
  providedIn: 'root'
})
export class DecodeJwtTokenService {
   
  constructor() { }
  ///code here
  decodeToken(token: string|null): any {
    try {
      if(token === null){
        throw new Error("invalid token")
      }
      let decodedToken = token
      let secrectKey = "omtFWEw//7Una6I6Tzaod5oV8G8EDqIDQeKb/q5PT7Q=";
      return jwt.verify(decodedToken,secrectKey)
    } catch (error) {
      console.error('Error', error);
      return null;
    }
  }
}
