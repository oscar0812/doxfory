<html>

<head>
  <meta charset="utf-8">
  <title></title>

  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/404.css" />
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="error-template">
          <h1>
                        Oops!</h1>
          <h2>
                        404 Not Found</h2>
          <div class="error-details">
            Sorry, an error has occured, Requested page not found!
          </div>
          <div class="error-actions">
            <a href="<?=$router->pathFor('home')?>" class="btn btn-primary btn-lg"><span class="fa fa-home"></span>Take Me Home
            </a><a href="#" class="btn btn-default btn-lg"><span class="fa fa-envelope"></span> Contact Support </a>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>
