<?php
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CONTACT ME</title>
    <link rel="stylesheet" href="stylecontact.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  </head>
  <body>

<div class="contact-section">

  <h1>SEND MESSAGE</h1>
  <div class="border"></div>
  <form class="contact-form" action="sendmessageadmin2.php" method="post">
    <input type="text" class="contact-form-text" required name="rname" placeholder="Recipient Username">
    <textarea class="contact-form-text" name="message" placeholder="Your message"></textarea>
    <input type="submit" class="contact-form-btn" value="Send">
  </form>
</div>  

 <center> <a href="admin2.php"><button>GO BACK</button></a></center>

  </body>
</html>
