import { Injectable } from '@angular/core';
import { LoggedInUser } from '../models/logged-in-user';
import { Token } from '../models/token';
import { UserInfo } from '../models/user-info';
@Injectable({
  providedIn: 'root'
})
export class UserService {

  private loginToken: Token = new Token;
  private registerToke: Token = new Token;

  
  constructor() { }

}
