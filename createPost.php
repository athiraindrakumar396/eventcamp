<!DOCTYPE html>
<html>
<head>
	<title>Create New Post</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form class="post-form" action="createNewPost.php" method="post" enctype="multipart/form-data">
     	<h2>Create New Post</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label for="title">Title</label>
          <input type="text" name="title"><br>
          <label for="content">Content</label>
          <input id="post-content" type="text" name="content"><br>
          <label for="img">Select Logo:</label>
          <input type="file" id="img" name="logo" accept="image/*">
          <div id="login-button-container" class="col-md-12 margin-bottom">
               <input type="submit" class="btn btn-default btn-red login" value="Submit" name="submit">
               <!-- <button type="submit" class="btn btn-default btn-red login">Submit</button> -->
          </div>
     </form>
</body>
</html>