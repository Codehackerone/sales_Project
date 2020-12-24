<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    $home=2;
    include_once('../header.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    	$itemcode = $_POST['itemname'];

		    $sql = "SELECT * FROM item WHERE item_name LIKE '%$itemcode%'";
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
                  title: 'Item found',
                  showConfirmButton: false,
                  timer: 1500
                    })
                </script>
                <center>
                  <table class="content-table">
            <thead>
            <tr>
                <td>ITEM CODE </td>
                <td>ITEM NAME </td>
                <td>SGST(%) </td>
                <td>CGST(%) </td>
                <td>IGST(%) </td>
                <td>MRP</td>
                <td>BATCH NUMBER </td>
                <td>BUYING PRICE </td>
                </tr>
                </thead>
                <tbody>
				<?php
        while($row = $result->fetch_assoc())
        {
				$itemcode = $row["item_code"];
				$itemname = $row["item_name"];
				$sgst=$row["sgst"];
				$cgst=$row["cgst"];
				$igst=$row["igst"];
        $mrp=$row["mrp"];
				$batch=$row["batch"];
        $price=$row["price"];
        ?>
        <tr>
				<td><?php echo($itemcode);?></td>
			    <td><?php echo($itemname);?></td>
			    <td><?php echo($sgst);?></td>
			    <td><?php echo($cgst);?></td>
			    <td><?php echo($igst);?></td>
          <td><?php echo($mrp);?></td>
			    <td><?php echo($batch);?></td>
          <td><?php echo($price);?></td>
      </tr>
    <?php } ?>
    </tbody>
    </table>
    </center>
    <?php
			}
			else
			{
			    $itemcode="";
			?>
			<body><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
			<script>
                Swal.fire({
                    position: 'top-end',
                  icon: 'error',
                  title: 'Item not found',
                  showConfirmButton: false,
                  timer: 1500
                    })
                </script>
                <center>TRY AGAIN</center>
                </body>

			<?php
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../table.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body><center>
  <a href="search.php"><button class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></a>
	<a href="update1.php"><button class="btn btn-primary">UPDATE&nbsp;<i class="fas fa-user-edit"></i></button></a>
</center>
</body>
</html>
