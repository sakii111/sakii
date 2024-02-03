<?php 
	include("include/connection.php");
	
	date_default_timezone_set('Asia/Calcutta');
    $today = date("Y-m-d H:i");
	
	//Users
	$userQ = mysqli_query($con,"select * from `tbl_user` where `status`='1'");
	$userR = mysqli_num_rows($userQ);
	
	$i = 1;
	while($i <= $userR){
		$userA = mysqli_fetch_array($userQ);
		$userID = $userA['id'];
		$userWalletQ = mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userID."'");
		$userWalletA = mysqli_fetch_array($userWalletQ);
		$userAmount = $userWalletA['amount'];
		if($userAmount > 500){
			$interestf = $userAmount * 0.008;
			$interest = round($interestf,2);
			$newBalance = $userAmount + $interest;
			$wal = mysqli_query($con, "UPDATE `tbl_wallet` SET `amount` = '".$newBalance."' WHERE `userid` = '".$userID."'");
			if($wal){
				$sql2= mysqli_query($con,"INSERT INTO `tbl_interest`(`uid`,`pbalance`,`interest`,`nbalance`,`date`) VALUES ('".$userID."','".$userAmount."','".$interest."','".$newBalance."','".$today."')");
				$sql4= mysqli_query($con,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$userID."','".$interest."','Interest','".$userAmount."','".$newBalance."','".$today."')");
			}
		}
		$i++;
	}
	
	$userSignin = mysqli_query($con,"select * from `tbl_signin`");
	$userSigninR = mysqli_num_rows($userSignin);
	
	$j = 1;
	while($j <= $userSigninR){
		$userSigninA = mysqli_fetch_array($userSignin);
		$uid = $userSigninA['uid'];
		$wal2 = mysqli_query($con, "UPDATE `tbl_signin` SET `status` = '0' WHERE `uid` = '".$uid."'");
		$j++;
	}
?>