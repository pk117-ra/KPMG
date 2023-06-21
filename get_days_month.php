<?php
$month = $_POST['data1'];
$year = $_POST['data2'];
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
for ($i=1; $i <= $days ; $i++) 
{ 
	if($i==date('d'))
	{
		echo "<option value='".$i."' selected>".$i."</option>";	
	}
	else
	{
		echo "<option value='".$i."'>".$i."</option>";
	}
	
}
?>