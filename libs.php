<?php

require_once('all_class.php');

	if(isset($_POST["submit"])) {
		$target_dir = "uploads/";
		$file = $_FILES["fileToUpload"];
	
							// checking requirements 
		
		$image_upload = new image_upload($target_dir,$file['name']);
		// begin class object
		$file_tmp_name = $file["tmp_name"];
    	$uploadOk =  $image_upload->_check($file_tmp_name);//check file is image 
    	if($uploadOk) {
    		 $uploadOk= $image_upload->_file_exists(); //check file is not existing
    	 }
    	if($uploadOk) {
    		 $uploadOk = $image_upload->_file_size($file['size']); // check file size not large 5mb
    	}
    	if($uploadOk) { 
    		$uploadOk = $image_upload->_check_type($uploadOk,$file); // check type file.if file will be jpg or png or jpeg -> working else not
    	}
    	if($uploadOk) { 
    		$image_upload->save_file($uploadOk,$file); // if all requirements will be ok the file has been saved "uploads" folder 
    	}
    	$error_message = $image_upload->error_message(); //get all messages and print it
    	foreach ($error_message as $key) {
    		echo $key."<br>";
    	}
   		
}


?>
<!-- uploading image form -->
<!DOCTYPE html>
<html>
<body>

<form action="libs.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>