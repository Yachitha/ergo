<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>érgo - software project management tool</title>

    <!-- Bootstrap core CSS -->
    <link href="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://parsleyjs.org/src/parsley.css"></script> 
    <!--Custom styles for this template-->
  <link href="startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
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
     echo "<script type=\"text/JavaScript\">alert(\" the email has already taken\");</script>";
  }
  ?>
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
            <!--<li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#support">Support</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Learn</a>
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
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                   <div class="form-group">
                    <input type="text" name="companyName" id="companyName" tabindex="1" class="form-control" placeholder="Company name"  required pattern="\w+" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);
"  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" title="Please enter the same Password as above" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-6 col-xs-offset-3">
                        <input style="padding-left: 5px" type="submit" //name="register-submit" //id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
                      </div>
                    </div>
                  </div>
                                    <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
                </form>
                            </div>
                        </ul>
                    </li>

            <li class="nav-item dropdown">
                        <a href="/adminLogin" class="nav-link dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
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
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <input type="checkbox" tabindex="3" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>
                                            <div class="col-xs-5 pull-right">
                                                <input type="submit" id="login-submit" tabindex="4" class="form-control btn btn-success">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="https://kinna.000webhostapp.com/api/login" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
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
      <div class="carousel-caption" style="position: absolute; left: 15%; top:5%; text-shadow: 2px 2px #000000 ;opacity: .8">
        <h2>Hi there !!!</h2>
        <h6>Welcome to érgo - software project management tool</h6>
        <h4>Let's go with érgo</h4>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" alt="Chicago" width="100%" height="600px">
      <div class="carousel-caption" style="position: absolute; left: 15%; top:50%; text-shadow: 2px 2px #000000 ;opacity: .8">
        <h3>Keep your work organized</h3>
        <h3>Handle enterprice from home</h3>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/img4.jpg" alt="New York" width="100%" height="600px">
      <div class="carousel-caption" style="position: absolute; left: 15%; top:5%; text-shadow: 2px 2px #000000 ;opacity: .8">
        <h3>Keep in touch with mobile</h3>
        <p></p>
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
        <h1>What is érgo</h1>
        <p class="lead">the best software project management tool</p>
        <p>the upcoming solution for all the encounters happen in  managing software project. connects all the project team members , the management of the ongoing projects</p>
      </div>
    </section>

    <!-- Image Section - set the background image for the header in the line below -->
    <section class="py-5 bg-image-full" style="background-image: url('img/img3.jpg')">
      <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
      <div style="height: 200px;"></div>
    </section>

    <!-- Content section -->
    <section class="py-5" id="support">
      <div class="container">
        <h1>Support</h1>
        <p class="lead">Contact team TechKnigts</p>
        <p>Anytime you face inconvinence using the product, Use their hotline, send them a mail.</p>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <
        <p class="m-0 text-center text-white">Copyright &copy; team TechKnights 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
