<?php 
include 'config.php';
include 'ssp.customized.class.php';
$appCode = $_REQUEST['appcode'];
$id = $_REQUEST['id'];
$table ="supplier";
$primaryKey ="SupplierId";
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
$join = 'FROM `supplier` as a LEFT JOIN user_master as b ON a.CreatedBy = b.UserId AND a.AppCode = b.AppCode ';
// Page Connection //
$columns = array(
		array('db' => 'a.SupplierId' , "dt" => 0 ,'field' => 'SupplierId'),
		array('db' => 'a.SupplierId' , "dt" => 1 ,'field' => 'SupplierId' , 'formatter' => function($d,$r)
			{
				if(idget() == 1)
				{
					return "<a href='supplier_update.php?supplierId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' style='font-size: 25px; color: #6f42c1;' data-toggle='tooltip' title='Edit'><i class= 'fa fa-edit'></i></a>&nbsp;<a href='supplier_view.php?custId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' ><img src='app-assets/view.svg' style='height:25px;width:25px;' class='viewid'  aria-hidden='true' data-toggle='tooltip' title='View Documents'></a>&nbsp;";
				}
				elseif(idget() == 2)
				{
					return "&nbsp;&nbsp;<i class='fa fa-undo restoreid' tname='supplier' acode ='".appcodeget()."' restoreid = '".$d."' colname = 'SupplierId' aria-hidden='true' style='font-size: 23px;cursor:pointer; color: red;' data-toggle='tooltip' title='Restore'></i>";
				}
			}),
		array('db' => 'a.SupplierName' , "dt" => 2 ,'field' => 'SupplierName'),
		array('db' => 'a.Email' , "dt" => 3 ,'field' => 'Email'),
		array('db' => 'a.Address1' , "dt" => 4,'field'=> 'Address1' ),
		array('db' => 'a.Telephone' , "dt" => 5,'field'=> 'Telephone' ),
		array('db' => 'a.FaxNumber' , "dt" => 6,'field'=> 'FaxNumber' ),
	);
echo json_encode(
    SSP::SIMPLE($_GET, $sql_data, $table, $primaryKey, $columns,$join,$where)
);
?>