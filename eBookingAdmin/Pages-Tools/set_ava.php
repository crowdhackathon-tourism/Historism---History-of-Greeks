<?php
	require "../Ajax/DBcon.php";
	
	

	function ChangeAvailability($DayFrom  , $DayTo , $IDroom , $sing , $Amount){

           $sql="SELECT Dates,`".$IDroom."` FROM availability WHERE Dates >= '".$DayFrom ."'  AND Dates < '".$DayTo."'";
		   $result = mysql_query($sql);
		   $j=0;
		   while ( $row = mysql_fetch_array($result) ){
			       $dates[$j] = $row['Dates'];
			  	   $avaR[$j]=$row[1];
        	   	   $j=$j+1;
		   } 
		   
		   	 for ($n = 0; $n <$j; $n++){
		   	      $a = 0;
		   	      if($sing == 0){
				  $a = ($avaR[$n] + $Amount);
				  }
				  else{
				  $a = ($avaR[$n] - $Amount);
				  }
				  mysql_query("UPDATE availability SET `".$IDroom."` = '".$a."' WHERE Dates = '".$dates[$n]."'");

                 
			 }
	}


	
	
	
	function GetAvailability($DayFrom  , $DayTo , $IDroom){
	 	$AvailableAmount = 0;
	
	    $sql="SELECT MIN(`".$IDroom."`) AS SmallestNumberOfAvailable FROM availability WHERE Dates >= '".$DayFrom."'  AND Dates <  '".$DayTo."'  ";
		$result = mysql_query($sql);

   			while ( $row = mysql_fetch_array($result) ){
    		$sum=$row['SmallestNumberOfAvailable'];
  			} 
   
   		$AvailableAmount = $sum;
  	    return $AvailableAmount;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


?>