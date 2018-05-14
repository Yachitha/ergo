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
      <div class="row">
        <div class="col-12"> 
          <h1>Tasks</h1>
          <hr>
          <div class="container">

            <div class="row">
                  <?php
                    foreach ($Cdata as $key) {
                      
                      echo " <div class=\"card\" style=\"width: 18rem;\">
                         <div class=\"card-body\">
                          <h5 class=\"card-title\"> Task :";
                      
                      echo $key->name;
                      echo "</h5><h6 class=\"card-subtitle mb-2 text-muted\"> Project :"; 
                      echo $key->project->name;
                      echo "</h6> <p class=\"card-text\">";
                      echo $key->description;
                      echo "</p><p class=\"card-subtitle mb-2 text-muted \"> Days left:";

                  $today=date("Y-m-d");
                  $Today=date_create($today);
                  $enddate = date_create( $key->end_date );
                  $datediff = date_diff($Today,$enddate);
                  echo $datediff->format("%R%a days")." more";

                      echo "</p></div> </div>";
                    }
                    ?>
            </div>
          </div>



            </div>
            </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   

</html>
@endsection