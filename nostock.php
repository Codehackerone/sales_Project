<?php
$sql99="SELECT * FROM stock WHERE h_qty='0'";
$result99=$conn->query($sql99);
$row99=$result99->fetch_assoc();
$itcode=$row99['itemcode'];
$sql98="SELECT * FROM item1 WHERE item_code='$itcode'";
$result98=$conn->query($sql98);
if($result98->num_rows==0)
{
  ?>
  There are no items whose stock is empty.
  <?php
}
else
{
if($result99->num_rows>0)
{
  ?>
  <table class="table table-bordered" >
    <thead>
      <tr>
      <th>Itemcode</th>
      <th>Item name</th>
    </tr>
    </thead>
    <tbody>
  <?php
  while($row99=$result99->fetch_assoc())
  {
    $itcode=$row99['itemcode'];
    $sql98="SELECT * FROM item1 WHERE item_code='$itcode'";
    $result98=$conn->query($sql98);
    $row98=$result98->fetch_assoc();
    ?>
    <tr>
      <td><?php echo($itcode); ?></td>
      <td><?php echo($row98['item_name']); ?></td>
    </tr>
    <?php
  }
?></tbody>
</table>
<?php
}
else
{
  ?>
  There are no items whose stock is empty.
  <?php
}
}
?>
