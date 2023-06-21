<?php 
  include("header.php");
  include("sidebar.php");
  $productId = base64_decode(base64_decode(base64_decode(base64_decode($_REQUEST['productId']))));
  $getCategory ="SELECT * FROM products WHERE ItemId = '$productId' AND AppCode = '$appCode' AND Deleted = 'No'";
  $conCategory = mysqli_query($conn,$getCategory);
  $rowCategory = mysqli_fetch_assoc($conCategory);
  $productIdN = $rowCategory['ItemId'];
  $productName = $rowCategory['FullItemName'];
  $createdDateTime = strtotime($rowCategory['CreatedDateTime']);
  $createdById = $rowCategory['CreatedBy'];
?>
<!-- Page Connection   -->
<!-- category_details.php, check_unique_name.php -->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title">Update PRODUCT</h3>
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
                      <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput1" style="padding-top: 10px">Product Name<span style="color: red; font-size: 14px;"> *</span></label>
                        <div class="col-md-6">
                          <input type="text" id="productName" class="form-control" name="productName" value="<?php echo $productName; ?>"   Required>
                          <label class="hidden" id="rpAlrt" style="color: #343c3f; font-weight: bold;">Product Name Already Exist !!</label>
                        </div>
                      </div>
                    
                      <div class="col-md-6"></div>
                      <div class="col-md-3">
                        <center>
                          <a class="btnsizeupdate" style = "font-size: 35px; color: #FFAA1D;"  href= "product_details.php" data-toggle="tooltip" title="Back"><i class="fa fa-chevron-circle-left"></i></a>&nbsp;&nbsp;&nbsp;
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
?>
<?php
if(isset($_POST['submit']))
{
    $productNameN = $_POST['productName'];
    $sqlProductUpdatec = "UPDATE products SET FullItemName = '$productNameN', UpdatedDateTime = Now() WHERE ItemId = '$productId' AND AppCode = '$appCode' AND Deleted = 'No'";
    $conProductUpdate = mysqli_query($conn, $sqlProductUpdatec);
    ?>
        <script type="text/javascript">
          toastr.success('Product Updated Successfully', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
          setTimeout(function()
          {
          window.location.assign("product_details.php");  
          },1000);
        </script>
    <?php
}
?>
<script type="text/javascript">
  $("#productName").keyup(function () {
        var categoryName = $(this).val();
        $.ajax({
            type: "POST",
            url: "check_unique_name.php",
            data: { 'columnName':'FullItemName', 'value' : categoryName, 'tableName' : 'products' },
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

