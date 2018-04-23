<!DOCTYPE html>
<html lang="en">
@extends('layout')
    @section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/ssindex">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Profile</h1>
          
         <div class="container">
           <div class="row profile">
              <div class="col-md-3">
                <div class="profile-sidebar">
                  <div class="profile-user-pic">
                    <img src="{{URL::to('/')}}/avatar.jpg" alt="">
                  </div>
                <div class="profile-user-title">
                    <div class="profile-user-name">TechKnight</div>
                    <div class="profile-user-job">Developer</div>
                </div>
                <div class="profile-user-buttons">
                  
                  <button class="btn btn-danger btn-sm" style="margin-left:25px; margin-right:5px; margin-top:25px;">Update Profile Picture</button>
                </div>
        <div class="profile-use-menu">
        <ul class="nav">
          <li class="active"><a href=""><i class="fa fa-fw fa-home"></i>Overview</a></li>
          <li class=""><a href=""><i class="fa fa-fw fa-user"></i>Account Status</a></li>
          <li class=""><a href=""><i class="fa fa-fw fa-crosshairs"></i>Tasks</a></li>
          <li class=""><a href=""><i class="fa fa-fw fa-flag"></i>help</a></li>
          
        </ul>
      </div>
</div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @endsection
</html>
