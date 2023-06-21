<?php 
include('config.php');
include('header_file.php');
session_start();
$responseKey = $_POST['token'];
$remoteip=$_SERVER['REMOTE_ADDR'];
$url="https://www.google.com/recaptcha/api/siteverify?secret=$googleSecretKey&response=$responseKey&remoteip=$remoteip";
$response = curlkpmg($url);
$response=json_decode($response); 
// if($response->success)
if(1)
{
  if(filter_var($_POST["userName"], FILTER_VALIDATE_EMAIL)) 
  {
    $check = $conn->prepare("SELECT * FROM user_master WHERE UserEmailId = ?");
    $check->bind_param("s",$emailcheck);
    $emailcheck = clean($_POST['userName']);
    $check->execute();
    $fetchdata = $check->get_result();

    $getUserData = (object)$fetchdata->fetch_assoc();
    $countCredentials = $fetchdata->num_rows;
    if($countCredentials > 0) 
    {
    	$_SESSION['sessmail'] = $_POST['userName'];
      setcookie('usercheck', '', time() + (86400),true);
      // $fetchSecurity = (object)$conn->query("SELECT * FROM security_settings WHERE AppCode = '{$getUserData->AppCode}'")->fetch_assoc();
      // if($getUserData->IpStatus == 'Yes'){

      //   function curlip($url)
      //   {
      //       $ch = curl_init();
      //       curl_setopt($ch, CURLOPT_URL, $url);
      //       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      //       $data = curl_exec($ch);
      //       curl_close($ch);
      //       return $data;
      //   }
      //   $url="http://api.rest7.com/v1/my_ip.php";
      //   $response = curlip($url);
      //   $ip=str_replace('["','',$response);
      //   $ip=str_replace('"]','',$ip);
      //   if ($_SERVER['HTTP_HOST'] == 'localhost' OR $_SERVER['HTTP_HOST'] == '172.16.5.98') {
      //     $getIp = $ip;
      //   } else {
      //     $getIp = $_SERVER['REMOTE_ADDR'];
      //   }
      //   if(!(in_array($getIp ,explode(",",$fetchSecurity->PublicIP)))){
      //     setcookie('usercheck', '13', time() + (86400),NULL,NULL,NUll,true);
      //     header('Location: login.php');
      //     exit();
      //   } 
      // }
    //   if($getUserData->WDStatus == 'Yes'){
    //     $getday = date("l");
    //     $fetchSecurityDay = $conn->query("SELECT * FROM security_settings WHERE AppCode = '{$getUserData->AppCode}' AND Days = '{$getday}' AND DayType = '1'");
    //     if($fetchSecurityDay->num_rows){
    //       $getSecurity = (object)$fetchSecurityDay->fetch_assoc();
          
    //       if($getUserData->WHStatus == 'Yes'){
    //         $getTime = date("H:i:s");
    //         $getday = date("l");
    //         $fromTime = $getSecurity->FromTime;
    //         $toTime = $getSecurity->ToTime;
    //         if($fromTime < $getTime && $toTime > $getTime) {
    //           echo "success";
    //         } else {
    //           setcookie('usercheck', '15', time() + (86400),NULL,NULL,NUll,true);
    //           header('Location: login.php');
    //           exit();
    //         } 
    //       }

    //     } else {
    //       setcookie('usercheck', '14', time() + (86400),NULL,NULL,NUll,true);
    //       header('Location: login.php');
    //       exit();
    //     }
    //   }
      ?>
        <script type="text/javascript">
          window.location.assign("login_pass.php");
        </script>
      <?php
     	// header('Location: login_pass.php');
     	// exit();
    } 
    else 
    {
      // setcookie('usercheck', '1', time() + (86400),true);
      // header('Location: login.php');
      // exit();
      ?>
    <script type="text/javascript">
        alert('Please Check Your EmailId');
        window.location.assign("login.php");
      </script>
    <?php
    }
  } 
  else 
  {
    // setcookie('usercheck', '1', time() + (86400),true);
    // header('Location: login.php');
    // exit();
    ?>
    <script type="text/javascript">
      alert('Access Denied');
      window.location.assign("login.php");
      </script>
    <?php
  }
}
else
{
  // setcookie('usercheck', '16', time() + (86400),true);
  // header('Location: login.php');
  // exit();
  ?>
    <script type="text/javascript">
      alert('Not a working day');
      window.location.assign("login.php");
        // toastr.success('Not a working day', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        // setTimeout(function()
        // {
        //   window.location.assign("login.php");
        // },1000);
      </script>
    <?php
}
?>