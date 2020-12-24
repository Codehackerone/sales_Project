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
    	$SELECT = "SELECT username From login Where username = ? and password=? Limit 1";
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("ss",$username,$password);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0)
     {
       ?>
       <form action="loginnew.php" method="post" id="myForm">
         <input type="hidden" name="wrong" value="cfbfb">
       </form>
       <?php
     }
     else
     {
        $_SESSION=array('username'=>$username);
        $status="online";
        $sql4="INSERT INTO status (username,status) VALUES('$username','$status')";
        $result4=$conn->query($sql4);
        $sql3="SELECT * FROM login WHERE username='$username'";
        $result3=$conn->query($sql3);
          $row3=$result3->fetch_assoc();
          $man=$row3['manager'];
          if($man==1)
          {
            header('location:adminhome.php');
          }
        ?>
        <form action="homepage4.php" method="post" id="myForm">
          <input type="hidden" name="correct" value="cfbfb">
        </form>
        <?php
    }
}
?>
<script>
document.getElementById('myForm').submit();
</script>
