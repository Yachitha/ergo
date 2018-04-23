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
              <div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="..." alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">{{ $Cdata -> name }}</h5>
			    <p class="card-text">{{ $Cdata -> email }}</p>
			  </div>
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item">Cras justo odio</li>
			    <li class="list-group-item">Dapibus ac facilisis in</li>
			    <li class="list-group-item">Vestibulum at eros</li>
			  </ul>
			  <div class="card-body">
			    <a href="#" class="card-link">Card link</a>
			    <a href="#" class="card-link">Another link</a>
			  </div>
			
            </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   

</html>
  
@endsection