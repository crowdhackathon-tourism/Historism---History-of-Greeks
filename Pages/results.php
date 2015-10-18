		<link rel='stylesheet' type='text/css' media='all' href='assets/css/calendar1/jsDatePick_ltr.min.css'' />
<script type='text/javascript' src='assets/js/calendar1/jsDatePick.min.1.3.js'></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"timestamp",
			dateFormat:"%Y-%M-%d",
			limitToToday:true
			
		});
		new JsDatePick({
			useMode:2,
			target:"timestamp1",
			dateFormat:"%Y-%M-%d",
			limitToToday:true
			
		});
	};
	
	</script>    
<?php

$check_in=$_POST['timestamp'];
$check_out=$_POST['timestamp1'];
$type=$_POST['Select'];
$sum = 0;
$day = 0;
$flag_DAY = 0;
$days_post=DaysDifference($check_in,$check_out);;
require ("Ajax/DB_hotel_users.php");
$sql="SELECT * FROM users WHERE ID_Hotel <> '-'";
$result = mysql_query($sql);
$mycounter  = mysql_num_rows($result);

$data= array();
$size=0;

while ($row = mysql_fetch_array($result)) 
{
$room= new databases();
$room->database=$row['3'];
$room->ip=$row['4'];
$room->id=$row['5'];
$data[$size]=$room;
$size++;
}

$rooms= array();
$rooms_size=0;

for($k=0;$k<$size;$k++)
{
	$hotel=$data[$k];
	$database=$hotel->database;
	$id=$hotel->id;
	$ip=$hotel->ip;

	require "Ajax/DB_hotel.php";
	
	$sql="SELECT COUNT(*) AS DayNumder FROM availability WHERE Dates >= '".$check_in."'  AND Dates <  '".$check_out."'  ";

	$result = mysql_query($sql);
	
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

				$i=0;
		  		while ( $row = mysql_fetch_array($result) ){
		  		//echo '<input id="id'.$i.'"  type="hidden"  value="'.$row['ID'].'" />';
//echo $row['ID']." ";
		   			$ids[$i]=$row['ID'];
		   			$i= $i+1;
		   		}

				$c_ane = 0; //Metritis apotelesmatwn
				
				for($n = 0; $n <count($ids); $n++){
					$sql="SELECT MIN(`".$ids[$n]."`) AS SmallestNumberOfAvailable FROM availability WHERE Dates >= '".$check_in."'  AND Dates <  '".$check_out."'  ";
					$result = mysql_query($sql);
					while ( $row = mysql_fetch_array($result) )
	  				{
//echo "<br>".	$row['SmallestNumberOfAvailable']." ";
	     				$sum=$row['SmallestNumberOfAvailable'];
	   				}
					$sql="SELECT  * FROM rooms WHERE ID ='".$ids[$n]."'";
					$result = mysql_query($sql);
					while ( $row = mysql_fetch_array($result) )
					{
//echo $row['0']." ";
						$room=new Room();
						$room->id=$row['0'];
						$room->type=$row['1'];
						$room->description=$row['2'];
						$room->capacity=$row['3'];

						/*
						$rooms[$rooms_size]=$room;
												$rooms_size++;*/
						
						
						if($sum < 1){
           				 $sum = 0;
            			}
						
						$sqle = "SELECT * FROM `room".$ids[$n]."prices` WHERE (`From` <= '".$check_in."' AND `To` >= '".$check_in ."') OR (`From` >= '".$check_in."' AND `To` <= '".$check_out ."') OR (`From` <= '".$check_out."' AND `To` >= '".$check_out."')";
						$resulte = mysql_query($sqle);
						$mycounter  = mysql_num_rows($resulte);
						$h = 1;
						
						if($sum!=0)
						{
							
							$coststring="";
							while($rowe = mysql_fetch_array($resulte)){
								
									if($h==1){
				                     	$dateFr = date('d M', strtotime($check_in));
				                    
				                    }
				                    else{
				                        $dateFr = date('d M', strtotime($rowe[0]));
				                        
				                    }	
									 
									if($h==$mycounter){
				                        $dateT = date('d M', strtotime($check_out));
				                         
				                    }
				                    else{
				                        $dateT = date('d M', strtotime($rowe[1]));
				                        
				                    }	
									
									$diff= DaysDifference($dateFr,$dateT);
									$str="";
									if($mycounter>$h)
									{
										$diff++;
										$str=" - ";
										
									}
									
									if($diff==1)
									{
										
										$coststring.= "<b>".$diff."</b> day <b>".$rowe[2]."€</b>".$str;
									}
									else
									{
										$coststring.=  "<b>".$diff."</b> days <b>".$rowe[2]."€</b>".$str;
									}
									
									
									$h++;
									 
							
							}
							$room->cost=$coststring;
//echo $coststring." ".roomCost($check_in ,$check_out, $ids[$n])."<br>";
$room->overall_cost=roomCost($check_in ,$check_out, $ids[$n]);
$room->hotel_id=$id;
$rooms[$rooms_size]=$room;
$rooms_size++;



						}
						
					}
				}

			}

}
		/*
foreach ($data as $car) {
    echo '<br/>' . $car->database . ' ' . $car->ip . "\n";
}*/





class Room{
	
	public $id;
	public $type;
	public $description;
	public $capacity;
	public $cost;
	public $overall_cost;
	public $hotel_id;

}

class databases{
	
	public $database;
	public $ip;
	public $id;

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






