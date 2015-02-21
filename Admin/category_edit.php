<? if (isset($_REQUEST['stat'])){ ?>
<? 
if (isset($_POST['submit']))
{
$title=addslashes($_REQUEST['title']);


$results=$qry->queryExecute("insert into category(title) values('$title')");
echo "<script>document.location='?function=category';</script>";}

?>

<form name="form1" method="post" enctype="multipart/form-data"  action="?function=category_edit&stat=new">
       <h6>Category</h6>
	    <table width="100%" border="0" cellpadding="1" cellspacing="2">
          <tr>
            <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Name:</td>
            <td width="65%" align="left" valign="middle"><input name="title" type="text"  class="comment" id="title" /></td>
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
$query = "select * from category where id=$id";
		$data=$qry->querySelectSingle($query);	 ?>
		<? 
if (isset($_POST['submit']))
{
$id=$_REQUEST['id'];
$title=$_REQUEST['title'];


$results=$qry->queryExecute("update category set  title='".$title."' where id='".$id."'");
echo "<script>document.location='?function=category';


</script>";}

?>
<form name="form1" method="post" enctype="multipart/form-data"  action="?function=category_edit&id=<?=$_REQUEST['id']?>">
  <h6>Category
     : <?=$data['title']; ?>
  </h6>
  <table width="100%" border="0" cellpadding="1" cellspacing="2">
    <tr>
      <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Name:</td>
      <td width="65%" align="left" valign="middle"><input name="title" type="text"  class="comment" id="title" value="<? if($data ==''){echo'';} else {echo $data['title'];} ?>" /></td>
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
