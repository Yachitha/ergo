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
                                        <a href="#" class="btn btn-success"><i class="fa fa-plus-square-o" style="margin-right: 8px;"></i>create project</a>
                                    </div>
                                    <div class="col-xs-3 offset-1">
                                        <a href="#" class="btn btn-warning"><i class="fa fa-pencil-square-o" style="margin-right: 8px;"></i>Edit project</a>
                                    </div>
                                    <div class="col-xs-3 offset-1">
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash-o" style="margin-right: 8px;"></i>Remove project</a>
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
                                                    <td>35</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Ongoing projects</th>
                                                    <td>20</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Late projects</th>
                                                    <td>15</td>
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
                            <div class="col-lg-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Row 1 Data 1</td>
                                        <td>Row 1 Data 2</td>
                                    </tr>
                                    <tr>
                                        <td>Row 2 Data 1</td>
                                        <td>Row 2 Data 2</td>
                                    </tr>
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