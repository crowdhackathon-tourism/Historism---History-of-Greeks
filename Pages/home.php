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
		<section >
			<div class="bg-overlay">
				<!--<div class="container">-->
					<div class="intro-wrap">
					
						<!--<h1 class="intro-title">Where the Journey Begins</h1>-->
						<!--<div class="intro-text"> Discover your next great adventure, <a href="#">become an explorer</a> to get started!</div>-->
					</div>
					<!--<div class="intro-wrap" style=" margin-left:980px;">
					<div class="well" style="max-width: 100%; margin: 0 auto 10px;">
							
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
					</div>-->
				<!--</div>-->
			</div>
		</section>
			

		<!-- Featured Destinations
		================================================== 
		<section class="featured-destinations">
			<div class="container">
				<div class="cards overlap">

					
					<div class="title-row">
						<h3 class="title-entry">Destinations</h3>
						<a href="index.php?p=destinations" class="btn btn-primary btn-xs">Find More &nbsp; <i class="fa fa-angle-right"></i></a>
					</div>

					
					<div class="row">
						
					<?php
					/*			
					$result = mysql_query("SELECT * FROM destinations WHERE (parent_id = '0' OR parent_id is null) ORDER BY created DESC LIMIT 0,4") or die(mysql_error());

					while($row = mysql_fetch_array($result)){ 

						echo "<div class='col-md-3 col-sm-6 col-xs-12'>";
						echo "<article class='card'>";
						echo "<a href='index.php?p=destination&ca=".$row['id']."' class='featured-image' style='background-image: url(".$row['image'].")'>";
						echo "<div class='featured-img-inner'></div>";
						echo "</a>";
						echo "<div class='card-details'>";
						echo "<h4 class='card-title'><a href='index.php?p=destination&ca=".$row['id']."'>".$row['name']."</a></h4>";
						echo "<div class='meta-details clearfix'>";
						echo "<ul class='hierarchy'>";
						echo "<li class='symbol'><i class='fa fa-map-marker'></i></li>";
						echo "<li><a href='destination-parent.html'>Epirus, Greece</a></li>";
						echo "</ul>";
						echo "</div>";
						echo "</div>";
						echo "</article>";
						echo "</div>";

					}
					*/
					?>	
						
					</div> 
				</div>
			</div>
		</section>
		-->

		<!-- Home Page Search Section
		================================================== 
		<section class="regular">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-4">
						<figure style="text-align:center">
							<img src="assets/images/logo-symbol-complex-colors.png" alt="GoExplore!" width="387" height="214">
						</figure>
					</div>
					<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-0">

						<div class="col-md-12 col-lg-10 col-lg-offset-1">
							<h3 style="text-align: center;">Be more than just another traveler when you <em>GoExplore!</em></h3>
						</div>
						<div class="col-sm-12">
							<form class="big-search">
								<input type="text" placeholder="Find Your Next Destination...">
								<button type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</section>
		-->

		<!-- Home Page Accordion Section
		================================================== -->
		<section class="regular background">
		<div class="slider">
			<a href='index.php?p=story&ca=1'><div class="slides">
			<p class="title"><q>By classical times indicate the period of ancient Greek history, about 200 years, from 499 BC until 323 BC, when there was a rapid boom in the field of culture. It took its name from the high achievements made during this period..</q>
			<span class="author">Classical ancient Greece</span>
			</p>
			</div></a>
			<div class="slides">
			<p class="title"><q>A nation on arms.</q>
			<span class="author">Greek Revolution </span>
			</p>
			</div>
			 <div class="slides">
			<p class="title"><q>The Greek empire of two continents and five seas</q>
			<span class="author">Byzantium </span>
			</p>
			</div><!--
			<div class="slides">
			<p class="title"><q>The butterfly counts not months but moments, and has time enough. </q>
			<span class="author">Rabindranath Tagore </span>
			</p>  
			</div>
			<div class="slides">
			<p class="title"><q>There are always flowers for those who want to see them.</q>
			<span class="author">Henri Matisse </span>
			</p>
			</div>-->
		</div>
		</section>
		
		<section class="regular background">
			<div class="container">
				<div class="row">	
					<div class="col-md-6 col-lg-4">
						<article class="card accordion-card">
							<header>
								<h3 class="section-title">Classical ancient Greece</h3>
								<p>By classical times indicate the period of ancient Greek history, about 200 years, from 499 BC until 323 BC, when there was a rapid boom in the field of culture. It took its name from the high achievements made during this period..</p>
								
							</header>
							<div class="accordion-panel">
								<div class="panel-group" id="accordion-1" role="tablist" aria-multiselectable="true">
									<!-- Guide Panel -->
									<?php
													
										$result = mysql_query("SELECT * FROM destinations WHERE story_id = '1' ORDER BY created DESC LIMIT 0,3") or die(mysql_error());
										$x=1;
									while($row = mysql_fetch_array($result)){

								
										echo "<div class='panel panel-default' style='background-image: url(".$row['image'].")';>";
										if($x == 1){
											echo "<div id='collapseOne' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>";
										
										}
										else if($x == 2){
											echo "<div id='collapseTwo' class='panel-collapse collapse' role='tabpane2' aria-labelledby='headingTwo'>";
										
										}
										else if($x == 3){
											echo "<div id='collapseThree' class='panel-collapse collapse' role='tabpane3' aria-labelledby='headingThree'>";
										
										}
										
										echo "<div class='panel-body'>";
										echo "<div class='read-more'>Details <i class='fa fa-arrow-right'></i></div>";
										echo "<a href='index.php?p=destination&ca=".$row['id']."&title=".$row['name']."'><div class='spacer'></div></a>";
										echo "</div>";
										echo "</div>";
										if($x == 1){
											echo "<a data-toggle='collapse' data-parent='#accordion-1' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>";
											
										}
										else if($x == 2){
											echo "<a data-toggle='collapse' data-parent='#accordion-1' href='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>";
											
										}
										else if($x == 3){
											echo "<a data-toggle='collapse' data-parent='#accordion-1' href='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>";
											
										}
										
										echo "<div class='panel-heading' role='tab' id='headingOne'>";
										echo "<div class='panel-icon'>";
										echo "<i class='fa fa-map-marker'></i>";
										echo "</div>";
										echo "<h4 class='panel-title'>".$row['name']."</h4>";
										echo "<ul class='hierarchy'>";
										echo "<li>History of Greece</li>";
										echo "</ul>";
										echo "</div>";
										echo "</a>";
										echo "</div>";
										$x++;
									}
									?>
							
								</div>
							</div>
							
							<footer><a href="#">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
						</article> <!-- /.accordion-card -->
					</div>

					<div class="col-md-6 col-lg-4">
						<article class="card accordion-card">
							<header>
								<h3 class="section-title">History Tourism</h3>
								<p>Live your myth in greece by visiting Ancient Dodona and many other acient destinations.</p>
							</header>
							<div class="accordion-panel">
								<div class="panel-group" id="accordion-2" role="tablist" aria-multiselectable="true">
									<!-- Guide Panel -->
									<?php
													
										$result = mysql_query("SELECT * FROM posts WHERE category = '63' ORDER BY created DESC LIMIT 0,3") or die(mysql_error());
										$x=1;
									while($row = mysql_fetch_array($result)){

								
										echo "<div class='panel panel-default' style='background-image: url(".$row['image'].")';>";
										if($x == 1){
											echo "<div id='collapseOne-2' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne-2'>";
										
										}
										else if($x == 2){
											echo "<div id='collapseTwo-2' class='panel-collapse collapse' role='tabpane2' aria-labelledby='headingTwo-2'>";
										
										}
										else if($x == 3){
											echo "<div id='collapseThree-2' class='panel-collapse collapse' role='tabpane3' aria-labelledby='headingThree-2'>";
										
										}
										
										echo "<div class='panel-body'>";
										echo "<div class='read-more'>Details <i class='fa fa-arrow-right'></i></div>";
										echo "<a href='index.php?p=single&ca=".$row['destination_id']."&tcat=63&id=".$row['ID']."&title=".$row['title']."'><div class='spacer'></div></a>";
										echo "</div>";
										echo "</div>";
										if($x == 1){
											echo "<a data-toggle='collapse' data-parent='#accordion-2' href='#collapseOne-2' aria-expanded='true' aria-controls='collapseOne-2'>";
											
										}
										else if($x == 2){
											echo "<a data-toggle='collapse' data-parent='#accordion-2' href='#collapseTwo-2' aria-expanded='true' aria-controls='collapseTwo-2'>";
											
										}
										else if($x == 3){
											echo "<a data-toggle='collapse' data-parent='#accordion-2' href='#collapseThree-2' aria-expanded='true' aria-controls='collapseThree-2'>";
											
										}
										
										echo "<div class='panel-heading' role='tab' id='headingOne'>";
										echo "<div class='panel-icon'>";
										echo "<i class='fa fa-map-marker'></i>";
										echo "</div>";
										echo "<h4 class='panel-title'>".$row['title']."</h4>";
										echo "<ul class='hierarchy'>";
										echo "<li>Epirus Greece</li>";
										echo "</ul>";
										echo "</div>";
										echo "</a>";
										echo "</div>";
										$x++;
									}
									?>
							
								</div>
							</div>
							<footer><a href="#">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
						</article> <!-- /.accordion-card -->
					</div>

					<div class="col-md-12 col-lg-4">
						<article class="card accordion-card">
							<header>
								<h3 class="section-title">Nature Tourism</h3>
								<p>Greece, Epirus is the ideal destination for nature lovers as it features lush vegetation.</p>
							</header>
							<div class="accordion-panel">
								<div class="panel-group" id="accordion-3" role="tablist" aria-multiselectable="true">
									<!-- Guide Panel -->
									<?php
													
										$result = mysql_query("SELECT * FROM posts WHERE category = '65' ORDER BY created DESC LIMIT 0,3") or die(mysql_error());
										$x=1;
										while($row = mysql_fetch_array($result)){

								
										echo "<div class='panel panel-default' style='background-image: url(".$row['image'].")';>";
										if($x == 1){
											echo "<div id='collapseOne-3' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne-3'>";
										
										}
										else if($x == 2){
											echo "<div id='collapseTwo-3' class='panel-collapse collapse' role='tabpane2' aria-labelledby='headingTwo-3'>";
										
										}
										else if($x == 3){
											echo "<div id='collapseThree-3' class='panel-collapse collapse' role='tabpane3' aria-labelledby='headingThree-3'>";
										
										}
										
										echo "<div class='panel-body'>";
										echo "<div class='read-more'>Details <i class='fa fa-arrow-right'></i></div>";
										echo "<a href='index.php?p=single&ca=".$row['destination_id']."&tcat=63&id=".$row['ID']."&title=".$row['title']."'><div class='spacer'></div></a>";
										echo "</div>";
										echo "</div>";
										if($x == 1){
											echo "<a data-toggle='collapse' data-parent='#accordion-3' href='#collapseOne-3' aria-expanded='true' aria-controls='collapseOne-3'>";
											
										}
										else if($x == 2){
											echo "<a data-toggle='collapse' data-parent='#accordion-3' href='#collapseTwo-3' aria-expanded='true' aria-controls='collapseTwo-3'>";
											
										}
										else if($x == 3){
											echo "<a data-toggle='collapse' data-parent='#accordion-3' href='#collapseThree-3' aria-expanded='true' aria-controls='collapseThree-3'>";
											
										}
										
										echo "<div class='panel-heading' role='tab' id='headingOne'>";
										echo "<div class='panel-icon'>";
										echo "<i class='fa fa-map-marker'></i>";
										echo "</div>";
										echo "<h4 class='panel-title'>".$row['title']."</h4>";
										echo "<ul class='hierarchy'>";
										echo "<li>Epirus Greece</li>";
										echo "</ul>";
										echo "</div>";
										echo "</a>";
										echo "</div>";
										$x++;
									}
									?>
							
								</div>
							</div>
							<footer><a href="#">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
						</article> <!-- /.accordion-card -->
					</div>

		        </div>
		    </div>
		</section>
