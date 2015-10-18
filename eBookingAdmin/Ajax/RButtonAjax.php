<?php
session_start();
$Rid = $_POST['Rid'];
$c = $_POST['c'];
$counter = 0;   
require "DBcon.php";

    $sql="SELECT * FROM details WHERE reservationID = '".$Rid."'";

	$result = mysql_query($sql);
	
    echo "<table id='RoomInnerTable'>";
    while ( $row = mysql_fetch_array($result) ){
    echo "<tr id='row".$c."-".$counter."'>";
    echo "<td id='RoomAmount'>".$row[3]."</td>";
    	$sql2="SELECT type FROM rooms WHERE id = '".$row[2]."'";

		$result2 = mysql_query($sql2);
    	while ( $row2 = mysql_fetch_array($result2) ){
    	
        echo "<td>".$row2[0]."</td>";
        echo "<td>";
       	echo "<input id='ReButton' name='ReButton' type='button' value='X' onclick='ReButtonAjax(".$Rid." , ".$c." ,".$counter.", ".$row[2].")'/>";
    	echo "</td>";
    	
    	}  
    $counter = $counter + 1;
    echo "</tr>"; 
    
  
                                                      
    }
    echo "<tr>";
    echo "<td colspan='2'><select id='RaSelector".$c."' name='Select1'>";
    	$sql3="SELECT  ID,Type FROM rooms";
    	$result3 = mysql_query($sql3);
        while ( $row3 = mysql_fetch_array($result3) ){
        echo "<option value='".$row3['ID']."'> ID: ".$row3['ID']." ".$row3['Type']."</option>";
	    }
    echo "</select></td>";
    
    echo "<td><input id='AddButton' name='AddButton' type='button' value='Add' onclick='RaButtonAjax(".$Rid." , ".$c.")'/></td>";
    echo "</tr>";
    echo "</table>";
    
    echo "<input id='hiddenCounter".$c."' type='hidden' value='".$counter."' />";  
 

?>
