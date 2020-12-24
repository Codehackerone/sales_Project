<?php
session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:../logout1.php");
}
  include_once('../PROJECT_CONFIG/config.php');
  $home=5;
  include_once('../header.php');
   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
      ?><head>  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><script src="https://kit.fontawesome.com/a81368914c.js"></script>
      </head>
      <?php

    	$purid = $_POST['purid'];
      $i=0;
      $sql = "SELECT pur_id,pur_date,sup_id,gtotal FROM purchase WHERE pur_id='$purid'";
  	   $result = $conn->query($sql);
       if ($result->num_rows > 0)
  	    {
          ?>
          <body>
          <script>
                          Swal.fire({
              position: 'top-end',
              icon: 'success',
            title: 'Purchase found',
            showConfirmButton: false,
            timer: 1500
                  })
      </script>

          <center><table class="content-table">
              <thead>
              <tr>
                  <td>PURCHASE ID </td>
                  <td>SUPPLIER NAME </td>
                  <td>PURCHASE DATE</td>
                  <td>PURCHASE TOTAL</td>
                  <td>INVOICE</td>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
      while($row = $result->fetch_assoc())
       {

              $purid=$row["pur_id"];
              $purdate=$row["pur_date"];
               $purtotal=$row["gtotal"];

               $supid=$row['sup_id'];
               $sql1 = "SELECT sup_name FROM supplier WHERE sup_id='$supid'";
                  $result1 = $conn->query($sql1);
                  $row1=$result1->fetch_assoc();
                  $supname=$row1["sup_name"];
                  ?>
          <tr>
          <td><?php echo($purid); ?></td>
          <td><?php echo($supname); ?></td>
          <td><?php echo($purdate); ?></td>
          <td><?php echo($purtotal); ?></td>
          <td>
            <form action="../univ/invpur.php" method="post" target="_blank">
              <input type="hidden" value="<?=$purid?>" name="purid">
              <button type="submit" class="btn btn-info" value="click"><i class="fas fa-receipt"></i></button>
            </form>
          </td>
         </tr>
      <?php
      $i++;
      }
      ?>
      </tbody>
      </table>
  </center></body>
      <?php
  }
  else {
    ?>
    <body>
    <script>
                    Swal.fire({
        position: 'top-end',
        icon: 'error',
      title: 'No Purchase found',
      showConfirmButton: false,
      timer: 1500
            })
</script>
</body>
<?php
  }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../table.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body><br>

	<center><a href="search.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></a></center>
</body>
</html>
<style>
*{
  font-family: 'Poppins';
}
</style>
