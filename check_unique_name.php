<?php 
	session_start();
	include("config.php");
	$appCode = $_SESSION['kpmAppCodeS'];
	$tableName = $_REQUEST['tableName'];
	$columnName = $_REQUEST['columnName'];
	$value = $_REQUEST['value'];
	$count=0;
	if($query=mysqli_query($conn, "SELECT count(*) as NameCount FROM $tableName WHERE $columnName='$value' AND AppCode = '$appCode'"))
	{
		$row=mysqli_fetch_assoc($query);
		$count=$row['NameCount'];
	}
	if($count==0)
	{
		echo "No";
	}
	else
	{
		echo "Yes";
	}
?>