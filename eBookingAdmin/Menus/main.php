<center>
<ul id="mmenu">
			
				
			<?php
  			if(!isset($_GET['p'])){
            echo "<li class='green'><a class='active' href='index.php'>Home</a></li>";
            }
            else {
            echo "<li class='green'><a  href='index.php'>Home</a></li>";
            }
            
            if(($_GET['p']) == rooms){
            echo "<li class='yellow'><a class='active' href='index.php?p=rooms&z=all'>Rooms</a></li>";
            }
            else {
            echo "<li class='yellow'><a  href='index.php?p=rooms&z=all'>Rooms</a></li>";
            }
            
            if(($_GET['p']) == reservations){
            echo "<li class='red'><a class='active' href='index.php?p=reservations'>Reservations</a></li>";
            }
            else {
            echo "<li class='red'><a  href='index.php?p=reservations'>Reservations</a></li>";
            }
            
            if(($_GET['p']) == availability){
            echo "<li class='purple'><a class='active' href='index.php?p=availability'>Availability</a></li>";
            }
            else {
            echo "<li class='purple'><a  href='index.php?p=availability'>Availability</a></li>";
            }
            
            if(($_GET['p']) == customers){
            echo "<li class='blue'><a class='active' href='index.php?p=customers'>Customers</a></li>";
            }
            else {
            echo "<li class='blue'><a  href='index.php?p=customers'>Customers</a></li>";
            }
            
            require ('Ajax/DBcon1.php');
            $result = mysql_query("SELECT Username FROM users WHERE ID = '".$_SESSION['userID']."'");
            $row = mysql_fetch_array($result);
            if(($_GET['p']) == customers){
            echo "<li class='blue'><a class='active' href='index.php?p=customers'>".$row[0]."</a></li>";
            }
            else {
            echo "<li class='blue'><a  href='index.php?p=customers'>".$row[0]."</a></li>";
            }

            
            echo "<li class='blue'><a  href='Pages/logout.php'>Logout</a></li>";



             

    

?>

				
				
				
				
</ul>
</center>