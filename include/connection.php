<?php
$con = @mysqli_connect('localhost', '', '', '');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
date_default_timezone_set("Asia/Calcutta"); 
function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'muni';
    $secret_iv = 'muni123';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
    	//decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
function refcode() {
  $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
            for ($i = 0; $i < 5; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $pin=$randomString;
}

//Added for coverting new user's id for creating it's new recommendation code
function numberToString($number) {
	$alphabet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$base = strlen($alphabet);
	$string = '';
	$num_of_digits = strlen((string)$number);
	while ($number > 0) {
		$remainder = $number % $base;
		$number = floor($number / $base);
		$string = $alphabet[$remainder] . $string;
	}
	if (strlen($string) < $num_of_digits) {
		$string = $alphabet[rand(10,35)] . $alphabet[rand(0,9)] . $string;
		$string = substr($string, 0, $num_of_digits);
	}
	return $string;
}

function generateOTP() {
  $characters = '123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
            for ($i = 0; $i < 4; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $pin=$randomString;
}

function user($a,$field,$id)
{
$selectruser=mysqli_query($a,"select `$field` from `tbl_user` where `id`='".$id."'");
$userresult=mysqli_fetch_array($selectruser);
return $userresult["$field"];
	}
function wallet($a,$field,$id)
{
	$selectwallet=mysqli_query($a,"select `$field` from `tbl_wallet` where `userid`='".$id."'");
$walletResult=mysqli_fetch_array($selectwallet);
return $walletResult["$field"];
	}
function bonus($a,$field,$id)
{
	$selectwallet=mysqli_query($a,"select `$field` from `tbl_bonus` where `userid`='".$id."'");
$walletResult=mysqli_fetch_array($selectwallet);
if(!empty($walletResult["$field"])){ //Added due to bet now error
	return $walletResult["$field"];
} else {return null;}
	}	
function gameid($a)
{
$selectruser=mysqli_query($a,"select `gameid` from `tbl_gameid` order by id desc limit 1");
$userresult=mysqli_fetch_array($selectruser);
return $userresult["gameid"];
	}

function content($a,$page) {
	$sql_page="select `$page` from `content` where `id`='1'";
	$query_page=mysqli_query($a,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
} 
function minamountsetting($a,$page) {
	$sql_page="select `$page` from `tbl_paymentsetting` where `id`='1'";
	$query_page=mysqli_query($a,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
} 
function truncate($mytext) {  
//Number of characters to show  
$chars = 610;  
$mytext = substr($mytext,0,$chars);  
$mytext = substr($mytext,0,strrpos($mytext,' '));  
return $mytext;  
}
function truncate2($mytext) {  
//Number of characters to show  
$chars = 220;  
$mytext = substr($mytext,0,$chars);  
$mytext = substr($mytext,0,strrpos($mytext,' '));  
return $mytext;  
}
function setting($a,$page) {
	$sql_page="select `$page` from `site_setting` where `id`='1'";
	$query_page=mysqli_query($a,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
}


function winner($con,$periodid,$tab,$column)
{
$query=mysqli_query($con,"SELECT 
( SUM(amount)-SUM(amount)/100*2)as tradeamountwithtax,
 SUM(amount)as tradeamount,
    SUM(CASE
        WHEN type = 'button' THEN amount
    END) button,
    SUM(CASE
        WHEN value = 'Green' THEN amount
    END) as green,
    
    (SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*2))*2 as greenwinamount,
	
	(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*2))*1.5 as greenwinamountwithviolet,
    
    SUM(CASE
        WHEN value = 'Violet' THEN amount
    END) violet,
    
    (SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)/100*2))*4.5 as violetwinamount,
    
    SUM(CASE
        WHEN value = 'Red' THEN amount
    END) red,
    
    (SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*2))*2 as redwinamount,
	(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*2))*1.5 as redwinamountwithviolet,
    
    SUM(CASE
        WHEN type = 'number' THEN amount
    END) number,
    SUM(CASE
        WHEN value = '0' THEN amount
    END) `zero`,
    (SUM(CASE
        WHEN value = '0' THEN amount
    END)-(SUM(CASE
        WHEN value = '0' THEN amount
    END)/100*2))*9 as zerowinamount,
    
    SUM(CASE
        WHEN value = '1' THEN amount
    END) `one`,
    (SUM(CASE
        WHEN value = '1' THEN amount
    END)-(SUM(CASE
        WHEN value = '1' THEN amount
    END)/100*2))*9 as onewinamount,
    
    SUM(CASE
        WHEN value = '2' THEN amount
    END) `two`,
    (SUM(CASE
        WHEN value = '2' THEN amount
    END)-(SUM(CASE
        WHEN value = '2' THEN amount
    END)/100*2))*9 as twowinamount,
    
    SUM(CASE
        WHEN value = '3' THEN amount
    END) `three`,
    (SUM(CASE
        WHEN value = '3' THEN amount
    END)-(SUM(CASE
        WHEN value = '3' THEN amount
    END)/100*2))*9 as threewinamount,
    
    SUM(CASE
        WHEN value = '4' THEN amount
    END) `four`,
    (SUM(CASE
        WHEN value = '4' THEN amount
    END)-(SUM(CASE
        WHEN value = '4' THEN amount
    END)/100*2))*9 as fourwinamount,
    
    SUM(CASE
        WHEN value = '5' THEN amount
    END) `five`,
    (SUM(CASE
        WHEN value = '5' THEN amount
    END)-(SUM(CASE
        WHEN value = '5' THEN amount
    END)/100*2))*9 as fivewinamount,
    
    SUM(CASE
        WHEN value = '6' THEN amount
    END) `six`,
    (SUM(CASE
        WHEN value = '6' THEN amount
    END)-(SUM(CASE
        WHEN value = '6' THEN amount
    END)/100*2))*9 as sixwinamount,
    
    SUM(CASE
        WHEN value = '7' THEN amount
    END) `seven`,
    (SUM(CASE
        WHEN value = '7' THEN amount
    END)-(SUM(CASE
        WHEN value = '7' THEN amount
    END)/100*2))*9 as sevenwinamount,
    
    SUM(CASE
        WHEN value = '8' THEN amount
    END) `eight`,
    (SUM(CASE
        WHEN value = '8' THEN amount
    END)-(SUM(CASE
        WHEN value = '8' THEN amount
    END)/100*2))*9 as eightwinamount,
    
    SUM(CASE
        WHEN value = '9' THEN amount
    END) `nine`,
    (SUM(CASE
        WHEN value = '9' THEN amount
    END)-(SUM(CASE
        WHEN value = '9' THEN amount
    END)/100*2))*9 as ninewinamount
	    
FROM
    `tbl_betting` where `periodid`='$periodid' and `tab`='$tab'");
$result=mysqli_fetch_array($query);	
return $result["$column"];
	
	}
