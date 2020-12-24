<?php
include_once('PROJECT_CONFIG/config.php');
$purmonth=0;
$tranmonth=0;
$thismonth=date("y-m");
$sql="SELECT * FROM purchase WHERE pur_date LIKE '%$thismonth%' ORDER BY pur_date ASC";
$result=$conn->query($sql);
if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
  $purmonth=$purmonth+$row['gtotal'];
}
}
$sql1="SELECT * FROM tran WHERE tran_date LIKE '%$thismonth%' ORDER BY tran_date ASC";
$result1=$conn->query($sql1);
if($result1->num_rows>0)
{
  while($row1=$result1->fetch_assoc()){
  $tranmonth=$tranmonth+$row1['gtotal'];
}
}
$promonth= $tranmonth-$purmonth;
?>
