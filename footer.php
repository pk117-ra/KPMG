<div id="alert_popover">
    <div class="wrapper">
        <div class="popNotificationArea">
            
        </div>
    </div>
</div>
<?php
$date= date('Y');
$userId = $_SESSION['kpmUserIdS'];
$getLastActivityLog = mysqli_query($conn, "SELECT * FROM tone_activity_log WHERE UserId = '$userId' AND AppCode = '$appCode' ORDER BY Id DESC")->fetch_assoc();
$lastActivityId = $getLastActivityLog['Id'];
$updateActivity = mysqli_query($conn, "UPDATE tone_activity_log SET LastLogoutDateTime = NOW(),LastActivity = NOW() WHERE Id='$lastActivityId'");
?>
<footer class="footer footer-static footer-light navbar-border" style="background-color: #343c3f;color: #fff;position: fixed;bottom: 0;width: 100%;z-index:1; ">
      <p class="clearfix white lighten-2 text-sm-center mb-0 px-2"><center><span>&copy; <?php echo $date; ?> <a href="" target="_blank" class="text-bold-800 grey white"> UPR TECH INDIA PRIVATE LIMITED </a>All rights reserved.</span></center></p>
    </footer>
<style type="text/css">
  .madhes .select2-container--default .select2-selection--multiple
  {
    border:0px;
    border-color: #fff;
    border-bottom: 1px solid;
    border-radius: 0px;
    padding: 0px !important;
    /*height: 35px;*/
  }
  .cke_editable p 
  {
    margin: 0px;
  }
  .madhes .select2-container--default.select2-container--focus 
  {
    border-color: #fff !important;
    outline: 0;
  }
</style>
<!-- SMS COMPOSE MODAL END -->
<style>
/*label bold*/
form label {font-weight:bold}

    #alert_popover { 
        display:block; 
        position:absolute; 
        /*bottom:50px; left:50px;*/ 
        text-align:right; 
        position: absolute; 
        top: 85px; 
        right: 5px; 
        /*background-color: #fff; */
        border-radius: 10px; 
    } 
    .wrapper { 
        display: table-cell; 
        vertical-align: bottom; 
        height: auto; 
        width: 300px; 
    } 
    .alert_default { 
        color: #C03B29; 
        text-align: left; 
        background-color: #fff; 
        border-color: #0e0e0e; 
        border-radius: 10px; 
    } 
</style> 
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/charts/gmaps.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/extensions/moment.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/pickers/daterange/daterangepicker.js" type="text/javascript"></script>
     <script src="app-assets/vendors/js/extensions/fullcalendar.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
     <script src="app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script> 
    <script src="app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- <script src="app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script> -->
    <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/extensions/jquery.knob.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
    <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
    <script src="app-assets/js/scripts/extensions/fullcalendar.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>
    <!-- Custom Scripts -->
    <!-- <script type="text/javascript" src="app-assets/js/saro.js"></script> -->
    <!-- Select2 -->
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
    <!-- Sweet Alert -->
    <script src="app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
    <!-- Toastr -->
    <script src="app-assets/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/extensions/toastr.js" type="text/javascript"></script>
    <!-- DataTable -->
    <script src="app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
    <!-- <script src="app-assets/js/scripts/tables/datatables-extensions/datatable-responsive.js" type="text/javascript"></script> -->
    <script src="app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/jszip.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/pdfmake.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/vfs_fonts.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/buttons.html5.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/tables/buttons.colVis.min.js" type="text/javascript"></script>
    <!-- DataTable End-->
    <script src="app-assets/js/scripts/extensions/rating.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/extensions/jquery.raty.js" type="text/javascript"></script>
    <!--Auto Complete Script Starts-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- ECHARTS JS -->
    <script src="app-assets/vendors/js/charts/echarts/echarts.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/popover/popover.js" type="text/javascript"></script>
    <!-- Model JS -->
    <script src="app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125243242-1"></script>
    <!-- <script src="app-assets/js/scripts/pages/dashboard-analytics.js" type="text/javascript"></script> -->
    <!-- <script src="app-assets/js/scripts/pages/dashboard-fitness.js" type="text/javascript"></script> -->
    <script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>



<script type="text/javascript">
//     //disable right click
// $(function() {
//     $(this).bind("contextmenu", function(e) {
//         e.preventDefault();
//     });
// }); 
// $(document).on("click",".notificationClass",function(){
//     var count = $(this).attr("count");
    
//     if(count!=0)
//     {
      
