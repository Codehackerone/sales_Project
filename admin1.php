<?php
session_start();
ob_start();
    include_once('PROJECT_CONFIG/config.php');
    $username = $_POST['username'];
	$password = $_POST['password'];
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
    else
    {
    	$SELECT = "SELECT username From admin Where username = ? and password=? Limit 1";
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("ss",$username,$password);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) 
     {
     	
     	 header('Location:incorrect.html');
     }
     else
     {
        $_SESSION=array('username'=>$username);
    }
}
?>
<link rel="stylesheet" href="stylehome.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@1,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
            swal("Good job!", "successfully loged in ", "success");
       
</script>
    <h2><center>WELCOME ADMIN <?=$username;?></center></h2>
    <center>CLICK THE BUTTON BELOW TO CONTINUE</center>
    <center><a href="admin2.php" ><button>CONTINUE</button></a></center>
    <center><a href="logout.php" ><button>LOG OUT</button>
    </a></center>
</body>
</html>