@extends('layout')
    @section('content')
    <!DOCTYPE html>
    <html>
    <h2>Stacked form</h2>
   <!--  <h3><?php
   // $array= $Cdata->user;
    //echo $array-> name ;  
    ?>
    </h3> -->

     <?php
  if($error_code==401){
     echo "<script type=\"text/JavaScript\">alert(\" the Email has already taken!\");</script>";
  }
  if($error_code==402){
    echo "<script type=\"text/JavaScript\">alert(\"Email and Password mismatch!\");</script>";
  }
  if ($error_code==100) {
    echo "<script type=\"text/JavaScript\">alert(\"Email sent successfully!\");</script>";
  }
  ?>


    <script type="text/javascript">

        function myFunction(form){
        var today = new Date();

        if(form.fname.value == "") {
            alert("Error: First name cannot be blank!");
            form.fname.focus();
            return false;
          }
        if(form.lname.value == "") {
            alert("Error: Last name cannot be blank!");
            form.lname.focus();
            return false;
          }
        if(form.email.value == "") {
            alert("Error: Email cannot be blank!");
            form.email.focus();
            return false;
          }
       }

       //alert box



      </script>
     <div class="content-wrapper"  style="background-image: url(background1.jpg);">
          <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/index">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Add User</li>
                      </ol>
              <form action="/viewsubmitUser"  onsubmit="return myFunction(this);" method="post">
                    <div class="form group">
                      <label for="name">First Name</label>
                      <input class="form-control" placeholder="First Name" type="text" id="fname" name="fname" required pattern="\w+" >
                    </div>
                    <div class="form group">
                      <label for="name">Last Name</label>
                      <input class="form-control" placeholder="Last Name" type="text" id="lname" name="lname" required pattern="\w+">
                    </div>
                    <div class="form group">
                      <label for="inputProjectName">User e-mail</label>
                      <input class="form-control" placeholder="e-mail" type="email" id="email" name="email" >
                    </div>
                    <div class="form group">
                      <label for="inputCategory">Category</label>
                       <select class="form-control" placeholder="role" 
                       id="role" name="role">
                        <option>Project Manager</option>
                        <option>Developer</option>
                      </select>
                    </div>
                    
                    <button type="submit"  class="btn btn-primary" style="margin-left:1px; margin-top:10px;">Submit</button>
                  </form>
            </div>



    </html>
    @endsection

