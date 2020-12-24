<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    $home=3;
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error())
      {
      	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>add supplier</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

</head>
<body>
	<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
        <?php include_once('../header.php'); ?>
        <div class="container">
<CENTER><H3>ADD SUPPLIER</H3></CENTER>
<form action="success.php" method="post">
<div class="form-group">
<label>Supplier Name</label>
    <input type="text" required placeholder="Eg:XYZ LTD" name="supname" class="form-control"></div><div class="form-group">
      <label>Supplier Phone</label>
    <input type="text" required placeholder="Eg:9876543210" name="supph" class="form-control"></div><div class="form-group">
      <label>GST Number</label>
      <input type="text"  placeholder="Eg:G345634" name="gst" id="gst" class="form-control"></div>
      <div class="row">
        <div class="col">
      <div class="form-group">
        <label>Supplier Address</label>
      <input type="text" required placeholder="Eg:43,Pawai,Mumbai" name="supadd" class="form-control"></div></div><div class="form-group">
        <label>State Name</label>
        <div class="col">
    <input list="state" name="statename" placeholder="Eg:Maharashtra" onchange="showCustomer(this.value)" class="form-control">
  </input></div></div>
</div>
<div class="row">
  <div class="col">
<div class="form-group">
    <label>TIN</label>
    <input type="text"  placeholder="Eg:19" id="tin" name="tin" class="form-control" readonly></div></div>
    <div class="form-group"><div class="col">
      <label>State ID</label>
    <input type="text" readonly id="statec" name="statecode" placeholder="Eg:MH" class="form-control"></div>
  </div>
  <div class="form-group"><div class="col">
    <label>GSTIN</label>
  <input type="text" readonly id="gstinn"  placeholder="Eg:G34663419" name="gstin" class="form-control"></div>
</div>
</div>
    <div class="form-group">
    <CENTER><button type="submit" class="btn btn-success" value="INSERT">INSERT<i class="fas fa-arrow-right"></i></button></CENTER></div>
  </form>
    <datalist id="state">
      <option value="ANDHRA PRADESH">
      <option value="ARUNACHAL PRADESH">
      <option value="ASSAM">
      <option value="BIHAR">
      <option value="CHHATISGARH">
      <option value="GOA">
      <option value="GUJARAT">
      <option value="HARIYANA">
      <option value="HIMACHAL PRADESH">
      <option value="JHARKHAND">
      <option value="KARNATAKA">
      <option value="KERALA">
      <option value="MADHYA PRADESH">
      <option value="MAHARASHTRA">
      <option value="MANIPUR">
      <option value="MEGHALAYA">
      <option value="MIZORAM">
      <option value="NAGALAND">
      <option value="ODISHA">
      <option value="PUNJAB">
      <option value="RAJASTHAN">
      <option value="SIKKIM">
      <option value="TAMIL NADU">
      <option value="TELENGANA">
      <option value="TRIPURA">
      <option value="UTTAR PRADESH">
      <option value="UTTARAKHAND">
      <option value="WEST BENGAL">
      <option value="ANDAMAN AND NICOBAR">
      <option value="CHANDIGARH">
      <option value="DADRA AND NAGAR HAVELI">
      <option value="LADAKH">
      <option value="LAKSHADEEP">
      <option value="DELHI">
      <option value="PUDUCHERRY">
    </datalist>
    <div id="txtHint"></div></div>
</body>
<script>
function showCustomer(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      var codenew=document.getElementById('codei').value;
      document.getElementById('statec').value=codenew;
      var codenew=document.getElementById('tini').value;
      document.getElementById('tin').value=codenew;
      var gst=document.getElementById('gst').value;
      var tin=document.getElementById('tin').value;
      document.getElementById('gstinn').value=gst.concat(tin);
    }
  };
  xhttp.open("GET", "../univ/state.php?q="+str, true);
  xhttp.send();
}
</script>
<style>
.cust{
  font-size: 1.4rem;
}
</style>
</html>
