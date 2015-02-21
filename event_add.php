<? include "include/header.php"; ?>
<? 
if (isset($_POST['submit']))
{
	$event_title=$_POST['event_title'];
	$event_date=$_POST['event_date'];
	$event_description=$_POST['event_description'];
	$event_latitude=$_POST['event_latitude'];
	$event_longitude=$_POST['event_longitude'];
	$donor_id=$data['donor_id'];

	
	$qry->queryInsert("INSERT INTO tbl_events(
`event_title` ,
`event_date` ,
`event_description` ,
`event_latitude` ,
`event_longitude`,
`donor_id` )

VALUES ('$event_title' ,
'$event_date' ,
'$event_description' ,
'$event_latitude' ,
'$event_longitude',
'$donor_id') "																																										);
	
	 echo" <div style='padding:10px; display:block; background-color: #00ff00;' ><p>Event Added Successfully.</p></div>";

/*echo "<script>document.location='login.php';</script>";*/

}

?>
	<h2>Add an event Now!</h2>
<div class="col col1 span_2_of_4">
			  <div class="contact-form">
				    <form method="post" enctype="application/x-www-form-urlencoded">
					    <div>
					    	<span><label>Event title</label></span>
					    	<span><input name="event_title" type="text" required></span>
					    </div>

					   <div>
					    	<span><label>Event date</label> <input placeholder="YYYY-MM-DD" pattern='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])' title='Date format (Format: YYYY-MM-DD)'  name="event_date" type="date" required></span>
					    </div>					   

					   				    <div>
					    	<span><label>Event Details</label> </span>
					    	<span>
				    	  <textarea required name="event_description"></textarea></span>
					    </div>
				    	
						<fieldset class="gllpLatlonPicker">

		<div class="gllpMap">Google Maps</div>
		<br/>
		Location:
			<input name="event_latitude"  style="width:20%; float:left;" type="text" class="gllpLatitude" value="27.7000"/>	<input name="event_longitude" style="width:20%; float:left; margin-left:5px;" type="text" class="gllpLongitude" value="85.3333"/>
		<input type="hidden" class="gllpZoom" value="12"/>
<input style="float:left;" name="submit" value="Register" type="submit">
					    	
			</fieldset>	
				
					  					   <div>
					   		
					  </div>
	     	    </form>
		    </div>
  		</div>
		
</div>
<? include "include/footer.php"; ?>