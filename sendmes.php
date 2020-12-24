<?php
include_once('PROJECT_CONFIG/config.php');
while(true){
  $mailid=createrandom(90);
$sql="SELECT * FROM mail WHERE mailid='$mailid'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
  continue;
}
else
{
  break;
}
}
echo($mailid);
$header=$_POST['header'];
$mailbody=$_POST['mailbody'];
$mailfrom=$_POST['mailfrom'];
$date1=$_POST['date1'];
foreach($_POST['mailto']as $counter)
{
  echo($counter);
  $sql2="INSERT INTO mail(mailid,mailfrom,mailto,content,header,date1) VALUES ('$mailid','$mailfrom','$counter','$mailbody','$header','$date1')";
  $result2=$conn->query($sql2);
}

if($_POST['isfile']==1)
{
  $i=0;
    foreach($_FILES['filet1']['name'] as $counter)
    {
    $file_name=$_FILES['filet1']['name'][$i];
    $file_type=$_FILES['filet1']['type'][$i];
    $file_size=$_FILES['filet1']['size'][$i];
    $file_tem_loc=$_FILES['filet1']['tmp_name'][$i];
    $file_store="upload/".$file_name;
    echo($file_name);
    move_uploaded_file($file_tem_loc,$file_store);
    $sql3="INSERT INTO mailattach(mailid,srcn) VALUES ('$mailid','$file_store')";
    $result3=$conn->query($sql3);
    $i++;
  }
}
function createrandom($number)
{
  $str="";
  for($i=0;$i<$number;$i++){
  $r1=rand(1,3);
  if($r1==1)
  {
    $r2=rand(0,9);
    $str=$str.$r2;
  }
  else if($r1==2)
  {
    $r2=rand(97,122);
    $str=$str.chr($r2);
  }
  else
  {
    $r2=rand(65,90);
    $str=$str.chr($r2);
  }
}
return $str;
}
?>
<form action="message.php" method="post" id="mesform1">
  <input type="hidden" value="Send" name="message">
  <input type="hidden" value="1" name="sucmes">
</form>
<script>
document.getElementById('mesform1').submit();
</script>
