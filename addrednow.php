<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']==""){
	header("location:login.php");
	exit();
}

include("include/connection.php");

$userid = $_SESSION['frontuserid'];
$walletquery = mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
$walletqueryarray = mysqli_fetch_array($walletquery);
$balance = $walletqueryarray['amount'];

if(isset($_POST['wow'])){
	$wow = $_POST['wow'];
}
else{
	$wow = 0;
}

$crdt = date("Y-m-d H:i");

$checkcode = mysqli_query($con,"select * from `redenvelope_admin` where `serial`='".$wow."' AND `status`='1'");
$checkcoderow = mysqli_num_rows($checkcode);

$checkuser = mysqli_query($con,"select * from `redenvelope_user` where `serial`='".$wow."' AND `userid`='".$userid."'");
$checkuserrow = mysqli_num_rows($checkuser);

if($checkcoderow>0){
	$checkcodearray = mysqli_fetch_array($checkcode);
	$maxusers = $checkcodearray['maxusers'];
	$totalusers = $checkcodearray['totalusers'];
	if($totalusers<$maxusers){
		if($checkuserrow == 0){
			$price = $checkcodearray['price'];
			$totalusers = $totalusers + 1;
			$finalbal = intval($balance) + intval($price);
			$sql1= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '".$finalbal."' WHERE `userid` = '".$userid."'");
			$sql2= mysqli_query($con,"UPDATE `redenvelope_admin` SET `totalusers` = '".$totalusers."' WHERE `serial` = '".$wow."'");
			$sql= mysqli_query($con,"INSERT INTO `redenvelope_user` (`userid`, `serial`, `price`,`createdate`) VALUES ('".$userid."','".$wow."','".$price."','".$crdt."')");
			$sql4= mysqli_query($con,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$userid."','".$price."','Red Envelope','".$balance."','".$finalbal."','".$crdt."')");
			if($sql && $sql1 && $sql2 && $sql4){
				echo "1";
			}
			else{
				echo "2";
			}	
		}
		else{
			echo "3";
		}	
		
	}
	else{
		echo "0";
	}	
}
else{
	echo "0";
}
?>