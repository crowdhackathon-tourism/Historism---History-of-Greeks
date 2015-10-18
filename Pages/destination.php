<link rel='stylesheet' type='text/css' media='all' href='assets/css/calendar1/jsDatePick_ltr.min.css' />
<script type='text/javascript' src='assets/js/calendar1/jsDatePick.min.1.3.js'></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"timestamp",
			dateFormat:"%Y-%M-%d",
			limitToToday:true

		});
		new JsDatePick({
			useMode:2,
			target:"timestamp1",
			dateFormat:"%Y-%M-%d",
			limitToToday:true

		});
	};

	</script>

		<!-- Hero Section
		================================================== -->
		
		<?php
		$result = mysql_query("SELECT * FROM destinations WHERE id = '".$_GET['ca']."' ORDER BY created DESC") or die(mysql_error());
		$row = mysql_fetch_array($result);

		echo "<section class='hero destination-header' style='background-image: url(".$row['image'].");'>";
		echo "<div class='bg-overlay'>";
		echo "<div class='container'>";
		echo "<div class='intro-wrap'>";
		echo "<h1 class='intro-title'>".$row['name']."</h1>";
		echo "<div class='intro-text'>";
		echo $row['description'];
		echo "</div>";
		echo "<ul class='breadcrumbs'>";
		//echo "<!-- <li class="no-arrow"><a href="#" class="destination-context-menu"><i class="fa fa-ellipsis-v"></i><a></li> -->
		echo "<li class='no-arrow'><i class='icon fa fa-map-marker'></i></li>";
		echo "<li><a>".$row['name']."</a></li>";
		echo "</ul>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</section>";
		
		?>
		<!-- Sub Navigation
		================================================== -->
		<!--<div class="sub-nav">
			<div class="navbar navbar-inverse affix-top" id="SubMenu" style="top: 74px;">
				<div class="container">
					<div class="navbar-header">
						<a href="javascript:void(0)" class="navbar-brand scrollTop"><i class="fa fa-fw fa-map-marker"></i> North America</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-sub">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					
					<nav class="navbar-collapse collapse" id="navbar-sub">
						<ul class="nav navbar-nav navbar-left">
							<li><a href="destinations-list.html">Places</a></li>
							<li class="dropdown show-on-hover">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Information <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="guide-single.html">About</a></li>
									<li><a href="guide-single.html">Planning a Trip</a></li>
									<li><a href="guide-single.html">Getting Around</a></li>
									<li><a href="guide-single.html">History &amp; Culture</a></li>
									<li><a href="guide-single.html">Top Attractions</a></li>
									<li><a href="guide-single.html">Travel Resources</a></li>
									<li><a href="guide-single.html">Highlights</a></li>
									<li><a href="guide-single.html">Events</a></li>
									<li><a href="guide-single.html">Itineraries</a></li>
								</ul>
							</li>
							<li class="dropdown show-on-hover">
								<a href="directory-category.html" class="dropdown-toggle" data-toggle="dropdown">Directory <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="directory-category.html">Food &amp; Drinks</a></li>
									<li><a href="directory-category.html">Attractions</a></li>
									<li><a href="directory-category.html">Services</a></li>
									<li><a href="directory-category.html">Activities</a></li>
									<li><a href="directory-category.html">Shopping</a></li>
									<li><a href="directory-category.html">Nightlife</a></li>
									<li><a href="directory-category.html">Tours</a></li>
								</ul>
							</li>
							<li><a href="blog.html">Articles</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><i class="fa fa-fw fa-heart-o"></i></a></li>
							<li class="dropdown show-on-hover">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-share-alt"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><i class="fa fa-fw fa-facebook-official"></i> Facebook</a></li>
									<li><a href="#"><i class="fa fa-fw fa-twitter"></i> Twitter</a></li>
									<li><a href="#"><i class="fa fa-fw fa-google-plus"></i> Google +</a></li>
									<li><a href="#"><i class="fa fa-fw fa-pinterest"></i> Pinterest</a></li>
									<li><a href="#"><i class="fa fa-fw fa-instagram"></i> Instagram</a></li>
									<li><a href="#"><i class="fa fa-fw fa-envelope"></i> Email</a></li>
								</ul>
							</li>
							<li><a href="#" data-toggle="tooltip" title="Download in PDF format."><i class="fa fa-fw fa-file-pdf-o"></i></a></li>
							<li><a href="#" data-toggle="tooltip" title="Print and take with you!"><i class="fa fa-fw fa-print"></i></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>-->


		<!-- Main Section
		================================================== -->

		<section class="main">
			<div class="container">

				<h3 class="hidden">Destination</h3>

				<div class="row">
					<div class="col-sm-12 col-fixed-content">
						<h3 class="title-entry">Destination</h3> 
						<div class="intro">
							<p class="lead"><?php	echo $row['description']; ?></p>
							<div class="entry-content">
							<?php	echo $row['body']; ?>
							</div>
						</div>
						
					<?php
					
						$result = mysql_query("SELECT * FROM destinations WHERE story_id = '".$row['story_id']."' AND id != '".$row['id']."' ORDER BY created DESC") or die(mysql_error());
						
						$num_rows = mysql_num_rows($result);
						
						if($num_rows > 0){
							echo "<section class='narrow places'>";
							echo "<div class='title-row'>";
							echo "<h3 class='title-entry'>Places</h3> <a href='index.php?p=destinations' class='btn btn-primary btn-xs'>Find More &nbsp; <i class='fa fa-angle-right'></i></a></div>";
							echo "<div class='row'>";
							
								

							while($row_dest = mysql_fetch_array($result)){ 
								echo "<div class='col-sm-6'>";
								echo "<article class='place-box card'>";
								echo "<a href='index.php?p=destination&ca=".$row_dest['id']."' class='place-link'>";
								echo "<header>";
								echo "<h3 class='entry-title'><i class='fa fa-map-marker'></i>".$row_dest['name']."</h3></header>";
								echo "<div class='entry-thumbnail'><img width='960' height='540' alt='".$row_dest['name']."' title='".$row_dest['name']."' src='".$row_dest['image']."'></div>";
								echo "</a>";
								echo "</article>";
								echo "</div>";
							}
							
								
								
							echo "</div>";
							echo "</section>";
						}
						else{
						
						}
					
						$result_info = mysql_query("SELECT * FROM posts WHERE category = '60' AND destination_id = '".$row['id']."' ORDER BY created DESC") or die(mysql_error());
						
						$num_rows_info = mysql_num_rows($result_info);
						
						if($num_rows_info > 0){
						
							echo "<section class='narrow page-info'>";
							echo "<div class='title-row'>";
							echo "<h3 class='title-entry'>Information</h3> <a href='index.php?p=blog&tcat=60' class='btn btn-primary btn-xs'>Find More &nbsp; <i class='fa fa-angle-right'></i></a></div>";
							echo "<div class='row'>";
								
							$i = 1;
								while($row_info = mysql_fetch_array($result_info)){ 
									if($i == 1){
										echo "<div class='col-sm-12 col-lg-8'>";
									}
									else{
										echo "<div class='col-sm-6 col-lg-4'>";
									}
									echo "<a href='index.php?p=single&ca=60&id=".$row_info['ID']."' class='page-box-link'>";
									echo "<article class='page-box'>";
									echo "<h3 class='entry-title'>".$row_info['title']."</h3>";
									echo "<p class='entry-excerpt'>".$row_info['description']."</p>";
									echo "<p class='more-link'>Read more</p>";
									echo "<div class='page-box-destination'><span><i class='fa fa-map-marker'></i>".$row['name']."</span></div>";
									echo "</article>";
									echo "</a>";
									echo "</div>";
									$i++;
								}
								
							echo "</div>";
							echo "</section>";
						}
						?>
						<section class="narrow directory">
							<div class="title-row">
								<h3 class="title-entry">Tourist Guide</h3> <a href="index.php?p=blog" class="btn btn-primary btn-xs">Find More &nbsp; <i class="fa fa-angle-right"></i></a></div>
							<div class="row">
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='index.php?p=list&ca=".$_GET['ca']."&tcat=68&tour=Accommodation' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Accommodation</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="assets/images/directory-3.jpg" class="attachment-place wp-post-image" alt="spices"></div>
										</a>
									</article>
								</div>
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='index.php?p=list&ca=".$_GET['ca']."&tcat=61&tour=Beaches' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Beaches</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="Photos/beaches.jpg" class="attachment-place wp-post-image" alt="spices"></div>
										</a>
									</article>
								</div>
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='index.php?p=list&ca=".$_GET['ca']."&tcat=63&tour=Attractions' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Attractions</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="Photos/ancients.jpg" class="attachment-place wp-post-image" alt="park"></div>
										</a>
									</article>
								</div>
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='index.php?p=list&ca=".$_GET['ca']."&tcat=65&tour=Nature' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Nature</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="Photos/nature.jpg" class="attachment-place wp-post-image" alt="camera-old"></div>
										</a>
									</article>
								</div>
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='index.php?p=list&ca=".$_GET['ca']."&tcat=64&tour=Activities' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Activities</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="Photos/watersports-parga-s.jpg" class="attachment-place wp-post-image" alt="segway-tour"></div>
										</a>
									</article>
								</div>
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='index.php?p=list&ca=".$_GET['ca']."&tcat=66&tour=Shopping' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Shopping</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="Photos/shopping-s.jpg" class="attachment-place wp-post-image" alt="mall"></div>
										</a>
									</article>
								</div>
								
							</div>
						</section>
					
					</div>
					<div class="col-sm-12 col-fixed-sidebar">
						<div class="sidebar-padder">
							<aside class="widget widget_text">
							<div class="intro-wrap">
							<div class="well" style="max-width: 100%; margin: 0 auto 10px; color:white;">
							
							<form method="POST" action="index.php?p=results">
							<div class="form-group">
								<div class="col-lg-14">
									<label>Check In</label>
									<input type="text" class="form-control" id="timestamp"  name="timestamp" placeholder="Date">
								</div>
							</div>
								
							<div class="form-group">
								<div class="col-lg-14">
									<label>Check Out</label>
									<input type="text" class="form-control" id="timestamp1" name="timestamp1" placeholder="Date">
								</div>
							</div>
								
							<div class="form-group">
                               	<label class="control-label" for="roomtype">
								Room Type
								<select class='selectday' id='roomtype' name='Select' >
									<option>All</option>
									<option>Single</option>
									<option>Double</option>
									<option>Triple</option>
								</select>
							</label>
								  
                              </div>
								
								
							<button type="submit" class="btn btn-default btn-lg btn-block">Check</button>
							</form>
							</div>
							</div>
							</aside>
							
							<aside class="widget widget_nav_menu">
							<!--	<h3 class="widget-title">Top Destinations</h3>
								<div class="menu-top-destinations-container">
									<ul id="menu-top-destinations" class="menu">
										<li class="menu-item">
											<a href="destination-sub-page.html">London, England</a>
										</li>
										<li class="menu-item">
											<a href="destination-sub-page.html">Sydney, Australia</a>
										</li>
										<li class="menu-item">
											<a href="destination-sub-page.html">Chicago, USA</a>
										</li>
										<li class="menu-item">
											<a href="destination-sub-page.html">San Francisco, USA</a>
										</li>
										<li class="menu-item">
											<a href="destination-sub-page.html">Toronto, Canada</a>
										</li>
										<li class="menu-item">
											<a href="destination-sub-page.html">Buenos Aires, Arge
										ntina</a></li>
										<li class="menu-item">
											<a href="destination-sub-page.html">Queenstown, New Zealand</a>
										</li>
										<li class="menu-item">
											<a href="destination-sub-page.html">Santorini, Greece</a>
										</li>
									</ul>
								</div>-->
							</aside>
							
							<aside id="text-2" class="widget widget_text">
								<div class="textwidget"><img src="assets/images/sidebar-ad.jpg" width="300" height="600" alt="my travel agency" title="Find out where you belong."></div>
							</aside>
							
							
							
						</div>
					</div>
				</div>
			</div>
		</section>
