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
?>
<!DOCTYPE html>
<html>
<head>
	<title>add transaction</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

</head>
<body><head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
      <?php $home=4;include_once('../header.php')?>
      <CENTER><H3>NEW TRANSACTION</H3></CENTER>
      <div class="container">
      	<form action="success1.php" method="post" >
           <div class="cust">TRANSACTION DATE</div><BR>
      		<div class="form-group">	<input type="date" required placeholder="PURCHASE DATE"name="purdate"
            class="form-control" max='<?=date("Y-m-d");?>'></div>
            <input type="hidden" value="<?=$id?>" name="id" class="form-control">
            <div class="form-group">
          <input list="browsers" name="supname" class="inp form-control" placeholder="SUPPLIER NAME"></input></div>
          <datalist id="browsers" class="data">
      <?php
      $sql = "SELECT cust_name FROM customer1";
  $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
       {
         $custname=$row["cust_name"];
         ?><option value="<?=$custname?>"><?php
       }
     }
       ?>
     </datalist></input>
       <center><button type="submit" class="btn btn-primary" value="GO TO ITEM SELECTION">Go to Item Selection&nbsp;
         <i class="fas fa-arrow-right"></i>
       </button></center>
		</form></div>
</body>
<style>
.cust{
  font-size: 1.4rem;
}
</style>
</html>
