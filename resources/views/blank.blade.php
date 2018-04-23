<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{URL::to('/')}}/startbootstrap-sb-admin-gh-pages/css/sb-admin.css" rel="stylesheet">
</head>


<body class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> 
        <br />

        <form>
          <div class="form group">
            <label for="inputProjectName">ProjectName</label>
            <input class="form-control" placeholder="Project Name" type="text" id="inputProjectName" />
          </div>
          <div class="form group">
            <label for="inputCategory">Category</label>
            <input class="form-control" placeholder="Category" type="text" id="inputCategory" />
          </div>
          <div class="form group">
            <label for="inputStartDate">StartDate</label>
            <input class="form-control" placeholder="Start Date" type="text" id="inputSatrtDate" />
          </div>
          <div class="form group">
            <label for="inputEndDate">EndDate</label>
            <input class="form-control" placeholder="End Date" type="text" id="inputEndDate" />
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </div>
</body>

</html>
