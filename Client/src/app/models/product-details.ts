import { Image } from "./image";

export class ProductDetails {
  id:number;
  title:string;
  summary:string;
  description:string;
  stock:number;
  price:string;
  sale_price:string;
  slug:string;
  rating:any;
  status:string;
  category_id:number;
  images:Image[];
  user:any;
  category:any;

  constructor(data:any){
    this.id = data.id;
    this.title = data.title;
    this.summary = data.summary;
    this.description = data.description;
    this.stock = data.stock;
    this.price = data.price;
    this.sale_price = data.sale_price;
    this.slug = data.slug;
    this.rating = data.rating;
    this.status = data.status;
    this.category_id = data.category;
    this.user = data.user;
    this.images = data.images;
  }
}
