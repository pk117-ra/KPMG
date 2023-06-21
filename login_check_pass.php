<?php 
include('config.php');
include('header_file.php');
session_start();
$responseKey = $_POST['token'];
$remoteip=$_SERVER['REMOTE_ADDR'];
$url="https://www.google.com/recaptcha/api/siteverify?secret=$googleSecretKey&response=$responseKey&remoteip=$remoteip";
$response = curlkpmg($url);
$response=json_decode($response); 
//if($response->success)
if(1)
{
    
if($_POST["password"]!= "" AND filter_var($_SESSION['sessmail'], FILTER_VALIDATE_EMAIL)) 
{
   
  $check = $conn->prepare("SELECT * FROM user_master WHERE UserEmailId = ? AND Password = ?");
  $check->bind_param("ss",$emailcheck,$passcheck);
  $emailcheck = clean($_SESSION['sessmail']);
  $passcheck = clean($_POST['password']);
  $check->execute();
  $fetchdata = $check->get_result();
  if($fetchdata->num_rows > 0)
  {
      
    $rowCredentials = $fetchdata->fetch_assoc();
    $tableId = $rowCredentials['UserTableId'];
    $userId = $rowCredentials['UserId'];
    $firstName = $rowCredentials['UserFirstName'];
    $lastName = $rowCredentials['UserLastName'];
    $email = $rowCredentials['UserEmailId'];
    $mobile = $rowCredentials['UserMobileNumber'];
    $password = $rowCredentials['Password'];
    $appCode = $rowCredentials['AppCode'];
    $designation = $rowCredentials['Designation'];
    $branch = $rowCredentials['BranchId'];
    $adminAccess=$rowCredentials['AccessAdmin'];
    $active = $rowCredentials['Active'];
    $profilePic = $rowCredentials['ProfilePictureLink'];
    $accountsId = $rowCredentials['AccountsId'];
    $passwordUpdatedAt=$rowCredentials['PasswordUpdatedAt'];
    $webAccess = $rowCredentials['AccessWebApp'];
    $groupId = $rowCredentials['GroupId'];
    
    $checkApp = $conn->prepare("SELECT * FROM crm_app_license_master WHERE ApplicationCode=?");
    $checkApp->bind_param("s",$appcheck);
    $appcheck = $appCode;
    $checkApp->execute();
    $fetchdataApp = $checkApp->get_result();
    $rowCompanyDetails = $fetchdataApp->fetch_assoc();
    $companyLogo=$rowCompanyDetails['Logo'];
    $licenseName = $rowCompanyDetails['CompanyName'];
    
    if($active == 'Yes'AND $webAccess=='Yes')
    {
        
      $_SESSION['kpmUserTableIdS'] = $tableId;
      $_SESSION['kpmUserIdS'] = $userId;
      $_SESSION['kpmFirstNameS'] = $firstName;
      $_SESSION['kpmLastNameS'] = $lastName;
      $_SESSION['kpmMobileNumberS'] = $mobile;
      $_SESSION['kpmEmailS'] = $email;
      $_SESSION['kpmCompanyLogo'] = $companyLogo;
      $_SESSION['kpmLicenseName'] = $licenseName;
      $_SESSION['kpmAppCodeS'] = $appCode;
      $_SESSION['kpmDesignationS'] = $designation;
      $_SESSION['kpmBranchS'] = $branch;
      $_SESSION['kpmAdminS'] = $adminAccess;
      $_SESSION['kpmProfileS'] = $profilePic;
      $_SESSION['kpmPasswordS'] = $password;
      $_SESSION['kpmAccountsId'] = $accountsId;
      $_SESSION['kpmGroupIdS'] = $groupId;
      // $_SESSION['tOneTaskMobileNumberS'];

    

      $insertLogDetails = $conn->query("INSERT INTO tone_activity_log(UserId, AppCode, LastLoginDateTime) VALUES ('$userId', '$appCode', NOW())");
      $updateUser = $conn->query("UPDATE user_master SET LastLoginAt = NOW() WHERE UserId ='$userId' AND AppCode = '$appCode'");

      // for AWe want to Generate Pop up Notification ll Today Pre Planned Activities. So set flag for all Preplanned activities are Notified at login Time
            
    //   $currentUser = $_SESSION['tatvaUserIdS'];
    //   $updatePrePlannedActivity = mysqli_query($conn,"UPDATE pre_planned_activity SET NotifiedPop = 'No' WHERE CreatedBy = '$currentUser' AND DATE_FORMAT(PrePlannedActivityTime,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') AND ClientResponseId = '' AND Appcode = '$appCode'");
            //End PopUp Notification

        //     echo "aaaaa";
        //   require_once 'geoip/vendor/autoload.php';
        //   $reader = new GeoIp2\Database\Reader('geoip/maindb/GeoLite2-City.mmdb ');
            
        //   if ($_SERVER['HTTP_HOST'] == 'localhost' OR $_SERVER['HTTP_HOST'] == '172.16.5.98') 
        //   {
        //     $getIp = getpublicip();
        //   } 
        //   else 
        //   {
        //     $getIp = $_SERVER['REMOTE_ADDR'];
        //   }
          
        //   $record = $reader->city($getIp);
        //   $cName = $record->country->name;
        //   $sName = $record->mostSpecificSubdivision->name;
        //   $cityName = $record->city->name;
        //   $latitude = $record->location->latitude;
        //   $longitude = $record->location->longitude;
        //   $getDataClient = getBrowser();
          
        //   $insertloginlog = $conn->query("INSERT INTO user_master_login_log(AppCode, UserId, IpAddress, OS, Browser, Version, City, State, Country, LoginTime, CreatedAt) VALUES ('$appCode','$userId','$getIp','{$getDataClient['platform']}','{$getDataClient['name']}','{$getDataClient['version']}','$cityName','$sName','$cName',NOW(),NOW())");
        //   if($insertloginlog)
        //   {
        //     if($rowCredentials['TwoFactor'] == 'Yes') 
        //     {
            //   header('Location:check_twofactor.php');
            //   exit(); 
        //     } 
        //     else 
        //     {
              //header('Location:dashboard.php');
        //       exit(); 
        //     }
        //   }
          ?>
          <script type="text/javascript">
            window.location.assign("dashboard.php");
          </script>
          <?php
        }
        else
        {
          ?>
          <script type="text/javascript">
            alert('You Have no Permission to Access this site !!!');
            window.location.assign("login_pass.php");
          </script>
          <?php
          // setcookie('usercheck', 'You Have no Permission to Access this site !!!', time() + (86400 * 1),NULL,NULL,NUll,true);
          // header('Location: login_pass.php');
          // exit();
        }
    } 
    else 
    {
      ?>
        <script type="text/javascript">
          alert('Invalid Password !!!');
          window.location.assign("login_pass.php");
        </script>
      <?php
      // setcookie('usercheck', 'Invalid Password !!!', time() + (86400 * 1),NULL,NULL,NUll,true);
      // if($_SESSION['loginCount'] == '')
      // {
      //   $_SESSION['loginCount'] = 0;   
      // }
      // $_SESSION['loginCount'] += 1;
      // header('Location: login_pass.php');
      // exit();
    }
    }
    else
    {
      ?>
        <script type="text/javascript">
          alert('Invalid Password !!!');
          window.location.assign("login_pass.php");
        </script>
      <?php
      // setcookie('usercheck', 'Invalid Password !!!', time() + (86400 * 1),NULL,NULL,NUll,true);
      // if($_SESSION['loginCount'] == '')
      // {
      //   $_SESSION['loginCount'] = 0;   
      // }
      // $_SESSION['loginCount'] += 1;
      // header('Location: login_pass.php');
      // exit();
    }
}
else
{
  ?>
    <script type="text/javascript">
      alert('Invalid Captcha !!!');
      window.location.assign("login_pass.php");
    </script>
  <?php
  // setcookie('usercheck', 'Invalid Captcha !!!', time() + (86400 * 1),NULL,NULL,NUll,true);
  // header('Location: login_pass.php');
  // exit();
}
?>  