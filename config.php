<?php
//Master
$host = "localhost";
$username = "root";
$password = "";
$dbname = "re_crm"; 
$port = "3307"; 

$conn = mysqli_connect($host.":".$port,$username,$password,$dbname);
$getSecretSiteKey=$conn->query("SELECT SiteKey,SecretKey FROM googlekey");
$fetchKeys=$getSecretSiteKey->fetch_assoc();
$googleSiteKey=$fetchKeys['SiteKey'];
$googleSecretKey=$fetchKeys['SecretKey'];
if (!$conn) 
{
 	die("DB connection_aborted");
} 
// error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$TodayDate =  date("d/m/Y");
$TimeNow =  date("H:i:s");
$TodayMonth =  date("m");
$TodayMonthChar =  date("M");
$TodayYearChar =  date("Y");
$TodayYearMonth= date("Y-m");
$MysqlDateTimeNow = date("Y-m-d H:i:s");

function curlkpmg($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$sql_data = array(
"user"=>"$username",
"pass"=>"$password",
"db"=>"$dbname",
"host"=>"$host"
);

?>
