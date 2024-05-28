export class Category {
  id: number;
  name: string;
  cover_image: string;
  products: any[];

  constructor(data: any) {
    this.id = data.id;
    this.name = data.name;
    this.cover_image = data.cover_image;
    this.products = data.products || [];
  }
}
