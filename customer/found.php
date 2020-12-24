<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    $home=1;
    include_once('../header.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    	$custid = $_POST['custname'];

		    $sql = "SELECT cust_id,cust_name,cust_add,cust_phno,gstin,state FROM customer1 WHERE cust_name LIKE '%$custid%'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
				?>
				<!DOCTYPE html>
            <html>
            <head>
                <title></title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            </head>
            <body><script>
                Swal.fire({
                    position: 'top-end',
                  icon: 'success',
                  title: 'Customer found',
                  showConfirmButton: false,
                  timer: 1500
                    })
                </script>
                <center>
                  <table class="content-table">
            <thead>
            <tr>
                <td>CUSTOMER ID </td>
                <td>CUSTOMER NAME </td>
                <td>CUSTOMER ADDRESS </td>
                <td>CUSTOMER PHONE </td>
                <td>STATE </td>
                <td>GSTIN </td>
                </tr>
                </thead>
                <tbody>
			<?php
      while($row = $result->fetch_assoc())
      {
				$custid = $row["cust_id"];
				$custname = $row["cust_name"];
				$custadd = $row["cust_add"];
				$custphno = $row["cust_phno"];
        $gstin=$row['gstin'];
        $state=$row['state'];
				?><tr>
				<td><?php echo($custid); ?></td>
				<td><?php echo($custname); ?></td>
				<td><?php echo($custadd); ?></td>
				<td><?php echo($custphno);?></td>
        <td><?php echo($state);?></td>
        <td><?php echo($gstin);?></td>
			</tr>
    <?php } ?>
		</tbody>
	</table>
</center>
			<?php

    }
			else
			{
				 echo "0 results";
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="../table.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body><center>
	<a href="search.php"><button class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></a>
	<a href="update1.php"><button class="btn btn-primary">UPDATE&nbsp;<i class="fas fa-user-edit"></i></button></a>
</center>
</body>
</html>
<style>
*{
  font-family: 'Poppins';
}
</style>
