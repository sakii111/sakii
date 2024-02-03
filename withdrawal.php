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
	$selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
	$walletResult=mysqli_fetch_array($selectwallet);
	
	$bankquery=mysqli_query($con,"select * from `tbl_bank` where `userid`='".$userid."'");
	$bankrow = mysqli_num_rows($bankquery);
?>
<html lang="en" style="font-size: 104.5px;">
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
			
			@keyframes incre {
				0% {
					transform: translateY(-10%);
					opacity: 0;
				}
				100% {
					transform: translateY(0);
					opacity: 1;
				}
			}
			@keyframes decre{
				0% {
					transform: translateY(0);
					opacity: 1;
				}
				100% {
					transform: translateY(-10%);
					opacity: 0;
				}
			}
			
			@keyframes increar {
				0% {
					transform: rotateY(180deg);
				}
				100% {
					transform: rotateX(180deg);
				}
			}
			@keyframes decrear{
				0% {
					transform: rotateX(180deg);
				}
				100% {
					transform: rotateY(180deg);
				}
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-51265586="" class="recharge">
			<nav data-v-51265586="" class="top_nav">
				<div data-v-51265586="" class="left">
					<img data-v-51265586="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-51265586="">Withdrawal</span>
				</div>
				<div data-v-51265586="" class="right">
					<img data-v-51265586="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAA30lEQVRoQ+2YUQ7CMAxD65
					uxkyFOxjhZEAeATKndocz7j1P7JVpVjCYfmvgYNvJvJE3EREQJeLREwZZlr0MkIu7lmIiFAB6/5FIiEfEcY9yIZ6pI7QA2G/kk0IlIjx2pDPQZNemyn3GoSk8
					bqaSmrDERZboVbROppKasSYl0+rP70kgcJd9+iWGukUqXfc0x5rvYyHyGXAUT4eY5r2Yi8xlyFVIioge6F4CdaeWIEcVda7ORLxgvRUTxQLd+R5gLqdRKR0vZ
					nKltI8w0GVomwkiRqWEizDQZWibCSJGp8QahV0QzxiHkWgAAAABJRU5ErkJggg==" alt="" onclick="window.location.href='withdrawalrecord.php';">
				</div>
			</nav>
			<div data-v-51265586="" class="recharge_box">
				<p data-v-51265586="" class="top_text">
					Balance: ₹ 
					<span data-v-51265586="">
						<?php echo number_format(wallet($con,'amount',$userid), 2);?>
					</span>
				</p>
				<div data-v-51265586="" class="code_input_box">
					<div data-v-51265586="" class="code_input">
						<img data-v-51265586="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEw
						EAmpwYAAAFwmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4
						gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3
						LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiP
						iA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodH
						RwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZ
						lbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9w
						aG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0xN
						FQxMTowMzoxNSswODowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMC0wNy0xNFQxMTowMzoxNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMT
						RUMTE6MDM6MTUrMDg6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZmMyMzc2MDgtMmQ0NC01NjQ0LWFlZTAtNTA0NGRlYWJmYzFhIiB4bXBNTTp
						Eb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6YTk3OWMxMWMtZmZjYi1lOTQ1LTg2ODMtYmNiNGQwMjMyNDc1IiB4bXBNTTpPcmlnaW5hbERv
						Y3VtZW50SUQ9InhtcC5kaWQ6ZDA0NzZhNTktYjQyZS0yNjQ1LWFiNTQtNTM4ZDAxOWQ3NjNlIiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgcGhvdG9zaG9wO
						kNvbG9yTW9kZT0iMyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSU
						Q9InhtcC5paWQ6ZDA0NzZhNTktYjQyZS0yNjQ1LWFiNTQtNTM4ZDAxOWQ3NjNlIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTE0VDExOjAzOjE1KzA4OjAwIiB
						zdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6
						aW5zdGFuY2VJRD0ieG1wLmlpZDpmYzIzNzYwOC0yZDQ0LTU2NDQtYWVlMC01MDQ0ZGVhYmZjMWEiIHN0RXZ0OndoZW49IjIwMjAtMDctMTRUMTE6MDM6M
						TUrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2
						VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+M6WVOwA
						AA15JREFUaIHV2j9sHEUUx/HPrawtQkAWBgokQghSrEsTZEGRMoeULoLGBAukiM5poKJNAXQ00JC4QVGkkAANfzokO2UK/qXicBAOfySKgIWFrEjewqaY
						Pdtn3Z/dvd3by1dycb6Zeb+3Ozcz781rLC8vK4mncBrPYxZH8RgeQgOb+Ae/YRXf4Sb+LMP41Ij9j+A8XsWJIW0fTf+O48y+//+EG7iK34sKiQr2O4nPc
						BfvGO7EIE6kY6ylY54sMkheR57AFfyI+QL9h2mZT8e+ktrK1Tkr88LcPi/M+apopDZWU5uZyOJIjI+E1z5dRFlBplObl1INAxnmyGF8jQsjyyrOYqrh8K
						BGgxw5hG90rzB1cUbQcqhfg36OxMJTOFWBqKKcwlf6TLN+jnyAVkWCRuFFfNjri16OnFPvb2IYi8IG3MVBR57E5bHIGY1LgtZdDjryvvEusUWZFrTust+
						ROSyMU82ILAia0e3IRdXu2GXTEDRj7/T7NM5m6T0zM6PZbIrjoZttIZIk0W63ra+vZ2l+Fs/gbueNvC7juatKJyCOY81mM2vzCG+w90Zey2MIVlZWcsjL
						TqvVyvugzuFiJER2mR/BBHIcxyKTuYPn5fSUEGPnptWaKP+fi4RX86AzG+HZulWUwLEIj9etogSmp/BIkZ5VLr8FeLjMLEitRPivbhElsBnh77pVlMC/E
						X6tW0UJrEW4U7eKEliNhKz4g87tCNWso+PlZiTcT7TrVjICv2CtE49cw3tZeiVJIo7jSg+NSZLkaf4pe1HhNWxn6dVut/MaysXW1pZ2O/ME2cbH0Nh39f
						YFXipdWbV8iZfpjtPfxU4dagqyI9x0oduR73F97HKKcx0/dD4cPDS+jY1xqinIhqB1l4OO/GWyE9gdLghad+l1jL9hshPZS4LGLvrFI2+ZzB1/BW/2+qK
						fI4mQjrxVlaIC3BI09dzEBkWI9+3d3dVN5y7zfr8Gw0LdTeEpLJUoKi9LqYbNQY2yxOyJcN31ivEuzRtCXndRn+m0nzzJh8+Fqp+rqj0B7KQ2ZoWCgUzk
						zaLcE8or5gTHMh00M7KdjjmX2riXp3PRMqfbwlTrlDktKJ7R/xmfGLHMqVFi4dkRofDsBSGffFQoPOuUXuwvPLuDb4XCsz/KMP4/Zcak671xbaEAAAAAS
						UVORK5CYII=" alt="">
						<input data-v-51265586="" type="number" placeholder="Enter withdrawal amount" id="amount" name="amount">
					</div>
				</div>
				<div data-v-51265586="" class="text_field">
					<p data-v-51265586="">
						Fee: 
						<span data-v-51265586="" id="fee">
							0
						</span>
						,to account 
						<span data-v-51265586="" id="toaccount">
							0
						</span>
					</p>
				</div>
				<div data-v-51265586="" class="payment_box">
					<p data-v-51265586="" class="payment_text">Payout</p>
					<div data-v-51265586="" role="radiogroup" class="van-radio-group">
						<div data-v-51265586="" role="radio" tabindex="0" aria-checked="true" class="van-radio">
							<div class="van-radio__icon van-radio__icon--square van-radio__icon--checked">
								<i class="van-icon van-icon-success"><!----></i>
							</div>
							<span class="van-radio__label">
								<span data-v-51265586="" class="text">Bankcard</span>
							</span>
						</div>
					</div>
				</div>
				<div data-v-51265586="" class="add_card">
					<div data-v-51265586="" class="van-collapse van-hairline--top-bottom">
						<div data-v-51265586="" class="van-collapse-item">
							<div role="button" tabindex="0" aria-expanded="false" class="van-cell van-cell--clickable van-collapse-item__title" id="bankcard">
								<div class="van-cell__title">
									<img data-v-51265586="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABaElEQVRoQ+
									1ZO07DQBCdOQhSLkEfLkCfjgopBZ1HchnqWblIBRWpcgFaJLhIquQYlidyFEfGARPLO/aymW29fm/fvNnfLEIkDSPRASYkNCfNEXNEKQI/pla
									appM8zydKnL1gi6LYZFm2bYKcCSGiJQA89WLT//mdme/rNN+EENEjALzqj6M/g4gsnHPPFVJTyBsAPBw/fvWnU0GYHlF3zHzzm5BPADh0FJE7
									51xQYpIkmSJiOcZDY+aTEU1HTIhKEjVAr96RxRBR7sqBiKdxXTRHuhKM0d+EjBH1Nk5z5L86EtSuXgtidUSxnX30zLr6nd1Ov1o5aKmlfbEio
									jUi3rY5KCIfzDwv+wTrSCkEAGZ/pOKLCRnqzm6OhFZ8iMmRqobWOt+ZeRX0qtV14wx2+TUhoU12TUfqReyuPEP3by1ix/GsUIY0ioeeKjeieH
									obOtF98dk7u69I+sIxR3xF0heOOeIrkr5w9v4wfUJPH/TeAAAAAElFTkSuQmCC" alt="">
									<div data-v-51265586="" class="nav_name" id="bankcardname" name="bankcardname">Select Bank Card</div>
								</div>
								<i class="van-icon van-icon-arrow van-cell__right-icon" id="bankcardarrow"><!----></i>
							</div>
							<div class="van-collapse-item__wrapper" style="display: none;" id="bankcardlist">
								<div class="van-collapse-item__content">
									<?php 
										if($bankrow>=1){
											$i = 1;
											while($i <= $bankrow){
												$bankarray = mysqli_fetch_array($bankquery);
												$bankname = $bankarray['bankname'];
												$account = $bankarray['bankaccount'];
												$idi = $bankarray['id'];
												
												$firstThree = substr($account, 0, 3);
												$lastThree = substr($account, -3);
									?>			
										
										<div data-v-51265586="" class="nav_content" onclick="updatebankc(<?php echo $i; ?>, <?php echo $idi; ?>);" id="<?php echo $i; ?>"><?php echo $bankname . " " . $firstThree . "****" . $lastThree; ?></div>

									<?php
											$i++;
											}
										}
									?>
									<div data-v-51265586="" class="nav_content" onclick="window.location.href='addbankcard.php';">Add Bank Card</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div data-v-51265586="" class="password_box">
					<div data-v-51265586="" class="box_border">
						<img data-v-51265586="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpw
						YAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wb
						WV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM
						5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0a
						W9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWV
						udHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlL
						mNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3J
						Ub29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhd
						GU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2U
						vcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9Inhtc
						C5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOmViYjZmNDRmLTkyYTktZWM0Yi05Yjl
						hLTVjMzY4NDljOTU1YyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOmViYjZmNDRmLTkyYTktZWM0Yi05YjlhLTVjMzY4NDljOTU1YyI+IDx4b
						XBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJ
						hOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTA3VDE2OjUxOjQ3KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZ
						SBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1
						wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PndQ10oAAAiYSURBVGiB7ZlrrF1FFcd//9n7nNOWWlrSogKClCqltBBQCc8EooCCkAgE8QMxRBPxAyISGqOiH/QLE
						EN8EBMfiUoMGPwkEAGbRqHIQx4CQhWwvIQAt1Bp6b33nLP3/P1w9pzOPb339oGJDen6cs/eM7Nm/WbWXmvNXNnm3SDh/23A/0r2guxpshdkT5O9IHualACrV68
						GQBK2sY0kJFFVFZJot9vDdyn3VFVFjHG+pLdtE2MEIISAJGKM1HVNURSUZTnUnaQoCmxT1zUhBDqdDiEEJicnh/OGEKbYE2MczgNQluU2kF2RGONBksbqur4wx
						vimJNkubJfA2hDCJklzY4xVXdf92SCSUTnExMQEdV3vEkRVVTsFEgb2x+NDCK1+v39JURT71HW9StIRwOPA5hDCSbb/JGmd7adjjI8URfF8WZY929VMEEVR0G6
						3dwlCEkVRDCFCCDsEmQd0JH01xrgixngGUNd1vUhS6nNU+i3pNOA0SZtCCPcXRXGr7bttPzkTRKfTQdIQIrnlrkDA7K61EDguhHCJpIuACigbo6tm7CSwRdISA
						Nvp/aIQwqdsHw88AvwUuK0oivFRCOAdQ8QYZwRZCFxo+/OSTmzelQ3AVtvrbK8PIXxA0u+73e7iTqdzMdC2vUTSnEbHIuDjwMmSvhFj/HWMceMoRPpOdhdC0rQ
						g84FzgcuBFdn7J22/0m63v1VV1dyqqv5se3G/3x+PMY7HGG8Clks6XtJK2+cC+wICOsCXY4wqy/L77XZ7CGF7Woi6rofBYTaINHY6kFMkXZVD2F4L3BRCWCPp+
						RSFut3uRiCt7pikMUn32D4UeBA4HzgBmGN7maTvSnoL+NXExEQ/N/ydQMD0CfF7wMrs+S7bVwO32H4+RZVWq0UIgVarNZwwyzHPATc0424Gxhtdc21fMTExsWx
						XIGxTVdUQaBTC9lQQ25cBx2av/gZ8W9LDtt+yTb/fH67MvHnzKIpiu0SZlEu6D/gx8BBggLquD7d93s5ApJ1PSTUl3VGI0R1ZDHwlM2QLcD3wqKRuPqiu62Hmn
						QUCIAIPA9cC/26aC+BiSUt3BJFXBrNBjIKcCizLnm8FbgF6sK3sSEqqqqKqqu0ydgaRyx3AvelB0uG2PyGplRZmNoi8ApgOInetNvCZbOIJST8AJnJr8los+e1
						OQGC7tn37iK6zgPkxxh1C5JFtOgjYtiP7Aidm86yX9Oh2FsEwauS7swMIAFqt1l3Ahqzp6Bjjogyi2EmIkPTa1nABGqULgAOy1XrIdn86kDRw9PZlNoiyLJH0u
						u27JF3atO1je5Gks4F/lmX5dozxqLquNxVFsd720baLEMLjkt4HHGD7GWDC9irgFeBlSUdIWp9A3s/AvZIBz860wqNGpxWbDiBBAPR6PWyvTSDAAklXSloJzLf
						9YIxx/xDCCuBB23UI4RgGQWKD7SMlzbP9F+BgScuBdYPi29cmkP1HDClmgsgjzUztOURRFExOTqYF2JJ17Uj6HE3dFmM8VFIEgu1zGv0GDrF9EtBlUCEsl9Rjs
						PAXNfNdk3/sk2kGSQfOBpEkPxvkkkBTKZ7lmsOzbnXiBd5ofoeRNmV2dbJFSt6TDJibduQ/DX2SRQzifVI4K0QedVKfVPSlg1Vd19R1vSzTsSnGeJ2kY4Gtks4
						BljRtLwG/Az4NbAaOy2y7kUHOO5VBBfEy4ATyAjAGHNw8H9R0fm02iJncK42p68E6NDBFXdenpXZJk5KujzH2Ja2SdHo29iFJV0n6oe0vjID8EniSQc47qIF5L
						IG8xKDISyArgaXAazuCsD1c8dG+OYztj0o6MjPo70VRxGY3n2Dg/0meizEWIYSXgGdG1uhF4HWaRWbgZr3kk1tt3wFsbZ4XAOfbnrMjiKIoCCEMI1f+sad+jVt
						9acSg29jmugvJoiZTD3wLRsYVnhr7B5VHY6BtrwFSEmzZvkDSGVmf7SDKshxm4tG2ETlB0sXZ8xiDsiVJsP0i8GzzvDlrWwhsATY2uuePKp9CHkJ4AbgdOLkx6
						kDgCgYf5T2jLpNCa7/fH0LkIJmbfRi4OpsrAj+z/a+kT9JW4OfApO3XgE1s2627gcOAx5pM/vaMIFnZcZvt84CPNW2n2r6UQQR7BNhi2zlEvht5KdHIMcAXgVO
						yRXij3W7/oqqq4TigK+lHthfTrHym517gKQ+um8YYhOTtZJiSm4H/sH2t7adowrGkT0r6GnAm0G61WhRFERKEbXq9XsrczRABnGf7m8BnGRyfAZgzZ86V7XZ7Q
						zprpLmb3xtH7EnwmxoImJomhlLmg2KMNXAncAhwWfN3vybGf9D2iUVR3NDr9d5sLueW9Pv9sSZfHNG4y4WS9gO+05Tp78nmuy6EcKOam8vpKuhpIKaze3qQBiL
						RbpF0k+1uCOES2ysZRJRVwKp+v3+6B/dUd4YQ5rZarQ9Jur/Vap0p6VAGddNHGHwLIf0NIXw9xviTbrdLu92m1WoNb1JymN2BGILkWbrZ5lcl/QYYs325pBUMa
						qM5TfF2pKQLbG8oiuKwEMLlDKqDhZnuALwK9EIIq0MIv015pdfrAUyBSUFjdyCGICMQSIqSNlVV9YcQwpvA2cAxko6NMVrSPo2hy7IJF7JtF7D91xDCGmCN7bU
						p50wHk9wsfXO7CjEFJIMASGfyzZL+CKwry/KoqqrOApZJWt4AHcygPnrCtiQtAG6OMb7X9jUhhHFJL+RH1XRgSjBqbko6nQ7dbndYCewWyChEfn0JUJblhO0Hb
						D/QarWWVlV1NIPvprZ9oO2ttu+WtBS4r67rtwDVde3mUDXl8iDfmW63S6fToSxLOp0O4+Pj01u6MyA7gBhGl1arhe0Ntjc0h5zKds92C+jbfjq5hW3nReN0MGl
						nut0utod3ZLsj2h1/3BPlXfOvt70ge5rsBdnTZC/InibvGpD/AoKp8oshNVzOAAAAAElFTkSuQmCC" alt="">
						<input data-v-51265586="" type="password" placeholder="Enter your login password" id="password" name="password">
					</div>
				</div>
				<input data-v-51265586="" type="hidden" id="crossover" name="crossover" value="">
				<div data-v-51265586="" class="recharge_btn">
					<button data-v-51265586="" id="withdrawal">Withdrawal</button>
				</div>
			</div>
			<?php include("include/footer.php");?>
			<div data-v-74fec56a="" data-v-4a43e45d="" class="loading" style="display: none;" id="loading">
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
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2006; display: none;" id="amterror">
				<div class="van-toast__text">Enter withdrawal amount</div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2007; display: none;" id="bcerror">
				<div class="van-toast__text">Select Bank Card</div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2007; display: none;" id="pserror">
				<div class="van-toast__text">Enter login password</div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2007; display: none;" id="success">
				<div class="van-toast__text">Success</div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2007; display: none;" id="incamt">
				<div class="van-toast__text">Incorrect amount</div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2007; display: none;" id="wrgpass">
				<div class="van-toast__text">Wrong password</div>
			</div>
		</div>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script src="assets/js/plugins/owl.carousel.min.js"></script> 
		<script>
			document.getElementById("amount").oninput = function() {feeFunction()};
			
			function feeFunction(){
				var amt = document.getElementById("amount").value;
				var fee = amt * 5/100;
				var tcent = amt * 2/100;
				var tacc = amt - tcent;
				document.getElementById("fee").innerHTML = fee;
				document.getElementById("toaccount").innerHTML = tacc;
			}
			
			var bankcard = document.getElementById("bankcard");
			var bankcardlist = document.getElementById("bankcardlist");
			var bankcardarrow = document.getElementById("bankcardarrow");
			bankcard.addEventListener("click", function(event){
				event.stopPropagation();
				if (bankcardlist.style.display === "none") {
				  bankcardlist.style.display = "block";
				  bankcardlist.style.animationName = "incre";
				  bankcardlist.style.animationDuration = ".3s";
				  bankcardarrow.style.animationName = "increar";
				  bankcardarrow.style.animationDuration = ".3s";
				  bankcardarrow.style.transform = "rotateX(180deg)";
				} else {
				  setTimeout(bankcardlistdisp, 200);
				  bankcardlist.style.animationName = "decre";
				  bankcardlist.style.animationDuration = ".3s";
				  bankcardarrow.style.animationName = "decrear";
				  bankcardarrow.style.animationDuration = ".3s";
				  bankcardarrow.style.transform = "rotateY(180deg)";
				}
			});
			function bankcardlistdisp(){
				bankcardlist.style.display = "none";
			}
			
			function updatebankc(id,idi){
				var bk = document.getElementById(id).innerHTML;
				document.getElementById("bankcardname").innerHTML = bk;
				setTimeout(bankcardlistdisp, 200);
				bankcardlist.style.animationName = "decre";
				bankcardlist.style.animationDuration = ".3s";
				bankcardarrow.style.animationName = "decrear";
				bankcardarrow.style.animationDuration = ".3s";
				bankcardarrow.style.transform = "rotateY(180deg)";
				document.getElementById("crossover").value = idi;
			}
			
			function amounterror(){
				document.getElementById("amterror").style.display="none";
			}
			function bankcarderror(){
				document.getElementById("bcerror").style.display="none";
			}
			function passworderror(){
				document.getElementById("pserror").style.display="none";
			}
			
			function successdisp(){
				document.getElementById("success").style.display="none";
			}
			function incorrectamt(){
				document.getElementById("incamt").style.display="none";
			}
			function wrongpass(){
				document.getElementById("wrgpass").style.display="none";
			}
			function loaddisp(){
				document.getElementById("loading").style.display="";
			}
			function loadhide(){
				document.getElementById("loading").style.display="none";
			}
			function redmine(){
				window.location.href = "mine.php";
			}
			
			document.getElementById("withdrawal").addEventListener("click", function() {
				var amount = document.getElementById("amount").value;
				var bankcardname = document.getElementById("bankcardname").innerHTML;
				var password = document.getElementById("password").value;
				var crossover = document.getElementById("crossover").value;
				if(amount == "" || amount == 0){
					document.getElementById("amterror").style.display="";
					setTimeout(amounterror, 1500);
				}
				else if(crossover == ""){
					document.getElementById("bcerror").style.display="";
					setTimeout(bankcarderror, 1500);
				}
				else if(password == ""){
					document.getElementById("pserror").style.display="";
					setTimeout(passworderror, 1500);
				}
				else{
					$.ajax({
						type: "POST", 
						data:"amount=" + amount+ "& bankcardname=" + bankcardname+ "& password=" + password+ "& crossover=" + crossover,
						url: "withdrawalrequest.php",                   

						success: function(html)   
						{
							var arr = html.split('~');
							if (arr[0]== 1) {			
								document.getElementById("success").style.display="";
								setTimeout(successdisp, 1500);
								setTimeout(loaddisp, 1550);
								setTimeout(loadhide, 1750);
								setTimeout(redmine, 1750);
							}
							else if (arr[0]== 2) {			
								document.getElementById("incamt").style.display="";
								setTimeout(incorrectamt, 1500);
							}
							else if (arr[0]== 3) {			
								document.getElementById("wrgpass").style.display="";
								setTimeout(wrongpass, 1500);
							}
							else if (arr[0]== 0) {			
								document.getElementById("bcerror").style.display="";
								setTimeout(bankcarderror, 1500);
							}
							
							return false;
						},
						error: function (e) {}
					})
				}
			});	
		</script>
	</body>
</html>