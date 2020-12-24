<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	 <div class="container">
		<div class="img">
			<img src="logo2.png">
		</div>
		<div class="login-content">
			<form action="homepage3.php" method="POST">
				<img src="avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
         		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
              <a href="contact.html">Forgot Password?</a>
              <a href="register.html">Register</a>
              <a href="admin.php">Admin login</a>
            	<input type="submit" class="btn" value="Login" >

            </form>
        </div>
    </div>

    <script type="text/javascript" src="signin.js"></script>
</body>
</html>