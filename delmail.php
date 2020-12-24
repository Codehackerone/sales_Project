<?php
include_once('PROJECT_CONFIG/config.php');
$read=$_POST['del'];
$qw=1;
$sql44="UPDATE mail SET deletem='$qw' WHERE id='$read'";
$result44=$conn->query($sql44);
?>
<form action="message.php" method="post" id="form1">
  <input type="hidden" name="message" value="Received">
</form>
<script>
document.getElementById('form1').submit();
</script>
