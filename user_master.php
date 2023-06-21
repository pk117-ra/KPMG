<?php
//Page Connections
//master.php-> user_master.php-> user_edit.php, user_activation.php, addrecord_users.php, user_add.php
include("header.php");
include("sidebar.php");
$userCount = $conn->query("SELECT COALESCE(SUM(CASE WHEN (Active='Yes' AND Resigned='No' AND AccessWebApp='Yes')THEN 1 END),0) as count1,COALESCE(SUM(CASE WHEN(Active='Yes' AND Resigned='No' AND AccessWebApp='No')THEN 1 END) ,0) as count2,COALESCE(SUM(CASE WHEN(Resigned='Yes')THEN 1 END),0) as count3 FROM user_master")->fetch_assoc();
?>
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
     	<div class="content-header-left col-md-6 col-xs-12">
      	<h3 class="content-header-title pl-1">Users</h3>
    	</div>
    </div>
    <!-- Basic form layout section start -->
    <div class="content-body">
			<section id="basic-form-layouts">
				<div class="card" style="min-height: 445px;">
					<div class="card-body collapse in">
						<div class="card-block">
              <button class = "myadd pull-right mr-3 mt-0" style="font-size: 32px;background:#fff ;border: 2px solid #fff; color: #6e458b; cursor: pointer;" type="button" data-toggle = "tooltip" title = "Add New"><i class = "fa fa-plus"></i></button><br>
              <ul class="nav nav-tabs nav-top-border no-hover-bg" id= "kpmNavBar">
                <li class="nav-item">
                  <a class="nav-link active" id="activeTab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">Active<span class="tag tag tag-warning tag-pill float-xs-right mr-1" style="background-color:#137a8a;"><?php echo $userCount['count1']; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="inactiveTab" data-toggle="tab" href="#inactive" aria-controls="inactive" aria-expanded="true">InActive<span class="tag tag tag-warning tag-pill float-xs-right mr-1" style="background-color: #137a8a;"><?php echo $userCount['count2']; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" id="resignedTab" data-toggle="tab" href="#resigned" aria-controls="resigned" aria-expanded="true">Resigned<span class="tag tag tag-warning tag-pill float-xs-right mr-1" style="background-color: #137a8a;"><?php echo $userCount['count3']; ?></span>
                 </a>
                </li>                
              </ul><br>
							<div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="activeTab" aria-expanded="true">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered kpmDTBL" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
                          <th>Profile</th>
                          <th>Name</th>
                          <th>Web-App Access&nbsp;</th>
                          <th>Admin Access&nbsp;&nbsp;&nbsp;</th>
                          <th>Mob Access&nbsp;&nbsp;</th>
                          <th>Employee Id</th>
                          <th>Mobile Number</th>
                          <th>Email Id</th>
                          <th>Branch</th>
                          <th>Designation</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqlGetLicenseDetails =$conn->query("SELECT * FROM user_master as a left join  branch_master as b on a.BranchId=b.BranchId AND b.AppCode=a.AppCode left join designation as c on c.DesignationId = a.Designation AND c.AppCode= a.AppCode WHERE a.Active='Yes' AND a.Resigned='No' AND a.AppCode='$appCode' AND a.AccessWebApp='Yes' GROUP BY UserId ");

                          while($rowUserDetails = mysqli_fetch_assoc($sqlGetLicenseDetails))
                          {
                          $sNo = $rowUserDetails['UserId'];
                          $userFirstName = $rowUserDetails['UserFirstName'];
                          $userLastName = $rowUserDetails['UserLastName'];
                          $userName = $userFirstName." ".$userLastName;
                          $employeeId = $rowUserDetails['EmployeeId'];
                          $branch = $rowUserDetails['BranchName'];
                          $designation = $rowUserDetails['DesignationName'];
                          $mobileNumber = $rowUserDetails['UserMobileNumber'];
                          $emailId = $rowUserDetails['UserEmailId'];
                          $webAccess=$rowUserDetails['AccessWebApp'];
                          $mobileAccess=$rowUserDetails['AccessMobileApp'];
                          $adminAccess=$rowUserDetails['AccessAdmin'];
                          $profilePicture = $rowUserDetails['UserPhoto'];
                          $encryptSno = base64_encode(base64_encode(base64_encode($sNo)));
                        ?>
                        <tr>
                          <td><?php echo $sNo; ?></td>
                          <td>
                            <a href='user_edit.php?id=<?php echo $encryptSno; ?>' class='' style="font-size: 25px; color: #137a8a;" data-toggle="tooltip" title="Edit"><img src='app-assets/edit.svg' style='height: 24px;width: 24px;' class='i'></i>&nbsp;<a href='user_document.php?uId=<?php echo $encryptSno; ?>' class='' style="font-size: 25px; color: #137a8a;" data-toggle="tooltip" title="Document"><img src='app-assets/documents-01.svg' style='height: 25px;width: 25px;' class='i'></i></a>

                          </td>
                          <td>
                          <?php 
                            if($profilePicture!='')
                            {
                            ?>
                            <img src="<?= $profilePicture; ?>"  style="border-radius: 50%;width: 30px;height: 30px;background-color: #fff;">
                              <?php
                            }
                            else
                            {
                              ?>
                              <img src="ProfilePictures/CPic07-08-2019-16-47-38.png"  style="border-radius: 50%;width: 30px;height: 30px;background-color: #fff;">
                              <?php
                            }
                            ?>
                          </td>
                          <td><?php echo $userName;?></td>
                          <td>
                            <?php 
                            if($webAccess=='Yes')
                            {
                            ?>
                            <input type="radio" class="webYes"  name="webRadio<?php echo $sNo; ?>" value="Yes" checked>
                            <span class="custom-control-description ml-0" >Yes &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="webNo" name="webRadio<?php echo $sNo; ?>" value="No" >
                            <span class="custom-control-description ml-0">No</span>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <input type="radio" class="webYes" name="webRadio<?php echo $sNo; ?>" value="Yes">
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="webNo" name="webRadio<?php echo $sNo; ?>" value="No" checked>
                            <span class="custom-control-description ml-0">No</span>
                            <?php   
                            }
                            ?>
                          </td>
                          <td>
                            <?php 
                            if($adminAccess=='Yes')
                            {
                            ?>
                            <input type="radio" class="adminYes" name="adminRadio<?php echo $sNo; ?>" value="Yes" checked>
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="adminNo" name="adminRadio<?php echo $sNo; ?>" value="No" >
                            <span class="custom-control-description ml-0">No</span>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <input type="radio" class="adminYes" name="adminRadio<?php echo $sNo; ?>" value="Yes">
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="adminNo" name="adminRadio<?php echo $sNo; ?>" value="No" checked>
                            <span class="custom-control-description ml-0">No</span>
                            <?php   
                            }
                            ?>
                          </td>
                          <td>
                            <?php 
                            if($mobileAccess=='Yes')
                            {
                            ?>
                            <input type="radio" class="mobileYes"  name="mobRadio<?php echo $sNo; ?>" value="Yes" checked>
                            <span class="custom-control-description ml-0" >Yes &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="mobileNo" name="mobRadio<?php echo $sNo; ?>" value="No" >
                            <span class="custom-control-description ml-0">No</span>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <input type="radio" class="mobileYes" name="mobRadio<?php echo $sNo; ?>" value="Yes">
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="mobileNo" name="mobRadio<?php echo $sNo; ?>" value="No" checked>
                            <span class="custom-control-description ml-0">No</span>
                            <?php   
                            }
                            ?>
                          </td>
                          <td><?php echo $employeeId;?></td>
                          <td><?php echo $mobileNumber; ?></td>
                          <td><?php echo $emailId; ?></td>
                          <td><?php echo $branch;?></td>
                          <td><?php echo $designation; ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="inactive" aria-labelledby="inactiveTab" aria-expanded="false">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered kpmDTBL" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Action</th>
                          <th>Name</th>
                          <th>Web-App Access&nbsp;</th>
                          <th>Admin Access&nbsp;</th>
                          <th>Employee Id</th>
                          <th>Mobile Number</th>
                          <th>Email Id</th>
                          <th>Branch</th>
                          <th>Designation</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqlGetLicenseInactive =$conn->query("SELECT * FROM user_master as a left join  branch_master as b on a.BranchId=b.BranchId AND b.AppCode=a.AppCode left join designation as c on c.DesignationId = a.Designation AND c.AppCode= a.AppCode WHERE a.Resigned='No' AND a.AppCode='$appCode' AND a.AccessWebApp='No' AND a.Active='Yes' GROUP BY UserId ");
                          while($rowUserDetailsInAc = mysqli_fetch_assoc($sqlGetLicenseInactive))
                          {
                          $sNo = $rowUserDetailsInAc['UserId'];
                          $userFirstName = $rowUserDetailsInAc['UserFirstName'];
                          $userLastName = $rowUserDetailsInAc['UserLastName'];
                          $userName = $userFirstName." ".$userLastName;
                          $employeeId = $rowUserDetailsInAc['EmployeeId'];
                          $branch = $rowUserDetailsInAc['BranchName'];
                          $designation = $rowUserDetailsInAc['DesignationName'];
                          $mobileNumber = $rowUserDetailsInAc['UserMobileNumber'];
                          $emailId = $rowUserDetailsInAc['UserEmailId'];
                          $webAccess=$rowUserDetailsInAc['AccessWebApp'];
                          $mobileAccess=$rowUserDetailsInAc['AccessMobileApp'];
                          $adminAccess=$rowUserDetailsInAc['AccessAdmin'];
                          $encryptSno = base64_encode(base64_encode(base64_encode($sNo)));
                        ?>
                        <tr>
                          <td><?php echo $sNo; ?></td>
                          <td>
                            <a href='user_edit.php?id=<?php echo $encryptSno; ?>' class='' style="font-size: 25px; color: #137a8a;" data-toggle="tooltip" title="Edit"><i class= "fa fa-edit"></i></a>
                          </td>
                          <td><?php echo $userName;?></td>
                          <td>
                            <?php 
                            if($webAccess=='Yes')
                            {
                            ?>
                            <input type="radio" class="webYes"  name="webRadio<?php echo $sNo; ?>" value="Yes" checked>
                            <span class="custom-control-description ml-0" >Yes &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="webNo" name="webRadio<?php echo $sNo; ?>" value="No" >
                            <span class="custom-control-description ml-0">No</span>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <input type="radio" class="webYes" name="webRadio<?php echo $sNo; ?>" value="Yes">
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="webNo" name="webRadio<?php echo $sNo; ?>" value="No" checked>
                            <span class="custom-control-description ml-0">No</span>
                            <?php   
                            }
                            ?>
                          </td>
                          <td>
                            <?php 
                            if($adminAccess=='Yes')
                            {
                            ?>
                            <input type="radio" class="adminYes" name="adminRadio<?php echo $sNo; ?>" value="Yes" checked>
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="adminNo" name="adminRadio<?php echo $sNo; ?>" value="No" >
                            <span class="custom-control-description ml-0">No</span>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <input type="radio" class="adminYes" name="adminRadio<?php echo $sNo; ?>" value="Yes">
                            <span class="custom-control-description ml-0">Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="radio" class="adminNo" name="adminRadio<?php echo $sNo; ?>" value="No" checked>
                            <span class="custom-control-description ml-0">No</span>
                            <?php   
                            }
                            ?>
                          </td>
                          <td><?php echo $employeeId;?></td>
                          <td><?php echo $mobileNumber; ?></td>
                          <td><?php echo $emailId; ?></td>
                          <td><?php echo $branch;?></td>
                          <td><?php echo $designation; ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="resigned" aria-labelledby="resignedTab" aria-expanded="false">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered kpmDTBL" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Employee Id</th>
                          <th>Mobile Number</th>
                          <th>Email Id</th>
                          <th>Branch</th>
                          <th>Designation</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqlGetLicenseResigned =$conn->query("SELECT * FROM user_master as a left join  branch_master as b on a.BranchId=b.BranchId AND b.AppCode=a.AppCode left join designation as c on c.DesignationId = a.Designation AND c.AppCode= a.AppCode WHERE a.Resigned='Yes' AND a.AppCode='$appCode'  GROUP BY UserId ");
                          while($rowUserDetails = mysqli_fetch_assoc($sqlGetLicenseResigned))
                          {
                          $sNo = $rowUserDetails['UserId'];
                          $userFirstName = $rowUserDetails['UserFirstName'];
                          $userLastName = $rowUserDetails['UserLastName'];
                          $userName = $userFirstName." ".$userLastName;
                          $employeeId = $rowUserDetails['EmployeeId'];
                          $branch = $rowUserDetails['BranchName'];
                          $designation = $rowUserDetails['DesignationName'];
                          $mobileNumber = $rowUserDetails['UserMobileNumber'];
                          $emailId = $rowUserDetails['UserEmailId'];
                          $webAccess=$rowUserDetails['AccessWebApp'];
                          $mobileAccess=$rowUserDetails['AccessMobileApp'];
                          $adminAccess=$rowUserDetails['AccessAdmin'];
                          $encryptSno = base64_encode(base64_encode(base64_encode($sNo)));
                        ?>
                        <tr>
                          <td><?php echo $sNo; ?></td>
                          <td><?php echo $userName; ?></td>
                          <td><?php echo $employeeId;?></td>
                          <td><?php echo $mobileNumber; ?></td>
                          <td><?php echo $emailId; ?></td>
                          <td><?php echo $branch;?></td>
                          <td><?php echo $designation; ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<?php 
  include("footer.php");
?>
<script type="text/javascript">
  //
  $(document).on('change', '.webYes', function(){
    var userId=$(this).closest('tr').children('td:first').text();
    var appCode="<?php echo $_SESSION['kpmAppCodeS']; ?>";
    // alert(appCode);
    var activationresponse=webActivation(userId, appCode, 'AccessWebApp', 'Yes');
    if(activationresponse=='Success')
    {
      toastr.success(activationresponse);
    }
    else
    {
      $(this).prop( "checked", false);
      $(this).closest("tr").find(".webNo").prop( "checked", true);
      toastr.error(activationresponse);
    }
  });
  //
  $(document).on('change', '.webNo', function(){
    var userId=$(this).closest('tr').children('td:first').text();
    var appCode="<?php echo $_SESSION['kpmAppCodeS']; ?>";
    // alert(appCode);
    var activationresponse=webActivation(userId, appCode, 'AccessWebApp', 'No');
    if(activationresponse=='Success')
    {
      toastr.success(activationresponse);
    }
    else
    {
      $(this).prop( "checked", false);
      $(this).closest("tr").find(".webYes").prop( "checked", true);
      toastr.error(activationresponse);
    }
  });
  //
  $(document).on('change', '.mobileYes', function(){
    var userId=$(this).closest('tr').children('td:first').text();
    var appCode="<?php echo $_SESSION['kpmAppCodeS']; ?>";
    var activationresponse=webActivation(userId, appCode, 'AccessMobileApp', 'Yes');
    if(activationresponse=='Success')
    {
      toastr.success(activationresponse);
    }
    else
    {
      $(this).prop( "checked", false);
      $(this).closest("tr").find(".mobileNo").prop( "checked", true);
      toastr.error(activationresponse);
    }
  });
  //
  $(document).on('change', '.mobileNo', function(){
    var userId=$(this).closest('tr').children('td:first').text();
    var appCode="<?php echo $_SESSION['kpmAppCodeS']; ?>";
    var activationresponse=webActivation(userId, appCode, 'AccessMobileApp', 'No');
    if(activationresponse=='Success')
    {
      toastr.success(activationresponse);
    }
    else
    {
      $(this).prop( "checked", false);
      $(this).closest("tr").find(".mobileYes").prop( "checked", true);
      toastr.error(activationresponse);
    }
  });

  $(document).on('change', '.adminYes', function(){
    var userId=$(this).closest('tr').children('td:first').text();
    var appCode="<?php echo $_SESSION['kpmAppCodeS']; ?>";
    var activationresponse=webActivation(userId, appCode, 'AccessAdmin', 'Yes');
    if(activationresponse=='Success')
    {
      toastr.success(activationresponse);
    }
    else
    {
      $(this).prop( "checked", false);
      $(this).closest("tr").find(".adminNo").prop( "checked", true);
      toastr.error(activationresponse);
    }
  });
  //
  $(document).on('change', '.adminNo', function(){
    var userId=$(this).closest('tr').children('td:first').text();
    var appCode="<?php echo $_SESSION['kpmAppCodeS']; ?>";
    var activationresponse=webActivation(userId, appCode, 'AccessAdmin', 'No');
    if(activationresponse=='Success')
    {
      toastr.success(activationresponse);
    }
    else
    {
      $(this).prop( "checked", false);
      $(this).closest("tr").find(".adminYes").prop( "checked", true);
      toastr.error(activationresponse);
    }
  });
  //
  function webActivation(userId, appCode, accessFor, access)
  {
    var resp=''; 
    $.ajax({
      type: "post",
      url:"user_activation.php",
      async: false,
      data:{'userId':userId, 'appCode':appCode, 'accessFor':accessFor, 'access':access},
      success:function(data){
        location.reload();
        resp=data;
        return resp;
      },
        error: function () {}
    });
    return resp;
  }
  // $("#usersActivateTable").DataTable({
  //     "destroy" : true,
  //     "order": [[ 0, "desc" ]],
  //     "pageLength" : 10,
  //     "responsive" : true,
  // });
</script>

<script type="text/javascript">
  $(".myadd").click(function(){
    var uId = '<?php echo $userId; ?>';
    $.ajax({
      type : 'POST',
      url  : 'addrecord_users.php',
      data : {uId:uId},
      success : function(data)
      {
        var eId = data;
        window.location.assign("user_add.php?eId="+eId);
      }
    });return false;
  });
</script>
<script type="text/javascript">
  $("#users").DataTable({
    "responsive":true,
    "saveState" : true,
  });
</script>
