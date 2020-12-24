<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
include_once('../PROJECT_CONFIG/config.php');
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error())
  {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }
$sql = "SELECT fin,compref FROM comdet WHERE id='1'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$fin=$row['fin'];
$compref=$row['compref'];
$pur_id=$compref."/".$fin."/T";

    ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
	<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <?php include_once('header.php')?>
    <CENTER><h1>TRANSACTION SEARCH</h1></CENTER>
	<form action="found.php" method="post">
<link rel="stylesheet" type="text/css" href="../textbox.css">

	<form action="found.php" method="post">
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><br>
			<div class="box-container">
  <div class="box">
    <div class="cust">TRANSACTION ID</div><br>
    <input type="text" name="purid" placeholder="PURCHASE ID" value="<?=$pur_id?>">
    <center><input type="submit" class="btn" value="Search"></center>
	</div>
</div>
	</form>
</body>
</html>
<style>
.cust{
  font-size: 1.4rem;
}
</style>
