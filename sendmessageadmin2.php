<?php
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}

	$rname = $_POST['rname'];
	$username = $_SESSION['username'];
	$message = $_POST['message'];	
	$admin=1;
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

    $SELECT = "SELECT username From login Where username = ?  Limit 1";
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$rname);
     $stmt->execute();
     $stmt->bind_result($rname);
     $stmt->store_result();
     $rnum1 = $stmt->num_rows;
     if ($rnum!=0 && $rnum1!=0) 
     {

				$stmt=$conn->prepare("INSERT INTO message(r_name,u_name,admin,message) VALUES(?,?,?,?)");
            	$stmt->bind_param("ssis",$rname,$username,$admin,$message);
            	$stmt->execute();

}
	else
	{
		die("'<h1>'Recipient or your username wrong try again");
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
	swal("Good job!", "Message Sent!", "success");
</script>
<center>
	MESSAGE SENT<br></center>
	<link rel="stylesheet" type="text/css" href="purchase/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<center><a href="admin2.php"><button>GO BACK</button>
	</a></center>
</body>
</html>