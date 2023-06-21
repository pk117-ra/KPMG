<option value="">Select</option>
<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$pId = $_REQUEST['pId'];
$getState = "SELECT ItemId,FullItemName FROM products WHERE AppCode = '$aCode'";
$conState = mysqli_query($conn, $getState);
while($rowState = mysqli_fetch_assoc($conState))
{
    $stateId = $rowState['ItemId'];
    $stateName = $rowState['FullItemName'];
    if($pId == $stateId){
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