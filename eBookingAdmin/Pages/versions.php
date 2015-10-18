<?php

require "Ajax/DBcon2.php";

    $sql="SELECT * FROM versions";

	$result = mysql_query($sql);

    echo "<table border='1'  style=' text-align:center;  width:100%'>";
   
    echo "<tr>"; 
    echo "<th>";
    echo "Id";
    echo "</th>";

    echo "<th>";
    echo "Name";
    echo "</th>";
   
    echo "<th>";
    echo "Date";
    echo "</th>";

   echo "<th>";
   echo "Type";
   echo "</th>";
   
   echo "<th>";
   echo "";
   echo "</th>";

    
   echo "</tr>";

   
   
   
   while ( $row = mysql_fetch_array($result)){
   echo "<tr>";
   echo "<td>";
   echo $row[0];
   echo "</td>";
   
   echo "<td>";
   echo $row[1];
   echo "</td>";
   
   echo "<td>";
   echo $row[2];
   echo "</td>";
   
   
   echo "<td>";
   echo $row[3];
   echo "</td>";
   
   echo "<td>";
   echo "<input name='DButton' type='button' value='DownLoad' />";

   echo "</td>";
   
    
  
   echo "</tr>";

   }
   echo "</table>";


?>




