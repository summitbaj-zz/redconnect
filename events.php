<? include "include/header.php"; ?>
	<h2>Blood Donation Events</h2>
    <div style="padding:10px;">
			<div class="section group">
            <div class="contact-form">
				    <form method="get" enctype="application/x-www-form-urlencoded">
					  		   

					    <div>	<fieldset class="gllpLatlonPicker">

		<div class="gllpMap" style="width:100%;">Google Maps</div>
		<br/>
	<div style="float:left; width:100px;">	Address:</div>
			<input style="width:20%; float:left;" name="latitude" type="text" class="gllpLatitude" value="27.7000"/>	<input  name="longitude"  style="width:20%; float:left; margin-left:5px;" type="text" class="gllpLongitude" value="85.3333"/>
              		
                        
                        
            <input  style="float:left;" name="submit" value="Search by nearest location" type="submit"></span>
		<input type="hidden" class="gllpZoom" value="12"/>

					    	
			</fieldset>			    </div>

					  					   <div>
					   		
					  </div>
	     	    </form>
		    </div>
            <p>&nbsp;</p>
         
             <div><a href="event_add.php" style="padding:5px; background-color:#880000; COLOR:#FFF"> ADD AN EVENT </a></div>
    <? if(isset($_REQUEST['latitude']) && isset($_REQUEST['group']) && isset($_REQUEST['longitude'])){
  $current_lat_deg = $_REQUEST['latitude'];
  $current_lon_deg = $_REQUEST['longitude'];
  $radians_to_degs = 57.2957795;

  	$distance = 2000;
  	$current_lat = $current_lat_deg / $radians_to_degs;
  	$current_lon = $current_lon_deg / $radians_to_degs;
  	$earths_radius = 6371;
	$order=" ORDER BY acos(sin($current_lat) * sin(donor_latitude) + cos($current_lat) * cos(donor_latitude) * cos(donor_longitude - ($current_lon))) * $earths_radius ASC";
	}else
	{
	$order=" ORDER by `event_date`";
		}
  $sql = "SELECT * FROM tbl_events ";
  $sql.=$order;
    		$count=1;
			$qry_all_prod=$qry->querySelect($sql);
			foreach($qry_all_prod as $prod)
			{?>
<div class="image group">
				<div style="background-color:#DDD; width:100%; padding:5px;" class="grid span_2_of_3">
					 <a href="details.html"><h3><?=$prod['event_title'] ?></h3></a>
					<p><div style="font-size:12px;"><b>Date:</b> <?=$prod['event_date'] ?></div>
					<div style="font-size:12px;"><b>Place:</b> <? //if($count==1)echo"Patan Dhoka, Lalitpur"; else echo "Kopundole, Lalitpur";?><?=getaddress($prod['event_latitude'],$prod['event_longitude']);?></div>
					
					<?=$prod['event_description'] ?></p>
					
			   </div>
		   </div>

    <div></div></td>
  <? $count++; } ?>
  
	 

                
                <? if($count==1) echo "<div align='center'><p><br></p><h1>No Event Found!</h1></div>"; ?>
		
        </div>
	</div>	
</div>
<? include "include/footer.php"; ?>