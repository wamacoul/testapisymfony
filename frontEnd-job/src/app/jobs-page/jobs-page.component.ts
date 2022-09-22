import { Component, OnInit } from '@angular/core';
import { JobsServicesService } from '../Services/jobs-services.service';

@Component({
  selector: 'app-jobs-page',
  templateUrl: './jobs-page.component.html',
  styleUrls: ['./jobs-page.component.css']
})
export class JobsPageComponent implements OnInit {

  public jobsdata:any = []

  param:any;

  searchText:any;

  constructor(private jobsService:JobsServicesService) { }

  ngOnInit(): void {
    this.jobsService.getJobs("").subscribe((data:any)=>{
      this.jobsdata = Array.from(Object.keys(data),k=>data[k])[3];
      console.log(this.jobsdata);
    });
  }

  onClickSubmit(data:any){
    //date_published[after]=2022-05-15&date_published[before]=2022-06-15
    if(data.startdate == ""){
      alert("entrer une date de debut");
      return;
    }
    if(data.enddate == ""){
      alert("entrer une date de fin");
      return
    }
    this.param = "\?date_published[after]="+data.startdate+"&date_published[before]="+data.enddate
    this.getJob(this.param);
  }
  onClickSubmitAttribute(data:any){
    //?compagny.compagny=Faure SA
    if(data.option == ""){
      alert("veillez selectionner une categories");
      return ;
    }
    if(data.search == ""){
      alert("veillez entrer un mot cle sur le champs de recherche");
      return ;
    }
    if(data.option == "job"){
      this.param = "\?"+data.option+"="+data.search;
    }else{
      this.param = "\?"+data.option+"."+data.option+"="+data.search;
    }
    this.getJob(this.param);
  }
  getJob(data:any){
    this.jobsService.getJobs(data).subscribe((data:any)=>{
      this.jobsdata = Array.from(Object.keys(data),k=>data[k])[3];
      console.log(this.jobsdata);
    });
  }

}
