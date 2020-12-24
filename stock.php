<?php
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('PROJECT_CONFIG/config.php');
    $home=6;
    include_once('header.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
     {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        ?>
        <head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
        </head>
        <link rel="stylesheet" href="table.css">
        <br><br>
        <div class="container" style="overflow-x:auto;">
        <?php
    	$sql = "SELECT itemcode,h_qty FROM stock";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
        ?><center>
        <table class="content-table" id="myTable2">
            <thead>
            <tr>
                <td>ITEM CODE </td>
                <td>ITEM NAME</td>
                <td>STOCK REMAINING</td>
                </tr>
                </thead>
                <tbody>
                    <?php
    while($row = $result->fetch_assoc())
     {

            $itemcode=$row["itemcode"];
            $stockqty=$row["h_qty"];
            $sql1 = "SELECT item_name FROM item WHERE item_code='$itemcode'";
                $result1 = $conn->query($sql1);
                $row1=$result1->fetch_assoc();

                $itemname=$row1["item_name"];
                ?>
        <tr>

        <td><?php echo($itemcode); ?></td>
          <td><?php echo($itemname); ?></td>
        <td><?php echo($stockqty); ?></td>
       </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
</center>
</div>
    <?php
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
</body>
</html>
<script>
var table = $('#myTable2').DataTable();
</script>
