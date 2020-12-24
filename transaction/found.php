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
      ?><head>  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script></head>
      <?php

    	$purid = $_POST['purid'];
      $i=0;
      $sql = "SELECT tran_id,tran_date,cust_id,gtotal FROM tran WHERE tran_id='$purid'";
  	   $result = $conn->query($sql);
       if ($result->num_rows > 0)
  	    {
          ?>
          <body>
          <script>
                          Swal.fire({
              position: 'top-end',
              icon: 'success',
            title: 'Transaction found',
            showConfirmButton: false,
            timer: 1500
                  })
      </script>

          <center><table class="content-table">
              <thead>
              <tr>
                  <td>TRANSACTION ID </td>
                  <td>TRANSACTION NAME </td>
                  <td>TRANSACTION DATE</td>
                  <td>TRANSACTION TOTAL</td>
                  <td>INVOICE</td>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
      while($row = $result->fetch_assoc())
       {

              $purid=$row["tran_id"];
              $purdate=$row["tran_date"];
               $purtotal=$row["gtotal"];

               $supid=$row['cust_id'];
               $sql1 = "SELECT cust_name FROM customer WHERE cust_id='$supid'";
                  $result1 = $conn->query($sql1);
                  $row1=$result1->fetch_assoc();
                  $supname=$row1["cust_name"];
                  ?>
          <tr>
          <td><?php echo($purid); ?></td>
          <td><?php echo($supname); ?></td>
          <td><?php echo($purdate); ?></td>
          <td><?php echo($purtotal); ?></td>
          <td>
            <form action="../univ/invtran.php" method="post" target="_blank">
              <input type="hidden" value="<?=$purid?>" name="purid">
              <input type="submit" class="btn" value="click">
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
      title: 'No Transaction found',
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<body><br>

	<center><a href="search.php"><button>GO BACK</button></a></center>
</body>
</html>
