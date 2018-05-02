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
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-3">
                        <div class="card bg-light" style="border-top: 4px solid #008599;">
                            <div class="card-body">
                                <h6>ongoing projects</h6>
                                {!! $userOngoingProjects->render() !!}
                                <a data-toggle="modal" data-target="#ongoingProjects" class="btn btn-success btn-sm pull-right">more details<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offset-1">
                        <div class="card bg-light" style="border-top: 4px solid #991c00;">
                            <div class="card-body">
                                <h6>late projects</h6>
                                {!! $userLateProjects->render() !!}
                                <a data-toggle="modal" data-target="#inquireLate" class="btn btn-danger btn-sm pull-left text-white">Inquiries<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                                <a data-toggle="modal" data-target="#lateProjects" class="btn btn-warning btn-sm pull-right text-white">Progress<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 offset-1">
                        <div class="card bg-light" style="border-top: 4px solid #890099;">
                            <div class="card-body">
                                <h6>deadline reached</h6>
                                {!! $deadlineReached->render() !!}
                                <a data-toggle="modal" data-target="#inquireDeadlineReached" class="btn btn-danger btn-sm pull-left text-white">Inquiries<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                                <a href="/viewProjects" class="btn btn-warning btn-sm pull-right text-white">Progress<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-lg-12">
                        <div class="card bg-light" style="border-top: 4px solid #009955; margin-bottom: 30px;">
                            <div class="card-header">
                                Project Progress
                            </div>
                            <div class="card-body">
                                @foreach($projectProgresses as $projectProgress)
                                    <h6>{{ $projectProgress['name'] }}</h6>
                                    <div class="progress" style="margin: auto;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $projectProgress['percentage'] }}%" aria-valuenow="{{ $projectProgress['percentage'] }}" aria-valuemin="0" aria-valuemax="100">{{ $projectProgress['percentage'] }}%</div>
                                    </div>
                                @endforeach
                                <a href="/viewProjects" class="btn btn-success btn-sm pull-right" style="margin: 10px auto;">more details<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ongoingProjects" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-active table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Task Completion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0
                        @endphp
                        @foreach($notLateProjectsArray as $ongoingArray)
                            @foreach($ongoingArray as $item)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/dashboard">Finish</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lateProjects" tabindex="-1" role="dialog" aria-labelledby="lateProjects" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lateProjects">Project Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-active table-hover">
                        <thead style="color:#00997f; font-size: 12px;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">St.Date</th>
                            <th scope="col">End.Date</th>
                            <th scope="col">to complete</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 13px;">
                        @php
                            $i=0
                        @endphp
                        @foreach($lateProjectsArray as $lateArray)
                            @foreach($lateArray as $item)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/dashboard">Finish</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inquireLate" tabindex="-1" role="dialog" aria-labelledby="inquireLate" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inquiries</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" placeholder="Why is these Projects late?" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="inquireDescription" rows="5" placeholder="descriptively ask why the project late" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="submit">Ask</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inquireDeadlineReached" tabindex="-1" role="dialog" aria-labelledby="inquireDeadlineReached" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inquiries</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" placeholder="Why is these Projects late?" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="inquireDescription" rows="5" placeholder="descriptively ask why the project late" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="submit">Ask</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteProject" tabindex="-1" role="dialog" aria-labelledby="deleteProject" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" style="color: #981b99;">Sure want to delete!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: #ff6761; font-size: 15px;">Project deletion will affect to delete all the details of this project.</p>
                    <form action="/deleteProject" method="post" id="projectDeletion">
                        <div class="form-group">
                            <label for="reason">Reason:</label>
                            <input type="text" class="form-control" placeholder="provide a reason in short" name="reason" id="reason" value="">
                            <input type="hidden" name="project_id" id="hiddenValue" value="" />
                            <small style="display: none; color: #ff6953;" id="validateInput">Please provide a short reason like: finished, decline or other</small>
                        </div>
                    </form>
                    <p style="color: #282e28; font-size: 13px;">*The project deletion will notify to the CEO</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit" onclick="validateForm()">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection