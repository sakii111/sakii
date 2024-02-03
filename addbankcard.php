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
	$selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	$userresult=mysqli_fetch_array($selectruser);
	$accphno = $userresult['mobile'];
	
	if(isset($_GET['cardId'])){
		$cardId = $_GET['cardId'];
		$selectcard=mysqli_query($con,"select * from `tbl_bank` where `userid`='".$userid."' AND `id`='".$cardId."'");
		$cardrow = mysqli_num_rows($selectcard);
		if($cardrow == 0){
			$name = null;
			$ifsc = null;
			$bankname = null;
			$bankaccount = null;
			$state = null;
			$city = null;
			$address = null;
			$mobilenumber = null;
			$email = null;
			$bankupdate = 0;
		}
		else{
			$cardarray=mysqli_fetch_array($selectcard);
			$name = $cardarray['name'];
			$ifsc = $cardarray['ifsc'];
			$bankname = $cardarray['bankname'];
			$bankaccount = $cardarray['bankaccount'];
			$state = $cardarray['state'];
			$city = $cardarray['city'];
			$address = $cardarray['address'];
			$mobilenumber = $cardarray['mobilenumber'];
			$email = $cardarray['email'];
			$bankupdate = 1;
		}
	}
	else{
		$cardId = 0;
		$name = null;
		$ifsc = null;
		$bankname = null;
		$bankaccount = null;
		$state = null;
		$city = null;
		$address = null;
		$mobilenumber = null;
		$email = null;
		$bankupdate = 0;
	}
?>

<html lang="en" style="font-size: 102.8px;">
	<head>
		<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" href="favicon.ico">
		<?php include 'head.php';?>
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<link href="assets/css/inc/ionicons.min.css" rel="stylesheet">
		<style>	
			.appBottomMenu {
				min-height: 56px;
				position: fixed;
				z-index: 9999;
				bottom: 0;
				left: 0;
				right: 0;
				background: #FFF;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
				padding-bottom: env(safe-area-inset-bottom);
				-webkit-box-shadow: 0 3px 14px 2px rgba(0, 0, 0, .12);
				box-shadow: 0 3px 14px 2px rgba(0, 0, 0, .12);
			}

			.appBottomMenu .item {
				width: 35%;
				text-align: center;
				height: 56px;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
			}
			
			.appBottomMenu .item.active {
				position: relative;
			}

			.appBottomMenu .item>a {
				width: 100%;
				height: 56px;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				padding: 0;
				-webkit-box-pack: center;
				justify-content: center;
				color: #868f8b !important;
				position: relative;
			}
			
			.appBottomMenu .item.active>a {
				color: #009688 !important;
			}
			
			.appBottomMenu .item p {
				margin: 0;
			}

			.appBottomMenu .item i {
				font-size: 26px;
				line-height: 0;
				margin-bottom: 17px;
				display: block;
			}

			.appBottomMenu .item span {
				display: block;
				font-size: 11px;
				position: absolute;
				left: 0;
				bottom: 7px;
				right: 0;
			}
			
			.popup .popuptext {
				position: fixed;
				visibility: hidden;
				display: block;
				background-color: #555;
				color: #fff;
				text-align: center;
				border-radius: 6px;
				padding: 8px 5px;
				width: 100px;
				z-index: 1;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
			}
			.popup .show {
				 visibility: visible;
				}
			.popup .hide {
				 visibility: hidden;
				}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-b351b8b8="" class="addbankcard">
			<nav data-v-b351b8b8="" class="top_nav">
				<div data-v-b351b8b8="" class="left">
					<img data-v-b351b8b8="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onclick="goBack();">
					<span data-v-b351b8b8="">Add Bank Card</span>
				</div>
			</nav>
			<form action="#" method="post" id="bankdetailform" class="" autocomplete="off">
				<div data-v-b351b8b8="" class="input_card">
					<ul data-v-b351b8b8="" class="card_ul">
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Actual Name</p>
							<input data-v-b351b8b8="" type="text" id="name" name="name" value="<?php echo $name;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">IFSC Code</p>
							<input data-v-b351b8b8="" type="text" id="ifsc" name="ifsc" value="<?php echo $ifsc;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Bank Name</p>
							<input data-v-b351b8b8="" type="text" id="bankname" name="bankname" value="<?php echo $bankname;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Bank Account</p>
							<input data-v-b351b8b8="" type="text" id="bankaccount" name="bankaccount" value="<?php echo $bankaccount;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">State/Territory</p>
							<input data-v-b351b8b8="" type="text" id="state" name="state" value="<?php echo $state;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">City</p>
							<input data-v-b351b8b8="" type="text" id="city" name="city" value="<?php echo $city;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Address</p>
							<input data-v-b351b8b8="" type="text" id="address" name="address" value="<?php echo $address;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Mobile Number</p>
							<input data-v-b351b8b8="" type="text" id="mobilenumber" name="mobilenumber" value="<?php echo $mobilenumber;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Email</p>
							<input data-v-b351b8b8="" type="text" id="email" name="email" value="<?php echo $email;?>">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Account phone number</p>
							<input data-v-b351b8b8="" type="text" disabled="disabled" value="<?php echo $accphno; ?>" id="accountphone" name="accountphone">
						</li>
						<li data-v-b351b8b8="">
							<p data-v-b351b8b8="">Code</p>
							<div data-v-b351b8b8="" style="display: flex;">
								<input data-v-b351b8b8="" type="text" placeholder="Verification Code" style="flex: 1 1 0%;" id="botp" name="botp">
								<span data-v-b351b8b8="" class="tips_span" id="vcr">Verification Code is required</span>
								<button data-v-b351b8b8="" class="gocode" id="bankotp">
									OTP
								</button>
							</div>
						</li>
					</ul>
					<input type="hidden" name="action" id="action" value="<?php if($bankupdate==1){echo "updatebankdetail";}else{echo "addbankdetail";}?>">
					<div data-v-b351b8b8="" class="continue_btn">
						<button data-v-b351b8b8="" class="ripple" type="submit">Continue</button>
					</div>
				</div>
			</form>
			<div class="popup">
				<span class="popuptext" id="myPopup"></span>
			</div>
		</div>
		<?php include("include/footer.php");?>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script src="assets/js/plugins/owl.carousel.min.js"></script>
		<script src="assets/js/verifybanknumber.js"></script>
		<script>
			
		</script>
	</body>
</html>