//         $.post('get_notifications.php', function(data) {
//             $("#appendNoti").html(data);
//             setTimeout(function(){
//             $("#notiModel").modal("show");
//             },0)
//         });
//     }
// });
// $(document).on("click",".markallread",function()
// {
//     var userId = "<?= $userId ?>";
//     $.post('notification_clear_all.php',{userId:userId},function(chat)
//     {
//         location.reload();
//     });
// });
// $(document).on("click",".notificationMediaClass",function(){
//     var forId = $(this).attr("forId");
//     var notifor = $(this).attr("for");
//     var notifyId = $(this).attr("value");
//     $.post('quote_conversation.php',{ForId:forId, For:notifor}, function(data) {
//         $("#appendChat").html(data);
//         setTimeout(function(){
//         $("#chatModel").modal("show").css({"right": "25%", "left": "25%"});
//         $("#chatModel select").select2();
//         },0)
//         $.post('get_chat.php',{ForId:forId, For:notifor},function(chat){
//             $(".chatList").html(chat);
//         });
//     });
//     $.post('notification_status_change.php',{notificationId:notifyId}, function(data) {
//     });
// });
// $(document).on("click","#notiModel .close",function(){
//     $("#chatModel").modal("hide");
//     //location.reload();
// });
// $(document).on("click","#chatModel .close",function(){
//     $("#chatModel").modal("hide");
//     //location.reload();
//     <?php $_SESSION['selectedUsers']=0; ?>
// });
// $(document).on("click",".statusChange",function(){
//     var notifyId = $(this).attr("value");
//     $.post('notification_status_change.php',{notificationId:notifyId}, function(data) {
//     });
// });
// $(document).on("click","#selectUser",function(){
//     $.post('get_chat_user.php',function(data){
//         $(".appendUserDiv").removeClass("hidden");
//         $(".appendUser").html(data)
//         $("#closeUser").removeClass('hidden');
//         $("#selectUser").addClass('hidden');
//         $(".appendCardDiv").addClass('hidden');
//     });
// });
// $(document).on("click","#closeUser",function(){
//     var users =  $(".appendUser").val();
//     if (users!=null) 
//     {
//     $.post('set_chat_user.php',{users:users},function(data){
//         $(".appendCard").html(data)
//         $(".appendCardDiv").removeClass("hidden");
//     });    
//     }
//     $(".appendUserDiv").addClass("hidden");
//     $("#closeUser").addClass('hidden');
//     $("#selectUser").removeClass('hidden'); 

// });
// $(document).on("click","#saveConversation",function(){
//     var conversation = $(".conversation").val();
//     var forId = $(".forId").val();
//     var cfor = $(".for").val();
//     var users = $(".appendUser").val();
//     $.post('save_conversation.php',{cfor:cfor,forId:forId,conversation:conversation,users:users},function(data){
//         location.reload();
//     });
// });


function copyToClipboard(element) 
{
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    if(document.execCommand("copy")){
      toastr.success("Tag Copied");
    } else {
      toastr.error("something went wrong");
    }
    $temp.remove();
}
//outocomplete off jquery
$("input,select,textarea,form").attr( 'autocomplete', 'off' );

$(document).ready(function(){
    $( document ).on( 'focus', ':input', function(){
    $(':input').attr( 'autocomplete', 'off' );
    // alert();
    });
});
$(document).ready(function(){
    $(".kpmDTBL").DataTable({
        "destroy" : true,
        "order": [[ 0, "desc" ]],
        "pageLength" : 10,
        "responsive" : true,
        "stateSave": true
    });
    //***Initialise the Responsive DataTable
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });
    $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });

    // recent active tab //
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#kpmNavBar a[href="' + activeTab + '"]').tab('show');
    }

    // login log activities//
    // var currentUser = "<?php echo $_SESSION['kpmUserIdS']; ?>"; 
    // var appCode = "<?php echo $_SESSION['kpmAppCodeS']; ?>";
    // $.ajax({
    //     url:"update_tone_activity_log.php",
    //     method:"POST",
    //     data: {'currentUser':currentUser,'appCode':appCode},
    //     success:function(data)
    //     {
    //     }
    // });

    
    $(".themeColor").on('click', function(){
        var yId = $(this).val();
        // alert(yId);
        $.ajax({
            type: "POST",
            url: "theme.php",
            data: { 'yId' : yId },
            success : function(data) 
            {
                location.reload();
            }
        });return false;
    });
    
    // Text Area empty space trimming
    $('textarea').each(function()
    {
        $(this).val($(this).val().trim());
    });
});
</script>

</body>
</html>
<script  type="text/javascript">
// window.onload = function()  
// {
//     // console.log('Parsetime: ', parseTime);
//     var id = "<?= $_SESSION['mkdata'] ?>";

//     var starttime = window.performance.timing.navigationStart;

//     var endtime = window.performance.timing.domContentLoadedEventEnd;

//     var for1 = 'footer';

//     var starttimepageloadingmk = window.performance.timing.navigationStart;

//     var endtimepageloadingmk = window.performance.timing.domContentLoadedEventEnd;

