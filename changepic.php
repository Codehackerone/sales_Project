<?php
ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
include_once('PROJECT_CONFIG/config.php');
$user=$_SESSION['username'];
  $file_name=$_FILES['filet123']['name'];
  $file_type=$_FILES['filet123']['type'];
  $file_size=$_FILES['filet123']['size'];
  $file_tem_loc=$_FILES['filet123']['tmp_name'];
  if($file_type=="image/png")
  {
    $filename=$user.".png";
  }
  else if($file_type=="image/jpeg")
  {
    $filename=$user.".jpeg";
  }
  else if($file_type=="image/jpg")
  {
    $filename=$user.".jpg";
  }
  else if($file_type=="image/gif")
  {
    $filename=$user.".gif";
  }
  else if($file_type=="application/pdf")
  {
    $filename=$user.".pdf";
  }
  else
  {
    $filename=$file_name;
  }
  $file_store="upload/".$filename;
  move_uploaded_file($file_tem_loc,$file_store);
$sql5="UPDATE login SET photo='$file_store' WHERE username='$user'";
$result=$conn->query($sql5);

?>
<form action="profile.php" method="post" id="picchange">
  <input type="hidden" name="pic" value="1">
</form>
<script>
document.getElementById('picchange').submit();
</script>
