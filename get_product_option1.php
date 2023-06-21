<option value="all">All</option>
<?php
include("config.php");
$aCode = $_REQUEST['aCode'];

$getState = "SELECT ItemId,FullItemName FROM products WHERE AppCode = '$aCode'";
$conState = mysqli_query($conn, $getState);
while($rowState = mysqli_fetch_assoc($conState))
{
    $stateId = $rowState['ItemId'];
    $stateName = $rowState['FullItemName'];
    ?>
    <option value="<?php echo $stateId; ?>"><?php echo $stateName; ?></option>
    <?php
}
?>