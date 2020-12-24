<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
include_once('../PROJECT_CONFIG/config.php');
include_once('../bootstrap.php');
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error())
  {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }
  $purid=$_POST['purid'];
  $sql = "SELECT tran_id,tran_date,cust_id,gtotal FROM tran WHERE tran_id='$purid'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $tranid=$row["tran_id"];
  $trandate=$row["tran_date"];
  $trantotal=$row["gtotal"];
  $custid=$row['cust_id'];
  $sql1 = "SELECT cust_name,cust_add,cust_phno,state,stateid,gstin FROM customer WHERE cust_id='$custid'";
  $result1 = $conn->query($sql1);
  $row1=$result1->fetch_assoc();
  $custname=$row1["cust_name"];
  $custadd=$row1['cust_add'];
  $custphno=$row1['cust_phno'];
  $state=$row1['state'];
  $stateid=$row1['stateid'];
  $sgstin=$row1['gstin'];
  $sql3 = "SELECT name,phno,comadd,cgstin FROM comdet WHERE id='1'";
  $result3 = $conn->query($sql3);
  $row3=$result3->fetch_assoc();
  $comname=$row3['name'];
  $comphno=$row3['phno'];
  $comadd=$row3['comadd'];
  $cgstin=$row3['cgstin']
 ?>
<html>
<head>
	<title>transaction invoice <?=$tranid?></title>
	<link rel="stylesheet" type="text/css" href="../table.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body><script src="https://kit.fontawesome.com/a81368914c.js"></script>

  <center><h1>Transaction Invoice<h1></center>
    <center><img src="comlogo.png"></center><div class="right"><a onclick="window.print()"><button class="btn btn-primary">
      <i class="fas fa-print"></i>&nbsp;PRINT</button></a></div><br><br>
<center><h1><?php echo($comname); ?></h1></center>
<center><div id="add"><?php echo($comadd); ?><br>
Phone no:<?php echo($comphno); ?><br>
GSTIN:<?Php echo($cgstin); ?></div></center>
<hr>
<span id="heading">TRANSACTION ID:&nbsp<strong><?php echo($tranid); ?></strong>
<span id="date">TRANSACTION DATE:&nbsp<strong><?php echo($trandate); ?></span></strong>
<hr>
CUSTOMER NAME:<strong><?php echo(" ".$custname."(".$custid.")"); ?></strong><br>
CUSTOMER ADDRESS:<strong><?php echo(" ".$custadd.",".$state."(IN-".$stateid.")"); ?></strong><br>
CUSTOMER PHONE NUMBER:<strong><?php echo(" ".$custphno); ?></strong><br>
CUSTOMER GSTIN:<strong><?php echo(" ".$sgstin); ?></strong><br>
</span>
<hr>
<?php
$gtotal=0.0;
$tcgst=0.0;
$tsgst=0.0;
$tigst=0.0;
$tmrp=0.0;
$sql = "SELECT username,cust_id,tran_id,itemname,item_code,item_qty,cgst,sgst,igst,batch,mrp,total FROM traned WHERE tran_id='$tranid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{ ?>
  <center>
      <table class="content-table">
      <thead><tr>
          <td>ITEM NAME</td>
          <td>ITEM CODE</td>
          <td>ITEM QUANTITY</td>
          <td>CGST(%)</td>
          <td>SGST(%)</td>
          <td>IGST(%)</td>
          <td>MRP</td>
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
  <td><?php echo("&#8377;".$row["mrp"]);
  $tcgst=$tcgst+($row['cgst']*$row['mrp']*$row['item_qty'])/100;
  $tsgst=$tsgst+($row['sgst']*$row['mrp']*$row['item_qty'])/100;
  $tigst=$tigst+($row['igst']*$row['mrp']*$row['item_qty'])/100;
  $tmrp=$tmrp+($row['mrp']*$row['item_qty']);
  ?></td>
  <td><?php echo($row["batch"]); ?></td>
  <td><?php echo("&#8377;".$row["total"]); $gtotal=$gtotal+$row["total"];?></td>
 </tr>

<?php

}

?>
<tr>
  <td>GRAND TOTAL</td>
  <td></td>
  <td></td><td><?php echo("&#8377;".$tcgst); ?></td>
  <td><?php echo("&#8377;".$tsgst); ?></td>
  <td><?php echo("&#8377;".$tigst); ?></td>
  <td><?php echo("&#8377;".$tmrp); ?></td><td></td>
  <td><?php echo("&#8377;".$gtotal); ?></td>
</tr>
</tbody>
</table>
</center>
<input type="hidden" value="<?=$gtotal?>" id="number">
TOTAL VALUE IN WORDS(ROUNDED OFF):<span id="wordfromnum"></span>
<hr>
<br><br><br><br><br><br><br>
<?php
} ?>
</body>
<style>
.comstamp
{
  float: right;
}
#com
{
  width:200px;
}
table
{
  width: 100%;
}
body
{
  margin:10px;
  padding :15px;
  margin-top: none;
}
#date
{
  float: right;
}
#heading
{
  font-size: 1.2rem;
}
#add{
  width: 200px;
  align-self: center;
  align-content: center;

}
.right
{
  float:right;
}
hr {
    width: 100%;
    margin-left: 0px;
    color: #38d39f;
    background-color: #38d39f;
    border: 0px;
    height: 1px;
    border-bottom: 2px dashed #222;
}
strong
{
  font-family: 'Roboto', sans-serif;
}
</style>
<script>
var a = ['','One ','Two ','Three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]])  : '';
    str=" RUPEES ".concat(str).concat(" ONLY");
    str=str.toUpperCase();
    return str;
}
var c=document.getElementById('number').value;
document.getElementById('number').value=Math.round(c);
document.getElementById('wordfromnum').innerHTML=document.getElementById('number').value;
document.getElementById('wordfromnum').innerHTML = inWords(document.getElementById('number').value);
</script>
