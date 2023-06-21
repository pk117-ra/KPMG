<?php
// This page used for restore the data
include 'config.php';
$tname = $_POST['data1'];
$appCode = $_POST['data2'];
$colId = $_POST['data3'];
$colName = $_POST['data4'];
if($appCode == '')
{
	// echo "UPDATE $tname SET Deleted = 'No' WHERE $colName = '$colId' AND AppCode = '$appCode'";
	$check = $conn->query("UPDATE $tname SET Deleted = 'No' WHERE $colName = '$colId'");
}
else
{
	$check = $conn->query("UPDATE $tname SET Deleted = 'No' WHERE $colName = '$colId' AND AppCode = '$appCode'");
}
if($check)
{
	echo "yes";
}
else
{
	echo "no";
}
?>