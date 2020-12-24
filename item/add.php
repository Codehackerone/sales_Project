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
	<title>add item</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

</head>
<body>
	<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="stylesheet" type="text/css" href="../table.css"></head>
        <?php $home=2; include_once('../header.php');
        ?>
<CENTER><H3>ADD ITEM</H3></CENTER>
<form action="success.php" method="post">
  <div class="container">
    <div class="form-group">
      <label>Item name</label>
			<input type="text" required placeholder="Eg:Monitor" name="itemname" class="form-control"></div>
      <div class="row">
        <div class="col">
      <div class="form-group">
        <label>Cgst(in %)</label>
            <input type="decimal" required placeholder="Eg:9" name="cgst" class="form-control"></div></div>
            <div class="col">
            <div class="form-group">
              <label>Sgst(in %)</label>
            <input type="decimal" required placeholder="Eg:9" name="sgst" class="form-control"></div></div>
            <div class="col">
            <div class="form-group">
              <label>Igst(in %)</label>
            <input type="decimal" required placeholder="Eg:18" name="igst" class="form-control"></div>
          </div></div>
          <div class="row">
            <div class="col">
            <div class="form-group">
              <label>Batch Number</label>
            <input type="text" required placeholder="Eg:B8734843" name="batch" class="form-control"></div></div>
            <div class="col">
            <div class="form-group">
              <label>Maximum Retail Price&nbsp;</label>
            <input type="decimal" required placeholder="Eg:7999.99" name="mrp" class="form-control"></div>
          </div>
          <div class="col">
          <div class="form-group">
            <label>Buying Price&nbsp;</label>
          <input type="decimal" required placeholder="Eg:7999.99" name="price" class="form-control"></div>
        </div></div>
            <div class="form-group">

			<CENTER><button type="submit" class="btn btn-success" value="INSERT" class="form-control"> INSERT<i class="fas fa-arrow-right"></i></button></CENTER></div></div>
		</form>
</body>
</div>
<style>
.cust{
  font-size: 1.4rem;
}
</style>
</html>
