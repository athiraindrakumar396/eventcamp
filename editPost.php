<?php 
session_start(); 
include "config.php";

//get current post details
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
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Post</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form class="post-form" action="updatePost.php?post_id=<?php echo $_GET['post_id'];?>" method="post" enctype="multipart/form-data">
          <h2>Edit Post</h2>
          <label for="title">Title</label>
          <input type="text" name="title" value="<?php echo $posts['title'];?>" required><br>
          <label for="content">Content</label>
          <input id="post-content" type="text" name="content" value="<?php echo $posts['content'];?>" required><br>
          <label for="img">Select Logo:</label>
          <input type="file" id="img" name="logo" accept="image/*">
          <div id="login-button-container" class="col-md-12 margin-bottom">
               <input type="submit" class="btn btn-default btn-red login" value="Submit" name="submit">
          </div>
     </form>
</body>
</html>