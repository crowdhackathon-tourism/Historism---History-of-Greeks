<?php
    $con=mysql_connect("127.0.0.1:3306","root","");

    if(!$con){
		echo "could not connect".mysql_error();
	}

	$db_selected=mysql_select_db("hotel",$con);

	if(!$db_selected){
		echo "can't find";
		exit();
	}

    mysql_query("SET NAMES 'utf8'", $con);




?>