<?php
include("header.php");
include("sidebar.php");
?>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12">
                <h3 class="content-header-title">Suppliers</h3>
            </div>
        </div>
        <!-- Basic form layout section start -->
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="card" style="min-height: 510px;">
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <button class=" myadd pull-right mr-3 mt-0" style="font-size: 29px;font-weight: bold; background-color: #fff;border: 2px solid #fff; color: #32CD32;cursor: pointer;" type="button"   data-toggle="tooltip" title="Add New" ><i class="fa fa-plus"></i></button><br>                           
                            <div role="tabpanel" class="tab-pane fade active in" id="productdetails" aria-labelledby="newTab" aria-expanded="true">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" style="width: 100%" id="productCategoryDetails">
                                            <thead>
                                                <tr style="">
                                                    <th>Id</th>
                                                    <th>Action&nbsp;&nbsp;&nbsp;</th>
                                                    <th>Supplier Name</th>
                                                    <th>Email Id</th>
                                                    <th>Address</th>
                                                    <th>Telephone Number</th>
                                                    <th>Fax Number</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
    var appcode = "<?= $appCode; ?>";
    $("#productCategoryDetails").DataTable({
            "destroy":true,
            "stateSave": true,
            "order": [[ 0, "desc" ]],
            "serverSide":true,
            "responsive":true,
            "deferRender":true,
             
            "ajax":"supplier_ssp.php?appcode="+appcode+"&id=1",
        });
    $(".productdetails").click(function()
    {
        var id = $(this).attr("value");
            $("#productCategoryDetails").DataTable({
            "destroy":true,
            "stateSave": true,
            "order": [[ 0, "desc" ]],
            "serverSide":true,
            "responsive":true,
            "deferRender":true,
             
            "ajax":"supplier_ssp.php?appcode="+appcode+"&id="+id,
        });
    });
    // alert("appCode");
    $(document).on("click",".deleteid",function()
    {
        var tname = $(this).attr("tname");
        var appcode = $(this).attr("acode");
        var id = $(this).attr("deleteid");
        var colname = $(this).attr("colname");

        swal({
            title: "Alert Confirm",
            text: "Are you sure want to Delete ?",
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
               $.post("delete_process.php",{data1:tname,data2:appcode,data3:id,data4:colname},function(data)
               {
                    if(data == 'yes')
                    {
                        swal("Deleted Successfully");
                        setTimeout(function()
                        {
                            window.location.assign("supplier.php");
                        },1000);
                    }
                    else
                    {
                        swal("error");
                    }
               });
            } 
            else 
            {
                swal("Cancelled", "Cancelled", "error");
            }
        });
    });

    $(document).on("click",".restoreid",function()
    {
        var tname = $(this).attr("tname");
        var appcode = $(this).attr("acode");
        var id = $(this).attr("restoreid");
        var colname = $(this).attr("colname");

        swal({
            title: "Alert Confirm",
            text: "Are you sure want to Restore?",
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
               $.post("restore_process.php",{data1:tname,data2:appcode,data3:id,data4:colname},function(data)
               {
                    if(data == 'yes')
                    {
                        swal("Restored Successfully");
                        setTimeout(function()
                        {
                            window.location.assign("supplier.php");
                        },1000);
                    }
                    else
                    {
                        swal("error");
                    }
               });
            } 
            else 
            {
                swal("Cancelled", "Cancelled", "error");
            }
        });
    });

    var uIdinsert = '<?php echo $userId;?>';

    var urlpathname = 'supplier_add.php';

    // $(document).on("click",".cloneid",function()
    // {
    //     var cId = $(this).attr("cloneid");
    //     var uId = '<?php echo $userId;?>';
    //     $.ajax({
    //         type  : 'POST',
    //         url   : 'add_recordid.php',
    //         data  : {uId:uId},
    //         success : function(data)
    //         {
    //             var rId = data;
             
    //             window.location.assign("product_clone.php?prodId="+cId+"&&rId="+rId);
    //         }
    //     });return false;
    // });
</script>
<script type="text/javascript" src="rid.js"></script>

<style type="text/css">
  table tr td:nth-child(2){  padding: 12px 2px 2px 10px !important; }
</style> 