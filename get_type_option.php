<option value="">Select</option>
<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$typId = $_REQUEST['typId'];
$getState = "SELECT TypeId,TypeName FROM type WHERE AppCode = '$aCode'";
$conState = mysqli_query($conn, $getState);
while($rowState = mysqli_fetch_assoc($conState))
{
    $stateId = $rowState['TypeId'];
    $stateName = $rowState['TypeName'];
    if($typId == $stateId){
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