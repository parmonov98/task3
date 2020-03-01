<?php
require_once('check_cookie.php');
require_once('all_class/category_class.php');

if($_GET['category_id']){ // receive category_id from category.php
	$category_id = $_GET['category_id']; // get category_id
	$categorys = new category();
	$category_selecting_id = $categorys->get_category_edit_id($category_id);
	
	$edit_category = "<form action='edit_category.php' method='post'>";
	$edit_category.= "category name:  <input type='text' name='category_name' value='".$category_selecting_id[0]['name']."' /><br><br>"; // category_name for editing
	$edit_category.= "<input type='hidden' name='category_id' value='".$category_selecting_id[0]['id']."' /><br>"; // category category_id for editing (hidden) 
	$edit_category.= "<input type='submit' name='save_edit_category' value='save edit category' />"; 
	$edit_category.="</form>";
	print_r($edit_category);
	die;
}
if($_POST['save_edit_category']){
	$new_edit_category['category_name']=$_POST['category_name'];
	$new_edit_category['category_id'] = $_POST['category_id'];
	$categorys = new category();
	$categorys->edit_category($new_edit_category);
	header("Location: index.php");
}





?>