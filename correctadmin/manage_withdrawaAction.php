<?php
include('include/connection.php');

if(isset($_POST['type']))
{
	$id=$_POST['id'];
	$today=date( 'Y-m-d H:i:s' );
	$actiontype='withdraw~'.$id;
	$tday = date("Y-m-d H:i");
	
	$finduid=mysqli_query($con,"select * from `tbl_withdrawal` where `id`='".$id."'");
	$finduidArray = mysqli_fetch_array($finduid);
	$userid = $finduidArray['userid'];
	$serial = $finduidArray['serial'];

	if($_POST['type']=='accept'){

		 $sqlA = mysqli_query($con,"Update `tbl_withdrawal` set status = '0',createdate = '".$today."' where `id`='".$id."' ");
				
	$sqlAA = mysqli_query($con,"Update `tbl_walletsummery` set createdate = '".$today."' where `actiontype`='".$actiontype."' ");

	$sqlY = mysqli_query($con,"Update `tbl_withdraw` set status = '0',createdate = '".$tday."' where `userid`='".$userid."' AND `serial`='".$serial."'");

				
	}
	else if($_POST['type']=='reject') 
	{
	$sqlA = mysqli_query($con,"Update `tbl_withdrawal` set status = '2',createdate = '".$today."' where `id`='".$id."'");
	$useridQuery=mysqli_query($con,"select `userid`,`amount` from `tbl_withdrawal` where `id`='".$id."'");
	$userResult=mysqli_fetch_array($useridQuery);
	$userid=$userResult['userid'];
	$amount=$userResult['amount'];
	$walletbalance=wallet($con,'amount',$userid);
	$finalbalanceCredit=$walletbalance+$amount;	
	$sqlwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit' WHERE `userid`= '$userid'");
	
	$sqlY = mysqli_query($con,"Update `tbl_withdraw` set status = '2',createdate = '".$tday."' where `userid`='".$userid."' AND `serial`='".$serial."'");
	$sql4= mysqli_query($con,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$userid."','".$amount."','Withdrawal failure','".$walletbalance."','".$finalbalanceCredit."','".$tday."')");

	}
	else if($_POST['type']=='withdraw'){

	$sqlA = mysqli_query($con,"Update `tbl_withdrawal` set status = '3',createdate = '".$today."' where `id`='".$id."' ");
				
	$sqlAA = mysqli_query($con,"Update `tbl_walletsummery` set createdate = '".$today."' where `actiontype`='".$actiontype."' ");

	$sqlY = mysqli_query($con,"Update `tbl_withdraw` set status = '3',createdate = '".$tday."' where `userid`='".$userid."' AND `serial`='".$serial."'");
				
	}


}

?>