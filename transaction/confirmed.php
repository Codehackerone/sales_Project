<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
include_once('../PROJECT_CONFIG/config.php');
include_once('../bootstrap.php');
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  $username=$_SESSION['username'];
  if (mysqli_connect_error())
  {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }
  $gtotal=$_POST['gtotal'];
  $purdate=$_POST['purdate'];
  $id=$_POST['id'];
  $sql5 = "SELECT username,cust_id,tran_id,itemname,item_code,item_qty,cgst,sgst,igst,batch,mrp,total FROM cartran WHERE username='$username'";
  $result5 = $conn->query($sql5);
  if ($result5->num_rows > 0)
  {
    while($row = $result5->fetch_assoc())
    {
    $supid=$row['cust_id'];
    $purid=$row['tran_id'];
    $itemname=$row['itemname'];
    $itemcode=$row['item_code'];
    $itemqty=$row['item_qty'];
    $cgst=$row['cgst'];
    $sgst=$row['sgst'];
    $igst=$row['igst'];
    $batch=$row['batch'];
    $mrp=$row['mrp'];
    $total=$row['total'];
    $stmt=$conn->prepare("INSERT INTO traned(username,cust_id,tran_id,itemname,item_code,item_qty,cgst,sgst,igst,batch,mrp,total)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssidddsdd",$username,$supid,$purid,$itemname,$itemcode,$itemqty,$cgst,$sgst,$igst,$batch,$mrp,$total);
    $stmt->execute();
    //stock
    $SELECT = "SELECT itemcode From stock Where itemcode = ?  Limit 1";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$itemcode);
    $stmt->execute();
    $stmt->bind_result($itemcode);
    $stmt->store_result();
    $rnum1 = $stmt->num_rows;
    if($rnum1==0)
    {

       $stmt=$conn->prepare("INSERT INTO stock(itemcode,h_qty) VALUES(?,?)");
       $stmt->bind_param("sd",$itemcode,$itemqty);
       $stmt->execute();
    }
    else
    {
       $sql = "SELECT h_qty FROM stock WHERE itemcode='$itemcode'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       $stockq=$row["h_qty"]-$itemqty;
       $sql= "UPDATE stock SET itemcode='$itemcode',h_qty='$stockq' where itemcode='$itemcode' ";
       if ($conn->query($sql) === TRUE)
       {

       }
       else
       {
            echo "Error updating record: " . $conn->error;
       }
   }
   //end tock
  }
  $stmt=$conn->prepare("INSERT INTO tran(id,tran_id,tran_date,cust_id,gtotal) VALUES (?,?,?,?,?)");
  $stmt->bind_param("isssd",$id,$purid,$purdate,$supid,$gtotal);
  $stmt->execute();
}
?>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <script>
  swal("Good job!", "Order Purchased!", "success");
  </script>
  <div class="container">
  <form action="../univ/invtran.php" method="post" target="_blank">
    <input type="hidden" value="<?=$purid?>" name="purid">
    <center><button type="submit" class="btn btn-success" value="Invoice">Invoice&nbsp;<i class="fas fa-receipt"></i></<i class="fas fa-receipt"></i></button></center>
  </form>
  <center><h3>SUCCESSFULLY TRANSACTED<h3></center>
  <center><a href="add.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Go back</button></a></center>
</div>
</body>
</html>
<style>
*{
  font-family:'Poppins';
}
</style>
