<?php
	$host = "localhost";
    $dbUsername = "";
    $dbPassword = "";
    $dbname = "";
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error())
		 {
		 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}
?>
