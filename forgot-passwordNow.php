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
@$action=$_POST['action'];
$otpmobile=@$_SESSION["forgot_mobile"];
$sotp = $_POST['sotp'];

if($action=="resetpassword")
{
  if(strlen($otpmobile!==$mobile)){echo"4";}else{
	  if($sotp==$_SESSION["forgot_otp"]){
		$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
		$userRow=mysqli_num_rows($chkuser);
			if($userRow==1){
				$newQuery = "UPDATE tbl_user SET password='".md5($password)."' WHERE mobile='".$mobile."'";
				$run = mysqli_query($con, $newQuery);
				echo "1";
			}else{ echo"2";}  
	  } else {echo "5";}
	
	}
}
?>