<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
$name = $_POST['name'];
	$username = $_POST['username'];
    $phone = $_POST['phone'];
	$message = $_POST['message'];	
include_once('PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
     {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else
    {   
    	$SELECT = "SELECT username From login Where username = ?  Limit 1";
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$username);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum!=0) {

	$stmt=$conn->prepare("INSERT INTO contactme(name,username,phone,message) VALUES(?,?,?,?)");
            	$stmt->bind_param("ssis",$name,$username,$phone,$message);
            	$stmt->execute();

}
	else
	{
		die("username wrong try again");
	}
}
    	?>
    	<html>
<head>
	<title></title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<script>
	swal("Good job!", "Sent!", "success");
</script>
<center>
	MESSAGE SENT<br></center>
	<link rel="stylesheet" type="text/css" href="purchase/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<center><a href="homepage1.php"><button>GO BACK</button>
	</a></center>
</body>
</html>