<?php
    $con=mysql_connect($_SESSION['Ip'].":3306","cactuser_anestis","sheoHom9");

    if(!$con){
		echo "could not connect".mysql_error();
	}

	$db_selected=mysql_select_db($_SESSION['Database'],$con);

	if(!$db_selected){
		echo "can't find";
		exit();
	}

    mysql_set_charset('utf8',$con);






?>