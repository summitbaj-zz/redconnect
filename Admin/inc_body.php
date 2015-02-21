<?php 
if(isset($_REQUEST['function'])){
	$function=$_REQUEST['function'];
	}
	else{
		
		$function="";
		}

switch($function){
	
case "books_edit":
include("books_edit.php");
break;

case"books":
include"books.php";
break;

case"images":
include"images.php";
break;

case "book_orders":
include("book_orders.php");
break;

case "author_orders":
include("author_orders.php");
break;

case "author_edit":
include("author_edit.php");
break;

case"author":
include"author.php";
break;

case"change":
include"change.php";
break;

case "category_edit":
include("category_edit.php");
break;

default:
include"category.php";
break;
}
?>