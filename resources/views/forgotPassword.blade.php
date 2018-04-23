<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Forgot Password</title>
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
      <div class="card-header"><strong>Reset Password</strong></div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form action="/login" method="post">
          <div class="form-group">
            <input class="form-control" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email">
          </div>
          <div class="form-group">
            <input class="form-control btn btn-success" type="submit" id="reset-submit">
          </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/register">Register an Account</a>
          <a class="d-block small" href="/login">Login Page</a>
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
