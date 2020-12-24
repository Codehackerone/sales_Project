<?php
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
	include_once('PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
     {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else
    {  
		$username=$_SESSION['username'];
		$sql = "SELECT u_name,r_name,admin,message FROM message WHERE u_name='$username'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
	{
        ?><link rel="stylesheet" type="text/css" href="stylestock.css"></head>
        <center>
        <table class="content-table">
            <thead>
            <tr>
                <td>SENT BY </td>
                <td>SENT TO </td>
                <td>MESSAGE </td>
                </tr>
                </thead>
                <tbody>
                    <?php
    while($row = $result->fetch_assoc())
     {
                $admin=$row["admin"];
                ?>
        <tr>
        <td><?php echo($row["u_name"]); ?></td>
        <td><?php echo($row["r_name"]); if($admin==1) echo("(admin)"); ?></td>
        <td><?php echo($row["message"]); ?></td>
       </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
</center>
    <?php
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head><link rel="stylesheet" type="text/css" href="purchase/style.css">
<body><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    swal("Good job!", "Message(s) Found !", "success");
</script>
    <center><a href="homepage4.php" ><button>GO BACK</button></a></center>
</body>
</html>

