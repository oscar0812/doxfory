<!DOCTYPE html>
<?php $home = $router->pathFor('home')?>
<html lang="en">

  <head>

    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" href="<?=$home?>img/logo.png" type="image/x-icon">
  	<link rel="icon" href="<?=$home?>img/logo.png" type="image/x-icon">

    <title><?=websiteName()?> | Reset password</title>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?=$home?>css/main/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="<?=$home?>css/main/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="<?=$home?>css/main/owl.theme.default.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="<?=$home?>css/main/magnific-popup.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?=$home?>css/main/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?=$home?>css/user/agency.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>

    <!-- Header -->
    <header>

      <?php require_once('templates/navbar.php') ?>

    </header>
    <!-- /Header -->

    <div class="row md-padding">
      <div class="alert alert-danger invisible">
      </div>
      <div class="container">

        <div class="row text-center">

          <div class="col-xs-2 col-md-3">
          </div>

          <div class="col-xs-8 col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <h3><i class="fa fa-lock fa-4x"></i></h3>
                <p>You can reset your password here</p>
                <div class="panel-body">

                  <div class="login-card">
                    <div class="form">
                      <form class="login-form">

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input placeholder="Password" class="form-control" type="password" name="password">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input placeholder="Confirm Password" class="form-control" type="password" name="confirm">
                          </div>

                          <label class="text-danger invisible"></label>
                        </div>

                        <button class="main-btn">Reset Password</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-2 col-md-3">
          </div>

        </div><!-- row -->
      </div><!-- container -->
    </div>




    <!-- jQuery Plugins -->
  	<script type="text/javascript" src="<?=$home?>js/main/jquery.min.js"></script>
  	<script type="text/javascript" src="<?=$home?>js/main/bootstrap.min.js"></script>
  	<script type="text/javascript" src="<?=$home?>js/main/owl.carousel.min.js"></script>
  	<script type="text/javascript" src="<?=$home?>js/main/jquery.magnific-popup.js"></script>
  	<script type="text/javascript" src="<?=$home?>js/user/agency.js"></script>

  </body>

</html>
