<?php
$userId = $_REQUEST['uId'];
$dateTime = date('YmdHis');
$recordId = $userId.$dateTime;
echo $recordIdE = base64_encode($recordId);
?>