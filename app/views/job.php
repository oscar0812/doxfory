<!DOCTYPE html>
<?php $home = $router->pathFor('home');
			$poster = $job->getPostedByUser();
			$accepter = $job->getAcceptedByUser();
?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=$home?>img/logo.png" type="image/x-icon">
	<link rel="icon" href="<?=$home?>img/logo.png" type="image/x-icon">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>
		<?=websiteName()?> | <?=$job->getTitle()?>
	</title>

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
	<div id="main_div" class="section sm-padding md-neg-btm">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Main -->
				<main id="main" class="col-md-9">
					<div class="blog">

						<div class="blog-img">
							<img class="media-object pfp" src="<?=$job->getImage()?>" onerror="this.onerror=null;this.src='<?=$home?>img/blank_job.png';">
						</div>

						<div class="blog-content">
							<ul class="blog-meta">
								<li class="url hand" data-url="<?=$router->pathFor('visiting_profile', ['id'=>$poster->getId()])?>"><i class="fa fa-user"></i>
									<?php if($posted_by_user){
										echo "You";
									} else{
										echo $user->getFullName();
									}
									?>
								</li>
								<li><i class="fa fa-clock-o"></i>
									<?=$job->getDatePosted()->format('d M')?>
								</li>
								<!--li><i class="fa fa-comments"></i>57</li-->
							</ul>
							<h3><?=$job->getTitle()?></h3>
							<p>
								<?=$job->getDescription()?>
							</p>
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

						<hr>
						<?php if($comments->count() != 0) { ?>
						<!-- blog comments -->
						<div class="blog-comments">

							<h3 class="title">(<span id="number"><?=$comments->count()?></span>) Comments</h3>

							<?php foreach ($comments as $comment) {
								$user = $comment->getUser();
							?>
							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img class="media-object small-pfp url hand" src="<?=$user->getProfilePicture()?>" onerror="this.onerror=null;this.src='<?=$home?>img/blank_pfp.png';" data-url="<?=$router->pathFor('visiting_profile', ['id'=>$user->getId()])?>">
								</div>
								<div class="media-body">
									<h4 class="media-heading"><?=$user->getFullName()?><span class="time"><?=commentTimestamp($comment)?></span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
									<p><?=$comment->getBody()?></p>
								</div>
							</div>
							<!-- /comment -->
							<?php } // /foreach?>

							<!-- comment
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="<?=$home?>img/perso1.jpg" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
									<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
								</div>

								<div class="media author">
									<div class="media-left">
										<img class="media-object" src="<?=$home?>img/perso2.jpg" alt="">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
										<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
									</div>
								</div>

								<div class="media">
									<div class="media-left">
										<img class="media-object" src="<?=$home?>img/perso2.jpg" alt="">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span><a href="#" class="reply">Reply <i class="fa fa-reply"></i></a></h4>
										<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
									</div>
								</div>

							</div>
							</comment -->

						</div>
						<!-- /blog comments -->
						<?php } // /if?>

						<div id="commentTemplate" class="media invisible">
							<div class="media-left">
								<img class="media-object small-pfp" src="" onerror="this.onerror=null;this.src='<?=$home?>img/blank_pfp.png';">
							</div>
							<div class="media-body">
								<h4 class="media-heading"><span class="time"></span></h4>
								<p></p>
							</div>
						</div>

						<!-- reply form -->
						<div class="reply-form">
							<h3 class="title">Leave a reply</h3>
							<form id="commentForm" method="POST" action="<?=$router->pathFor('comment', ['id'=>$job->getId()])?>">
								<textarea name="text" placeholder="Add Your Commment"></textarea>
								<button type="submit" class="main-btn">Submit</button>
							</form>
						</div>
						<!-- /reply form -->

					</div>
				</main>
				<!-- /Main -->

				<!-- Aside -->
				<aside id="aside" class="col-md-3">
				</aside>
				<!-- /Aside -- >

			</div>
			<!-- /Row -->

			</div>
			<!-- /Container -->
		</div>
	</div>
		<!-- /Blog -->


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
		<script type="text/javascript" src="<?=$home?>js/user/job.js"></script>
</body>

</html>
