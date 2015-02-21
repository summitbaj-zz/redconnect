<? include "include/header.php"; 
$id=$_REQUEST['id'];
$query = "select * from books where id=$id";
		$books=$qry->querySelectSingle($query);	 
		
		
		if (isset($_POST['submit']))
{



$results=$qry->queryExecute("insert into requests (name,email,mobile,address,qty,addition,book_id) values('".$_POST['name']."','".$_POST['email']."','".$_POST['mobile']."','".$_POST['address']."','".$_POST['qty']."','".$_POST['addition']."','".$_REQUEST['id']."')");
?><script>
alert("Thankyou , Purchase Order Sent Successfully");
document.location='?id=<?=$_REQUEST['id']?>&success';</script><? }

?>

	<h2><?=$books['title'] ?></h2>
		<div class="section group">
		<div class="cont">
			<div class="single">
				<div class="grid-img1">
					<a href="web/images/pic4.jpg"><img width="150" src="images/upload/<?=$books['file'] ?>"></a> 
				</div>
				<div class="para">
					<h4><?=$books['title'] ?></h4>
				<div class="cart-b">
					<span class="price left"><sup>Rs. <?=$books['price'] ?></sub></span>
				    <div class="clear"></div>
				 </div>
				 <h3><?=$books['title'] ?></h3>
			   	<p><?=$books['content'] ?></p>
			   	<p><b>Written by </b><? $query = "select * from author where author_id=".$books['author_id'];
		$author=$qry->querySelectSingle($query);	echo $author['name']; ?></p>
			   	</div>
			   <div class="clear"></div>	
		   </div>
	   <div class="text-h1 top">
			<h2>Request for purchase</h2>
	  	</div>
	    <div class="div2">
       
        <form action="" method="post" enctype="multipart/form-data"><div class="col col1 span_2_of_4">
			  <div class="contact-form">
			 
				    	<div>
					    	<span><label>NAME</label></span>
					    	<span><input name="name" type="text" id="name" value=""></span>
					    </div>
					    <div>
					    	<span><label>E-MAIL</label></span>
					    	<span><input name="email" type="text" id="email" value=""></span>
					    </div>
					    <div>
					     	<span><label>MOBILE</label></span>
					    	<span><input name="mobile" type="text" id="mobile" value=""></span>
					    </div>
                        <div>
					     	<span>
					     	<label>ADDRESS</label></span>
					    	<span><input name="address" type="text" id="address" value=""></span>
					    </div>
                        <div>
					     	<span>
					     	<label>QUANTITY</label></span>
					    	<span><input name="qty" type="text" id="qty" value=""></span>
					    </div>
					    <div>
					    	<span>
					    	<label>ADDITIONAL NOTE</label></span>
					    	<span><textarea name="addition" id="addition"> </textarea></span></div>
					   <div>
					   		<span><input name="submit" type="submit" id="submit" value="submit"></span>
	      </div><div class="clear"></div>
                      <div class="clear"></div>
	     	   
		    </div>
  		</div>
        </form>

   		</div>
	</div>
</div>
</div>
<? include "include/footer.php"; ?>