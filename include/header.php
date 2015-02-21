<?
session_start();
error_reporting(E_ALL);
ini_set("Display_errors", TRUE);

include("class/db_connect.class.php");
include("class/sqlQuery.class.php");

if(isset($_REQUEST['logout']))
{
unset($_SESSION['uname']);
unset($_SESSION['donor_id']);

}


if(isset($_SESSION['uname']))
{
	$query = "select *from tbl_donor where donor_id='".$_SESSION['donor_id']."' ";
	$data=$qry->querySelectSingle($query);	
}
?>
<?
function getaddress($lat,$lng)
{
$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Blood Donor Central</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/demo.css"/>
<!--slider-->
<style type="text/css">
.search_table td {
	padding: 5px;
	font-size: 12px;
	border-bottom-width: thin;
	border-bottom-style: solid;
	border-bottom-color: #999;
}
</style>
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.gallery.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#dg-container').gallery({
					autoplay	:	true
				});
			});
		</script>	


	<!-- Dependencies: JQuery and GMaps API should be loaded first -->
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

	<!-- CSS and JS for our code -->
	<link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css"/>
	<script src="js/jquery-gmaps-latlon-picker.js"></script>
</head>
<body>
<div class="menu-bg">
<div class="wrap">
	<div class="menu">
    	<ul class="nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="search.php">Search Blood</a></li>
			<li><a href="events.php">Events</a></li>
        	<li><a href="requests.php">Request a blood</a></li>
        
		</ul>
	</div>
	<div class="soc-icons">
		<ul>
			<li><a href="">Get In Touch&nbsp;</a></li>
			<li><a href=""><img src="images/facebook.png" alt="" /></a></li>
			<li><a href=""><img src="images/twitter.png" alt="" /></a></li>
			<li><a href=""><img src="images/gplus.png" alt="" /></a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
</div>
<div class="header-bg">
<div class="wrap">
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" alt="" title="logo"></a>
	</div>
	<!--
	<div class="shopping_cart">
		<div class="cart">
			<a href="#" title="View my shopping cart" rel="nofollow">
				<strong class="opencart"> </strong>
				<span class="cart_title">Cart</span>
				<span class="no_product">(empty)</span>
			</a>
		</div>
	</div>
	-->
	<div class="foot-search">
			<form action="search.php" method="get">
				<input name="q" type="text" id="q" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'keyword here';}" value="keyword here">
				<input name="search" type="submit" id="search" value="Search">
	    </form>
		  </div>
   <div class="clear"></div>
</div>
</div>
</div>

<div class="content-bg">
<div class="wrap">
<div class="main">
<div class="content">