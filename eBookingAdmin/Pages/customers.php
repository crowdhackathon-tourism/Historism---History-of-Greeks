<?php
$counter = 0;

require "Ajax/DBcon.php";

    $sql="SELECT * FROM customer";

	$result = mysql_query($sql);

    echo "<table id='mytable' cellspacing='0' summary='The technical specifications of the Apple PowerMac G5 series' width:100%';>";
    

    echo "<tr>"; 
    echo "<th scope='col' abbr='Configurations' class='nobg'>Customers</th>";
    
    echo "<th scope='col'>";
    echo "Id";
    echo "</th>";

    echo "<th scope='col'>";
    echo "First Name";
    echo "</th>";
   
    echo "<th scope='col'>";
    echo "Last Name";
    echo "</th>";

   echo "<th scope='col'>";
   echo "Email";
   echo "</th>";
   
   echo "<th scope='col'>";
   echo "Phone";
   echo "</th>";
   echo "<th scope='col' abbr='Configurations' class='nobg2'>Change</th>";

   echo "<th scope='col' abbr='Configurations' class='nobg2'>Delete</th>";


    
   echo "</tr>";

   
   
   
   while ( $row = mysql_fetch_array($result)){
   echo "<tr  id='row".$counter."'>";
   echo "<th scope='row' abbr='Model' class='spec'>Model</th>";
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
   echo $row[4];
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

        <form action="Pages/ChangeCustomerForm.php" method="post" id="subForm">
          <p><small>UpDate Room's Information</small></p>
          <div class="input">
            <input type="text" placeholder="ID:<?php echo $row[0]  ?>"  disabled="disabled" />
            <input name="customerID" type="hidden"  value="<?php echo $row[0]  ?>" />
          </div>
          <div class="input">
            <input type="text" name="customerFname" value="" id="nklki-nklki" placeholder="<?php echo $row[1]  ?>" />
          </div>
          <div class="input">
            <input type="text" name="customerLname" value="" id="nklki-nklki" placeholder="<?php echo $row[2]  ?>" />
          </div>
          <div class="input">
            <input type="text" name="customerEmail"value="" id="nklki-nklki" placeholder="<?php echo $row[3]  ?>" />
          </div>
          <div class="input">
            <input type="text" name="customerPhone"value="" id="nklki-nklki" placeholder="<?php echo $row[4]  ?>" />
          </div>


          <input type="submit" value="UpDate" /></form>

      </div>
    </div>
   
  </div>
  

   
   <?php
   echo "</th>";

    
   
   echo " <th scope='row' abbr='Model' class='spec'><center><img id='trashIM' src='Photos/trash_recyclebin_empty_closed.png'  onclick='CustomerDeleteButton(".$row[0]." , ".$counter.")'  /></center></th>";

 
   echo "</tr>";
   $counter++;


   }
   echo "</table>";


?>

