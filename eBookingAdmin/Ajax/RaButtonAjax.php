<?php
session_start();
$Rid = $_POST['Rid'];
$RoomType = $_POST['RoomType'];  
$sum = 0;   


require "DBcon.php";


  	 $sql="SELECT Date_In , Date_Out FROM reservations WHERE ID = '".$Rid."'";
  	 $result = mysql_query($sql);
   	 while ( $row = mysql_fetch_array($result) ){
     	    $Date_In = $row['Date_In'];
     	    $Date_Out = $row['Date_Out'];
           

     }	

	 $sql2="SELECT MIN(`".$RoomType."`) AS SmallestNumberOfAvailable FROM availability WHERE Dates >= '".$Date_In."'  AND Dates <  '".$Date_Out."'  ";
     $result2 = mysql_query($sql2);
   	 while ( $row2 = mysql_fetch_array($result2) ){
     	    $sum=$row2['SmallestNumberOfAvailable'];
     }




     if($sum == 0 ){
     $counter = 0;   

     $sql="SELECT * FROM details WHERE reservationID = '".$Rid."'";

	 $result = mysql_query($sql);
	
     echo "<table id='RoomInnerTable'>";
     while ( $row = mysql_fetch_array($result) ){
     echo "<tr>";
     echo "<td id='RoomAmount'>".$row[3]."</td>";
     $sql2="SELECT type FROM rooms WHERE id = '".$row[2]."'";

		$result2 = mysql_query($sql2);
    	while ( $row2 = mysql_fetch_array($result2) ){
    	
        echo "<td>".$row2[0]."</td>";
        echo "<td>";
       	echo "<input id='ReButton' name='ReButton' type='button' value='X' onclick='ReButtonAjax(".$Rid." , ".$c." , ".$row[2].")'/>";
    	echo "</td>";
    	
    	}  
    $counter = $counter + 1;
    echo "</tr>"; 
    
  
                                                      
    }
    echo "</table>";
    
    echo "<input id='hiddenCounter".$c."' type='hidden' value='".$counter."' />";

     echo "There isn't avalable Room ";
     
     }
     else{
     
     $sql3="SELECT Dates , `".$RoomType."` FROM availability WHERE Dates >= '".$Date_In."'  AND Dates < '".$Date_Out."'";
 		$result3 = mysql_query($sql3);
 		$i=0;	
 			while ( $row3 = mysql_fetch_array($result3) ){
				$dates[$i] = $row3['Dates'];
                $avaR[$i]=$row3[1];
                $i=$i+1;
			}
			
	      for ($n = 0; $n <count($avaR); $n++){
					 $y = ($avaR[$n] - 1);
					 mysql_query("UPDATE availability SET `".$RoomType."` = '".$y."' WHERE Dates = '".$dates[$n]."'");
 	      }

     
     
    
 
   
 $sql55="SELECT Amount FROM details WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'";
 $result55 = mysql_query($sql55);
 

    	if($result55){
    	$row55=mysql_fetch_array($result55);
    	$y = $row55[0] + 1;
    	mysql_query("UPDATE details SET `Amount` = '".$y."' WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'");
    	}
 
  $sql5="SELECT COUNT(*) AS cc FROM details WHERE reservationID = '".$Rid."' AND RoomType = '".$RoomType."'";
  $result5 = mysql_query($sql5);
  $row5=mysql_fetch_array($result5);
   	if($row5['cc'] == 0){
   	mysql_query("INSERT INTO details (reservationID,RoomType,Amount) VALUES('".$Rid."','".$RoomType."','1')");
   	}
  	
     
     
     
     
     $counter = 0;   

     $sql="SELECT * FROM details WHERE reservationID = '".$Rid."'";

	 $result = mysql_query($sql);
	
     echo "<table id='RoomInnerTable'>";
     while ( $row = mysql_fetch_array($result) ){
     echo "<tr>";
     echo "<td id='RoomAmount'>".$row[3]."</td>";
     $sql2="SELECT type FROM rooms WHERE id = '".$row[2]."'";

		$result2 = mysql_query($sql2);
    	while ( $row2 = mysql_fetch_array($result2) ){
    	
        echo "<td>".$row2[0]."</td>";
        echo "<td>";
       	echo "<input id='ReButton' name='ReButton' type='button' value='X' onclick='ReButtonAjax(".$Rid." , ".$c." , ".$row[2].")'/>";
    	echo "</td>";
    	
    	}  
    $counter = $counter + 1;
    echo "</tr>"; 
    
  
                                                      
    }
  
    echo "</table>";
    
    echo "<input id='hiddenCounter".$c."' type='hidden' value='".$counter."' />";
     
     } 	   


?>
