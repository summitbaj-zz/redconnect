<? if (isset($_REQUEST['stat'])){ ?>
<? 
if (isset($_POST['submit']))
{
	$author = addslashes($_POST['author']);
	$isbn = addslashes($_POST['isbn']);
	$category = addslashes($_POST['category']);

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$image=rand(10000000000,9999999999999999999).".".$ext;
	move_uploaded_file($_FILES["file"]["tmp_name"],"../images/upload/" . $image);
	
	
	// *** 1) Initialise / load image
	$resizeObj = new resize("../images/upload/" . $image);
	$createThumbs = new resize("../images/upload/" . $image);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(200, 300, 'portrait');
	$createThumbs -> resizeImage(150, 150, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage("../images/upload/" . $image, 100);
	$createThumbs -> saveImage("../images/upload/thumbs/" . $image, 100);
	
	
	$qry->queryInsert("INSERT INTO books(`title` ,`content` ,`file`,`author_id`,`isbn`,`category`,`price`)
VALUES ('".htmlspecialchars(addslashes($_REQUEST['title']))."','".htmlspecialchars(addslashes($_REQUEST['content']))."', '".$image."', '".$author."','".$isbn."','".$category."','".$_POST['price']."') ");
	
	 echo" <div id=\"result\"><ul><li>Information Added Successfully.</li></ul></div>";

/*echo "<script>document.location='?function=books';</script>";*/

}

?>

<form name="form1" method="post" enctype="multipart/form-data"  action="?function=books_edit&stat=new">
  <h6>books</h6>
	    <table width="100%" border="0" cellpadding="1" cellspacing="2">
          <tr>
            <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Title:</td>
            <td width="65%" align="left" valign="middle"><input name="title" type="text"  class="comment" id="title" /></td>
          </tr>
          <tr>
            <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Content:</td>
            <td align="left" valign="middle"><textarea name="content" class="comment" id="content"></textarea></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;&nbsp;Category:</td>
            <td align="left" valign="middle"><select name="category" id="category">
               <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from category order BY `title` asc");
			foreach($qry_all_prod as $prod)
			{
		?> <option value="<?=$prod['id'] ?>"><?=$prod['title'] ?></option><? } ?>
            </select></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;&nbsp;<span dir="ltr">ISBN</span>:</td>
            <td align="left" valign="middle"><input name="isbn" type="text"  class="comment" id="isbn" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;&nbsp;<span dir="ltr">Price</span>:</td>
            <td align="left" valign="middle"><input name="price" type="text"  class="comment" id="price" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle">&nbsp;&nbsp;Author:</td>
            <td align="left" valign="middle"><select name="author" id="author">
              <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from author order BY `name` asc");
			foreach($qry_all_prod as $prod)
			{
		?>
              <option value="<?=$prod['author_id'] ?>">
                <?=$prod['name'] ?>
              </option>
              <? } ?>
            </select></td>
          </tr>
          <tr>
            <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Image:</td>
            <td align="left" valign="middle"><label>
              <input type="file" name="file" id="file" />
            </label></td>
          </tr>
          
          <tr align="center">
            <td width="20%">&nbsp;</td>
            <td align="left" valign="middle"><div align="left">
                <input name="submit" type="submit" class="bttn" id="submit" style="width:70px" value="Submit" >
            </div></td>
          </tr>
  </table>
</form>


<? } elseif (!isset($_REQUEST['stat'])){ $id = $_REQUEST['id']; 
$query = "select * from books where id=$id";
		$books=$qry->querySelectSingle($query);	 ?>
		<? 
if (isset($_POST['submit']))
{
	
	
	if($books['file']!=='')
	{     
		$rand=$books['file'];
	}
	else
	{
		$rand=rand().'.jpg';
	}


if($_FILES["file"]["tmp_name"]!='')
	{
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../images/upload/" . $rand);
	  $image=$rand;
	  
	// *** 1) Initialise / load image
	$resizeObj = new resize("../images/upload/" . $image);
	$createThumbs = new resize("../images/upload/" . $image);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(200, 300, 'portrait');
	$createThumbs -> resizeImage(150, 150, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage("../images/upload/" . $image, 100);
	$createThumbs -> saveImage("../images/upload/thumbs/" . $image, 100);
	
	
}

$id=$_REQUEST['id'];
$title=$_REQUEST['title'];
$content=htmlspecialchars(addslashes($_REQUEST['content']));


$results=$qry->queryExecute("update books set  title='".$title."', content='".$content."', file='".$rand."', category='".$_REQUEST['category']."', isbn='".$_REQUEST['isbn']."', author_id='".$_REQUEST['author']."', price='".$_REQUEST['price']."' where id='".$id."'");
echo "<script>document.location='?function=books';


</script>";
}

?>
<form name="form1" method="post" enctype="multipart/form-data"  action="?function=books_edit&id=<?=$_REQUEST['id']?>">
  <h6>books
     : <?=$books['title']; ?>
  </h6>
  <table width="100%" border="0" cellpadding="1" cellspacing="2">
    <tr>
      <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Title:</td>
      <td width="65%" align="left" valign="middle"><input name="title" type="text"  class="comment" id="title" value="<? if($books ==''){echo'';} else {echo $books['title'];} ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;Content:</td>
      <td align="left" valign="middle"><textarea name="content" class="comment" id="content"><? if($books ==''){echo'';} else {echo $books['content'];} ?>
      </textarea></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;Category:</td>
      <td align="left" valign="middle"><select name="category" id="category">
        <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from category order BY `title` asc");
			foreach($qry_all_prod as $prod)
			{
		?>
        <option <? if($books ==''){echo'';} else { if($prod['id']==$books['category']) echo "selected";} ?> value="<?=$prod['id'] ?>">
          <?=$prod['title'] ?>
          </option>
        <? } ?>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;<span dir="ltr">ISBN</span>:</td>
      <td align="left" valign="middle"><input name="isbn" type="text"  class="comment" id="isbn" value="<? if($books ==''){echo'';} else {echo $books['isbn'];} ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;<span dir="ltr">Price</span>:</td>
      <td align="left" valign="middle"><input name="price" type="text"  class="comment" id="price" value="<? if($books ==''){echo'';} else {echo $books['price'];} ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;Author:</td>
      <td align="left" valign="middle"><select name="author" id="author">
        <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from author order BY `name` asc");
			foreach($qry_all_prod as $prod)
			{
		?>
        <option <? if($books ==''){echo'';} else { if($prod['author_id']==$books['author_id']) echo "selected";} ?> value="<?=$prod['author_id'] ?>">
          <?=$prod['name'] ?>
          </option>
        <? } ?>
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;Image:</td>
      <td align="left" valign="middle"><input type="file" name="file" id="file" /></td>
    </tr>
    <tr align="center">
      <td width="20%"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td align="left" valign="middle"><div align="left">
          <input name="submit" type="submit" class="bttn" id="submit" style="width:70px" value="Submit" >
      </div></td>
    </tr>
  </table>
  
</form><? } ?>
