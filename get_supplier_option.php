<option value="">Select</option>
<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$sId = $_REQUEST['sId'];
$getState = "SELECT SupplierId,SupplierName FROM supplier WHERE AppCode = '$aCode'";
$conState = mysqli_query($conn, $getState);
while($rowState = mysqli_fetch_assoc($conState))
{
    $stateId = $rowState['SupplierId'];
    $stateName = $rowState['SupplierName'];
    if($sId == $stateId){
        ?>
        <option value="<?php echo $stateId; ?>" selected><?php echo $stateName; ?></option>
        <?php
    }else{
        ?>
        <option value="<?php echo $stateId; ?>"><?php echo $stateName; ?></option>
        <?php
    }   
   
}
?>
<option value="upr">Add New +</option>