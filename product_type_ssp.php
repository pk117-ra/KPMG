<?php 
session_start();
include 'config.php';
include 'ssp.customized.class.php';
$appCode = $_REQUEST['appcode'];
$id = $_REQUEST['id'];
$table ="type";
$primaryKey ="TypeTableId";
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
// echo $where;
 $join = 'FROM `type` as a LEFT JOIN user_master as b ON a.CreatedBy = b.UserId AND a.AppCode = b.AppCode';
  // Page Connection //
 // category_update.php//
$columns = array(
		array('db' => 'a.TypeId' , "dt" => 0 ,'field' => 'TypeId'),
		array('db' => 'a.TypeId' , "dt" => 1 ,'field' => 'TypeId' , 'formatter' => function($d,$r)
			{
				if(idget() == 1)
				{
					return "<a href='product_type_update.php?cateId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' style='font-size: 25px; color: #6f42c1;' data-toggle='tooltip' title='Edit'><i class= 'fa fa-edit'></i></a>&nbsp;&nbsp;<i class='fa fa-trash deleteid' tname='type' acode ='".appcodeget()."' deleteid = '".$d."' colname = 'TypeId' aria-hidden='true' style='font-size: 25px;cursor:pointer; color: red' data-toggle='tooltip' title='Delete' data-toggle='tooltip' title='Delete'></i>";
				}
				elseif(idget() == 2)
				{
					return "&nbsp;&nbsp;<i class='fa fa-undo restoreid' tname='type' acode ='".appcodeget()."' restoreid = '".$d."' colname = 'TypeId' aria-hidden='true' style='font-size: 23px;cursor:pointer; color: red;' data-toggle='tooltip' title='Restore'></i>";
				}
			}),
		array('db' => 'a.TypeName' , "dt" => 2 ,'field' => 'TypeName'),
		array('db' => 'b.UserFirstName' , "dt" => 3 ,'field' => 'UserFirstName'),
		array('db' => 'a.CreatedDateTime' , "dt" => 4 ,'field' => 'CreatedDateTime' , 'formatter' => function($d,$r)
			{
				return date("d-m-Y H:i:s",strtotime($d));
			}),
		array('db' => 'b.UserFirstName' , "dt" => 5 ,'field' => 'UserFirstName'),
		array('db' => 'a.UpdatedDateTime' , "dt" => 6 ,'field' => 'UpdatedDateTime' , 'formatter' => function($d,$r)
			{
				return date("d-m-Y H:i:s",strtotime($d));
			}),

	);
// SELECT a.CategoryId as CategoryId,a.ProductCategoryName as ProductCategoryName,b.UserFirstName as CName,a.CreatedDateTime as CreatedDateTime,a.UpdatedDateTime as UpdatedDateTime FROM `category` as a LEFT JOIN user_master as b ON a.CreatedBy = b.UserId AND a.AppCode = b.AppCode

echo json_encode(
    SSP::SIMPLE($_GET, $sql_data, $table, $primaryKey, $columns,$join,$where)
);
?>