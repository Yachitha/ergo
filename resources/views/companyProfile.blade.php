@extends('layout')
@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My company</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-5">
                        <h1>{{ $Cdata->name }}</h1>
                        <p>Your company Details</p>
                    </div>
                    <hr/>
                    <div class="container">
                        <div class="row">
                            <div class="card border-info mb-5" style="width: 20rem;">
                                <div class="card-header bg-info"><strong style="color: #FFFFFF;">company profile</strong></div>
                                <img class="card-img-top" src="\uploads\profiles\{{ session('Cdata')->user->profile_pic }}" alt="company_profile">
                            </div>
                            <div class="card border-info col-md-7 offset-md-1">
                                <br>
                                <h2><strong>Company Details</strong></h2>
                                <hr>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            @if($Cdata->email != null)
                                                Email: {{ $Cdata->email }}
                                            @else
                                                Email: <strong>email is not configured by the admin!</strong>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if($Cdata->city !=null)
                                                City: {{ $Cdata->city }}
                                            @else
                                                City: <strong>city is not configured by the admin!</strong>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if($Cdata->state !=null)
                                                state: {{ $Cdata->state }}
                                            @else
                                                state: <strong>state is not configured by the admin!</strong>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            @if($Cdata->country !=null)
                                                country: {{ $Cdata->country }}
                                            @else
                                                country: <strong>country is not configured by the admin!</strong>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            company phone
                                        </li>
                                        <li class="list-group-item">
                                            company fax
                                        </li>
                                    </ul>
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