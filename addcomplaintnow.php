<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']==""){
	header("location:login.php");
	exit();
}

include("include/connection.php");

$userid = $_SESSION['frontuserid'];

if(isset($_POST['type'])){
	$type = $_POST['type'];
}
else{
	$type = null;
}
if(isset($_POST['outid'])){
	$outid = $_POST['outid'];
}
else{
	$outid = null;
}
if(isset($_POST['whatsapp'])){
	$whatsapp = $_POST['whatsapp'];
}
else{
	$whatsapp = null;
}
if(isset($_POST['description'])){
	$description = $_POST['description'];
}
else{
	$description = null;
}

$sr = date("YmdHis");
$sr1 = date("Ymd");
$sr3 = numberToString($sr1);
$sr4 = $sr.$sr3;

$crdt = date("Y-m-d H:i");

$status = 1;

$sql= mysqli_query($con,"INSERT INTO `tbl_complaints` (`userid`, `type`, `outid`,`whatsapp`,`description`,`serial`,`createdate`,`status`) VALUES ('".$userid."','".$type."','".$outid."','".$whatsapp."','".$description."','".$sr4."','".$crdt."','".$status."')");

if($sql){
	echo "1";
}
else{
	echo "2";
}
?>