<? 

 if(isset($_REQUEST['id']))
	  { $id=$_REQUEST['id'];}
else
	  { $id='';}
	   if(isset($_REQUEST['books_id']))
	  { $books_id=$_REQUEST['books_id'];}
else
	  { $books_id='';}
 if(isset($_REQUEST['job']))
	  { $job=$_REQUEST['job'];}
else
	  { $job='';}
if($job == 'delete')
{

	$qry->queryExecute("delete from books where id=\"".$books_id."\"" );
	echo "<script language='javascript'>alert(' Record has been Deleted');
location='?function=books&id=".$_REQUEST['id']."';\n
</script>";
}
?>

<style type="text/css">
<!--
.head {
	font-size: 12px;
	font-weight: bold;
}

.style7 {color: #666666; font-weight: bold; }
.style8 {color: #666666}
.style12 {font-size: 12px}
-->
</style>
</head>
<body><table width="100%" border="0" align="center" cellpadding="3" cellspacing="4">
  <tr>
    <td width="59%"></td>
    <td width="41%" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
     <h6>&nbsp;books</h6>  <a href="?function=books_edit&stat">ADD A books </a>
     <? 

$query = "select * from  books ORDER BY `id` DESC";
$books=$qry->querySelect($query);
$numrows=sizeof($books);
$limit=30;
if(empty($_GET['page'])) $_GET['page'] = 0;
if($_GET['page']==0||$_GET['page']==1)//for the serial id
$count=1;
else if(intval($_GET['page'])>1)
$count=intval($_GET['page'])+1;
$pages = intval($numrows/$limit);
if($numrows%$limit) $pages++;
$current = ($_GET['page']/$limit) + 1;
if(($pages < 1) || ($pages == 0))
$total = 1;
else
$total = $pages;
$first = $_GET['page'] + 1;

if(((($_GET['page'] + $limit) / $limit) >= $pages) && $pages != 1)
$last = $_GET['page'] + $limit;
else
$last = $numrows;

if($numrows == 0)
{
	echo "<br><div align='left'><font color='red'><strong>Nothing  Found</strong></font></div>";
}
else
{ 

		$query = "select * from books ORDER BY `id` DESC ";
	 $query .= " LIMIT ".$_GET['page'].", $limit";
	$books = $qry->querySelect($query);
	$numrows = sizeof($books);
	
	if ($numrows == 0)
	{
	}
	else
	{
?>
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="content_table">
        <tr align="center" class="table_head" background="images/background.gif">
          <td width="2%" height="26" ><span class="style7">#</span></td>
          <td width="41%" height="30" align="left" valign="middle" ><span class="style7">Name</span><br></td>
          <td width="32%" align="center" valign="middle" >Date</td>
          <td width="6%" align="center" valign="middle" >Image</td>
          <td width="13%" ><span class="style7">Edit</span></td>
          <td width="6%" valign="middle" ><span class="style7">Delete</span></td>
          <? for($i=0;$i<=$numrows-1;$i++) { ?>
        <tr align="left" class="<? if($count%2==0)echo'table-even'; else echo''; ?>">
          <td width="2%" height="33" id="main-table"><? echo $count;?></td>
          <td align="left" valign="middle" id="main-table"><a href="?id=<? print $books[$i]['id']; ?>&function=books_edit"><? echo ( stripslashes($books[$i]['title']))?></a></td>
          <td align="center" valign="middle" id="main-table"><? echo ( stripslashes($books[$i]['date']))?></td>
          <td align="left" valign="middle" id="main-table"><img src="../images/upload/<? echo ( stripslashes($books[$i]['file']))?>" width="57" ></td>
          <td align="center" id="main-table"><a href="admin.php?function=book_orders&id=<?= $books[$i]['id']; ?>">BROWSE</a> | <a href="?books_id=<? print $books[$i]['id']; ?>&function=books_edit&id=<?=$books[$i]['id'] ?>">EDIT</a></td>
          <td width="6%" align="center" valign="middle" id="main-table"><a href="?books_id=<? print $books[$i]['id']; ?>&function=books&id=<?=$_REQUEST['id'] ?>&job=delete" class="style12"> <img src='images/delete.gif' alt="Delete Players" onClick="return doconfirm();"></a> </td>
      

		  <? 
		  $count++; } ?>
        <tr align="center" valign="middle" bgcolor="#E4E4E4"><td colspan="6" align="left" class="table_bottom"><? 

}
	//mysql_free_result($result);
	if (!empty($_GET['page']) && $_GET['page'] > 0)
	{
		$back_page = $_GET['page'] - $limit;
		$url = $_SERVER["PHP_SELF"]."?page=$back_page&function=books&ty=$ty";
		echo "<a href=\"$url\"><< Previous</a>";
	}
	if($pages > 1)
	{
		for ($i=1; $i <= $pages; $i++)
		{
			$ppage = $limit*($i - 1);
			if ($ppage == $_GET['page'])
			echo("&nbsp;<b>$i</b>&nbsp;");
			else
			{
				$url = $_SERVER["PHP_SELF"]."?page=$ppage&function=books&ty=$ty";
				echo "&nbsp";
				echo("<a href=\"$url\"><b>$i</b></a>&nbsp;");
			}
		}
	}
	if(((($_GET['page']+$limit) / $limit) < $pages) && $pages != 1)
	{
		$next_page = $_GET['page'] + $limit;
		$url = $_SERVER["PHP_SELF"]."?page=$next_page&function=books&ty=$ty";
		echo "<a href=\"$url\">Next >></a>";
	}

}

?></td>
        </tr>
    </table>      
    </td>
  </tr>
</table>


</body>
</html>
