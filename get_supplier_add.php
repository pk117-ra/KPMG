<?php
include("config.php");
$aCode = $_REQUEST['aCode'];
$sName = $_REQUEST['sName'];
$userId = $_REQUEST['uId'];
$getCategoryName = "INSERT INTO supplier(AppCode,SupplierName, CreatedAt, CreatedBy)VALUES('$aCode', '$sName', Now(), '$userId')";
$conCategoryName = mysqli_query($conn, $getCategoryName);
if($conCategoryName){
    echo 1;
}else{
    echo 0;
}
?>