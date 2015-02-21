
<? 
$query = "select * from tbl_admin";
$data=$qry->querySelectSingle($query);	 
$error="";
if (isset($_POST['submit']))
{	
	
	if($_REQUEST['old']!=$data['password'])
		{
			$error.="<li>Invalid Old Password</li>";
		}
	else{
			if($_REQUEST['new']!=$_REQUEST['psw'])
				{
					$error.="<li>Confirmation Password didn't Match</li>";
				}
				else
				{
					$password=$_REQUEST['psw'];
					$results=$qry->queryExecute("update tbl_admin set  password='".$password."' ");
					echo "UPDATED SUCCESSFULLY";
				}
		
		}
echo "<ul>".$error."</ul>";
}


?>
<form name="form1" method="post" enctype="multipart/form-data"  action="?function=change">
  <h6>CHANGE PASSWORD</h6>
  <table width="100%" border="0" cellpadding="1" cellspacing="2">
    <tr>
      <td width="20%" align="left" valign="middle">&nbsp;&nbsp;Old Password</td>
      <td width="50%" align="left" valign="middle"><input name="old" type="password"  class="comment" id="old" /></td>
    </tr>
    <tr align="center">
      <td width="20%" align="left"> &nbsp; New Password</td>
      <td width="50%" align="left" valign="middle"><input name="new" type="password"  class="comment" id="new" /></td>
    </tr>
    <tr align="center">
      <td width="20%" align="left"> &nbsp;&nbsp;Re-Enter Password</td>
      <td width="50%" align="left" valign="middle"><input name="psw" type="password"  class="comment" id="psw" /></td>
    </tr>
    <tr align="center">
      <td width="20%" align="left">&nbsp;</td>
      <td width="50%" align="left" valign="middle"><input name="submit" type="submit" class="bttn" id="submit" style="width:70px" value="Change" /></td>
    </tr>
  </table>
  
</form>
