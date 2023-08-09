<?php 
session_start();
include "config.php";

//get current user details
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
     $posts = [];
     $noPosts = false;
     $userId = $_SESSION['id'];
     $sql = "SELECT * FROM posts WHERE user_id='$userId' order by created_at DESC";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $key = 0;
          while($row = mysqli_fetch_assoc($result)) {
              $posts[$key]['id'] = $row['id'];
              $posts[$key]['title'] = $row['title'];
              $posts[$key]['content'] = $row['content'];
              $posts[$key]['logo'] = $row['logo'];
              $key++;
          }
     } else {
       $noPosts = true;
     }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <div class="topnav">
       <a class="welcome-text">Hello, <?php echo $_SESSION['name']; ?></a>
       <a class="logout-class" href="logout.php">Logout</a>
     </div>
     <div id="parent">
          <div class="posts-card">
               <p align="center">
                    <a href="createPost.php"><button class="create-post">Create New Posts</button></a>
               </p>
          </div>
          <div class="posts-card">
               <h2>My Posts</h2>
               <?php if ($noPosts) :?>
                    <h3>There are no posts to display.</h3>
               <?php else :
                    foreach($posts as $post): ?>
                         <div class="row">
                           <div class="column">
                             <div class="card">
                               <div class="image-container">
                                   <img class="logo-image" src="uploads/<?php echo $post['logo'];?>">
                               </div>
                               <h3><?php echo $post['title'];?></h3>
                               <p><?php echo $post['content'];?></p>
                               <a id="post-edit" href="editPost.php?post_id=<?php echo $post['id'];?>">Edit</a>
                               <a id="post-delete" href="deletePost.php?post_id=<?php echo $post['id'];?>">Delete</a>
                             </div>
                           </div>
                         </div>
                    <?php endforeach;?>
               <?php endif; ?>
          </div>
     </div>
</body>
</html>

<?php 
     } else {
          header("Location: index.php");
          exit();
     }
 ?>