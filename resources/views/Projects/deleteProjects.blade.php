@extends('layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    @if(session ('Cdata')->user->role_id == 1)
                        <a href="/ceoDashboard">Dashboard</a>
                    @elseif(session ('Cdata')->user->role_id == 2)
                        <a href="/adminDashboard">Dashboard</a>
                    @elseif(session ('Cdata')->user->role_id == 3)
                        <a href="/pmDashboard">Dashboard</a>
                    @else
                        <a href="/developerDashboard">Dashboard</a>
                    @endif
                </li>
                <li class="breadcrumb-item active">
                    Edit Projects
                </li>
            </ol>
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" id="session_id">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row" id="project_edit" style="display: none;">
                    <div class="col-lg-6">
                        <div class="card bg-light">
                            <div class="card-header">
                                <p style="font-size: 20px;">Edit</p>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" action="/saveEditProject" method="POST">
                                    <input type="hidden" id="project_id" name="project_id" value="">
                                    <div class="form-group">
                                        <label for="project_name">Project Name:</label>
                                        <input type="text" class="form-control" name="name" id="project_name" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_description">Project Description:</label>
                                        <textarea class="form-control" name="description" id="project_description" cols="30" rows="6" placeholder=""></textarea>
                                    </div>
                                    <button class="btn btn-success" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-1">
                        <div class="card bg-light">
                            <div class="card-header">
                                <p style="font-size: 20px;">Extend Deadline</p>
                            </div>
                            <div class="card-body">
                                <p style="font-style: italic; font-size: 15px; color: rgba(24,29,24,0.89); font-weight: bold;">Extending of deadline will affect scheduled time line of the company!</p>
                                <form class="form-horizontal" action="/extendDeadline" method="POST">
                                    <input type="hidden" id="extend_id" name="project_id" value="">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="text" class="form-control" readonly placeholder="" id="endDate">
                                    </div>
                                    <div class="form-group">
                                        <button id="extend_request" class="btn btn-danger" type="button">Extend deadline</button>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="extended_date" name="extended_date" placeholder="yyyy/mm/dd" style="display: none;">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-success" id="continue_btn" style="display: none;">continue</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-12">
                        <div class="card bg-light" style="border-top: 4px solid #ff6761;">
                            <div class="card-body">
                                <table class="table table-responsive table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col"><i class="fa fa-pencil-square-o"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $j=0
                                    @endphp
                                    @foreach($Cdata as $data)
                                        <tr id="row_id">
                                            <th scope="row">{{ ++$j }}</th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->start_date }}</td>
                                            <td>{{ $data->end_date }}</td>
                                            <td><button class="btn btn-sm" onclick="projectUpdate( '{{ $data->id }}' , '{{ $data->name }}', '{{ $data->description }}', '{{ $data->start_date }}', '{{ $data->end_date }}' )"><i class="fa fa-pencil-square-o"></i></button></td>
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