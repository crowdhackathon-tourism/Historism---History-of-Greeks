<?php
session_start();
require "../DBcon.php";

$id = $_POST['id'];
$type = $_POST['type'];
$description = $_POST['description'];
$capacity = $_POST['capacity'];



    mysql_query("INSERT INTO rooms (id,type,description ,capacity ) VALUES('".$id."','".$type."','".$description."','".$capacity."')");
	mysql_query("ALTER TABLE  `availability` ADD  `".$id."` VARCHAR( 4 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '0'");
	mysql_query("CREATE TABLE `room".$id."prices` (`From` DATE NOT NULL ,`To` DATE NOT NULL ,`Price` DOUBLE NOT NULL)");

    if($_POST['From']){
    
    	$i=0; 
		while(isset($_POST['From'][$i])){
			$From[$i] = $_POST['From'][$i];    
			$To[$i] = $_POST['To'][$i];
			$Available[$i] = $_POST['Available'][$i];
			$Price[$i] = $_POST['Price'][$i];
		
			$i=$i+1;
            }
			
		$counter = $i;
 
         
	    for($k=0 ; $k<$counter ; $k++){
	      	setAvailability($From[$k] , $To[$k] , $id , $Available[$k]);
	      	$mystring = "room".$id."prices";
	      	
	        mysql_query("INSERT INTO `".$mystring."` (`From`,`To`,`Price`) VALUES('".$From[$k]."','".$To[$k]."','".$Price[$k]."')");
            }
            
            echo "Success!!"; 
	}
	else{
	
	
	}
	
	
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
