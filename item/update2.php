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

		    $sql = "SELECT item_code,item_name,cgst,sgst,igst,mrp,batch,price FROM item WHERE item_name LIKE '%$custid%'";
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
                  title: 'Item found',
                  showConfirmButton: false,
                  timer: 1500
                    })
                </script>
                <div class="container">
                <center>
                  <table class="content-table">
            <thead>
            <tr>
                <td>ITEM CODE</td>
                <td>ITEM NAME </td>
                <td>SGST(IN %)</td>
                <td>CGST(IN %)</td>
                <td>IGST(IN %)</td>
                <td>MRP</td>
                <td>BATCH NUMBER</td>
                <td>BUYING PRICE</td>
                <td>CLICK ME TO FILL UP</td>
                </tr>
                </thead>
                <tbody>

            <?php $i="a";
             while($row = $result->fetch_assoc())
              {
                $itemcode = $row["item_code"];
                $itemname = $row["item_name"];
                $cgst=$row['cgst'];
                $sgst=$row['sgst'];
                $igst=$row['igst'];
                $mrp=$row['mrp'];
                $batch=$row['batch'];
                $price=$row['price'];
                ?><tr>
                <td><span id="<?=$i."-".strval(1)?>"><?php echo($itemcode); ?></span></td>
                <td><span id="<?=$i."-".strval(2)?>"><?php echo($itemname); ?></span></td>
                <td><span id="<?=$i."-".strval(3)?>"><?php echo($cgst); ?></span></td>
                <td><span id="<?=$i."-".strval(4)?>"><?php echo($sgst); ?></span></td>
                <td><span id="<?=$i."-".strval(3)?>"><?php echo($igst); ?></span></td>
                <td><span id="<?=$i."-".strval(3)?>"><?php echo($mrp); ?></span></td>
                <td><span id="<?=$i."-".strval(4)?>"><?php echo($batch); ?></span></td>
                <td><span id="<?=$i."-".strval(4)?>"><?php echo($price); ?></span></td>
                <td><button type="button" class="btn btn-info" onclick="myFunction('<?=$itemcode?>','<?=$itemname?>','<?=$cgst?>',
                  '<?=$sgst?>','<?=$igst?>','<?=$batch?>','<?=$mrp?>','<?=$price?>');"  value="FILL UP">Fill up</button>
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
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
                <link rel="stylesheet" type="text/css" href="../table.css">
</head>
<body>
    <form action="update3.php" method="post" >
            <div class="form-group"><input type="text" id="itemcode" class="form-control"required placeholder="ITEM ID" name="itemcode" readonly></div><br>
            <div class="form-group"><input type="text" id="itemname" class="form-control"required placeholder="NEW ITEM NAME" name="itemname"></div>
            <div class="form-group"><input type="text" id="cgst"class="form-control" required placeholder="NEW CGST" name="cgst"></div>
            <div class="form-group"><input type="text" id="sgst" class="form-control"required placeholder="NEW SGST" name="sgst"></div>
            <div class="form-group"><input type="text" id="igst"class="form-control" required placeholder="NEW IGST" name="igst"></div>
            <div class="form-group"><input type="text" id="mrp"class="form-control" required placeholder="NEW MRP" name="mrp"></div>
            <div class="form-group"><input type="text" id="batch" class="form-control"required placeholder="NEW BATCH NUMBER" name="batch"></div>
            <div class="form-group"><input type="text" id="price" class="form-control"required placeholder="NEW BUYING PRICE" name="price"></div>
            <CENTER><button type="submit" class="btn btn-primary" value="UPDATE">Update</button></CENTER></div>
        </form><div id="txtHint"></div>
        <center><a href="update1.php"><button class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;GO BACK</button></a></center>
      </div>
</body>
<script>
function myFunction(this_tag1,this_tag2,this_tag3,this_tag4,this_tag5,this_tag6,this_tag7,this_tag8)
{

    search_text_tag = document.getElementById('itemcode');
    search_text_tag2 = document.getElementById('itemname');
    search_text_tag.value = this_tag1;
    search_text_tag2.value = this_tag2;
    search_text_tag3 = document.getElementById('cgst');
    search_text_tag4 = document.getElementById('sgst');
    search_text_tag3.value = this_tag3;
    search_text_tag4.value = this_tag4;
    search_text_tag5 = document.getElementById('igst');
    search_text_tag6 = document.getElementById('batch');
    search_text_tag5.value = this_tag5;
    search_text_tag6.value = this_tag6;
    search_text_tag7 = document.getElementById('mrp');
    search_text_tag7.value = this_tag7;
    search_text_tag8 = document.getElementById('price');
    search_text_tag8.value = this_tag8;
;}
</script>
</html>
<style>
*{
  font-family: 'Poppins';
}
</style>
