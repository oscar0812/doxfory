<!DOCTYPE html>
<?php $home = $router->pathFor('home')?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=$home?>img/logo.png" type="image/x-icon">
	<link rel="icon" href="<?=$home?>img/logo.png" type="image/x-icon">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?=websiteName()?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

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
	<!-- Nav -->
	<nav id="nav" class="navbar fixed-nav">
	  <div class="container">

	    <div class="navbar-header">
	      <!-- Logo -->
	      <div class="navbar-brand">
	        <a href="#">
	          <img class="logo" src="<?=$home?>img/logo.png" alt="logo">
	          <img class="logo-alt" src="<?=$home?>img/logo-alt.png" alt="logo">
	        </a>
	      </div>
	      <!-- /Logo -->

	      <!-- Collapse nav button -->
	      <div class="nav-collapse">
	        <span></span>
	      </div>
	      <!-- /Collapse nav button -->
	    </div>

	    <!--  Main navigation  -->
	    <ul class="main-nav nav navbar-nav navbar-right">
	      <li><a href="<?=$router->pathFor('signout')?>" id="signout">Sign Out</a></li>
	    </ul>
	    <!-- /Main navigation -->

	  </div>
	</nav>
	<!-- /Nav -->


	<div class="row md-padding">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<div class="qlt-confirmation">
		    	<div class="panel panel-default">
		        <div class="panel-body">
		          <center>
		          	<h2><i class="fa fa-envelope"></i></h2>
		            <h2 class="desc">Thank you for signing up!<br>We've sent a confirmation link on your email.<br>Please visit your inbox.</h2>

		          <p class="notice"><b>Note:</b><br>This is part of our security policy. If you don't recieve an email check your spam box, or reload this page.</p>
						</center>

		        </div>
		  	</div>
		  </div>
		</div>
		<div class="col-md-3">
		</div>
	</div>


	<!-- jQuery Plugins -->
	<script type="text/javascript" src="<?=$home?>js/main/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/agency.js"></script>

</body>

</html>
