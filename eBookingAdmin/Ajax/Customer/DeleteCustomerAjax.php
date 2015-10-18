<?php
session_start();
$Cid =$_POST['Cid'];

require "../DBcon.php";

		mysql_query("DELETE FROM `Customer` WHERE ID='".$Cid."'");

        echo " ";
?>

