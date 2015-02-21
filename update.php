<? include "include/header.php"; ?>
<? 
if (isset($_POST['submit']))
{
	$date=$_POST['date'];
	$donor_id=$_SESSION['donor_id'];
	$longitude=$_POST['longitude'];
	$latitude=$_POST['latitude'];
	$number=$_POST['number'];
	
	$qry->queryInsert("INSERT INTO tbl_donation
	(`donation_date`,`donor_id` ,`donation_longitude`,`donation_latitude`,`donation_number`) VALUES ('$date' ,'$donor_id', '$longitude','$latitude','$number') ");
	
	 echo" <div style='padding:10px; display:block; background-color: #00ff00;' ><p>Updated Successfully.</p></div>";

/*echo "<script>document.location='login.php';</script>";*/

}

?>
	<h2>Update Donation details</h2>
<div style="padding:10px;">
			  <div class="contact-form">
				    <form method="post" enctype="application/x-www-form-urlencoded">
					    <div>
					    	<span><label>Donated On</label> <input placeholder="YYYY-MM-DD" pattern='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])' title='Tax ID (Format: YYYY-MM-DD)'  name="date" type="date" required></span>
					    </div>					   

					    <div>	<fieldset class="gllpLatlonPicker">

		<div class="gllpMap" style="width:100%;">Google Maps</div>
		<br/>
		<div style="float:left; width:150px;">Where did you donate?</div>
			<input style="width:20%; float:left;" name="latitude" type="text" class="gllpLatitude" value="27.7000"/>	<input  name="longitude"  style="width:20%; float:left; margin-left:5px;" type="text" class="gllpLongitude" value="85.3333"/> 
			<input  name="number"  style="width:20%; float:left; margin-left:5px;" type="text" placeholder="Donation Number" />
<input name="zoom" type="hidden" class="gllpZoom" value="14"/>
					    	<input style="float:left;" name="submit" value="Register" type="submit">
			</fieldset>			    </div>

					   <div>
					   		<span></span>
					  </div>
					  					   <div>
					   		
					  </div>
	     	    </form>
		    </div>
  		</div>
		
</div>
<? include "include/footer.php"; ?>