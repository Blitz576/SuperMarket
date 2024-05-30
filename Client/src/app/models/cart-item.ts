import { Product } from "./product";
import { Image} from "./image";
export class CartItem {
  id:number;
  cart_id:number;
  product_id:number;
  quantity:number;
  product:Product[];
  image:Image[];

  constructor(data:any){
    this.id = data.id;
    this.cart_id = data.cart_id;
    this.product_id = data.product_id;
    this.quantity = data.quantity;
    this.product = data.product;
    this.image = data.image;
  }
}
