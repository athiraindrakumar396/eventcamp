<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form class="register-form" action="signupPost.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <input type="text" name="name" placeholder="Name"><br>
          <input type="text" name="email" placeholder="Email"><br>
          <input type="password" name="password" placeholder="Password"><br>
          <input type="password" name="re_password" placeholder="Confirm Password"><br>
          <div id="login-button-container" class="col-md-12 margin-bottom">
               <button type="submit" class="btn btn-default btn-red login">Sign Up</button>
          </div>
          <div class="create-account">
             Already have an account?
             <a href="index.php" class="ca">Please Login</a>
         </div>
     </form>
</body>
</html>