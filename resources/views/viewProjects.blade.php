@extends('layout')
  @section('content')
<!DOCTYPE html>
<html lang="en">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/index">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View Projects</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>View Projects</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
           <div class="row">
          <?php
          foreach ($Cdata as $key) {
           echo "<div class=\"col-sm-6\" style=\"margin-bottom:15px\">
              <div class=\"card\" >
                <div class=\"card-body\">
                  <h5 class=\"card-title\">";
                  echo $key->name;
            echo "</h5>
                  <p class=\"card-text\">";
                  echo $key->category."<br>";
                  //$startdate = date_create( $key->start_date );
                  $today=date("Y-m-d");
                  $Today=date_create($today);
                  $enddate = date_create( $key->end_date );
                  $datediff = date_diff($Today,$enddate);
                  echo $datediff->format("%R%a days")." more";
                  

                 
            echo"</p><div class=\"row\">
                  <form method=\"post\" action=\"createTasks\">
                    <button type=\"submit\" name=\"id\" class=\"btn btn-primary\" style=\"margin-right:5px\" value=\"";
                    echo $key->id;
                    echo "\">Create Task</button>
                  </form>";
            echo"</p>
                  <form method=\"post\" action=\"viewProject\">
                    <button type=\"submit\" name=\"id\" class=\"btn btn-primary\"  style=\"margin-right:5px\" value=\"";
                    echo $key->id;
                    echo "\">View Project</button>
                  </form>";
             echo"</p>
                  <form method=\"post\" action=\"viewAllTasks\">
                    <button type=\"submit\" name=\"id\" class=\"btn btn-primary\"  style=\"margin-right:5px\" value=\"";
                    echo $key->id;
                    echo "\">View Tasks</button>
                  </form></div>";
                  
            echo "</div>
              </div>
            </div>";

          }
          ?>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="card" style="margin-left:5px">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <form method="post">
                    <button type="submit" name="id" class="btn btn-primary" value=""></button>
                  </form>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
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