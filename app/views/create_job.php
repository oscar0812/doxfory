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

	<link rel="shortcut icon" href="<?=$home?>img/logo.png" type="image/x-icon">
	<link rel="icon" href="<?=$home?>img/logo.png" type="image/x-icon">


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

  <!-- Form -->
  <div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section-header -->
        <div class="text-center">
          <h2 class="title">Post a new job</h2>
        </div>
        <!-- /Section-header -->

        <!-- main form -->
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
          <form class="contact-form" id="main_form" method="post" action="<?=$router->pathFor('create_job')?>" enctype="multipart/form-data">

						<div class="row bottom-padding">
							<img src="" alt="" id="image" height="120px;">
							<label>
                <button type="button" class="btn btn-primary" name="button" id="upload">Upload image</button>
              </label>
						</div>

            <div class="row">
              <input type="text" class="input" name="title" placeholder="Title">
							<br>
							<span class="text-danger"></span>

            </div>
            <div class="row">
              <textarea class="input" name="description" placeholder="Job Description"></textarea>
							<br>
							<span class="text-danger"></span>

            </div>

						<div class="row bottom-padding">
							<div class="col-md-3">
							</div>
							<div class="col-md-3">
								<span>Payment:</span>
								<select name="payment_select">
									<option value="IsOnlinePay">Online Pay</option>
									<option value="IsInPersonPay">Person to Person</option>
									<option value="IsBarter">Barter</option>
								</select>
							</div>
							<div class="col-md-4">
								<input type="text" class="input" name="payment_info" placeholder="$10.00">

								<br>
								<span class="text-danger"></span>
							</div>
							<div class="col-md-2">
							</div>

						</div>

						<div class="row">
							<input type="checkbox" name="notify" checked>
							<span> Notify me when someone accepts my job</span>
						</div>

            <div class="row">
              <button class="main-btn">Post Job</button>
            </div>

						<br>
						<span class="text-danger" id="small-alert" data-url="<?=$router->pathFor('jobs')?>"></span>
          </form>
        </div>
        <!-- /main form -->

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  <!-- /Form -->


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

	<div class="modal fade" id="jobImageModal" data-id="" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<strong class="modal-title">Upload an image showing the job</strong>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
				</div>
				<div class="modal-body">

					<div class="alert alert-danger invisible">

					</div>

					<form method="post" action="<?=$router->pathFor('upload_job_image')?>" enctype="multipart/form-data" id="jobImageForm">
						<label class="btn btn-default">
    							<input type="file" accept="image/*" name="jobImageUpload" id="jobImageUpload" hidden>

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
	<script type="text/javascript" src="<?=$home?>js/main/jquery.inputmask.bundle.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/global.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/agency.js"></script>
	<script type="text/javascript" src="<?=$home?>js/main/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=$home?>js/user/create_job.js"></script>

	</script>

</body>

</html>
