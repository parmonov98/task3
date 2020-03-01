<?php
require_once('all_class/task_class.php');
	if(isset($_POST['save_task'])){
		$done_list=[]; // create new array for get all done tasks id and send array to save task method from task class

		foreach ($_POST as $key => $value) {
			if($key!='save_task')
				$done_list[$key]=$value; // bu
		}
		
		$task = new task();
		$list_done = $task->save_task($done_list);
		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}


?>