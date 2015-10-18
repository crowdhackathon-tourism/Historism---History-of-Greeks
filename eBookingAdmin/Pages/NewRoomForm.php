<?php

require "Ajax/DBcon.php";

$ID = $_POST['ID'];
$Type = $_POST['Type'];
$Description = $_POST['Description'];
$Capacity = $_POST['Capacity'];
$Price = $_POST['Price'];

mysql_query("INSERT INTO rooms (ID,Type,Available,Price,Description,Capacity) VALUES('".$ID."','".$Type."','0','".$Price."','".$Description."','".$Capacity."')");
mysql_query("ALTER TABLE  `availability` ADD  `".$ID."` VARCHAR( 4 ) NOT NULL");


echo " OK " ;
?>
