<!DOCTYPE html>
<? $home = $router->pathFor('home')?>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?=websiteName()?>
    </title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?=$home?>css/main/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$home?>css/main/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$home?>css/main/form-elements.css">
    <link rel="stylesheet" href="<?=$home?>css/user/register.css">
    <link type="text/css" rel="stylesheet" href="<?=$home?>css/user/agency.css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

  </head>

  <body>
    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent fixed-nav">
      <div class="container">

        <div class="navbar-header">
          <!-- Logo -->
          <div class="navbar-brand">
            <a href="<?=$home?>">
  						<img class="logo" src="img/logo.png" alt="logo">
  						<img class="logo-alt" src="img/logo-alt.png" alt="logo">
  					</a>
          </div>
          <!-- /Logo -->
        </div>
    </nav>
    <!-- /Nav -->
    <!-- Top content -->
    <div class="top-content">

      <div class="inner-bg">
        <div class="container">

          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text">
              <h1><strong>Login or Register</strong></h1>
              <div class="description">
                <p>
                  This step is neccessary to protect our users
                </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">

              <div class="form-box">
                <div class="form-top">
                  <div class="form-top-left">
                    <h3>Login to our site</h3>
                    <p>Enter email and password to log on:</p>
                  </div>
                  <div class="form-top-right">
                    <i class="fa fa-key"></i>
                  </div>
                </div>
                <div class="form-bottom">
                  <form role="form" action="" method="post" class="login-form">
                    <div class="form-group">
                      <label class="sr-only" for="email">Email</label>
                      <input type="text" name="email" placeholder="Email..." class="form-email form-control">
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="password">Password</label>
                      <input type="password" name="password" placeholder="Password..." class="form-password form-control">
                    </div>
                    <button type="submit" class="btn">Sign in!</button>
                  </form>
                </div>
              </div>

            </div>

            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

              <div class="form-box">
                <div class="form-top">
                  <div class="form-top-left">
                    <h3>Sign up now</h3>
                    <p>Fill in the form below to get instant access:</p>
                  </div>
                  <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                  </div>
                </div>
                <div class="form-bottom">
                  <form role="form" class="register-form">

                    <div class="form-group">
                      <label class="sr-only" for="username">Username</label>
                      <input type="text" name="username" placeholder="Username..." class="form-username form-control">
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="email">Email</label>
                      <input type="text" name="email" placeholder="Email..." class="form-email form-control">
                    </div>

                    <div class="form-group">
                      <label class="sr-only" for="password">Password</label>
                      <input type="password" name="password" placeholder="Password..." class="form-pass form-control">
                    </div>

                    <div class="form-group">
                      <label class="sr-only" for="confirm">Confirm Password</label>
                      <input type="password" name="confirm" placeholder="Confirm Password..." class="form-confirm-pass form-control">
                    </div>

                    <!--div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">About yourself</label>
				                        	<textarea name="form-about-yourself" placeholder="About yourself..."
				                        				class="form-about-yourself form-control" id="form-about-yourself"></textarea>
				                        </div-->
                    <button type="submit" class="btn">Sign me up!</button>
                  </form>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>

    </div>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">

          <div class="col-sm-8 col-sm-offset-2">
            <div class="footer-border"></div>
            <p>
              <?=copyright()?>
            </p>
          </div>

        </div>
      </div>
    </footer>

    <!-- Javascript -->
    <script src="<?=$home?>js/main/jquery.min.js"></script>
    <script src="<?=$home?>js/main/jquery.backstretch.min.js"></script>
    <script src="<?=$home?>js/main/bootstrap.min.js"></script>
    <script src="<?=$home?>js/main/jquery.validate.min.js"></script>
    <script src="<?=$home?>js/user/register.js"></script>

    <!--[if lt IE 10]>
            <script src="js/placeholder.js"></script>
        <![endif]-->

  </body>

  </html>
