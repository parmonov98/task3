<?php
/**
 * connect base
 */
class database
{
	public $db;
	function __construct()
	{
		$this->db = mysqli_connect("localhost","root","","schedule");
		if(!$this->db){
			echo "couldnt connect base";
			exit;
		}
		return $this->db;
	}

	function query_result_array($query){

		$result = mysqli_query($this->base,$query); // result of query
		
		if(mysqli_num_rows($result)){ // if this user has base 
			$new_user_array=[];
			while ($row = mysqli_fetch_array($result)) {
				$new_user_array[]=$row;
			}
			return $new_user_array;
		}
		else{
			return "bunday user yoq"; // bunday user yo`	
		}
	}
	
	function query_result($query){
		mysqli_query($this->base,$query);
	}


}




?>
