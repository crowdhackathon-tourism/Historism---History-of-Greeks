 

 


<?php


if($_GET['z'] == 'all'){

$counter = 0;

require "Ajax/DBcon.php";

    $sql="SELECT * FROM rooms";

	$result = mysql_query($sql);

   echo "<table id='mytable' cellspacing='0' summary='The technical specifications of the Apple PowerMac G5 series' width:100%';>";
   

   echo "<tr>"; 
   echo "<th scope='col' abbr='Configurations' class='nobg'>Rooms</th>";
 

   echo "<th scope='col'>";
   echo "Type";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Description";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Capacity";
   echo "</th>";


   echo "<th scope='col'>";
   echo "Prices";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Availability";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Photos";
   echo "</th>";
   echo "<th scope='col' abbr='Configurations' class='nobg2'>Change</th>";
   echo "<th scope='col' abbr='Configurations' class='nobg2'>Delete</th>";

  echo "</tr>";

   
   
   
   while ( $row = mysql_fetch_array($result) ){
   echo "<tr id='row".$counter."'>";
    echo " <th scope='row' abbr='Model' class='spec' >".$row[0]."</th>";

    
   echo "<td>";
   echo $row[1];
   
   echo "</td>";
 
   echo "<td>";
   echo $row[2];
 
   echo "</td>";
   
   echo "<td>";
   echo $row[3];
 
   echo "</td>";
   
         
   echo "<td class='alt'>";
   	echo "<input id='PriceButton".$counter."' name='DButton' type='button' value='Open' onclick='PriceRoom(".$row[0]." , ".$counter.")'  />";
   	echo "<div id='PriceButtonResault".$counter."'></div>";
   echo "</td>";
  
   echo "<td class='alt'>";
  	echo "<input id='AvailabilityButton".$counter."' name='DButton' type='button' value='Open' onclick='AvailabilityRoom(".$row[0]." , ".$counter.")'  />";
   	echo "<div id='AvailabilityButtonResault".$counter."'></div>";
   echo "</td>";
   
   echo "<td class='alt'>";
  
   echo "</td>";  
   				
   
 
   echo "<th scope='row' abbr='Model' class='spec'>";
   ?>
   
  

    <div class='popbox'>
  	 <a  class='open' href='#'>
      <img id='trashIM' src='Photos/refresh.png' >
    </a>
    

    <div class='collapse'>
      <div class='box'>
        <div class='arrow'></div>
        <div class='arrow-border'></div>

        <form action="Pages/ChangeRoomForm.php" method="post" id="subForm">
          <p><small>UpDate Room's Information</small></p>
          <div class="input">
            <input style="width: 150px;" type="text" placeholder="ID:<?php echo $row[0]  ?>"  disabled="disabled" />
            <input style="width: 151px;" name="roomID" type="hidden"  value="<?php echo $row[0]  ?>" />
          </div>
          <div class="input">
            <input style="width: 150px;" type="text" name="roomType" value="" id="nklki-nklki" placeholder="Type:<?php echo $row[1]  ?>" />
          </div>
          <div class="input">
            <textarea style="width: 150px; height:100px" name="roomDescription" value="" id="Message" placeholder="Descr:<?php echo $row[2]  ?>"></textarea>
          </div>
          <div class="input">
            <input style="width: 150px;" type="text" name="roomCapacity"value="" id="nklki-nklki" placeholder="Capacity:<?php echo $row[3]  ?>" />
          </div> 

          <input type="submit" value="UpDate" /></form>

      </div>
    </div>
   
  </div>
  

   
   <?php
   echo "</th>";
   echo "<th scope='row' abbr='Model' class='spec'><center><img id='trashIM' src='Photos/trash_recyclebin_empty_closed.png'  onclick='DeleteRoom(".$row[0]." , ".$counter.")'  /></center></th>";


 
   echo "</tr>";
   $counter++;

   }
   echo "</table>";
   
}else if($_GET['z'] == 'new'){
  require "Ajax/DBcon.php";
  require "NewRoom.php";

 
}else{
  $RoomID = $_GET['z'];

  require "Ajax/DBcon.php";

    $sql="SELECT `".$RoomID."` FROM availability ORDER BY `Dates`";

	$result = mysql_query($sql);
	$t = 0;
	while ( $row = mysql_fetch_array($result) ){
    $avaZ[$t] = $row[0] ;
    $t++ ;
    
	}
	
	echo "<table border='3'   style=' vertical-align:top ; text-align:center; width:100%'>";
    $w=0;
	for($i=0; $i<=12; $i++){
	   
	    echo "<tr>";
	    
	    for($j=0; $j<=31; $j++){
	    	if($i == 0){
	    		if($j == 0){
	    		echo "<td>";
	    		echo "x";
	    		echo "</td>";
	    		}
	    		else{
	    		echo "<td>";
	    		echo $j;
	    		echo "</td>";
	    		}
	    	}
	    	else{
	    	    if($j == 0){
	    		echo "<td>";
	    		echo $i;
	    		echo "</td>";
	    		}
	    		else{
	    		echo "<td>";
	    		echo $avaZ[$w];
	    		echo "</td>";
	    		}

	    	}
	    $w++;
	    }
	    
	    echo "</tr>";
    
    }
    echo "</table >";

}


?>
  