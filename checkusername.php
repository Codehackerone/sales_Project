<?php
include_once('PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    $username=$_GET['q'];
    $sql = "SELECT * From login Where username = '$username' ";
    $result=$conn->query($sql);
    $numrow=$result->num_rows;
    if($numrow>0)
    {
        ?> <input type="hidden" id="numrow" value="yes">
        <?php
    }
    else{
      ?> <input type="hidden" id="numrow" value="no">
      <?php
    }

?>
