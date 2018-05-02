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
                            <h5 class="alert-heading">
                                Overview
                            </h5>
                            <p>
                                Quick view of trends on your company
                            </p>
                        </div>
                        <div class="alert alert-danger" role="alert" id="project" style="cursor: pointer;" data-toggle="tooltip" title="click for more or less">
                            <h5 class="alert-heading">Overview of Projects</h5>
                            <p>Let's view about projects of the company in brief!</p>
                        </div>
                        <div class="card border-info mb-3 bg-light" id="projectInfo">
                            <div class="card-header bg-info">
                                <h5><i class="fa fa-bar-chart" style="margin-right: 8px;"></i>Projects</h5>
                            </div>
                            <div class="card-body">
                                {!! $lineChart->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="projectInfo1">
                    <div class="col-lg-6">
                        <div class="card border-info mb-3">
                            <div class="card-header bg-info">
                                <h5><i class="fa fa-pie-chart" style="margin-right: 8px;"></i>Project Categories</h5>
                            </div>
                            <div class="card-body">
                                {!! $donutChart->render() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-sm-1">
                        <div class="card border-info mb-3">
                            <div class="card-header bg-info">
                                <h5><i class="fa fa-pie-chart" style="margin-right: 8px;"></i>Late Projects</h5>
                            </div>
                            <div class="card-body">
                                {!! $lateProjectChart->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="users" style="cursor: pointer;" data-toggle="tooltip" title="click for more or less">
                        <div class="alert alert-danger" role="alert">
                            <h5 class="alert-heading">Overview of Users</h5>
                            <p>What happens in employee side?</p>
                        </div>
                    </div>
                </div>
                <div class="row" id="userInfo">
                    <div class="col-lg-12">
                        <div class="card border-success mb-3">
                            <div class="card-header bg-success">
                                <h5><i class="fa fa-users" style="margin-right: 8px;"></i>Employees of the Company</h5>
                            </div>
                            <div class="card-body">
                                {!! $companyUsersChart->render() !!}
                            </div>
                            <div class="card-footer">
                                <p style="color: #a1a1a1"><i class="fa fa-refresh" style="margin-right: 8px;"></i>Just updated</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="userInfo1">
                    <div class="col-lg-5">
                        <div class="card border-success mb-3">
                            <div class="card-header bg-success">
                                <h5><i class="fa fa-users" style="margin-right: 8px;"></i>Categorisation of Employees</h5>
                            </div>
                            <div class="card-body">
                                {!! $employeeTypeChart->render() !!}
                                <p style="text-decoration-color: #a1a1a1;"><i class="fa fa-exclamation-triangle" style="margin-right: 8px; color: #ff8f87"></i>Employees who are in lower level only shown here!</p>
                            </div>
                            <div class="card-footer">
                                <p style="color: #a1a1a1"><i class="fa fa-refresh" style="margin-right: 8px;"></i>Just updated</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-1">
                        <div class="card border-success mb3">
                            <div class="card-header bg-success">
                                <p><strong><i class="fa fa-users" style="margin-right: 8px;"></i>More Details</strong></p>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-hover table-bordered">
                                    <caption>Employee, Project interference</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col">Employee type</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Not Available</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Developers</th>
                                        <td>{{ $availableDevelopers }}</td>
                                        <td>{{ $notAvailableDevelopers }}</td>
                                        <td><a href="#"><i class="fa fa-link"></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Project Managers</th>
                                        <td>{{ $availablePms }}</td>
                                        <td>{{ $notAvailablePms }}</td>
                                        <td><a href="#"><i class="fa fa-link"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="events" style="cursor: pointer;" data-toggle="tooltip" title="click for more or less">
                        <div class="alert alert-danger" role="alert">
                            <h5 class="alert-heading">Overview of Events</h5>
                            <p>Trending Events of the company</p>
                        </div>
                    </div>
                </div>
                <div class="row" id="eventInfo">
                    <div class="col-lg-8">
                        <div class="card border-primary mb-3">
                            <div class="card-header bg-primary">
                                <h5><i class="fa fa-calendar" style="margin-right: 8px;"></i>Events overview</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-active table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Event Name</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Coordinator</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=0
                                    @endphp
                                    @foreach($events as $event)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->start_date }}</td>
                                            <td>{{ $event->end_date }}</td>
                                            <td>{{ $event->organizer }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-1">
                        <div class="card bg-primary text-white">
                            <div class="card-header">
                                <h5><i class="fa fa-calendar" style="margin-right: 8px;"></i>Top Event</h5>
                            </div>
                            <div class="card-body text-center">
                                @if($topEvents)
                                    @foreach($topEvents as $topEvent)
                                        <h1>
                                            {{ Carbon\Carbon::parse($topEvent->start_date)->format('d') }}
                                        </h1>
                                        <h1>
                                            {{ Carbon\Carbon::parse($topEvent->start_date)->format('F') }}
                                        </h1>
                                        <p style="font-size: 20px;">
                                            {{ $topEvent->name }}
                                        </p>
                                        @break
                                    @endforeach
                                @else
                                    <h1>No event to display!</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#projectInfo").hide();
            $("#projectInfo1").hide();
            $("#userInfo").hide();
            $("#userInfo1").hide();
            $("#eventInfo").hide();
        });
        $(document).ready(
            function() {
                $("#project").click(function() {
                    $("#projectInfo").toggle();
                    $("#projectInfo1").toggle();
                });
            });
        $(document).ready(
            function () {
                $("#users").click(function () {
                    $("#userInfo").toggle();
                    $("#userInfo1").toggle();
                });
            }
        );
        $(document).ready(
            function () {
                $("#events").click(function () {
                    $("#eventInfo").toggle();
                });
            }
        );

        $(document).ready(
            function () {
                $('[data-toggle="tooltip"]').tooltip()
            }
        );

        $(document).ready(function () {
            $('.toModalDeleteProject').click(function () {
                var project_id = $(this).data('id');
                console.log(project_id);
                $("#hiddenValue").val(project_id);
            });
        });

        function validateForm() {
            if($("#reason").val() === ""){
                $("#validateInput").show();
                $("#reason").focus();
            }else{
                $("#projectDeletion").submit();
            }
        }

    </script>
@endsection