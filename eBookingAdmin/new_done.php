<?php
//session_start();

$Date_in  =  $_SESSION['date_in'];
$Date_out =  $_SESSION['date_out'];
$Overal_Cost = $_SESSION['Overal_Cost'];

$Email = $_POST['Email'];
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Phone = $_POST['Phone'];

$i=0;    
while(isset($_SESSION['R_id'][$i])){
$R_id[$i] =$_SESSION['R_id'][$i];    
$R_amount[$i]=$_SESSION['R_amount'][$i];
$i=$i+1;
}
$counter =$i;





		$y=0;
		$flag = 0;
		require "AjaxMed/DBcon.php";
		
        for($i=0;$i<$counter;$i++){
		   $sql="SELECT Dates,`".$R_id[$i]."` FROM availability WHERE Dates >= '".$Date_in ."'  AND Dates < '".$Date_out."'";

		   $result = mysql_query($sql);

		   $j=0;
		   while ( $row = mysql_fetch_array($result) ){
			       $dates[$j] = $row['Dates'];
			  	   $avaR[$i][$j]=$row[1];
 
 			  	   if($avaR[$i][$j] < $R_amount[$i]){
			  	 	  $flag=1;
			  	   }
			  	      $j=$j+1;
		   } 
         }



		if($flag==0){
		
		//AVAIABILITY//
		for($i=0;$i<$counter;$i++){
		
				 for ($n = 0; $n <count($avaR); $n++){
					 $y = ($avaR[$i][$n] - $R_amount[$i]);

					 mysql_query("UPDATE availability SET `".$R_id[$i]."` = '".$y."' WHERE Dates = '".$dates[$n]."'");
					 $flag = 0;
				 }

        }
        ///////////////

        //CUSTOMER/////
               $sql="SELECT * FROM customer WHERE Email = '".$Email."'";
	           $result = mysql_query($sql);
               $row = mysql_fetch_array($result);
               
	           if (mysql_num_rows($result)==1){
                   
					$customerId = $row['ID'];
					
			   }	
			   else{
                   	mysql_query("INSERT INTO customer (Fname,Lname,Email,Phone) VALUES('".$Fname."','".$Lname."','".$Email."','".$Phone."')");

					$sql="SELECT ID FROM customer WHERE Email = '".$Email."'";
					$result = mysql_query($sql);

					$row = mysql_fetch_array($result);
					$customerId = $row['ID'];
			   }
        ///////////////




			   mysql_query("INSERT INTO reservations (CustomerID,Date_In,Date_Out,Cost) VALUES('".$customerId."','".$Date_in."','".$Date_out."','".$Overal_Cost."')");
              
              
               $sql="SELECT MAX(ID) AS AcCode FROM reservations" ;

	           $result = mysql_query($sql);
              
		       while ( $row = mysql_fetch_array($result) ){
		          $resID= $row['AcCode'];
			      $ActivationCode= $row['AcCode'] * 123;
			   }
			   
			   for($i=0;$i<$counter;$i++){
			   mysql_query("INSERT INTO details (reservationID,RoomType,Amount) VALUES('".$resID."','".$R_id[$i]."','".$R_amount[$i]."')");
			   }
			   
			   
			   $to = $Email;
			   $subject = "Activation Code Hotel";
               $message = $ActivationCode;
               $from = "reservations@hotel.com";
               $headers = "From:" . $from;
               mail($to,$subject,$message,$headers);
                      

                                                   $user = "anestis.stamatis";
                                                   $password = "sheoHom9";
                                                   $api_id = "3373913";
                                                   $baseurl ="http://api.clickatell.com";
    
                                                   $text = urlencode("This is an example message");
                                                   $to = "306983277312";
 
                                        // auth call
                                                   $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";

                                       // do auth call
                                                   $ret = file($url);

                                       // explode our response. return string is on first line of the data returned
                                                   $sess = explode(":",$ret[0]);
                                                   if ($sess[0] == "OK") {

                                                   $sess_id = trim($sess[1]); // remove any whitespace
                                                   $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";

                                      // do sendmsg call
                                                   $ret = file($url);
                                                   $send = explode(":",$ret[0]);

                                                   if ($send[0] == "ID") {
                                                   echo "success\nmessage ID: ". $send[1];
                                                   } else {
                                                   echo "send message failed";
                                                   }
                                                   } else {
                                                   echo "Authentication failure: ". $ret[0];
                                                   }







               echo "Your reservation is ok and we have sent you your activation code to your email";
       }
	


       else{
		 echo "You can't do reservation on these dates, because someone else did reservation at the time you submit your ids!";
       }





       unset($_SESSION['R_id']);
	   unset($_SESSION['R_amount']);
	   unset($_SESSION['date_in']);
	   unset($_SESSION['date_out']);
	   unset($_SESSION['Overal_Cost']);

?>