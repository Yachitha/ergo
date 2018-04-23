<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login to your workplace</title>
  <!-- Bootstrap core CSS-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark" style="background-image: url({{ URL::to('/') }}/img/img4.jpg);">
  <div class="container">
    <div class="well" align="center" style="font-size: 32px; margin-top: 10px"><span class="label label-default"><strong>érgo</strong></span></div>
    <div class="card card-login mx-auto mt-5" style="opacity: 0.9">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="/adminLogin" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter a valid email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password" required pattern=".{6,}" title="Password should contains at least 6 characters">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
         <!--  <a class="btn btn-primary btn-block" href="/adminLogin">Login</a> -->
          <input type="submit" id="login-submit" tabindex="4" class="form-control btn btn-success">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/register">Register A New Company</a>
          <a class="d-block small" href="/forgotPassword">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
