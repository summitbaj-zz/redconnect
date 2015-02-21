<?
session_start();

include("../class/db_connect.class.php");
include("../class/sqlQuery.class.php");
include("../class/resize-class.php");

if(isset($_REQUEST['logout']))
{
unset($_SESSION['uname']);	
}

if(isset($_SESSION['uname'])){
	if($_SESSION['uname']!='user')
		{
			phpredirect("index.php");	    
		}
}else
	{
		phpredirect("index.php");
	}




?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><!--        Script by hscripts.com          -->
<!--        copyright of HIOX INDIA         -->
<!-- Free javascripts @ http://www.hscripts.com -->
</head><style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
	font-family: tahoma;
	font-size: 12px;
}
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a {
	color: #CCCCCC;
	font-weight: bold;
	text-decoration: none;
}
a:hover {
	color: #990000;
	text-decoration: none;
}img{
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}

h6 {
	font-family: arial;
	font-size: 14px;
	font-weight: bold;
	color: #FFFFFF;
	text-transform: uppercase;
}
.main-menu a {
	font-family: Arial;
	font-size: 15px;
	font-weight: bold;
	color: #FFFFFF;
}
.table-even {
	background-color: #060606;
}
.content_table {
	border: 2px solid #000000;
}
-->
</style><body>

<div align="center">
  <table width="800" border="0">
    <tr background="images/header_bg.png">
      <td height="38"><div align="center"><strong>ADMINISTRATIVE CONSOLE</strong></div></td>
    </tr>
    <tr bgcolor="#990000">
      <td height="5"></td>
    </tr>
    <tr >
      <td height="33" bgcolor="#505050" align=center><div class="main-menu"><a href="admin.php">CATEGORIES</a> | <a href="?function=books">BOOKS</a> | <a href="?function=author">AUTHOR</a> | <a href="?function=password">CHANGE PASSWORD</a> |<a href="admin.php?logout">LOG OUT</a></div></td>
    </tr>
    <tr>
      <td height="5" bgcolor="#151515"><? include'inc_body.php'; ?></td>
    </tr>
    <tr bgcolor="#990000">
      <td height="5"></td>
    </tr>
  </table>
</div>
</body></html>