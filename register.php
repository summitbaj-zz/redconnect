<? include "include/header.php"; ?>
<? 
if (isset($_POST['submit']))
{
	$name=$_POST['name'];
	$group=$_POST['group'];
	$sex=$_POST['sex'];
	$number=$_POST['number'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];
	$phone=$_POST['phone'];
	$phone_hide = $_POST['phone_hide'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	
	$qry->queryInsert("INSERT INTO tbl_donor(`donor_name` ,
`donor_email` ,
`donor_group` ,
`donor_sex` ,
`donor_number` ,
`donor_latitude` ,
`donor_longitude`,
`donor_phone` ,
`donor_password`,
`donor_phone_hide`)

VALUES ('$name' ,
'$email' ,
'$group' ,
'$sex' ,
'$number',
'$latitude',
'$longitude',
'$phone' ,
'$password',
'$phone_hide') "																																										);
	
	 echo" <div style='padding:10px; display:block; background-color: #00ff00;' ><p>Registered Successfully.</p></div>";

/*echo "<script>document.location='login.php';</script>";*/

}

?>
	<h2>Register Now!</h2>
<div class="col col1 span_2_of_4">
			  <div class="contact-form">
				    <form method="post" enctype="application/x-www-form-urlencoded">
					    <div>
					    	<span><label>Name</label></span>
					    	<span><input name="name" type="text" required></span>
					    </div>					    <div>
					    	<span><label>Blood Group</label></span>
					    	<span><select name="group" required>
					    			<option value="A+">A+</option>
					    			<option value="B+">B+</option>
					    			<option value="AB+">AB+</option>
					    			<option value="O+">O+</option>
					    			<option value="A-">A-</option>
					    	 		<option value="B-">B-</option>
					    	 		<option value="AB-">AB-</option>
					    	 		<option value="O-">O-</option>
					    	 </select></span>
					    </div>					    <div>
					    	<span><label>Sex</label></span>
					    	<span><input name="sex" type="radio" value="m" required> Male   <input name="sex" type="radio" value="f"> Female </span>
					    </div>					    <div>
					    	<span><label>Donor Number</label></span>
					    	<span><input required name="number" type="text"></span>
					    </div>				    <div>
					    	<span><label>Phone</label> 
					    	( Do you want your number be public?
				
					    	
					    	    <input type="radio" name="phone_hide" value="0" id="RadioGroup1_0">Yes
					    	    <input type="radio" name="phone_hide" value="1" id="RadioGroup1_1">No
					    	   
				    	  
					    	)</span>
					    	<span>
				    	  <input required name="phone" type="text"></span>
					    </div>
				    	
						<fieldset class="gllpLatlonPicker">

		<div class="gllpMap">Google Maps</div>
		<br/>
		Location:
			<input name="latitude"  style="width:20%; float:left;" type="text" class="gllpLatitude" value="27.7000"/>	<input name="longitude" style="width:20%; float:left; margin-left:5px;" type="text" class="gllpLongitude" value="85.3333"/>
		<input type="hidden" class="gllpZoom" value="12"/>

					    	
			</fieldset>	
						<div>
						
					    	<span><label>Email</label></span>
					    	<span><input required name="email" type="email"></span>
					    </div>
					    <div>
					    	<span><label>Password</label></span>
					    	<span><input name="password" type="password" id="password"></span>
					    </div>
					        <div>
					    	<span><label>Confirm Password</label></span>
					    	<span><input name="confirm" type="password"></span>
					    </div>
					   <div>
					   		<span><input name="submit" value="Register" type="submit"></span>
					  </div>
					  					   <div>
					   		
					  </div>
	     	    </form>
		    </div>
  		</div>
		
</div>
<? include "include/footer.php"; ?>