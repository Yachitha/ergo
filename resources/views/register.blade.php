<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register your Enterprise</title>
  <!-- Bootstrap core CSS-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
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

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><strong>Register Your company</strong></div>
      <div class="card-body">
        <form action="/adminRegister" method="post" onsubmit="return checkForm(this);">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="fname">First name</label>
                <input class="form-control" id="fname" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter your first name" required pattern="\w+">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="lname" name="lname" type="text" aria-describedby="nameHelp" placeholder="Enter your last name" required pattern="\w+">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="email" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="companyName">Company Name</label>
            <input type="text" class="form-control" id="companyName" name="companyName" aria-describedby="companyName" placeholder="Enter your company/Enterprise Name" required pattern="([A-z0-9À-ž\s]){2,}">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="passowrd">Password</label>
                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value); "  title="Password must contain at least 6 characters, including UPPER/lowercase and numbers">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="confirm-password" name="confirm-password" type="password" placeholder="Confirm password" title="Please enter the same Password as above" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
              </div>
            </div>
          </div>
          <input type="submit" name="register-submit" id="register-submit" class="btn btn-primary btn-block" value="Register Now">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/login">Login Page</a>
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
