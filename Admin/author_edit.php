<? if (isset($_REQUEST['stat'])){ ?>
<? 
if (isset($_POST['submit']))
{
	
	$qry->queryInsert("INSERT INTO author(`name` ,`bio` )
VALUES ('".htmlspecialchars($_REQUEST['name'])."','".htmlspecialchars($_REQUEST['bio'])."') "																																										);
	
	 echo" <div id=\"result\"><ul><li>Information Added Successfully.</li></ul></div>";

/*echo "<script>document.location='?function=author';</script>";*/

}

?>

<form name="form1" method="post" enctype="multipart/form-data"  action="?function=author_edit&stat=new">
  <h6>author</h6>
	    <table width="100%" border="0" cellpadding="1" cellspacing="2">
          <tr>
            <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Name:</td>
            <td width="65%" align="left" valign="middle"><input name="name" type="text"  class="comment" id="name" /></td>
          </tr>
          <tr>
            <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Bio:</td>
            <td align="left" valign="middle"><textarea name="bio" class="comment" id="bio"></textarea></td>
          </tr>
          
          <tr align="center">
            <td width="20%">&nbsp;</td>
            <td align="left" valign="middle"><div align="left">
                <input name="submit" type="submit" class="bttn" id="submit" style="width:70px" value="Submit" >
            </div></td>
          </tr>
  </table>
</form>


<? } elseif (!isset($_REQUEST['stat'])){ $author_id = $_REQUEST['author_id']; 
$query = "select * from author where author_id=$author_id";
		$author=$qry->querySelectSingle($query);	 ?>
		<? 
if (isset($_POST['submit']))
{

$author_id=$_REQUEST['author_id'];
$name=$_REQUEST['name'];
$bio=htmlspecialchars($_REQUEST['bio']);


$results=$qry->queryExecute("update author set  name='".$name."', bio='".$bio."' where author_id='".$author_id."'");
echo "<script>document.location='?function=author';


</script>";
}

?>
<form name="form1" method="post" enctype="multipart/form-data"  action="?function=author_edit&author_id=<?=$_REQUEST['author_id']?>">
  <h6>author
     : <?=$author['name']; ?>
  </h6>
  <table width="100%" border="0" cellpadding="1" cellspacing="2">
    <tr>
      <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Name:</td>
      <td width="65%" align="left" valign="middle"><input name="name" type="text"  class="comment" id="name" value="<? if($author ==''){echo'';} else {echo $author['name'];} ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;&nbsp;Bio:</td>
      <td align="left" valign="middle"><textarea name="bio" class="comment" id="bio"><? if($author ==''){echo'';} else {echo $author['bio'];} ?>
      </textarea></td>
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
