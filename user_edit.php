<?php 
//Page Connections
//user_master.php -> user_edit.php -> getcity.php, check_unique_name.php
//API from request_get_update_contact.php ticketing Application live and Local
include("header.php");
include("crmphpfunctions.php");
include("sidebar.php");
$encryptedSno=$_REQUEST['id'];
$forVal = $_REQUEST['forIdVal'];
if($forVal == '')
{
    $forVal = 0;
}
$id = base64_decode(base64_decode(base64_decode($encryptedSno)));
$sqlGetUsers = "SELECT * FROM user_master WHERE UserId = '$id' AND AppCode = '$appCode'";
$conGetUsers = mysqli_query($conn,$sqlGetUsers);
$rowGetUsers = mysqli_fetch_assoc($conGetUsers);
$userTableId = $rowGetUsers['UserTableId'];
$employeeId = $rowGetUsers['EmployeeId'];
$userImage = $rowGetUsers['UserPhoto'];
$createdBy=$rowGetUsers['CreatedBy'];
$createdAt=$rowGetUsers['CreatedAt'];
// $stateCover = explode(",",$rowGetUsers['StateToCover']);
$adminAccess = $rowGetUsers['AccessAdmin'];
$webAccess = $rowGetUsers['AccessWebApp'];
$mobileAccess = $rowGetUsers['AccessMobileApp'];
// $resstdTel = explode('-', $rowGetUsers['ResTelPhone']);
// $resStd = $resstdTel[0];
// $restelphNo = $resstdTel[1];
// $offstdTel = explode('-', $rowGetUsers['OffTelPhone']);
// $offStd = $offstdTel[0];
// $offtelPhNo = $offstdTel[1];
$dob = date("Y-m-d",strtotime($rowGetUsers['DOB']));

// echo $city = $rowGetUsers['City'];
?>
<style type="text/css">
  .utFormDiv
  {
    min-height: 75px;
  }
  .utAcrHed
  {
    border-bottom: 2px solid #c1c1c1;
    padding: 10px;
  }
</style>

