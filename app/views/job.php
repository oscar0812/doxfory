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

	<!-- Blog -->
	<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Main -->
				<main id="main" class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
					<div class="blog">
						<div class="blog-img">
							<img id="pfp" class="media-object hand" src="<?=$job->getImage()?>" onerror="this.onerror=null;this.src='<?=$home?>img/blank_job.png';">
						</div>
						<div class="blog-content">
							<ul class="blog-meta">
								<li><i class="fa fa-user"></i><?=$job->getPostedByUser()->getFullName()?></li>
								<li><i class="fa fa-clock-o"></i><?=$job->getDatePosted()->format('d M')?></li>
								<!--li><i class="fa fa-comments"></i>57</li-->
							</ul>
							<h3><?=$job->getTitle()?></h3>
							<p><?=$job->getDescription()?></p>
						</div>

						<!-- blog tags -->
						<div class="blog-tags">
							<h5>Tags :</h5>
							<a href="#"><i class="fa fa-tag"></i>Web</a>
							<a href="#"><i class="fa fa-tag"></i>Design</a>
							<a href="#"><i class="fa fa-tag"></i>Marketing</a>
							<a href="#"><i class="fa fa-tag"></i>Development</a>
							<a href="#"><i class="fa fa-tag"></i>Branding</a>
							<a href="#"><i class="fa fa-tag"></i>Photography</a>
						</div>
						<!-- blog tags -->

						<!-- blog author -->
						<div class="agency-box">
							<div class="media">
								<div class="media-left">
									<img id="pfp" class="media-object" src="<?=$current_user->getProfilePicture()?>" onerror="this.onerror=null;this.src='<?=$home?>img/blank_pfp.png';">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h3><?=$current_user->getFullName()?></h3>
										<div class="author-social" id="contact-buttons">
											<?$contact = $current_user->getContactInfo()?>
											<?php // comments for below if statements
														// show buttons only if youre not visiting
														// or if you're visiting someone has info
														// per button
											?>
											<?php if($contact->hasPhoneNumber()){ ?>
											<a data-toggle="tooltip" data-placement="top" title="<?=$contact->getPhoneNumber()?>">
												<!-- put a tooltip on phone number -->
												<i class="fa fa-phone" data-url="Phone Number:" data-name="Phone Number" data-value="<?=$contact->getPhoneNumber()?>"></i>
											</a>
											<?php } if ($contact->hasFacebook()) { ?>
											<a>
												<i class="fa fa-facebook" data-url="https://www.facebook.com/" data-name="Facebook" data-value="<?=$contact->getFacebook()?>"></i>
											</a>
											<?php } if($contact->hasTwitter()) { ?>
											<a>
												<i class="fa fa-twitter" data-url="https://twitter.com/" data-name="Twitter" data-value="<?=$contact->getTwitter()?>"></i>
											</a>
											<?php } if($contact->hasInstagram()) { ?>
											<a>
												<i class="fa fa-instagram" data-url="https://www.instagram.com/" data-name="Instagram" data-value="<?=$contact->getInstagram()?>"></i>
											</a>
											<?php } ?>
										</div>
									</div>
									<p>About
										<?=$current_user->getFullName()?>
									</p>
								</div>
							</div>
						</div>
						<!-- /blog author -->

						<!-- blog comments -->
						<div class="blog-comments">
							<h3 class="title">(13) Comments</h3>

							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="<?=$home?>img/perso2.jpg" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
									<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
								</div>
							</div>
							<!-- /comment -->

							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="<?=$home?>img/perso1.jpg" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
									<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
								</div>

								<!-- author reply comment -->
								<div class="media author">
									<div class="media-left">
										<img class="media-object" src="<?=$home?>img/perso2.jpg" alt="">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
										<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
									</div>
								</div>
								<!-- /comment -->

								<!-- reply comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="<?=$home?>img/perso2.jpg" alt="">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
										<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
									</div>
								</div>
								<!-- /comment -->

							</div>
							<!-- /comment -->


							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="<?=$home?>img/perso.jpg" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
									<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
								</div>
							</div>
							<!-- /comment -->

						</div>
						<!-- /blog comments -->

						<!-- reply form -->
						<div class="reply-form">
							<h3 class="title">Leave a reply</h3>
							<form>
								<input class="input" type="text" placeholder="Name">
								<input class="input" type="email" placeholder="Email">
								<textarea placeholder="Add Your Commment"></textarea>
								<button type="submit" class="main-btn">Submit</button>
							</form>
						</div>
						<!-- /reply form -->
					</div>
				</main>
				<!-- /Main -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Blog -->

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.html"><img src="<?=$home?>img/logo-alt.png" alt="logo"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p><?=copyright()?></a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

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
	<script type="text/javascript" src="<?=$home?>js/user/agency.js"></script>

</body>

</html>
