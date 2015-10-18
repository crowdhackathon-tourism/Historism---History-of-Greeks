<?php
session_start();
$Username = $_POST['username'];
$Password = $_POST['password'];
require "../Ajax/DBcon1.php";



$sql = "SELECT * FROM users WHERE `Username` ='".$Username."' AND `Password` ='".$Password."'";
$result  = mysql_query($sql);
$row = mysql_fetch_array($result);


$_SESSION['userID']=$row[0]; 
$_SESSION['Database'] = $row[3];
$_SESSION['Ip'] = $row[4];
header("location: ../index.php");







?>