<?php
ob_start();
    session_start();
if(!array_key_exists('username', $_SESSION))
{
    header("location:logout1.php");
}
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
<script src="sweetalert.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php
if(isset($_POST['pic']))
{
  ?>
  <script>
        swal('Success','Your Profile Picture has been updated.','success')
  </script>
  <?php
}
if(isset($_POST['det']))
{
  ?>
  <script>
        swal('Success','Your Account Details has been updated.','success')
  </script>
  <?php
}
if(isset($_POST['pass']))
{
  ?>
  <script>
        swal('Success','Your Password has been updated.','success')
  </script>
  <?php
}
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include_once('topbar.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 text-center">Profile</h1>

          <div class="card shadow mb-4">
            <br><br>
            <center><img src="<?=$photo?>" class="rounded-circle" style="height:200px; width:200px;"></center><br>
            <div class="text-center">
              <button class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#editpicture">
                <span class="text">Edit Picture</span>
                <span class="icon text-white-50"><i class="fas fa-edit"></i></span></button><br><br>
              <button class="btn btn-light btn-icon-split"> <span class="text">STATUS:</span>
                <span class="icon grey-white-50"><i class="fas fa-circle fa-xs online" style="color:#1cc88a; box-shadow:0.5px solid lightgreen;">
                </i>&nbsp;ONLINE</span></button>
            </div><hr>
            <div class="input-group">
              &nbsp;&nbsp;&nbsp;&nbsp;<div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon10">Your Sales Manager Email:</span>
            </div>
            <input type="text" class="form-control"  id="usernamer-ex"  aria-describedby="basic-addon10"
            placeholder="<?=$mailid?>" readonly>
            &nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <br><br>
              <div class="row" style="padding-left:20px;padding-right:20px;">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon11">First Name:</span>
                  </div>
                  <input type="text" class="form-control"  id="usernamer-ex1"  aria-describedby="basic-addon11"
                  placeholder="<?=$fname?>" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon21">Last Name:</span>
                </div>
                <input type="text" class="form-control"  id="usernamer-ex2"  aria-describedby="basic-addon21"
                placeholder="<?=$lname?>" readonly>
              </div>
            </div>
          </div><br>
            <div class="row" style="padding-left:20px;padding-right:20px;">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="input-group">
                  <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon11">Email Address:</span>
                </div>
                <input type="text" class="form-control"  id="usernamer-ex1"  aria-describedby="basic-addon11"
                placeholder="<?=$email?>" readonly>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon21">Contact Number:</span>
              </div>
              <input type="text" class="form-control"  id="usernamer-ex2"  aria-describedby="basic-addon21"
              placeholder="<?=$contact?>" readonly>
            </div>
          </div>
            </div>
            <br>
            <div class="text-center">
              <button class="btn btn-primary btn-icon-split" type="button" data-toggle="modal" data-target="#editdetail">
                <span class="text">Edit Details</span>
              <span class="icon text-white-50"><i class="fas fa-pencil-alt"></i></span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-info btn-icon-split" type="button" data-toggle="modal" data-target="#editpassword">
                <span class="text">Change Password</span>
              <span class="icon text-white-50"><i class="fas fa-pencil-alt"></i></span></button>
            </div>
            <br><br>
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

  <div class="modal fade" id="editpicture" tabindex="-1" role="dialog" aria-labelledby="editpicture" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose Profile Picture</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="changepic.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" name="filet123" accept="image/png,image/jpeg,image/gif" id="filet" required
              class="form-control" ><br>
            </div>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
                    </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editdetail" tabindex="-1" role="dialog" aria-labelledby="editpicture" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change the details:</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="changedet.php" method="post">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon11">First Name:</span>
              </div>
              <input type="text" class="form-control"  id="usernamer-ex1"  aria-describedby="basic-addon11" name="fname"
              value="<?=$fname?>">
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon11">Last Name:</span>
            </div>
            <input type="text" class="form-control"  id="usernamer-ex1"  aria-describedby="basic-addon11" name="lname"
            value="<?=$lname?>">
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon11">Email Address:</span>
          </div>
          <input type="text" class="form-control"  id="usernamer-ex1"  aria-describedby="basic-addon11" name="email"
          value="<?=$email?>">
        </div>
        <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon11">Contact Number:</span>
        </div>
        <input type="number" class="form-control"  id="usernamer-ex178"  aria-describedby="basic-addon19" name="contact"
        value="<?=$contact?>">
      </div>
            </div>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
                    </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editpassword" tabindex="-1" role="dialog" aria-labelledby="editpicture" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose a Password:</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="changepass.php" method="post" >
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass"
                onkeyup="checkpass();" required>
                <div class="valid-feedback" id="pas1">
                </div>
                <div class="invalid-feedback" id="pas2">
                </div>
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                placeholder="Repeat Password" required onkeyup="conpass();">
                <div class="valid-feedback">
                  Passwords Match!
                </div>
                <div class="invalid-feedback">
                  Sorry! Passwords don't Match!
                </div>
              </div>
            </div>
            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="submit1">Update</button>
                    </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script>
function scorePassword(pass) {
    var score = 0;
    if (!pass)
        return score;

    // award every unique letter until 5 repetitions
    var letters = new Object();
    for (var i=0; i<pass.length; i++) {
        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
        score += 5.0 / letters[pass[i]];
    }

    // bonus points for mixing it up
    var variations = {
        digits: /\d/.test(pass),
        lower: /[a-z]/.test(pass),
        upper: /[A-Z]/.test(pass),
        nonWords: /\W/.test(pass),
    }

    variationCount = 0;
    for (var check in variations) {
        variationCount += (variations[check] == true) ? 1 : 0;
    }
    score += (variationCount - 1) * 10;

    return parseInt(score);
}
function checkpass() {
    var pass=document.getElementById('exampleInputPassword').value;
    var pass4=document.getElementById('exampleRepeatPassword').value;
    if(!pass4=="")
    {
      conpass();
    }
    var score = scorePassword(pass);
    if (score > 80){
      $('#exampleInputPassword').attr('class','form-control form-control-user is-valid');
        document.getElementById('pas1').innerHTML= "Very Strong";
        err2=0;
      }
    else if (score > 55){
      $('#exampleInputPassword').attr('class','form-control form-control-user is-valid');
        document.getElementById('pas1').innerHTML= "Strong";
        err2=0;
      }
    else if (score >= 45){
      $('#exampleInputPassword').attr('class','form-control form-control-user is-valid');
        document.getElementById('pas1').innerHTML= "Medium";
        err2=0;
      }
      else if (score >= 25){
        $('#exampleInputPassword').attr('class','form-control form-control-user is-invalid');
          document.getElementById('pas2').innerHTML= "Weak";
          err2=1;
        }
        else  {
          $('#exampleInputPassword').attr('class','form-control form-control-user is-invalid');
            document.getElementById('pas2').innerHTML= "Very Weak";
            err2=1;
          }
checkable();
}
function conpass(){
  var pass=document.getElementById('exampleInputPassword').value;
  var pass2=document.getElementById('exampleRepeatPassword').value;
  if(pass2!=pass)
  {
      $('#exampleRepeatPassword').attr('class','form-control form-control-user is-invalid');
      err3=1;
  }
  else{
    $('#exampleRepeatPassword').attr('class','form-control form-control-user is-valid');
    err3=0;
  }
checkable();
}
function checkable()
{
    if(err2==0&&err3==0){
      document.getElementById('submit1').disabled=false;
    }
    else if(err2==1||err3==1){
      document.getElementById('submit1').disabled=true;
    }
}
</script>
