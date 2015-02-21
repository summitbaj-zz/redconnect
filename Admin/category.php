<?php if (isset($_REQUEST['stat'])){
$stat=$_REQUEST['stat'];}
else{
$stat='';}
switch($stat){
case "1":
$cat = "where status='released'";
break;
case "2":
$cat = "where status='forth-coming'";
break;}?>
<SCRIPT language="javascript">
function doconfirm()
{
	job=confirm("Are You Sure to delete this Permanently?");
	if(job!=true)
	{
		return false;
	}
}
function changevalue()
{
	document.viewproduct.submit();
}
</SCRIPT>
<style type="text/css">
<!--
.style1 {color: #D79395}
-->
</style>


 <table width="100%" border="0" align="center" cellpadding="3" cellspacing="4">
   <tr>
     <td align="left" valign="middle"><h6>Categories</h6></td>
     <td align="right" valign="middle"><a href="?function=category_edit&stat=new">ADD A CATEGORY</a></td>
   </tr>
   <tr>
     <td colspan="2">
       
       <?
if (isset($_REQUEST['job'])){
$job=$_REQUEST['job'];}
else{
$job='';}

if (isset($_REQUEST['id'])){
$id=$_REQUEST['id'];}
else{
$id='';}

if($job == 'delete')
{
	$filename=$_REQUEST['fn'];
	if($filename!='')
	unlink($back_banner_pic_dir.$filename);
	$qry->queryExecute("delete from category where id=$id");
	//$qry->queryExecute("delete from uauction_template where uauctionid=$uauctionid");
	echo "<script language='javascript'>alert('Menu has been Deleted');
location='?function=category&stat=$stat';\n
</script>";
}
?>
       <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
         <tr bordercolor="#BACFA5" bgcolor="#666666">
           <td width="46%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">&nbsp;S.No.</font></b><b><font color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;Name</font></b></td>
           <td align="right" bgcolor="#777777" ><b><font color="#FFFFFF">OPTIONS&nbsp;&nbsp;</font></b></td>
           <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from category order BY `title` asc");
			foreach($qry_all_prod as $prod)
			{
		?><? if($count%2==0){
			$bgcolor="#111111";
			}else{
			$bgcolor="#333333";
			} ?>

         <tr bgcolor="<?=$bgcolor ?>">
           <td align="left">&nbsp;
             <?=$count; ?>
             .&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="?function=data&amp;id=<?=$prod['id']?>"><?=$prod['title']; ?></a></td>
           <td align="right"><a href="?function=data&amp;id=<?=$prod['id']?>">BROWSE</a> |<a href="?function=category_edit&id=<?=$prod['id']?>">EDIT</a>&nbsp;&nbsp;&nbsp;</td>
         </tr>
         <tr>
           <td colspan="2" align="left"></td>
         </tr>    

      <? 
				if($count%2==0)
				{echo "";}
				$count++;
			} 
		?>
       </table>
       <div align='left'>
      
     </div></td>
   </tr>
</table>


