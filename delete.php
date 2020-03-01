<?php
require_once('check_cookie.php');
require_once('all_class/category_class.php');
require_once('all_class/task_class.php');
if($_GET['task_id']){
	$task = new task();
	$task_id = $_GET['task_id'];
	$task->delete($task_id);
	header("Location: " . $_SERVER["HTTP_REFERER"]);
}	


if($_GET['category_id']){
	$category = new category();
	$category_id = $_GET['category_id'];
	$category->delete($category_id);
	header("Location: " . $_SERVER["HTTP_REFERER"]);
}


?>