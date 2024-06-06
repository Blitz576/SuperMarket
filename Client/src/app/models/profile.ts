export class Profile {

  id:number;
  name:string;
  email:string;
  mobile_number:string;
  email_verified_at:string;
  gender:string;
  role:string;
  image:string;
  status:string;
  created_at:string;
  updated_at:string;

  constructor(data:any){
    this.id = data.id;
    this.name = data.name;
    this.email = data.email;
    this.mobile_number = data.mobile_number;
    this.email_verified_at = data.email_verified_at;
    this.gender = data.gender;
    this.role = data.role;
    this.image = "localhost:8000/images/"+data.image;
    this.status = data.status;
    this.created_at = data.created_at;
    this.updated_at = data.updated_at;
  }
}
