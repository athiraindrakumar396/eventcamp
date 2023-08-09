<!DOCTYPE html>
<html>
<head>
	<title>Create New Post</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form class="post-form" action="createNewPost.php" method="post" enctype="multipart/form-data">
     	<h2>Create New Post</h2>
          <label for="title">Title</label>
          <input type="text" name="title" required><br>
          <label for="content">Content</label>
          <input id="post-content" type="text" name="content" required><br>
          <label for="img">Select Logo:</label>
          <input type="file" id="img" name="logo" accept="image/*" required>
          <div id="login-button-container" class="col-md-12 margin-bottom">
               <input type="submit" class="btn btn-default btn-red login" value="Submit" name="submit">
          </div>
     </form>
</body>
</html>