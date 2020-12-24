<?php
$email=$_GET['q'];
$to="soumyajitdatta123@gmail.com";
$subject = "CONTACT";
$message="pls reply";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <'.$email.'>' . "\r\n";
mail($to,$subject,$message,$headers);
?>
