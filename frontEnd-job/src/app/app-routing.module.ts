import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { JobsPageComponent } from './jobs-page/jobs-page.component';
import { UsersPageComponent } from './users-page/users-page.component';

const routes: Routes = [
  {path:"jobs",component:JobsPageComponent},
  {path:"users",component:UsersPageComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
export const RoutingComponent = [JobsPageComponent,UsersPageComponent];
