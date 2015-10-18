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
		echo "<li><a href='destination-parent.html'>".$row['name']."</a></li>";
		echo "</ul>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</section>";
		
		?>

		<!-- Sub Navigation
		================================================== -->
		<!--<div class="sub-nav">
			<div class="navbar navbar-inverse affix-top" id="SubMenu">
				<div class="container">
					
					<div class="navbar-header">
						<a href="#" class="navbar-brand"><i class="fa fa-fw fa-map-marker"></i> San Francisco</a>
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
								<a href="directory-list.html" class="dropdown-toggle" data-toggle="dropdown">Directory <span class="caret"></span></a>
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
		</div><!-- /.sub-nav -->


		<!-- Main Section
		================================================== -->
		<section class="main">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-9 col-sm-12">

						<div class="row">

							<div class="col-md-3 col-sm-4 page-navigation">
								<ul class="nav nav-stacked">
									<?php 
										if($_GET['tcat'] == 68){
											echo "<li class='active'><a href=''>Διαμονή</a></li>";
										}
										else{
											echo "<li ><a href='index.php?p=list&ca=".$_GET['ca']."&tcat=68&tour=Accommodation'>Accommodation</a></li>";
										}
										
										if($_GET['tcat'] == 64){
											echo "<li class='active'><a href=''>Δραστηριότητες</a></li>";
										}
										else{
											echo "<li><a href='index.php?p=list&ca=".$_GET['ca']."&tcat=64&tour=Activities'>Activities</a></li>";
										}
										
										if($_GET['tcat'] == 63){
											echo "<li class='active'><a href=''>Αξιοθέατα</a></li>";
										}
										else{
											echo "<li><a href='index.php?p=list&ca=".$_GET['ca']."&tcat=63&tour=Attractions'>Attractions</a></li>";
										}
										
										if($_GET['tcat'] == 61){
											echo "<li class='active'><a href=''>Παραλίες</a></li>";
										}
										else{
											echo "<li><a href='index.php?p=list&ca=".$_GET['ca']."&tcat=61&tour=Beaches'>Beaches</a></li>";
										}
										
										if($_GET['tcat'] == 65){
											echo "<li class='active'><a href=''>Φύση</a></li>";
										}
										else{
											echo "<li><a href='index.php?p=list&ca=".$_GET['ca']."&tcat=65&tour=Nature'>Nature</a></li>";
										}
										
										if($_GET['tcat'] == 66){
											echo "<li class='active'><a href=''>Αγορές</a></li>";
										}
										else{
											echo "<li><a href='index.php?p=list&ca=".$_GET['ca']."&tcat=66&tour=Shopping'>Shopping</a></li>";
										}
									?>
								</ul>
							</div><!-- /.page-navigation -->

							<div class="col-md-9 col-sm-8">
								<div class="clearfix">
									<?php echo "<h1 class='pull-left page-title'>".$_GET['tour']."</h1>"; ?>
									
									<!--
									<div class="pull-right navbar-right filter-listing">
										<span>Sort by </span>
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-sm">Star Rating <span class="fa fa-angle-down"></span></button>
											<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu nav-condensed" role="menu">
												<li><a href="#">Star Rating <span class="fa fa-angle-down"></span></a></li>
												<li><a href="#">Star Rating <span class="fa fa-angle-up"></span></a></li>
												<li><a href="#">Price Rating <span class="fa fa-angle-down"></span></a></li>
												<li><a href="#">Price Rating <span class="fa fa-angle-up"></span></a></li>
											</ul>
										</div>
									</div>
									-->
								</div>

								
								<section class="guide-list">
								<?php
									
									$result_list = mysql_query("SELECT * FROM posts WHERE category = '".$_GET['tcat']."' AND destination_id = '".$row['id']."' ORDER BY created DESC") or die(mysql_error());
									while($row_list = mysql_fetch_array($result_list)){ 

									echo "<article class='media guide-list-item'>";
									echo "<div class='media-left media-top'>";
									echo "<a href='index.php?p=single&ca=".$_GET['ca']."&tcat=".$_GET['tcat']."&id=".$row_list['ID']."&title=".$row_list['title']."'>";
									echo "<img class='media-object' src='".$row_list['image']."' alt='".$row_list['title']."'>";
									echo "</a>";
									echo "</div>";
									echo "<div class='media-body'>";
									echo "<h4 class='media-heading'>".$row_list['title']."</h4>";
									echo "<div class='media-description'>";
									echo $row_list['description'];
									echo "</div>";
									echo "<div class='media-details'>";
									echo "<ul class='list-inline'>";
									echo "<li class='destination'><i class='fa fa-map-marker fa-fw'></i> <span>Destination Name</span></li>";
									echo "<li>";
									echo "<span class='rating rating-star'>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon'></i>";
									echo "</span>";
									echo "</li>";
									echo "<li>";
									echo "<span class='rating rating-price'>";
									//echo "<i class='fa fa-dollar icon highlighted'></i>";
									//echo "<i class='fa fa-dollar icon highlighted'></i>";
									//echo "<i class='fa fa-dollar icon highlighted'></i>";
									//echo "<i class='fa fa-dollar icon'></i>";
									//echo "<i class='fa fa-dollar icon'></i>";
									echo "</span>";
									echo "</li>";
									echo "</ul>";
									echo "</div>";
									echo "</div>";
									echo "</article>";
									}
									?>
								
								</section> <!-- /.guide-list -->
							</div><!-- /.page-content -->
						</div>
					</div>

					<!-- ///////////////////// -->
					<!-- ////// SIDEBAR ////// -->
					<!-- ///////////////////// -->

					<div class="col-md-3 col-sm-12 text-center">
						<div class="visible-sm visible-xs">&nbsp;</div>
						
					</div><!-- /.blog-sidebar -->

				</div><!-- /.row -->
			</div>
		</section>

