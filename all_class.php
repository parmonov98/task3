<?php

class image_upload 
{
	private $target_dir;
	private $target_file;
	private $error_message;
	function __construct($target_dir,$target_file)
	{
		$this->target_dir = $target_dir;
		$this->target_file = $this->target_dir . basename($target_file);
		$this->error_message=array();
	}

	function _check($file_tmp_name){
		$check = getimagesize($file_tmp_name);
		if($check !==false){
        	$uploadOk = 1;
		}
		else {
			 $this->error_message[]="File is not an image.<br>";
	        $uploadOk = 0;
	    }
	    return $uploadOk;
	}
	function _file_exists(){
			if(file_exists($this->target_file)){
				$this->error_message[]="Sorry, file already exists.";
    			$uploadOk = 0;
			}
			else{
			$uploadOk=1;	
			return $uploadOk;
			}
	}

	function _file_size($size){
			if($size>500000){
				 $this->error_message[]="Sorry, your file is too large.";
    			 $uploadOk = 0;
    			 return $uploadOk;
			}
			else{
				$uploadOk = 1;
    			 return $uploadOk;
			}

	}

	function _check_type(){
		$imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			   $this->error_message[]="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			    return $uploadOk;
		}
		else{
				$uploadOk = 1;
    			 return $uploadOk;
			}
	}

	function save_file($uploadOk,$file){
		if ($uploadOk == 0) {
   $this->error_message[]="Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($file["tmp_name"], $this->target_file)) {
		        $this->error_message[]="The file ". basename( $file["name"]). " has been uploaded.";
		    } else {
		        $this->error_message[]="Sorry, there was an error uploading your file.";
		    }
		}
	}

	function error_message(){
		return $this->error_message;
	}
}

?>