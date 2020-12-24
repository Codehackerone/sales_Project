<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
    include_once('../PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
     {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
      if(isset($_POST['delete']))
      {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <body>
          <script>
          Swal.fire({
  title: 'Success!',
  text: 'Customer is deleted',
  icon: 'success',
  timer:2000,
  timerProgressBar:true
})
          </script>
        </body>
        <?php
      }?>
    	<head><script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="stylesheet" type="text/css" href="../table.css"></head>
      <?php $home=3;include_once('../header.php');
      include_once('../bootstrap.php');?>
      <br><br>
      <div class="container" style="overflow-x:auto;">

        <?php $sql = "SELECT sup_id,sup_name,sup_add,sup_phno,gstin,state FROM supplier1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
        ?>
        <center>
            <table class="content-table" id="myTable">
            <thead><tr>
                <td scope="col">Supplier id </td>
                <td scope="col">Supplier name </td>
                <td scope="col">Supplier address </td>
                <td scope="col">Supplier phone no </td>
                <td scope="col">State </td>
                <td scope="col">GSTIN </td>
                <td scope="col">Update</td>
                <td scope="col">Delete</td>
                </tr>
                </thead>

                <tbody>
                    <?php
    while($row = $result->fetch_assoc())
     {
       $gstin=$row['gstin'];
       $state=$row['state'];
       $cust_name=$row["sup_name"];
       $cust_id=$row["sup_id"];
        ?>
        <tr>
        <td><?php echo($row["sup_id"]); ?></td>
        <td><?php echo($row["sup_name"]); ?></td>
        <td><?php echo($row["sup_add"]); ?></td>
        <td><?php echo($row["sup_phno"]); ?></td>
        <td><?php echo($state);?></td>
        <td><?php echo($gstin);?></td>
        <td><form action="update2.php" method="post">
          <input type="hidden" name="custname" value="<?=$cust_name?>">
          <button class="btn btn-primary" type="submit"><i class="fas fa-user-edit"></i></button></form></td>
        <td><form action="delete.php" method="post" id="myForm1">
          <input type="hidden" name="custid" value="<?=$cust_id?>">
          <button class="btn btn-danger" type="button" onclick="alertfun()"><i class="fas fa-trash"></i></button></form></td>
       </tr>
       </tr>
    <?php
    }
    ?></tbody>
    </table>
  </div>
</center>
    <?php
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body>
</body>
</html>
<script>
var table = $('#myTable').DataTable();
function alertfun(){
  const swalWithBootstrapButtons = Swal.mixin({
customClass: {
  confirmButton: 'btn btn-success',
  cancelButton: 'btn btn-danger'
},
buttonsStyling: false
})
swalWithBootstrapButtons.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonText: 'Yes, delete it!',
cancelButtonText: 'No, cancel!',
reverseButtons: true
}).then((result) => {
if (result.value) {
  document.getElementById('myForm1').submit();
} else if (
  result.dismiss === Swal.DismissReason.cancel
) {
  swalWithBootstrapButtons.fire(
    'Cancelled',
    'Your data is safe',
    'error'
  )
}
})
}
</script>
