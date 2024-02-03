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
?>
<html lang="en" style="font-size: 104.5px;">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" href="favicon.ico">
		<?php include 'head.php';?>
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<link href="assets/css/inc/ionicons.min.css" rel="stylesheet">
		<style type="text/css" id="operaUserStyle">
			video {
			  filter: url('data:image/svg+xml,\
				<svg xmlns="http://www.w3.org/2000/svg">\
				  <filter id="sharpen">\
					<feConvolveMatrix order="3" preserveAlpha="true" kernelMatrix="1 -1 1 -1 -1 -1 1 -1 1"/>\
				  </filter>\
				</svg>#sharpen');
			}
		</style>
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
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-411015e1="" class="addbankcard">
			<nav data-v-411015e1="" class="top_nav">
				<div data-v-411015e1="" class="left">
					<img data-v-411015e1="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-411015e1="">Add Red Envelope</span>
				</div>
			</nav>
			<div data-v-411015e1="" class="input_card">
				<ul data-v-411015e1="" class="card_ul">
					<li data-v-411015e1="">
						<p data-v-411015e1="">Fixed Mony</p>
						<input data-v-411015e1="" type="text" id="money">
					</li>
					<li data-v-411015e1="">
						<p data-v-411015e1="">Enter Your Login Password</p>
						<input data-v-411015e1="" type="password" id="password">
					</li>
				</ul>
				<div data-v-411015e1="" class="continue_btn">
					<button data-v-411015e1="" class="ripple" id="launch">Launch</button>
				</div>
			</div>
			<!-- footer -->
			<?php include("include/footer.php");?>
		</div>
		<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2001; display: none;" id="popup">
			<div class="van-toast__text" id="popuptext">
				Password can not be empty
			</div>
		</div>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script>
			function popupdisp(){
				document.getElementById("popup").style.display="none";
			}
			
			var launch = document.getElementById("launch");
			launch.addEventListener("click", function() {
				var password = document.getElementById("password").value;
				var money = document.getElementById("money").value;				
				var popup = document.getElementById("popup");
				
				if(password == ""){
					document.getElementById("popuptext").innerHTML = "Password cannot be empty";
					popup.style.display = "";
					setTimeout(popupdisp, 1500);
				}
				else{
					$.ajax({
					type: "Post",
					data:"password=" + password+ "& money=" + money,
					url: "addredenvelopenow.php",
					
					success: function (html) { 
					 var arr = html.split('~');
					if (arr[0]== 1) {			
							document.getElementById("popuptext").innerHTML = "You can't send a red envelope";
							popup.style.display = "";
							setTimeout(popupdisp, 1500);
					}
							else if (arr[0]== 2) {
								document.getElementById("popuptext").innerHTML = "Your password is incorrect";
								popup.style.display = "";
								setTimeout(popupdisp, 1500);
							}
					  return false;
					  },
					  error: function (e) {}
				});
				}
			});
		</script>
	</body>
</html>