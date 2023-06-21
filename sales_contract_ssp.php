<?php 
include 'config.php';
include 'ssp.customized.class.php';
$appCode = $_REQUEST['appcode'];
$id = $_REQUEST['id'];
$table ="sales_contract";
$primaryKey ="ContractId";
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
$join = 'FROM `sales_contract` as a LEFT JOIN user_master as b ON a.CreatedBy = b.UserId AND a.AppCode = b.AppCode left join supplier as c on c.SupplierId = a.SupplierId AND a.AppCode = c.AppCode left join products as d on d.ItemId = a.ProductId AND a.AppCode = d.AppCode';
// Page Connection //
$columns = array(
		array('db' => 'a.ContractId' , "dt" => 0 ,'field' => 'ContractId'),
		array('db' => 'a.ContractId' , "dt" => 1 ,'field' => 'ContractId' , 'formatter' => function($d,$r)
			{
				if(idget() == 1)
				{
					return "<a href='sales_contract_update.php?ContractId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' style='font-size: 25px; color: #6f42c1;' data-toggle='tooltip' title='Edit'><i class= 'fa fa-edit'></i></a>&nbsp;&nbsp;<i class='fa fa-trash deleteid' tname='sales_contract' deleteid = '".$d."' colname = 'ContractId' aria-hidden='true' style='font-size: 25px;cursor:pointer; color: red;' data-toggle='tooltip' title='Delete'></i>&nbsp;<a href='sales_contract_view.php?ContractId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' ><img src='app-assets/view.svg' style='height:25px;width:25px;' class='viewid'  aria-hidden='true' data-toggle='tooltip' title='View'></a>&nbsp;";
				}
				elseif(idget() == 2)
				{
					return "&nbsp;&nbsp;<i class='fa fa-undo restoreid' tname='sales_contract' acode ='".appcodeget()."' restoreid = '".$d."' colname = 'ContractId' aria-hidden='true' style='font-size: 23px;cursor:pointer; color: red;' data-toggle='tooltip' title='Restore'></i>";
				}
			}),
		array('db' => 'c.SupplierName' , "dt" => 2 ,'field' => 'SupplierName'),
		array('db' => 'a.ContractNumber', "dt" => 3,'field'=> 'ContractNumber'),
        array('db' => 'a.ContractDate' , "dt" => 4,'field' => 'ContractDate'),
		array('db' => 'd.FullItemName' , "dt" => 5,'field'=> 'FullItemName' ),
		array('db' => 'a.Qty' , "dt" => 6,'field'=> 'Qty'),
		array('db' => 'a.TotalAmount' , "dt" => 7,'field'=> 'TotalAmount' ),
	);
echo json_encode(
    SSP::SIMPLE($_GET, $sql_data, $table, $primaryKey, $columns,$join,$where)
);
?>