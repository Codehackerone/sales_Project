<?php
include_once('../PROJECT_CONFIG/config.php');
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error())
 {
 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
$custid=$_POST['custid'];
$sql="DELETE FROM item1 WHERE item_code='$custid'";
$result=$conn->query($sql);

?>

<form action="listall.php" method="post" id="thisform">
  <input type="hidden" value="1" name="delete">
</form>
<script>
document.getElementById('thisform').submit();
</script>
