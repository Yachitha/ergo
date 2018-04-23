@extends('layout')
  @section('content')
<!DOCTYPE html>
      <html lang="en">
        <div class="content-wrapper" style="background-image: url(background1.jpg);">
          <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Tasks</li>
                      </ol>
              <form action="/submitTask" method="post">   
                    <div class="form group">
                      <div class="form group">
                      <label for="inputProjectName">Project ID</label>
                      <input class="form-control" placeholder="Task Name" type="text" id="name" name="project_id" value="{{ $Cdata->project->id}}" readonly>
                    </div>
                      <label for="inputCategory">Choose Developer</label>
                       <select class="form-control" placeholder="Choose Member" 
                       id="category" name="user">
                        <?php
                       $teamMembers=$Cdata->teamMembers;
                         foreach ($teamMembers as $key) {
                           echo "<option value=\"";
                           echo $key->id;
                           echo "\">";
                           echo  $key->fname." ".$key->lname;
                           echo "</option>";
                         }

                       ?>
                        <option>Yachitha Sandaruwan</option>
                        <option>Hemal Dhananjaya</option>
                      </select>
                    </div>
                    <div class="form group">
                      <label for="inputProjectName">Task Name</label>
                      <input class="form-control" placeholder="Task Name" type="text" id="name" name="name" >
                    </div>
                    <div class="form-group">
                      <label for="comment">Description:</label>
                      <textarea class="form-control" rows="5" id="comment" type="text" name="description" placeholder="Enter a short description... "></textarea>
                    </div>
                    <div class="form group">
                      <label for="inputStartDate">StartDate</label>
                      <input class="form-control" placeholder="yy/mm/dd" type="date" id="start_date" name="start_date" >
                    </div>
                    <div class="form group">
                      <label for="inputEndDate">EndDate</label>
                      <input class="form-control" placeholder="yy/mm/dd" type="date" id="end_date" name="end_date">
                    </div>
                    
                    
                    <button type="submit"  class="btn btn-success" style="margin-left:1px; margin-top:10px; margin-bottom: 10px;">Submit</button>
                  </form>

          <!-- Tab panes -->
          
            <div class="row">
              <div class="col-12">
                <!--<p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>-->
               
              </div>
            </div>
          </div>
      </html>
@endsection