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
	if(isset($_POST['snf'])){
		$snf = $_POST['snf'];
	}
	else{
		$snf = null;
	}
?>
<?php 
	if($snf == "inc"){
		$user=mysqli_query($con,"select * from `tbl_signin` where `uid`='".$userid."'");
		$userRows=mysqli_num_rows($user);
		if($userRows == null){
			$userinsert = mysqli_query($con,"INSERT INTO `tbl_signin`(`uid`,`totaldays`,`todayrebates`,`totalrebates`,`status`) VALUES ('".$userid."','1','0','0','1')");
			echo 1;
		}
		else{
			$userarray = mysqli_fetch_array($user);
			if($userarray['status'] == 0){
				$tdays = $userarray['totaldays'] + 1;
				$days = mysqli_query($con, "UPDATE `tbl_signin` SET `totaldays` = '".$tdays."' WHERE `uid` = '".$userid."'");
				$status = mysqli_query($con, "UPDATE `tbl_signin` SET `status` = '1' WHERE `uid` = '".$userid."'");
				echo 1;
			}
			else{
				echo 3;
			}
		}
	}
	else{
		echo 2;
	}
?>