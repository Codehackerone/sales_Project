<?php
include_once('PROJECT_CONFIG/config.php');
if (mysqli_connect_error())
 {
 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
if($ori=="customer")
{
  $sql = "SELECT cust_id, cust_name, cust_add, cust_phno,gstin,state FROM customer1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
{
?>
<thead>
  <tr>
    <th>Customer id </th>
    <th>Customer name </th>
    <th>Customer address </th>
    <th>Customer phone no </th>
    <th>State </th>
    <th>GSTIN </th>
  </tr>
</thead>
<tbody>
  <?php
while($row = $result->fetch_assoc())
{
  $gstin=$row['gstin'];
  $state=$row['state'];
  $cust_name=$row["cust_name"];
  $cust_id=$row["cust_id"];
  ?>
  <tr>
  <td><?php echo($row["cust_id"]); ?></td>
  <td><?php echo($row["cust_name"]); ?></td>
  <td><?php echo($row["cust_add"]); ?></td>
  <td><?php echo($row["cust_phno"]); ?></td>
  <td><?php echo($state);?></td>
  <td><?php echo($gstin);?></td>
</tr>
  <?php
}
  ?>
</tbody>
<tfoot>
  <tr>
    <th>Customer id </th>
    <th>Customer name </th>
    <th>Customer address </th>
    <th>Customer phone no </th>
    <th>State </th>
    <th>GSTIN </th>
  </tr>
</tfoot>
<?php
}
}
else if($ori=="item")
{
  $sql = "SELECT * FROM item1";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
?><thead>
  <tr>
    <th>ITEM CODE</th>
    <th>ITEM NAME</th>
    <th>CGST(%)</th>
    <th>SGST(%)</th>
    <th>IGST(%)</th>
    <th>MRP</th>
    <th>BATCH NUMBER</th>
    <th>BUYING PRICE</th>
  </tr>
</thead>
<tbody>
  <?php

while($row = $result->fetch_assoc())
{
  $itemcode=$row["item_code"];
  $itemname=$row["item_name"];
  $cgst=$row["cgst"];
  $sgst=$row["sgst"];
  $igst=$row["igst"];
  $mrp=$row["mrp"];
  $batch=$row["batch"];
  $price=$row["price"];
  ?>
  <tr>
      <td><?php echo($itemcode); ?></td>
      <td><?php echo($itemname); ?></td>
     <td><?php echo($cgst); ?></td>
     <td><?php echo($sgst); ?></td>
     <td><?php echo($igst); ?></td>
     <td><?php echo($mrp); ?></td>
     <td><?php echo($batch); ?></td>
     <td><?php echo($price); ?></td>
   <?php } ?>
</tbody>
<tfoot>
  <tr>
    <th>ITEM CODE</th>
    <th>ITEM NAME</th>
    <th>CGST(%)</th>
    <th>SGST(%)</th>
    <th>IGST(%)</th>
    <th>MRP</th>
    <th>BATCH NUMBER</th>
    <th>BUYING PRICE</th>
  </tr>
</tfoot>
<?php
}
}
else if($ori=="supplier")
{
  $sql = "SELECT sup_id,sup_name,sup_add,sup_phno,gstin,state FROM supplier1";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
?>
<thead>
  <tr>
    <th>Supplier id </th>
    <th>Supplier name </th>
    <th>Supplier address </th>
    <th>Supplier phone no </th>
    <th>State </th>
    <th>GSTIN </th>
  </tr>
</thead>
<tbody>
  <?php
while($row = $result->fetch_assoc())
{
$gstin=$row['gstin'];
$state=$row['state'];
$cust_name=$row["sup_name"];
$cust_id=$row["sup_id"];
?>
<tr>
<td><?php echo($row["sup_id"]); ?></td>
<td><?php echo($row["sup_name"]); ?></td>
<td><?php echo($row["sup_add"]); ?></td>
<td><?php echo($row["sup_phno"]); ?></td>
<td><?php echo($state);?></td>
<td><?php echo($gstin);?></td>
<?php }?>
</tbody>
<tfoot>
  <tr>
    <th>Supplier id </th>
    <th>Supplier name </th>
    <th>Supplier address </th>
    <th>Supplier phone no </th>
    <th>State </th>
    <th>GSTIN </th>
  </tr>
</tfoot>
<?php
}
}
else if($ori=="stock")
{
  $sql = "SELECT itemcode,h_qty FROM stock";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
?>
<thead>
  <tr>
    <th>ITEM CODE </th>
    <th>ITEM NAME</th>
    <th>STOCK REMAINING</th>
  </tr>
</thead>
<tbody>
  <?php
while($row = $result->fetch_assoc())
{

$itemcode=$row["itemcode"];
$stockqty=$row["h_qty"];
$sql1 = "SELECT item_name FROM item WHERE item_code='$itemcode'";
$result1 = $conn->query($sql1);
$row1=$result1->fetch_assoc();

$itemname=$row1["item_name"];
?>
<tr>

<td><?php echo($itemcode); ?></td>
<td><?php echo($itemname); ?></td>
<td><?php echo($stockqty); ?></td>
</tr>
<?php
}
?>
</tbody>
<tfoot>
  <tr>
    <th>ITEM CODE </th>
    <th>ITEM NAME</th>
    <th>STOCK REMAINING</th>
  </tr>
</tfoot>
<?php
}
}
else if($ori=="purchase")
{
  $i=0;
  $sql = "SELECT pur_id,pur_date,sup_id,gtotal FROM purchase";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
?>
<thead>
  <tr>
    <th>PURCHASE ID </th>
    <th>SUPPLIER NAME </th>
    <th>PURCHASE DATE</th>
    <th>PURCHASE TOTAL</th>
    <th>INVOICE</th>
  </tr>
</thead>
<tbody>
    <?php
while($row = $result->fetch_assoc())
{

$purid=$row["pur_id"];
$purdate=$row["pur_date"];
$purtotal=$row["gtotal"];

$supid=$row['sup_id'];
$sql1 = "SELECT sup_name FROM supplier WHERE sup_id='$supid'";
$result1 = $conn->query($sql1);
$row1=$result1->fetch_assoc();
$supname=$row1["sup_name"];
?>
<tr>
<td><?php echo($purid); ?></td>
<td><?php echo($supname); ?></td>
<td><?php echo($purdate); ?></td>
<td><?php echo($purtotal); ?></td>
<td>
<form action="univ/invpur.php" method="post" target="_blank">
<input type="hidden" value="<?=$purid?>" name="purid">
<button type="submit" class="btn btn-info" value="click"><i class="fas fa-receipt"></i></button>
</form>
</td>
</tr>
<?php
$i++;
}
?>
</tbody>
<tfoot>
  <tr>
    <th>PURCHASE ID </th>
    <th>SUPPLIER NAME </th>
    <th>PURCHASE DATE</th>
    <th>PURCHASE TOTAL</th>
    <th>INVOICE</th>
  </tr>
</tfoot>
<?php
}
}
else if($ori=="tran")
{
  $i=0;
  $sql = "SELECT tran_id,tran_date,cust_id,gtotal FROM tran";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
?>
<thead>
  <tr>
    <th>TRANSACTION ID </th>
    <th>CUSTOMER NAME </th>
    <th>TRANSACTION DATE</th>
    <th>TRANSACTION TOTAL</th>
    <th>INVOICE</th>
  </tr>
</thead>
<tbody>
    <?php
while($row = $result->fetch_assoc())
{

$purid=$row["tran_id"];
$purdate=$row["tran_date"];
$purtotal=$row["gtotal"];

$supid=$row['cust_id'];
$sql1 = "SELECT cust_name FROM customer WHERE cust_id='$supid'";
$result1 = $conn->query($sql1);
$row1=$result1->fetch_assoc();
$supname=$row1["cust_name"];
?>
<tr>
<td><?php echo($purid); ?></td>
<td><?php echo($supname); ?></td>
<td><?php echo($purdate); ?></td>
<td><?php echo($purtotal); ?></td>
<td>
<form action="univ/invtran.php" method="post" target="_blank">
<input type="hidden" value="<?=$purid?>" name="purid">
<button type="submit" class="btn btn-info" value="click"><i class="fas fa-receipt"></i></button>
</form>
</td>
</tr>
<?php
$i++;
}
?>
</tbody>
<tfoot>
  <tr>
    <th>TRANSACTION ID </th>
    <th>CUSTOMER NAME </th>
    <th>TRANSACTION DATE</th>
    <th>TRANSACTION TOTAL</th>
    <th>INVOICE</th>
  </tr>
</tfoot>
<?php
}
}
?>
