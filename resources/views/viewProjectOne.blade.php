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
        <li class="breadcrumb-item active">Tasks</li>
      </ol>
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card text-center">
                    <div class="card-header">
                      Project ID : {{ $Cdata->project->id }} 
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $Cdata->project->name }}</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
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
                  <div class="card" style="width: 20rem; margin-top: 10px; margin-left:2px ">
                    <div class="card-header">
                      Project team members
                    </div>
                    <ul class="list-group list-group-flush">
                    <?php
                      $teamMembers= $Cdata->teamMembers;
                      foreach ($teamMembers as $key) {
                      echo "<li class=\"list-group-item\">";
                      echo $key->fname." ".$key->lname;
                      echo "</li>";
                      }
                    ?>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
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