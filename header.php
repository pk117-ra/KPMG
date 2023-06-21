<?php
include('config.php');
//include ('header_file.php');
  $nowYear = date("Y");
  session_start();
  $userId=$_SESSION['kpmUserIdS'];
  // $userId=1;

  if($userId=='')
  {
    ?>
    <script type="text/javascript">
      window.location.assign('login.php');
    </script>
    <?php
  }

  $urlpageName = $_SERVER['PHP_SELF'];
  $appcuruserId= $_SESSION['kpmUserIdS'];
  $appcuruserName= $_SESSION['kpmFirstNameS'];
  $acode = $_SESSION['kpmAppCodeS'];

  $checkactivedata = $conn->query("INSERT INTO active_user_urls(UserId, UserName, CurUrl, CreatedAt,AppCode) VALUES ('$appcuruserId', '$appcuruserName', '$urlpageName', NOW(),'$acode')");
  if ($checkactivedata) 
  {
    $_SESSION['mkdata'] = $conn->insert_id;
  }

  error_reporting(E_ERROR | E_PARSE);
  if($_SESSION['kpmUserIdS'] == '')
  {
    $_SESSION['kpmUserIdS'] = $_REQUEST['userId'];
  }
  if($_SESSION['kpmAppCodeS'] == '')
  {
    $_SESSION['kpmAppCodeS'] = $_REQUEST['appCode'];
  }
  $tableId = $_SESSION['kpmUserTableIdS'];
  $firstName=$_SESSION['kpmFirstNameS'];
  $lastName=$_SESSION['kpmLastNameS'];
  $mobile=$_SESSION['kpmMobileNumberS'];
  $licenseName = $_SESSION['kpmLicenseName'];
  $email=$_SESSION['kpmEmailS'];
  $appCode=$_SESSION['kpmAppCodeS'];
  $designation=$_SESSION['kpmDesignationS'];
  $branch=$_SESSION['kpmBranchS'];
  $adminAccess=$_SESSION['kpmAdminS'];
  $profilePicture = $_SESSION['kpmProfileS'];
  $orgCount = $_SESSION['kpmOrgCount'];
  $accountsId = $_SESSION['kpmAccountsId'];
  $groupId = $_SESSION['kpmGroupIdS'];
  $billingBranchIdArr = "1,2,3";
  ?>
  <script type="text/javascript">
    // alert("<?php echo $appCode; ?>");
  </script>
  <?php
  // $query = $conn->query("SELECT Region from branch_master Where BranchId = '$branch'");
  // $fetch= $query->fetch_assoc();
  // $userRegion = $fetch['Region'];
  // $devAccess = $_SESSION['kpmDevAccess'];
  
  if($profilePicture == "")
  {
    $profilePicture2 = "ProfilePictures/clientPPic11.png";
  }
  else
  {
    $profilePicture2 = "ProfilePictures/".$profilePicture;
  } 
  $comapanyLogo=$_SESSION['kpmCompanyLogo'];
  if($comapanyLogo=='')
  {
    $comapanyLogo="treeone-app.png";
  }
  // for Module master
  $stageArray = array(
  array( "key"=>"distributor","value"=>"Distributor"),
  array("key"=>"outlet","value"=>"Outlets"),
);
  //for standards master
  $standardArray = array(
  array( "key"=>"USP","value"=>"USP"),
  array("key"=>"BP","value"=>"BP"),
  array("key"=>"FCC","value"=>"FCC"),
);

  // for priceChangePeriod master
$pricechanPeriodArray = array(
  array( "key"=>"1","value"=>"Daily"),
  array("key"=>"2","value"=>"Weekly"),
  array("key"=>"3","value"=>"Monthly"),
  array("key"=>"4","value"=>"Quarterly"),
  array("key"=>"5","value"=>"Annually"),
);
 
//for sales pattern 
$salesPatternArray = array(
  array( "key"=>"1","value"=>"high selling-Large Buyers"),
  array("key"=>"2","value"=>"Good selling-Good Buyers"),
  array("key"=>"3","value"=>"Selling-Limited Buyers"),
  array("key"=>"4","value"=>"On Demand-Specific Buyers"),
  array("key"=>"5","value"=>"Selling-Limited Buyers"),
  array("key"=>"6","value"=>"New Launch"),
);

//%change
$changeArray = array(
  array( "key"=>"1","value"=>"Upward"),
  array("key"=>"2","value"=>"Stable"),
  array("key"=>"3","value"=>"Downward"),
);
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="UPR CRM">
    <meta name="keywords" content="UPR CRM">
    <meta name="author" content="UPR">
    <title>UPR CRM</title>
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/calendars/fullcalendar.css">
    <link rel="apple-touch-icon" href="assets/Logo.ico">
    <link rel="shortcut icon" type="image/x-icon" href="assets/Logo.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/unslider.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <!-- <link rel="stylesheet" type="text/css" href="app-assets/css/blue.css"> -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/blue.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
    <!-- END Custom CSS-->
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/dataTables.colVis.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
    <!-- SELECT TO -->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <!-- Weather icons -->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
    <!-- Chart CSS -->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
    <!-- SimpleLineIcon CSS -->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <!-- TimeLine CSS -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/timeline.css">
    <!-- Users CSS -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/mugund.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/kpm.css">
    <!-- <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert.css"> -->
    <!-- <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script> -->
   
    <!-- CROPPIE CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="app-assets/css/croppie.css"> -->
    <!--font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- BEGIN VENDOR JS-->
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
    <!-- BEGIN PAGE VENDOR JS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/raty/jquery.raty.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert.css">
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    
<style type="text/css">
  body.vertical-layout.vertical-menu.menu-expanded .main-menu {
    width: 17%;
    transition: 300ms ease all;
    background-color: #137a8a;
  }
  .ui-dialog > .ui-widget-header {background: #e5292c;}
  .ui-dialog > .ui-widget-header {border: 1px solid #e5292c;}
  .ui-dialog > .ui-widget-header {color: #000;}
  .ui-dialog {background: #000;
    font-color: #e5292c;
  }
  .ui-dialog p{
    text-indent: 30px;
    color: #e5292c;
  }
  .ui-dialog h4{
    color: #e5292c;
  }
  .select2
  {
    width:100%;
  }
  
  @media screen and (max-width: 425px) 
  {
    .mob-response
    {
      display: none;
    }
    .navbar-header
    {
      background: #f5f7fa;
    }
    .content-header-title
    {
      margin-top: 5%;
    }
  }
  .modal.fade:not(.in).right .modal-dialog {
  -webkit-transform: translate3d(25%, 0, 0);
  transform: translate3d(25%, 0, 0);
}
#chatModel
{
  width: 50%;
  right: 0px;
  left: 50%;
  bottom: 0%;
  padding-right: 0!important
}

.close
{
  color: #fff;
  opacity: 1.2!important;
}
@media (min-width: 544px)
{
  .mo 
  {
    max-width:100%!important;
  }
}
@media (max-width: 544px){
  
  #chatModel {
    width: 100%;
    right: 0px;
    left: 0%;
    bottom: 0%;
    padding-right: 0!important;
}
}
</style>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div id="chatModel" class="modal fade right" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog mo modal-dialog-scrollable" style="margin: 0!important">
    <div class="modal-content" id="appendChat">
    </div>
  </div>
</div>