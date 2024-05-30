import { CartItem } from "./cart-item";

export class Cart {
  id: number;
    user_id: number;
    total_price: number;
    created_at: string;
    updated_at: string;
    cart_items: CartItem[];

    constructor(data: any) {
        this.id = data.id;
        this.user_id = data.user_id;
        this.total_price = data.total_price;
        this.created_at = data.created_at;
        this.updated_at = data.updated_at;
        this.cart_items = data.cart_items;
    }
}
