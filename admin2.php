<?php
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js">
		<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@1,500&display=swap" rel="stylesheet">
		
	</script>
</head>
<body>
	<link rel="stylesheet" href="stylefooter.css">
	<center><h1>WELCOME ADMIN CONSOLE</h1></center>
      <br>
	<div class="page-content">
 <center><a href="receivedcontact.php" class="btn"><i class="fas fa-envelope-open-text"></i> RECEIVED CONTACT ADMIN</a></center>
<center><a href="sendmessageadmin.php" class="btn"><i class="fas fa-paper-plane"></i> SEND MESSAGE</a></center>
<center><a href="receivedadmin.php" class="btn"><i class="fas fa-mail-bulk"></i> RECEIVED MESSAGES</a></center>
<center><a href="sentmessageadmin.php" class="btn"><i class="fas fa-file-import"></i> SENT MESSAGES</a></center>
<center><a href="logout.php" class="btn"><i class="fas fa-sign-out-alt"></i> LOGOUT</a></center>

    </div>
   
    <footer>
      <div class="footer-container">
        <div class="left-col">
          <img src="logo2.png" alt="" class="logo">
          <div class="social-media">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <p class="rights-text">© 2020 Developed By Smarajit Datta. All Rights Reserved.</p>
        </div>

        <div class="right-col">
          <h1>Contact Us</h1>
          <div class="border"></div><br>
          <p>Enter Your Email to get our news and updates.</p><br><br>
          <form action="#" class="newsletter-form">
            <input type="text" class="txtb" placeholder="Enter Your Email">
            <input type="submit" class="btn" value="submit">
          </form>
        </div>
      </div>
    </footer>
</body>
</html>