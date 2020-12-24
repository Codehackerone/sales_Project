<?php
include_once('PROJECT_CONFIG/config.php');
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $pass=$_POST['pass'];
    $otp=$_POST['otp'];
    $adminno=$_POST['adminno'];
    $photo="avatar.svg";
    if($adminno=="B843579")
    {
      $manager=1;
      $mailid=$username."admin@salesmanager.com";
    }
    else{
      $manager=0;
      $mailid=$username."@salesmanager.com";
    }
    $stmt=$conn->prepare("INSERT INTO login (fname,lname,username,email,contact,password,manager,photo,mailid) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssisiss",$fname,$lname,$username,$email,$phno,$pass,$manager,$photo,$mailid);
    $stmt->execute();
    /*$to = $email;
    $subject = "OTP VERIFICATION";
    $message = "
    <html>
    <body>
    <center>
    <strong>Please Enter the OTP in the website</strong><br>
    Your OTP is <br>
    <button>$otp</button> <br>
    </center>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <no-reply@soumyajitdattanow.xyz>' . "\r\n";
    mail($to,$subject,$message,$headers);*/

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Verify Otp</title>

      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body >

      <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block "><img src="register.svg" id="img1"></div>
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Verify Otp!</h1>
                  </div>
                  <form action="loginnew.php">
                    <br><br>
                    <div class="text-center">
                      <h2>Enter the OTP sent to email</h2>
                      <h3><strong><?php echo($email); ?></strong></h2>
                    </div>
                    <input type="hidden" id="otpac" value="<?=$otp?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control" id="otp" placeholder="One Time Password"
                        value="<?=$otp?>" onkeyup="myKey()">
                        <div class="valid-feedback">
                          OTPs Match!
                        </div>
                        <div class="invalid-feedback">
                          Sorry! OTPs don't Match!
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user btn-block" id="submit" disabled>
                        Complete Registration
                        </button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

    </body>

    </html>
    <style>
    *{
      font-family: 'Raleway', sans-serif !important;
      font-size:1.1rem;
    }
    #img1{
      width:390px;
      height:710px;
    }
    </style>
    <script>
    function myKey()
    {
        otp1=document.getElementById('otpac').value;
        otp2=document.getElementById('otp').value;
        if(otp1==otp2)
        {
          $('#otp').attr('class','form-control form-control is-valid');
          document.getElementById('submit').disabled=false;
        }
        else{
          $('#otp').attr('class','form-control form-control is-invalid');
          document.getElementById('submit').disabled=true;
        }
    }
    </script>
