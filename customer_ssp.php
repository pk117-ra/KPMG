<?php 
include 'config.php';
include 'ssp.customized.class.php';
$appCode = $_REQUEST['appcode'];
$id = $_REQUEST['id'];
$table ="customer";
$primaryKey ="CustomerId";
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
$join = 'FROM `customer` as a LEFT JOIN user_master as b ON a.CreatedBy = b.UserId AND a.AppCode = b.AppCode ';
// Page Connection //
$columns = array(
		array('db' => 'a.CustomerId' , "dt" => 0 ,'field' => 'CustomerId'),
		array('db' => 'a.CustomerId' , "dt" => 1 ,'field' => 'CustomerId' , 'formatter' => function($d,$r)
			{
				if(idget() == 1)
				{
					return "<a href='customer_update.php?custId=".base64_encode(base64_encode(base64_encode(base64_encode($d))))."' style='font-size: 25px; color: #6f42c1;' data-toggle='tooltip' title='Edit'><i class= 'fa fa-edit'></i></a>&nbsp;&nbsp;";
				}
				elseif(idget() == 2)
				{
					return "&nbsp;&nbsp;<i class='fa fa-undo restoreid' tname='customer' acode ='".appcodeget()."' restoreid = '".$d."' colname = 'CustomerId' aria-hidden='true' style='font-size: 23px;cursor:pointer; color: red;' data-toggle='tooltip' title='Restore'></i>";
				}
			}),
		array('db' => 'a.CustomerName' , "dt" => 2 ,'field' => 'CustomerName'),
		array('db' => 'a.ContactPerson' , "dt" => 3 ,'field' => 'ContactPerson'),
		array('db' => 'a.City' , "dt" => 4,'field'=> 'City' ),
		array('db' => 'a.Telephone' , "dt" => 5,'field'=> 'Telephone' ),
		array('db' => 'a.Mobile' , "dt" => 6,'field'=> 'Mobile' ),
		array('db' => 'a.Email' , "dt" => 7,'field'=> 'Email'),
		array('db' => 'a.GSTNumber' , "dt" => 8,'field'=> 'GSTNumber' ),
        array('db' => 'a.PANNumber' , "dt" => 9 ,'field' => 'PANNumber'),
	);
echo json_encode(
    SSP::SIMPLE($_GET, $sql_data, $table, $primaryKey, $columns,$join,$where)
);
?>