<nav class="navbar-collapse collapse" id="navbar-main">

<?php
	require "Ajax/DBcon.php";
	
	$result = mysql_query("SELECT * FROM categories WHERE parent_id=0 OR parent_id IS NULL ORDER BY lft ASC") or die(mysql_error());
	
	echo "<ul class='nav navbar-nav navbar-right' >";
	while ($row = mysql_fetch_array($result)){
			$child=mysql_query("SELECT * FROM categories WHERE parent_id=".$row['id']." ORDER BY lft ASC") or die(mysql_error());
			if (mysql_num_rows($child) > 0){
				echo "<li class='dropdown show-on-hover'><a href='./' class='dropdown-toggle' data-toggle='dropdown'>".$row['name']."</a>";
				echo "<ul class='dropdown-menu'>";
				while ($row2 = mysql_fetch_array($child)){
					
					echo "<li><a href='index.php?p=".$row2['link']."'>".$row2['name']."</a></li>";
				}				
				echo "</ul>";
			}
			else{
				
				if(isset($_GET['p'])){
					
					if($_GET['p'] == $row['link']){
						echo "<li><a href='index.php?p=".$row['link']."' id='current' >".$row['name']."</a>";
					}
					else{
						echo "<li><a href='index.php?p=".$row['link']."'>".$row['name']."</a>";
					}
				
				}
				
				
				else{
					
					if($row['name'] == 'Αρχηκή'){
					echo "<li><a href='index.php?p=".$row['link']."' id='current' >".$row['name']."</a>";
					}
					else{
					echo "<li><a href='index.php?p=".$row['link']."'>".$row['name']."</a>";
					}
				}
			
			}
	    	echo "</li>";
		}
	
		echo "</ul>"
		
		
		
?>
</nav>