<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$tName = $_REQUEST['tName'];
$userId = $_REQUEST['uId'];
$recordId = date("YmdHis");
$getCategory = "SELECT PackingId FROM packing WHERE AppCode = '$aCode'  ORDER BY PackingId desc";
$contCategory = mysqli_query($conn,$getCategory);
$rowtCategory = mysqli_fetch_assoc($contCategory);
$packingId = $rowtCategory['PackingId']+1;
$getCategoryName = "INSERT INTO packing(AppCode,PackingId,PackingName,RecordId, CreatedDateTime, CreatedBy)VALUES('$aCode','$packingId','$tName','$recordId', Now(), '$userId')";
$conCategoryName = mysqli_query($conn, $getCategoryName);
if($conCategoryName){
    echo 1;
}else{
    echo 0;
}
?>