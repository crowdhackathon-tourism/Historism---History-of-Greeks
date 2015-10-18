<?php
session_start();
require ('../Ajax/DBcon.php');

$customerID =$_POST['customerID'];
$Fname =$_POST['customerFname'];
$Lname =$_POST['customerLname'];
$Email =$_POST['customerEmail'];
$Phone =$_POST['customerPhone'];
     
    
	
	if($Fname != ""){
	mysql_query("UPDATE `customer` SET  Fname = '".$Fname."' WHERE ID = '".$customerID."'");	
	
	}
	
	if($Lname != ""){
		mysql_query("UPDATE `customer` SET Lname = '".$Lname."' WHERE ID = '".$customerID."'");
	
	}
	
	if($Email != ""){
		mysql_query("UPDATE `customer` SET Email = '".$Email."' WHERE ID = '".$customerID."'");
	
	}
	if($Phone != ""){
		mysql_query("UPDATE `customer` SET Phone = '".$Phone."' WHERE ID = '".$customerID."'");
	
	}

	
	
	header("location: ../index.php?p=customers");

	
	




?>
