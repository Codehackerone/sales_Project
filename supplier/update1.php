<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
$home=3;
    ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
	<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
      <?php include_once('../header.php'); ?>
      <div class="container"><br>
	<CENTER><H3>UPDATE SUPPLIER</H3></CENTER><br>
	<form action="update2.php" method="post" class="contact-form">
    <div class="form-group">
        <center><input list="browsers" name="custname" class="inp form-control" style="width:50%;"
          placeholder="SUPPLIER NAME" onchange="showCustomer(this.value)"> </center>
        <datalist id="browsers" class="data">
          <?php
          include_once('../PROJECT_CONFIG/config.php');
          $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
          $sql = "SELECT sup_name FROM supplier1";
      $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc())
           {
             $custname=$row["sup_name"];
             ?><option value="<?=$custname?>"><?php
           }
         }
           ?>
         </datalist></input></div>
			<CENTER><button type="submit" class="btn btn-success" value="SEARCH">Search&nbsp;<i class="fas fa-search"></i></button></CENTER>

		</form>
  </div>
    <div id="txtHint"></div>
</body>
</html>
<style>
*{
  font-family: 'Poppins';
}
</style>