//     var diffsec = window.performance.timing.domContentLoadedEventEnd- window.performance.timing.navigationStart;

//     getloadingtime(id,starttime,endtime,for1,starttimepageloadingmk,endtimepageloadingmk,diffsec);
//     // console.log("start" + starttime)
//     // console.log(window.performance.timing);
//     // console.log(performance.timing.loadEventEnd);
//     // console.log("end" + endtime)
// };
</script>
<!-- for getting page loading time -->
<script type="text/javascript">
//     function getloadingtime(id,st,et,for1,stp,etp,diffsec){
//     $.ajax({
//         url:'save_user_active_url.php',
//         type:'post',
//         data:{'id':id,'StartTime':st,'EndTime':et,'frompage':for1,'startmilli':stp,'endmilli':etp,'diffsec':diffsec},
//         success:function(data)
//         {
//             console.log(data);
//         }
//     })
//   }
</script>
<!-- siderbar selected menu active -->
<script type="text/javascript">
    var curUrl1 = window.location.href;
    var curUrl2 = curUrl1.split("/");
    var curUrl3 = curUrl2.reverse();
    var curUrl4 = curUrl3[0];
    var curUrl5 = curUrl4.split("?");
    var curURL = curUrl5[0];
     $("#main-menu-navigation a").each(function() { 
        var ahref = $(this).attr("href");
        if (ahref == curURL) {
            $(this).closest("li").addClass("active");
        }
    });
     // ajax file for profile navigation
     $(document).on('click', '.settingclass', function(){
        window.location.assign('profile.php');
     });
     // ajax file for logout
     $(document).on('click', '.logoutclass', function(){
        swal({
            title: "Alert Confirm",
            text: "Are you sure want to Logout ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DA4453",
            confirmButtonText: "Yes !",
            cancelButtonText: "No !",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) 
        {
            if (isConfirm) 
            {
               window.location.assign('logout.php');
            } 
            else 
            {
                swal("Cancelled", "Cancelled", "error");
            }
        });
     });
</script>
<script type="text/javascript">
// $(".productName").click(function(){
//      var prtProduct = 0;
//       $.post('get_tags_content.php',{productPreId:prtProduct}, function(data) {
//         $("#maindatafooter").html(data);
//         setTimeout(function(){
//           $("#tagTypeTonality,#tagTypeSolubiltiy,#tagTypeNaturStatus,#tagTypeIListed,#tagTypeForm").select2();
//         },100)
//       });
// });
// $(document).ready(function(){
//     setInterval(function(){
//         load_last_notification();
//     }, 15000);

//     function load_last_notification()
//     {
//         var currentUser = "<?php echo $_SESSION['kpmUserIdS']; ?>";
//         var appCode = "<?php echo $_SESSION['kpmAppCodeS'];?>";
        
//         $.ajax({
//             url:"get_pop_notification.php",
//             method:"POST",
//             data: {'currentUser':currentUser,'appCode':appCode,token:"<?= $_SESSION['token'] ?>"},
//             success:function(data)
//             {
//                 $('.popNotificationArea').html(data);
//             }
//         })
//     }
//     var id1 = "<?= $userIdKK; ?>";
//     $.post("update_tone_activity_log.php",{id1:id1},function(dta){
//     });
// });
// function notificationShowed(notificationId)
//     {
//         $.ajax({
//             method:'POST',
//             url:'update_notification_viewed.php',
//             data:{'notificationId':notificationId},
//             success:function(data)
//             {
//                 // alert(data);
//                 $("#notificationContent").html(data);
//             }
//         }); return false;
//     }
    // $(document).ready(function(){
    //     getNotifications();
    //     function getNotifications()
    //     {
    //         $.ajax({
    //             method:'POST',
    //             url:'get_notification.php',
    //             data:{'Notification':'Announcement',token:"<?= $_SESSION['token'] ?>"},
    //             success:function(data)
    //             {
    //                 // alert(data);
    //                 $("#notificationContent").html(data);
    //             }
    //         }); return false;
    //     }
    // });
    //  $(".notificationClass").click(function(){
    //     var hover = false;
    //     var a=0;
    //     //for convenience
    //     tooltip({
    //         selector: "a[rel=tooltip]",
    //         placement: "right"
    //     })
    //     $('body').on('mouseenter', '.tooltip,a[rel=tooltip]', function () {
    //         hover = true;
    //     })
    //     $('a').on('mouseenter', function() {
    //         hover=false;
    //         $('.tooltip').hide();
    //     })
    //     //if it is true hover prevents the tooltip close
    //     $TT.on('hide.bs.tooltip', function () {  
    //         return !hover;
    //     })
    // });
</script>

<script type="text/javascript">
    $("#logoutmob").hide();
    $(document).ready(function(){
    $("#log").click(function(){
    $("#logoutmob").toggle();
  });
});
</script>