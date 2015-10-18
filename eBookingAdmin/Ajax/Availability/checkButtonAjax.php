<?php
session_start();
require ('../DBcon.php');

$from = $_POST['from'];
$to  = $_POST['to'];

$result = mysql_query("SELECT * FROM availability WHERE Dates>='".$from."' AND Dates<='".$to."' ORDER BY `Dates` ASC");
 
 echo "<table class='reser' id='mytable' cellspacing='0' summary='The technical specifications of the Apple PowerMac G5 series'>";
   

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




?>
