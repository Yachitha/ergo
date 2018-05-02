@extends('layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    My Dashboard
                </li>
            </ol>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">
                            <h5 class="alert-heading">Overview</h5>
                            <p>Quick view of your working environment</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-light" style="border-top: 4px solid #ff6953;">
                            <div class="card-header">
                                <h5>Allocated Projects</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $j=0
                                    @endphp
                                    @foreach($userProjects as $userProject)
                                        <tr>
                                            <th scope="row">{{ ++$j }}</th>
                                            <td>{{ $userProject->name }}</td>
                                            <td>{{ $userProject->description }}</td>
                                            <td>{{ $userProject->category }}</td>
                                            <td>{{ $userProject->start_date }}</td>
                                            <td>{{ $userProject->end_date }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="/viewProjects" class="btn btn-success btn-sm pull-right">more details<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection