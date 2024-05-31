import { Injectable } from '@angular/core';
import { LoggedInUser } from '../models/logged-in-user';
import { Token } from '../models/token';
import { UserInfo } from '../models/user-info';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  private registerUrl = "http://127.0.0.1:8000/api/register/";
  private loginUrl = "http://127.0.0.1:8000/api/login/";
  private logoutUrl = "http://127.0.0.1:8000/api/logout/";
  constructor(private http: HttpClient) { }

  login(user: LoggedInUser) {

    const headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });

    return this.http.post<Token>(this.loginUrl, user, { headers });
  }

  register(user: UserInfo) {
    const headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });

    return this.http.post<Token>(this.registerUrl, user, { headers });
  }

  logout(token: string) {

    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`,
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });
    return this.http.post<any>(this.logoutUrl ,{},{ headers });
  }


  getProfile(id:any){
    const api = `http://localhost:8000/api/user/${id}`;
    return this.http.get<any>(api);
  }

  getUserOrders(){
    const api = `http://localhost:8000/api/orders`;
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${localStorage.getItem('loginToken')}`,
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    })
    return this.http.get<any>(api ,{ headers });
  }
}
