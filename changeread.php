<?php
include_once('PROJECT_CONFIG/config.php');
$read=$_GET['q'];
$qw=1;
$sql44="UPDATE mail SET readm='$qw' WHERE id='$read'";
$result44=$conn->query($sql44);
?>
