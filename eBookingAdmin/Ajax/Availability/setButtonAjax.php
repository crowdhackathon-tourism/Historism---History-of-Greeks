<?php
session_start();
require ('../DBcon.php');

$from = $_POST['from'];
$to = $_POST['to'];
$roomId = $_POST['roomid'];
$available = $_POST['available'];
$price = $_POST['price'];
$mystring = "room".$roomId."prices";
$counter = 0;

   
   setAvailability($from,$to,$roomId,$available);
   echo $available;
   	if($available == 0){
   		mysql_query("DELETE * FROM ".$mystring);
  	}
  	else{
    	mysql_query("INSERT INTO `".$mystring."` (`From`,`To`,`Price`) VALUES('".$from."','".$to."','".$price."')");
    }

   $result = mysql_query("SELECT * FROM availability WHERE Dates >= '".$from."'  AND Dates <= '".$to."'");

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
 

  

 




function setAvailability($DayFrom , $DayTo , $IDroom , $Available){
   
     $myDates = array();

 	 $sql="SELECT Dates FROM availability WHERE Dates >= '".$DayFrom ."'  AND Dates <= '".$DayTo."'";
 	 $result = mysql_query($sql);
 	 $j = 0;
  
 	 	while ( $row = mysql_fetch_array($result) ){
  	
			$dates[$j] = $row['Dates'];
			$j++;
 	
	 	} 
 	 

	    $myDates =  makemydayAvail($DayFrom, $DayTo);
	    $counter = count($myDates);
	  
        	for($i=0; $i<$counter;$i++){
        		
        		if(contein($myDates[$i] , $dates)){
        		   
        		   mysql_query("UPDATE availability SET `".$IDroom."` = '".$Available."' WHERE Dates = '".$myDates[$i]."'");
        		}
        		else{
        		   mysql_query("INSERT INTO `availability` (Dates, `".$IDroom."`) VALUES ('".$myDates[$i]."', '".$Available."')");
        		}
        	
        	}
    }    
      







function makemydayAvail($From , $To){

	$counter = DaysDifference($From , $To);
	
	$day = $From;
	$dates = array();


	
	for($i=0; $i<=$counter ; $i++){
	$dates[$i] = $day;
	$day = date('Y-m-d', strtotime($day. ' + 1 days'));    	
    }	
	
	return $dates;
}









function writemyday($From , $To){

	$counter = DaysDifference($From , $To);
	$day = $From;
	$dates =  array();


	
	for($i=0; $i<$counter ; $i++){
	
	mysql_query("INSERT INTO availability (Dates) VALUES('".$day."')");
    $day = date('Y-m-d', strtotime($day. ' + 1 days'));    	
        
    }	
	
	mysql_query("DELETE FROM `availability` WHERE `Dates` = '0000-00-00'");
}

	
	
	
	
	
	

function DaysDifference($Day1 , $Day2){
	      $d1=strtotime($Day1);
          $d2=strtotime($Day2);
	      $Days = floor(($d2-$d1)/86400);
	   
	   return $Days;
	
	}


function contein($day , $dates){
     $myflag = false;
 		
		for($i=0; $i<count($dates);$i++){
		   if($dates[$i] == $day){
		   $myflag = true;
		   return $myflag;
		   }
		}
		
	  return $myflag;
	
	}
	

?>
