<?php
require_once('database.php');
/**
 * 
 */
class user
{
	public $base;

	function __construct()
	{
		$this->base = mysqli_connect("localhost","root","","schedule"); 
			
	}


	function check_user_login($login,$pswd){ // checked user login and pswd
		$query = "select *from user where login='$login' and pswd='$pswd';";
		$result = $this->query_result_array($query); // send for checking this user has base
		return $result;
	}

	function check_user_has_account($login){
		$query = "select *from user where login='$login';";
		$result = $this->query_result_array($query); // send for checking this user has base
		return $result;
	}


	function create_account($fname,$lname,$login,$pswd){
		$check_user = $this->check_user_has_account($login);
		if(gettype($check_user)=='string'){ // agar user bolmasa string(bunday user yo`q) qaytadi
			$query = "insert into user values(null,'$fname','$lname','$login','$pswd');"; // creating query
			$result = $this->query_result($query);
			return true;
		}
		else{
			return false;
		}
	}

}

?>
