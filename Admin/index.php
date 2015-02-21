<?
session_start();

include("../class/db_connect.class.php");
include("../class/sqlQuery.class.php");


if(isset($_REQUEST['Enter'])){
$num=$qry->numRows("select *from tbl_admin where username='".$_REQUEST['username']."' && password='".$_REQUEST['password']."' ");

if($num>0){  $_SESSION['uname']="user";
phpredirect("admin.php");
}else{
	echo"Invalid Password";
	
	}


}



if(isset($_SESSION['uname'])){
	if($_SESSION['uname']=='user')
		{
			phpredirect("admin.php");	    
		}
}



?><div align="center">
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
</div>