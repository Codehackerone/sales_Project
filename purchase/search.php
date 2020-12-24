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
$pur_id=$compref."/".$fin."/P0000000";

    ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
	<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <?php $home=5;include_once('../header.php');?>
        <div class="container">
    <CENTER><h3>PURCHASE SEARCH</h3></CENTER><br><br>
	<form action="found.php" method="post">
  <div class="form-group">
    <center><div class="cust">PURCHASE ID</div>
    <input type="text" name="purid" placeholder="PURCHASE ID" class="form-control"value="<?=$pur_id?>"style="width:50%;"></div></center>
    <center><button type="submit" class="btn btn-success" value="Search">Search&nbsp;<i class="fas fa-search"></i></button></center>
	</div>
</div>
	</form>
</body>
</div>
</html>

<style>
.cust{
  font-size: 1.4rem;
}
</style>
