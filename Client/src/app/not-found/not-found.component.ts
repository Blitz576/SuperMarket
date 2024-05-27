import { Component } from '@angular/core';
import { DarkBaseButtonComponent } from '../base/dark-base-button/dark-base-button.component';

@Component({
  selector: 'app-not-found',
  standalone: true,
  imports: [DarkBaseButtonComponent],
  templateUrl: './not-found.component.html',
  styleUrl: './not-found.component.css'
})
export class NotFoundComponent {

}
