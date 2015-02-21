<? include "include/header.php"; ?>
<? 
if (isset($_POST['submit']))
{
	$title=$_POST['title'];
	$group=$_POST['group'];
	$details=$_POST['details'];
	$id=$data['donor_id'];
	
	$qry->queryInsert("INSERT INTO tbl_requests(`request_title` ,
`request_details` ,
`request_group` ,
`donor_id`)

VALUES ('$title' ,
'$details' ,
'$group' ,
'$id') "																																										);
	
	 echo" <div style='padding:10px; display:block; background-color: #00ff00;' ><p>Registered Successfully.</p></div>";

/*echo "<script>document.location='login.php';</script>";*/

}

?>
	<h2>Post a request!</h2>
<div class="col col1 span_2_of_4">
			  <div class="contact-form">
				    <form method="post" enctype="application/x-www-form-urlencoded">
					    <div>
					    	<span><label>Title</label></span>
					    	<span><input name="title" type="text" required></span>
					    </div>					    <div>
					    	<span><label>Blood Group Required</label> <select name="group" required>
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
					    	<span><label>Details</label></span>
					    	<span><textarea name="details" type="radio" value="m" required></textarea> </span>
					    </div>					    

					   <div>
					   		<span><input name="submit" value="Register" type="submit"></span>
					  </div>
					  					   <div>
					   		
					  </div>
	     	    </form>
		    </div>
  		</div>
		
		<?
		  $sql = "SELECT * FROM tbl_requests order by `request_date` desc";
    		$count=1;
			$qry_all_prod=$qry->querySelect($sql);
			foreach($qry_all_prod as $prod)
			{?>
<div class="image group">
				<div style="background-color:#DDD; width:100%; padding:5px;" class="grid span_2_of_3">
					 <a href="details.html"><h3><?=$prod['request_title'] ?></h3></a>
					<p><div style="font-size:12px; font-style:italic;">Date: <?=$prod['request_date'] ?></div>
					
					<?=$prod['request_details'] ?></p>
					
			   </div>
		   </div>

    <div></div></td>
  <? $count++; } ?>
</div>
<? include "include/footer.php"; ?>