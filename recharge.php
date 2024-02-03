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
		<!--<link rel="icon" href="favicon.ico">-->
		<?php include 'head.php';?>
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<link href="assets/css/inc/ionicons.min.css" rel="stylesheet">
		<style type="text/css" id="operaUserStyle"></style>
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

			.ion-md-home:before {
				content: "";
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-d269120a="" class="recharge">
			<nav data-v-d269120a="" class="top_nav">
				<div data-v-d269120a="" class="left">
					<img data-v-d269120a="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AWtpb
					IggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJKRQia
					QvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0
					DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slX
					r8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHN
					KgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-d269120a="">Recharge</span>
				</div>
				<div data-v-d269120a="" class="right" onclick="window.location.href='rechargerecord.php';">
					<img data-v-d269120a="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAA30lEQVRoQ+2YUQ7CMAxD65uxkyFOxjhZEAeA
					TKndocz7j1P7JVpVjCYfmvgYNvJvJE3EREQJeLREwZZlr0MkIu7lmIiFAB6/5FIiEfEcY9yIZ6pI7QA2G/kk0IlIjx2pDPQZNemyn3GoSk8bqaSmrDERZboVbROppKasSYl0+rP
					70kgcJd9+iWGukUqXfc0x5rvYyHyGXAUT4eY5r2Yi8xlyFVIioge6F4CdaeWIEcVda7ORLxgvRUTxQLd+R5gLqdRKR0vZnKltI8w0GVomwkiRqWEizDQZWibCSJGp8QahV0Qzxi
					HkWgAAAABJRU5ErkJggg==" alt="">
				</div>
			</nav>
			<div data-v-d269120a="" class="recharge_box">
				<p data-v-d269120a="" class="top_text">
					Balance: ₹ <span data-v-d269120a=""><?php echo number_format(wallet($con,'amount',$userid), 2);?></span>
				</p>
				<div data-v-d269120a="" class="code_input_box">
					<div data-v-d269120a="" class="code_input">
						<img data-v-d269120a="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACfElEQVRoQ+2av4vUQBTHv29hS8EflYjd
						dTbC2Vh5lorbCAqizaF/gEomgs3dtftmtUgpiJUIFhZ6tVtcYSGChVrZXCHaWAjCLgvzJOLCbnayySSTmLtN2sx77/t572UyMwnhkFx0SDjQgjStkqtREaXUWRE5+j+zPx6
						PP0RR9CtLg7UiYRhuGmMeEtFaloOa7r8GcI+Zv6bFWwBRSr0FsFGTQKcwxpgzg8Hgs81oDiQIgi0i2nbyXu/gT6PRaD2KonEy7ByIUuoJgDv1anOOtmZrsSRIY9tqiisiF7
						XWw6yKtCALGSL6ISL7AH47N88SAxHZqbMiPWZ+4xMgy5f3Z2TZFJklpsx9ryAisq213ikjqKitb5AbWusXRcWUsfMNMjc1BkGwQURbZQSm2YrIcLb6dYDEU7r3K9nGLYgtx
						cm37r/WaiuyrB/b1srztBZord5kMtnrdrsnROSWyxaiMRWxrQCUUlcAxLvBzKspIM+YedOmNgiCfSI6nUXSFJA+Mz+wiVVKvQewflBAXjHz1RSQnwCOHRSQWOd1Zn45K9jl
						zKAprfVXfyym0+l8BHBERHoArmVVYnq/USB5RaesIua2DO1aq11rlemnGdv2GcmTSNtaC8CFPLZFxlS2QwRwm5mfFhFV1sbrrAXgOTPfLCuqiL1vEOsbu4gwV5sqQKZv7F1
						jzBettdcj0zTASkBcs+kyfuVO43cBXHbJUN1jieh8v99/l4ybbK1H8UfHusU5xjvJzN+zQHLvmR2D+xr+mJnv25wtfNV12dz4UpfTzzdmPpVr1poOCsPwnIjcBXAJwPGcga
						oaNkweWOeqSFVqqva7Gv+iVJ1Fn/7/AEvxCVHd7ZIcAAAAAElFTkSuQmCC" alt="">
						<input data-v-d269120a="" type="number" placeholder="Enter or Select recharge amount" id="rechamt">
					</div>
				</div>
				<div data-v-d269120a="" class="amount_list">
					<button data-v-d269120a="" class="" onClick="quickmoney(500);" id="500">
						₹ <span data-v-d269120a="">500</span>
					</button>
					<button data-v-d269120a="" class="" onClick="quickmoney(1000);" id="1000">
						₹ <span data-v-d269120a="">1000</span>
					</button>
					<button data-v-d269120a="" class="" onClick="quickmoney(2000);" id="2000">
						₹ <span data-v-d269120a="">2000</span>
					</button>
					<button data-v-d269120a="" class="" onClick="quickmoney(5000);" id="5000">
						₹ <span data-v-d269120a="">5000</span>
					</button>
					<button data-v-d269120a="" class="" onClick="quickmoney(10000);" id="10000">
						₹ <span data-v-d269120a="">10000</span>
					</button>
					<button data-v-d269120a="" class="" onClick="quickmoney(49999);" id="49999">
						₹ <span data-v-d269120a="">49999</span>
					</button>
				</div>
				<div data-v-d269120a="" class="payment_box">
					<p data-v-d269120a="" class="payment_text">Payment</p>
					<div data-v-d269120a="" role="radiogroup" class="van-radio-group"><!----><!---->
						<div data-v-d269120a="" role="radio" tabindex="0" aria-checked="true" class="van-radio" onclick="selectpay('wepay','ekpay');">
							<div class="van-radio__icon van-radio__icon--square van-radio__icon--checked" id="wepay">
								<i class="van-icon van-icon-success"><!----></i>
							</div>
							<span class="van-radio__label">
								<span data-v-d269120a="" class="text">WePay</span>
							</span>
						</div>
						<div data-v-d269120a="" role="radio" tabindex="-1" aria-checked="false" class="van-radio" onclick="selectpay('ekpay','wepay');">
							<div class="van-radio__icon van-radio__icon--square" id="ekpay">
								<i class="van-icon van-icon-success"><!----></i>
							</div>
							<span class="van-radio__label">
								<span data-v-d269120a="" class="text">EkPay</span>
							</span>
						</div>
						<!--<div data-v-d269120a="" role="radio" tabindex="-1" aria-checked="false" class="van-radio">
							<div class="van-radio__icon van-radio__icon--square">
								<i class="van-icon van-icon-success"><!----><!--</i>
							</div>
							<span class="van-radio__label">
								<span data-v-d269120a="" class="text">ATPay</span>
							</span>
						</div><!----><!----><!----><!----><!----><!----><!---->
						<!--<div data-v-d269120a="" role="radio" tabindex="-1" aria-checked="false" class="van-radio">
							<div class="van-radio__icon van-radio__icon--square">
								<i class="van-icon van-icon-success"><!----><!--</i>
							</div>
							<span class="van-radio__label">
								<span data-v-d269120a="" class="text">WinPay</span>
							</span>
						</div><!----><!----><!---->
					</div>
				</div>
				<div data-v-d269120a="" class="recharge_btn">
					<button data-v-d269120a="" id="rechbut">Recharge</button>
				</div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2001; display: none;" id="toasttext">
				<div class="van-toast__text">Enter or Select recharge amount</div>
			</div>
			<div data-v-74fec56a="" data-v-d269120a="" class="loading" style="display: none;">
				<div data-v-74fec56a="" class="v-dialog v-dialog--persistent" style="width: 300px; display: block;">
					<div data-v-74fec56a="" data-v-5197ff2a="" class="v-card v-sheet theme--dark teal">
						<div data-v-74fec56a="" data-v-5197ff2a="" class="v-card__text">
							<span data-v-74fec56a="">Loading</span>
							<div data-v-74fec56a="" data-v-5197ff2a="" role="progressbar" aria-valuemin="0" aria-valuemax="100" class="v-progress-linear mb-0" style="height: 7px;">
								<div data-v-74fec56a="" class="v-progress-linear__background white" style="height: 7px; opacity: 0.3; width: 100%;"></div>
								<div data-v-74fec56a="" class="v-progress-linear__bar">
									<div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate v-progress-linear__bar__indeterminate--active">
										<div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate long white"></div>
										<div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate short white"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("include/footer.php");?>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/plugins/owl.carousel.min.js"></script> 
		<script src="assets/js/app.js"></script>
		<script>
		var rechbut = document.getElementById("rechbut");
		rechbut.addEventListener("click", function(event){
				event.stopPropagation();
				var rechamt = document.getElementById("rechamt").value;
				var wepay = document.getElementById("wepay");
				var ekpay = document.getElementById("ekpay");
				if(rechamt=='' || rechamt==0){
					document.getElementById("toasttext").style.display="";
					setTimeout(disperror, 1500);
				}
				else{
					if(wepay.classList.contains("van-radio__icon--checked")){
						window.location.href='wepay.php?ramt=' + rechamt;
					}
					else if(ekpay.classList.contains("van-radio__icon--checked")){
						window.location.href='ekpay.php?ramt=' + rechamt;
					}
				}
			});
			
			function quickmoney(qmoney){
				document.getElementById("rechamt").value = qmoney;
				if(qmoney==500){
					document.getElementById("500").classList.add("choose_active");
					document.getElementById("1000").classList.remove("choose_active");
					document.getElementById("2000").classList.remove("choose_active");
					document.getElementById("5000").classList.remove("choose_active");
					document.getElementById("10000").classList.remove("choose_active");
					document.getElementById("49999").classList.remove("choose_active");
				}
				if(qmoney==1000){
					document.getElementById("1000").classList.add("choose_active");
					document.getElementById("500").classList.remove("choose_active");
					document.getElementById("2000").classList.remove("choose_active");
					document.getElementById("5000").classList.remove("choose_active");
					document.getElementById("10000").classList.remove("choose_active");
					document.getElementById("49999").classList.remove("choose_active");
				}
				if(qmoney==2000){
					document.getElementById("2000").classList.add("choose_active");
					document.getElementById("1000").classList.remove("choose_active");
					document.getElementById("500").classList.remove("choose_active");
					document.getElementById("5000").classList.remove("choose_active");
					document.getElementById("10000").classList.remove("choose_active");
					document.getElementById("49999").classList.remove("choose_active");
				}
				if(qmoney==5000){
					document.getElementById("5000").classList.add("choose_active");
					document.getElementById("1000").classList.remove("choose_active");
					document.getElementById("2000").classList.remove("choose_active");
					document.getElementById("500").classList.remove("choose_active");
					document.getElementById("10000").classList.remove("choose_active");
					document.getElementById("49999").classList.remove("choose_active");
				}
				if(qmoney==10000){
					document.getElementById("10000").classList.add("choose_active");
					document.getElementById("1000").classList.remove("choose_active");
					document.getElementById("2000").classList.remove("choose_active");
					document.getElementById("5000").classList.remove("choose_active");
					document.getElementById("500").classList.remove("choose_active");
					document.getElementById("49999").classList.remove("choose_active");
				}
				if(qmoney==49999){
					document.getElementById("49999").classList.add("choose_active");
					document.getElementById("1000").classList.remove("choose_active");
					document.getElementById("2000").classList.remove("choose_active");
					document.getElementById("5000").classList.remove("choose_active");
					document.getElementById("10000").classList.remove("choose_active");
					document.getElementById("500").classList.remove("choose_active");
				}
			}
			
			function selectpay(payname, payname1){
				document.getElementById(payname).classList.add("van-radio__icon--checked");
				document.getElementById(payname1).classList.remove("van-radio__icon--checked");
			}
			
			function disperror(){
				document.getElementById("toasttext").style.display="none";
			}
		</script>
	</body>
</html>