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
		$sql = "SELECT name,username,phone,message FROM contactme";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
	{
        ?><link rel="stylesheet" type="text/css" href="stylestock.css"></head>
        <center>
        <table class="content-table">
            <thead>
            <tr>
                <td>NAME </td>
                <td>USERNAME </td>
                <td>PHONE </td>
                <td>MESSAGE </td>
                </tr>
                </thead>
                <tbody>
                    <?php
    while($row = $result->fetch_assoc())
     {
                ?>
        <tr>
        <td><?php echo($row["name"]);?></td>
        <td><?php echo($row["username"]); ?></td>
         <td><?php echo($row["phone"]);?></td>
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
    <title></title><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head><link rel="stylesheet" type="text/css" href="purchase/style.css">
<body>
    <script>
    swal("Good job!", "Message(s) Found!", "success");
</script>
    <center><a href="admin2.php" ><button>GO BACK</button></a></center>
</body>
</html>