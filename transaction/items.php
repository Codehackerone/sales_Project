<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
    	$custid = $_GET['q'];?>
  <?php
      $sql = "SELECT item_code,item_name,sgst,cgst,igst,mrp,batch FROM item WHERE item_name LIKE '%$custid%'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $itemcode = $row["item_code"];
      $itemname = $row["item_name"];
      $sgst=$row["sgst"];
      $cgst=$row["cgst"];
      $igst=$row["igst"];
      $mrp=$row["mrp"];
      $batch=$row["batch"];
      $sql1="SELECT h_qty FROM stock WHERE itemcode='$itemcode'";
      $result1=$conn->query($sql1);
      $row1=$result1->fetch_assoc();
      $stocki=$row1['h_qty'];
      ?>
      <input type="hidden" value="<?=$itemcode?>" id="itemcodei">
      <input type="hidden" value="<?=$cgst?>" id="cgsti">
      <input type="hidden" value="<?=$sgst?>" id="sgsti">
      <input type="hidden" value="<?=$igst?>" id="igsti">
      <input type="hidden" value="<?=$batch?>" id="batchi">
      <input type="hidden" value="<?=$mrp?>" id="mrpi">
      <input type="hidden" value="<?=$stocki?>" id="stocki">
      <?php
    }
