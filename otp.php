<?php
require_once "config.php";
if(isset($_GET['num'])){
function genOtp(){
   

    $tn = rand(50000,60000);
    $otp=$tn;
    
    return $otp;
    
    }
  
$otp= genOtp(); 

$num=$_GET["num"];

$rec="INSERT INTO verify (username,otp) VALUES ('$num','$otp')";
$conn->query($rec);


$fields = array(
    "variables_values" => "$otp",
    "route" => "otp",
    "numbers" => "$num",
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
    "authorization: HlCjueLEWqmOTk4sZUwBgRNMAaoIxth1Qf2nv075YbrcXzyJGPaZAKWNYSqFcM2E7zkjhDvydtOCBVJg",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response=curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
?>