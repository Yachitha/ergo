@extends('layout')
  @section('content')
        <script type="text/javascript">

        function myFunction(form){
        var today = new Date();
        var startDate = new Date($('#startDatePicker').val());
        var endDate = new Date($('#endDatePicker').val());

        if (startDate > endDate){
          alert("Enter a Date after Start date");
          form.endDatePicker.focus();
          return false;
        }
        if (startDate < today) {
          alert("Enter a Valid Date to Start Date");
          form.endDatePicker.focus();
          return false;
        }
        if (endDate < today) {
          alert("Enter a Valid Date End Date");
          form.endDatePicker.focus();
          return false;
        }

        if(form.name.value == "") {
            alert("Error: Project name cannot be blank!");
            form.name.focus();
            return false;
          }
        if(form.startDatePicker.value == "") {
            alert("Error: Start Date cannot be blank!");
            form.startDatePicker.focus();
            return false;
          }
        if(form.endDatePicker.value == "") {
            alert("Error: End Date cannot be blank!");
            form.endDatePicker.focus();
            return false;
          }else{
            alert("Project created");
          }

        }
        </script>
     
        <div class="content-wrapper" style="background-image: url(background1.jpg);">
          <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/Dashboard">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Projects</li>
                      </ol>
              <form action="/submitProjects" method="post"  onsubmit="return myFunction(this);">
                    <div class="form group">
                      <label for="inputProjectName">Project Name</label>
                      <input class="form-control" placeholder="Project Name" type="text" id="inputProjectName" name="name">
                    </div>
                    <div class="form group">
                      <label for="inputCategory">Category</label>
                       <select class="form-control" placeholder="Category" 
                       id="category" name="category">
                        <option>Web Solution</option>
                        <option>Mobile Solution</option>
                        <option>IOT</option>
                        <option>Web+Mobile</option>
                        <option>Gaming</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="comment">Description:</label>
                      <textarea class="form-control" rows="5" type="text" id="comment" name="description" placeholder="Enter a short description... "></textarea>
                    </div>
                    <div class="form group">
                      <label for="inputStartDate">StartDate</label>
                      <input class="form-control" placeholder="yy/mm/dd" type="date"  id="startDatePicker" name="start_date" >
                    </div>
                    <div class="form group">
                      <label for="inputEndDate">EndDate</label>
                      <input class="form-control" placeholder="yy/mm/dd" type="date"  id="endDatePicker" name="end_date" title="Insert a date after start date/ today">
                    </div>
                      <div style="border: 1px solid grey; border-radius: 5px; margin-top: 10px ;background-color: white">
                      <div class="form-group" style="margin-left: 10px ;margin-top:10px; ">
                          <label for="selectDeveloper">Select developers</label></br>
                          <table class="form-group" style="border-width: 1px ; margin-top: 5px">
                              <?php
                              if ($Cdata!=null) {
                              foreach ($Cdata as $key) {
                                  foreach ($key as $value) {
                                      echo "<tr class=\"form-group\" style=\"border-width:1px \">
                              <input type=\"checkbox\" name=\"developers[]\" value=\"";
                                      echo $value->id;
                                      echo "\"> ";
                                      echo $value->fname." ".$value->lname;
                                      echo "<br>
                            </tr>";
                                  }
                              }
                              }else{
                                    echo "no available users";
                              }
                              ?>

                          </table>
                      </div>
                  </div>
                    <button id="btnCreate" type="submit" class="btn btn-success" style="margin-left:1px; margin-top:10px;">Submit</button>
                  </form>
              {{--<button id="btnCreate" type="submit" class="btn btn-success" style="margin-left:1px; margin-top:10px;">Submit</button>--}}
          </div>
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  @endsection 
