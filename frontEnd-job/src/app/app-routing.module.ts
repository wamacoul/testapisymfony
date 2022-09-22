import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CreateUserPageComponent } from './create-user-page/create-user-page.component';
import { JobsPageComponent } from './jobs-page/jobs-page.component';
import { UsersPageComponent } from './users-page/users-page.component';

const routes: Routes = [
  {path:"jobs",component:JobsPageComponent},
  {path:"users",component:UsersPageComponent},
  {path:"createuser",component:CreateUserPageComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
export const RoutingComponent = [JobsPageComponent,UsersPageComponent,CreateUserPageComponent];
