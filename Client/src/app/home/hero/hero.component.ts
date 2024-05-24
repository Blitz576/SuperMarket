import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-hero',
  standalone: true,
  imports: [FormsModule,CommonModule],
  templateUrl: './hero.component.html',
  styleUrl: './hero.component.css'
})
export class HeroComponent {
  slides = [
    {
      imageUrl: 'https://img.freepik.com/free-psd/black-friday-super-sale-facebook-cover-template_106176-1539.jpg',
      productName: 'First slide label',
      description: 'Some representative placeholder content for the first slide.'
    },
    {
      imageUrl: 'https://img.freepik.com/free-psd/black-friday-super-sale-facebook-cover-template_106176-1539.jpg',
      productName: 'Second slide label',
      description: 'Some representative placeholder content for the second slide.'
    },
    {
      imageUrl: 'https://img.freepik.com/free-psd/black-friday-super-sale-facebook-cover-template_106176-1539.jpg',
      productName: 'Third slide label',
      description: 'Some representative placeholder content for the third slide.'
    }
  ];
}
