<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>érgo - software project management tool</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('/')}}/startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://parsleyjs.org/src/parsley.css"></script> 
    <!--Custom styles for this template-->
    <link href="{{URL::to('/')}}/startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>-->
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

  <?php
  if($error_code==401){
     echo "<script type=\"text/JavaScript\">alert(\" the Email has already been taken!\");</script>";
  }
  if($error_code==402){
    echo "<script type=\"text/JavaScript\">alert(\"Email and Password mismatch!\");</script>";
  }
  ?>

  <!-- styles -->
    <style type="text/css">
      .helpers {
        margin-top:30px;
        color:#4d94ff;
      }
      .helpers:hover{
        color:#0066ff;
      }
      .area-1{
        display:inline-block;
        text-align: center;
        height: 120px;
      }
      .area-1 h6{
        text-align: center;
        color:#4d94ff;
      }
      .area-1 h6:hover{
        color:#0066ff;
        text-decoration: none;
        font-weight: bold;
      }
      .area-1:hover{
        background-color:#e6f0ff;
      }
    </style>


  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">érgo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto" style="padding-right: 70px">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#support">Support</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#learn">Learn</a>
            </li>
            <li class="dropdown">
              <a href="/adminRegister" class="nav-link dropdown-toggle" data-toggle="dropdown">Register <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
              <div class="col-lg-12">
                <div class="text-center"><h3><b>Register</b></h3></div>
                <form id="ajax-register-form" style="width: 250px" action="/adminRegister" method="post" role="form" autocomplete="off"  onsubmit="return checkForm(this);">
                  <div class="form-group">
                    <input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="First name" value="" required pattern="\w+">
                  </div>
                   <div class="form-group">
                    <input type="text" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Last name" value="" required pattern="\w+">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="reg_email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                   <div class="form-group">
                    <input type="text" name="companyName" id="companyName" tabindex="1" class="form-control" placeholder="Company name"  required pattern="([A-z0-9À-ž\s]){2,}" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="reg-password" tabindex="1" class="form-control" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);
