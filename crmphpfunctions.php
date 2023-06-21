<?php
function getCustomerName($conn, $customerId,$appCode)
{
    $getBranchName = "SELECT CustomerName FROM customer WHERE CustomerId  = '$customerId' AND AppCode ='$appCode'";
    $conBranchName = mysqli_query($conn, $getBranchName);
    $rowBranchName = mysqli_fetch_assoc($conBranchName);
    return $rowBranchName['CustomerName'];
}
function getCustomerLocationName($conn, $customerId,$appCode)
{
    $getBranchName = "SELECT City FROM customer WHERE CustomerId  = '$customerId' AND AppCode ='$appCode'";
    $conBranchName = mysqli_query($conn, $getBranchName);
    $rowBranchName = mysqli_fetch_assoc($conBranchName);
    return $rowBranchName['City'];
}
function getSupplierName($conn, $supplierId,$appCode)
{
    $getBranchName = "SELECT SupplierName FROM supplier WHERE SupplierId = '$supplierId' AND AppCode ='$appCode'";
    $conBranchName = mysqli_query($conn, $getBranchName);
    $rowBranchName = mysqli_fetch_assoc($conBranchName);
    return $rowBranchName['SupplierName'];
}
function getProductName($conn, $itemId,$appCode)
{
    $getCampaignNumber = "SELECT FullItemName FROM products WHERE ItemId = '$itemId' AND AppCode ='$appCode'";
    $conCampaignNumber = mysqli_query($conn, $getCampaignNumber);
    $rowCampaignNumber = mysqli_fetch_assoc($conCampaignNumber);
    return $rowCampaignNumber['FullItemName'];
}
function getTypeName($conn, $typeId,$appCode)
{
    $getLeadSubSourceName = "SELECT TypeName FROM type WHERE TypeId = '$typeId' AND AppCode ='$appCode'";
    $conLeadSubSourceName = mysqli_query($conn, $getLeadSubSourceName);
    $rowLeadSubSourceName = mysqli_fetch_assoc($conLeadSubSourceName);
    return $rowLeadSubSourceName['TypeName'];
}
function getPackingName($conn, $packingId,$appCode)
{
    $getVendorName = "SELECT PackingName FROM packing WHERE PackingId = '$packingId' AND AppCode ='$appCode'";
    $conVendorName = mysqli_query($conn, $getVendorName);
    $rowVendorName = mysqli_fetch_assoc($conVendorName);
    return $rowVendorName['PackingName'];
}
function getDespatchName($conn, $statusId)
{
    $getVendorName = "SELECT StatusName FROM delivery_status WHERE StatusId = '$statusId' ";
    $conVendorName = mysqli_query($conn, $getVendorName);
    $rowVendorName = mysqli_fetch_assoc($conVendorName);
    return $rowVendorName['StatusName'];
}
?>