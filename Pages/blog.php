		<!-- Hero Section
		================================================== -->
		<?php
								
		$result_category = mysql_query("SELECT name FROM mcategories WHERE id='".$_GET['tcat']."'") or die(mysql_error());

		$row_category = mysql_fetch_array($result_category);
		?>
		<section class="hero small-hero" style="background-image:url(assets/images/hero-1.jpg);">
			<div class="bg-overlay">
				<div class="container" style="">
					<div class="intro-wrap">
						<h1 class="intro-title"><?php echo $row_category['name']; ?></h1>
					</div>
				</div>
			</div>
		</section>


		<!-- Blog Posts
		================================================== -->

		<section class="main container">

			<h2 class="text-center page-title hidden"><?php echo $row_category['name']; ?></h2>
			<!-- <hr class="small"></hr> -->

			<div class="row blog-posts">
				<div id="content" class="col-lg-12">
					<div class="row">
						
					<?php
								
					$result = mysql_query("SELECT * FROM posts WHERE category='".$_GET['tcat']."' ORDER BY created DESC") or die(mysql_error());

					while($row = mysql_fetch_array($result)){ 
					
					echo "<div class='col-lg-3 col-md-4 col-sm-6'>";
					echo "<article class='postg-living tag-memories tag-planning tag-route tag-tips tag-trip'>";
					echo "<div class='card'>";
					echo "<header class='entry-header'>";
					echo "<a href='index.php?p=single&ca=57&id=".$row['ID']."' rel='bookmark'>";
					if($row['image'] == 'Photos/'){
					
					}
					else{
						echo "<div class='entry-thumbnail' style='background-image: url(".$row['image'].")'> <img width='600' height='800' title='".$row['title']."' alt='".$row['title']."' src='".$row['image']."'></div>";
					}
					echo "<h2 class='entry-title'>".$row['title']."</h2>";
					echo "</a>";
					echo "</header>";
					$rest = substr($row['description'], 0, 260); 
					echo "<footer class='entry-meta clearfix' style='height:100px;'><span class='byline'><span class='author vcard'><a href='index.php?p=single&ca=57&id=".$row['ID']."' title='".$row['title']."' rel='author'>".$rest."</a></span></span></footer>";
					echo "</div>";
					echo "</article>";
					echo "</div>";
						
					} 
					?>					
					
					</div>
				</div>
			</div>
		</section>
