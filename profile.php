
<? 
if (isset($_POST['submit']))
{
	$name=$_POST['name'];
	$group=$_POST['group'];
	$sex=$_POST['sex'];
	$number=$_POST['number'];
	$location=$_POST['location'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	
	$qry->queryInsert("INSERT INTO tbl_donor(`donor_name` ,
`donor_email` ,
`donor_group` ,
`donor_sex` ,
`donor_number` ,
`donor_location` ,
`donor_phone` ,
`donor_password`)

VALUES ('$name' ,
'$email' ,'$group' ,
'$sex' ,
'$number',
'$location',
'$phone' ,
'$password') "																																										);
	
	 echo" <div style='padding:10px; display:block; background-color: #00ff00;' ><p>Registered Successfully.</p></div>";

/*echo "<script>document.location='login.php';</script>";*/

}

?>


	<h2>Welcome, <? echo ($data['donor_sex']=="m" ? "Mr." : "Ms.") ?> <?=$data['donor_name'] ?>!</h2>
<div>

	<? 	$query = "select *from tbl_donation where donor_id='".$_SESSION['donor_id']."' order by `donation_date` desc";

	$prod=$qry->querySelectSingle($query);		?>
<div align=center><br><br>

<div style="font-size:50px; font-family: 'Julius Sans One',sans-serif; margin-top:50px;">
<p>
  <?  $now = time(); // or your date as well
     $your_date = strtotime($prod['donation_date']);
     $datediff = $now - $your_date;
     $days= 90-(floor($datediff/(60*60*24)));
	 
	 if($days>0){
	 echo $days; ?> 
  Days Left for Donation
  <? }else{?> Elegible for Donation  </p>
<p>&nbsp;</p>
<p><a href="update.php" style="padding:10px; background-color:#eaa; margin:10px;">Donation Update</a></p>
<? } ?>
</div></div>
  <p style="height:100px;"></p>
  <h2 class="bg">Blood Donation Record</h2>
       <h1>&nbsp;<br />
&nbsp;       &nbsp;Last Donated On	<?=$prod['donation_date'] ?></h1>
  <?php
  $sql = "SELECT * from tbl_donation where donor_id='".$data['donor_id']."' order by `donation_date` desc";
  
  ?>
  <table  class="search_table" width="100%" border="1" cellpadding="4" cellspacing="4" style="margin:10px;">
  <tr>
    <td align="left" bgcolor="#999999">Donation Date</td>
    <td align="left" bgcolor="#999999">Address</td>
    <td align="left" bgcolor="#999999">Donation Number</td>
    </tr>
   
<?
	  		$count=1;
			$qry_all_prod=$qry->querySelect($sql);
			foreach($qry_all_prod as $prod)
			{?>
  <tr >
    <td bgcolor="#CCCCCC"><?=$prod['donation_date'] ?></td>
    <td bgcolor="#CCCCCC"><? if($count==1)echo"Patan Dhoka, Lalitpur"; else echo "Kopundole, Lalitpur";?><? //$pd=getaddress($prod['donation_latitude'],$prod['donation_longitude']);
	//echo $pd;
	 ?></td>
    <td bgcolor="#CCCCCC">&nbsp;      <?=$prod['donation_number'] ?></td>
    </tr><? $count++; } ?>
        </table>
        
         <h1>&nbsp;<br />
&nbsp;       &nbsp;Life Savior Points :	<?=($count-1)*3 ?></h1>
        
</div>
		
</div>
