<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    include_once('../bootstrap.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    $itemcode = $_POST['itemcode'];
	$itemname = $_POST['itemname'];
	$cgst = $_POST['cgst'];
	$sgst = $_POST['sgst'];
	$igst = $_POST['igst'];
  $mrp = $_POST['mrp'];
	$batch = $_POST['batch'];
  $price = $_POST['price'];
     $sql = "UPDATE item SET item_name='$itemname',cgst='$cgst',sgst='$sgst',igst='$igst',mrp='$mrp',batch='$batch',price='$price' WHERE item_code='$itemcode'";
     $sql1 = "UPDATE item1 SET item_name='$itemname',cgst='$cgst',sgst='$sgst',igst='$igst',mrp='$mrp',batch='$batch',price='$price' WHERE item_code='$itemcode'";
if ($conn->query($sql) === TRUE&&$conn->query($sql1) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
    <body>
        <script>
            Swal.fire({
  icon: 'success',
  title: 'Success',
  text: 'Record updated successfully!',
  footer: '<a href="listall.php">SEE ALL RECORDS</a>'
})
        </script>
        <center><h5>RECORD UPDATED SUCCESSFULLY</h5></center>
        <center><a href="update1.php"><button class="btn btn-secondary">GO BACK</button></a>
        </a></center>

</body>
</html>
