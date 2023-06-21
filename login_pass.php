<?php 
  include 'config.php';
  include 'header_file.php';
  session_start();
  // $getname = clean($_COOKIE['usercheck']);
  // // $getcapt = clean($_COOKIE['capt']);
  // setcookie('usercheck', 'done', time() + (86400 * 1),true);
  $date=date('Y');
  if($_SESSION['sessmail'] == ''){
    header("location:login.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UPR CRM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="assets/Logo.ico">
  <link rel="shortcut icon" type="image/x-icon" href="assets/Logo.ico">
  <link rel="stylesheet" href="login-assets/css/bootstrap.min.css">
  <script src="https://www.google.com/recaptcha/api.js?render=<?= $googleSiteKey; ?>"></script>
</head>
<body>
<style type="text/css">
  body
  {
    background: rgb(255,255,255);
  }
  .text-line
  {
    background-color: transparent;
    color: #0e0e0e;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #eeeeee 1px;
    padding: 3px 10px;
  }
  .p-2 
  {
    padding: 0rem 0rem !important;
  }
</style>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">
                <div class=" col-md-12" style="opacity:.94;">
                    <div class="row">
                        <div class="col-md-3 mr-1">
                            <div class="col-md-2"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-9 mr-2">
                                  <div class="container box-shadow-4 p-10" style="background: #fff;border-radius: 15px;position: relative;top: 230px;height: 300px; -webkit-box-shadow: 0px 0px 27px 10px rgba(36,20,36,1); -moz-box-shadow: 0px 0px 27px 10px rgba(36,20,36,1); box-shadow: 0px 0px 27px 10px rgba(36,20,36,0.6);">
                                    <div class="col-md-12">
                                      <center>
                                        <img src="assets/images/Logo.jpg" style="width: 120px; position: relative;top:10px;" alt="branding logo">
                                      </center>
                                    </div><br>
                                    <div class="col-md-12" style="">
                                      <div class="card-block">
                                        <form method="post" id="loginformsubmit" action="login_check_pass.php" autocomplete="off" style="text-align: center !important;">
                                          <div class="form-group">
                                            <input style="top: 40px;border-bottom: 1px solid  #000" type="password" class="text-line mt-3" id="password" name="password" placeholder="Enter Password">
                                            <input type="hidden" name="token" id="token">
                                          </div>
                                          <center>
                                            <!-- <button style="position: relative;top: 50px;background-color:#137a8a;color:#fff; border-radius:12px;" type="submit" name="loginsubmit" id="loginsubmit" class="btn" style=""> <span style="font-size:16px;">LOGIN</span>
                                            </button> -->
                                            <button style="position: relative; background-color:#137a8a;color:#fff; border-radius:15px;" type="submit" name="loginsubmit" id="loginsubmit" class="btn" style=""> <span style="font-size:18px;">LOGIN</span>
                                            </button>
                                          </center>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html>
<script type="text/javascript">
  grecaptcha.ready(function() {
  grecaptcha.execute('<?= $googleSiteKey ?>', {action: 'homepage'}).then(function(token) {
    // console.log(token)
    $("#token").val(token);
    });
  });
</script>
