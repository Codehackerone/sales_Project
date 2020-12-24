<!DOCTYPE html>
<html lang="en">
<script src="sweetalert2.js"></script>
<link
    rel="stylesheet"
    href="animate.css"
  />
<head>
<script>var err1,err2,err3,err4,err5,err6;</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body >

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="register.svg" id="img1"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <center>
                <h1 class="h4 text-gray-900 mb-4 animate__animated animate__tada">Create an Account!</h1>
                <span class="h4 text-gray-900 mb-4 animate__animated animate__fadeInUp">It's Free.</span>
                <span class="h4 text-gray-900 mb-4 animate__animated animate__fadeInUp">It's Safe</span>
              </center>
              <br>
              <form  action="registernew.php" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="fname" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lname" required>
                  </div>
                </div>
                <div class="form-group">
                <div class="input-group ">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control form-control-user " placeholder="Username" required name="username" id="username-ex"
                aria-label="Username" aria-describedby="basic-addon1" onkeyup="checkuser();">
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Sorry! Username already taken
                </div>
                </div>
              </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user " id="exampleInputEmail" placeholder="Email Address"name="email"
                  onkeyup="valmail();"required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Sorry! Enter a valid Email Address!
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" id="exampleInputPh" placeholder="Phone Number" name="phno"required
                  onkeyup="phonenumber();">
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Sorry! Enter a valid Phone Number!
                  </div>
                </div>
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
                <?php
                $otp=rand(111111,999999);
                ?>
                <input type="hidden" name="otp" value="<?=$otp?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user " id="exampleInputadmin"
                  placeholder="Admin number" name="adminno" onclick="display()">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" onclick="checktc();">
                    <label class="custom-control-label " for="customCheck">I accept to the <a data-toggle="modal"
                      data-target="#tc" href="">Terms and Conditions</a></label>
                  </div>
                </div>
                <hr>
                <div class="text-right">
                  <a class="small" href="forgotpass2.php">Forgot Password?</a>
                </div>
                <div class="text-right">
                  <a class="small" href="loginnew.php">Already have an account? Login!</a>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block" id="submit" disabled>
                  Register Account
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<div id="txtHint"></div>
<div class="modal fade" id="tc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <strong>By checking Terms and Conditions,</strong>
        <ol>
          <li>You accept that we can send any number of mails to your email adress.</li>
          <li>We will not share your personal information with any third-party applications.
          <ul>
            <li><a href="https://sweetalert2.github.io/" target="_blank">Sweet alert 2</a></li>
            <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap v4.5</a></li>
            <li><a href="https://animate.style/" target="_blank">Animate.css</a></li>
          </ul>
          </li>
          <li>This website uses various third-party applications</li>
          <li>This software uses license
            <br><center><strong>LICENSE</strong></center><br>
            The MIT License (MIT)<br>

Copyright (c) 2020 Soumyajit Datta & Smarajit Datta<br>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

          </li>
        </ol>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok,I understand</button>
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
  font-size:1.05rem;
}
#img1{
  width:390px;
  height:710px;
}
</style>
<script>
function checktc()
{
  if(document.getElementById('customCheck').checked)
  {
  err6=0;
}
else {
  err6=1;
  Swal.fire({
  title:'Please accept the T&Cs',
  text:'Please check the T&Cs checkbox',
  icon:'error',
  confirmButtonText:'Ok,Got it.'
})
}
  checkable();
}
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
function valmail()
{
  var email=document.getElementById('exampleInputEmail').value;
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(mailformat))
    {
        $('#exampleInputEmail').attr('class','form-control form-control-user is-valid');
        err1=0;
    }
    else
    {
        $('#exampleInputEmail').attr('class','form-control form-control-user is-invalid');
        err1=1;
    }
checkable();
}
function checkpass() {
    var pass=document.getElementById('exampleInputPassword').value;
    var pass3=document.getElementById('exampleRepeatPassword').value;
    if(!pass3=="")
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
function checkuser()
{
  var usern=document.getElementById('username-ex').value;
  showCustomer(usern);
  checkable();
}
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
      var ans=document.getElementById('numrow').value;
      if(ans=="yes")
      {
        $('#username-ex').attr('class','form-control form-control-user is-invalid');
        err4=1;
      }
      else if(ans=="no"){
        $('#username-ex').attr('class','form-control form-control-user is-valid');
        err4=0;
      }
    checkable();
    }
  };
  xhttp.open("GET", "checkusername.php?q="+str, true);
  xhttp.send();
  checkable();
}
function phonenumber()
{
  var phn=document.getElementById('exampleInputPh').value;
  var phoneno = /^\d{10}$/;
  if((phn.match(phoneno)))
        {
          $('#exampleInputPh').attr('class','form-control form-control-user is-valid');
          err5=0;
        }
      else
        {
          $('#exampleInputPh').attr('class','form-control form-control-user is-invalid');
          err5=1;
        }
        checkable();
}
function checkable()
{
    if(err1==0&&err2==0&&err3==0&&err4==0&&err5==0&&err6==0){
      document.getElementById('submit').disabled=false;
    }
    else if(err1==1||err2==1||err3==1||err4==1||err5==1||err6==1){
      document.getElementById('submit').disabled=true;
    }
}
function display()
{
  Swal.fire({
  title:'Admin Number',
  text:'Put the admin/manager code if you are manager, otherwise leave it blank',
  icon:'info',
  confirmButtonText:'Ok,Got it.'
})
}
</script>
