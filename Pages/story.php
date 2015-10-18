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
		

		echo "<section>";
		echo "<div class='bg-overlay'>";
		
		echo "<div class='intro-wrap'>";
		
	
		require 'Ajax/DBcon.php';
		$sql = "SELECT * FROM destinations WHERE story_id='".$_GET['ca']."'";
		$result = mysql_query($sql);
		$i=0;
		echo "<div style='display:none'>";
		echo "<table>";
		while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td id='".$i."_name'>".$row['name']."</td>";
		echo "<td id='".$i."_lon'>".$row['lon']."</td>";
		echo "<td id='".$i."_lat'>".$row['lat']."</td>";
		echo "<td id='".$i."_description'>".$row['description']."</td>";
		echo "<td id='".$i."_id'>".$row['id']."</td>";
		echo "</tr>";
		$i++;
		}
		echo "</table>";
		echo "<label id='rows'>".$i."</label>";
		
			echo "</div>";
		echo "</div>";
		
		echo "</div>";
		echo "</section>";
		
		?>
		
		
	
		
    <div id="map" style="height: 550px; "></div>
	<script type="text/javascript">
	 var locations = new Array();
		 var rows = document.getElementById("rows").innerHTML;
	
		for(var i=0; i<rows; i++){
			locations[i]= new Array([document.getElementById(i+"_lon").innerHTML] , [document.getElementById(i+"_lat").innerHTML], [document.getElementById(i+"_name").innerHTML] , [document.getElementById(i+"_description").innerHTML], [document.getElementById(i+"_id").innerHTML]);
			
		}

	
	function initMap() {
		
		
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 8,
			mapTypeId: google.maps.MapTypeId.ROAD,
			center: {lat: +locations[0][0], lng: +locations[0][1]}
			
		
		
		});
		
		setMarkers(map);
		
	}var beaches = [
  ['Bondi Beach', -33.890542, 151.274856, 4],
  ['Coogee Beach', -33.923036, 151.259052, 5],
  ['Cronulla Beach', -34.028249, 151.157507, 3],
  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
  ['Maroubra Beach', -33.950198, 151.259302, 1]
];



function setMarkers(map) {
  
  var image = {
    url: 'assets/images/_marker.png',
    
    size: new google.maps.Size(45, 64),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
 
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
    var location = locations[i];
    var marker = new google.maps.Marker({
        position: {lat: +location[0], lng: +location[1]},
      map: map,
      icon: image,
      shape: shape,
      title: location[2],
      zIndex: beaches[0][4]
    });
  }
}
	</script>
	
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5Uhjt9_UwcYr-rb8Mv0yyA79tUU8KUVE&callback=initMap">
	</script>



      
  

		
	
		<section class="main">
			<div class="container">

				<h3 class="hidden">Destination</h3>
				
				<div class="row">
					<div class="col-sm-12 col-fixed-content">
						<?php 
						
						$sql_story = "SELECT * FROM stories WHERE id='".$_GET['ca']."'";
						$result_story = mysql_query($sql_story);
						while($row_story = mysql_fetch_array($result_story)){
							
							echo "<h3 class='title-entry'>".$row_story['title']."</h3>"; 
											
							echo "<div class='intro'>";
							echo "<p class='lead'>".$row_story['description']."</p>";
							echo "<div class='entry-content'>";
							echo $row_story['body'];
							echo "</div>";
							echo "</div>";
						}
				
					
						$result = mysql_query("SELECT * FROM destinations WHERE story_id = '".$_GET['ca']."' ORDER BY created DESC") or die(mysql_error());
						
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
								<h3 class="title-entry">More about Story</h3> <a href="index.php?p=blog" class="btn btn-primary btn-xs">Find More &nbsp; <i class="fa fa-angle-right"></i></a></div>
							<div class="row">
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>People</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="assets/images/directory-3.jpg" class="attachment-place wp-post-image" alt="spices"></div>
										</a>
									</article>
								</div>
								<div class="col-sm-6 col-lg-4">
									<article class="place-box card">
										<?php echo "<a href='' class='place-link'>"; ?>
											<header>
												<h3 class="entry-title"><i class="fa fa-folder"></i>Similar Stories</h3> </header>
											<div class="entry-thumbnail"> <img width="960" height="540" src="assets/images/directory-3.jpg" class="attachment-place wp-post-image" alt="spices"></div>
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
