import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class ProdcutsService {

  apiUrl = "http://localhost:8000/api/products/"

  constructor(private http:HttpClient) { }

  getProductBySlug(slug:string){
    return this.http.get<any>(this.apiUrl+slug);
  }
}

