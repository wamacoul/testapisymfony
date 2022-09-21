import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {HttpClientModule} from '@angular/common/http';
import { AppRoutingModule, RoutingComponent } from './app-routing.module';
import { AppComponent } from './app.component';
import { JobsPageComponent } from './jobs-page/jobs-page.component';
import { UsersPageComponent } from './users-page/users-page.component';
import { JobsServicesService } from './Services/jobs-services.service';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    JobsPageComponent,
    RoutingComponent,
    UsersPageComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [
    JobsServicesService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
