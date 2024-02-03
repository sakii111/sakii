<?php 
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}

	include("include/connection.php");

	$userid = $_SESSION['frontuserid'];

	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	else{
		$password = null;
	}
	if(isset($_POST['money'])){
		$money = $_POST['money'];
	}
	else{
		$money = null;
	}

	$sql="select * from `tbl_user` where `id`='".$userid."' and `password`='".md5($password)."' and `status`='1'";
	$result=mysqli_query($con,$sql);
	$num=mysqli_num_rows($result);
	if($num>=1){
		echo 1;
	}
	else{
		echo 2;
	}
?>