$numbermappings = array("zero", "one","two","three", "four","five","six","seven","eight","nine");

function userpromocode($a,$userid,$code,$tradeamount,$periodid)
{
$crtdt = date("Y-m-d H:i");//Shonu
$today = date("Y-m-d H:i:s");
$commissionQuery=mysqli_query($a,"select * from `tbl_paymentsetting` where `id`='1'");
$commissionResult=mysqli_fetch_array($commissionQuery);
$level1commission=$commissionResult['level1'];
$level2commission=$commissionResult['level2'];
$level3commission=$commissionResult['level3'];
$level1=($tradeamount*$level1commission/100);
$level2=($tradeamount*$level2commission/100);
$level3=($tradeamount*$level3commission/100);

$userlevel1Query=mysqli_query($a,"select `code`,(select `id` from `tbl_user` where `owncode`='$code')level1id,(select `code` from `tbl_user` where `owncode`='$code')level1code from `tbl_user` where `id`='".$userid."'");
$userlevel1Result=mysqli_fetch_array($userlevel1Query);	
 $level1id=$userlevel1Result['level1id'];
 $level1code=$userlevel1Result['level1code'];
//===============================================================================================
$userlevel2Query=mysqli_query($a,"select * from `tbl_user` where `owncode`='".$level1code."'");
$userlevel2Result=mysqli_fetch_array($userlevel2Query);	
if(!empty($userlevel2Result['id'])){ //Due to error from bet form
	$level2id=$userlevel2Result['id'];
	$level2code=$userlevel2Result['code'];
	$userlevel3Query=mysqli_query($a,"select * from `tbl_user` where `owncode`='".$level2code."'");
	$userlevel3Result=mysqli_fetch_array($userlevel3Query);
	if(!empty($userlevel3Result['id'])){ //Due to error from bet form
		$level3id=$userlevel3Result['id'];
		$level3code=$userlevel3Result['code'];
	}
	else {
		$level3id = null;
		$level3code = null;
	}
} 
else {
	$level2id = null;
	$level2code = null;
	$level3id = null;
	$level3code = null;
}
//=================================================================================================
$sql= mysqli_query($a,"INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level3id`,`level1amount`,`level2amount`,`level3amount`,`tradeamount`,`createdate`) VALUES ('".$userid."','".$periodid."','".$level1id."','".$level2id."','".$level3id."','".$level1."','".$level2."','".$level3."','".$tradeamount."','".$today."')");
$level1balance=bonus($a,'level1',$level1id);
$finallevel1balance=$level1balance+$level1;
$bonusbalance1=bonus($a,'amount',$level1id);
$finalbonusbalance1=$bonusbalance1+$level1;


$level2balance=bonus($a,'level2',$level2id);
$finallevel2balance=$level2balance+$level2;

$bonusbalance2=bonus($a,'amount',$level2id);
$finalbonusbalance2=$bonusbalance2+$level2;

$level3balance=bonus($a,'level3',$level3id);
$finallevel3balance=$level3balance+$level3;

$bonusbalance3=bonus($a,'amount',$level3id);
$finalbonusbalance3=$bonusbalance3+$level3;


$sqlbonuslevel1= mysqli_query($a,"UPDATE `tbl_bonus` SET `amount` = '".$finalbonusbalance1."',`level1` = '".$finallevel1balance."' WHERE `userid`= '".$level1id."'");

$sqlbonuslevel2= mysqli_query($a,"UPDATE `tbl_bonus` SET `amount` = '".$finalbonusbalance2."',`level2` = '".$finallevel2balance."' WHERE `userid`= '".$level2id."'");

$sqlbonuslevel3= mysqli_query($a,"UPDATE `tbl_bonus` SET `amount` = '".$finalbonusbalance3."',`level3` = '".$finallevel3balance."' WHERE `userid`= '".$level3id."'");

//Add to balance
	if($level1id != null){
		$bal1query = mysqli_query($a,"select * from `tbl_wallet` where `userid`='".$level1id."'");
		$bal1array = mysqli_fetch_array($bal1query);
		$bal1amt = $bal1array['amount'];
		$bal1amtf = $bal1amt + $level1;
		$bal1amtu = mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = '".$bal1amtf."' WHERE `userid`= '".$level1id."'");
	}
	if($level2id != null){
		$bal2query = mysqli_query($a,"select * from `tbl_wallet` where `userid`='".$level2id."'");
		$bal2array = mysqli_fetch_array($bal2query);
		$bal2amt = $bal2array['amount'];
		$bal2amtf = $bal2amt + $level2;
		$bal2amtu = mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = '".$bal2amtf."' WHERE `userid`= '".$level2id."'");
	}
	if($level3id != null){
		$bal3query = mysqli_query($a,"select * from `tbl_wallet` where `userid`='".$level3id."'");
		$bal3array = mysqli_fetch_array($bal3query);
		$bal3amt = $bal3array['amount'];
		$bal3amtf = $bal3amt + $level3;
		$bal3amtu = mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = '".$bal3amtf."' WHERE `userid`= '".$level3id."'");
	}
//Add to transaction Shonu
	if($level1id != null){
		$lvl1query= mysqli_query($a,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$level1id."','".$level1."','LVL1COMM','".$bal1amt."','".$bal1amtf."','".$crtdt."')");
	}
	if($level2id != null){
		$lvl2query= mysqli_query($a,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$level2id."','".$level2."','LVL2COMM','".$bal2amt."','".$bal2amtf."','".$crtdt."')");
	}
	if($level3id != null){
		$lvl3query= mysqli_query($a,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$level3id."','".$level3."','LVL3COMM','".$bal3amt."','".$bal3amtf."','".$crtdt."')");
	}
}
function invitebonus($a,$userid,$refcode)
{
 $chksummery=mysqli_query($a,"select * from `tbl_walletsummery` where `userid`='$userid' and `actiontype`='recharge'");   
 $chksummeryRow=mysqli_num_rows($chksummery);   
  if($chksummeryRow=='1')
  {
   $userQuery=mysqli_query($a,"select `id` from `tbl_user` where `owncode`='$refcode'"); 
   $userResult=mysqli_fetch_array($userQuery);
    $refuserid=$userResult['id'];
    $selectwallet=mysqli_query($a,"select `amount` from `tbl_bonus` where `userid`='".$refuserid."'");
$walletResult=mysqli_fetch_array($selectwallet);
$availableBalance=$walletResult['amount'];

$sqlbonus=mysqli_query($con,"select `bonusamount` from `tbl_paymentsetting` where `id`='1'");
$bonusResult=mysqli_fetch_array($sqlbonus);
$bonusAmount=$bonusResult['bonusamount'];
$finalbonusbalance=$availableBalance+$bonusAmount;
$today = date("Y-m-d H:i:s");

$sqlbonuslevel1= mysqli_query($a,"UPDATE `tbl_bonus` SET `amount` = '".$finalbonusbalance."',`level1` = '".$finalbonusbalance."' WHERE `userid`= '".$refuserid."'");
$sql= mysqli_query($a,"INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level1amount`,`level2amount`,`tradeamount`,`createdate`) VALUES ('".$userid."','0','".$refuserid."','0','110','0','0','".$today."')");
  }
}

function getBaseUrl() 
{
	// output: /myproject/index.php
	$currentPath = $_SERVER['PHP_SELF']; 
	
	// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
	$pathInfo = pathinfo($currentPath); 
	
	// output: localhost
	$hostName = $_SERVER['HTTP_HOST']; 
	
	// output: http://
	$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
	
	// return: http://localhost/myproject/
	return $protocol.$hostName.$pathInfo['dirname'].'/';
} 
?>
