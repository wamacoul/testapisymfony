import { Component, OnInit } from '@angular/core';
import { UsersServicesService } from '../Services/users-services.service';

@Component({
  selector: 'app-create-user-page',
  templateUrl: './create-user-page.component.html',
  styleUrls: ['./create-user-page.component.css']
})
export class CreateUserPageComponent implements OnInit {
  loading:boolean = false;

  errorMessage:any;
  successMessage:any;

  constructor(private usersService:UsersServicesService) { }

  ngOnInit(): void {
  }

  onClickSubmit(data:any){
    this.loading = true;
    this.errorMessage = "";
    this.successMessage = "";
    if(data.email == ""){
      alert("l'email est obligatoire");
      return;
    }
    if(data.password == ""){
      alert("le mot de passe est obligatoire")
      return;
    }
    this.usersService.postusers(data.name,data.email,data.password).subscribe(
      (response:any)=>{
        this.successMessage = "the user registration is a success";
        this.loading = false;
      },
      (error:any)=>{
        this.errorMessage = error.error["hydra:description"];
        this.loading = false;
    });

  }
}
