@extends('layout')
  @section('content')
<!DOCTYPE html>
<html lang="en">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/ssindex">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tasks</li>
      </ol>
      <div class="row">
        <div class="col-12"> 
          <h1>Tasks</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
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
               <!--  <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div> -->

            <!-- extra div-->
            <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>



            </div>
            </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   

</html>
@endsection