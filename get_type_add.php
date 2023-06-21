<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$tName = $_REQUEST['tName'];
$userId = $_REQUEST['uId'];
$recordId = date("YmdHis");
$getCategory = "SELECT TypeId FROM type WHERE AppCode = '$aCode'  ORDER BY TypeId desc";
$contCategory = mysqli_query($conn,$getCategory);
$rowtCategory = mysqli_fetch_assoc($contCategory);
$typeId = $rowtCategory['TypeId']+1;
$getCategoryName = "INSERT INTO type(AppCode,TypeId,TypeName,RecordId, CreatedDateTime, CreatedBy)VALUES('$aCode','$typeId','$tName','$recordId', Now(), '$userId')";
$conCategoryName = mysqli_query($conn, $getCategoryName);
if($conCategoryName){
    echo 1;
}else{
    echo 0;
}
?>