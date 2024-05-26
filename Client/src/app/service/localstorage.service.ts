import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class LocalStorageService {

  constructor() { }

  getValue(key: string): string | null {
    return localStorage.getItem(key);
  }

  checkValue(key: string): boolean {
    return localStorage.getItem(key) !== null;
  }

  setValue(key: string, value: string): void {
    localStorage.setItem(key, value);
  }

  removeValue(key: string): void {
    localStorage.removeItem(key);
  }
}
