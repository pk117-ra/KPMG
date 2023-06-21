<option value="all">All</option>
<?php
include("config.php");
$aCode = $_REQUEST['aCode'];

$getState = "SELECT SupplierId,SupplierName FROM supplier WHERE AppCode = '$aCode'";
$conState = mysqli_query($conn, $getState);
while($rowState = mysqli_fetch_assoc($conState))
{
    $stateId = $rowState['SupplierId'];
    $stateName = $rowState['SupplierName'];
    ?>
    <option value="<?php echo $stateId; ?>"><?php echo $stateName; ?></option>
    <?php
}
?>
