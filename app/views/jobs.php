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

	<title>
		<?=websiteName()?> | all jobs
	</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,400|Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>

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
	<link type="text/css" rel="stylesheet" href="<?=$home?>css/user/profile.css" />


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

	<!-- Main Div -->
	<div id="main_div" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Main -->
				<main id="main" class="col-md-9">
					<h2 class="title">Jobs</h2>
					<?php foreach ($jobs as $job) { ?>
					<div class="row">
						<!-- blog author -->
						<div class="agency-box col-sm-12 col-md-12 col-lg-12 sm-neg-btm url" data-url="<?=$router->pathFor('job', ['id'=>$job->getId()])?>">
							<div class="media">
								<div class="media-left">
									<img class="media-object hand pfp" src="<?=$job->getImage()?>" onerror="this.onerror=null;this.src='<?=$home?>img/blank_job.png';">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h3 class="search-item"><?=$job->getTitle()?></h3>
										<div class="author-social">
										<p><?=$job->getPaymentString()?></p>
											<!--
										<a>
											<i class="fa fa-phone" data-url="Phone Number:" data-name="Phone Number" data-value="<?//=$contact->getPhoneNumber()?>"></i>
										</a>
										<a>
											<i class="fa fa-facebook" data-url="https://www.facebook.com/" data-name="Facebook" data-value="<?//=$contact->getFacebook()?>"></i>
										</a>
                    -->

										</div>
									</div>
									<p class="search-item">
										<?=$job->getDescription()?>
									</p>
								</div>
							</div>
						</div>
						<!-- /blog author -->
					</div>
					<?php } // end of $jobs foreach loop ?>
				</main>

				<!-- Aside -->
				<aside id="aside" class="col-md-3">

					<!-- Search -->
					<div class="widget">
						<div class="widget-search">
							<input class="search-input" id="search" type="text" placeholder="search">
							<button class="search-btn" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<!-- /Search -->

					<!-- Category -->
					<div class="widget">
						<h3 class="title">Category</h3>
						<div class="widget-category">
							<a href="#">Web Design<span>(7)</span></a>
							<a href="#">Marketing<span>(142)</span></a>
							<a href="#">Web Development<span>(74)</span></a>
							<a href="#">Branding<span>(60)</span></a>
							<a href="#">Photography<span>(5)</span></a>
						</div>
					</div>
					<!-- /Category -->

					<!-- Posts sidebar -->
					<div class="widget">
						<h3 class="title">Populare Posts</h3>

						<!-- single post -->
						<div class="widget-post">
							<a href="#">
									<img src="<?=$home?>img/post1.jpg" alt=""> Blog title goes here
								</a>
							<ul class="blog-meta">
								<li>Oct 18, 2017</li>
							</ul>
						</div>
						<!-- /single post -->

						<!-- single post -->
						<div class="widget-post">
							<a href="#">
									<img src="<?=$home?>img/post2.jpg" alt=""> Blog title goes here
								</a>
							<ul class="blog-meta">
								<li>Oct 18, 2017</li>
							</ul>
						</div>
						<!-- /single post -->


						<!-- single post -->
						<div class="widget-post">
							<a href="#">
									<img src="<?=$home?>img/post3.jpg" alt=""> Blog title goes here
								</a>
							<ul class="blog-meta">
								<li>Oct 18, 2017</li>
							</ul>
						</div>
						<!-- /single post -->

					</div>
					<!-- /Posts sidebar -->

					<!-- Tags -->
					<div class="widget">
						<h3 class="title">Tags</h3>
						<div class="widget-tags">
							<a href="#">Web</a>
							<a href="#">Design</a>
							<a href="#">Graphic</a>
							<a href="#">Marketing</a>
							<a href="#">Development</a>
							<a href="#">Branding</a>
							<a href="#">Photography</a>
						</div>
					</div>
					<!-- /Tags -->

				</aside>
				<!-- /Aside -->
			</div>
		</div>
	</div>
	<!-- /Main Div -->


	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">

				<div class="col-sm-12">
					<p class="text-center">
						<?=copyright()?>
					</p>
				</div>

			</div>
		</div>
	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->


	<!-- jQuery Plugins -->
	<script type="text/javascript" src="<?=$home?>js/main/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/global.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/agency.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/jobs.js"></script>

</body>

</html>
