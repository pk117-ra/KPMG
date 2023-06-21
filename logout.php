<?php
session_start();
//session_destroy();
    $userId = $_SESSION['kpmUserIdS'];
    $appCode= $_SESSION['kpmAppCodeS'];
    include('config.php');
    
    $getLastActivityLog = mysqli_query($conn, "SELECT * FROM tone_activity_log WHERE UserId = '$userId' AND AppCode = '$appCode' ORDER BY Id DESC");
    $rowLastActivityLog = mysqli_fetch_assoc($getLastActivityLog);
    $lastActivityId = $rowLastActivityLog['Id'];
    $updateActivity = mysqli_query($conn, "UPDATE tone_activity_log SET LastLogoutDateTime = NOW(),LastActivity = NOW() WHERE Id='$lastActivityId'");

	unset($_SESSION['kpmUserIdS']);
	unset($_SESSION['kpmUserTableIdS']);
	unset($_SESSION['kpmLastNameS']);
	unset($_SESSION['kpmMobileNumberS']);
	unset($_SESSION['kpmLicenseName']);
	unset($_SESSION['kpmEmailS']);
	unset($_SESSION['kpmAppCodeS']);
	unset($_SESSION['kpmDesignationS']);
	unset($_SESSION['kpmBranchS']);
	unset($_SESSION['kpmAdminS']);
	unset($_SESSION['kpmProfileS']);
	unset($_SESSION['activityUniqueCode']);
	unset($_SESSION['opprid']);
	unset($_SESSION['opprbid']);
	unset($_SESSION['opprcid']);
	unset($_SESSION['oppruid']);
?>
<script type="text/javascript">
	window.location.assign('login.php');
</script>