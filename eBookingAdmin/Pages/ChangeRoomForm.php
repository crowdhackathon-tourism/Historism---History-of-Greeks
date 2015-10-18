<?php
session_start();
require ('../Ajax/DBcon.php');

$roomID =$_POST['roomID'];
$Type =$_POST['roomType'];
$Description =$_POST['roomDescription'];
$Capacity =$_POST['roomCapacity'];

     
    
	
	if($Type != ""){
	mysql_query("UPDATE `rooms` SET Type = '".$Type."' WHERE ID = '".$roomID."'");	
	
	}
	
	if($Description != ""){
		mysql_query("UPDATE rooms SET `Description` = '".$Description."' WHERE ID = '".$roomID."'");
	
	}
	
	if($Capacity != ""){
		mysql_query("UPDATE rooms SET `Capacity` = '".$Capacity."' WHERE ID = '".$roomID."'");
	
	}
	
	
	header("location: ../index.php?p=rooms&z=all");

	
	




?>

