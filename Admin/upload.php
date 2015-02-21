<?php 

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
			if(move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$key], 'uploads/'. $filename))
            {
                echo 'The file ' . $_FILES['uploaded_files']['name'][$key].' was uploaded successful <br/>';
            }
            else
			{
			echo move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$key], 'uploads/'. $filename);
				echo 'The file was not moved.';
            }
				
        }
		else
        {
			echo 'The file was not uploaded.';
        }
	}
}

?>
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
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<div class="input_holder">
		<input type="file" name="uploaded_files[]" id="input_clone" />
	</div>
	<input type="submit" value="add_files" />
</form>


</body>

</html>