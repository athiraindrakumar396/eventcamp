<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form class="login-form" action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="email" placeholder="Email" required><br>
     	<input type="password" name="password" placeholder="Password" required><br>
     	<div id="login-button-container" class="col-md-12 margin-bottom">
        	<button type="submit" class="btn btn-default btn-red login">Login</button>
        </div>
        <div class="create-account">
	        Don't have an account?
	        <a href="signup.php" class="ca">Create Account</a>
	    </div>
      </div>
     </form>
</body>
</html>