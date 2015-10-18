<?php
session_start();
$Rid = $_POST['Rid'];
     
require "../DBcon.php";

    mysql_query("DELETE FROM `rooms` WHERE id='".$Rid."'");
  
    mysql_query("ALTER TABLE `availability`  DROP `".$Rid."`");

    mysql_query("DROP TABLE `room".$Rid."prices`");
    echo " ";


?>
