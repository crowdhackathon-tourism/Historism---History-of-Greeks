<?php
session_start();
$Rid = $_POST['Rid'];
$c = $_POST['c'];
$counter = 0;   
require "../DBcon.php";

    $sql="SELECT * FROM `room".$Rid."prices`";

	$result = mysql_query($sql);
	
    echo "<table style='width:200px;' id='PriceInnerTable'>";
    echo "<tr>";
    echo "<th>From</th>";
	echo "<th>To</th>";
	echo "<th>Price</th>";
    echo "</tr>";
  
    while ( $row = mysql_fetch_array($result) ){
  	  $new_date0 = date('d M y', strtotime($row[0]));
  	  $new_date1 = date('d M y', strtotime($row[1]));
  	  echo "<tr id='row".$c."-".$counter."'>";
  	  echo "<td id='date_from' >".$new_date0."</td>";
  	  echo "<td id='date_to' >".$new_date1."</td>";
	  echo "<td >".$row[2]."€</td>";
	
  	  $counter = $counter + 1;
      echo "</tr>"; 
                                            
    }
  

    
    echo "</table>";
   





?>