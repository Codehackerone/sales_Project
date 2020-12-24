<?php
ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
include_once('PROJECT_CONFIG/config.php');
$user=$_SESSION['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$sql="UPDATE login SET fname='$fname',lname='$lname',email='$email',contact='$contact' WHERE username='$user'";
$result=$conn->query($sql);
?>
<form action="profile.php" method="post" id="mesforym1">
  <input type="hidden" value="1" name="det">
</form>
<script>
document.getElementById('mesforym1').submit();
</script>
