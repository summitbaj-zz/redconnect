<?php 

$gallery_id=$_REQUEST['id'];

$query = "select * from gallery where id='".$gallery_id."' ";
$data=$qry->querySelectSingle($query);
$folder='../media/'.$data['folder'].'/';

if(isset($_REQUEST['delete']))
{

$query = "select * from images where id='".$_REQUEST['delete']."' ";
$img=$qry->querySelectSingle($query);

$filename=$img['file'];
	if($filename!='')
	unlink($folder.$filename);
	unlink($folder.'thumbs/'.$filename);
	$qry->queryExecute("delete from images where id='".$_REQUEST['delete']."'");
	//$qry->queryExecute("delete from uauction_template where uauctionid=$uauctionid");
	echo "<script language='javascript'>alert('Images has been Deleted');
location='?function=images&id=".$gallery_id."';\n
</script>";	
}



//Check if there are any files ready for upload
if(isset($_FILES['uploaded_files']))
{
	//For each file get the $key so you can check them by their key value
	foreach($_FILES['uploaded_files']['name'] as $key => $value)
	{
	
		//If the file was uploaded successful and there is no error
		if(is_uploaded_file($_FILES['uploaded_files']['tmp_name'][$key]) &&	$_FILES['uploaded_files']['error'][$key] == 0)
        {
            
			//Create an unique name for the file using the current timestamp, an random number and the filename			
			$filename = $_FILES['uploaded_files']['name'][$key];
            $filename = time().rand(0,999).$filename;
            
			//Check if the file was moved
			if(move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$key], $folder. $filename))
            {	// *** 1) Initialise / load image
	$createThumbs = new resize($folder.'/' . $filename);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$createThumbs -> resizeImage(200, 120, 'crop');

	// *** 3) Save image
	$createThumbs -> saveImage($folder.'/thumbs/' . $filename, 100);
	
	
	
				$results=$qry->queryExecute("insert into images(file,gallery_id) values('$filename','$gallery_id')");
                echo 'The file ' . $_FILES['uploaded_files']['name'][$key].' was uploaded successful <br/>';
            }
            else
			{
			echo move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$key],$folder. $filename);
				echo 'The file was not moved.';
            }
				
        }
		else
        {
			echo 'The file was not uploaded.';
        }
	}
}

?><h4><?=$data['title']?></h4>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css" media="screen, projection"/>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
	
		$('.add_field').click(function(){
	
			var input = $('#input_clone');
			var clone = input.clone(true);
			clone.removeAttr ('id');
			clone.val('');
			clone.appendTo('.input_holder'); 
			
		});

		$('.remove_field').click(function(){
		
			if($('.input_holder input:last-child').attr('id') != 'input_clone'){
				$('.input_holder input:last-child').remove();
			}
		
		});
	
	});
	
	</script>
</head>

<body>




<span class="add_field">+</span>
<span class="remove_field">-</span>
<form action="?function=images&id=<?=$_REQUEST['id'] ?>" method="POST" enctype="multipart/form-data">
	<div class="input_holder">
		<input type="file" name="uploaded_files[]" id="input_clone" />
	</div>
	<input type="submit" value="add_files" />
</form>

<p>&nbsp;</p>
<table width="200" border="1"><tr>
 <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from images where gallery_id='".$gallery_id."' order BY `file` asc");
			foreach($qry_all_prod as $prod)
			{
		?> 
    <td align="center"><img src="<?=$folder ?>thumbs/<?=$prod['file'] ?>" width="200" height="120"><div><a href="?function=images&id=1&delete=<?=$prod['id'] ?>">DELETE</a></div></td>
    <? }?>
  </tr>
</table>
</body>

</html>