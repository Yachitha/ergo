@extends('layout')
  @section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          @if(session ('Cdata')->user->role_id == 1)
                        <a href="/ceoDashboard">Dashboard</a>
                    @elseif(session ('Cdata')->user->role_id == 2)
                        <a href="/adminDashboard">Dashboard</a>
                    @elseif(session ('Cdata')->user->role_id == 3)
                        <a href="/pmDashboard">Dashboard</a>
                    @else
                        <a href="/developerDashboard">Dashboard</a>
          @endif
        </li>
        <li class="breadcrumb-item active">Project</li>
      </ol>
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="card bg-light" style="border-top: 4px solid #b28bff; margin-top: 10px; margin-left:auto">
                      <div class="card-body">
                        <div class="card-text">
                          <h6>Update Project</h6>
                              <form class="form-horizontal" action="/ceoUpdateProject" method="POST">
                                    <input type="hidden" id="viewMoreproject_id" name="project_id" value={{ $Cdata->project->id }}>
                                    <div class="form-group">
                                        <label for="viewMoreproject_name">Project Name:</label>
                                        <input type="text" class="form-control" name="name" id="viewMoreproject_name" placeholder='{{ $Cdata->project->name }}'>
                                    </div>
                                    <div class="form-group">
                                        <label for="viewMoreproject_description">Project Description:</label>
                                        <textarea class="form-control" name="description" id="viewMoreproject_description" cols="30" rows="6" placeholder='{{ $Cdata->project->description }}'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="viewMoreproject_feedback">Give feedback:</label>
                                        @if($Cdata->project->userFeedback)
                                          <textarea class="form-control" name="feedback" id="viewMoreproject_feedback" cols="30" rows="6" placeholder='{{ $Cdata->project->userFeedback }}'></textarea>
                                        @else
                                          <textarea class="form-control" name="feedback" id="viewMoreproject_feedback" cols="30" rows="6" placeholder="Not updated"></textarea>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="viewMoreproject_description">Update End Date:</label>
                                        <input type="date" name="end_date" id="viewMoreprojectEnd_date" class="form-control">
                                        <small class="badge badge-warning">Previous Date: {{ $Cdata->project->end_date }}</small>
                                    </div>
                                    <button class="btn btn-success" type="submit">Update</button>
                              </form>    
                        </div>  
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card bg-light" style="border-top: 4px solid #b28bff; width: 20rem; margin-top: 10px; margin-left:auto ">
                      <div class="card-header">
                          Project Delete
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
@endsection