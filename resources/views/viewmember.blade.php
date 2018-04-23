@extends('layout')
  @section('content')
<!DOCTYPE html>
<html lang="en">
  <div class="content-wrapper" style="background-image: url(background1.jpg);">
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
            foreach ($Cdata as $key){
            	# code...
            	echo "<div class=\"card \" style=\"width: 18rem; margin-right: 10px; margin-top: 10px\">
			  <img class=\"card-img-top\" src=\"";
			  echo $key ->profile_pic ;
			  echo "\" alt=\"Card image cap\">
			  <div class=\"card-body\">
			    <h5 class=\"card-title\">";
			    echo $key->name;
			    echo "</h5>
			    <p class=\"card-text\">E-mail-";
			    echo $key->email;
			    echo "</br>";
			    echo $key->role;
			    echo "</br>";
			    if($key->status) 
			    	echo "currently assigned";
			    else
			    	 echo "currenlty available" ;
			    echo "</p>
			    <a href=\"#\" class=\"btn btn-primary\">Go somewhere</a>
			  </div>
			</div>";

            }
            ?>
              <div class="card" style="width: 18rem; margin-right: 5px; margin-right: 5px">
			  <img class="card-img-top" src="..." alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>


           <div class="row">
              <div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="..." alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
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