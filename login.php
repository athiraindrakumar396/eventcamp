<?php 
session_start(); 
include "config.php";

//check if user email and password exist
if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$pass = md5($pass);
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $pass) {
        	$_SESSION['email'] = $row['email'];
        	$_SESSION['name'] = $row['name'];
        	$_SESSION['id'] = $row['id'];
        	header("Location: home.php");
	        exit();
        }else{
			header("Location: index.php?error=Incorect Email or password");
	        exit();
		}
	}else{
		header("Location: index.php?error=Incorect Email or password");
        exit();
	}
	
} else{
	header("Location: index.php");
	exit();
}