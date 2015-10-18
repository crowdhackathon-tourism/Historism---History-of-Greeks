<?php 
session_start();
?>
<div id='mydiv' style='overflow:hidden;overflow-y:scroll;height:359px;'>
<center>
<span style='color:#022a3b;font-size: 16px;font-weight: normal;'>
<?php



//Apothikeush twn metavlitwn sto Session
$i=0;    

$database=$_POST['database'];
$ip=$_POST['ip'];
while(isset($_POST['R_id'][$i])){
$_SESSION['R_id'][$i] = $_POST['R_id'][$i];   
$_SESSION['R_prices'][$i] = $_POST['R_prices'][$i];
$_SESSION['R_amount'][$i] = $_POST['R_amount'][$i];
$i=$i+1;
}
$counter = $i;



//Ypologismos Cost kai Overal Cost
require "../../Ajax/DB_hotel.php";


$R_type;
for($i=0;$i<$counter;$i++){
    $sql="SELECT Type FROM rooms WHERE ID = '".$_SESSION['R_id'][$i]."'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $R_type[$i]=($row['Type']);
   }  

$_SESSION['Overal_Cost'] = 0; 
for($i=0;$i<$counter;$i++){

	$_SESSION['Overal_Cost']  = $_SESSION['Overal_Cost']  + $_SESSION['R_prices'][$i];

}


/*



   echo "<table id='Reservation_Details_T1' >";
   	echo "<tr>";
   		echo "<td align='center' style='width:130px;>";
   			echo "<label id='Label1'>Reservation Details</label>";
   		echo "</td>";
  	echo "</tr>";
   echo "</table>";
*/




	echo "<form name='idForm' action='index.php?p=new_done' onsubmit='return checkSubmit()' method='post'>";
	echo "<input type='hidden' name='database' value='" . $database . "' />";
	echo "<input type='hidden' name='ip' value='" . $ip . "' />";
	echo "<table>";

	echo "<tr id='Terms_TR_2'>";
		echo "<td  align='left'>";
			echo "Check in:";
		echo "</td>";
		echo "<td>";
			echo $_SESSION['date_in'];
		echo "</td>";
	echo "</tr>";

	echo "<tr id='Terms_TR_2'>";
		echo "<td align='left'>";
			echo "Check out:";
		echo "</td>";
		echo "<td>";
			echo $_SESSION['date_out'];
		echo "</td>";
	echo "</tr>";

	echo "<tr id='Terms_TR_2'>";
		echo "<td align='left'>";
			echo "Nights:";
		echo "</td>";
		echo "<td>";
			echo DaysDifference($_SESSION['date_in'],$_SESSION['date_out']);
		echo "</td>";
	echo "</tr>";

	$overalCost = 0;
		for($i=0;$i<$counter;$i++){
		echo "<tr id='Terms_TR_2'>";
			echo "<td align='left'>";
				echo "Room: ";
			echo "</td>";
			echo "<td style='color:black'>";
				echo "".$R_type[$i]." x ".$_SESSION['R_amount'][$i]." Cost: ".$_SESSION['R_prices'][$i]."€";
			echo "</td>";
		echo "</tr>";
		}

		echo "<tr id='Terms_TR_2'>";
			echo "<td align='left' >";
				echo "Overal Cost:";
			echo "</td>";
			echo "<td><b>";
 				echo $_SESSION['Overal_Cost']."€";
			echo "</b></td>";
		echo "</tr>";

		echo "<tr id='Terms_TR_2'>";
			echo "<td align='right'>";
				echo "Email:";
			echo "</td>";
			echo "<td>";
				echo "<input id='Email' name='Email' type='Text' value=''>";
			echo "</td>";
			echo "<td>";
				echo "<label id='EmailV' style='font-size:x-small; color:red'></label>";
			echo "</td>";
		echo "</tr>";

		echo "<tr id='Terms_TR_2'>";
			echo "<td align='right' >";
				echo "Last Name:";
			echo "</td>";
			echo "<td>";
				echo "<input id='Lname' name='Lname' type='Text' value=''>";
			echo "</td>";
			echo "<td>";
				echo"<label id='LnameV' style='font-size:x-small; color:red'></label>";
			echo "</td>";
		echo "</tr>";

		echo "<tr id='Terms_TR_2'>";
			echo "<td align='right' >";
				echo "First Name:";
			echo "</td>";
			echo "<td>";
				echo "<input id='Fname' name='Fname' type='Text' value=''>";
			echo "</td>";
			echo "<td>";
				echo"<label id='FnameV' style='font-size:x-small; color:red'></label>";
			echo "</td>";
		echo "</tr>";

		echo "<tr id='Terms_TR_2'>";
			echo "<td align='right'>";
				echo "Phone:";
			echo "</td>";
			echo "<td>";
				echo "<input id='Phone' name='Phone' type='Text' value=''>";
			echo "</td>";
			echo "<td>";
				echo"<label id='PhoneV' style='font-size:x-small; color:red'></label>";
			echo "</td>";
		echo "</tr>";
 
		echo "<tr id='Terms_TR_2'>";
			echo "<td colspan='3' align='center'>";
				echo "<input name='submit' type='submit' value='Submit' />";
				echo "-More info-";
			echo "</td>";
		echo "</tr>";
echo "</table>";
echo "</form>";


function DaysDifference($Day1 , $Day2){
	      $d1=strtotime($Day1);
          $d2=strtotime($Day2);
	      $Days = floor(($d2-$d1)/86400);
	   
	   return $Days;
	
}



?>
</span>
</center>
</div>