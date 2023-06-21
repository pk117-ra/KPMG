<?php 
include 'config.php';
include 'header_file.php';
session_start();
session_destroy();
$getname = clean($_COOKIE['usercheck']);
setcookie('usercheck', '', time() + (86400 * 1),NULL,NULL,NUll,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KP Manish</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="login-assets/css/bootstrap.min.css">
  <script src="https://www.google.com/recaptcha/api.js?render=6LcfPbgUAAAAAMg6O7mdwVTY-hjDZ126O2rJfy9b"></script>
</head>
<body>
<style type="text/css">
.text-line
  {
    background-color: transparent;
    color: #000000;
    outline: none;
    outline-style: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid #d1d1d1 1px;
    padding: 3px 10px;
    width:300px !important;
  }
  .app-content
{
    position: relative !important;
    top:0px !important;
    left :20px !important;
}
</style>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page" style="background-image: url('app-assets/kpbackground.png'); background-size: cover;">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row"></div>
      <div class="content-body">
        <section class="flexbox-container" style="padding-top: 200px;">
          <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0" style="border-radius: 35px;">
            <div class="card-block">
              <div class="container box-shadow-4 p-10" style="background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(156,255,215,1) 100%);border-radius: 15px;position: relative;top: 70px; white-space: 12px;height: 200px;">
                <div class="col-md-12">
                  <center>
                    <img src="app-assets/kpmanishlogo.png" style="width: 150px; position: relative;bottom:110px;" alt="branding logo">
                  </center>
                </div>
                <div class="col-md-12" style="">
                  
                    <form method="post" id="loginformsubmit" action="login_check_username.php" autocomplete="off" style="text-align: center !important;">
                      <div class="form-group">
                          <input style="border-bottom: 1px solid  #000" type="text" class="text-line" id="userName" name="userName" placeholder="Enter User Name">
                          <input type="hidden" name="token" id="token">
                      </div>
                      <center>
                        <button  type="submit" name="loginsubmit" id="loginsubmit" class="btn" style="background-color:#4ead6e;);color:#fff; border-radius:15px;height: 30px;"> <span style="position: relative;bottom: 8px;">Sign In</span>
                        </button>
                      </center>
                    </form>
                  </div>
                </div>
              </div>

            
          </div>
            
        </section>
      </div>
    </div>
  </div>
<!-- <div  class="col-md-12">
  <div class="row">
    <div class=" col-md-6">
    </div>
    <div align="center" class=" col-md-6" style="background: #6e448a"><label style="font-size: 12px;color: #fff">&copy; copyrights owned by Tabtree Solutions</label></div>
  </div>
</div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html>
<?php 
  if($getname == '1'){
    ?>
    <script type="text/javascript">swal("Please Check Your EmailId")</script>
    <?php
  } elseif($getname == '13') {
    ?>
    <script type="text/javascript">swal("Access Denied")</script>
    <?php
  } elseif($getname == '14') {
    ?>
    <script type="text/javascript">swal("not a working day")</script>
    <?php
  } elseif($getname == '15') {
    ?>
    <script type="text/javascript">swal("not a working time")</script>
    <?php
  }
 ?>
<script>
  grecaptcha.ready(function()
  {
    grecaptcha.execute('6LcfPbgUAAAAAMg6O7mdwVTY-hjDZ126O2rJfy9b', {action: 'homepage'}).then(function(token)
    {
      // console.log(token)
      $("#token").val(token);
    });
  });
</script>