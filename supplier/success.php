
<?php
	$supname = $_POST['supname'];
	$supadd = $_POST['supadd'];
	$supph = $_POST['supph'];
	$gstin=$_POST['gstin'];
	$statename=$_POST['statename'];
	$statecode=$_POST['statecode'];
	include_once('../PROJECT_CONFIG/config.php');
	include_once('../bootstrap.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
     {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {			function count_digit($number){
		        return strlen((string)$number);
		      }

    $sql = "SELECT id FROM supplier ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
          $last_id=$row['id'];
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
    $sup_id="S";
    for($i=1;$i<=$f;$i++)
    {
      $sup_id=$sup_id."0";
    }
    $sup_id=$sup_id.$num;
		$supid=$sup_id;
			$SELECT = "SELECT sup_id From supplier Where sup_id = ?  Limit 1";
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$supid);
     $stmt->execute();
     $stmt->bind_result($supid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
        $stmt=$conn->prepare("INSERT INTO supplier(sup_id,sup_name,sup_add,sup_phno,id,gstin,state,stateid) VALUES(?,?,?,?,?,?,?,?)");
    	$stmt->bind_param("ssssisss",$supid,$supname,$supadd,$supph,$id,$gstin,$statename,$statecode);
    	$stmt->execute();
			$SELECT = "SELECT sup_id From supplier1 Where sup_id = ?  Limit 1";
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$supid);
     $stmt->execute();
     $stmt->bind_result($supid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
        $stmt=$conn->prepare("INSERT INTO supplier1(sup_id,sup_name,sup_add,sup_phno,id,gstin,state,stateid) VALUES(?,?,?,?,?,?,?,?)");
    	$stmt->bind_param("ssssisss",$supid,$supname,$supadd,$supph,$id,$gstin,$statename,$statecode);
    	$stmt->execute();
}
    ?>
    <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script>
		swal("Good job!", "Supplier Data Added!", "success");
	</script>
	<CENTER><h3>SUCCESSFULLY ADDED</h3><br></CENTER>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<center><a href="add.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></center>
	</a>
</body>
</html>
