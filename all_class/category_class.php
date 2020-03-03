<?php

/**
 * 
 */
class category
{
	private $base;
	function __construct()
	{
		$this->base = mysqli_connect("localhost","root","","schedule");
	}
	function query_result_array($query){
		$result = mysqli_query($this->base,$query); // result of query
		
		if(mysqli_num_rows($result)){ // if this category has base 
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
	function get_all_category($id){
		$query = "select *from category where user_id=$id;";
		$result = $this->query_result_array($query);
		return $result;
	}
	function add_category($category_array){ // all information about category (name,user_id)
		$category_name = $category_array['category_name']; // receive cat_name
		$user_id = $category_array['user_id'];		// receive user_id
		$query = "insert into category values(null,'$category_name',$user_id);";
		$this->query_result($query);
	}
	function delete($id){
		$query = "delete from category where id=$id;";
		$this->query_result($query);
	}

	function get_category_edit_id($id){
		$query = "select *from category where id=$id;";
		$result = $this->query_result_array($query);
		return $result;
	}
	function edit_category($new_edit_category){ // receive array
		$category_name = $new_edit_category['category_name'];
		$category_id = $new_edit_category['category_id'];
		$query = "update category set name='$category_name' where id=$category_id;";
		$this->query_result($query);
	}

}

?>