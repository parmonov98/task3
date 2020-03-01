<?php
require_once('check_cookie.php');
require_once('all_class/category_class.php');
if($_GET['user_id']){ // if get hasnot 
	$user_id = $_GET['user_id'];
	$category_message="<h1><a href='index.php'>Main page</a></h1>"; // go to main page
	$category_message.= "<form action='add_category.php' method='post'>";
	$category_message.= "<input type='text' name='category_name'>"; // category name
	$category_message.= "<input type='hidden' name='user_id' value='".$user_id."'>"; // usser _id
	$category_message.= "<input type='submit' name='save_category' value='Save category'>";
	$category_message.= "</form>";
	print_r($category_message);
	die;
}


if(isset($_POST['save_category'])){
	$new_category =[];
	$new_category['category_name']=$_POST['category_name']; // add cat_name to array
	$new_category['user_id']=$_POST['user_id'];			// add user_id to array
	$category = new category();
	$category->add_category($new_category);
	header("Location: " . $_SERVER["HTTP_REFERER"]); // header for redirect previous page
}



?>