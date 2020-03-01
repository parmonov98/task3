<?php
require_once("all_class/user.php");
	if(isset($_POST['send'])){
		$fname = $_POST['fname']; // ismingiz
		$lname = $_POST['lname']; // ismingiz
		$pswd = $_POST['pswd'];	  // pswd	
		$login = $_POST['login']; // //login

		$user_create_account = new user();
		$result = $user_create_account->create_account($fname,$lname,$login,$pswd);
		if($result){
			setcookie('user',$login,time()+86400);
			header('Location: index.php');
		}
		else{

		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Create account page</title>
</head>
<body>
	<form action="create_account.php" method="post">
	  <label>Name:<input type="text" required name="fname" placeholder="input your name.."></label><br><br>
	  <label>Surname:<input type="text" required name="lname" placeholder="input your surname.."></label><br><br>
	  <label>Login:<input type="text" required name="login" placeholder="input your login.."></label><br><br>
	  <label>Password:<input type="password" required name="pswd" placeholder="input your password.."></label><br><br>
	  <input type="submit" name="send" value="Create account">
	  	
		</form>
</body>
</html>