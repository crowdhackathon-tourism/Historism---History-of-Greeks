
<head>


</head>
        <center>
		<table id='mytable' style='width:50%' cellspacing='0' summary='The technical specifications of the Apple PowerMac G5 series'><!-- Genera Inforamtions  /-->
			<tr>
        		<th scope='col' colspan='3'><label>Set General Informations</label></th>
            </tr>

			<tr>
				<th scope='row' abbr='Model' class='spec'>
				<label id="Label1">ID</label>
				</th>
				<th scope='col'>
				<?php
				
				 $sql="SELECT MAX(ID) FROM `rooms`" ;
                 $result = mysql_query($sql);
              
		         while ($row = mysql_fetch_array($result)){
		          $resID= $row[0] + 1;
			     }		
			     echo " <input id='newRoomid' name='Text1' type='text' disabled='disabled'  value='".$resID."' />";
				?>
				
				</th>
        		<th scope='col'>
        		<label class="NewRoomValidation" id="idValidate"></label>
				</th>
			</tr>
			
			<tr>
				<th scope='row' abbr='Model' class='spec'>
				<label id="Label1">Type</label>
				</th>
				<th scope='col'>
				<input id="newRoomtype" name="Text1" type="text" />
				</th>
        		<th scope='col'>
        		<label class="NewRoomValidation" id="typeValidate"></label>
				</th>
		    </tr>
			<tr>
	
				<th scope='row' abbr='Model' class='spec'>
				<label id="Label1">Capacity</label>
				</th>
				<th scope='col'>
				<input id="newRoomcapacity" name="Text1" type="text" />
				</th>
        		<th scope='col'>
        		<label class="NewRoomValidation" id="capacityValidate"></label>
				</th>
			</tr>

            <tr>
				<th scope='row' abbr='Model' class='spec'>
				<label id="Label1">Description</label>
				</th>
				<th scope='col'>
				<textarea id="newRoomdescription" name="TextArea1" cols="20" rows="2"></textarea>
				</th>
        		<th scope='col'>
        		<label class="NewRoomValidation" id="descriptionValidate"></label>
				</th>
			</tr>

          
          		

            <tr>
	            <th scope='row' abbr='Model' class='spec'>
     			<label id="Label1">From</label>
				</th>
        		<th scope='col'>
        		<input class="selectday"   id="timestamp"  type="Text"  name="timestamp" value="">
				</th>
				<th scope='col' rowspan='2'>
				<input name="Button1" type="button" value="+" onclick="add()" />
				</th>	
			</tr>	
			
			<tr>	
				<th scope='row' abbr='Model' class='spec'>
				<label id="Label1">To</label>
				</th>
        		<th scope='col'>
        		<input class="selectday" id="timestamp1"  type="Text" name="timestamp1" value="" >				
				</th>
				
			</tr>

            <tr>
            	<th scope='row' abbr='Model' class='spec'>
            	<label id="Label1">Available</label>
				</th>
				
				<th scope='col'>
        		<input id="available" name="Text1" type="text" />
				</th>
				<th scope='col'>
                </th>
            </tr> 
            
            <tr>
                <th scope='row' abbr='Model' class='spec'>
                <label id="Label1">Price</label>
				</th>
				<th scope='col'>
				<input id="price" name="Text1" type="text" />
				</th>
        		
				<th scope='col'>
				</th>
			</tr>

            <tr>
				<th scope='col' colspan='3'>
  				<label id="Label1">Set Availability And Prices</label>
				</th>
			</tr>
			
			<tr>
		        <th scope='row' abbr='Model' class='spec' colspan='3'>
                <table id='newRoomAvailabilityTable' style='width:100%' cellspacing='0' >		
                   <tr>
					    <th>No</th>
				    	<th>From</th>
					    <th>To</th>
					    <th>Available </th>
                        <th>Price</th>
                        <th>
					    <input id="newRoomAvailabilityminusButton" name='Button1' type='button' value='-' onclick='remove()' disabled="true" />
              		    </th>
 					</tr>
				</table>
				</th>
			</tr>
			
			
			
			<tr>
				<th scope='col' colspan='3'>
				<center>
				<input name="Button1" type="button" value="Create New Room" onclick="createNewRoom()" />
				</center>
				</th>
			</tr>
		</table>
		</center>
