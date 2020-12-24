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
   else
    {
      $custid = $_POST['custname'];

		    $sql = "SELECT sup_id,sup_name,sup_add,sup_phno,gstin,state,stateid FROM supplier1 WHERE sup_name LIKE '%$custid%'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0)
			{
                ?>
                <!DOCTYPE html>
            <html>
            <head>
                <title></title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            </head>
            <body><script>
                Swal.fire({
                    position: 'top-end',
                  icon: 'success',
                  title: 'Customer found',
                  showConfirmButton: false,
                  timer: 1500
                    })
                </script>
                <div class="container">
                <center>
                  <table class="content-table">
            <thead>
            <tr>
                <td>SUPPLIER ID </td>
                <td>SUPPLIER NAME </td>
                <td>SUPPLIER ADDRESS </td>
                <td>SUPPLIER PHONE </td>
                <td>STATE </td>
                <td>GSTIN </td>
                <td>CLICK ME TO FILL UP</td>
                </tr>
                </thead>
                <tbody>

            <?php $i="a";
             while($row = $result->fetch_assoc())
              {
                $custid = $row["sup_id"];
                $custname = $row["sup_name"];
                $custadd = $row["sup_add"];
                $custphno = $row["sup_phno"];
                $gstin=$row['gstin'];
                $state=$row['state'];
                ?><tr>
                <td><span id="<?=$i."-".strval(1)?>"><?php echo($custid); ?></span></td>
                <td><span id="<?=$i."-".strval(2)?>"><?php echo($custname); ?></span></td>
                <td><span id="<?=$i."-".strval(3)?>"><?php echo($custadd); ?></span></td>
                <td><span id="<?=$i."-".strval(4)?>"><?php echo($custphno); ?></span></td>
                <td><?php echo($state);?></td>
                <td><?php echo($gstin);?></td>
                <td><button type="button" class="btn btn-info" onclick="myFunction('<?=$custid?>','<?=$custname?>','<?=$custadd?>','<?=$custphno?>'
                  ,'<?=$gstin?>','<?=$state?>');"
                  value="FILL UP">Fill up</button>
                </td>

            </tr>
          <?php
          $i++;
        } ?>
        </tbody>
    </table>
</center>


            <?php
        }
            else
            {
                 echo "0 results nothing to update";
            }
        }
        ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
            <link rel="stylesheet" type="text/css" href="../table.css">
</head>
<body>
  <datalist id="stateer">
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
    <option value="PUDUCHERRY"></datalist>
    <form action="update3.php" method="post" class="contact-form">
      <div class="form-group">
            <input type="text" id="custid" required placeholder="NEW CUSTOMER ID" name="custid" class="form-control" readonly></div><div class="form-group">
            <input type="text" id="custname" required placeholder="NEW CUSTOMER NAME"  class="form-control" name="custname"></div><div class="form-group">
            <input type="text" id="custadd" required placeholder="NEW CUSTOMER ADDRESS" class="form-control" name="custadd"></div><div class="form-group">
            <input type="text" id="custph" required placeholder="NEW CUSTOMER PHONE" class="form-control" name="custph"></div><div class="form-group">
            <input type="text"  placeholder="GSTIN NUMBER"  id="gstin" name="gstin" class="form-control" ></div><div class="form-group">
            <input list="stateer" name="statename" id="state" placeholder="STATE NAME" class="form-control" onchange="showCustomer(this.value)"></input></div><div class="form-group">
            <input type="text" readonly id="statec" name="statecode" placeholder="STATE ID" class="form-control"></div><div class="form-group">

            <CENTER><button type="submit" class="btn btn-primary" value="UPDATE">Update</button></CENTER></div>
        </form><div id="txtHint"></div>
        <center><a href="update1.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></a></center>
</body>
</div>
<script>
function myFunction(this_tag1,this_tag2,this_tag3,this_tag4,this_tag5,this_tag6)
{

    search_text_tag = document.getElementById('custid');
    search_text_tag2 = document.getElementById('custname');
    search_text_tag.value = this_tag1;
    search_text_tag2.value = this_tag2;
    search_text_tag3 = document.getElementById('custadd');
    search_text_tag4 = document.getElementById('custph');
    search_text_tag3.value = this_tag3;
    search_text_tag4.value = this_tag4;
    search_text_tag5 = document.getElementById('gstin');
    search_text_tag6 = document.getElementById('state');
    search_text_tag5.value = this_tag5;
    search_text_tag6.value = this_tag6;
}
</script>
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
    }
  };
  xhttp.open("GET", "../univ/state.php?q="+str, true);
  xhttp.send();
}
</script>
</html>
<style>
*{
  font-family: 'Poppins';
}
</style>
