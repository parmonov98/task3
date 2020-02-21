<?php

	if(isset($_GET['ok'])){
		$a=$_GET['son'];
		$input ="<form action='masala.php' method='get'" 
		for($i=1;$i<$a;$i++){
			echo "string";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>masala</title>
</head>
<body>
	<form action="#" method="get">
		<input type="number" name="son" placeholder="sonni kiriitng:"/>
		<input type="submit" name="ok"/>

	</form>
</body>
</html>