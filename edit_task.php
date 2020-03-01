<?php
require_once('check_cookie.php');

require_once('all_class/task_class.php');
if($_GET['task_id']){ // receive task_id from task.php
	$task_id = $_GET['task_id']; // get task_id
	$tasks = new task();
	$task_selecting_id = $tasks->get_all_task_edit_id($task_id);
	
	$edit_task = "<form action='edit_task.php' method='post'>";
	$edit_task.= "Task name:  <input type='text' name='task_name' value='".$task_selecting_id[0]['nomi']."' /><br><br>"; // task_name for editing
	$edit_task.= "Task deadline:<input type='date' name='deadline' value='".$task_selecting_id[0]['deadline']."' /><br>"; // task_deadline for editing
	$edit_task.= "<input type='hidden' name='task_id' value='".$task_selecting_id[0]['id']."' /><br>"; // task category_id for editing (hidden) 
	$edit_task.= "<input type='submit' name='save_edit_task' value='save edit task' />"; 
	$edit_task.="</form>";
	print_r($edit_task);
	die;
}
if($_POST['save_edit_task']){
	$new_edit_task['task_name']=$_POST['task_name'];
	$new_edit_task['deadline'] = $_POST['deadline'];
	$new_edit_task['task_id'] = $_POST['task_id'];
	$tasks = new task();
	$tasks->edit_task($new_edit_task);
	header("Location: index.php");
}





?>