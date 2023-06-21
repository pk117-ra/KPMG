<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$pName = $_REQUEST['pName'];
$userId = $_REQUEST['uId'];
$recordId = date("YmdHis");
$getCategory = "SELECT ItemId FROM products WHERE AppCode = '$aCode'  ORDER BY ItemId desc";
$contCategory = mysqli_query($conn,$getCategory);
$rowtCategory = mysqli_fetch_assoc($contCategory);
$itemId = $rowtCategory['ItemId']+1;
$getCategoryName = "INSERT INTO products(AppCode,ItemId,FullItemName,RecordId, CreatedDateTime, CreatedBy)VALUES('$aCode','$itemId','$pName','$recordId', Now(), '$userId')";
$conCategoryName = mysqli_query($conn, $getCategoryName);
if($conCategoryName){
    echo 1;
}else{
    echo 0;
}
?>