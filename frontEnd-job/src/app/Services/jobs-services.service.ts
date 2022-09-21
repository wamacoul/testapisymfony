import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class JobsServicesService {
  private jobs = []

  private apiurl = "http://127.0.0.1:8000/api";

  getJobs(param:any){
    //alert(this.apiurl+"/jobs"+param);
    return this.http.get(this.apiurl+"/jobs"+param);
  }

  constructor(private http: HttpClient) { }
}
