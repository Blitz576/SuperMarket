import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class SessionStorageService {

  constructor() { }

  getValue(key: string): string | null {
    return sessionStorage.getItem(key);
  }

  checkValue(key: string): boolean {
    return sessionStorage.getItem(key) !== null;
  }

  setValue(key: string, value: string): void {
    sessionStorage.setItem(key, value);
  }

  removeValue(key: string): void {
    sessionStorage.removeItem(key);
  }
}
