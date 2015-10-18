		<!-- Hero Section
		================================================== -->
		<section class="hero small-hero" style="background-image:url(assets/images/hero-1.jpg);">
			<div class="bg-overlay">
				<div class="container" style="">
					<div class="intro-wrap">
						<h1 class="intro-title">Destinations</h1>
					</div>
				</div>
			</div>
		</section>


		<!-- Main Section
		================================================== -->
		<section class="main container">
			<div class="places">

				<h3 class="hidden">Places</h3>

				<div class="row">
				
				<?php
								
					$result = mysql_query("SELECT * FROM destinations ORDER BY RAND()") or die(mysql_error());

					while($row = mysql_fetch_array($result)){ 
						echo "<div class='col-sm-4'>";
						echo "<article class='place-box card'>";
						echo "<a href='index.php?p=destination&ca=".$row['id']."' class='place-link'>";
						echo "<header>";
						echo "<h3 class='entry-title'><i class='fa fa-map-marker'></i>".$row['name']."</h3></header>";
						echo "<div class='entry-thumbnail'><img width='960' height='540' alt='".$row['name']."' title='".$row['name']."' src='".$row['image']."'></div>";
						echo "</a>";
						echo "</article>";
						echo "</div>";
					}
				
				?>
				
				</div>
			</div>
		</section>

