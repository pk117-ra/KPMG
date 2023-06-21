<?php 
  include("header.php");
  include("sidebar.php");
  $supplierId = base64_decode(base64_decode(base64_decode(base64_decode($_REQUEST['supplierId']))));
  $getCategory ="SELECT * FROM supplier WHERE SupplierId = '$supplierId' AND AppCode = '$appCode' AND Deleted = 'No'";
  $conCategory = mysqli_query($conn,$getCategory);
  $rowCategory = mysqli_fetch_assoc($conCategory);
  $SupplierId11 = $rowCategory['SupplierId'];
  $supplierName = $rowCategory['SupplierName'];
  $createdDateTime = strtotime($rowCategory['CreatedAt']);
  $createdById = $rowCategory['CreatedBy'];
?>
<!-- Page Connection   -->
<!-- category_details.php, check_unique_name.php -->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title">Update Supplier</h3>
      </div>
    </div>
    <!-- Basic form layout section start -->
    <div class="content-body">
      <section id="basic-form-layouts">
        <div class="card" style="min-height: 510px; ">
          <div class="card-body collapse in">
            <div class="card-block">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                  <form class="form form-horizontal" action="" method="post">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Supplier Name<span style="color: red;font-size: 14px;">*</span></label>
                            <input type="text" id="supplierName"  class="form-control" name="supplierName" value="<?php echo $rowCategory['SupplierName']; ?>"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Address<span style="color: red;font-size: 14px;">*</span></label>
                            <input type="text" id="address" value="<?php echo $rowCategory['Address1']; ?>"  class="form-control" name="address"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Tel Number</label>
                            <input type="text" id="telNumber" value="<?php echo $rowCategory['Telephone']; ?>"  class="form-control" name="telNumber">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Email Id</label>
                            <input type="text" id="emailId" value="<?php echo $rowCategory['Email']; ?>"  class="form-control" name="emailId">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Fax Number</label>
                            <input type="text" id="faxNumber" value="<?php echo $rowCategory['FaxNumber']; ?>"  class="form-control" name="faxNumber">
                          </div>
                        </div>
                        
                      </div>
                      
                      <div class="col-md-6"></div>
                      <div class="col-md-3">
                        <center>
                          <a class="btnsizeupdate" style = "font-size: 35px; color: #FFAA1D;"  href= "supplier.php" data-toggle="tooltip" title="Back"><i class="fa fa-chevron-circle-left"></i></a>&nbsp;&nbsp;&nbsp;
                          <button type="submit" id = "submit" name="submit" value="Update"   style = "font-size: 35px; background-color: #fff; border: 2px solid #fff; color: #6f42c1; cursor:pointer;" data-toggle="tooltip" title="Save"><i class="fa fa-check-circle"></i></button>
                        </center>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                  </form>
                </div>
                <div class="col-md-1"></div>
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
if(isset($_POST['submit']))
{
  $supplierName = $_POST['supplierName'];
  $address = $_POST['address'];
  $telNumber = $_POST['telNumber'];
  $faxNumber = $_POST['faxNumber'];
  $emailId = $_POST['emailId'];
  $sqlSupplierName = "UPDATE supplier SET SupplierName = '$supplierName',Email = '$emailId',Address1 = '$address',Telephone = '$telNumber',FaxNumber = '$faxNumber' WHERE SupplierId = '$supplierId' AND AppCode = '$appCode' ";
  $conSupplierUpdate = mysqli_query($conn, $sqlSupplierName);
  if($conSupplierUpdate){
    ?>
      <script type="text/javascript">
        toastr.success('Supplier updated Successfully', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
        window.location.assign("supplier.php");  
        },1000);
      </script>
    <?php
  }else{
    ?>
      <script type="text/javascript">
        toastr.error('Supplier updated in Error', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
        window.location.assign("supplier.php");  
        },1000);
      </script>
    <?php
  }
}
?>
<script type="text/javascript">
  $("#supplierName").keyup(function () {
        var categoryName = $(this).val();
        $.ajax({
            type: "POST",
            url: "check_unique_name.php",
            data: { 'columnName':'SupplierName', 'value' : categoryName, 'tableName' : 'supplier' },
            success : function(data) 
            {
              if(data!="No")
              {

                $("#rpAlrt").removeClass("hidden");
                $("#check").addClass("hidden");
                $("#submit").addClass("hidden").attr("disabled","disabled");
              }
              else
              {
                $("#rpAlrt").addClass("hidden");
                $("#check").removeClass("hidden");
                $("#submit").removeClass("hidden").removeAttr("disabled");
              }
            }
        });return false;
    });
</script>

