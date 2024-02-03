<?php 
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}

	include("include/connection.php");
	$userid=$_SESSION['frontuserid'];
	$selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	$userresult=mysqli_fetch_array($selectruser);
	$userpassword=$userresult['password'];
	
	$selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
	$walletResult=mysqli_fetch_array($selectwallet);
	$walletamount = $walletResult['amount'];
	
	$match = 0;
	
	//Old Style
	$today = date("Y-m-d H:i:s");
	$optionsname = "bank";
	$acid = 0;
	
	//Serial
	$sr = date("YmdHis");
	$serial = "MaryWS" . $sr;
	
	$crdt = date("Y-m-d H:i");

	if(isset($_POST['amount'])){
		$amount = $_POST['amount'];
	}
	else{
		$amount = 0;
	}
	
	if(isset($_POST['bankcardname'])){
		$bankcardname = $_POST['bankcardname'];
	}
	else{
		$bankcardname = "Add bank card";
	}
	
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	else{
		$password = 0;
	}
	
	if(isset($_POST['crossover'])){
		$crossover = $_POST['crossover'];
	}
	else{
		$crossover = 0;
	}
	
	$dot_pos = strpos($amount, '.');
	if ($dot_pos === false) {
		$amount = $amount . '.00';
	}else {
		$after_dot = substr($amount, $dot_pos + 1);
		$after_dot_length = strlen($after_dot);
		if ($after_dot_length > 2) {
			$after_dot = substr($after_dot, 0, 2);
			$amount = substr($amount, 0, $dot_pos + 1) . $after_dot;
		} elseif ($after_dot_length < 2) {
			$zeros_to_add = 2 - $after_dot_length;
			$amount = $amount . str_repeat('0', $zeros_to_add);
		}
	}
	
	$fees = $amount * 5/100;
	$finalamount = $amount - $fees;
	$floorfinal = floor($finalamount);
	
	$selectbank=mysqli_query($con,"select * from `tbl_bank` where `userid`='".$userid."'");
	$bankresult=mysqli_num_rows($selectbank);
	
	if($bankresult == 0){
		//Add bank account
		$match = 2;
	}
	else if($bankresult == 1){
		$bankquery = mysqli_fetch_array($selectbank);
		$bankid = $bankquery['id'];
		if($bankid == $crossover){
			$match = 1;
		}
	}
	else{
		$i = 1;
		while($i<=$bankresult){
			$bankquery1 = mysqli_fetch_array($selectbank);
			$bankid1 = $bankquery1['id'];
			if($bankid1 == $crossover){
				$match = 1;
			}
		$i++;
		}
	}
	
	if($match == 1){
		$findbank=mysqli_query($con,"select * from `tbl_bank` where `id`='".$crossover."'");
		$findbankarray = mysqli_fetch_array($findbank);
		$name = $findbankarray['name'];
		$ifsc = $findbankarray['ifsc'];
		$bankname = $findbankarray['bankname'];
		$bankaccount = $findbankarray['bankaccount'];
		$acid0 = $findbankarray['id'];
		
		$findbank2=mysqli_query($con,"select * from `tbl_bankdetail` where `name`='".$name."' AND `ifsc`='".$ifsc."' AND `account`='".$bankaccount."' AND `bankname`='".$bankname."'");
		$findbankarray2=mysqli_fetch_array($findbank2);
		$acid = $findbankarray2['id'];
	}
	
	if(md5($password) == $userpassword){
		if($amount <= $walletamount){
			if($match == 1){
				$withdrawalsql= mysqli_query($con,"INSERT INTO `tbl_withdrawal`(`userid`,`amount`,`payout`,`payid`,`serial`,`status`,`createdate`) VALUES ('".$userid."','".$amount."','".$optionsname."','".$acid."','".$serial."','1','".$today."')");
				$withdrawalid=mysqli_insert_id($con);
				$sql= mysqli_query($con,"INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('".$userid."','withdraw','".$amount."','1')");
				$orderid=mysqli_insert_id($con);
				
				$actiontype="withdraw~".$withdrawalid;
				$sql3= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$orderid."','".$amount."','debit','$actiontype')");
				
				$sql4= mysqli_query($con,"INSERT INTO `tbl_withdraw`(`userid`,`amount`,`fees`,`finalamount`,`serial`,`payid`,`createdate`,`status`) VALUES ('".$userid."','".$amount."','".$fees."','".$floorfinal."','".$serial."','".$acid0."','".$crdt."','1')");
				
				$finalbalanceCredit=$walletamount-$amount;	
				$sqlwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit' WHERE `userid`= '$userid'");

				$sql5= mysqli_query($con,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$userid."','".$amount."','Withdrawal','".$walletamount."','".$finalbalanceCredit."','".$crdt."')");
				echo "1";
			}
			else{
				echo "0";
			}
		}
		else{
			echo "2";
		}
	}
	else{
		echo "3";
	}
?>