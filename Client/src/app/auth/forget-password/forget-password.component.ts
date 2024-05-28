import { Component, OnDestroy } from '@angular/core';
import { RouterLink } from '@angular/router';
import { trigger, transition, style, animate, animation } from '@angular/animations';

@Component({
  selector: 'app-forget-password',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './forget-password.component.html',
  styleUrls: ['./forget-password.component.css'],
  animations: [
    trigger('fadeIn', [
      transition(':enter', [
        style({ opacity: 0 }),
        animate('500ms', style({ opacity: 1 }))
      ]),
      transition(':leave', [
        style({ opacity: 1 }),
        animate('500ms', style({ opacity: 0 }))
      ])
    ])
  ]
})
export class ForgetPasswordComponent implements OnDestroy {

  ngOnDestroy(): void {
  }
}
