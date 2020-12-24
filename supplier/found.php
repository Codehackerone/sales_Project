<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    $home=3;
    include_once('../header.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    	$custid = $_POST['custname'];

		    $sql = "SELECT sup_id,sup_name,sup_add,sup_phno,gstin,state FROM supplier1 WHERE sup_name LIKE '%$custid%'";
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
                  title: 'Supplier found',
                  showConfirmButton: false,
                  timer: 1500
                    })
                </script>
                <center>
                  <table class="content-table">
            <thead>
            <tr>
                <td>SUPPLIER ID </td>
                <td>SUPPLIER NAME </td>
                <td>SUPPLIER ADDRESS </td>
                <td>SUPPLIER PHONE </td>
                <td>STATE </td>
                <td>GSTIN </td>
                </tr>
                </thead>
                <tbody>
			<?php
      while($row = $result->fetch_assoc())
      {
				$custid = $row["sup_id"];
				$custname = $row["sup_name"];
				$custadd = $row["sup_add"];
				$custphno = $row["sup_phno"];
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
