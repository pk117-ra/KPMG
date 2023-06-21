<?php 
//Page Connections
//user_master.php -> user_add.php -> getcity.php, check_unique_name.php
//API to request_get_add_contact.php ticketing Application live
include("header.php");
include("crmphpfunctions.php");
include("sidebar.php");
$eIdE = $_REQUEST['eId'];
$recordId = base64_decode($eIdE);
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
        <h3 class="content-header-title"> User Add</h3>
      </div>
    </div>
    <div class="content-body">
      <section id="basic-form-layouts">
        <div class="card">
          <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
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
                        <input type="text" id="employeeId" class="form-control" name="employeeId" placeholder="Enter Employee Id" required>
                        <div id="empId" class="hidden">
                          <span style='color:brown; font-weight: bold;'>
                            Sorry This Employee Id is already Exists !!!
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">First Name <span style="color: red; font-size: 14px;">*</span></label>
                      <div class="col-md-12">
                        <input type="text" id="firstName" class="form-control" name="firstName" placeholder="Enter First Name" Required>
                      </div>
                      <div id="firstAlert" class="hidden">
                        <span style='color:brown; font-weight: bold;'>
                          Name already Exists !!!
                        </span>
                      </div>
                    </div>
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Last Name</label>
                      <div class="col-md-12 currentmobile">
                        <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Enter Last Name">
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Mobile Number<span style="color: red; font-size: 14px;">*</span></label>
                      <div class="col-md-12">
                        <input type="text" id="mobileNumber" colname='UserMobileNumber' tablename='user_master' class="form-control" name="mobileNumber" placeholder="Enter Mobile No" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;">
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
                  <a data-toggle="collapse" data-parent="#LeadInfoArea" href="#LeadInfoAcc" aria-expanded="false" aria-controls="accordion22" class="card-title lead collapsed" style="color: red; font-weight: bold;">Company  Details<span style="color: red; font-size: 14px;">*</span></a>
                </div>
                <div id="LeadInfoAcc" role="tabpanel" aria-labelledby="LeadInfoAccr" class="card-collapse collapse in" aria-expanded="false"><br>
                  <div class="row">
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Company Email Id<span style="color: red; font-size: 14px;">*</span></label>
                      <div class="col-md-12">
                        <input type="email" id="companyMail" class="form-control" name="companyMail" placeholder="Enter Your Company Email Id" required>
                      </div>
                      <div id="companyEmailcheck" class="hidden">
                        <span style='color:#3f3f3f; font-weight: bold;'>
                          CompanyEmailId No is already Exists !!
                        </span>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-xl-3 utFormDiv">
                      <label class="col-md label-control" for="userinput1">Password</label>
                      <div class="col-md-12">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter Your Password" required>
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
                              ?>
                              <option value="<?php echo $branchId; ?>"><?php echo $branchFetch['BranchName']; ?></option>
                              <?php
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
                                    ?>
                                    <option value="<?php echo $dId;?>"><?php echo $dName;?></option>
                                    <?php
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
                                    ?>
                                    <option value="<?php echo $dId;?>"><?php echo $dName;?></option>
                                    <?php
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
                                    ?>
                                    <option value="<?php echo $uId;?>"><?php echo $uName;?></option>
                                    <?php
                                  }
                                ?> 
                          </select>
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
  $employeeId = $_POST['employeeId'];
  $employeeSAPCode = $_POST['employeeSAPCode'];
  $name = $_POST['firstName'];
  $middleName=$_POST['middleName'];
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
  $resStd = $_POST['resstdcode'];
  $residenceTeleNo= $_POST['resstelephn'];
  $residenceTele = $resStd.'-'.$residenceTeleNo;
  $offcStd = $_POST['offstdcode'];
  $officeTeleNo=$_POST['telephnno'];
  $officeTele = $offcStd.'-'.$officeTeleNo;
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
  // $drivingLicFor=implode(',', $_POST['drivingLicFor']);
  // $principalHandle = implode(",",$_POST['principalHandle']);
  // $productHandle = implode(",",$_POST['productHandle']);
  // $areaCover = implode(",",$_POST['areaCover']);
  // $stateCover = implode(",",$_POST['stateCover']);
  // $citytocover = implode(",",$_POST['cityCover']);  
  // $segmentInvolved = implode(",",$_POST['segmentInvolved']);
  // $traingForPrincipal = implode(",",$_POST['traingForPrincipal']);
  // $traingDoneForPrincipal = implode(",",$_POST['traingDoneForPrincipal']);
  // $traingForProduct = implode(",",$_POST['traingForProduct']);
  // $traingDoneForProduct = implode(",",$_POST['traingDoneForProduct']);
  // $languageKnown = implode(",",$_POST['languageKnown']);
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
  $groupname = $_POST['groupname'];
  $fullname =$name.$lastName;

  // $extension = pathinfo($_FILES['ImageUpload']['name']);
  // $fileName1=$extension['filename'].date('Y-m-d-H-i-s').$userId;
  // $target="ProfilePictures/".$fileName1.".".$extension['extension'];
  // if($_FILES['ImageUpload']['name']!='')
  // {
  //   $d = imageCompression($_FILES['ImageUpload']['tmp_name'], $target, 20);
  // }
  // else
  // {
  //   $target='';
  // }
  // $destinationFolder=imageCompression($_FILES['ImageUpload']['tmp_name'], $target, 20); 

  $getUserId = $conn->query("SELECT UserId FROM user_master WHERE AppCode ='$appCode' ORDER BY UserId desc")->fetch_assoc();
  $usrId = $getUserId['UserId']+1;

  $sqlUser = "INSERT INTO user_master(AppCode, UserId, EmployeeId,EmployeeId1, UserPhoto, UserFirstName, UserMiddleName, UserLastName, Sex, DOB, BloodGroup, StreetName, Area, State, Country, Pincode, City, BranchId, ResTelPhone, OffTelPhone, UserMobileNumber, AadharNumber, PassportNo, DrivingLiscenceNo, DrivingLiscenceFor, PersonalEmailId, UserEmailId, Password,JobZone,Education,Grade,Department,Designation,ReportingTo,ActiveFrom,PrincipalToHandle,ProductToHandle,AreaToCover,CityToCover,StateToCover,SegmentInvolvedId,TrainingPrinciple,TrainingDonePrinciple,TrainingProduct,TrainingDoneProduct,LanguageKnown,CreatedBy, CreatedAt, UpdatedBy, UpdatedAt,RecordId,GroupId)VALUES('$appCode', '$usrId', '$employeeId', '$employeeSAPCode','$d','$name','$middleName','$lastName','$sex','$dob','$bloodGroup','$streetName2','$area','$state','$country','$pincode','$city','$kpmanishLocation','$residenceTele','$officeTele','$mobileNumber','$aadharNumber','$passportNumber','$drivingLicNumber','$drivingLicFor','$personalMail','$companyMail','$password','$jobZone',  '$education', '$grade', '$department', '$designation','$reportTo','$activeFrom','$principalHandle','$productHandle','$areaCover','$citytocover','$stateCover','$segmentInvolved','$traingForPrincipal','$traingDoneForPrincipal','$traingForProduct','$traingDoneForProduct','$languageKnown','$userId', NOW(), '$userId', NOW(), '$recordId','$groupname')";
  $conUser = mysqli_query($conn, $sqlUser);
  if($conUser)
  {
      $getUserTableId = $conn->query("SELECT UserTableId FROM user_master WHERE AppCode = '$appCode' ORDER BY UserTableId desc")->fetch_assoc();
      $userTableId = $getUserTableId['UserTableId']+1;

      $sqlUserlog = $conn->query("INSERT INTO `user_master_log`(UserTableId, AppCode, UserId,EmployeeId,EmployeeId1,UserPhoto,UserFirstName,UserMiddleName, UserLastName,Sex,DOB,BloodGroup,StreetName,Area,State,Country,Pincode,City,Location,ResTelPhone,OffTelPhone,UserMobileNumber,AadharNumber,PassportNo,DrivingLiscenceNo,PersonalEmailId,UserEmailId,Password,JobZone,Education,Grade,Department,Designation,Strength, Weakness, ReportingTo,ActiveFrom,PrincipalToHandle,ProductToHandle,AreaToCover,CityToCover,StateToCover,SegmentInvolvedId,TrainingPrinciple,TrainingDonePrinciple,TrainingProduct,TrainingDoneProduct,LanguageKnown,CreatedBy, CreatedAt, UpdatedBy, UpdatedAt,RecordId,GroupId)VALUES('$userTableId','$appCode', '$usrId', '$employeeId','$employeeSAPCode', '$d','$name','$middleName','$lastName','$sex','$dob','$bloodGroup','$streetName2','$area','$state','$country','$pincode','$city','$kpmanishLocation','$residenceTele','$officeTele','$mobileNumber','$adharNumber','$passportNumber','$drivingLicNumber','$personalMail','$companyMail','$password','$jobZone',  '$education', '$grade', '$department', '$designation', '$strength','$weakness','$reportTo','$activeFrom','$principalHandle','$productHandle','$areaCover','$cityCover','$stateCover','$segmentInvolved','$traingForPrincipal','$traingDoneForPrincipal','$traingForProduct','$traingDoneForProduct','$languageKnown','$userId', NOW(), '$userId', NOW(), '$recordId','$groupname')");
     
   
    
    ?>
      <script type="text/javascript">
        toastr.success('User Added Successfully', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
          window.location.assign("user_master.php");
        },1000);
      </script>
    <?php
  }
  else{
    ?>
    <script type="text/javascript">
        toastr.success('User Added in Error', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
          window.location.assign("user_master.php");
        },1000);
      </script>
    <?php
  }
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
  // Name Validation //
  $("#firstName").keyup(function () {
        var firstName = $(this).val();
        $.ajax({
            type: "POST",
            url: "check_unique_name.php",
            data: { 'columnName':'UserFirstName', 'value' : firstName, 'tableName' : 'user_master' },
            success : function(data) 
            {
              if(data!="No")
              {

                $("#firstAlert").removeClass("hidden");
                $("#submit").addClass("hidden").attr("disabled","disabled");
              }
              else
              {
                $("#firstAlert").addClass("hidden");
                $("#submit").removeClass("hidden").removeAttr("disabled");
              }
            }
        });return false;
    });
    
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
  });
  </script>