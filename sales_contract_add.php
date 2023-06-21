<?php 
include("header.php");
include("sidebar.php");
include("crmphpfunctions.php");
$uIdE = $_REQUEST['uId'];
$recordId = base64_decode($uIdE);
?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title">Sales Contract Add</h3>
      </div>
    </div>
    <!-- Basic form layout section start -->
     <div class="content-body">
      <section id="basic-form-layouts">
        <div class="card" style="min-height: 445px;">
          <div class="card-body collapse in">
            <div class="card-block">
              <div class="row">
                <div class="col-md-10 offset-md-1">
                  <form class="form form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Sales Contract Date<span style="color: red;font-size: 14px;">*</span></label>
                            <input type="date" id="contractDate"  class="form-control" name="contractDate" value="<?php print(date("Y-m-d")); ?>" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Contract Number<span style="color: red;font-size: 14px;">*</span></label>
                            <input type="text" id="contractNumber"  class="form-control" name="contractNumber"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Supplier Name<span style="color: red;font-size:14px;"> *</span></label>
                            <select class="select2 form-control supplierName" id = "supplierName" name = "supplierName" Required>
                            </select>
                          </div>
                          <div class="form-group uprClass hidden" id="uprClass">
                            <div class="row">
                              <div class="col-md-9">
                                <input type="text" id="newSupplier"  class="form-control" name="newSupplier" >
                              </div>
                              <div class="col-md-3">
                                <button  id="addSupplier" name="addSupplier" class="addSupplier" >Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Product Name<span style="color: red;font-size:14px;"> *</span></label>
                            <select class="select2 form-control productName" id = "productName" name = "productName" Required>
                            </select>
                          </div>
                          <div class="form-group uprClass1 hidden" id="uprClass1">
                            <div class="row">
                              <div class="col-md-9">
                                <input type="text" id="newProduct"  class="form-control" name="newProduct" >
                              </div>
                              <div class="col-md-3">
                                <button  id="addProduct" name="addProduct" class="addProduct" >Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Quantity<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="qty"  class="form-control" name="qty"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Unit Price<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="price"  class="form-control" name="price"  required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Amount<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="amount"  class="form-control" name="amount"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Total Amount<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="totalAmount"  class="form-control" name="totalAmount" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Payment Term<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="paymentTerm"  class="form-control" name="paymentTerm" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Benef's Name</label>
                            <input type="text" id="benefName" class="form-control price" name="benefName"  >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Benef's Address</label>
                            <input type="text" id="address" class="form-control address" name="address"  >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Intermediary Bank</label>
                            <input type="text" id="interBankName" class="form-control interBankName" name="interBankName"  >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                          <label class="label-control" for="userinput1">Swift Code<span style="color: red;font-size:14px;"> *</span></label>
                          <input type="text" id="swiftCode" class="form-control swiftCode" name="swiftCode" required >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Beneficiary's Bank<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="bankName" class="form-control bankName" name="bankName" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">USD A/C Number<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="accountNumber" class="form-control" name="accountNumber" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Swift Code<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="swiftCode1" class="form-control" name="swiftCode1" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Bank Address<span style="color: red;font-size:14px;"> *</span> </label>
                            <input type="text" id="bankAddress" class="form-control" name="bankAddress" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Telephone Number<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="telNumber" class="form-control" name="telNumber" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Attachment<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="file" name="contractFile" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <center>
                            <a class="btnsizeupdate" style = "font-size: 35px; color: #FFAA1D;"  href= "sales_contract.php" data-toggle="tooltip" title="Back"><i class="fa fa-chevron-circle-left"></i></a>&nbsp;&nbsp;&nbsp;
                            <button type="submit" name="submit" value="submit" class="submit" style = "font-size: 35px; background-color: #fff; border: 2px solid #fff; color: #6f42c1; cursor:pointer;" data-toggle="tooltip" title="Save"><i class="fa fa-check-circle" style="color: #6f42c1;"></i></button>
                          </center>
                        </div>
                      </div>
                    </div>
                  </form>
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
if(isset($_POST['submit']))
{
  $contractDate = $_POST['contractDate'];
  $contractNumber = $_POST['contractNumber'];
  $supplierName = $_POST['supplierName'];
  $productName = $_POST['productName'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];
  $amount = $_POST['amount'];
  $totalAmount = $_POST['totalAmount'];
  $paymentTerm = $_POST['paymentTerm'];
  $benefName = $_POST['benefName'];
  $address = $_POST['address'];
  $bankName = $_POST['bankName'];
  $swiftCode = $_POST['swiftCode'];
  $interBankName = $_POST['interBankName'];
  $accountNumber = $_POST['accountNumber'];
  $swiftCode1 = $_POST['swiftCode1'];
  $bankAddress = $_POST['bankAddress'];
  $telNumber = $_POST['telNumber'];
  $contractFile =$_FILES['contractFile']['name'];
  if($contractFile != '')
  {
    $extension = pathinfo($contractFile);
    $contractFileName = "contractFile".date('Y-m-d-H-i-s').$userId.".".$extension['extension'];
    $contractFileTem =$_FILES['contractFile']['tmp_name'];
    $moviefile = "SalesContract/" .$contractFileName;
    move_uploaded_file($contractFileTem, $moviefile);
  }
  else
  {
    $contractFileName='';
  }

 
  $sqlInsertProduct = $conn->query("INSERT INTO sales_contract(AppCode, ContractDate, SupplierId, ProductId, ContractNumber, Qty,  UnitPrice, Amount, TotalAmount, PaymentTerm, BenefName, BenefAddress, IntermediateBank, SwiftCode, BankName, USDACNumber,SwiftCode1,Address,Telephone,CreatedBy, CreatedAt,Attachment) VALUES ('$appCode', '$contractDate', '$supplierName', '$productName', '$contractNumber', '$qty', '$price', '$amount', '$totalAmount', '$paymentTerm', '$benefName', '$address', '$interBankName',  '$swiftCode', '$bankName', '$accountNumber','$swiftCode1','$bankAddress','$telNumber','$userId', NOW(),'$contractFileName' )");
  if($sqlInsertProduct) 
  {
    ?>
    <script type="text/javascript">
        toastr.success('Contract Added Successfully', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
         window.location.assign("sales_contract.php");  
        },1000);
      </script>
    <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
        toastr.error('Contract Added Error', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
        setTimeout(function()
        {
         window.location.assign("sales_contract.php");  
        },1000);
      </script>
    <?php
  }
}
?>
<script type="text/javascript">
// Add New Supplier.....
var aCode = '<?php echo $appCode; ?>';
var uId = '<?php echo $userId; ?>';
$.post("get_supplier_option.php",{aCode:aCode},function(data) 
{
  $("#supplierName").html(data);
});
$(document).on('change','#supplierName',function()
{
  var sId = $('#supplierName').val();
  if(sId == 'upr'){
    $("#uprClass").slideDown();
    $("#uprClass").removeClass("hidden"); 
  }else{
    $("#uprClass").slideUp().addClass("hidden",true);
  }
});
$('#addSupplier').click(function() {
  var sName = $('#newSupplier').val();
  if(sName != ''){
    $.post("get_supplier_add.php",{aCode:aCode,sName: sName,uId: uId},function(data) 
    {
      if(data != 0)
      {
        $.post("get_supplier_option.php",{aCode:aCode},function(data) 
        {
          $("#supplierName").html(data);
        });
        $("#uprClass").slideUp().addClass("hidden",true);
      }
      else
      {
        alert('Supplier Name cannot be empty!!!');
      }
    });
  }else{
    alert('Supplier Name cannot be empty!!!');
  }
});
// Add New Product.....
var aCode = '<?php echo $appCode; ?>';
var uId = '<?php echo $userId; ?>';
$.post("get_product_option.php",{aCode:aCode},function(data) 
{
  $("#productName").html(data);
});
$(document).on('change','#productName',function()
{
  var sId = $('#productName').val();
  if(sId == 'upr'){
    $("#uprClass1").slideDown();
    $("#uprClass1").removeClass("hidden"); 
  }else{
    $("#uprClass1").slideUp().addClass("hidden",true);
  }
});
$('#addProduct').click(function() {
  var pName = $('#newProduct').val();
  if(pName != ''){
    $.post("get_product_add.php",{aCode:aCode,pName: pName,uId: uId},function(data) 
    {
      //alert(data);
      if(data != 0)
      {
        $.post("get_product_option.php",{aCode:aCode},function(data) 
        {
          $("#productName").html(data);
        });
        $("#uprClass1").slideUp().addClass("hidden",true);
      }
      else
      {
        alert('Product Name cannot be empty!!!');
      }
    });
  }else{
    alert('Product Name cannot be empty!!!');
  }
});
</script>
