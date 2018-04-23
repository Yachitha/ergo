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

<body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header"><strong>Login</strong></div>
        <div class="card-body">
          <form action="/adminLogin" method="post">
            <div class="form group">
              <label for="email">Email</label>
              <input class="form-control" placeholder="Enter your email" type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter a valid email"/>
            </div>
            <div class="form group">
              <label for="password">Password</label>
              <input class="form-control" placeholder="Password" type="password" id="password" name="password" required pattern=".{6,}" title="password must contain at least 6 characters"/>
            </div>
            <div class="form group">
              <label for="remember">Remember Me</label>
              <input type="checkbox" id="remember" name="remember"/>
            </div>
            <div class="form-group">
              <input type="submit" id="login-submit" tabindex="1" class="form-control btn btn-success">
            </div>
            <div class="form-group">
              <div class="text-center">
                <a href="/forgotPassword">Forgot Password?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
