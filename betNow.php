<?php 
ob_start();
session_start();
include("include/connection.php");

@$userid=$_SESSION['frontuserid'];
@$type=$_POST['type'];
@$value=$_POST['value'];
@$counter=$_POST['counter'];
@$inputgameid=$_POST['inputgameid'];
@$finalamount=$_POST['finalamount'];
@$tab=$_POST['tab'];
@$presalerule=$_POST['presalerule'];

//Shonu
$crtdt = date("Y-m-d H:i");
$balQ=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
$balrow=mysqli_num_rows($balQ);
if($balrow>0){
	$balarray = mysqli_fetch_array($balQ);
	$obalance = $balarray['amount'];
}
else{
	$obalance = 0;
}
//

if($userid=="" || $type=="" || $inputgameid=="" || $finalamount=="")
{
echo"2";
//check empty
}else{
if($counter<30)
{ echo"3";
//check counter
}else if($finalamount==0)
{
	echo"4";
//check if amount 0	
	}
else if($finalamount<10){
	echo"5";
	//check if amount below 10
	}else
{
$chkwallet=mysqli_query($con,"select `amount` from `tbl_wallet` where amount >= $finalamount and`userid`='".$userid."'");
$chkwalletRow=mysqli_num_rows($chkwallet);	
$chkwalletResult=mysqli_fetch_array($chkwallet);
if($chkwalletRow==null){echo"6";}else{	
$sql= mysqli_query($con,"INSERT INTO `tbl_betting` (`userid`, `periodid`, `type`,`value`,`amount`,`tab`,`acceptrule`) VALUES ('".$userid."','".$inputgameid."','".$type."','".$value."','".$finalamount."','".$tab."','".$presalerule."')");

	if($sql){
		//=====================transaction==================================================
		$sql2= mysqli_query($con,"INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('".$userid."','".$inputgameid."','".$finalamount."','1')");
		@$orderid=mysqli_insert_id($con);

		$sql3= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$orderid."','".$finalamount."','debit','join')");
		//Later Shonu
		$nbalance = $obalance - $finalamount;
		$sql4= mysqli_query($con,"INSERT INTO `tbl_transaction`(`userid`,`amount`,`transtype`,`obalance`,`nbalance`,`createdate`) VALUES ('".$userid."','".$finalamount."','Place Order','".$obalance."','".$nbalance."','".$crtdt."')");
		//

		$walletbalance=wallet($con,'amount',$userid);	
		$finalbalanceDebit=$walletbalance-$finalamount;	
		$sqlwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '".$finalbalanceDebit."' WHERE `userid`= '".$userid."'");	

		//=====================transaction end==============================================
		  userpromocode($con,$userid,user($con,'code',$userid),$finalamount,$inputgameid);//===bonus calculation


		echo"1~".wallet($con,'amount',$userid);
	}
	else{
		echo "2";
	}

}

	}
}
?>