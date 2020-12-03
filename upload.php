<?php
	session_start();
	require_once 'connection.php';
		
	$name = $_POST['name'];

		$target_dir = "public/images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$_SESSION['message'] = 'File is not an image.';
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			$_SESSION['message'] = $_SESSION['message'] . '<br>' . 'Sorry, file already exists.';
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			$_SESSION['message'] = $_SESSION['message'] . '<br>' . 'Sorry, your file is too large.';
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$_SESSION['message'] = $_SESSION['message'] . '<br>' . 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$_SESSION['message'] = $_SESSION['message'] . '<br>' . 'Sorry, your file was not uploaded.';
			header('Location: signUp.php');
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "";
				$_SESSION['message'] = $_SESSION['message'] . '<br>' . 'Sorry, there was an error uploading your file.';
				header('Location: signUp.php');
			}
		}		
		mysqli_query($conn, "INSERT INTO `users` (`id`, `name`, `photo`) 
		VALUES (NULL, '$name', '$target_file')"); 
		mysqli_close($conn);
		header('Location: table.php');