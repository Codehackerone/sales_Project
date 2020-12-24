<<?php
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
    $custid = $_POST['custid'];
    $custname = $_POST['custname'];
    $custadd = $_POST['custadd'];
    $custph = $_POST['custph'];
        $gstin=$_POST['gstin'];
    $statename=$_POST['statename'];
  	$statecode=$_POST['statecode'];
     $sql = "UPDATE supplier SET sup_name='$custname',sup_add='$custadd', sup_phno='$custph',gstin='$gstin',state='$statename',stateid='$statecode' WHERE sup_id='$custid'";
      $sql2 = "UPDATE supplier1 SET sup_name='$custname',sup_add='$custadd', sup_phno='$custph',gstin='$gstin',state='$statename',stateid='$statecode' WHERE sup_id='$custid'";
if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {

} else {
    die( "Error updating record: " . $conn->error);
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
