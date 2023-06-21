<?php 
include 'config.php';
include 'ssp.customized.class.php';
$appCode = $_REQUEST['appcode'];
$id = $_REQUEST['id'];
$table ="products";
$primaryKey ="ItemTableId";
function appcodeget()
{
	return $_REQUEST['appcode'];
}
function idget()
{
	return $_REQUEST['id'];
}
if($id == 1)
{
	$where = "a.AppCode = '$appCode' AND a.Deleted = 'No'";
}
elseif($id == 2)
{
	$where = "a.AppCode = '$appCode' AND a.Deleted = 'Yes'";
}	
$join = 'FROM `products` as a LEFT JOIN user_master as b ON a.CreatedBy = b.UserId AND a.AppCode = b.AppCode ';
// Page Connection //
$columns = array(
	array('db' => 'a.ItemId' , "dt" => 0 ,'field' => 'ItemId'),
	array('db' => 'a.ItemId' , "dt" => 1 ,'field' => 'ItemId' , 'formatter' => function($d,$r)
	{
		if(idget() == 1)
		{
			return "<a href='product_view.php?productId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' ><img src='app-assets/view.svg' style='height:25px;width:25px;' class='viewid'  aria-hidden='true' data-toggle='tooltip' title='View Documents'></a>&nbsp;";
		}
		elseif(idget() == 2)
		{
			return "&nbsp;&nbsp;<i class='fa fa-undo restoreid' tname='products' acode ='".appcodeget()."' restoreid = '".$d."' colname = 'ItemId' aria-hidden='true' style='font-size: 23px;cursor:pointer; color: red;' data-toggle='tooltip' title='Restore'></i>";
		}
	}),
	array('db' => 'a.FullItemName' , "dt" => 2 ,'field' => 'FullItemName'),
	array('db' => 'a.TotalIn' , "dt" => 3 ,'field' => 'TotalIn'),
	array('db' => 'a.TotalOut' , "dt" => 4,'field'=> 'TotalOut' ),
	array('db' => 'a.InStock' , "dt" => 5,'field'=> 'InStock' ),
	array('db' => 'a.TotalDamage' , "dt" => 6,'field'=> 'TotalDamage' ),
);
echo json_encode(
    SSP::SIMPLE($_GET, $sql_data, $table, $primaryKey, $columns,$join,$where)
);
?>