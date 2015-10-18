<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>History of  Greeks!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="assets/css/owl-carousel.css" media="screen">
		<link rel="stylesheet" href="assets/css/slider.css" media="screen">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
 
	</head>
	
	<body class="home">

		<div id="top"></div>

		<!-- Navigation (main menu)
		================================================== -->
		

		<div class="navbar-wrapper">
			<header class="navbar navbar-default navbar-fixed-top" id="MainMenu">
				

				<div class="container-fluid collapse-md" id="navbar-main-container">
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand"><img alt="History of Greeks" src="assets/images/logo.png"><span class="sr-only">&nbsp; Epirus Greece!</span></a>
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<?php require('Menus/MainMenu.php'); ?>
				</div><!-- /.container-fluid -->
			</header>
		</div><!-- /.navbar-wrapper -->


		<?php
		if (isset($_GET['p'])){
			require('Pages/'.$_GET['p'].'.php');
		}
		else{
			require('Pages/home.php');
		}	
		?>
		<!-- Footer
		================================================== -->
		<footer id="footer">
			<section class="top-footer regular">
				<div class="container">
					<div class="row">

						<h3 class="hidden">More Resources</h3>

						<div class="col-lg-9">
							<div class="footer-content-left">

								<p style="font-size:14px; color:#aaa;">
									<a href="index.php?p=about">About History of Greeks</a> &nbsp; | &nbsp;
									<a href="/eBookingAdmin/">Sign in</a> &nbsp; | &nbsp;
									<a href="index.php?p=register">List your business to EpirusGreece</a> &nbsp; | &nbsp;
									<a href="index.php?p=destinations">Destinations</a> &nbsp; | &nbsp;
									<a href="index.php?p=blog">News & Article</a> &nbsp; | &nbsp;
									<a href="index.php?p=contact">Contact us</a>
								</p>

								<p style="font-size:14px; color: #999; margin-bottom:0;">
									<strong>Live in the present our past history. Live the brave and glorious Greek history.
									</strong>

									<br>In our website you can plan your holiday to historic tourist places
								</p>

							</div>
						</div>

						<div class="col-lg-3">
							<div class="footer-content-right">
								<div style="text-align: right;" class="visible-lg-block">
									<img src="assets/images/logo-black.png" alt="Epirus Greece" width="1024" height="565" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="sub-footer">
				<div class="container">
					<div class="row">

						<h3 class="hidden">About</h3>

						<div class="col-xs-12">
							<span style="color:#999; font-size: 15px;" class="pull-right">
								<a href="http://www.cactuserp.gr" target="_blank" class="text-info" style="text-decoration:none;">
									<!--<strong><i class="fa fa-pencil"></i> &nbsp; Visit Cactus</strong>-->
								</a>
							</span>

							<span style="color:#999; font-size: 13px;">&copy; 2015 Historism | History of Greeks.</span>
						</div>
					</div>
				</div>
			</section>
		</footer>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>