		<!-- Hero Section
		================================================== -->
		<section class="hero small-hero destination-header" style="background-image: url('assets/images/destination-6.jpg');">
			<div class="bg-overlay">
				<div class="container">
					<div class="intro-wrap">
						<h1 class="intro-title">Book Now A Room</h1>
						<!-- <div class="intro-text">
							<p>And more text below if you need it...</p>
						</div> -->
						<ul class="breadcrumbs">
							<!-- <li class="no-arrow"><a href="#" class="destination-context-menu"><i class="fa fa-ellipsis-v"></i><a></li> -->
							<li class="no-arrow"><i class="icon fa fa-map-marker"></i></li>
							<li><a href="#">Destination</a></li>
							<!--<li><a href="#">California</a></li>-->
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- Main Section
		================================================== -->
		<section class="main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9 col-sm-12">
						<div class="row">
							<div class="col-md-9 col-sm-12">
								<div class="clearfix">
									<h1 class="pull-left page-title">Hotels</h1>
								</div>
								<section class="guide-list">
								<?php
									$finalrooms= array();
									$final_size=0;
									for($index=0;$index<$rooms_size;$index++){
									
										$final_room=$rooms[$index];
	
										$indexf=$index+1;
										for($indexi=$indexf;$indexi<$rooms_size;$indexi++){
											$temproom=$rooms[$indexi];	
											
											if($final_room->hotel_id==$temproom->hotel_id){
												if($final_room->overall_cost>=$temproom->overall_cost)
												{
													$final_room=$temproom;
												}
					
												$index=$indexi;
											}
										}
											
										$finalrooms[$final_size]=$final_room;
										$final_size++;
									}


									for($index=0;$index<$final_size;$index++){
										$temproom=$finalrooms[$index];
										
										require ("Ajax/DBcon.php");
										$sql="SELECT * FROM posts WHERE ID=".$temproom->hotel_id;
										$result = mysql_query($sql);
										$row=mysql_fetch_array($result); 
										
										$sql_dest = "SELECT name FROM destinations WHERE ID = ".$row['destination_id'];
										$result_dest = mysql_query($sql_dest);
										$row_dest = mysql_fetch_array($result_dest); 
										

									echo "<article class='media guide-list-item'>";
									echo "<div class='media-left media-top'>";
									echo "<a href='index.php?p=single&ca=1&id=".$row['ID']."&chin=".$check_in."&chout=".$check_out."'>";
									echo "<img class='media-object' src='".$row['image']."' alt='".$row['title']."'>";
									echo "</a>";
									
									echo "</div>";
									echo "<div class='media-body'>";
									
									echo "<h4 class='media-heading'>".$row['title']." | Price: ".$temproom->overall_cost."€</h4>";
									echo "<div class='media-description'>";
									echo $row['description'];
									echo "</div>";
									echo "<div class='media-details'>";
									echo "<ul class='list-inline'>";
									echo "<li class='destination'><i class='fa fa-map-marker fa-fw'></i> <span>Destination: ".$row_dest['name']."</span></li>";
									echo "<li>";
									echo "<span class='rating rating-star'>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon highlighted'></i>";
									//echo "<i class='fa fa-star icon'></i>";
									echo "</span>";
									echo "</li>";
									echo "<li>";
									echo "<span class='rating rating-price'>";
									
									//echo "<i class='fa fa-dollar icon highlighted'></i>";
									//echo "<i class='fa fa-dollar icon highlighted'></i>";
									//echo "<i class='fa fa-dollar icon highlighted'></i>";
									//echo "<i class='fa fa-dollar icon'></i>";
									//echo "<i class='fa fa-dollar icon'></i>";
									echo "</span>";
									echo "</li>";
									echo "</ul>";
									echo "</div>";
									echo "</div>";
									echo "</article>";
									}
							
								?>
								</section> <!-- /.guide-list -->



							</div><!-- /.page-content -->

						</div>

					</div>

					<!-- ///////////////////// -->
					<!-- ////// SIDEBAR ////// -->
					<!-- ///////////////////// -->

					<div class="col-md-3 col-sm-12 text-center">
						<aside class="widget widget_text">
							<div class="intro-wrap">
							<div class="well" style="max-width: 100%; margin: 0 auto 10px; color:white;">
							
							<form method="POST" action="index.php?p=results">
							<div class="form-group">
								<div class="col-lg-14">
									<label>Check In</label>
									<input type="text" class="form-control" id="timestamp"  name="timestamp" placeholder="Date">
								</div>
							</div>
								
							<div class="form-group">
								<div class="col-lg-14">
									<label>Check Out</label>
									<input type="text" class="form-control" id="timestamp1" name="timestamp1" placeholder="Date">
								</div>
							</div>
								
							<div class="form-group">
                               	<label class="control-label" for="roomtype">
								Room Type
								<select class='selectday' id='roomtype' name='Select' >
									<option>All</option>
									<option>Single</option>
									<option>Double</option>
									<option>Triple</option>
								</select>
							</label>
								  
                              </div>
								
								
							<button type="submit" class="btn btn-default btn-lg btn-block">Check</button>
							</form>
							</div>
							</div>
							</aside>
						<div class="visible-sm visible-xs">&nbsp;</div>
						<img src="assets/images/sidebar-ad.jpg" class="img-responsive center-block" alt="" title="" />
					</div><!-- /.blog-sidebar -->

				</div><!-- /.row -->
			</div>
		</section>

