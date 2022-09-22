import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {HttpClientModule} from '@angular/common/http';
import { AppRoutingModule, RoutingComponent } from './app-routing.module';
import { AppComponent } from './app.component';
import { JobsPageComponent } from './jobs-page/jobs-page.component';
import { UsersPageComponent } from './users-page/users-page.component';
import { JobsServicesService } from './Services/jobs-services.service';
import { FormsModule } from '@angular/forms';
import { UsersServicesService } from './Services/users-services.service';
import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { CreateUserPageComponent } from './create-user-page/create-user-page.component';
@NgModule({
  declarations: [
    AppComponent,
    JobsPageComponent,
    RoutingComponent,
    UsersPageComponent,
    CreateUserPageComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    Ng2SearchPipeModule
  ],
  providers: [
    JobsServicesService,
    UsersServicesService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
