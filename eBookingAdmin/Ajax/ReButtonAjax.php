<?php
session_start();
$Rid = $_POST['Rid'];
$RoomType = $_POST['RoomType'];   
 
require "DBcon.php";




 $sql="SELECT Amount FROM details WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'";
 $result = mysql_query($sql);
 
    while ( $row = mysql_fetch_array($result) ){
    	if($row[0] == 1){
    	mysql_query("DELETE FROM details WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'");
    	echo " ";
    	}
    	else{
    	$y = $row[0] - 1;
    	mysql_query("UPDATE details SET `Amount` = '".$y."' WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'");
    	
    	$sql4="SELECT RoomType,Amount FROM details WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'";
        $result4 = mysql_query($sql4);
        while($row4 = mysql_fetch_array($result4)){
        
    	echo "<td id='RoomAmount'>".$row4[1]."</td>";
    	$sql20="SELECT type FROM rooms WHERE id = '".$row4[0]."'";

		$result20 = mysql_query($sql20);
    	while ( $row20 = mysql_fetch_array($result20) ){
    	
        echo "<td>".$row20[0]."</td>";
        echo "<td>";
       	echo "<input id='ReButton' name='ReButton' type='button' value='X' onclick='ReButtonAjax(".$Rid." , ".$c." , ".$row[2].")'/>";
    	echo "</td>";
    	

    	}}
	}
    }   
    
    
    
    
    
 $sql2="SELECT Date_In , Date_Out , Cost FROM reservations WHERE ID = '".$Rid."'";
 $result2 = mysql_query($sql2);
 
 	while ( $row2 = mysql_fetch_array($result2) ){
    	$sql3="SELECT Dates , `".$RoomType."` FROM availability WHERE Dates >= '".$row2['Date_In'] ."'  AND Dates < '".$row2['Date_Out']."'";
 		$result3 = mysql_query($sql3);
 		$i=0;	
 			while ( $row3 = mysql_fetch_array($result3) ){
				$dates[$i] = $row3['Dates'];
                $avaR[$i]=$row3[1];
                $i=$i+1;
			}
			
	      for ($n = 0; $n <count($avaR); $n++){
					 $y = ($avaR[$n] + 1);
					 mysql_query("UPDATE availability SET `".$RoomType."` = '".$y."' WHERE Dates = '".$dates[$n]."'");
 	      }

	}	
	
            



 


?>