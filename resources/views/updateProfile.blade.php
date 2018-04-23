@extends('layout')
@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/viewUser">My Profile</a>
                </li>
                <li class="breadcrumb-item active">Update Profile</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-5">
                        <h1>Update Profile</h1>
                        <p>Quick Update Your Profile</p>
                    </div>
                    <hr/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="/updateProfile" method="post">
                        <div class="form group">
                            <label for="name">First Name</label>
                            <input class="form-control" placeholder="First Name" type="text" id="fname" name="fname">
                        </div>
                        <div class="form group">
                            <label for="name">Last Name</label>
                            <input class="form-control" placeholder="Last Name" type="text" id="lname" name="lname">
                        </div>
                        <div class="form group">
                            <label for="inputProjectName">email</label>
                            <input class="form-control" placeholder="e-mail" type="email" id="email" name="email">
                        </div>
                        <div class="form group">
                            <label for="city">City</label>
                            <input class="form-control" placeholder="city" type="text" id="city" name="city">
                        </div>
                        <div class="form group">
                            <label for="street">Street</label>
                            <input class="form-control" placeholder="street" type="text" id="street" name="street">
                        </div>
                        <div class="form group">
                            <label for="mobile">Mobile Number</label>
                            <input class="form-control" placeholder="mobile" type="text" id="mobile" name="mobile">
                        </div>

                        <button type="submit"  class="btn btn-outline-dark" style="margin-left:1px; margin-top:10px; margin-bottom: 20px;"><i class="fa fa-plus-square" style="margin-right: 8px;"></i>Update</button>
                    </form>
                </div>
                <div class="col-lg-4 offset-md-2">
                    <img src="/uploads/profiles/{{ $Cdata->profile_pic }}" alt="profile_pic" style="width: 150px; height: 150px; border-radius: 50%; overflow: hidden; background-position: center center; background-size: cover; border: rgba(116,116,116,0.91) solid 5px; box-shadow: 0 3px 2px rgba(255,255,255,0)">
                    <form action="/updateProfilePicture" method="post" enctype="multipart/form-data">
                        <label class="btn btn-primary" style="margin-top: 10px;">Choose picture<input id="imageBrowes" type="file" name="profile_pic" style="display:none;" onchange="return ValidateFileUpload()"/></label>
                        <button type="submit" class="btn btn-outline-dark" onclick="return imageValid()"><i class="fa fa-plus-square" style="margin-right: 8px;"></i>Update Profile Picture</button>
                    </form>
                </div>
            </div>
            <!--/.row-->
        </div>
    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <script>
        function ValidateFileUpload() {
            var fuData = document.getElementById('imageBrowes');
            var FileUploadPath = fuData.value;

            //To check if user upload any file
            if (FileUploadPath == '') {
                alert("Please upload an image");

            } else {
                var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

                //The file uploaded is an image

                if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {


                }
                else {
                    alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");

                }
            }
        }



        function imageValid() {
            var fuData = document.getElementById('imageBrowes');
            var FileUploadPath = fuData.value;
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            //To check if user upload any file
            if (FileUploadPath == '') {
                alert("Please upload an image");

            } else if (Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {

                return true;
            } else {
                alert("Photo only allows file types of PNG, JPG, JPEG and BMP. ");
                return false;
            }
        }
    </script>



@endsection