"  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" title="Please enter the same Password as above" id="confirm-password" tabindex="1" class="form-control" placeholder="Confirm Password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="register-submit" id="register-submit" tabindex="1" class="form-control btn btn-info" value="Register Now">
                  </div>
                    {{--<input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">--}}
                </form>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="/adminLogin" class="nav-link dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-lr animated slideInRight" style="width: 15rem" role="menu">
                <div class="col-lg-12">
                  <div class="text-center"><h3><b>Log In</b></h3></div>
                    <form id="ajax-login-form" style="width: 200px" action="/adminLogin" method="post" role="form" autocomplete="on">
                      <div class="form-group">
                        <label for="username">E-mail</label>
                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="E-mail" value="" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                      </div>
                      <div class="form-group">
                            <input type="checkbox" tabindex="3" name="remember" id="remember">
                            <label for="remember"> Remember Me</label>
                      </div>
                      <div class="form-group">
                          <input type="submit" id="login-submit" tabindex="4" class="form-control btn btn-success">
                      </div>
                      <div class="form-group">
                        <div class="text-center">
                            <a href="https://kinna.000webhostapp.com/api/login" tabindex="5" class="forgot-password">Forgot Password?</a>
                        </div>
                      </div>
                    {{--<input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">--}}
                    </form>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header - set the background image for the header in the line below -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img1.jpg" alt="Los Angeles" width="100%" height="600px">
      <div class="carousel-caption" style="position: absolute; left: 15%; top:5%; text-shadow: 2px 2px #000000 ; color:#f2f2f2; opacity: .9">
        <h1>The Best Way to Run your Enterprice</h1>
      </div>
      <div class="carousel-caption" style="position: absolute; left: 15%; top:60%; text-shadow: 2px 2px #000000 ; color:#f2f2f2; opacity: .9">
        <h4>Welcome to érgo - software project management tool</h4>
        <h1>Let&#39s go with érgo</h1>
      </div>  
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" alt="Chicago" width="100%" height="600px">
      <div class="carousel-caption" style="position: absolute; left: 15%; top:5%; text-shadow: 2px 2px #000000 ; color:#f2f2f2; opacity: .8">
        <h1>Is it Hard to Manage?</h1>
        <h3>We will manage it for you.</h3>
      </div>
      <div class="carousel-caption" style="position: absolute; left: 15%; top:60%; color:#000000">
        <h3>Keep your work organized</h3>
        <h1>Handle enterprice from home</h1>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/img4.jpg" alt="New York" width="100%" height="600px">
      <div class="carousel-caption" style="position: absolute; left: 15%; top:5%; text-shadow: 2px 2px #000000 ;opacity: .8">
        <h1>Keep in touch with mobile</h1>
      </div>
      <div class="carousel-caption" style="position: absolute; left: 15%; top:60%; color:#000000 ;">
        <h1>Just one tuch, your whole company in your hand.</h1>
        <h3>Our andriod and ios apps will manage your enterprice to top of the success</h3>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!--<img class="img-fluid d-block mx-auto" src="http://placehold.it/200x200&text=Logo" alt="">-->
<!-- Content section -->
    <section class="py-5" id="about">
      <div class="container" >
        <h1 style="text-align:center;">What is érgo</h1>
        <p class="lead" style="color:#cc6600 ; font-size:30px; text-align:center;">The ultimate solution for every team</p>
        <p style="color:#5c5c3d; font-size:20px; text-align:center;">The upcoming solution for all the encounters happen in managing software project. Connects all the project team members, the management of the ongoing projects</p>
        <div class="row">
          <div class="col-lg-3 area-1" id="manage">
            <i class="fa fa-line-chart fa-3x helpers"></i>
            <h6>Managing</h6>
          </div>
          <div class="col-lg-3 area-1" id="code">
            <i class="fa fa-code fa-3x helpers"></i>
            <h6>Coading</h6>
          </div>
          <div class="col-lg-3 area-1" id="support">
            <i class="fa fa-life-ring fa-3x helpers"></i>
            <h6>Supporting</h6>
          </div>
          <div class="col-lg-3 area-1" id="enterprise">
            <i class="fa fa-building-o fa-3x helpers"></i>
            <h6>Enterprise</h6>
          </div>
        </div>
        <div id="manageInfo" class="row" style="display:none; margin-top:10px; background-color:#e6f0ff;">
          <img src="img/img9.jpg" width="50%" height="300px">
            <div class="col-lg-4 offset-1">
              <h4 style="margin-top:20px;">
                Managing Teams
              </h4>
              <p style="color:#5c5c3d; font-size:20px; margin-top:20px;">
                Accelarte managing performance by evaluating the workflow trough érgo. Assigning tasks to most suitable person may help you to 
                properly manage the enterprise.
              </p>
            </div>
        </div>
        <div id="codeInfo" style="display:none; margin-top:10px; background-color:#e6f0ff;" class="row">
          <img src="img/img6.jpg" width="50%" height="300px">
          <div class="col-lg-4 offset-1">
            <h4 style="margin-top:20px;"> 
              Coading Teams
            </h4>
            <p style="color:#5c5c3d; font-size:20px; margin-top:20px;">
              Manage a project with érgo is really easy. We will tell you how. Communicating real time chatting and sharing 
              information about the project is easy now.
            </p>
          </div>
        </div>
        <div id="supportInfo" style="display:none; margin-top:10px; background-color:#e6f0ff;" class="row">
          <img src="img/img7.png" width="50%" height="300px">
          <div class="col-lg-4 offset-1">
              <h4 style="margin-top:20px;">
                Supporting Teams
              </h4>
              <p style="color:#5c5c3d; font-size:20px; margin-top:20px;">
                To meet the customer requirements and make a product success, team may have to go trough via risky path. Supporting 
                teams of the enterprise is really easy to work with érgo.
              </p>
            </div>
        </div>
        <div id="enterpriseInfo" style="display:none; margin-top:10px; background-color:#e6f0ff;" class="row">
          <img src="img/img8.jpg" width="50%" height="300px">
          <div class="col-lg-4 offset-1">
            <h4 style="margin-top:20px;">
              Enterprise
            </h4>
            <p style="color:#5c5c3d; font-size:20px; margin-top:20px;">
              érgo.techknights.com may definitly help your organization to be success.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section -->
    <section id="support" class="py-5">
      <div class="container">
        <h1 style="text-align:center;">Support</h1>
        <p class="lead" style="color:#cc6600 ; font-size:30px; text-align:center;">Contact team TechKnigts</p>
        <p style="color:#5c5c3d; font-size:20px; text-align:center;">Anytime you face inconvinence using the product,contact us via hotline or send us a email.</p>
        <div class="row">
          <div class="col-lg-6">
            <img src="img/soc-mail.png" width="80px" height="80px" style="margin-left:auto; margin-right:auto; display:block;">
            <p style="text-align:center; margin-top:10px; color:#5c5c3d;">
              send us email via
            </p>
            <p style="color:#5c5c3d; font-size:20px; margin-top:10px; text-align:center;">
              érgo.techknights@gmail.com
            </p>
          </div>
          <div class="col-lg-6">
            <img src="img/soc-phone.png" width="80px" height="80px" style="margin-left:auto; margin-right:auto; display:block;">
            <p style="text-align:center; margin-top:10px; color:#5c5c3d;">
              call érgo via
            </p>
            <p style="color:#5c5c3d; font-size:20px; margin-top:10px; text-align:center;">
              +94716850960  <b>or</b>  +94702337469
            </p>
          </div>
        </div>
      </div>
    </section>
    <section id="learn" class="py-5">
      <div class="container-fluid" style="background-color: #e6f5ff; height: 400px; text-align: center; vertical-align: middle; margin-top: 10px;">
        <p class="lead" style="color:#000000; font-size:40px;">
          Get started, It's free!
        </p>
          <p class="lead" style="color:#000000; font-size:20px;">
              As an admin or CEO of your company it is your responsibility to guide the enterprise to be the challenging enterprises in software industry. <br/>
              <b>One account to access all our apps as an enterprise, let's register your enterprise!</b>
          </p>
          {{--<img src="img/img10.png" alt="success your enterprise" style="width: 350px; height: 180px;"> <br/>--}}
        <button type="submit" class="btn btn-success btn-lg" style="border-radius: 30px; margin-top: auto;" onclick="location.href='/register'">Register Now</button> <br>
        <a href="/getdata1">Already have an account?</a>
      </div>
    </section>
    <!-- Footer -->
    <footer class="py-4 bg-dark">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                <p style="color: #ff5f5a; font-size: 30px;">
                  érgo
                </p>
                <p style="font-size: 18px; color: #a1a1a1">
                  <i class="fa fa-quote-left" style="margin-right: 5px;"></i>
                  érgo is a platform which enables drive your enterprise to the peak of the success.
                  Manage software projects in a familier way.
                </p>
              </div>
              <div class="col-md-4">
                  <nav>
                      <a href="/landing" style="color: #ff5f5a"><h6>HOME</h6></a>
                      <a href="#about" style="color: #ffffff"><h6>ABOUT</h6></a>
                      <a href="#support" style="color: #ffffff"><h6>SUPPORT</h6></a>
                      <a href="#learn" style="color: #ffffff"><h6>LEARN</h6></a>
                      <h6 style="color: #ffffff">FOLLOW US:</h6>
                      <ul class="nav">
                        <li><a href="https://facebook.com"><i class="fa fa-facebook" style="color: #ffffff; margin-right: 10px;"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fa fa-twitter" style="color: #ffffff; margin-right: 10px;"></i></a></li>
                        <li><a href="https://linkedin.com"><i class="fa fa-linkedin" style="color: #ffffff; margin-right: 10px;"></i></a></li>
                        <li><a href="https://github.com"><i class="fa fa-github" style="color: #ffffff; margin-right: 10px;"></i></a></li>
                      </ul>
                  </nav>
              </div>
              <div class="col-md-4">
                  <p style="color: #ff5f5a; font-size: 20px;">
                    Contact Us
                  </p>
                  <p style="font-size: 15px; color: #ffffff">
                      érgo,<br>
                      Project by Team Techknights, <br>
                      Faculty of Information Technology, <br>
                      University of Moratuwa, <br>
                      Sri Lanka. <br>
                  </p>
              </div>
          </div>
          <hr color="#ffffff">
          <p class="text-white">Copyright &copy; 2018 team TechKnights</p>
          <hr color="#ffffff">
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(
        function() {
        $("#manage").click(function() {
            $("#manageInfo").fadeIn();
            $("#codeInfo").hide();
            $("#supportInfo").hide();
            $("#enterpriseInfo").hide();
        });
      });
      $(document).ready(
        function() {
        $("#code").click(function() {
            $("#codeInfo").fadeIn();
            $("#manageInfo").hide();
            $("#supportInfo").hide();
            $("#enterpriseInfo").hide();
        });
      });
      $(document).ready(
        function() {
        $("#support").click(function() {
            $("#supportInfo").fadeIn();
            $("#manageInfo").hide();
            $("#codeInfo").hide();
            $("#enterpriseInfo").hide();
        });
      });
      $(document).ready(
        function() {
        $("#enterprise").click(function() {
            $("#enterpriseInfo").fadeIn();
            $("#manageInfo").hide();
            $("#codeInfo").hide();
            $("#supportInfo").hide();
        });
      });

    </script>
  </body>
</html>
