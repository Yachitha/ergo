@extends('layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="alert alert-success" role="alert">
                            <h5 class="alert-heading">Overview</h5>
                            <p>Quick view what happens in the company</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="card bg-light" style="border-left: 4px solid #09918a;">
                            <div class="card-body">
                                <h5 style="text-decoration-color: rgba(110,120,110,0.76);">Projects</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <a href="/createProjects" class="btn btn-success"><i class="fa fa-plus-square-o" style="margin-right: 8px;"></i>create project</a>
                                    </div>
                                    <div class="col-xs-3 offset-1">
                                        <a href="/editProjects" class="btn btn-warning"><i class="fa fa-pencil-square-o" style="margin-right: 8px;"></i>Edit project</a>
                                    </div>
                                    <div class="col-xs-3 offset-1">
                                        <a href="/deleteProjects" class="btn btn-danger"><i class="fa fa-trash-o" style="margin-right: 8px;"></i>Remove project</a>
                                    </div>
                                    <div class="col-xs-3 offset-1">
                                        <a href="#" class="btn btn-primary"><i class="fa fa-list-alt" style="margin-right: 8px;"></i>Get list</a>
                                    </div>
                                    <div class="col-xs-3 offset-1">
                                        <a href="#" class="btn btn-dark"><i class="fa fa-refresh" style="margin-right: 8px;"></i>Update</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-12">
                        <div class="card bg-light" style="border-left: 4px solid #775076;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-responsive-sm table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">All projects</th>
                                                    <td>{{ $all }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Ongoing projects</th>
                                                    <td>{{ $ongoing }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Late projects</th>
                                                    <td>{{ $late }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="card bg-light" style="border-left: 4px solid #c0503e;">
                            <div class="card-body">
                                <h5 style="text-decoration-color: rgba(110,120,110,0.76);">Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-12">
                        <div class="card bg-light" style="border-top: 4px solid #c0503e;">
                            <div class="col-lg-12" style="margin-top: 10px;">
                                <a href="/addmember" class="btn btn-success"><i class="fa fa-plus-square-o" style="margin-right: 4px;"></i>Add</a>
                                <table class="table table-striped table-bordered" style="margin-top: 10px;">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Ratings</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $j = 0;
                                    @endphp
                                    @foreach($companyUsers as $companyUser)
                                    <tr>
                                        <th scope="row">{{ ++$j }}</th>
                                        <td>{{ $companyUser->name }}</td>
                                        <td>{{ $companyUser->email }}</td>
                                        @if($companyUser->status)
                                            <td>Busy</td>
                                        @else
                                            <td>Available</td>
                                        @endif
                                        <td>{{ $companyUser->role }}</td>
                                        <td>Ratings</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection