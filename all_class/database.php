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



}




?>