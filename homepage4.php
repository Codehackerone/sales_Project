<?php
ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
  $home=0;
include_once('header.php');
include_once('PROJECT_CONFIG/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js">
		</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js">
  		</script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>

<div class="page-content">
  <?php
  $username=$_SESSION['username'];
  $sql3="SELECT * FROM login WHERE username='$username'";
  $result3=$conn->query($sql3);
    $row3=$result3->fetch_assoc();
    $man=$row3['manager'];
    if($man==1)
    {
      ?>
      <center>
        <h1>MANAGER</h1>
        <a href="adminhome.php"><button>Switch to Manager Mode</button></a>
      </center>
      <?php
    }
  ?>
  </div>
  <?php include_once('footer.php')?>
</body>
</html>
