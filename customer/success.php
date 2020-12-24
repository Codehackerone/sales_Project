
<?php
function count_digit($number){
	return strlen((string)$number);
}
    include_once('../PROJECT_CONFIG/config.php');
		include_once('../bootstrap.php');
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error())
      {
      	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
$sql3 = "SELECT id FROM customer ORDER BY id DESC LIMIT 1";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0)
{
		while($row3 = $result3->fetch_assoc())
		{
			$last_id=$row3['id'];
		}
		$num=$last_id+1;
		$f=5-(count_digit($num));
		$id=$num;
}
else
{
		$f=4;
		$num=1;
		$id=1;
}
$cust_id="C";
for($i=1;$i<=$f;$i++)
{
	$cust_id=$cust_id."0";
}
$cust_id=$cust_id.$num;
$custid=$cust_id;
	$custname = $_POST['custname'];
	$custadd = $_POST['custadd'];
	$custph = $_POST['custph'];
	$gstin=$_POST['gst'];
	$tin=$_POST['tin'];
	$gstin=$gstin.$tin;
	$statename=$_POST['statename'];
	$statecode=$_POST['statecode'];
	include_once('../PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
     {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    	$SELECT = "SELECT cust_id From customer Where cust_id = ?  Limit 1";
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$custid);
     $stmt->execute();
     $stmt->bind_result($custid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
      $stmt=$conn->prepare("INSERT INTO customer (id,cust_id,cust_name,cust_add,cust_phno,gstin,state,stateid) VALUES(?,?,?,?,?,?,?,?)");
    	$stmt->bind_param("isssssss",$id,$custid,$custname,$custadd,$custph,$gstin,$statename,$statecode);
    	$stmt->execute();
			$SELECT = "SELECT cust_id From customer1 Where cust_id = ?  Limit 1";
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$custid);
     $stmt->execute();
     $stmt->bind_result($custid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
      $stmt=$conn->prepare("INSERT INTO customer1 (id,cust_id,cust_name,cust_add,cust_phno,gstin,state,stateid) VALUES(?,?,?,?,?,?,?,?)");
    	$stmt->bind_param("isssssss",$id,$custid,$custname,$custadd,$custph,$gstin,$statename,$statecode);
    	$stmt->execute();
}
    ?>
    <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		swal("Good job!", "Customer Data Added!", "success");
	</script>
	<CENTER>SUCCESSFULY ADDED<br></CENTER>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<center><a href="add.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></center>
	</a>
</body>
</html>
