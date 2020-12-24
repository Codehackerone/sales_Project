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
  $sql = "DELETE FROM cartpur WHERE username='$username'";
  if ($conn->query($sql) === TRUE) {

  }
   else {
     echo "Error deleting record: " . $conn->error;
   }
   function count_digit($number){
     return strlen((string)$number);
   }
 $sql = "SELECT fin,compref FROM comdet WHERE id='1'";
 $result = $conn->query($sql);
 $row=$result->fetch_assoc();
 $fin=$row['fin'];
 $compref=$row['compref'];
 $pur_id=$compref."/".$fin."/P";
 $sql = "SELECT id FROM purchase ORDER BY id DESC LIMIT 1";
 $result = $conn->query($sql);
 if ($result->num_rows > 0)
 {
     while($row = $result->fetch_assoc())
     {
       $last_id=$row['id'];
     }
     $num=$last_id+1;
     $f=8-(count_digit($num));
     $id=$num;
 }
 else
 {
     $f=7;
     $num=1;
     $id=1;
 }
 for($i=1;$i<=$f;$i++)
 {
   $pur_id=$pur_id."0";
 }
 $purid=$pur_id.$num;
  $purdate=$_POST['purdate'];
  $supid=$_POST['supid'];
  $state=$_POST['state'];
  $stateid=$_POST['stateid'];
  $gstin=$_POST['gstin'];
  $imp=$_POST['imp'];
  $sql = "SELECT sup_id,sup_name,sup_add,sup_phno FROM supplier WHERE sup_id ='$supid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $supid=$row['sup_id'];
  $supname=$row['sup_name'];
  $supadd=$row['sup_add'];
  $supphno=$row['sup_phno'];
  ?>
  <head>
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../table.css"></head>
  <body>
    <script>
        swal("Alert!", "Review the details before submitting!", "warning");
    </script>
<div class="container">
  <h2><center>Please review all the details</center></h2>
  <h4>Supplier Details</h4>
  Supplier code: <?php echo($supid); ?><br>
  Supplier name: <?php echo($supname); ?><br>
  Supplier address: <?php echo($supadd." ".$state." (IN-".$stateid.") "); ?><br>
  Supplier phone number: <?php echo($supphno); ?><br>
  Supplier gstin: <?php echo($gstin); ?><br>
  <?php
  $i=0;
  for( $j=1;$j<=$imp;$j++)
  {
    $arr1[$i]=$j;
    $i++;
  }
  $i=0;
  $counter=0;
  $arr2=array();
  foreach($arr1 as $i)
  {
    $itname = 'itemname'.strval($i);
    if (array_key_exists($itname,$_REQUEST))
    {
      $itemcode=$_POST['itemcode'.strval($i)];
      $itemname=$_POST['itemname'.strval($i)];
      $itemqty=$_POST['itemqty'.strval($i)];
      $cgst=$_POST['cgst'.strval($i)];
      $sgst=$_POST['sgst'.strval($i)];
      $igst=$_POST['igst'.strval($i)];
      $mrp=$_POST['mrp'.strval($i)];
      $batch=$_POST['batch'.strval($i)];
      $total=$_POST['total'.strval($i)];
      $username=$_SESSION['username'];
      error_reporting(0);
      for($k=0;$k<=$counter;$k++)
      {
        if($itemcode==$arr2[$k])
        {
          die('<center>Sorry You cant enter two rows with same item.Try again<center><br><a href="add.php"><button>GO BACK</button></a>');
        }
      }
      $arr2[$counter]=$itemcode;
      $counter++;
       $stmt=$conn->prepare("INSERT INTO cartpur(username,supid,pur_id,itemname,item_code,item_qty,cgst,sgst,igst,batch,mrp,total)
       VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
     	$stmt->bind_param("sssssidddsdd",$username,$supid,$purid,$itemname,$itemcode,$itemqty,$cgst,$sgst,$igst,$batch,$mrp,$total);
     	$stmt->execute();
    }
  }
?>
<?php
$gtotal=0.0;
$sql = "SELECT username,supid,pur_id,itemname,item_code,item_qty,cgst,sgst,igst,batch,mrp,total FROM cartpur WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{ ?>
  <center>
      <table class="content-table">
      <thead><tr>
          <td>ITEM NAME</td>
          <td>ITEM CODE</td>
          <td>ITEM QUANTITY</td>
          <td>CGST</td>
          <td>SGST</td>
          <td>IGST</td>
          <td>BUYING PRICE</td>
          <td>BATCH</td>
          <td>TOTAL</td>
          </tr>
          </thead>

          <tbody>
              <?php
while($row = $result->fetch_assoc())
{
  ?>
  <tr>
  <td><?php echo($row["itemname"]); ?></td>
  <td><?php echo($row["item_code"]); ?></td>
  <td><?php echo($row["item_qty"]); ?></td>
  <td><?php echo($row["cgst"]); ?></td>
  <td><?php echo($row["sgst"]); ?></td>
  <td><?php echo($row["igst"]); ?></td>
  <td><?php echo($row["mrp"]); ?></td>
  <td><?php echo($row["batch"]); ?></td>
  <td><?php echo($row["total"]); $gtotal=$gtotal+$row["total"];?></td>
 </tr>

<?php

}
?>
<tr>
  <td>GRAND TOTAL</td>
  <td></td>
  <td></td><td></td><td></td><td></td><td></td><td></td>
  <td><?php echo($gtotal); ?></td>
</tr>
</tbody>
</table>
</center>
<?php
}
?>

<form action="confirmed.php" method="post">
  <input type="hidden" value="<?=$purdate?>" name="purdate">
  <input type="hidden" value="<?=$gtotal?>" name="gtotal">
  <input type="hidden" value="<?=$id?>" name="id">
  <a href="add.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></a>
  <button type="submit" class="btn btn-primary" value="CONFIRM PURCHASE" id="pur">Confirm Purchase&nbsp;<i class="fas fa-arrow-right"></i></button>
</form>
</div>
</body>
<style>
.cust{
  font-size: 1.4rem;
}
#pur{
  float: right;
}
*{
  font-family:'Poppins';
}
</style>
