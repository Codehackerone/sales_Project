<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
include_once('../PROJECT_CONFIG/config.php');
include_once('../bootstrap.php');
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error())
  {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  }
$purdate=$_POST['purdate'];
$supname=$_POST['supname'];
$sql = "SELECT sup_id,sup_name,sup_add,sup_phno,state,stateid,gstin FROM supplier WHERE sup_name LIKE '%$supname%'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$supid=$row['sup_id'];
$supname=$row['sup_name'];
$supadd=$row['sup_add'];
$supphno=$row['sup_phno'];
$state=$row['state'];
$stateid=$row['stateid'];
$gstin=$row['gstin'];
?>
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
<div class="container">
  <h3><center>Please add your items to the cart.</center></h3>
<link rel="stylesheet" type="text/css" href="../table.css">
<datalist id="browsers" class="data">
  <?php
  $sql = "SELECT item_name FROM item1";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
   {
     $custname=$row["item_name"];
     ?><option value="<?=$custname?>"><?php
   }
 }
?></datalist>
<form action="done1.php" method="post">
<input type="hidden" value="<?=$purid?>" name="purid">
<input type="hidden" value="<?=$purdate?>" name="purdate">
<input type="hidden" value="<?=$supid?>" name="supid">
<input type="hidden" value="<?=$state?>" name="state">
<input type="hidden" value="<?=$stateid?>" name="stateid">
<input type="hidden" value="<?=$gstin?>" name="gstin">
<input type="number" hidden name="imp" id="imp" value="1">
<input type="hidden" name="id" value="<?=$id?>">
<center>
  <div class="tablesty" style="overflow-x:auto;">
<table class="content-table" id="myTable" >
<thead><tr>
      <td>ITEM NAME</td>
    <td>ITEM CODE</td>
    <td>ITEM QUANTITY</td>
    <td>CGST</td>
    <td>SGST</td>
    <td>IGST</td>
    <td>BATCH</td>
    <td>MRP</td>
    <td>TOTAL</td>
    <td>REMOVE</td>
    </tr>
    </thead>
<tbody>
  <tr id="table1"><td><input list="browsers" name="itemname1" class="input2"
    placeholder="ITEM NAME" id="itemname1" required onchange="showCustomer(this.value,1)"></td>
          <td><input type="text" required placeholder="ITEM CODE" class="input2" name="itemcode1" id="itemcode1" required readonly ></td>
          <td><input type="number" required placeholder="ITEM QUANTITY" class="input2" name="itemqty1" id="itemqty1" required onkeyup="myKeyfunc(this.value,1)"></td>
         <td><input type="decimal" required placeholder="CGST(in %)" class="input2" name="cgst1" id="cgst1"  required onkeyup="myKeyfunc(this.value,1)"></td>
         <td><input type="decimal" required placeholder="SGST(in %)"class="input2" name="sgst1" id="sgst1"  required onkeyup="myKeyfunc(this.value,1)"></td>
         <td><input type="decimal" required placeholder="IGST(in %)" class="input2" name="igst1" id="igst1" required onkeyup="myKeyfunc(this.value,1)"></td>
         <td><input type="text" required placeholder="BATCH NUMBER" class="input2" name="batch1" id="batch1" required readonly></td>
        <td><input type="decimal" required placeholder="BUY PRICE" class="input2" name="mrp1" id="mrp1" required readonly></td>
        <td><input type="decimal" required placeholder="TOTAL" class="input2" name="total1" id="total1"  required readonly ></td>
        <td><a  onclick="myRemove(1);">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fas fa-trash-alt"></i></a></td>
  </tr>
