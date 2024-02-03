<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']==""){
	header("location:login.php");
	exit();
}

include("include/connection.php");

$userid = $_SESSION['frontuserid'];
$selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
$userresult=mysqli_fetch_array($selectruser);

$checkbank=mysqli_query($con,"select * from `tbl_bank` where `userid`='".$userid."'");
$bankrow = mysqli_num_rows($checkbank);

$name = $_POST['name'];
$ifsc = $_POST['ifsc'];
$bankname = $_POST['bankname'];
$bankaccount = $_POST['bankaccount'];
$state = $_POST['state'];
$city = $_POST['city'];
$address = $_POST['address'];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST['email'];

$mobile = $userresult['mobile'];

$botp = $_POST['botp'];
$action=$_POST['action'];

if(!empty($_SESSION["bank_mobile"])){
	$otpmobile=$_SESSION["bank_mobile"];
}
else{
	$otpmobile = 0;
}

if($action=="addbankdetail")
{
	if($bankrow==1){
		exit('3');
	}
	if(strlen($otpmobile!==$mobile)){
		echo"4";
	}
	else{
		if($botp==$_SESSION["bank_otp"]){
			$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
			$userRow=mysqli_num_rows($chkuser);
			if($userRow!=null){					
				$sql= mysqli_query($con,"INSERT INTO `tbl_bank` (`userid`, `name`, `ifsc`,`bankname`,`bankaccount`,`state`,`city`,`address`,`mobilenumber`,`email`,`accountphone`,`status`) VALUES ('".$userid."','".$name."','".$ifsc."','".$bankname."','".$bankaccount."','".$state."','".$city."','".$address."','".$mobilenumber."','".$email."','".$mobile."','1')");				
				$sql1= mysqli_query($con,"INSERT INTO `tbl_bankdetail` (`userid`, `name`, `ifsc`,`bankname`,`account`,`mobile`,`email`,`type`,`status`) VALUES ('".$userid."','".$name."','".$ifsc."','".$bankname."','".$bankaccount."','".$mobilenumber."','".$email."','bank','1')");	
				if($sql){
					unset($_SESSION["bank_mobile"]);
					echo"1";
				}
				else{ 
					echo"0";
				}
			}
			else{ 
				echo"2";
			}
		} 
		else {
			echo "5";
		}
	}
}

if($action=="updatebankdetail")
{
	if($bankrow==1){
		if(strlen($otpmobile!==$mobile)){
			echo"4";
		}
		else{
			if($botp==$_SESSION["bank_otp"]){
				$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
				$userRow=mysqli_num_rows($chkuser);
				if($userRow!=null){					
					$sql= mysqli_query($con,"UPDATE `tbl_bank` SET `name` = '".$name."', `ifsc` = '".$ifsc."', `bankname` = '".$bankname."', `bankaccount` = '".$bankaccount."', `state` = '".$state."', `city` = '".$city."', `address` = '".$address."', `mobilenumber` = '".$mobilenumber."', `email` = '".$email."' WHERE `userid` = '".$userid."'");				
					$sql1= mysqli_query($con,"UPDATE `tbl_bankdetail` SET `name` = '".$name."', `ifsc` = '".$ifsc."', `bankname` = '".$bankname."', `account` = '".$bankaccount."', `mobile` = '".$mobilenumber."', `email` = '".$email."' WHERE `userid` = '".$userid."'");	
					if($sql){
						unset($_SESSION["bank_mobile"]);
						echo"1";
					}
					else{ 
						echo"0";
					}
				}
				else{ 
					echo"2";
				}
			} 
			else {
				echo "5";
			}
		}	
	}
	else if($bankrow==0){
		if(strlen($otpmobile!==$mobile)){
			echo"4";
		}
		else{
			if($botp==$_SESSION["bank_otp"]){
				$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
				$userRow=mysqli_num_rows($chkuser);
				if($userRow!=null){					
					$sql= mysqli_query($con,"INSERT INTO `tbl_bank` (`userid`, `name`, `ifsc`,`bankname`,`bankaccount`,`state`,`city`,`address`,`mobilenumber`,`email`,`accountphone`,`status`) VALUES ('".$userid."','".$name."','".$ifsc."','".$bankname."','".$bankaccount."','".$state."','".$city."','".$address."','".$mobilenumber."','".$email."','".$mobile."','1')");				
					$sql1= mysqli_query($con,"INSERT INTO `tbl_bankdetail` (`userid`, `name`, `ifsc`,`bankname`,`account`,`mobile`,`email`,`type`,`status`) VALUES ('".$userid."','".$name."','".$ifsc."','".$bankname."','".$bankaccount."','".$mobilenumber."','".$email."','bank','1')");	
					if($sql){
						unset($_SESSION["bank_mobile"]);
						echo"1";
					}
					else{ 
						echo"0";
					}
				}
				else{ 
					echo"2";
				}
			} 
			else {
				echo "5";
			}
		}	
	}
}
?>