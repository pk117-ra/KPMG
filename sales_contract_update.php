<?php 
include("header.php");
include("sidebar.php");
include("crmphpfunctions.php");
$contractId = base64_decode(base64_decode(base64_decode(base64_decode($_REQUEST['ContractId']))));
$getInwardDetails ="SELECT * FROM sales_contract WHERE ContractId = '$contractId' AND AppCode = '$appCode' ";
$conInwardDetails = mysqli_query($conn,$getInwardDetails);
$rowInwardDetails = mysqli_fetch_assoc($conInwardDetails);
$sId = $rowInwardDetails['SupplierId'];
$pId = $rowInwardDetails['ProductId'];
$attachmentImage = $rowInwardDetails['Attachment'];
$attachmentUrl ="SalesContract/".$rowInwardDetails['Attachment'];
?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-xs-12">
        <h3 class="content-header-title">Sales Contract Update</h3>
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
                            <input type="date" id="contractDate"  class="form-control" name="contractDate" value="<?php echo $rowInwardDetails['ContractDate']; ?>" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Contract Number<span style="color: red;font-size: 14px;">*</span></label>
                            <input type="text" id="contractNumber"  class="form-control" name="contractNumber" value="<?php echo $rowInwardDetails['ContractNumber']; ?>"  required>
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
                            <input type="text" id="qty"  class="form-control" name="qty" value="<?php echo $rowInwardDetails['Qty']; ?>"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Unit Price<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="price"  class="form-control" name="price" value="<?php echo $rowInwardDetails['UnitPrice']; ?>"  required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Amount<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="amount"  class="form-control" name="amount" value="<?php echo $rowInwardDetails['Amount']; ?>"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Total Amount<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="totalAmount"  class="form-control" name="totalAmount" value="<?php echo $rowInwardDetails['TotalAmount']; ?>" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Payment Term<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="paymentTerm"  class="form-control" name="paymentTerm" value="<?php echo $rowInwardDetails['PaymentTerm']; ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Benef's Name</label>
                            <input type="text" id="benefName" class="form-control price" name="benefName" value="<?php echo $rowInwardDetails['BenefName']; ?>" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Benef's Address</label>
                            <input type="text" id="address" class="form-control address" name="address" value="<?php echo $rowInwardDetails['BenefAddress']; ?>"  >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Intermediary Bank</label>
                            <input type="text" id="interBankName" class="form-control interBankName" name="interBankName" value="<?php echo $rowInwardDetails['IntermediateBank']; ?>" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                          <label class="label-control" for="userinput1">Swift Code<span style="color: red;font-size:14px;"> *</span></label>
                          <input type="text" id="swiftCode" class="form-control swiftCode" name="swiftCode" value="<?php echo $rowInwardDetails['SwiftCode']; ?>" required >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Beneficiary's Bank<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="bankName" class="form-control bankName" name="bankName" value="<?php echo $rowInwardDetails['BankName']; ?>" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">USD A/C Number<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="accountNumber" class="form-control" name="accountNumber" value="<?php echo $rowInwardDetails['USDACNumber']; ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Swift Code<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="swiftCode1" class="form-control" name="swiftCode1" value="<?php echo $rowInwardDetails['SwiftCode1']; ?>" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Bank Address<span style="color: red;font-size:14px;"> *</span> </label>
                            <input type="text" id="bankAddress" class="form-control" name="bankAddress" value="<?php echo $rowInwardDetails['Address']; ?>" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Telephone Number<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="text" id="telNumber" class="form-control" name="telNumber" value="<?php echo $rowInwardDetails['Telephone']; ?>" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="label-control" for="userinput1">Attachment<span style="color: red;font-size:14px;"> *</span></label>
                            <input type="file" name="contractFile" class="form-control">
                          </div>
                          <?php
                            if($attachmentUrl != '')
                            {
                            ?>
                            <div class="col-md-4">
                            <a href="<?php echo $attachmentUrl;?>" target="_blank">
                            <?php 
                            $supplierFileExt = pathinfo($attachmentUrl, PATHINFO_EXTENSION);
                            if($attachmentUrl != '' AND $supplierFileExt != 'pdf')
                            {
                            ?>
                            <img src="<?php echo $attachmentUrl;?>" style="height: 30px;width: 30px;">
                            <?php
                            }
                            else if($supplierFileExt == 'pdf' AND $attachmentUrl != '')
                            {
                            ?>
                            <img src="app-assets/pdf.png" style="height: 30px;width: 30px;">
                            <?php
                            }
                            ?>
                            </a>
                            </div>
                            <?php
                            }
                            ?>
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
    $contractFileName= $attachmentImage;
  }
 
  $sqlInwardUpdate = "UPDATE sales_contract SET ContractDate = '$contractDate',SupplierId = '$supplierName',ProductId = '$productName',ContractNumber = '$contractNumber',Qty = '$qty',UnitPrice = '$price',Amount = '$amount',TotalAmount = '$totalAmount',PaymentTerm = '$paymentTerm',BenefName = '$benefName',BenefAddress = '$address',IntermediateBank = '$interBankName',SwiftCode = '$swiftCode',BankName = '$bankName',USDACNumber = '$accountNumber',SwiftCode1 = '$swiftCode1',Address = '$bankAddress',Telephone = '$telNumber',Attachment = '$contractFileName',UpdatedBy = '$userId', UpdatedAt = Now() WHERE ContractId  = '$contractId' AND AppCode = '$appCode' ";
  $conInwardUpdate = mysqli_query($conn, $sqlInwardUpdate);
  if($conInwardUpdate) 
  {
    ?>
    <script type="text/javascript">
        toastr.success('Contract Updated Successfully', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
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
        toastr.error('Contract Updated Error', '', {positionClass: 'toast-top-center', containerId: 'toast-top-center'});
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
var sId = '<?php echo $sId; ?>';
$.post("get_supplier_option.php",{aCode:aCode,sId:sId},function(data) 
{
  $("#supplierName").html(data);
});
var pId = '<?php echo $pId; ?>';
$.post("get_product_option.php",{aCode:aCode,pId:pId},function(data) 
{
  $("#productName").html(data);
});
</script>
