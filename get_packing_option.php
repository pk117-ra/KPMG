<option value="">Select</option>
<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$pacId = $_REQUEST['pacId'];
$getState = "SELECT PackingId,PackingName FROM packing WHERE AppCode = '$aCode'";
$conState = mysqli_query($conn, $getState);
while($rowState = mysqli_fetch_assoc($conState))
{
    $stateId = $rowState['PackingId'];
    $stateName = $rowState['PackingName'];
    if($stateId == $pacId){
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