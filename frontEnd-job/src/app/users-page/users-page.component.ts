import { Component, OnInit } from '@angular/core';
import { UsersServicesService } from '../Services/users-services.service';

@Component({
  selector: 'app-users-page',
  templateUrl: './users-page.component.html',
  styleUrls: ['./users-page.component.css']
})
export class UsersPageComponent implements OnInit {

  public usersdata:any = []

  param:any;

  searchText:any;

  constructor(private usersService:UsersServicesService) { }

  ngOnInit(): void {
    this.usersService.getusers("").subscribe((data:any)=>{
      this.usersdata = Array.from(Object.keys(data),k=>data[k])[3];
      console.log(this.usersdata);
    });
  }

}
