
<?php

	$itemname = $_POST['itemname'];
	$cgst = $_POST['cgst'];
	$sgst = $_POST['sgst'];
	$igst = $_POST['igst'];
	$mrp = $_POST['mrp'];
	$price = $_POST['price'];
	$batch = $_POST['batch'];
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
    else
    {
			$sql = "SELECT id FROM item ORDER BY id DESC LIMIT 1";
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
	    $cust_id="I";
	    for($i=1;$i<=$f;$i++)
	    {
	      $cust_id=$cust_id."0";
	    }
	    $itemcode=$cust_id.$num;
    	$SELECT = "SELECT item_code From item Where item_code = ?   Limit 1";
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s",$itemcode);
     $stmt->execute();
     $stmt->bind_result($itemcode);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
      $stmt=$conn->prepare("INSERT INTO item (item_code,item_name,sgst,cgst,igst,mrp,batch,id,price) VALUES(?,?,?,?,?,?,?,?,?)");
    	$stmt->bind_param("ssddddsid",$itemcode,$itemname,$sgst,$cgst,$igst,$mrp,$batch,$id,$price);
    	$stmt->execute();
			$stmt=$conn->prepare("INSERT INTO item1 (item_code,item_name,sgst,cgst,igst,mrp,batch,id,price) VALUES(?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssddddsid",$itemcode,$itemname,$sgst,$cgst,$igst,$mrp,$batch,$id,$price);
			$stmt->execute();
			$qty=0;
			$stmt=$conn->prepare("INSERT INTO stock(itemcode,h_qty) VALUES(?,?)");
    	$stmt->bind_param("si",$itemcode,$qty);
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
