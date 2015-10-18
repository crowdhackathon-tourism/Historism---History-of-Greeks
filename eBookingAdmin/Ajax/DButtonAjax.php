<?php
session_start();
$Rid = $_POST['Rid'];
     
require "DBcon.php";

    $sql = "SELECT * FROM reservations WHERE id='".$Rid."'"; 
    $resault = mysql_query($sql);

    while($row = mysql_fetch_array($resault)){
    $Date_in= $row[2];
    $Date_out= $row[3];
    }
    
    
    $sql2 = "SELECT RoomType,Amount FROM details WHERE reservationID='".$Rid."'";
    $resault2 = mysql_query($sql2);
    $counter = 0 ;
    while($row2 = mysql_fetch_array($resault2)){
    $RoomType[$counter] = $row2[0];
    $Amount[$counter] = $row2[1];
    $counter++;
    }
    
    for($i=0;$i<$counter;$i++){
    	$sql3="SELECT Dates,`".$RoomType[$i]."` FROM availability WHERE Dates >= '".$Date_in ."'  AND Dates < '".$Date_out."'";
    	$result3 = mysql_query($sql3);

		   $j=0;
		   while ( $row3 = mysql_fetch_array($result3) ){
			       $dates[$j] = $row3['Dates'];
			  	   $avaR[$i][$j]=$row3[1];
    	   	  	   $j=$j+1;
		   } 
    }
    
    for($i=0;$i<$counter;$i++){
		
				 for ($n = 0; $n <count($avaR); $n++){
					 $y = ($avaR[$i][$n] + $Amount[$i]);

					 mysql_query("UPDATE availability SET `".$RoomType[$i]."` = '".$y."' WHERE Dates = '".$dates[$n]."'");
					 
				 }

    }





    $sql4 = "DELETE FROM reservations WHERE id='".$Rid."'"; 
    mysql_query($sql4);
    $sql5 = "DELETE FROM details WHERE reservationID='".$Rid."'"; 
    mysql_query($sql5);

    
    echo " ";


?>