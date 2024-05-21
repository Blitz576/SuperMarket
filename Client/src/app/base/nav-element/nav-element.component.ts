import { Component } from '@angular/core';

@Component({
  selector: 'app-nav-element',
  standalone: true,
  templateUrl: './nav-element.component.html',
  styleUrls: ['./nav-element.component.css'], // Fixed typo: should be styleUrls instead of styleUrl
})
export class NavElementComponent {
  isOpen = false;

  openNav(event: Event) {
    event.preventDefault();
    this.isOpen = true;
  }

  closeNav(event: Event) {
    event.preventDefault();
    this.isOpen = false;
  }
}
