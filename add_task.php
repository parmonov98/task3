<?php
require_once('check_cookie.php');
require_once('all_class/task_class.php');
if($_GET['category_id']){ // if get hasnot 
	$category_id = $_GET['category_id'];
	$task_message="<h1><a href='index.php'>Main page</a></h1>";
	$task_message.= "<form action='add_task.php' method='post'>";
	$task_message.= "<input type='text' name='task_name' placeholde='Nomini kiriting'>"; // task name
	$task_message.= "<input type='date' name='deadline'>"; // task deadline
	$task_message.= "<input type='hidden' name='category_id' value='".$category_id."'>"; // task category_id	
	$task_message.= "<input type='submit' name='save_task' value='Save task'>";
	$task_message.= "</form>";
	print_r($task_message);
	die;
}


if(isset($_POST['save_task'])){ // gather all info in array
	$new_task =[];
	$new_task['task_name']=$_POST['task_name']; // new task name
	$new_task['deadline']=$_POST['deadline']; // task deadlie
	$new_task['category_id']=$_POST['category_id']; // task category_id
	
	$task = new task();
	$task->add_task($new_task);
	header("Location: " . $_SERVER["HTTP_REFERER"]);
}



?>