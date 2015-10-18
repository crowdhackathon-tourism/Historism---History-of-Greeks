		

		<!-- Hero Section
		================================================== -->
		<?php
		$result = mysql_query("SELECT * FROM posts WHERE ID = '".$_GET['id']."'") or die(mysql_error());
		$row = mysql_fetch_array($result);

		echo "<section class='hero destination-header' style='background-image: url(".$row['image'].");'>";
		echo "<div class='bg-overlay'>";
		echo "<div class='container'>";
		echo "<div class='intro-wrap'>";
		echo "<h1 class='intro-title'>".$row['title']."</h1>";
		echo "<div class='intro-text'>";
		echo $row['description'];
		echo "</div>";
		echo "<ul class='breadcrumbs'>";
		//echo "<!-- <li class="no-arrow"><a href="#" class="destination-context-menu"><i class="fa fa-ellipsis-v"></i><a></li> -->
		echo "<li class='no-arrow'><i class='icon fa fa-map-marker'></i></li>";
		echo "<li><a href='destination-parent.html'>".$row['title']."</a></li>";
		echo "</ul>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</section>";
		
		?>


		<!-- Sub Navigation
		================================================== 
		<div class="sub-nav">
			<div class="navbar navbar-inverse affix-top" id="SubMenu" style="top: 74px;">
				<div class="container">
				<?php	echo "<div class='navbar-header'> <a href='index.php?p=list&ca=".$_GET['ca']."&tcat=".$_GET['tcat']."' class='navbar-brand scrollTop'><i class='fa fa-fw fa-map-marker'></i>Back to Destination</a>"; ?>
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
		</div>
		-->

		<!-- Main Section
		================================================== -->
		
		<?php
			$mycat = '';
			$result_item = mysql_query("SELECT * FROM posts WHERE ID = '".$_GET['id']."'") or die(mysql_error());
			while($row_item = mysql_fetch_array($result_item)){ 
			
			echo "<section class='main'>";
			echo "<div class='container'>";
			echo "<div class='row'>";
			echo "<div class='col-sm-12 col-fixed-content'>";
			echo "<h1 class='page-title'>".$row_item['title']."</h1>";
			echo "<ul class='breadcrumbs local-path'>";
			//echo "<li><a href='destination-sub-page.html'>".$row['name'].", Greece</a></li>";
			//echo "<li class='no-arrow'><a href='directory-category.html'>Tours</a></li>";

			echo "<li class='no-arrow'>";
			echo "<div class='ratebox raterater-wrapper'>";
			//echo "<span class='rating rating-star'>";
			//echo "<i class='fa fa-star icon highlighted'></i>";
			//echo "<i class='fa fa-star icon highlighted'></i>";
			//echo "<i class='fa fa-star icon highlighted'></i>";
			//echo "<i class='fa fa-star icon highlighted'></i>";
			//echo "<i class='fa fa-star icon'></i>";
			echo "</span>";
			echo "</div>";
			echo "</li>";

			echo "<li class='no-arrow'>";
			echo "<div class='ratebox raterater-wrapper'>";
			//echo "<span class='rating rating-price'>";
			//echo "<i class='fa fa-dollar icon highlighted'></i>";
			//echo "<i class='fa fa-dollar icon highlighted'></i>";
			//echo "<i class='fa fa-dollar icon highlighted'></i>";
			//echo "<i class='fa fa-dollar icon'></i>";
			//echo "<i class='fa fa-dollar icon'></i>";
			echo "</span>";
			echo "</div>";
			echo "</li>";
			echo "</ul>";
			echo "<p class='lead'>".$row_item['description']."</p>";
			echo "<div class='row'>";
			echo "<div class='col-sm-12 col-lg-8'>";
			echo "<figure class='entry-thumbnail'>";
			echo "<p><img width='1200' height='800' src='".$row_item['image']."' class='attachment-post-thumbnail wp-post-image' alt='".$row_item['title']."'></p>";
			echo "</figure>";
			
			echo "<div class='hidden-lg'>";
			
			echo "<aside class='snapshot'>";
			echo "<h5>Address</h5>";
			echo "<p>123 South Coast Street";
			echo "<br> Thistown, ST 15633";
			echo "<br>";
			echo "<br> Arrivals and Departures - Start your day and end it here:";
			echo "<br>";
			echo "<br> 123 South Coast Street";
			echo "<br> Thistown, ST 15633</p>";
			echo "<h5>Phone</h5>";
			echo "<p>(321) 555-3445</p>";
			echo "<h5>Email</h5>";
			echo "<p>tours@example.com</p>";
			echo "<h5>Website</h5>";
			echo "<p>http://example.com</p>";
			echo "<h5>Tour Start</h5>";
			echo "<p>Daily departure, 9am from train station</p>";
			echo "<h5>Driving Directions</h5>";
			echo "<p>http://example.com/directions</p>";
			echo "</aside>";
			echo "</div>";
			echo "<div class='entry-content'>";
			echo $row_item['body'];
			echo "</div>";
			echo "</div>";
			if($row_item['category'] == '68'){
			echo "<div class='visible-lg-block col-lg-4'>";
			echo "<aside class='snapshot'>";
			echo "<h5>Address</h5>";
			echo "<p>123 South Coast Street";
			echo "<br> Thistown, ST 15633";
			echo "<br>";
			echo "<br> Arrivals and Departures - Start your day and end it here:";
			echo "<br>";
			echo "<br> 123 South Coast Street";
			echo "<br> Thistown, ST 15633</p>";
			echo "<h5>Phone</h5>";
			echo "<p>(321) 555-3445</p>";
			echo "<h5>Email</h5>";
			echo "<p>tours@example.com</p>";
			echo "<h5>Website</h5>";
			echo "<p>http://example.com</p>";
			
			echo "</aside>";
			
			echo "</div>";
			}
				echo "</div>";	
		
			
					if($row_item['category'] == '68'){
					?>
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
					<?php
					require ("Ajax/DB_hotel_users.php");
					
					$sql="SELECT * FROM users WHERE ID_Hotel = '".$_GET['id']."'";

					$result = mysql_query($sql);

					$mycounter  = mysql_num_rows($result);

					if($mycounter!=0){
									
						if(isset($_GET['chin']) && isset($_GET['chout'])){
							echo "<input type='hidden' id='load_asap' value='yes'>";
						}
						else {
							echo "<input type='hidden' id='load_asap' value='no'>";
						}
										
						echo "<link rel='stylesheet' type='text/css' media='all' href='assets/css/calendar1/jsDatePick_ltr.min.css'' />";

						echo "<script type='text/javascript' src='assets/js/calendar1/jsDatePick.min.1.3.js'></script>";
						
						echo "<script type='text/javascript' src='assets/js/booking/validation.js'></script>";
						
						echo "<script type='text/javascript' src='assets/js/booking/ArayAjaxPost.js'></script>";
						
						echo "<script type='text/javascript' src='assets/js/booking/checkit.js'></script>";
						
						echo "<script type='text/javascript' src='assets/js/booking/activate.js'></script>";
						
					$row = mysql_fetch_array($result) ;
					
					$_SESSION['current'] = $_GET['id'];
					
					$_SESSION['hotel'.$_GET['id']] = $row[0];
					
					$database = $row[3];
					
					$ip= $row[4];
					
					echo '<input id="database" type="hidden" value="'.$database.'" />';
					
					echo '<input id="ip" type="hidden" value="'.$ip.'" />';
										
					require "Ajax/DB_hotel.php";
					
					$sql = "SELECT distinct Type FROM rooms";
										
					?>
                    <h2 id="Book_a_Room">Book a Room</h2>

					<table>
					
					<tr>
					
					<td>
				
					<div class="property-filter pull-left" style="width: 220px">
                       	<div class="intro-wrap">
						<div class="well" style="max-width: 100%; margin: 0 auto 10px; color:white;">
                            <form method="get" action="?">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation" style="cursor:default">
                                        Check In
                                        <label id="nights" style="cursor:default;float:right"></label>
                                        <input name="Hidden1" id="daysH" type="hidden" value="0" />
                                    </label>
                                    <div class="controls">
                                       <div class="selectday_div">
                                        <input class="selectday"  id="timestamp"  type="Text"  name="timestamp" value="<?php echo $_GET['chin']; ?>"/>
                                       </div>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="inputType" style="cursor:default">
                                        Check Out
                                    </label>
                                    <div class="controls">
                                      <div class="selectday_div">
                                        <input class="selectday" id="timestamp1" type="text" name="timestamp1" value="<?php echo $_GET['chout']; ?>" />
                                      </div>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="beds control-group">
                                    <label class="control-label" for="inputBeds">
                                        Room Type
                                    </label>
                                    <div class="controls" style="cursor:default">
                                    	<?php
    										$result = mysql_query($sql);
											echo "<select class='selectday' id='roomtype' name='Select1' >";
											echo "<option ";
											if($_GET['type']=="All") 
												echo "selected"; 
											echo ">All</option>";
											while ($row = mysql_fetch_array($result)) {
												echo "<option";
												 if($_GET['type']==$row['Type'])  
												 	echo " selected"; 	
												 echo ">".$row['Type']."</option>";
											
											}
											echo "</select>";
										?>
												 	<!--<div id="nights" style="height: 25px; width: 100px;" align="center">2121</div>		-->
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->
              
                                <div class="form-actions">
                                    <input type="button" value="Check" onclick='javascript:check();' class="btn btn-primary btn-large">
                                    
                                    <input id='bookNow' type="button" value="Book now" style='margin-top:0px; ' onclick='javascript:AjaxArray();' class="btn btn-primary btn-large">
                               			<script>
                               				document.getElementById("bookNow").disabled=true;
                               				
                               			</script>
                               	</div>
                            </form>
                        </div>
						</div>
					</div>
					</td>
					<td style="width:100%; ">
					 	<div id="ava" style="height:100%;">
									
						</div>	
					</td>
					</tr>
					</table>
						
					<table id="Confirmation_Div">
						<tr>
						<td><input class="selectacti" id="ConfirmationCode" type="text" /></td>
						</tr>
						<tr>
						<td  id="button_TD" onclick='javascript:Click_Activation();'><center><label id='Book_Now_L' onclick='javascript:Click_Activation();'>Enter Reservation Code to Pay</label></center></td>
						</tr>
					</table>
						
				

					<?php 
					}
					}
					}
				
				echo "</div>";	
					?>
			
			
					<div class="col-sm-12 col-fixed-sidebar">
						<div class="sidebar-padder">
							<aside id="text-2" class="widget widget_text">
								<div class="textwidget"><img src="assets/images/sidebar-ad.jpg" width="300" height="600" alt="my travel agency" title="Find out where you belong."></div>
							</aside>
							<aside id="nav_menu-5" class="widget widget_nav_menu">
							<!--	<h3 class="widget-title">Top Destinations</h3>
								<div class="menu-top-destinations-container">
									<ul id="menu-top-destinations" class="menu">
										<li class="menu-item"><a href="destination-sub-page.html">London, England</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">Sydney, Australia</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">Chicago, USA</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">San Francisco, USA</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">Toronto, Canada</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">Buenos Aires, Argentina</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">Queenstown, New Zealand</a></li>
										<li class="menu-item"><a href="destination-sub-page.html">Santorini, Greece</a></li>
									</ul>
								</div>-->
							</aside>
						</div>
					</div>
				</div>
			</div>
		</section>