<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title"> User Edit</h3>
      </div>
    </div>
    <div class="content-body">
      <section id="basic-form-layouts">
        <div class="card">
          <form method="post" action="" enctype="multipart/form-data">
            <div id="PersonalArea" role="tablist" aria-multiselectable="true">
              <div class="card collapse-icon accordion-icon-rotate left">
                <div id="PersonalAccr"  class="card-header utAcrHed">
                  <a data-toggle="collapse" data-parent="#PersonalArea" href="#PersonalAcc" aria-expanded="false" aria-controls="accordion22" class="card-title lead collapsed" style="color: red; font-weight: bold;">Employee Details</a>
                </div>
                <div id="PersonalAcc" role="tabpanel" aria-labelledby="PersonalAccr" class="card-collapse collapse in" aria-expanded="false"><br>
                  <div class="row">
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Employee Id<span style="color: red; font-size: 14px;"> *</span></label>
                      <div class="col-md-12">
                        <input type="text" id="employeeId" class="form-control" name="employeeId" value="<?php echo $rowGetUsers['EmployeeId'];?>" >
                        <div id="empId" class="hidden">
                          <span style='color:#3f3f3f; font-weight: bold;'> This Employee Id is already Exists !!!</span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">First Name </label>
                      <div class="col-md-12">
                        <input type="text" id="firstName" class="form-control" name="firstName" value="<?php echo $rowGetUsers['UserFirstName'];?>" Required>
                        <div id="firstAlert" class="hidden">
                        <span style='color:brown; font-weight: bold;'>
                          Name already Exists !!!
                        </span>
                      </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Last Name</label>
                      <div class="col-md-12 currentmobile">
                        <input type="text" id="lastName" class="form-control" name="lastName" value="<?php echo $rowGetUsers['UserLastName'];?>">
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Mobile Number<span style="color: red; font-size: 14px;">*</span></label>
                      <div class="col-md-12">
                        <input type="number" id="mobileNumber" colname='UserMobileNumber' tablename='user_master' class="form-control" name="mobileNumber" value="<?php echo $rowGetUsers['UserMobileNumber'];?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;">
                         <div id="mobileNoAlert" class="hidden">
                          <span style='color:brown; font-weight: bold;'>
                            This MobileNo is already Exists !!!!
                          </span>
                        </div>
                      </div>
                    </div>
                    
                   
                  </div>
                </div>
              </div>
            </div>
            <div id="LeadInfoArea" role="tablist" aria-multiselectable="true">
              <div class="card collapse-icon accordion-icon-rotate left">
                <div id="LeadInfoAccr"  class="card-header utAcrHed">
                  <a data-toggle="collapse" data-parent="#LeadInfoArea" href="#LeadInfoAcc" aria-expanded="false" aria-controls="accordion22" class="card-title lead collapsed" style="color: red; font-weight: bold;">Company  Details</a>
                </div>
                <div id="LeadInfoAcc" role="tabpanel" aria-labelledby="LeadInfoAccr" class="card-collapse collapse in" aria-expanded="false"><br>
                  <div class="row">
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Company Email Id</label>
                      <div class="col-md-12">
                        <input type="Mail" id="companyMail" class="form-control" name="companyMail" value="<?php echo $rowGetUsers['UserEmailId'];?>" required>
                        <div id="companyEmailcheck" class="hidden">
                        <span style='color:#3f3f3f; font-weight: bold;'>
                          CompanyEmailId No is already Exists !!
                        </span>
                      </div>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Password</label>
                      <div class="col-md-12">
                        <input type="text" id="password" class="form-control" name="password" value="<?php echo $rowGetUsers['Password'];?>" >
                      </div>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Branch</label>
                      <div class="col-md-12">
                         <select type="text" id="kpmanishLocation" class="form-control select2" name="kpmanishLocation" style="width: 100%">
                            <option value="" selected="">Select</option>
                            <?php
                            $getBranchId =$conn->query("SELECT BranchId,BranchName FROM branch_master WHERE AppCode = '$appCode'");
                            while($branchFetch=mysqli_fetch_assoc($getBranchId))
                            {
                              $branchId = $branchFetch['BranchId'];
                              if($branchId == $rowGetUsers['BranchId'])
                              {
                                ?>
                                  <option value="<?php echo $branchId; ?>" selected><?php echo $branchFetch['BranchName']; ?></option>
                                <?php
                              }
                              else
                              {
                                ?>
                                  <option value="<?php echo $branchId; ?>"><?php echo $branchFetch['BranchName']; ?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Department</label>
                      <div class="col-md-12">
                         <select type="text" id="department" class="form-control select2" name="department" style="width: 100%">
                            <option value="" selected="">Select</option>
                                <?php 
                                  $sqlGetDepartment = "SELECT * FROM department WHERE AppCode = '$appCode' ";
                                  $conGetDepartment = mysqli_query($conn,$sqlGetDepartment);
                                  while($rowGetDepartment = mysqli_fetch_assoc($conGetDepartment))
                                  {
                                    $dId = $rowGetDepartment['DepartmentId'];
                                    $dName = $rowGetDepartment['DepartmentName'];
                                    if($dId == $rowGetUsers['Department'])
                                    {
                                      ?>
                                        <option value="<?php echo $dId;?>" selected><?php echo $dName;?></option>
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                        <option value="<?php echo $dId;?>"><?php echo $dName;?></option>
                                      <?php
                                    }
                                  }
                                ?> 
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Designation</label>
                      <div class="col-md-12">
                         <select type="text" id="designation" class="form-control select2" name="designation" style="width: 100%">
                            <option value="" selected="">Select</option>
                            <?php 
                              $sqlGetDesignation = "SELECT * FROM designation WHERE AppCode = '$appCode' ";
                              $conGetDesignation = mysqli_query($conn,$sqlGetDesignation);
                              while($rowGetDesignation = mysqli_fetch_assoc($conGetDesignation))
                              {
                                $dId = $rowGetDesignation['DesignationId'];
                                $dName = $rowGetDesignation['DesignationName'];
                                if($dId == $rowGetUsers['Designation'])
                                {
                                  ?>
                                    <option value="<?php echo $dId;?>" selected><?php echo $dName;?></option>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                    <option value="<?php echo $dId;?>"><?php echo $dName;?></option>
                                  <?php
                                }
                              }
                            ?>  
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Reporting To </label>
                      <div class="col-md-12">
                         <select type="text" id="reportTo" class="form-control select2" name="reportTo" style="width: 100%">
                            <option value="" selected="">Select</option>
                            <?php 
                              $sqlGetUserName = "SELECT * FROM user_master WHERE AppCode = '$appCode' AND Active = 'Yes' ";
                              $conGetUserName = mysqli_query($conn,$sqlGetUserName);
                              while($rowGetUserName = mysqli_fetch_assoc($conGetUserName))
                              {
                                $uId = $rowGetUserName['UserId'];
                                $uName = $rowGetUserName['UserFirstName'];
                                if($uId == $rowGetUsers['ReportingTo'])
                                {
                                  ?>
                                    <option value="<?php echo $uId;?>" selected><?php echo $uName;?></option>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                    <option value="<?php echo $uId;?>"><?php echo $uName;?></option>
                                  <?php
                                }
                              }
                            ?> 
                          </select>
                      </div>
                    </div>
                    
                    
                    <div class="row">
                      <div class="col-md-4 col-lg-4 col-xl-4"></div>
                      <div class="form-group row col-md-6 col-lg-3 col-xl-3">
                        <label class="col-md label-control" for="userinput1"> Admin Access</label>
                          <div class="col-md">
                              <div class="checkbox">
                                <?php
                                  if($rowGetUsers['AccessAdmin'] == 'Yes')
                                  {
                                    ?>
                                    <input type="radio" value="Yes" name="adminAccess" checked>&nbsp;Yes&nbsp;&nbsp;
                                    <input type="radio" value="No" name="adminAccess">No
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <input type="radio" value="Yes" name="adminAccess">&nbsp;Yes&nbsp;
                                    <input type="radio" value="No" name="adminAccess" checked>&nbsp;No
                                    <?php
                                  }
                                ?>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row col-md-5 col-lg-2 col-xl-2">
                        <label class="col-md label-control" for="userinput1"> Resigned</label>
                          <div class="col-md">
                              <div class="checkbox ">
                                <?php
                                  if($rowGetUsers['Resigned'] == 'Yes')
                                  {
                                    ?>
                                    <input type="radio" value="Yes" name="resigned" checked>&nbsp;Yes&nbsp;&nbsp;
                                    <input type="radio" value="No" name="resigned">No
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <input type="radio" value="Yes" name="resigned">&nbsp;Yes&nbsp;
                                    <input type="radio" value="No" name="resigned" checked>&nbsp;No
                                    <?php
                                  }
                                ?>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              
              <div class="col-md-12" style="margin-bottom: 20px;">
                <center>
                  <a class="btnsizeupdate" style = "font-size: 35px; color: #FFAA1D;"  href= "user_master.php" data-toggle="tooltip" title="Back"><i class="fa fa-chevron-circle-left"></i></a>&nbsp;&nbsp;&nbsp;
                  <button id="submit" type="submit" name="submit" value="submit" style = "font-size: 35px; background-color: #fff; border: 2px solid #fff; color: #6f42c1;cursor: pointer;" data-toggle="tooltip" title="Save"><i class="fa fa-check-circle"></i></button>
                </center>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
</div>
<?php 
include("footer.php");
?>
<?php
if(isset($_POST['submit']))
{
  $employeeId=$_POST['employeeId'];
  $employeeSAPCode = $_POST['employeeSAPCode'];
  $firstname = $_POST['firstName'];
  $middleName=$_POST['middleNmae'];
  $lastName = $_POST['lastName'];
  $sex=$_POST['sex'];
  $dob=$_POST['dob'];
  $bloodGroup=$_POST['bloodGroup'];
  $streetName2=$_POST['streetName2'];
  $area=$_POST['area'];
  $state = $_POST['state'];
  $country=$_POST['country'];
  $pincode=$_POST['pincode'];
  $city=$_POST['city'];
  $kpmanishLocation=$_POST['kpmanishLocation'];
  $residenceTele=$_POST['residenceTele'];
  $officeTele=$_POST['officeTele'];
  $mobileNumber = $_POST['mobileNumber'];
  $aadharNumber=$_POST['aadharNumber'];
  $passportNumber=$_POST['passportNumber'];
  $drivingLicNumber=$_POST['drivingLicNumber'];
  $companyMail=$_POST['companyMail'];
  $password = $_POST['password'];
  $personalMail = $_POST['personalMail'];
  $jobZone = $_POST['jobZone'];
  $education = $_POST['education'];
  $grade = $_POST['grade'];
  $department = $_POST['department'];
  $designation = $_POST['designation'];
  $reportTo=$_POST['reportTo'];
  $activeFrom=$_POST['activeFrom'];
  // $drivingLicenseFor = implode(',', $_POST['drivingLicFor']);
  // $principalHandle=implode(",",$_POST['principalHandle']);
  // $productHandle=implode(",",$_POST['productHandle']);
  // $areaCover=implode(",",$_POST['areaCover']);
  // $stateCover=implode(",",$_POST['stateCover']);  
  // $segmentInvolved=implode(",",$_POST['segmentInvolved']);
  // $traingForPrincipal=implode(",",$_POST['traingForPrincipal']);
  // $traingDoneForPrincipal = implode(",",$_POST['traingDoneForPrincipal']);
  // $traingForProduct=implode(",",$_POST['traingForProduct']);
  // $traingDoneForProduct = implode(",",$_POST['traingDoneForProduct']);
  // $languageKnown=implode(",",$_POST['languageKnown']);
  $drivingLicFor='';
  $principalHandle = '';
  $productHandle = '';
  $areaCover = '';
  $stateCover = '';
  $citytocover = '';  
  $segmentInvolved = '';
  $traingForPrincipal = '';
  $traingDoneForPrincipal = '';
  $traingForProduct = '';
  $traingDoneForProduct = '';
  $languageKnown = '';
  $webAccess = $_POST['webAccess'];
  $mobileAccess = $_POST['mobileAccess'];
  $adminAccess = $_POST['adminAccess'];
  $resigned = $_POST['resigned'];
  $usergroup =$_POST['usergroup'];
  // $name = $_FILES['ImageUpload']['name'];
  // if($name != '')
  // {
  //   $extension = pathinfo($name);
  //   $fileName="ProfilePictures/".$extension['filename'].date('Y-m-d-H-i-s').$userId.".".$extension['extension'];
  //   $moviefile1 = imageCompression($_FILES['ImageUpload']['tmp_name'], $fileName, 20);
  // }
  // else
  // {
  //   $query = $conn->query("SELECT UserPhoto FROM user_master where UserId = '$id' AND AppCode = '$appCode' ")->fetch_assoc();
  //   $moviefile1 = $query['UserPhoto'];
  // }
  if($resigned == 'Yes')
  {
    $updateActiveVal = $conn->query("UPDATE user_master SET Active = 'No',AccessWebApp='No',AccessMobileApp='No',Resigned = 'Yes' WHERE UserId ='$id' AND AppCode = '$appCode'");
  }
  $sqlUpdateUser = "UPDATE user_master SET EmployeeId = '$employeeId',EmployeeId1 = '$employeeSAPCode', UserPhoto = '$moviefile1', UserFirstName = '$firstname', UserMiddleName = '$middleName', UserLastName = '$lastName', Sex = '$sex', DOB = '$dob', BloodGroup = '$bloodGroup', StreetName = '$streetName2', Area = '$area', State = '$state', City = '$city', Country = '$country', Pincode = '$pincode', BranchId = '$kpmanishLocation', ResTelPhone = '$residenceTele', OffTelPhone = '$officeTele', UserMobileNumber = '$mobileNumber',AadharNumber = '$aadharNumber', PassportNo = '$passportNumber',DrivingLiscenceNo = '$drivingLicNumber', PersonalEmailId = '$personalMail', UserEmailId = '$companyMail', Password = '$password', JobZone = '$jobZone', Education = '$education', Grade = '$grade', Department = '$department', Designation = '$designation', ReportingTo = '$reportTo', ActiveFrom = '$activeFrom', PrincipalToHandle = '$principalHandle', ProductToHandle = '$productHandle', AreaToCover = '$areaCover', CityToCover = '$cityCover', StateToCover = '$stateCover', SegmentInvolvedId = '$segmentInvolved', TrainingPrinciple = '$traingForPrincipal',TrainingDonePrinciple = '$traingDoneForPrincipal',TrainingProduct = '$traingForProduct',TrainingDoneProduct = '$traingDoneForProduct',LanguageKnown = '$languageKnown',UpdatedBy = '$userId',UpdatedAt = Now(),DrivingLiscenceFor='$drivingLicenseFor',GroupId = '$usergroup' WHERE UserId = '$id' AND AppCode = '$appCode'";
  $conUpdateUser = mysqli_query($conn, $sqlUpdateUser);
  if($conUpdateUser)
  {
    $sqlUserlog = "INSERT INTO `user_master_log`(UserTableId, AppCode, UserId,EmployeeId,EmployeeId1,UserPhoto,UserFirstName,UserMiddleName, UserLastName,Sex,DOB,BloodGroup,StreetName,Area,State,Country,Pincode,City,Location,ResTelPhone,OffTelPhone,UserMobileNumber,AadharNumber,PassportNo,DrivingLiscenceNo,PersonalEmailId,UserEmailId,Password,JobZone,Education,Grade,Department,Designation,Strength, Weakness, ReportingTo,ActiveFrom,PrincipalToHandle,ProductToHandle,AreaToCover,CityToCover,StateToCover,SegmentInvolvedId,TrainingPrinciple,TrainingDonePrinciple,TrainingProduct,TrainingDoneProduct,LanguageKnown,CreatedBy, CreatedAt, UpdatedBy, UpdatedAt,RecordId,GroupId)VALUES('$userTableId','$appCode', '$id', '$employeeId','$employeeSAPCode', '$d','$name','$middleName','$lastName','$sex','$dob','$bloodGroup','$streetName2','$area','$state','$country','$pincode','$city','$kpmanishLocation','$residenceTele','$officeTele','$mobileNumber','$adharNumber','$passportNumber','$drivingLicNumber','$personalMail','$companyMail','$password','$jobZone',  '$education', '$grade', '$department', '$designation', '$strength','$weakness','$reportTo','$activeFrom','$principalHandle','$productHandle','$areaCover','$cityCover','$stateCover','$segmentInvolved','$traingForPrincipal','$traingDoneForPrincipal','$traingForProduct','$traingDoneForProduct','$languageKnown','$userId', NOW(), '$userId', NOW(), '$recordId','$usergroup')";
    $conUserlog = mysqli_query($conn, $sqlUserlog);

    $desQuery1 = $conn->query("SELECT * FROM designation WHERE DesignationId = '$designation' ");
    $fetchdes1 = $desQuery1->fetch_assoc();
    $desigName = $fetchdes1['DesignationName'];
      
  }
    ?>
      <script type="text/javascript">
        var for1 = '<?php echo $forVal;?>';
        toastr.success('User Updated Successfully', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
           //alert(for1);
          if(for1 == 1)
          {
            window.location.assign("user_master.php");
          }
          else
          {
            window.location.assign("user_master.php");
          }
        },1000);
      </script>
    <?php
}
?>
<script type="text/javascript">
$("#password").change(function(){
  //alert("hiiiii");
  $(this).attr('type', 'password');
});
</script>
<script type="text/javascript">
  $("#mobileNumber").keyup(function () {
        var mobilenumber = $(this).val();
        $.ajax({
            type: "POST",
            url: "check_unique_name.php",
            data: { 'columnName':'UserMobileNumber', 'value' : mobilenumber, 'tableName' : 'user_master' },
            success : function(data) 
            {
              if(data!="No")
              {

                $("#mobileNoAlert").removeClass("hidden");
                $("#check").addClass("hidden");
                $("#submit").addClass("hidden").attr("disabled","disabled");
              }
              else
              {
                $("#mobileNoAlert").addClass("hidden");
                $("#check").removeClass("hidden");
                $("#submit").removeClass("hidden").removeAttr("disabled");
              }
            }
        });return false;
    });
</script>
<script type="text/javascript">

</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'dd/mm/yy'
    });
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'dd/mm/yy'
    });
  } );
  </script>