</tbody>
</table>
</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div id="txtHint"></div>
<button id="btn1" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Add a row</button>
<button type="submit" value="GO TO CART" class="btn btn-primary" id="submithere">GO TO CART&nbsp;<i class="fas fa-shopping-cart"></i></button>
</form>
</div>
<style>
body
{
  padding:10px;
}
.cust{
  font-size: 1.4rem;
}
#submithere
{
  float:right;
}
</style>
<script>
function showCustomer(str,counterval) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      if(document.getElementById("rec").value!=0)
      {
      var newcode=document.getElementById("itemcodei").value;
      document.getElementById("itemcode"+counterval).value = newcode;
      var newcode=document.getElementById("cgsti").value;
      document.getElementById("cgst"+counterval).value = newcode;
      var newcode1=document.getElementById("sgsti").value;
      document.getElementById("sgst"+counterval).value = newcode1;
      var newcode2=document.getElementById("igsti").value;
      document.getElementById("igst"+counterval).value = newcode2;
      var newcode3=document.getElementById("batchi").value;
      document.getElementById("batch"+counterval).value = newcode3;
      var newcode4=document.getElementById("mrpi").value;
      document.getElementById("mrp"+counterval).value = newcode4;
    }
    else
    {
      Swal.fire('Sorry','No products found','error');
    }
    }
  };
  xhttp.open("GET", "items.php?q="+str, true);
  xhttp.send();
}
function myKeyfunc(value,counterval2)
{
  var x = document.getElementById("itemqty"+counterval2).value;
  var y = document.getElementById("mrp"+counterval2).value;
  var m = document.getElementById("cgst"+counterval2).value;
  var n = document.getElementById("sgst"+counterval2).value;
  var p = document.getElementById("igst"+counterval2).value;
  z=(x*y);
  z=z+z*(m/100)+z*(n/100)+z*(p/100);
  document.getElementById("total"+counterval2).value=z;
}
$(document).ready(function(){
  $("#btn1").click(function(){
    document.getElementById("imp").value++;
    var srno =  document.getElementById("imp").value.toString();
    $("#myTable tbody").append(
      '<tr id="table'+srno+'">'+
      '<td><input list="browsers" name="itemname' + srno + '" id="itemname' + srno + '" class="input2" placeholder="ITEM NAME" required onchange="showCustomer(this.value,' + srno + ')"></td>'+
      '<td><input type="text" required placeholder="ITEM CODE" class="input2" name="itemcode' + srno + '" id="itemcode' + srno + '" readonly required></td>'+
      '<TD><input type="number" required placeholder="ITEM QUANTITY" class="input2" name="itemqty' + srno + '" id="itemqty' + srno + '" required onkeyup="myKeyfunc(this.value,' + srno + ')"></TD>'+
      '<td><input type="decimal" required placeholder="CGST (in %)" class="input2" name="cgst' + srno + '" id="cgst' + srno + '" required  onkeyup="myKeyfunc(this.value,' + srno + ')"></td></td>'+
      '<td><input type="decimal" required placeholder="SGST(in %)"class="input2" name="sgst' + srno + '" id="sgst' + srno + '" required onkeyup="myKeyfunc(this.value,' + srno + ')"></td>'+
      '<td><input type="decimal" required placeholder="IGST(in %)" class="input2" name="igst' + srno + '" id="igst' + srno + '" required onkeyup="myKeyfunc(this.value,' + srno + ')"></td>'+
      '<td><input type="text" required placeholder="BATCH NUMBER" class="input2" name="batch' + srno + '" id="batch' + srno + '" required readonly></td>'+
      '<td><input type="decimal" required placeholder="MRP" class="input2" name="mrp' + srno + '" id="mrp' + srno + '" required readonly></td>'+
      '<td><input type="decimal" required placeholder="TOTAL" class="input2" name="total' + srno + '" id="total' + srno + '" required readonly ></td>'+
      '<td><a onclick="myRemove('+srno+');">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fas fa-trash-alt"></i></a></td>'+
      "</tr>"
    );

  });
});
function myRemove(varcounter1)
{
    var varcounter2=varcounter1.toString();
    var obj=document.getElementById('table'+varcounter2);
    obj.remove();
}
</script><br><br>
<center><a href="add.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Cancel and go back</button></a></center>
<style>
*{
  font-family:'Poppins';
}
.input2{
  width:150px;
}
</style>
</div>
