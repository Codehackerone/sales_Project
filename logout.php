<?php
include_once('PROJECT_CONFIG/config.php');
ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
$username=$_SESSION['username'];
$sql="DELETE FROM status WHERE username='$username'";
$result=$conn->query($sql);
$_SESSION=array();

session_destroy();

header('LOCATION:loginnew.php');
?>
