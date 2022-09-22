import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class UsersServicesService {

  private users = []

  private apiurl = "http://127.0.0.1:8000/api";

  getusers(param:any){
    //alert(this.apiurl+"/users"+param);
    return this.http.get(this.apiurl+"/users"+param);
  }
  postusers(name:any,email:any,password:any){
    //alert(this.apiurl+"/users"+param);
    return this.http.post(
      this.apiurl+"/users",
      {
        "name" : name,
        "email" : email,
        "password" : password,
        "createdAt" : new Date()
      }
    );
  }

  constructor(private http: HttpClient) { }
}
