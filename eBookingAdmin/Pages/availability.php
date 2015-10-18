<?php

$counter = 0;

require "Ajax/DBcon.php";

   $result = mysql_query("SELECT * FROM availability ORDER BY `Dates` ASC LIMIT 30");
   echo "<div style='position:absolute; left:22%; width:78%;' id='myava' >"; 
   echo "<table class='reser' id='mytable' cellspacing='0' summary='The technical specifications of the Apple PowerMac G5 series';>";
   

   echo "<tr>"; 
   echo "<th scope='col' abbr='Configurations' class='nobg'>Dates</th>";
 

   for($i=1; $i<mysql_num_fields($result); $i++){
   		$meta = mysql_fetch_field($result, $i);
  
   
   echo "<th scope='col'>";
   echo "Room ID: ". $meta->name;
   echo "</th>";

   }
 
   
   
  echo "</tr>";

   
   
   
   while ( $row = mysql_fetch_array($result) ){
   echo "<tr id='row".$counter."'>";
    $date = date('d M y', strtotime($row[0]));
    echo " <th scope='row' abbr='Model' class='spec'>$date</th>";

   	for($i=1; $i<mysql_num_fields($result); $i++){
   		$meta = mysql_fetch_field($result, $i);
        echo "<td>";
        echo $row[$i];
        echo "</td>";

   }



 
   echo "</tr>";
   $counter++;

   }
   echo "</table>";
   echo "</div>";
   echo "<div style='position:absolute; width:15%;' id='check'>";
   echo "<table id='mytable' cellspacing='0' >";
   		echo "<tr>";
        echo "<th scope='col' colspan='2'>";
		echo "<label>Check Availability</label>";
        echo "</th>";
        echo "</tr>";

   		echo "<tr>";
        echo "<th scope='row' abbr='Model' class='spec'>From</th>";
        echo "<th scope='col'>";
		echo "<input class='selectday' id='timestamp' style='width:100px'  type='Text'  name='timestamp' value=''>";
        echo "</th>";
        echo "</tr>";


        echo "<tr>";
        echo "<th scope='row' abbr='Model' class='spec'>To</th>";
		echo "<th scope='col'>";
		echo "<input class='selectday' id='timestamp1' style='width:100px' type='Text'  name='timestamp1' value=''>";
        echo "</th>";
        

        echo "<tr>";
        echo "<th scope='col' colspan='2'>";
        echo "<input id='checkNow' type='button' onclick='javascript:checkAvaliability();' value='Check'  />";
		echo "</td>";
		echo "</th>";
        
        
        echo "<tr>";
        echo "<th scope='col' colspan='2'>";
		echo "<label>Set Availability</label>";
        echo "</th>";
        echo "</tr>";

		
            
        echo "<tr>";
        echo "<th scope='row' abbr='Model' class='spec'>Room</th>";
		echo "<th scope='col'>";
		echo "<select id='roomSelector'>";
		      $resultR = mysql_query("SELECT ID,Type FROM rooms");
			  while( $rowR = mysql_fetch_array($resultR) ){
			  echo "<option value='".$rowR[0]."'>";
			  echo "Id: ".$rowR[0]." ".$rowR[1];
			  echo "</option>";
			  }
		echo "</select>";
        echo "</th>";


        echo "<tr>";
        echo "<th scope='row' abbr='Model' class='spec'>Available</th>";
		echo "<th scope='col'>";
		echo "<input  id='setAvailable' style='width:100px' type='Text' value=''>";
        echo "</th>";
        
        echo "<tr>";
        echo "<th scope='row' abbr='Model' class='spec'>Price</th>";
        echo "<th scope='col'>";
		echo "<input  id='setPrice' style='width:100px'  type='Text'   value=''>";
        echo "</th>";
        echo "</tr>";


       

        

        echo "<tr>";
        echo "<th scope='col' colspan='2'>";
        echo "<input id='checkNow' type='button' onclick='javascript:setAvaliability();' value='Set'  />";
		echo "</td>";
		echo "</th>";

		
		echo "</table>";
		echo "</div>";







?>