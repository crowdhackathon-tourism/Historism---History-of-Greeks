<?php

require ("../Ajax/DBcon.php");

function roomCost($From , $To , $RoomID){
	$dates = array();
	$cost= array();
 
	$dates =  makemyday($From , $To);	
	$i=count($dates);	
	
	$z=0;
      for($x=0;$x<$i;$x++){ 
       
		$sql2="SELECT * FROM  `room1prices` WHERE  `From` <=  '".$dates[$x]."' AND  `To` >=  '".$dates[$x]."' ";
    	$result2 = mysql_query($sql2);
    	
	    while ( $row2 = mysql_fetch_array($result2) ){
	   
	    $cost[$z] = $row2['Price'] ;
	    
	    $z++;
	    }
       }
	   
	   $OveralCost=0;
	   
	   for($k=0;$k<$z;$k++){

	   $OveralCost =  $OveralCost + $cost[$k];
	
	   }
       
       return $OveralCost;


}


	
function setAvailability($DayFrom , $DayTo , $IDroom , $Available){
   
     $myDates = array();

 	 $sql="SELECT Dates FROM availability WHERE Dates >= '".$DayFrom ."'  AND Dates < '".$DayTo."'";
 	 $result = mysql_query($sql);
 	 $j = 0;
  
 	 	while ( $row = mysql_fetch_array($result) ){
  	
			$dates[$j] = $row['Dates'];
			$j++;
 	
	 	} 
 	 

	    $myDates =  makemyday($DayFrom, $DayTo);
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
      







function makemyday($From , $To){

	$counter = DaysDifference($From , $To);
	
	$day = $From;
	$dates = array();


	
	for($i=0; $i<$counter ; $i++){
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

