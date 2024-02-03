<?php
include("include/connection.php");

if(isset($_POST['type']))
{
if($_POST['type']=='mobile'){
@$umobile=$_POST['mobile'];

if(substr($umobile, 0, 3) == "+91") {
  $mobile = substr($umobile, 3);
}
else{
	$mobile = $umobile;
}

$otp=generateOTP();
$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
$userRow=mysqli_num_rows($chkuser);
if($userRow==1){

	session_start();
	unset($_SESSION["forgot_mobile"]);
	unset($_SESSION["forgot_otp"]);
  $_SESSION["forgot_mobile"] = $mobile;
  $_SESSION["forgot_otp"] = $otp;
	
	
	
$fields = array(
    "variables_values" => $otp,
    "route" => "otp",
    "numbers" => $mobile,
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: ",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
echo '1';
}


}else{echo"2";}

}
if($_POST['type']=='otpval'){
session_start();
@$otp=$_POST['otp'];
$mobile= $_SESSION["signup_mobile"];
$sessionotp=$_SESSION["signup_otp"];

if(strlen($sessionotp!==$otp))  
{
	echo"0";}else{
		
$_SESSION["signup_mobilematched"] = $_SESSION["signup_mobile"];
unset($_SESSION["signup_mobile"]);
unset($_SESSION["signup_otp"]);

		echo"1";}
}
}
?>
