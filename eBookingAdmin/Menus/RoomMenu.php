<div id="menu">
<ul>

<?php
  			if($_GET['z'] ==  'all'){
            echo "<li><a class='active' href='index.php?p=rooms&z=all'>All</a></li>";
            }
            else{
            echo "<li><a  href='index.php?p=rooms&z=all'>All</a></li>";
            }
            
  			if($_GET['z'] ==  'new'){
            echo "<li><a class='active' href='index.php?p=rooms&z=new'>new</a></li>";
            }
            else{
            echo "<li><a  href='index.php?p=rooms&z=new'>new</a></li>";
            }

/*
require "Ajax/DBcon.php";

        $sql="SELECT  ID,Type FROM rooms";
    	$result = mysql_query($sql);
       
        while ( $row = mysql_fetch_array($result) ){
        	if($_GET['z'] ==  $row[0]){
            echo "<li><a class='active'  href='index.php?p=rooms&z=".$row[0]."'>".$row['ID']."</a></li>";
            }
            else{
            echo "<li><a  href='index.php?p=rooms&z=".$row[0]."'>".$row['ID']."</a></li>";
            }
        }
        */
?>



</ul>
</div>

				
				
		

