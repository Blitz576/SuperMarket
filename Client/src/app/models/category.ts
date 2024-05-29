import { Product } from "./product";

export class Category {
  id: number;
  name: string;
  cover_image: string;
  products: Product[];

  constructor(data: any) {
    this.id = data.id;
    this.name = data.name;
    this.cover_image = data.cover_image;
    this.products = data.products.map((product: any) => new Product(product));
  }
  
}
