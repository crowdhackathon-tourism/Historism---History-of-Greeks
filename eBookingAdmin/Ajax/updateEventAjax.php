<?php
 
    
  	require "DBcon.php";
    
	$id=$_POST['id'];
	
	
	if(isset($_POST['name']))
	{
		$query="UPDATE `event` SET Name='".$_POST['name']."' WHERE ID=".$id."";
		mysql_query($query);
	}
	
	if(isset($_POST['lecturer']))
	{
		$query="UPDATE `event` SET Lecturer='".$_POST['lecturer']."' WHERE ID=".$id."";
		mysql_query($query);
	}

	
	if(isset($_POST['description']))
	{
		$query="UPDATE `event` SET Description='".$_POST['description']."' WHERE ID=".$id."";	
		mysql_query($query);
	}
    
	if(isset($_POST['date']))
	{
		$query="UPDATE `event` SET Date='".$_POST['date']."' WHERE ID=".$id."";
		mysql_query($query);
	}
    
	if(isset($_POST['finallydate']))
	{
		$query="UPDATE `event` SET FinallyDate='".$_POST['finallydate']."' WHERE ID=".$id."";
		mysql_query($query);
	}
    
	if(isset($_POST['time']))
	{
		$query="UPDATE `event` SET Time='".$_POST['time']."' WHERE ID=".$id."";
		mysql_query($query);
	}	
	
	
	$i=$_POST['row'];
	$query="SELECT * FROM event WHERE ID=".$id."";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
				
			//	echo "<table><tr>";
				echo "<th scope='row' abbr='Model' class='spec' >".$row[0]."</th>";
				echo "<input type='hidden' id='Code".$i."' value='".$row['ID']."'>";
				echo "<td>";
					echo $row[1];
					echo "<input type='hidden' id='Name".$i."' value='".$row['Name']."'>";
				echo "</td>";
				echo "<td>";
					echo $row[5];
					echo "<input type='hidden' id='Description".$i."' value='".$row['Description']."'>";
				echo "</td>";
				echo "<td>";
					echo $row[3]." / ".$row[4];
					echo "<input type='hidden' id='Date".$i."' value='".$row['Date']."'>";
					echo "<input type='hidden' id='Time".$i."' value='".$row['Time']."'>";
					echo "<input type='hidden' id='Finally_date".$i."' value='".$row['FinallyDate']."'>";
					if($row['FinallyDate']==0)
					{
						echo "  <img src='Photos/question_mark.jpg' width=15 height=15 title='It is not finalized' />";	
						
					}
				echo "</td>";
				echo "<td style='width:100px'>";
					echo $row[2];
				echo "<input type='hidden' id='Lecturer".$i."' value='".$row['Lecturer']."'>";
				echo "</td>";	
				echo "<td>";
					$query2="SELECT  * FROM users WHERE ID=".$row['Publisher'];
					$result2 = mysql_query($query2);
					$row2 = mysql_fetch_array($result2);
					echo $row2['FLName'];
					echo "<input type='hidden' id='Publisher".$i."' value='".$row2['FLName']."'>";
				echo "</td>";
				
					echo "<td  id='tool".$i."' width=50  style='border-bottom-color:white'>";
						
						//echo "	<a href='javascript:ForProcess(".$i.");'><img src='Photos/b_edit.png' width='15' height='15' title='Edit'></a> <a href='javascript:okk(".$i.");'><img src='Photos/xicon.jpg' width='15' height='15' title='Delete' ></a>";
						
						//echo "<a href='javascript:ForProcess("+$i+");'><img src='Photos/b_edit.png' width='15' height='15' title='Edit'></a> <a href='javascript:okk("+$i+");'><img src='Photos/xicon.jpg' width='15' height='15' title='Delete'></a>";
					echo "</td>";
					
				
	//echo "</tr></table>";
	
	?>