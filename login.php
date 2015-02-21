<? 
if(isset($_REQUEST['submit'])){

$num=$qry->numRows("select *from tbl_donor where donor_email='".$_REQUEST['email']."' && donor_password='".md5($_REQUEST['password'])."' ");

if($num>0){  

	$_SESSION['uname']="user";
	$query = "select *from tbl_donor where donor_email='".$_REQUEST['email']."' && donor_password='".md5($_REQUEST['password'])."' ";
	$data=$qry->querySelectSingle($query);	 
	$_SESSION['donor_id']=$data['donor_id'];
	echo $_SESSION['donor_id'];
	phpredirect("index.php");
}else{
	 echo" <div style='padding:10px; display:block; background-color: #ff0000;' ><p>Invalid Password.</p></div>";
	
	}


}



if(isset($_SESSION['uname'])){

	
	
	if($_SESSION['uname']=='user')
		{
			phpredirect("index.php");	    
		}
}




?>
	<h2>Login Information</h2>
<div class="col col1 span_2_of_4">
			  <div class="contact-form">
			  	<h3>Please Log In</h3>
				       <form action="?" method="post" enctype="application/x-www-form-urlencoded">
				    	<div>
					    	<div style="width:150px; float:left;">Email</div>  <input name="email" type="email">
					    </div>
					    <div>
					    	<span><div style="width:150px; float:left;">Password</div> <input name="password" type="password" id="password"></span>
					    </div>
					   <div>
					   		<span><input value="Submit" name="submit" type="submit"></span>
					  </div>
					  					   <div>
					   		<a href="register.php">Register yourself now!!</a>
					  </div>
	     	    </form>
		    </div>
  		</div>
		
</div>