<? include "include/header.php"; 
$query = "select * from category where id=".$_REQUEST['id'];
		$books=$qry->querySelectSingle($query);	 
		

?>
	<h2><?=$books['title'] ?></h2>
			<div class="section group">
          <? 
	  
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from  books where category=".$_REQUEST['id']." order by `id` desc");
			foreach($qry_all_prod as $prod)
			{?>
				<div class="grid_1_of_3 images_1_of_3">
					 <a href="details.php?id=<?=$prod['id'] ?>"><img src="images/upload/thumbs/<?=$prod['file'] ?>" alt="" /></a>
					 <a href="details.php?id=<?=$prod['id'] ?>"><h3><?=$prod['title'] ?></h3></a>
				     <span class="price"><sup>Rs. <?=$prod['price'] ?></sub></span>
				     <div class="btn">
				     	<a href="details.html">Add to Cart</a>
				     </div>
				</div><? $count++; } ?>
                
                <? if($count==1) echo "<div align='center'><p><br></p><h1>No Books Found</h1></div>"; ?>
		</div>
		
</div>
<? include "include/footer.php"; ?>