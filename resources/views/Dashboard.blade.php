@extends('layout')
@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            @if($user->role_id == 1)
              <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Overview</h5>
                <p>Quick view of trends in your company</p>
                <span class="badge badge-success">You are the person who plan your company {{ $user->fname }}</span>
              </div>
              <div class="alert alert-danger" role="alert" id="project" style="cursor: pointer;" data-toggle="tooltip" title="click for more or less">
                <h5 class="alert-heading">Overview of Projects</h5>
                <p>Let's view about projects of the company in brief!</p>
              </div>
            @elseif($user->role_id == 2)
              <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Overview</h5>
                <p>Quick view of trends in your company</p>
                <span class="badge badge-warning">You are the Admin of your company {{ $user->fname }}</span>
              </div>
            @elseif($user->role_id == 3 || $user->role_id == 4)
              <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Overview</h5>
                <p>Quick view of your working environment!</p>
                <span class="badge badge-danger">You can view your details {{ $user->fname }}</span>
              </div>
            @endif
            @if($user->role_id == 1)
              <div class="card border-info mb-3" id="projectInfo">
                <div class="card-header bg-info">
                  <strong><h5><i class="fa fa-bar-chart" style="margin-right: 8px;"></i>Projects</h5></strong>
                </div>
                <div class="card-body">
                  {!! $lineChart->render() !!}
                </div>
              </div>
            @endif
          </div>
        </div>
        @if($user->role_id==1)
            <div class="row" id="projectInfo1">
          <div class="col-lg-6">
            <div class="card border-info mb-3">
              <div class="card-header bg-info">
                <strong><h5><i class="fa fa-pie-chart" style="margin-right: 8px;"></i>Project Categories</h5></strong>
              </div>
              <div class="card-body">
                {!! $donutChart->render() !!}
              </div>
            </div>
          </div>
          <div class="col-lg-5 offset-sm-1">
            <div class="card border-info mb-3">
              <div class="card-header bg-info">
                <strong><h5><i class="fa fa-pie-chart" style="margin-right: 8px;"></i>Late Projects</h5></strong>
              </div>
              <div class="card-body">
                {!! $lateProjectChart->render() !!}
              </div>
            </div>
          </div>
        </div>
        @endif
        @if($user->role_id==3 || $user->role_id==4)
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="color: #079cff">Allocated Projects</h3>
                    <div class="card bg-light" style="border-top: 4px solid #009933;">
                        <div class="card-body">
                            <table class="table table-responsive-sm table-hover table-bordered">
                                <caption>Allocated Projects</caption>
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    @if($user->role_id == 3)
                                        <th scope="col">Delete/Edit</th>
                                    @endif
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
                                        @if($user->role_id == 3)
                                            <td>
                                                <a data-toggle="modal" data-target="#deleteProject" data-id="{{ $userProject->id }}" class="toModalDeleteProject"><i class="fa fa-trash-o fa-fw" style="color: red; margin-right: 10px;"></i></a>
                                                <a href="#"><i class="fa fa-pencil-square-o fa-fw" style="color: green;"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="/viewProjects" class="btn btn-success btn-sm pull-right">more details<i class="fa fa-angle-right" style="margin-left: 4px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
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
            @if($user->role_id == 3)
              <div>
                  <div class="card bg-light" style="border-top: 4px solid #008c99; margin-bottom: 30px;">
                      <div class="card-header">
                          User Feed
                      </div>
                      <div class="card-body">
                          <table class="table table-responsive-sm table-hover table-bordered">
                              <caption>User Feed</caption>
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Developer Name</th>
                                  <th scope="col">Email Address</th>
                                  <th scope="col">Skills</th>
                                  <th scope="col">Ratings</th>
                                  <th scope="col">Allocation</th>
                              </tr>
                              </thead>
                              <tbody>
                              @php
                                  $j=0
                              @endphp
                              @foreach($companyUsers as $companyUser)
                                  @if($companyUser->role == "Developer")
                                  <tr>
                                      <th scope="row">{{ ++$j }}</th>
                                      <td>{{ $companyUser->name }}</td>
                                      <td>{{ $companyUser->email }}</td>
                                      <td>Skills</td>
                                      <td>Ratings</td>
                                      <td>
                                         <a href="#"><i class="fa fa-user-plus fa-fw" style="color: red; margin-right: 10px;"></i></a>
                                      </td>
                                  </tr>
                                  @endif
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            @endif
        @endif
        @if($user->role_id==1)
        <div class="row">
            <div class="col-lg-12" id="users" style="cursor: pointer;" data-toggle="tooltip" title="click for more or less">
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading">Overview of Users</h5>
                    <p>What happens in employee side?</p>
                </div>
            </div>
        </div>
        @endif
        @if($user->role_id==1)
        <div class="row" id="userInfo">
            <div class="col-lg-12">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success">
                        <strong><h5><i class="fa fa-users" style="margin-right: 8px;"></i>Employees of the Company</h5></strong>
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
                          <strong><h5><i class="fa fa-users" style="margin-right: 8px;"></i>Categorisation of Employees</h5></strong>
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
                          <strong><p><i class="fa fa-users" style="margin-right: 8px;"></i>More Details</p></strong>
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
        @endif
          @if($user->role_id == 1)
            <div class="row">
                <div class="col-lg-12" id="events" style="cursor: pointer;" data-toggle="tooltip" title="click for more or less">
                    <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading">Overview of Events</h5>
                    <p>Trending Events of the company</p>
                    </div>
                </div>
            </div>
          @endif
          @if($user->role_id==1)
            <div class="row" id="eventInfo">
            <div class="col-lg-8">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary">
                        <strong><h5><i class="fa fa-calendar" style="margin-right: 8px;"></i>Events overview</h5></strong>
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
                        <strong><h5><i class="fa fa-calendar" style="margin-right: 8px;"></i>Top Event</h5></strong>
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
          @endif
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

