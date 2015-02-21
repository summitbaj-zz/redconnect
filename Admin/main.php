<?
if(isset($_REQUEST['Enter'])){
$num=$qry->numRows("select *from tbl_admin where username='".$_REQUEST['username']."' && password='".$_REQUEST['password']."' ");

if($num>1){  $_SESSION['user']=;
}
?>
<form id="form1" name="form1" method="post" action=""><table width="200" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="username" id="username" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" id="password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Enter" id="Enter" value="Enter" />
    </label></td>
  </tr>
</table>

</form>
