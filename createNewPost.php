<?php 
session_start(); 
include "config.php";

//checking if post content and title exists
if (isset($_POST['title']) && isset($_POST['content'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$title = validate($_POST['title']);
	$content = validate($_POST['content']);
	$logo = validate($_FILES["logo"]["name"]);
	$userId = $_SESSION['id'];

	if (empty($title)) {
		header("Location: home.php?error=Title is required");
	    exit();
	} else if(empty($content)) {
        header("Location: home.php?error=Content is required");
	    exit();
	} else if(empty($logo)) {
        header("Location: home.php?error=Logo is required");
	    exit();
	} else{
		//image upload feature
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["logo"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["logo"]["tmp_name"]);
		  if($check !== false) {
		    $uploadOk = 1;
		  } else {
		    $uploadOk = 0;
		  }
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  header("Location: home.php");
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
		    $uploadOk = 1;
		  } else {
		    header("Location: home.php");
		  }
		}
	
		//insert into posts table the added details
		$sql2 = "INSERT INTO posts(title, content, logo, user_id) VALUES('$title', '$content', '$logo', '$userId')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
       		header('Location: home.php');
        	exit();
       	} else {
           	header("Location: home.php");
	        exit();
       }
	}
	
}