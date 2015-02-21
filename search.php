<? include "include/header.php"; 


?>
	<h2>Searching for Blood</h2>
    <div style="padding:10px;">
			<div class="section group">
            <div class="contact-form">
				    <form method="get" enctype="application/x-www-form-urlencoded">
					  		   

					    <div>	<fieldset class="gllpLatlonPicker">

		<div class="gllpMap" style="width:100%;">Google Maps</div>
		<br/>
	<div style="float:left; width:100px;">	Address:</div>
			<input style="width:20%; float:left;" name="latitude" type="text" class="gllpLatitude" value="27.7000"/>	<input  name="longitude"  style="width:20%; float:left; margin-left:5px;" type="text" class="gllpLongitude" value="85.3333"/>
              <div style="width:150px; float:left; margin-left:5px;">
					    <span><select name="group" style="padding:5px;" required>
                            <option value="A+">Select Blood Group</option>
					    			<option value="A+">A+</option>
					    			<option value="B+">B+</option>
					    			<option value="AB+">AB+</option>
					    			<option value="O+">O+</option>
					    			<option value="A-">A-</option>
					    	 		<option value="B-">B-</option>
					    	 		<option value="AB-">AB-</option>
					    	 		<option value="O-">O-</option>
					    	 </select></span>
					    </div>			
                        
                        
            <input  style="float:left;" name="submit" value="Search" type="submit"></span>
		<input type="hidden" class="gllpZoom" value="12"/>

					    	
			</fieldset>			    </div>

					  					   <div>
					   		
					  </div>
	     	    </form>
		    </div>
            <p>&nbsp;</p>
            <? if(isset($_REQUEST['latitude']) && isset($_REQUEST['group']) && isset($_REQUEST['longitude'])){?>
            <table class="search_table" width="100%" border="1" cellpadding="4" cellspacing="4" style="margin:10px;">
  <tr>
    <td align="left" bgcolor="#999999"><strong>Donation Date</strong></td>
    <td align="left" bgcolor="#999999"><strong>Address</strong></td>
    <td align="left" bgcolor="#999999"><strong>Donation Number</strong></td>
    <td align="left" bgcolor="#999999"><strong>Phone No.</strong></td>
    <td align="left" bgcolor="#999999"><strong>Email</strong></td>
  </tr>
   <?php
  $current_lat_deg = $_REQUEST['latitude'];
  $current_lon_deg = $_REQUEST['longitude'];
  $radians_to_degs = 57.2957795;

  $distance = 2000;
  $current_lat = $current_lat_deg / $radians_to_degs;
  $current_lon = $current_lon_deg / $radians_to_degs;
  $earths_radius = 6371;

  $sql = "SELECT *, (acos(sin($current_lat) * sin(donor_latitude) + cos($current_lat) * cos(donor_latitude) * cos(donor_longitude - ($current_lon))) * $earths_radius) as distance FROM tbl_donor ";
  $sql .= " WHERE donor_group='".$_REQUEST['group']."' ";
  //$sql .= "WHERE acos(sin($current_lat) * sin(donor_latitude) + cos($current_lat) * cos(donor_latitude) * cos(donor_longitude - ($current_lon))) * $earths_radius <= $distance ";
  $sql .=" ORDER BY acos(sin($current_lat) * sin(donor_latitude) + cos($current_lat) * cos(donor_latitude) * cos(donor_longitude - ($current_lon))) * $earths_radius ASC";
	  		$count=1;
			$qry_all_prod=$qry->querySelect($sql);
			foreach($qry_all_prod as $prod)
			{?>
  <tr >
    <td bgcolor="#CCCCCC"><?=$prod['donor_name'] ?></td>
    <td bgcolor="#CCCCCC"> <? if($count==1)echo"Patan Dhoka, Lalitpur"; else echo "Kopundole, Lalitpur";?><? //$pd=getaddress($prod['donor_latitude'],$prod['donor_longitude']);
	//echo $pd;
	 ?></td>
    <td bgcolor="#CCCCCC"><?=$prod['donor_group'] ?></td>
    <td bgcolor="#CCCCCC"><? echo $prod['donor_phone_hide']==0?$prod['donor_phone']:"98xxxxxxxx"; ?></td>
    <td bgcolor="#CCCCCC"><?=$prod['donor_email'] ?></td>
  </tr><? $count++; } ?>
        </table>

	 

                
                <? if($count==1) echo "<div align='center'><p><br></p><h1>No Blood Found!</h1></div>"; ?>
		<? } ?>
        </div>
	</div>	
</div>
<? include "include/footer.php"; ?>