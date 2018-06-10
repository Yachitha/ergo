@extends('layout')
  @section('content')
<!DOCTYPE html>
<html lang="en">
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
              <div class="col-lg-12">
                  <div class="card text-center" style="border-top: 4px solid #b28bff;">
                    <div class="card-header">
                      Project ID : {{ $Cdata->project->id }} 
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $Cdata->project->name }}</h5>
                      <p class="card-text">{{ $Cdata->project->description }}</p>
                      <form action="/moreOnProject" method="post">
                        <input type="hidden" name="id" id="moreOnProject_id" value={{ $Cdata->project->id }}>
                        <button type="submit" class="btn btn-outline-primary">more</button>
                        <a href="/viewProjects" class="btn btn-outline-primary">back</a>
                      </form>
                    </div>
                    <div class="card-footer text-muted">
                      <?php
                        $today=date("Y-m-d");
                        $Today=date_create($today);
                        $enddate = date_create( $Cdata->project->end_date );
                        $datediff = date_diff($Today,$enddate);
                        echo $datediff->format("%a days")." more"
                      ?>
                    </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-8">
                  <div class="card bg-light" style="border-top: 4px solid #b28bff; margin-top: 10px; margin-left:auto">
                      <div class="card-body">
                        <div class="card-text">
                          <h6>Tasks</h6>    
                        </div>
                          <ul class="list-group list-group-flush">
                            @if($Cdata->tasks)
                              @php
                                  $i=1;
                              @endphp
                              @foreach($Cdata->tasks as $task)
                                <li class="list-group-item" onclick="showDetails('{{ $task->id }}')" style="background-color: #b28bff;"><i class="fa fa-plus" id=icon_{{ $task->id }} style="margin-right: 4px;"></i>{{ $task->name }}</li>
                                <div class="card-text" style="display: none;" id={{ $task->id }}>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><h6>Description: </h6>{{ $task->description }}</li>
                                    <li class="list-group-item"><h6>Start Date: </h6>{{ $task->start_date }}</li>
                                    <li class="list-group-item"><h6>End Date: </h6>{{ $task->end_date }}</li>
                                  </ul>
                                </div>
                                @php
                                  ++$i;
                                @endphp
                              @endforeach
                            @else
                              <li class="list-group-item bg-warning">No tasks were created yet!</li>
                            @endif        
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card bg-light" style="border-top: 4px solid #b28bff; width: 20rem; margin-top: 10px; margin-left:auto ">
                      <div class="card-header">
                          Project team members
                      </div>
                      <ul class="list-group list-group-flush">
                          @if($Cdata->teamMembers)
                              @foreach($Cdata->teamMembers as $member)
                                  <li class="list-group-item">{{ $member->fname." ". $member->lname }}</li>
                              @endforeach
                          @else
                              <li class="list-group-item">Not assigned</li>
                          @endif
                      </ul>
                  </div>
                  <div >

                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
   

</html>
@endsection