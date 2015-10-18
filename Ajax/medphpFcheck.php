<?php


$flag_DAY = 0;
$_SESSION['date_in'] = $_POST['dateIn'];
$_SESSION['date_out'] = $_POST['dateOut'];
$days_post = $_POST['days'];

$type = $_POST['roomType'];
$sum = 0;
$day = 0;
$database=$_POST['database'];
$ip=$_POST['ip'];
require "DB_hotel.php";


     
    /* Vriskoume to plithos twn hmerwn dianiktereusis*/
    $sql="SELECT COUNT(*) AS DayNumder FROM availability WHERE Dates >= '".$_SESSION['date_in']."'  AND Dates <  '".$_SESSION['date_out']."'  ";

	$result = mysql_query($sql);

	if ($result)
	{
	}
	else {
	}


	while ( $row = mysql_fetch_array($result) ){

	$day=$row['DayNumder'];
		if($day == $days_post ){
          $_SESSION['day']=$day;
            
		}
		else{
         // echo $day;
         // echo $_POST['days'];
          $flag_DAY = 1;
		}
	
	}

  
  
  
	if($flag_DAY == 0){  
		if($type =="All"){
			$sql="SELECT ID FROM rooms ";
		}
		else{
			$sql="SELECT ID FROM rooms WHERE Type = '".$type."'";
		} 
		
		$result = mysql_query($sql);
		if ($result){
		}
		else {
		}
		$i=0;
		while ( $row = mysql_fetch_array($result) ){
			echo '<input id="id'.$i.'"  type="hidden"  value="'.$row['ID'].'" />';
			$ids[$i]=$row['ID'];
			$i= $i+1;
		}
   
		$c_ane = 0; //Metritis apotelesmatwn
  
		echo "<div id='mydiv' style='overflow:hidden;overflow-y:scroll;height:359px;'>"; 
		echo "<section class='guide-list'>";
	
	for($n = 0; $n <count($ids); $n++){
   	
		$sql="SELECT MIN(`".$ids[$n]."`) AS SmallestNumberOfAvailable FROM availability WHERE Dates >= '".$_SESSION['date_in']."'  AND Dates <  '".$_SESSION['date_out']."'  ";
        $result = mysql_query($sql);
 
		while ($row = mysql_fetch_array($result)){
			$sum=$row['SmallestNumberOfAvailable'];
		}  	

		$sql="SELECT  * FROM rooms WHERE ID ='".$ids[$n]."'";
        $result = mysql_query($sql);
    
		while ($row = mysql_fetch_array($result)){
			
			echo "<article class='media guide-list-item'>";
			echo "<div class='media-left media-top'>";
			echo "<a href=''>";
			echo "<img class='media-object' src='".$row['image']."' alt='".$row['1']."'>";
			echo "</a>";
			echo "</div>";
			echo "<div class='media-body'>";
			echo "<h4 class='media-heading'>".$row['1']."</h4>";
			
			echo "<div class='media-description'>";
			echo "<table>";
			echo "<tr>";
			echo "<td>";
				echo $row['Description'];
			if($sum >= 5){
			    echo "<select id='selector".$c_ane."'  onchange='dropdownV()' style='width:70px'>";
				echo "<option>0</option>";
				echo "<option>1</option>";
				echo "<option>2</option>";
				echo "<option>3</option>";
				echo "<option>4</option>";
				echo "<option>5</option>";
				echo "</select>";
			}
			else{
			    echo "<select id='selector".$c_ane."'  onchange='dropdownV()' style='width:70px' >";
				echo "<option>0</option>";
				for($i = 1; $i <= $sum; $i++){
					echo "<option>".$i."</option>";
				} 
			}
			echo "<b>From:</b>";
			echo $dateFr = date('d M', strtotime($_SESSION['date_in']));
			echo "<b>To:</b>";
			echo $dateT = date('d M', strtotime($_SESSION['date_out']));			
			echo "</select>";
			echo "</td>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";
			echo "<div class='media-details'>";
			echo "<ul class='list-inline'>";
			echo "<li class='destination'><i class='fa fa-euro fa-fw'></i> <span>";
				$tempM = roomCost($_SESSION['date_in'] ,$_SESSION['date_out'], $ids[$n]);
				echo  "<span style='font-size:x-large;' id='LabelOveral".$c_ane."'> ".$tempM ."</span>";			    
				echo "<input id='LabelOveralHidden".$c_ane."' type='hidden' value='".$tempM."' />";
			echo "</span></li>";
			echo "<li>";
			echo "<span class='rating rating-star'>";
		
            if($sum < 1){
				$sum = 0;
            }
        	echo "-<em><b> ".$sum." Available rooms</b></em>"; 	 
			echo "<i class='fa fa-star icon'></i>";
			echo "</span>";
			echo "</li>";
			echo "<li>";
			echo "<span class='rating rating-price'>";
				$sqle = "SELECT * FROM `room".$ids[$n]."prices` WHERE (`From` <= '".$_SESSION['date_in']."' AND `To` >= '".$_SESSION['date_in'] ."') OR (`From` >= '".$_SESSION['date_in']."' AND `To` <= '".$_SESSION['date_out'] ."') OR (`From` <= '".$_SESSION['date_out']."' AND `To` >= '".$_SESSION['date_out'] ."')";
				$resulte = mysql_query($sqle);
				$mycounter  = mysql_num_rows($resulte);
				$h = 1;
				if($sum!=0){
					while($rowe = mysql_fetch_array($resulte)){
				        echo "<tr>";
				        echo "<td>";
				        if($h==1){
				            $dateFr = date('d M', strtotime($_SESSION['date_in']));
						}
				        else{
							$dateFr = date('d M', strtotime($rowe[0]));
				        }
				        echo "</td>";
				        echo "<td>";
				        if($h==$mycounter){
				            $dateT = date('d M', strtotime($_SESSION['date_out']));
				        }
				        else{
				            $dateT = date('d M', strtotime($rowe[1]));
				        }	
						$diff= DaysDifference($dateFr,$dateT);
						$str="";
						if($mycounter>$h){
							$diff++;
							$str=" - ";
						}
						if($diff==1){
							echo "<b>".$diff."</b> day <b>".$rowe[2]."€</b>".$str;
						}
						else{
							echo "<b>".$diff."</b> days <b>".$rowe[2]."€</b>".$str;
						}
						$h++;
					}
				}
			echo "</span>";
			echo "</li>";
			echo "</ul>";
			
      
			} 	
			echo "</article>";
			
       		$c_ane=$c_ane+1;
			
		}
		
	echo "</section>";
	
	
	echo"<input id='variety' type='hidden'  value='".count($ids)."'/>";
	echo "";
	echo "</div>";
	}
	
	


	else{
		echo "There is not available room on these dates.";
	}


function roomCost($From , $To , $RoomID){
	$dates = array();
	$cost= array();
 
	$dates =  makemyday($From , $To);	
	$i=count($dates);	
	
	$z=0;
      for($x=0;$x<$i;$x++){ 
       
		$sql2="SELECT * FROM  `room".$RoomID."prices` WHERE  `From` <=  '".$dates[$x]."' AND  `To` >=  '".$dates[$x]."' ";
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
function DaysDifference($Day1 , $Day2){
	      $d1=strtotime($Day1);
          $d2=strtotime($Day2);
	      $Days = floor(($d2-$d1)/86400);
	   
	   return $Days;
	
	}

?>

