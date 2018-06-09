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
                    Delete Projects
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
                @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" id="session_id">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-light" style="border-top: 4px solid #ff6761;">
                        <div class="card-body">
                            <table class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col"><i class="fa fa-trash-o"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $j=0
                                @endphp
                                @foreach($Cdata as $data)
                                    <tr>
                                        <th scope="row">{{ ++$j }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->category }}</td>
                                        <td>{{ $data->start_date }}</td>
                                        <td>{{ $data->end_date }}</td>
                                        <td>
                                        @if($data->status)
                                            @if($data->status== "finish")
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#deleteProject"><i class="fa fa-trash-o"></i></button>
                                            @else
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProject_noStatus"><i class="fa fa-trash-o"></i></button>
                                            @endif
                                        @else
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProject_noStatus"><i class="fa fa-trash-o"></i></button>
                                        @endif
                                        </td>
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
    <div class="modal fade" id="deleteProject" tabindex="-1" role="dialog" aria-labelledby="deleteProject" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" style="color: rgba(24,29,24,0.71);">Sure want to delete!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: #ff6761; font-size: 15px;">This project updated as finished.</p>
                    <form action="/deleteProject" method="post" id="projectDeletion">
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <input type="text" class="form-control" placeholder="provide a reason in short" name="reason" id="reason" value="">
                            <input type="hidden" name="project_id" id="hiddenValue" value="" />
                            <small style="display: none; color: #ff6953;" id="validateInput">Please provide a short reason like: finished, decline or other</small>
                        </div>
                    </form>
                    <p style="color: #454d45; font-size: 13px;">*The project deletion will notify to the CEO</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit" onclick="validateForm()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteProject_noStatus" tabindex="-1" role="dialog" aria-labelledby="deleteProject_noStatus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" style="color: rgba(24,29,24,0.71);">Sure want to delete!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: #ff6761; font-size: 15px;">This project not updated as finished. Deleting this project will loose all the details of this project!</p>
                    <form action="/deleteProject" method="post" id="projectDeletion">
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <input type="text" class="form-control" placeholder="provide a reason in short" name="reason" id="reason" value="">
                            <input type="hidden" name="project_id" id="hiddenValue" value="" />
                            <small style="display: none; color: #ff6953;" id="validateInput">Please provide a short reason like: finished, decline or other</small>
                        </div>
                    </form>
                    <p style="color: #454d45; font-size: 13px;">*The project deletion will notify to the CEO</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit" onclick="validateForm()">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection