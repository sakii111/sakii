<?php 
ob_start();
session_start();
include("include/connection.php");

@$umobile=$_POST['mobile'];

if(substr($umobile, 0, 3) == "+91") {
  $mobile = substr($umobile, 3);
}
else{
	$mobile = $umobile;
}

@$password=$_POST['password'];
@$rcode=$_POST['rcode'];
@$acceptTC=$_POST['remember'];
@$action=$_POST['action'];
$otpmobile=@$_SESSION["signup_mobile"];
$sotp = $_POST['sotp'];

$rechquery = mysqli_query($con, "SELECT * FROM `tbl_paymentsetting`");
$rechqueryarray = mysqli_fetch_array($rechquery);
$bonusamount = $rechqueryarray['bonusamount'];

if($action=="register")
{
  if(strlen($otpmobile!==$mobile)){echo"4";}else{
	  if($sotp==$_SESSION["signup_otp"]){
		$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
		$userRow=mysqli_num_rows($chkuser);
			if($userRow==null){
				$chkrcode=mysqli_query($con,"select * from `tbl_user` where `owncode`='".$rcode."'");
				$codeRow=mysqli_num_rows($chkrcode);
				if($codeRow!=null){	
					$sql= mysqli_query($con,"INSERT INTO `tbl_user` (`mobile`, `email`, `password`,`code`,`owncode`,`privacy`,`status`) VALUES ('".$mobile."','','".md5($password)."','".$rcode."','','".$acceptTC."','1')");
					$userid=mysqli_insert_id($con);
					$userida = str_pad($userid, 3, "0", STR_PAD_LEFT);
					$useridcon = numberToString($userida);
					$refcode=$useridcon.refcode();
					$sql= mysqli_query($con,"UPDATE `tbl_user` SET `owncode` = '$refcode' WHERE `id`= '".$userid."'");
					$sql2= mysqli_query($con,"INSERT INTO `tbl_wallet`(`userid`,`amount`,`envelopestatus`) VALUES ('".$userid."','".$bonusamount."','0')");
					$sql3= mysqli_query($con,"INSERT INTO `tbl_bonus`(`userid`,`amount`,`level1`,`level2`,`level3`) VALUES ('".$userid."','0','0','0','0')");

					if($sql){
						unset($_SESSION["signup_mobile"]);
						echo"1";}else{ echo"0";}
				}else{echo"3";}
			}else{ echo"2";}  
	  } else {echo "5";}
	
}
}
?>