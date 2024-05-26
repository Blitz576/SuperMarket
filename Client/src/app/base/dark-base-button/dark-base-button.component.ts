import { Component, Input } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
@Component({
  standalone: true,
  selector: 'dark-base-button',
  templateUrl: 'dark-base-button.component.html',
  imports: [CommonModule, FormsModule],
  styleUrls: ['./dark-base-button.component.css'],
})
export class DarkBaseButtonComponent {
  @Input() link: string = '';
  @Input() buttonText: string = 'Buy Now!';
  @Input() buttonClasses: string =
    'btn btn-dark text-light rounded-pill mt-3 p-2 d-block w-25';
  @Input() buttonStyles: { [key: string]: string } = {};
}
