<?php 
session_start(); 
include "config.php";

if (isset($_GET['post_id'])) {
    $posts = [];
    $postId = $_GET['post_id'];
    $sql = "SELECT * FROM posts WHERE id='$postId'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $posts['title'] = $row['title'];
            $posts['content'] = $row['content'];
            $posts['logo'] = $row['logo'];
        }
     }
     if ($_FILES["logo"]['name']) {
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
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    if (isset($_FILES['logo'])) {
      $logo = $_FILES['logo']['name'];
    } else {
      $logo = $posts['logo'];
    }
     
    //update posts based on added details
    $sql2 = "UPDATE posts set title='$title', content='$content', logo='$logo' where id='$postId'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
           header("Location: home.php");

      exit();
    } else {
         header("Location: home.php");
       exit();
    }
 }
?>