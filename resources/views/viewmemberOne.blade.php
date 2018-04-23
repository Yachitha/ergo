@extends('layout')
@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Profile</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-5">
                        <h1>My Profile</h1>
                        <p>Quick view of your profile</p>
                    </div>
                    <hr/>
                    <div class="col-lg-4 offset-md-10" style="margin-bottom: 20px;">
                        <a href="/updateProfile" class="btn btn-outline-dark"><i class="fa fa-edit" style="margin-right: 8px;"></i>change details</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card border-info mb-5" style="width: 20rem; margin-bottom:10px; " >
                                <img class="card-img-top" src="\uploads\profiles\{{ $Cdata -> profile_pic}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $Cdata -> name }}</h5>
                                    <p class="card-text">{{ $Cdata -> email }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <?php
                                        $company= $Cdata->company ;
                                        echo $Cdata->role;
                                        echo " at ";
                                        echo $company->name ;
                                        ?>
                                    </li>
                                    <li class="list-group-item">
                                        <?php
                                        if($Cdata->status){
                                            echo "Currenly assigned";
                                        }else{
                                            echo "Currenly available";
                                        }
                                        ?>
                                    </li>
                                    <?php
                                    $projects= $Cdata->projects;
                                    foreach($projects as $project )
                                    {
                                        echo "<li class=\"list-group-item\">";
                                        echo "currently work on ";
                                        echo $project->name;
                                        echo "</li>";
                                    }
                                    ?>
                                    <li class="list-group-item">Ratings</li>
                                </ul>
                                <div class="card-footer">
                                    <a class="btn btn-social-icon btn-facebook" href="https://facebook.com"><i class="fa fa-facebook"></i></a>
                                    <a class="btn btn-social-icon btn-github" href="https://github.com"><i class="fa fa-github"></i></a>
                                    <a class="btn btn-social-icon btn-twitter" href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                                    <a class="btn btn-social-icon btn-bitbucket" href="https://bitbucket.com"><i class="fa fa-bitbucket"></i></a>
                                    <a class="btn btn-social-icon btn-linkedin" href="https://linkedin.com"><i class="fa fa-linkedin"></i></a>
                                    <a class="btn btn-email" href="https://gmail.com"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 " >
                                <div class="card border-info mb-3 offset-sm-1" style="max-width: 45rem;">
                                    <div class="card-header">
                                        <h6><i class="fa fa-id-card" style="margin-right: 8px;"></i>ABOUT</h6>
                                    </div>
                                    <div class="card-body ">
                                        <ul class="list-group">
                                            <li class="list-group-item default">Name: {{$Cdata->name}}</li>
                                            <li class="list-group-item">Email: {{$Cdata->email}}</li>
                                            <li class="list-group-item">Phone Number</li>
                                            <li class="list-group-item">Address: {{$Cdata->street}},{{$Cdata->city}}</li>
                                            <li class="list-group-item">Website</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card border-dark mb-3" style="max-width: 20rem;">
                                    <div class="card-header">
                                        <h6><i class="fa fa-trophy" style="margin-right: 8px;"></i>SKILLS</h6>
                                    </div>
                                    <div class="card-body text-dark">
                                        <ul class="list-group">
                                            {{--@foreach()--}}
                                            <li class="list-group-item default"><i class="fa fa-circle-o "></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
@endsection