<?php
    $con=mysql_connect("localhost:3306","root","");

    if(!$con){
		echo "could not connect".mysql_error();
	}

	$db_selected=mysql_select_db($database,$con);

	if(!$db_selected){
		echo "can't find user";
		exit();
	}


    mysql_set_charset('utf8',$con);




?>