<!DOCTYPE html>
<?php $home = $router->pathFor('home')?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?=websiteName()?></title>

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
	<div class="section sm-padding" id="main_div">

		<div>
			<div class="container">
			<div class="row">
				<!-- blog author -->
				<div class="agency-box col-sm-12 col-md-12 col-lg-12 sm-neg-btm">
					<div class="media">
						<div class="media-left">
							<img id="pfp" class="media-object" src="<?=$current_user->getProfilePicture()?>" onerror="this.onerror=null;this.src='../img/blank_pfp.png';">
						</div>
						<div class="media-body">
							<div class="media-heading">
								<h3><?=$current_user->getFullName()?></h3>
								<div class="author-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</div>
							</div>
							<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
						</div>
					</div>
				</div>
				<!-- /blog author -->
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="box">
						<h3 class="">#ABOUT ME</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="box">
						<h3 class="">#Objective</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<h3 class="blue">#Education</h3>
						<ul class="timeline">
							<li class="timeline-inverted">
							  <div class="timeline-badge warning">1989</div>
							  <div class="timeline-panel">
								<div class="timeline-heading">
								  <h4 class="timeline-title">I was born in New Jersey</h4>
								</div>
								<div class="timeline-body">
								  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.</p>
								</div>
							  </div>
							</li>
							<li class="timeline-inverted">
							  <div class="timeline-badge danger">2004</div>
							  <div class="timeline-panel">
								<div class="timeline-heading">
								  <h4 class="timeline-title">Secondary Schooling</h4>
								  <p><small class="text-muted"><i class="fa fa-time"></i> From 1992 - 2004</small></p>
								</div>
								<div class="timeline-body">
								  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.</p>
								</div>
							  </div>
							</li>
							<li class="timeline-inverted">
							  <div class="timeline-badge">2006</div>
							  <div class="timeline-panel">
								<div class="timeline-heading">
								  <h4 class="timeline-title">High School</h4>
								  <p><small class="text-muted"><i class="fa fa-time"></i> From 2004 - 2006</small></p>
								</div>
								<div class="timeline-body">
								  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.</p>
								</div>
							  </div>
							</li>
							<li class="timeline-inverted">
							  <div class="timeline-badge success">2010</div>
							  <div class="timeline-panel">
								<div class="timeline-heading">
								  <h4 class="timeline-title">University</h4>
								  <p><small class="text-muted"><i class="fa fa-time"></i> From 2006 - 2010</small></p>
								</div>
								<div class="timeline-body">
								  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.</p>
								</div>
							  </div>
							</li>
						</ul>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<div class="box">
						<h3 class="blue">#Experience</h3>
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								  Current Job (2013-Present)
								</a>
							  </h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
							  <div class="panel-body">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								  Second Job (2011-2013)
								</a>
							  </h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
							  <div class="panel-body">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								  First Job (2010-2011)
								</a>
							  </h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
							  <div class="panel-body">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.
							  </div>
							</div>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<div class="box">
						<h3 class="blue">#Skills</h3>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
								<div class="skill-item">Ruby On Rails</div>
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
								<div class="skill-item">HTML</div>
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
								<div class="skill-item">CSS</div>
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								<div class="skill-item">JAVA</div>
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
								<div class="skill-item">JavaScript</div>
							</div>
						</div>
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
								<div class="skill-item">Bootstrap</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="box">
						<h3 class="blue">#Contact me</h3>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
								<div class="contact-item bigger-120">
								  <div class="icon green pull-left text-center"><span class="fa fa-phone fa-fw"></span></div>
								  <div class="title no-description">+1 204 000 000</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
								<div class="contact-item bigger-120">
								  <div class="icon red pull-left text-center"><span class="fa fa-envelope fa-fw"></span></div>
								  <div class="title no-description">jdoe@gmail.com</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
								<div class="contact-item bigger-120">
								  <div class="icon light-blue pull-left text-center"><span class="fa fa-skype fa-fw"></span></div>
								  <div class="title">Skype</div>
								  <div class="description">john.doe</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
								<div class="contact-item bigger-120">
								  <div class="icon blue pull-left text-center"><span class="fa fa-facebook fa-fw"></span></div>
								  <div class="title">Facebook</div>
								  <div class="description">https://www.facebook.com/facebook</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="box">
						<h3 class="blue">#Languages</h3>
						<ul class="list-group">
							<li class="list-group-item">
								<span class="badge badge-green">Fluent</span>
								English
							</li>
							<li class="list-group-item">
								<span class="badge badge-green">Written</span>
								French
							</li>
							<li class="list-group-item">
								<span class="badge badge-green">Weak</span>
								Hindi
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4">
					<div class="box hobbies">
						<h3 class="blue">#Hobbies</h3>
						<div class="row bigger-110">
							<div class="col-xs-6">
								<ul class="list-unstyled">
									<li>
										<span class="label label-danger">Photography <i class="fa fa-heart"></i></span>
									</li>
									<li>
										<span class="label label-primary">Movies <i class="fa fa-heart"></i></span>
									</li>
								</ul>
							</div>
							<div class="col-xs-6">
								<ul class="list-unstyled">
									<li>
										<span class="label label-default">Music <i class="fa fa-heart"></i></span>
									</li>
									<li>
										<span class="label label-warning">Guitar <i class="fa fa-heart"></i></span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
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



	<div class="modal fade" id="pfpModal" data-id="" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>Upload a new profile picture</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">

							<div class="alert alert-danger invisible">

							</div>

							<form method="post" action="<?=$router->pathFor('upload_pfp')?>" enctype="multipart/form-data" id="pfpForm">
								<label class="btn btn-default">
    							<input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" hidden>

								</label>
								<button class="btn button btn-primary" id="submit">Upload Image</button>

							</form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


	<!-- jQuery Plugins -->
	<script type="text/javascript" src="<?=$home?>js/main/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/agency.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/profile.js"></script>

	</script>

</body>

</html>
