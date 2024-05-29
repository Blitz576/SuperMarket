import { Image } from './image';
export class Product {
  id: number;
  category_id: number;
  title: string;
  price: string;
  sale_price: string;
  slug: string;
  rating: any;
  stock: any;
  images: Image[] ;

  constructor(data: any) {
    this.id = data.id;
    this.category_id = data.category_id;
    this.title = data.title;
    this.price = data.price;
    this.sale_price = data.sale_price;
    this.slug = data.slug;
    this.rating = data.rating;
    this.stock = data.stock;
    this.images = data.images;
  }
}
