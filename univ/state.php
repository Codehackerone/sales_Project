<?php
include_once('../PROJECT_CONFIG/config.php');
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error())
  {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }
  $code=$_GET['q'];
  if($code=="WEST BENGAL")
  {
      $new="WB";
      $tin="19";
  }
  else if ($code=="MAHARASHTRA")
 {
    $new="MH";
    $tin="27";
  }
  else if ($code=="ANDAMAN AND NICOBAR")
 {
    $new="AN";
    $tin="";
  }
  else if ($code=="ANDHRA PRADESH")
 {
    $new="AD";
    $tin="37";
  }
  else if ($code=="ARUNACHAL PRADESH")
 {
    $new="AR";
    $tin="12";
  }
  else if ($code=="ASSAM")
 {
    $new="AS";
    $tin="18";
  }
  else if ($code=="BIHAR")
 {
    $new="BR";
    $tin="10";
  }
  else if ($code=="CHHATISGARH")
 {
    $new="CG";
    $tin="22";
  }
  else if ($code=="DELHI")
 {
    $new="DL";
    $tin="07";
  }
  else if ($code=="GOA")
 {
    $new="GA";
    $tin="30";
  }
  else if ($code=="GUJARAT")
 {
    $new="GJ";
    $tin="24";
  }
  else if ($code=="HARIYANA")
 {
    $new="HR";
    $tin="06";
  }
  else if ($code=="HIMACHAL PRADESH")
 {
    $new="HP";
    $tin="02";
  }
  else if ($code=="JHARKHAND")
 {
    $new="JH";
    $tin="20";
  }
  else if ($code=="KARNATAKA")
 {
    $new="KA";
    $tin="20";
  }
  else if ($code=="MAHARASHTRA")
 {
    $new="KL";
    $tin="32";
  }
  else if ($code=="LAKSHADEEP")
 {
    $new="LD";
    $tin="31";
  }
  else if ($code=="MADHYA PRADESH")
 {
    $new="MP";
    $tin="23";
  }
  else if ($code=="MANIPUR")
 {
    $new="MN";
    $tin="24";
  }
  else if ($code=="MEGHALAYA")
 {
    $new="ML";
    $tin="17";
  }
  else if ($code=="MIZORAM")
 {
    $new="MZ";
    $tin="15";
  }
  else if ($code=="NAGALAND")
 {
    $new="NL";
    $tin="13";
  }
  else if ($code=="ODISHA")
 {
    $new="OD";
    $tin="21";
  }
  else if ($code=="PUDUCHERRY")
 {
    $new="PY";
    $tin="34";
  }
  else if ($code=="PUNJAB")
 {
    $new="PB";
    $tin="03";
  }
  else if ($code=="RAJASTHAN")
 {
    $new="RJ";
    $tin="08";
  }
  else if ($code=="SIKKIM")
 {
    $new="SK";
    $tin="11";
  }
  else if ($code=="TAMIL NADU")
 {
    $new="TN";
    $tin="33";
  }
  else if ($code=="TELENGANA")
 {
    $new="TS";
    $tin="36";
  }
  else if ($code=="TRIPURA")
 {
    $new="TR";
    $tin="16";
  }
  else if ($code=="UTTAR PRADESH")
 {
    $new="UP";
    $tin="09";
  }
  else if ($code=="UTTARAKHAND")
 {
    $new="UK";
    $tin="05";
  }
?>
<input type="hidden" value="<?=$new?>" id="codei">
<input type="hidden" value="<?=$tin?>" id="tini">
