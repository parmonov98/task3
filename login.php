<?php
require_once("all_class/user.php");

	if(isset($_POST['send'])){
		
		$pswd = $_POST['pswd'];	  // pswd	
		$login = $_POST['login']; // //login

		$user = new user(); // object from user class
		$result = $user->check_user_login($login,$pswd); // send login and pswd and receive true if this user has on base
		if(gettype($result)=='string'){
			echo "This user could`n find!! create account or enter your clear login and password";		
		}
		else{
				setcookie('user',$login,time() +86400);
				header('Location: index.php');
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	<form action="login.php" method="post">
	 
	  <label>Login:<input type="text" required name="login" placeholder="input your login.."></label><br><br>
	  <label>Password:<input type="password" required name="pswd" placeholder="input your password.."></label><br><br>
	  <input type="submit" name="send" value="Login">
	  <button><a href="create_account.php">Create account</a></button>	
		</form>
</body>
</html>