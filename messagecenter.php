<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-envelope fa-fw"></i>
  <!-- Counter - Messages -->
  <?php
  $d=0;$r=0;
  $sql47="SELECT * FROM mail WHERE mailto='$mailid' and deletem='$d' and readm='$r'";
  $result47=$conn->query($sql47);
  $nrowm=$result47->num_rows;
  if($nrowm>5)
  {
    $mn="5+";
  }
  else
  {
    $mn=$nrowm;
  }
  if($nrowm!=0)
  {
  ?>
  <span class="badge badge-info badge-counter"><?php echo($mn); ?></span>
<?php } ?>
</a>
<!-- Dropdown - Messages -->
<form id="mailform21" action="message.php" method="post">
  <input type="hidden" name="message" value="Received">
</form>
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
  <h6 class="dropdown-header">
    Message Center
  </h6>
  <?php
if($nrowm!=0)
{
  $i=0;
  while($row147=$result47->fetch_assoc())
  {
    if($i==5)
    {
      break;
    }
  $mailfrom1=$row147['mailfrom'];
  $content1=$row147['content'];
  $date11=$row147['date1'];
  $toddate=date("Y-m-d H:i:s");
  $heading1=$row147['header'];
  $sql148="SELECT * FROM login WHERE mailid='$mailfrom1'";
  $result148=$conn->query($sql148);
  $row148=$result148->fetch_assoc();
  $user1=$row148['username'];
  $fname1=$row148['fname'];
  $lname1=$row148['lname'];
  $photo1=$row148['photo'];
  $sql149="SELECT * FROM status WHERE username='$user1'";
  $result149=$conn->query($sql149);
  if($result149->num_rows>0)
  {
    $sta=1;
  }
  else{
    $sta=0;
  }
  ?>

  <a class="dropdown-item d-flex align-items-center" href="#" onclick="mailfunc();">
    <div class="dropdown-list-image mr-3">
      <img class="rounded-circle" src="<?=$photo1?>" alt="">
      <?php
      if($sta==1)
      {
      ?>
      <div class="status-indicator bg-success"></div>
    <?php }
    else
    {
      ?>
      <div class="status-indicator bg-secondary"></div>
      <?php
    }?>
    </div>
    <div class="font-weight-bold">
      <div class="text-truncate"><?php echo($content1);?></div>
      <div class="small text-gray-500"><?php echo($fname1." ".$lname1." . 58m"); ?></div>
    </div>
  </a>
<?php
$i++;
 }
 ?>
 <a class="dropdown-item text-center small text-gray-500" href="#" onclick="mailfunc();">Read More Messages</a>
</div>
 <?php
}
else
{
  ?>
<small class="dropdown-item text-center small text-gray-500">There are no messages to show</small>
<a class="dropdown-item text-center small text-gray-500" href="#" onclick="mailfunc();">Read More Messages.</a>
</div>
  <?php
}
?>
<script>
function mailfunc()
{
  document.getElementById('mailform21').submit();
}
</script>
