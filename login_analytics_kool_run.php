<?php
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1);
	require_once "koolreport/autoload.php";
	require_once "config.php";
	$report = $_REQUEST['report'];
	$partner = $_REQUEST['partner'];
	$from = $_REQUEST['from'];
	$to = $_REQUEST['to'];
	$admin = $_REQUEST['admin'];
	$child = $_REQUEST['child'];
	$appCode = $_REQUEST['appCode'];
	$query1 = $conn->query("SELECT MysqlQuater FROM month_report WHERE Id=MONth(CURRENT_DATE())");
	$fetch1 = $query1->fetch_assoc();
	$quater = $fetch1['MysqlQuater'];
	if($admin !='Yes')
	{
		$query11 = $conn->query("SELECT UserId FROM user_master where UserId IN ($child) AND AppCode ='$appCode' AND AccessWebApp ='Yes'");
	}
	else
	{
		$query11 = $conn->query("SELECT UserId FROM user_master WHERE AppCode ='$appCode' AND AccessWebApp ='Yes'");
	}
	
	$id = array_column(mysqli_fetch_all($query11,MYSQLI_ASSOC),"UserId");
	
	require_once "login_analytics_kool.php";
	
	$report2 = new login_analytics_kool(array(
		"report" => $report,
		"partner" => $partner,
		"from" =>$from,
		"to" => $to,
		"quater" => $quater,
		"id" => $id,
		"appCode" => $appCode,
		"admin"=>$_REQUEST['admin'],
		"child"=>$_REQUEST['child'],
	));
	$report2->run()->render();
?>