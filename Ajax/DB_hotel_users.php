<?php
 
    $con=mysql_connect("127.0.0.1:3306","root","");

    	if(!$con){
		echo "could not connect".mysql_error();
	}

	$db_selected=mysql_select_db("hotelusers",$con);

	if(!$db_selected){
		echo "can't find hotelusers";
		exit();
	}


    mysql_set_charset('utf8',$con);





?>