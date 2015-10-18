<?php
$counter = 0;

require "Ajax/DBcon.php";

    $sql="SELECT * FROM reservations";

	$result = mysql_query($sql);

    $sql2="SELECT Fname , Lname FROM customers WHERE id = '".$row[1]."'"; 
    $result2 =  mysql_query($sql);

   echo "<table id='mytable' cellspacing='0' summary='The technical specifications of the Apple PowerMac G5 series' width:100%';>";
  // echo "<caption>Table 1: Power Mac G5 tech specs </caption>";
   echo "<tr>"; 
   
   echo "<th scope='col' abbr='Configurations' class='nobg'>Reservations</th>";
   
   echo "<th scope='col'>";
   echo "Id";
   echo "</th>";

   echo "<th scope='col'>";
   echo "First Name";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Last Name";
   echo "</th>";

   echo "<th scope='col'>";
   echo "Date In";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Date Out";
   echo "</th>";

   echo "<th scope='col'>";
   echo "Rooms";
   echo "</th>";
   
   echo "<th width='50px' scope='col'>";
   echo "State";
   echo "</th>";

   echo "<th scope='col'>";
   echo "Payments";
   echo "</th>";

   echo "<th scope='col' abbr='Configurations' class='nobg2'>Delete</th>";

   
   echo "</tr>";

   
   
   
   while ( $row = mysql_fetch_array($result) ){
   echo "<tr id='row".$counter."'>";
   if($row[6] == 1){
   	  echo "<th scope='row' abbr='Model' class='spec'><label id='new' style='text-decoration:blink; color:#915fa6;'>NEW</label></th>";
   }
   else{
      echo "<th scope='row' abbr='Model' class='spec'><label id='new' style='text-decoration:blink; color:#915fa6;'>OLD</label></th>";
   }
   echo "<td>";
   echo $row[0];
   echo "</td>";
   
   echo "<td>";
   $sql2="SELECT Fname,Lname FROM customer WHERE ID = '".$row[1]."'"; 
   $result2 =  mysql_query($sql2);
   
   while( $row2 = mysql_fetch_array($result2)){
   
   echo $row2[0];
   echo "<div id='Fname".$counter."'></div>";
   echo "</td>";
   
   echo "<td>";
   echo $row2[1];
   echo "<div id='Lname".$counter."'></div>";
   echo "</td>";
   
   }
   echo "<td>";
   $dateIN = date('d M y', strtotime($row[2]));
   echo $dateIN ;
   echo "<div id='DateIn".$counter."'></div>";
   echo "</td>";
   
   echo "<td>";
   $dateOUT = date('d M y', strtotime($row[3]));
   echo $dateOUT;
   echo "<div id='DateOut".$counter."'></div>";
   echo "</td>";
   
   echo "<td class='alt' id='TDRButtonResault".$counter."' style='width:80px'>";
   echo "<input id='RButton".$counter."' name='RButton' type='button' value='Open' onclick='RButtonAjax(".$row[0]." , ".$counter.")' />";
   echo "<div id='RButtonResault".$counter."'></div>";
   echo "</td>";
   
   echo "<td class='alt'>";
   if($row[5]== 1){
   echo "Yes";
   }else{
   echo "No";
   }
   echo "</td>";
   
   echo "<td class='alt'>";
   echo "<input name='PButton' type='button' value='Payments' />";
   echo "</td>";

    
   echo " <th scope='row' abbr='Model' class='spec'><center><img id='trashIM' src='Photos/trash_recyclebin_empty_closed.png'  onclick='DButtonAjax(".$row[0]." , ".$counter.")'  /></center></th>";
   
  
   echo "</tr>";
   $counter++;

   }
   echo "</table>";
   
   mysql_query("UPDATE reservations SET `NewOld` = '0' WHERE NewOld = '1'");

?>
