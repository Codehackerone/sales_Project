<?php
$username = $_POST['username'];
$password = $_POST['password'];
$contact = $_POST['contact'];
$rank = $_POST['email'];
include_once('PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 
	 
   $SELECT = "SELECT username From login Where username = ? Limit 1";
    
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$username);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
    	$stmt->close();
    	$stmt=$conn->prepare("INSERT INTO login (username,password,contact,rank) VALUES(?,?,?,?)");
    	$stmt->bind_param("ssii",$username,$password,$contact,$rank);
    	$stmt->execute();
     } 
     else if($rank==342783462634)
     {
        $stmt=$conn->prepare("INSERT INTO admin (admin_user,admin_pass) VALUES(?,?)");
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
     }
     else {
      header('Location:tryagain.html');

  }
     $stmt->close();
     $conn->close();
    
    ?>
<html>
<head>
	<title>login
	</title>
	<link rel="stylesheet" href="styleregistersuccess.css">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@1,500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        Swal.fire({
  icon: 'success',
  title: 'Success',
  text: 'Registered successfully',
})
    </script>
	<div class="box-area">
	<h2><center>YOU ARE SUCCESSFULLY REGISTERED</center></h2>
	<H3><CENTER>Click the button below to sign in</CENTER>
	</H3>
</div>
	<form action="homepage1.php">
		<div class="button">
	<center>
		<input type="submit" class="btn" value="SIGN IN">
	</center>
		</div>
	</form>
	</body>
	</html>