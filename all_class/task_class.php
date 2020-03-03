<?php

/**
 * 
 */
class task
{
	private $base;
	function __construct()
	{
		$this->base = mysqli_connect("localhost","root","","schedule");
	}
	function query_result_array($query){
		$result = mysqli_query($this->base,$query); // result of query
		
		if(mysqli_num_rows($result)){ // if this task has this category 
			$new_user_array=[];
			while ($row = mysqli_fetch_array($result)) {
				$new_user_array[]=$row;
			}
			return $new_user_array;
		}
		else {
			return 0;
		}
	}

	function query_result($query){
	   mysqli_query($this->base,$query);
	}
	function get_all_task_category_id($id){ // categoriya bo`yica datani oliw
		$query = "select *from task_name where category_id=$id;";
		$result = $this->query_result_array($query);
		return $result;
	}
	function save_task($done_list){ // receive 
			$queries='';
			$category_id = $done_list['category_id']; // kategoriya id 
			foreach ($done_list as $key => $value) { // kelgan massiv 2xil ko`riniwida bajarilgan tasklar va ctegory_id

			 if(gettype($key)!='string'){
			  $queries="update task_name set done=1 where id=$key and category_id=$category_id; " ;
			  $this->query_result($queries);
			}
		}
		
	}

	function add_task($new_task){
		$task_name = $new_task['task_name'];
		$deadline = $new_task['deadline'];
		$category_id = $new_task['category_id'];
		$query = "insert into task_name values(null,'$task_name','$deadline',$category_id,0);";
		$this->query_result($query);
	}

	function delete($id){
		$query = "delete from task_name where id=$id;";
		$this->query_result($query);
	}

	function get_all_task_edit_id($id){ // get data for editing -> output old data before changing
		$query = "select *from task_name where id=$id;";
		$result = $this->query_result_array($query);
		return $result;
	}

	function edit_task($new_edit_task){ // receive array
		$task_name = $new_edit_task['task_name'];
		$task_deadline = $new_edit_task['deadline'];
		$task_id = $new_edit_task['task_id'];
		$query = "update task_name set nomi='$task_name',deadline='$task_deadline' where id=$task_id;";
		$this->query_result($query);
	}
}


?>