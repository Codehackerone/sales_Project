<?php
ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
include_once('PROJECT_CONFIG/config.php');
$user=$_SESSION['username'];
$pass=$_POST['pass'];
$sql="UPDATE login SET password='$pass' WHERE username='$user'";
$result=$conn->query($sql);
?>
<form action="profile.php" method="post" id="mesforym1">
  <input type="hidden" value="1" name="pass">
</form>
<script>
document.getElementById('mesforym1').submit();
</script>
