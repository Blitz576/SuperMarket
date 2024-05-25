import { Component, NgModule } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { NavElementComponent } from './base/nav-element/nav-element.component';


@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, NavElementComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'fe';
}
