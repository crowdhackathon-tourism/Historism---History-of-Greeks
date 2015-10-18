<?php
	session_start();
	
    if( isset($_POST['ConfirmationCode']) && $_POST['ConfirmationCode']!=0 && is_numeric($_POST['ConfirmationCode'])){
    $ConfirCode = $_POST['ConfirmationCode'] / 123 ;
    $_SESSION['ConfirmationCode']=$ConfirCode;
     


		 /*
		echo "<table  class='table table-bordered table-striped'>";
		echo "<tr>";
			echo "<td align='center' style='width:130px;>";*/
				echo "<center>";
				echo "<h3>Activate And Pay</h3>";
				echo "</center>";
				/*
			echo "</td>";
		echo "</tr>";
		echo "</table>"; 
*/
		$database = $_POST['database'];
		
		
		$ip= $_POST['ip'];
						
		require "DB_hotel.php";


		$sql="SELECT * FROM reservations WHERE ID = '". $ConfirCode ."'  AND Confirm = '0'";

		$result = mysql_query($sql);

		while ( $row = mysql_fetch_array($result) ){
			     $reservationId =  $row['ID'];
			     $dateIn = $row['Date_In'];
			     $dateOut = $row['Date_Out'];
			     $Customer = $row['CustomerID'];
			     $cost = $row['Cost'];
		}
		
		
		
		if($reservationId != $ConfirCode){
		echo "<center>";
		echo "<h3>Wrong Confirmation Code!!!</h3>";
		echo "<center>";
		}
		
		
		
		else{
		
		$sql="SELECT Fname,Lname FROM customer WHERE ID = '".$Customer."'  ";

		$result = mysql_query($sql);

		while ( $row = mysql_fetch_array($result) ){
			    
			     $Fname= $row['Fname'];
			     $Lname= $row['Lname'];
		}

        $sql="SELECT Type,Description FROM rooms WHERE ID = '".$RoomID."'  ";

		$result = mysql_query($sql);

		while ( $row = mysql_fetch_array($result) ){
			    
			     $Type= $row['Type'];
			     $Description= $row['Description'];
		}
	
		echo "<table class='table table-bordered table-striped'>";
		
		echo "<tr id='Terms_TR_2'>";
		echo "<td>";
			echo "Reservation Id";
		echo "</td>";
		echo "<td>";
			echo $reservationId;
		echo "</td>";
        
        echo "<tr id='Terms_TR_2'>";
        echo "<td>";
			echo "Last Name";
		echo "</td>";
		echo "<td>";
	    	echo $Lname;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr id='Terms_TR_2'>";
		echo "<td>";
			echo "First Name";
		echo "</td>";
		echo "<td>";
			echo $Fname;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr id='Terms_TR_2'>";
		echo "<td>";
			echo "Check In";
		echo "</td>";
        echo "<td>";
        	echo $dateIn;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr id='Terms_TR_2'>";
		echo "<td>";
			echo "Check Out";
		echo "</td>";
        echo "<td>";
        	echo $dateOut;
		echo "</td>";
		echo "</tr>";

		echo "<tr id='Terms_TR_2'>";
		echo "<td>";
			echo "Cost";
		echo "</td>";
        echo "<td>";
        	echo $cost."€";
		echo "</td>";
		echo "</tr>";
		
      //Pay Pal//  
        $item_name = "Reservation Payment Code:#".$ConfirCode." Payment for your Reservation.";
		$amount=$cost;

	    echo "<tr id='Terms_TR_2'>";
	    echo " <td>";
        
           	echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post'>";
         	
         	echo "<input type='hidden' name='cmd' value='_xclick'>";
         	echo "<input type='hidden' name='business' value='astam@it.teithe.gr'>";
           	echo "<input type='hidden' name='currency_code' value='EUR'>";
         	echo "<input type='hidden' name='item_name' value='".$item_name."'>";
          	echo "<input type='hidden' name='amount' value='".$amount."'>";
          	echo "<input type='hidden' name='cancel_return' value='index.php?p=PayPalForm'>";
          	echo "<input type='hidden' name='return' value='index.php?p=finishPay'>";
         	echo "<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>";
         	echo "<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>";
         	echo "</form>";
             
		 echo "</td>";
		 echo "<td>";
		 echo "</td>";
		 echo "</tr>";
		 echo "</table>";
		
				
			
		   

    
		}

}
else{

echo "<center>";
echo "<h3>Please give a Comfiramtion Code</h3>";
echo "</center>";

}



?>
<!--<a href="index.php?p=finishPay">FinishPay</a>-->
