<?php 
//page connections
session_start();
include("config.php");
include("crmphpfunctions.php");   
$appCode = $_SESSION['kpmAppCodeS'];
$outwardId = $_REQUEST['outwardId'];

$sqlGetLeadName = "SELECT StatusId,DeliveryRemarks FROM outward_entry WHERE OutwardId = '$outwardId' AND AppCode = '$appCode' ";
$conGetLeadName = mysqli_query($conn,$sqlGetLeadName);
$rowGetLeadName = mysqli_fetch_assoc($conGetLeadName);
$statusId = $rowGetLeadName['StatusId'];
$deliveryRemarks = $rowGetLeadName['DeliveryRemarks'];
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <form class="form form-horizontal" action="" method="post">
        <div class="form-body">
            <div class="form-group row">
            <input type="hidden" name="outwardId" value="<?= $outwardId?>">
            <input type="hidden" name="appCode" value="<?= $appCode?>">
            <label class="col-md-4 label-control" for="userinput1"> Despatch Status</label>
            <div class="col-md-8">
                <select class="form-control select2" name="statusId" style="width: 100%">
                    <option value="" selected="" disabled="">Select</option>
                    <?php
                    $getCampaignNumbers = mysqli_query($conn, "SELECT StatusId,StatusName FROM delivery_status ");
                    while($rowCampaignNumbers = mysqli_fetch_assoc($getCampaignNumbers))
                    {
                        if($rowCampaignNumbers['StatusId'] == $statusId){
                            ?>
                                <option selected value="<?=$rowCampaignNumbers['StatusId'];?>"><?=$rowCampaignNumbers['StatusName'];?></option>
                            <?php
                        }else{
                            ?>
                            <option value="<?=$rowCampaignNumbers['StatusId'];?>"><?=$rowCampaignNumbers['StatusName'];?></option>
                            <?php
                        }
                    }	
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 label-control" for="userinput1">Remarks </label>
            <div class="col-md-8">
                <textarea class="form-control" name="remarks"><?php echo $deliveryRemarks;?></textarea>
            </div>
        </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
            <center>
                <a class="btnsizeupdate" style = "font-size: 35px; color: #FFAA1D;"  href= "outward_details.php" data-toggle="tooltip" title="Back"><i class="fa fa-chevron-circle-left"></i></a>&nbsp;&nbsp;&nbsp;
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
