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
     <td align="left" valign="middle"><h6>Purchase Orders of 
       &quot;<? $query = "select * from author where author_id=".$_REQUEST['id'];
		$books=$qry->querySelectSingle($query);	
		echo $books['name'];
		?>
     &quot;</h6></td>
     <td align="right" valign="middle">&nbsp;</td>
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

	$qry->queryExecute("delete from requests where request_id=$id");
	//$qry->queryExecute("delete from uauction_template where uauctionid=$uauctionid");
	echo "<script language='javascript'>alert('Menu has been Deleted');
location='?function=book_orders&stat';\n
</script>";
}
?>
       <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
         <tr bordercolor="#BACFA5" bgcolor="#666666">
           <td width="27%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">&nbsp;S.No.</font></b><b><font color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;Ordered By</font></b></td>
           <td width="14%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">&nbsp;Book</font></b></td>
           <td width="14%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">&nbsp;Email</font></b></td>
           <td width="4%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">&nbsp;Qty</font></b></td>
           <td width="15%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">Mobile&nbsp;&nbsp;</font></b></td>
           <td width="9%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">Address&nbsp;</font></b></td>
           <td width="15%" align="left" bgcolor="#777777" ><b><font color="#FFFFFF">&nbsp;Additional Note</font></b></td>
           <td width="2%" align="center" bgcolor="#777777" ><b><font color="#FFFFFF">X</font></b></td>
           <?
	  		$count=1;
			$qry_all_prod=$qry->querySelect("select *from requests where book_id in (select id from books where author_id=".$_REQUEST['id'].") order BY `request_id` desc");
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
         <?=$prod['name']; ?></td>
           <td align="left"><? $query = "select * from books where id=".$prod['book_id'];
		$books=$qry->querySelectSingle($query);	
		echo $books['title'];
		?>
		</td>
           <td align="left"><?=$prod['email']; ?></td>
           <td align="left"><?=$prod['qty']; ?></td>
           <td align="left"><?=$prod['mobile']; ?></td>
           <td align="left"><?=$prod['address']; ?></td>
           <td align="left"><?=$prod['addition']; ?></td>
           <td align="center"><a onclick="doconfirm()" href="?function=book_orders&amp;id=<?=$prod['request_id']?>&job=delete">X</a>&nbsp;&nbsp;</td>
         </tr>
         <tr>
           <td colspan="8" align="left"></td>
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


