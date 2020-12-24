<?php
    ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}

if(isset($_POST['message']))
{
  $mes12=$_POST['message'];
  $home=5;
}
if(isset($_POST['content1234']))
{
  $header=$_POST['header'];
  $content4554=$_POST['content1234'];
}
else{
  $header="";
  $content4554="";
}
if(isset($_POST['mailfrom']))
{
  $mailfrom2=$_POST['mailfrom'];
}
else{
  $mailfrom2="";
}
if(isset($_POST['sucmes']))
{
  ?>
  <script src="sweetalert.min.js"></script>
  <body>
    <script type="text/javascript">
      swal('Success','Your Message has been sent','success')
    </script>
  </body>
  <?php
}
date_default_timezone_set("Asia/Kolkata");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manager</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<div id="txtHint"></div>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include_once('topbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo($mes12); ?> Messages</h1>
          <?php if($mes12=="Send"){

           ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">From: <?php echo($mailid); ?></h5>
            </div>
            <div class="card-body">
              <form id="form1" action="sendmes.php" method="post" enctype="multipart/form-data">
                <div id="to1">
                <div class="input-group ">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">To:</span>
                </div>
                <input type="text" class="form-control form-control-user " placeholder="Sales Manager Mail Address" value="<?=$mailfrom2?>"
                 required name="mailto[]" id="username-ex" aria-label="Username" aria-describedby="basic-addon1"></div></div>
                 <br><br>
                 <button class="btn btn-primary" onclick="addrec();"><i class="fas fa-plus"></i>&nbsp;Add a receipient</button><br>
                 <br>
                 <div class="input-group ">
                 <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon2">Heading:</span>
               </div>
               <input type="text" class="form-control form-control-user " placeholder="Heading" value="<?=$header?>"
                required name="header" id="username-ex" aria-label="heading" aria-describedby="basic-addon2">
              </div><br>
                 Mail Body:
                 <textarea class="form-control" rows="20" required name="mailbody" ><?=$content4554?></textarea><br>
                 <input type="hidden" name="isfile" value="0" id="isfile">
                 <div class="input group">
                 <input type="file" hidden multiple class="form-control" placeholder="Choose files" name="filet1[]"
                 accept="image/png,image/jpeg,application/pdf,image/gif" id="file">
               </div>
                 <button  type="button"
                 class="btn btn-primary" onclick="attach();"><i class="fas fa-paperclip"></i>&nbsp;Add attachments</button><br>
                 <div id="att1"></div><br>
                 <input type="hidden" name="date1" value="<?=date("Y-m-d H:i:s");?>" class="form-control">
                 <input type="hidden" name="mailfrom" value="<?=$mailid?>" class="form-control">
                 <input type="hidden" name="mes" value="<?=$mes12?>" class="form-control">
                 <button type="submit" class="btn btn-success btn-icon-split btn-lg" style="float:right !important;">
                   <span class="text">Send</span>
                   <span class="icon text-white-50">
                     <i class="fas fa-paper-plane rotate-45"></i>
                   </span>
                 </button>
              </form>
            </div>
          </div>
        <?php }
        else if($mes12=="Received")
        {?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">To: <?php echo($mailid); ?></h5>
            </div>
            <div class="card-body">
              <?php
              $sqlm="SELECT * FROM mail WHERE mailto='$mailid' ORDER BY date1 DESC";
              $resultm=$conn->query($sqlm);
              if($resultm->num_rows>0)
              {
                while($rowm=$resultm->fetch_assoc())
                {
                  if($rowm['deletem']!=1)
                {
                ?>
                <div class="row">
                  <div class="col">
                    <div class="card border-left-primary shadow h-100 py-2"  data-toggle="modal" data-target="#mailthat"
                     onclick="invertmail('<?=$rowm['id'];?>')">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-auto">
                            <?php  if($rowm['readm']==0)
                            {?>
                            <i class="fas fa-envelope fa-2x" id="<?='micon'.$rowm['id']?>"></i>
                          <?php }
                          else
                          {
                            ?>
                            <i class="fas fa-envelope-open fa-2x" id="<?='micon'.$rowm['id']?>"></i>
                            <?php
                          }?>
                          </div>
                          <div class="col-auto">
                    <?php
                    $mailfrom=$rowm['mailfrom'];
                    $content=$rowm['content'];
                    $date1=$rowm['date1'];
                    $heading=$rowm['header'];
                    $sql69="SELECT * FROM login WHERE mailid='$mailfrom'";
                    $result69=$conn->query($sql69);
                    $row69=$result69->fetch_assoc();
                    $fname=$row69['fname'];
                    $lname=$row69['lname'];
                    $photo=$row69['photo'];
                    ?>
                      <img class="img-profile rounded-circle" src='<?=$photo?>' style="height:32px;width:32px;"
                      ><?php echo($fname." ".$lname);?>
                      </div>
                      <div class="col-auto">
                        <?php echo($date1); ?>
                      </div>
                      <?php

                      ?>
                      <div class="col-auto text-truncate">
                        <?php echo($content); ?>
                      </div>
                  </div>
                  </div>
                  </div>
                </div>
                </div>
                <div class="modal fade" id="mailthat" tabindex="-1" role="dialog" aria-labelledby="exadfgdgl" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mail Messenger</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      From:<?php echo($mailfrom); ?><br>
                      Heading:<?php echo($heading);?><br>
                      Content:<br>
                      <?php echo($content); ?><br><br>
                      Attachments:
                      </div>
                      <div class="modal-footer">
                        <form action="message.php" method="post">
                          <input type="hidden" name="message" value="Send">
                          <input type="hidden" name="header" value="<?=$heading?>">
                          <input type="hidden" name="content1234" value="<?=$content?>">
                        <button class="btn btn-primary" type="submit">Forward</button>
                      </form>
                      <form action="message.php" method="post">
                        <input type="hidden" name="message" value="Send">
                        <input type="hidden" name="mailfrom" value="<?=$mailfrom?>">
                        <button class="btn btn-info">Reply</button>
                      </form>
                      <form action="delmail.php" method="post">
                        <input type="hidden" name="del" value="<?=$rowm['id']?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </from>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              }
              }
              else
              {
                ?>
                <div class="text-center">
                  <h3 class="m-0 text-secondary">There are no messages to show.</h3>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
          <?php
        }
        ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <?php include_once('footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->


  <!-- Page level plugins -->


  <!-- Page level custom scripts -->
<div id="txh"></div>

</body>

</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script>
function addrec()
{
  $('#to1').append(
    '<div class="input-group ">'+
    '<div class="input-group-prepend">'+
    '<span class="input-group-text" id="basic-addon1">CC:</span>'+
    '</div>'+
    '<input type="text" class="form-control form-control-user " placeholder="Sales Manager Mail Address"'+
    'required name="mailto[]" id="username-ex" aria-label="Username" aria-describedby="basic-addon1"></div>'
  );
}
function attach()
{
    document.getElementById('file').click();
    document.getElementById('att1').innerHTML="Attachments Selected";
    document.getElementById('isfile').value=1;
}
function invertmail(str) {
  var xhttp;
  $('#micon'+str).attr('class','fas fa-envelope-open fa-2x');
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;

    }
  };
  xhttp.open("GET", "changeread.php?q="+str, true);
  xhttp.send();
}
</script>
