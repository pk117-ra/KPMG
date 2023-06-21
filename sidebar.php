<?php
include('sidebar_style.php');
?>
<div class="col-md-2 col-xl-2 col-sm-12 col-xs-12 col-lg-12">
  <nav class="header-navbar navbar  navbar-fixed-top navbar-border nav-shadow" style="height: 20px">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav">
          <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1 threeline" id="icon" style="color: #137a8a;"></i></a>
          </li> 
          <li class="nav-item image-li" style=""><a href="#" class="navbar-brand"><img alt="logo" src="assets/images/Logo.jpg" class="brand-logo" style="margin-top: -10px; margin-left: 32px; max-height: 55px;width: 75px;"></a></li>
          <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-power-off logoutclass" title="Logout"  data-toggle="tooltip" style="color: #137a8a;"></i></a>
          </li>
        </ul>
      </div>
       <div class="navbar-container mob-response content container-fluid" >
        <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
          <ul class="nav navbar-nav">
            <li class="nav-item hidden-sm-down" ><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs" style="margin-left: -73px; color: #137a8a;"><i class="ft-menu"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow" style="background-color: #137a8a;">
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class=" menu-content navigation navigation-main">
      <li class=" nav-item"><a href="dashboard.php"><span data-i18n="" class="menu-title">Dashboard</span></a></li>
      <li class=" nav-item"><a href="master.php"><span data-i18n="" class="menu-title">Master</span></a></li>
      <li class=" nav-item"><a href="user_master.php"><span data-i18n="" class="menu-title">Users</span></a></li>
      <li class=" nav-item"><a href="supplier.php"><span data-i18n="" class="menu-title">Supplier</span></a></li>
      <li class=" nav-item"><a href="sales_contract.php"><span data-i18n="" class="menu-title">Sales Contract</span></a></li>
      
      
      <div class="icon-view" style="background-color: #fff;">
        <div class="icon" id="effect">
          <?php $getNotifications =$conn->query("SELECT * FROM notification WHERE NotificationStatus = 0 AND OwnerId IN($userId) ")->num_rows;
            ?>
           <i class="settingclass" title="settings"  data-toggle="tooltip"><img src="app-assets/images/logo/see_tting.svg" style="width: 22px;height: 22px;margin-top:10px;margin-left:5px;"></i> 
           <i class="try" title="Message"  data-toggle="tooltip"><img src="app-assets/images/logo/messagekp.svg" style="width: 22px;height: 22px;margin-top:15px;margin-left:10px;"></i>
           <i class="notificationClass" count="<?=$getNotifications?>" title="Notifications" data-toggle="tooltip"><img src="app-assets/images/logo/notification.svg"  style="width: 22px;height: 22px;margin-top:10px;margin-left:10px;"><span class="tag tag-pill  tag-danger  tag-up" id="count" style="padding: 5px;margin-top: 5px;background: #137a8a!important"><?= $getNotifications?></span>
          </i> 
           <i class="logoutclass" title="Logout"  data-toggle="tooltip"><img src="app-assets/images/logo/signoutss.svg" style="width: 22px;height: 22px;margin-top:10px;margin-left:10px;"></i> 
        </div>
        
        <div class="profile" style="background-color: #fff;">
          <?php 
          if($profilePicture!='')
          {
          ?>
          <div class="" id="pic"><img src="<?php echo $profilePicture;?>" class="popup thumbnailedit" style="border-radius: 50%;width: 31px;height: 31px;background-color: #fff;"><h6 class="proName " id="effect" style="color: #fff;margin-right:10px; font-size:12px;"><b><?php echo $firstName; ?></b></h6></div>
            <?php
          }
          else
          {
            ?>
            <div class="" id="pic"><img src="ProfilePictures/noprofile1.png" class="popup thumbnailedit" style="border-radius: 50%;width: 30px;height: 30px;background-color: #fff;"><h6 class="proName" id="effect" style="color: #fff;margin-right:10px; font-size:12px;"><b><?php echo $firstName; ?></b></h6></div>
            <?php
          }
          ?>
          <br>
        </div>
      </div>
    </ul>
  </div>
</div>

<div id="notiModel" class="modal fade right" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog mo " style="margin: 0!important">
    <div class="modal-content">
      <div class="modal-header" style="background: #534463;color: #fff">
        <button type="button" class="close" data-dismiss="modal">&times;<span class="sr-only">Close</span></button>
         <h4 class="modal-title"><b>Notifications</b><?php if($getNotifications>0){ ?> </h4><span class="markallread pull-left" style="cursor: pointer;">Clear All</span><?php }?>
        
      </div>
      <div class="modal-body pt-0" style="overflow-y: auto;overflow-x: hidden;max-height: 90vh;min-height:90vh">
        <div id="appendNoti" class="row" ></div>
      </div>
    </div>
  </div>
</div>
