<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">



<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel="stylesheet" href="Css/popbox.css" type="text/css"/>
	<link rel="stylesheet" href="Css/menu.css" type="text/css" />
	<link rel="stylesheet" href="Css/tables.css" type="text/css" />
	<link rel="stylesheet" href="Css/login.css" type="text/css" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="Javascripts/Login/modernizr.js"></script>
			

	<?php
	
		 if ($_GET['p'] == 'reservations'){ 
	        echo'<script type="text/javascript" src="Javascripts/ReservationsAjax.js"></script>';  
	     }
	     else if ($_GET['p'] == 'rooms'){
	     	if($_GET['z'] == 'all'){
	     	 	echo'<script type="text/javascript" src="Javascripts/Room/All/Buttons.js"></script>';
						           
            	echo"<script type='text/javascript' src='Javascripts/jQuery.js'></script>";
		 		echo"<script type='text/javascript' src='Javascripts/Bubble/popbox.js'></script>";   
		 	
		 		echo"<script type='text/javascript' charset='utf-8'>";
   					echo" $(document).ready(function(){ ";
           			echo" $('.popbox').popbox();        ";
    				echo" });                          ";
  				echo"</script>";
  			}
  			else if($_GET['z'] == 'new'){
  				echo'<link rel="stylesheet" href="Css/jquery-ui.css" type="text/css" />';
  				echo'<script type="text/javascript" src="Javascripts/Room/New/NewButtons.js"></script>';
  				echo'<script src="Javascripts/calendar_jquery.min.js" type="text/javascript"></script>';
				echo'<script src="Javascripts/calendar_jquery-ui.min.js"  type="text/javascript"></script>';
            	echo'<script src="Javascripts/checkit.js"  type="text/javascript"></script>';
  			
  			}

	          
	     }
	     else if ($_GET['p'] == 'availability'){ 
	     	echo'<link rel="stylesheet" href="Css/jquery-ui.css" type="text/css" />';
	     	
	     	echo'<script src="Javascripts/calendar_jquery.min.js" type="text/javascript"></script>';
			echo'<script src="Javascripts/calendar_jquery-ui.min.js"  type="text/javascript"></script>';
			
			echo'<script src="Javascripts/Availability/check.js"  type="text/javascript"></script>';
	        echo'<script src="Javascripts/checkit.js"  type="text/javascript"></script>';
		         
	     }
	     else if ($_GET['p'] == 'customers'){ 
	        echo'<script src="Javascripts/Customer/DeleteButton.js"  type="text/javascript"></script>';
	        
	        echo"<script type='text/javascript' src='Javascripts/jQuery.js'></script>";
		 	echo"<script type='text/javascript' src='Javascripts/Bubble/popbox.js'></script>";   
		 	
		 	echo"<script type='text/javascript' charset='utf-8'>";
   				echo" $(document).ready(function(){ ";
           		echo" $('.popbox').popbox();        ";
    			echo" });                          ";
  			echo"</script>";
  		   

	     }
	     else{
	     
	     }

 

?>
</head>

<body>

<?php
if(!isset($_SESSION['userID'])){

	require ('Pages/login.php');

}
else{
	echo"<div id='banner' style='position: absolute; width:99%; height: 60px; top:0px;'>";

		echo"<div id='layer2' style=' position: absolute; height:35px;  left: 70%; top: 16px; width: 20%; '>";
			if (isset($_GET['z'])){
			require('Menus/RoomMenu.php'); 
			}
			
		echo"</div>";


		echo"<div id='column' style='width:100%;'>";
		
             require('Menus/main.php'); 
		
		echo"</div>";

	echo"</div>";

	echo"<div style='position: absolute; width:99%; height:80%; top:60px; z-index: 1' id='core'>";
		echo"<div style='position: absolute; width:100%;  height:100%; z-index: 1; top: 0px; overflow-y:scroll; ' id='desktop' >";
		   if (isset($_GET['p'])){
		      require('Pages/'.$_GET['p'].'.php');
		   }
		   else{ 
	          require('Pages/home.php'); 
	          }
		echo"</div>";
	echo"</div>";
	
	echo"<div style='border: 1px groove #000000; border-radius: 4px; position: absolute; width:99%; height:55px; top:91%;  background-color: #333333;' id='footer'>";
			
	echo"</div>";





	}



?>



</body>

</html>
