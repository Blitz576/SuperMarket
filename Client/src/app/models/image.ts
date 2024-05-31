export class Image {

  id:number;
  product_id:number;
  image:string;
  
  constructor(data:any){
    this.id = data.id;
    this.product_id = data.product_id;
    this.image = data.image;
  }

}
