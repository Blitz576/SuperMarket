import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-hero',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './hero.component.html',
  styleUrl: './hero.component.css',
})
export class HeroComponent {
  slides = [
    {
      Quote: 'Sky is Your Limit',
      captionStyle: 'carousel-caption-1',
      imageUrl:
        'https://theme905-computer-shop.myshopify.com/cdn/shop/files/img_01_02109cc1-220a-4319-ab36-d43b5340f37a_1296x.png?v=1665429191',
      productName: 'Apple Watch Ultra',
      description:
        ' Enjoy the ultimate Apple Watch experience with the Apple Watch Ultra. from 12$ a month',
    },
    {
      Quote: 'Everything you need',
      captionStyle: 'carousel-caption',
      imageUrl:
        'https://theme905-computer-shop.myshopify.com/cdn/shop/files/img_34_1296x.png?v=1665467744',
      productName: 'On time every time ',
      description: 'Start shopping now!.',
    },
    // {
    //   Quote:"Mohamed Ismail Elsayed Harby",
    //   captionStyle:"carousel-caption",
    //   imageUrl: 'https://scontent.fcai19-3.fna.fbcdn.net/v/t39.30808-6/335299117_159878670216978_3831529047356252070_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=fhMcRbDNEtIQ7kNvgENFdAa&_nc_ht=scontent.fcai19-3.fna&oh=00_AYCItkM_51z9_q9lpryhO6DlLtYPctgmP3MYaCfnsqCUMQ&oe=66581D8B',
    //   productName: 'Third slide label',
    //   description: 'Some representative placeholder content for the third slide.'
    // }
  ];
}
