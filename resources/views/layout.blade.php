<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="{{URL::to('/')}}/download.png"/> -->
  <link rel="shortcut icon" href="/e.png" />
  <title>érgo</title>
    {!! Charts::assets() !!}
  <!-- Bootstrap core CSS-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <!-- imported for nav tab-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
   <script type="text/javascript">

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }

    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pwd1.value);
    return true;
  }

</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" style="background-image: url(background1.jpg);">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/companyProfile">{{ session('Cdata')->user->companyName }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          @if(session ('Cdata')->user->role_id == 1)
            <a class="nav-link" href="/ceoDashboard">
          @elseif(session ('Cdata')->user->role_id == 2)
            <a class="nav-link" href="/adminDashboard">
          @elseif(session ('Cdata')->user->role_id == 3)
            <a class="nav-link" href="/pmDashboard">
          @else
            <a class="nav-link" href="/developerDashboard">
          @endif
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
         <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
            <ul class="sidenav-second-level collapse" id="collapseProfile">
                @if(session('Cdata')->user->role_id<=2)
                    <li>
                        <a href="/addmember" class="nav-item">Add Users</a>
                    </li>
                @endif
                @if(session('Cdata')->user->role_id<=2)
                      <li>
                        <a href="/viewAllUsers" class="nav-item">View All Users</a>
                      </li>
                    @endif

                <li>
                  <a href="/viewUser" class="nav-item">View My Profile</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Projects">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProjects" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-bag"></i>
            <span class="nav-link-text">Projects</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseProjects">
           @if(session ('Cdata')->user->role_id<=3)
            <li>
               <a href="/createProjects" class="nav-item">Create Project</a>
            </li>
            <li>
              <a href="/viewProjects" class="nav-item">View All Projects</a>
            </li>
            @endif
            @if(session ('Cdata')->user->role_id>=3)
            <li>
                <a href="/viewProjects" class="nav-item">View My Projects</a> <!-- href link should be change -->
            </li>
            @endif
           </ul>
        </li>
        @if(session ('Cdata')->user->role_id>2)
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tasks">
          <a class="nav-link" href="/viewTasks">
            <i class="fa fa-fw fa-crosshairs"></i>
            <span class="nav-link-text">View My Tasks</span>
          </a>
        </li>
        @endif
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Events">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEvents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Events</span>
          </a>
           <ul class="sidenav-second-level collapse" id="collapseEvents">

           @if(session ('Cdata')->user->role_id<=2)
           <li>
              <a href="/createEvent" class="nav-item">Create Event</a>
           </li>
            <li>
              <a href="/viewEvents" class="nav-item">View Events</a>
            </li>
           @endif
           @if(session ('Cdata')->user->role_id>2)
             <li>
                 <a href="/viewEvents" class="nav-item">View Events</a>
             </li>
           @endif
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Notifications
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle" id="notifyCircle" style=" display: none;"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown" id="notification_dropdown">
            <h6 class="dropdown-header">New Notifications:</h6>
            <div class="dropdown-divider"></div>
            <div id="notifications">

            </div>
            <div class="dropdown-divider"></div>
          </div>
        </li>
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mr-lg-2" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-fw fa-user-circle" style="margin-right: 10px;"></i>
                  <span style="display: none;" class="indicator text-warning d-none d-lg-block">
                        <i class="fa fa-fw fa-circle" style="color: #1c7430; margin-right: 10px;"></i>
                  </span>
                  {{ session('Cdata')->user->fname }}
              </a>
              <div class="dropdown-menu" aria-labelledby="userDropdown">
                  <img src="" alt="profile_pic" id="profile_pic" style="width: 80px; height:80px; position: center; border-radius: 50%; margin-left: 50px; margin-top: 10px;">
                  <p style="text-align: center; margin-top: 10px;"><strong>{{ session('Cdata')->user->name }}</strong>
                      <br/>
                      @if(session('Cdata')->user->role_id == 1)
                          <span class="badge badge-success">CEO</span>
                      @elseif(session('Cdata')->user->role_id == 2)
                          <span class="badge badge-warning">Admin</span>
                      @elseif(session('Cdata')->user->role_id == 3)
                          <span class="badge badge-info">Project Manager</span>
                      @else
                          <span class="badge badge-primary">Developer</span>
                      @endif
                  </p>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/viewUser">
                      <i class="fa fa-user" style="margin-right: 8px;"></i>My profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/updateProfile">
                      <i class="fa fa-plus-square-o" style="margin-right: 8px;"></i>Update My Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                      <i class="fa fa-cog" style="margin-right: 8px;"></i>Settings
                  </a>

              </div>
          </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--content should start with content-wrapper class-->
        @yield('content')
    <footer class="sticky-footer">
      <div class="container">
          <div class="text-right">
              <small style="color: #585858;">Powered by: Team TechKnights</small>
          </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    {{--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/chart.js/Chart.min.js"></script>

    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    {{--<script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/js/sb-admin-datatables.min.js"></script>--}}
    {{--<script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/js/sb-admin-charts.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


  </div>
  <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
  <script>

      $(document).ready(function () {
         $("#alertsDropdown").click(function () {
             $("#notifyCircle").hide();
         });
      });

      function showCircle() {
          $(document).ready(function () {
              $("#notifyCircle").show();
          });
      }

      // Initialize Firebase
      var config = {
          apiKey: "AIzaSyDBqKcrpswoGN6G3lXZQs5T9LJtXcCW5xg",
          authDomain: "ergo-f87ae.firebaseapp.com",
          databaseURL: "https://ergo-f87ae.firebaseio.com",
          projectId: "ergo-f87ae",
          storageBucket: "ergo-f87ae.appspot.com",
          messagingSenderId: "282504905347"
      };
      firebase.initializeApp(config);

      // Get a reference to the database service
      var database = firebase.database();
      var myId = '{{ session ('Cdata')->user->userid }}';

      database.ref().child("notifications").child("projects").child(myId).on("child_added",function (snapshot) {
          if(snapshot.val()) {
              renderUI(snapshot.val());
          }
      });

      function renderUI(value) {
          showCircle();
          var notificationWrapper = $("#notification_dropdown");
          var notifications = $("#notifications");
          var existingNotifications = notifications.html();
          var keys = Object.keys(value);
          //for(var i=0; i<keys.length;i++){
              // noinspection JSAnnotator
              var newNotificationHtml = `
            <a class="dropdown-item" href="#">
                    <span class="text-success">
                        <strong><i class="fa fa-shopping-bag fa-fw" style="margin-right: 10px;"></i>Allocated to new project</strong>
                    </span>
                    <div class="dropdown-message small">`+value.senderName+` allocated you to the project<br> `+value.projectName+`</div>
                    <span class="small float-right text-muted">`+value.time+`</span>
            </a>
          `;
          //}
          notifications.html(newNotificationHtml + existingNotifications);
      }

      database.ref().child("notifications").child("projects").child(myId).on("child_added",function (snap) {
          var key = snap.key;
          if (snap.val().seen == false){
              if (!("Notification" in window)){
                  alert("This browser does not support for push notifications!");
              }
              else if (Notification.permission === "granted"){
                  var notify;
                  var audio = new Audio('/Notification/alert.mp3');
                  notify = new Notification('Allocated to project '+snap.val().projectName,{
                      body:snap.val().description+" by "+snap.val().senderName,
                      icon: '/img/img21.png',
                      sound: audio.play()
                  });
                  updateNotification(myId,key);
              }else if(Notification.permission !== "denied"){
                  Notification.requestPermission(function (permission) {
                     if(permission === "granted") {
                         var notify;
                         var audio = new Audio('/Notification/alert.mp3');
                         notify = new Notification('Allocated to project ' + snap.val().projectName, {
                             body: snap.val().description + " by " + snap.val().senderName,
                             icon: '/img/img21.png',
                             sound: audio.play()
                         });
                     }
                  });
                  updateNotification(myId,key);
              }
          }
      });

      function updateNotification(id,key) {
          database.ref().child("notifications").child("projects").child(id).child(key).update({
               seen: true
          });
      }

      function setNotification(receiverId){
          var projectName = document.getElementById('inputProjectName').value;
            database.ref().child("notifications").child("projects").child(receiverId).push().set({
                seen:false,
                senderName: "<?php echo session ('Cdata')->user->fname; ?>",
                description: "you have assigned to a new project",
                projectName: projectName,
                time: '{{ Carbon\Carbon::now ()->format ('H:m:s') }}'
            });
      }

      $(document).ready(function () {
          $("#btnCreate").click(function () {
              getDevId();
          });
      });
      
      function getDevId() {
          var devIdArray = document.getElementsByName('developers[]');
          for (var i=0; i<devIdArray.length; i++){
              if(devIdArray[i].checked){
                  setNotification(devIdArray[i].value);
              }
          }
      }

      $(document).ready(function () {
          getProfileUrl();
      });

      function getProfileUrl() {
             $.ajax({
                 url: '/userProfilePic',
                 success: function (data) {
                     setProfilePic(data.profile_pic);
                 },
                 error: function (jqXHR, textStatus, errorThrown) {
                     console.log("Save Data Error");
                 }
          });
      }

      function setProfilePic(profilePic){
          var url = 'uploads/profiles/'+profilePic;
          $('#profile_pic').attr('src',url);
      }

      function projectUpdate(id,name, description, start_date, end_date) {
          $("#project_edit").show();
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $("#project_id").attr('value',id);
          $("#extend_id").attr('value',id);
          $("#project_name").attr('placeholder',name);
          $("#project_description").attr('placeholder',description);
          $("#endDate").attr('placeholder',end_date);
          $("#extended_date").hide();
          $("#continue_btn").hide();
          $("#session_id").hide();
      }

      $("#extend_request").click(function () {
          $("#extended_date").fadeIn();
          $("#continue_btn").fadeIn();
      });
  </script>
</body>

</html>
