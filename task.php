<?php
require_once('all_class/task_class.php');
require_once('category.php');

if($_GET['category_id']){
	$id = $_GET['category_id']; // cat id
	$category_name = $_GET['category_name']; // cat name
	
	$tasks = new task(); // object from task classs
	$all_tasks = $tasks->get_all_task_category_id($id);
	$messages_task="<h3>category:".$category_name."</h3>";
	$messages_task.="<h3><a href='add_task.php?category_id=$id'>Add task</a></h3>"; // gather all message and print last
	$messages_task.="<form action='save_task.php' method='post'>"; // create form for done tasks
	$i=0;// number of all tasks
	$done=0;
	
	if($all_tasks){
			foreach ($all_tasks as $key => $value) {
			$i++;
			if($value['done']!=1){
				$messages_task.= "<input type='checkbox' name='".$value['id']."'>";  // input checkbox
				$messages_task.= $value['nomi'];
			}
			else{
				$done++;
				$messages_task.=$value['nomi'];
			}
			$messages_task.= "<a href='edit_task.php?task_id=".$value['id']."'>[edit]</a>"; //editing page
			$messages_task.= "<a href='delete.php?task_id=".$value['id']."'>[delete]</a>"; // deleting page
			
			$messages_task.="<br>";
		}
	}
	$messages_task.= "<input type='hidden' name='category_id' value='".$value['category_id']."'>"; // get category_id
	$messages_task.="<input type='submit' name='save_task'  value='Save tasks'/></form>";
	$messages_task.="<h1>Umumiy->".$i."qilinganlar soni->".$done."</h1>";
	print_r($messages_task);
	die;
}



?>