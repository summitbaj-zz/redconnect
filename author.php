<? include "include/header.php"; ?>
	<h2>Authors</h2>
			
          <? 
	  
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from  author order by `name` asc");
			foreach($qry_all_prod as $data)
			{?>
			<div class="section group">
            <h2 class="bg"><?=$data['name'] ?></h2>
			<? 
	  
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from  books where author_id='".$data['author_id']."' order by `id` desc");
			foreach($qry_all_prod as $prod)
			{?>
				<div class="grid_1_of_3 images_1_of_3">
					 <a href="details.php?id=<?=$prod['id'] ?>"><img src="images/upload/thumbs/<?=$prod['file'] ?>" alt="" /></a>
					 <a href="details.php?id=<?=$prod['id'] ?>"><h3><?=$prod['title'] ?></h3></a>
				     <span class="price"><sup>Rs. <?=$prod['price'] ?></sub></span>
				     <div class="btn">
				     	<a href="details.php?id=<?=$prod['id'] ?>">Add to Cart</a>
				     </div>
				</div><? }?></div><? }?>
		
		
</div>
<? include "include/footer.php"; ?>