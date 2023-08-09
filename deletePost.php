<?php 
session_start(); 
include "config.php";

//delete post based on post id
if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
    $sql = "DELETE FROM posts WHERE id='$postId'";
    $result = mysqli_query($conn, $sql);
    header('Location: home.php');
}
?>