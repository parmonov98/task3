<?php
require_once('check_cookie.php');
require_once('all_class/user.php');
require_once('all_class/category_class.php');
$categoires = new category();
$user_all =  new user; // object from user
$user = $user_all->check_user_has_account($_COOKIE['user']); // get cookies user
$user_id = $user[0]['id'] ;// get user id for printing categories
$all_category = $categoires->get_all_category($user_id); // get all categories for this user
$messages_category="<h1><a href='add_category.php?user_id=$user_id'>Add category</a></h1>"; // gather all message and print last
$i=0;
if($all_category){
	foreach ($all_category as $key => $value) {
		$i++;
		$messages_category.= $i.".<a href='task.php?category_id=".$value['id']."&category_name=".$value['name']."'>".$value['name']."</a>"; // send this categoru id and name to task
		$messages_category.= "<a href='edit_category.php?category_id=".$value['id']."'>[edit]</a>";
		$messages_category.= "<a href='delete.php?category_id=".$value['id']."'>[delete]</a>";
		$messages_category.="<br>";
	}
}
print_r($messages_category);




?>