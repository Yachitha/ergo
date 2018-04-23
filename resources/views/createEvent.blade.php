@extends('layout')
  @section('content')
      <div class="content-wrapper">
          <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Events</li>
                      </ol>
              <form action="/submitEvent" method="post">
              		<div class="form group">
                      <label for="inputProjectName">Company ID</label>
                      <input class="form-control" placeholder="Task Name" type="text" id="company_id" name="project_id" value="{{ session('Cdata')->user->company_id }}" readonly>
                    </div>
                    <div class="form group">
                      <label for="inputProjectName">Event Name</label>
                      <input class="form-control" placeholder="Project Name" type="text" id="name" name="name" >
                    </div>
                    <div class="form-group">
                      <label for="comment">Description:</label>
                      <textarea class="form-control" rows="5" type="text" id="comment" name="description" placeholder="Enter a short description... "></textarea>
                    </div>
                    <div class="form group">
                      <label for="inputStartDate">Event date</label>
                      <input class="form-control" placeholder="yy/mm/dd" type="date" id="start_date" name="date" >
                    </div>
                     <div class="form group">
                      <label for="inputCategory">Select Oraganizer</label>
                       <select class="form-control" placeholder="Category" 
                       id="category" name="user_id">
                       <?php
                       foreach ($Cdata as $key) {
                       		echo "<option value=\"";
	                           echo $key->id;
	                           echo "\">";
	                           echo $key->name;
	                           echo "</option>";
                       }
                       ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-success" style="margin-left:1px; margin-top:10px;">Submit</button>
                  </form>
          </div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  @endsection 
