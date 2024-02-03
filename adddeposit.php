<?php 
	session_start();
	if (!isset($_SESSION['frontuserid'])) {
		echo "<script> 
		window.location = './login.php';
		</script>";
	}
	include("include/connection.php");
?>

<?php
	$amt = htmlspecialchars(mysqli_real_escape_string($con, $_POST['amt']));
	$ref_num = htmlspecialchars(mysqli_real_escape_string($con, $_POST['refnum']));
	if(isset($_POST['srl'])){
		$srl = htmlspecialchars(mysqli_real_escape_string($con, $_POST['srl']));
	}
	else{
		$srl = 0;
	}
	if(isset($_POST['source'])){
		$source = htmlspecialchars(mysqli_real_escape_string($con, $_POST['source']));
	}
	else{
		$source = null;
	}
	$uid = $_SESSION['frontuserid'];
	
	$emailQ = mysqli_query($con , "SELECT * FROM `tbl_user` WHERE `id` = '".$uid."'");
	$emailA = mysqli_fetch_array($emailQ);
	$email = $emailA['mobile'];
	
	date_default_timezone_set('Asia/Calcutta');
    $today = date("F j, Y, g:i a");
	$createdate = date("Y-m-d H:i");
    $deposit = mysqli_query($con, "INSERT INTO `deposits`(`ref_num`, `amount`, `email`, `status`, `uid`, `date`) VALUES('$ref_num', '$amt', '$email', '1','$uid', '$today')");
	$deposit1 = mysqli_query($con, "INSERT INTO `deposits_new`(`userid`, `amount`, `serial`, `source`, `ref_num`, `mobile`, `createdate`, `status`) VALUES('$uid', '$amt', '$srl', '$source','$ref_num', '$email', '$createdate', '1')");
	
	if($deposit1){
        echo 1;
    }else{
        echo 0; 
    }
?>