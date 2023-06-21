<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1);
include("header.php");
include('crmphpfunctions.php');
include("sidebar.php");
$_SESSION['crmChild'] = array();
$childArr = $_SESSION['crmChild'];
getChild($conn, $userId,$appCode);
array_push($_SESSION['crmChild'], $userId);
$crmChildsArr = array_unique($_SESSION['crmChild']);
$implode = implode(',',$crmChildsArr);
$_SESSION['LoginChildVal']= $implode;
?>
<div class="app-content content container-fluid bhcontpage">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title">Log Analytics</h3>
      </div>
    </div><br>
    <div class="content-body"><!-- Basic form layout section start -->
      <section id="horizontal-form-layouts" style="background-color: #fff;">
        <div class="row">
          <div class="row col-md-12">
            <div class="col-md-3">
              <label>Period</label>
              <select id="report" class="select2 form-control" style="width: 100%">
                
                <option value="1">Complete Report</option>
                <option value="2" selected>Today</option>
                <option value="3">Yesterday</option>
                <option value="4">Current week</option>
                <option value="5">Last week</option>
                <option value="6" >Current month</option>
                <option value="7">Last Month</option>
                <option value="8">Current quarter</option>
                <option value="9">Last quarter</option>
                <option value="10">Specific Duartion</option>
              </select>
            </div>
             
            <div class="col-md-3" id="partnercheck">
              <label>User</label>
              <select name="partner" id="partner" class="form-control select2" style="width: 100%">
                <option value="all" >All</option>
                <?php

                  if($adminAccess == 'Yes')
                  { 
                     $query=$conn->query("SELECT UserId,UserFirstName,UserLastName FROM user_master WHERE AppCode = '$appCode' AND AccessWebApp ='Yes'");
                      while($fetch=$query->fetch_assoc())
                      {
                        $name = $fetch['UserFirstName'].' '.$fetch['UserLastName'];
                        if($userId == $fetch['UserId'])
                        {
                          ?>
                              <option value="<?= $fetch['UserId']; ?>" selected><?= $name; ?></option>
                          <?php
                        }
                        else
                        {
                          ?>
                              <option value="<?= $fetch['UserId']; ?>"><?= $name; ?></option>
                          <?php
                        }
                        
                      }
                  }
                  else
                  {
                    $query=$conn->query("SELECT UserId,UserFirstName,UserLastName FROM user_master WHERE  UserId IN ($implode) AND AppCode = '$appCode' AND AccessWebApp ='Yes'");
                    while($fetch=$query->fetch_assoc())
                    {
                      $name = $fetch['UserFirstName'].' '.$fetch['UserLastName'];
                      if($userId == $fetch['UserId'])
                      {
                        ?>
                            <option value="<?= $fetch['UserId']; ?>" selected><?= $name; ?></option>
                        <?php
                      }
                      else
                      {
                        ?>
                            <option value="<?= $fetch['UserId']; ?>"><?= $name; ?></option>
                        <?php
                      }
                      
                    }
                     
                    
                  }
                  ?>
              </select>
            </div>
            
          </div>
            <div class="row col-md-12 hidden" id="specificduartion" style="padding-top: 10px">
              <div class="col-md-3">
                <label>From Date</label>
                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" id="from">
              </div>
              <div class="col-md-1">
              </div>
              <div class="col-md-3">
                <label>To Date</label>
                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" id="to">
              </div>
              <div class="col-md-5">
              </div>
            </div>
            <div style="margin-left:0px;padding-top: 20px;" class="row col-md-12" id="content"></div>
        </div>
      </section>
    </div>
  </div>
</div>
<?php
include('footer.php');
?>

<script type="text/javascript">
  var admin = "<?= $adminAccess; ?>";
  var child = "<?= $implode; ?>";
  var appCode = "<?= $appCode; ?>";
  $.post("login_analytics_kool_run.php",{report:$("#report").val(),partner:$("#partner").val(),from:$("#from").val(),to:$("#to").val(),admin:admin,child:child,appCode:appCode},function(data){
    // alert(data);
      $("#content").html(data);
  });
  
  $("#report").change(function(){
      if($(this).val() == 10)
      {
        $("#specificduartion").removeClass("hidden");
      }
      else
      {
        $("#specificduartion").addClass("hidden");
      }
      $.post("login_analytics_kool_run.php",{report:$("#report").val(),partner:$("#partner").val(),from:$("#from").val(),to:$("#to").val(),admin:admin,child:child,appCode:appCode},function(data){
        $("#content").html(data);
        //alert(data);
    });
  });

$("#partner,#from,#to").change(function(){
      $.post("login_analytics_kool_run.php",{report:$("#report").val(),partner:$("#partner").val(),from:$("#from").val(),to:$("#to").val(),admin:admin,child:child,appCode:appCode},function(data){
        $("#content").html(data);
    });
  });
</script>