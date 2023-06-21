<?php 
	include("header.php");
	include("sidebar.php");
    include("crmphpfunctions.php");
?>
<div class="app-content content container-fluid">
  	<div class="content-wrapper">
        <div class="content-header row">
           	<div class="content-header-left col-md-6 col-xs-12">
            	<h3 class="content-header-title">Packing</h3>
          	</div>
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
			<section id="basic-form-layouts">
				<div class="card" style="min-height: 510px;">
					<div class="card-body collapse in">
						<div class="card-block">
                            <button class=" myadd pull-right mr-3 mt-0" style="font-size: 29px;font-weight: bold; background-color: #fff;border: 2px solid #fff; color: #32CD32;cursor: pointer;" type="button"   data-toggle="tooltip" title="Add New" ><i class="fa fa-plus"></i></button>
                            <a class="pull-left mr-1 mt-0" style = "font-size: 30px; color:#32CD32;padding: top:5px;" href= "master.php" data-toggle="tooltip" title="Back"><i class ="fa fa-arrow-left"></i></a><br><br><br>
                            <ul class="nav nav-tabs nav-top-border no-hover-bg">
                              <li class="nav-item">
                                  <a class="nav-link active categoryDetails" id="newTab" data-toggle="tab" href="#categoryDetails" aria-controls="new" value='1' aria-expanded="true"><b>Active</b>
                                  <span class="tag tag tag tag-pill float-xs-right mr-1" style="background-color: #000;"></span></a>
                                </li>
                              <li class="nav-item ">
                                <a class="nav-link categoryDetails" id="processTab" value='2' data-toggle="tab" href="#categoryDetails" aria-controls="process"><b>In Active</b> 
                                <span class="tag tag tag-danger tag-pill float-xs-right mr-1" style="background-color: #000;" ></span></a>
                              </li>
                            </ul><br>
                            <div role="tabpanel" class="tab-pane fade active in" id="categoryDetails" aria-labelledby="newTab" aria-expanded="true">
							<div class="table-responsive">
                                <table class="table table-striped table-bordered" id="category"> 
                                    <thead>
                                        <tr style="background-color: #fff;">
                                            <th>Id</th>
                                            <th>Action</th>
                                            <th>Packing</th>
                                            <th>Created By</th>
                                            <th>Created On</th>
                                            <th>Updated By</th>
                                            <th>Updated On</th>
                                        </tr>
                                    </thead>
                                </table>
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
    $("#category").DataTable({
        "destroy":true,
        "order": [[ 0, "desc" ]],
        "serverSide":true,
        "responsive":true,
        "deferRender":true,
        "ajax":"packing_ssp.php?appcode="+appcode+"&id=1",
    });
    $(".categoryDetails").click(function()
    {
        var id = $(this).attr("value");
        $("#category").DataTable({
            "destroy":true,
            "order": [[ 0, "desc" ]],
            "serverSide":true,
            "responsive":true,
            "deferRender":true,
            "ajax":"packing_ssp.php?appcode="+appcode+"&id="+id,
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
            closeOnCancel: true
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
                            window.location.assign("packing.php");
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
        //alert(tname);
        swal({
            title: "Alert Confirm",
            text: "Are you sure want to Restore?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DA4453",
            confirmButtonText: "Yes !",
            cancelButtonText: "No !",
            closeOnConfirm: false,
            closeOnCancel: true
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
                            window.location.assign("packing.php");
                        },1000);
                    }
                    else
                    {
                        swal(data);
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
    var urlpathname = 'packing_add.php';
</script>
<script type="text/javascript" src="rid.js"></script>