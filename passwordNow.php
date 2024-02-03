<?php 
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}
?>
<?php
	include("include/connection.php");
	$userid=$_SESSION['frontuserid'];
?>
<?php 
@$mobile=$_POST['mobile'];
@$password=$_POST['password'];
@$action=$_POST['action'];
$otpmobile=@$_SESSION["acc_mobile"];
$sotp = $_POST['sotp'];

if($action=="passchange")
{
  if(strlen($otpmobile!==$mobile)){echo"4";}else{
	  if($sotp==$_SESSION["acc_otp"]){
		$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
		$userRow=mysqli_num_rows($chkuser);
		$userArray = mysqli_fetch_array($chkuser);
		$oldpass = $userArray['password'];
		if($oldpass != md5($password)){
			if($userRow!=null){					
					$sql= mysqli_query($con,"UPDATE `tbl_user` SET `password` = '".md5($password)."' WHERE `id`= '".$userid."'");					
					if($sql){
						unset($_SESSION["acc_mobile"]);
						echo"1";}else{ echo"0";}				
			}else{ echo"2";}  
		}else{echo "6";}
	  } else {echo "5";}
	
}
}
?>