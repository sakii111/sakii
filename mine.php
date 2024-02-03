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
	
	$selectrusercom=mysqli_query($con,"SELECT SUM(`interest`) as inttotal FROM `tbl_interest` WHERE `uid` = '".$userid."'");
	$userresultcom=mysqli_fetch_array($selectrusercom);
	$userInterest = $userresultcom['inttotal'];
	
	$selectrusercomb=mysqli_query($con,"SELECT SUM(`amount`) as inttotalb from `tbl_transaction` where `userid`='".$userid."' AND `transtype` = 'LVL1COMM'");
	$userresultcomb=mysqli_fetch_array($selectrusercomb);
	$userInterestb = $userresultcomb['inttotalb'];
	
	$signinuser=mysqli_query($con,"select * from `tbl_signin` where `uid`='".$userid."'");
	$signinuserA = mysqli_fetch_array($signinuser);
	if(!empty($signinuserA['totaldays'])){
		$totaldays = $signinuserA['totaldays'];
		$todayrebates = $signinuserA['todayrebates'];
		$totalrebates = $signinuserA['totalrebates'];
		$status = $signinuserA['status'];
	}
	else{
		$totaldays = 0;
		$todayrebates = 0;
		$totalrebates = 0;
		$status = 0;
	}
	
	$teleq=mysqli_query($con,"select * from `tbl_telegram` where `status`='1'");
	$teler = mysqli_num_rows($teleq);
	if($teler>0){
		$telea=mysqli_fetch_array($teleq);
		$telev=$telea['value'];
	}
	else{
		$telev="telegram.me";
	}
?>

<html lang="en" style="font-size: 102.8px;">
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
		<!--<link rel="stylesheet" href="assets/css/style.css">-->
		<style type="text/css" id="operaUserStyle"></style>
		<style>
			body::-webkit-scrollbar {
			  display: none;
			}
			.van-cell__right-icon{
				transition: transform .3s,-webkit-transform .3s;
				transform: rotateY(180deg);
			}
			@keyframes incre {
				0% {height: 0px;}
				100% {height: 156px;}
			}
			@keyframes decre{
				0% {height: 156px;}
				100% {height: 0px;}
			}
			@keyframes incresec {
				0% {height: 0px;}
				100% {height: 60px;}
			}
			@keyframes decresec{
				0% {height: 60px;}
				100% {height: 0px;}
			}
			@keyframes increabt {
				0% {height: 0px;}
				100% {height: 108px;}
			}
			@keyframes decreabt{
				0% {height: 108px;}
				100% {height: 0px;}
			}
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

			.ion-md-home:before {
				content: "";
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
		<div data-v-4a43e45d="" class="mine">
			<div data-v-4a43e45d="" class="mine_top">
				<div data-v-4a43e45d="" class="mine_info">
					<div data-v-4a43e45d="" class="mine_info_top">
						<div data-v-4a43e45d="" class="info_left">
							<img data-v-4a43e45d="" alt="" class="photo_img" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC
							9zdmciIHZlcnNpb249IjEuMSIgaGVpZ2h0PSIxMDAiIHdpZHRoPSIxMDAiPjxyZWN0IGZpbGw9InJnYigxNzksMjI5LDE2MCkiIHg9IjAiIHk9IjAiIHdpZHRoPSIx
							MDAiIGhlaWdodD0iMTAwIj48L3JlY3Q+PHRleHQgeD0iNTAiIHk9IjUwIiBmb250LXNpemU9IjUwIiB0ZXh0LWNvcHk9ImZhc3QiIGZpbGw9IiNmZmZmZmYiIHRleH
							QtYW5jaG9yPSJtaWRkbGUiIHRleHQtcmlnaHRzPSJhZG1pbiIgYWxpZ25tZW50LWJhc2VsaW5lPSJjZW50cmFsIj45PC90ZXh0Pjwvc3ZnPg==">
							<ul data-v-4a43e45d="">
								<li data-v-4a43e45d="">User：91<?php echo user($con,'mobile',$userid);?></li>
								<li data-v-4a43e45d="">ID：<?php echo $userid; ?></li>
							</ul>
						</div>
						<div data-v-4a43e45d="" class="info_right" id="notice">
							<div data-v-4a43e45d="" class="notice">
								<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACxklEQVRoQ+2ZP2gUQRTGv7dH
								qjSWahVBicQyB4J/IGkEW0XBzk5stNiZvSNNkibc7pstFATt7ARFLAUbA2pAMKXBoIWVWtqkkOP2ycAdRHOX3dmbu1zCPjgWbt68937zvpvdmyWM0LTWTwBc6aZ
								4w8x3RpWORhVYKbVMRCu744vIijFmdRQ5RwaitZZ+BddqtVOtVuu7b5ixg4jIojFmvQIZsAJeO6K1vgVgAcB899Mv7R8ieiQiG8z80ldnvIBora8DuA/gsmNh7w
								A88AE0FEiz2ZzpdDrLAG47Avzv/rRWq60OswmUBtFa3wCQAJgZEqI33e5kETO/KBOvFEgX4nmZhAXm3CwD4wyilFogorcFCirtUmaLdgbRWlsIuzON0taZedElg
								RNIv8cOl2Quvq6PM4VBlpaWTrTb7U8ATroUNITvj6mpqfra2trPIjEKg4yzG73CXbriAvKViE4XWR1fPiLyzRhzpki8QiCNRuNClmUfigT07RMEwcU4jjfy4hYC
								OQhZucpr4kEAPGbmu4e+IwBeMfO1owBS6OZ4GKRVgeyR40HuWgCqjlQdydsiS45X0qqkVVI6edMqaVXSytNIyfFKWpW0Skonb1p5aSmlzgNYJSJ7PZaXaUzjv0X
								kI4BlY4y9/mN9/49ore35lX3HMYm2ycz1XJAwDOeCIPg8iQS9mrIsO5em6dbuGvd0JIqiWRH5MskgRHQ2SZLtfUHs4JGQlgUJw/AqET0c98lingrsyaOI3EvT9H
								Xub6TnoJSaFpE5IprOSzCOcRHZIaItY8xOv3yFTlHGUeiwOSqQQSuolHpGRMf3W2ER+WWMse/kvZn3jkRRpEXEvu0daEQUJUnC3igAeAcJw3A+CAL7ZDDQsiyrp
								2m6OdEg3fuQAjBoxTUzG58QNpb3jvQKbDQal7IsawGY7X63HQRBM47j974hbLy/futAQjLys7MAAAAASUVORK5CYII=" alt="">
							</div>
						</div>
					</div>
					<div data-v-4a43e45d="" class="mine_top_items">
						<div data-v-4a43e45d="" class="top_item">
							<div data-v-4a43e45d="">₹ <?php echo number_format(wallet($con,'amount',$userid), 2);?></div>
								Balance
							<button data-v-4a43e45d="" class="one_btn ripple" onclick="window.location.href='recharge.php';">
								Recharge
							</button>
						</div>
						<div data-v-4a43e45d="" class="top_item">
							<div data-v-4a43e45d="">₹ <?php echo number_format($userInterestb, 2); ?></div>
								Commission
							<button data-v-4a43e45d="" class="one_btn ripple" onclick="window.location.href='reward.php';">
								See
							</button>
						</div>
						<div data-v-4a43e45d="" class="top_item">
							<div data-v-4a43e45d="">₹ <?php echo number_format($userInterest, 2); ?></div>
								Interest
							<button data-v-4a43e45d="" class="one_btn ripple" onclick="window.location.href='interest.php';">
								See
							</button>
						</div>
					</div>
				</div>
			</div>
			<div data-v-4a43e45d="" class="mine_nav">
				<ul data-v-4a43e45d="">
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" id="signin">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADi0lEQVRoQ+2Zu2sUURTGvzv
							DCho1+AIRwYCgEAVFwRcWiqBoISjERgULiRiwSGbObMTCtVkkZ7YKilHQJiZiwDpioYWiFtFKwb9AFLELxGaOXJkJm81M9mYeyxoy5dw73zm/+93nXIUl8qglw
							oFlkHZzMpUj/f39623bviEi92q12q+8oFzXvZ1WMxUIEX0GsBfAF2benQcIEY0CuJhWMy2IRMkzcyqNRngiyqQZm0S5XO4UkYqIHAtbPo9Gz6rxEcDbUqnE1Wr
							1R6PYPJByuXwkCIJ3WaMW+X0QBLtqtdrX+hhzQPr6+lZ3dHR8A7ClyERy0P4yMzOzf3h4+E+kNQeEiK4AeBIW/haRZwAm5tmo1OvonYgczyExqCaaSqkDInJLK
							bVWx1NKXR8aGnqQBPIIwNWw8CkzX4pLkoh+AtgE4Dczb8gDxETTdd1JpdSpMN4oM19OAtEtrQc49GD3ff9OXJKe550XEb2OjPi+r13L/AwMDOywbXtkIU29zii
							lKmGwN8w82xsau5YRSOasUwosgyR1rZQNmvmz1I5kjlyAwKLHSAE55C1pNtjzjlqAnhmInn4LCJ5ZctFda6F1JHM2KQVSD/ZWz1qu6x7zff9NEmfbg/T09NhdX
							V3jAHoAfGTmQ3EwbQ1SqVRWTE9P623OuSj5uG26LmtbkN7e3lWdnZ3aibN1Dkww84X/xhHP89aEx4QzJhBt6cjg4OC6IAjGRSTakus8E52IQHPvWkQ0AqA3zRT
							tOM5Gy7L0mDhh6kQhIHqKbDjNJZ5bGvs5EW0GoMfEvzNP+DR1ohAQLUpEHwAcjAKYOON53lbdnZRSR9NAFDJGHMfptizrOYBdJjCO42yzLEs7cTgtRCEgWtQUh
							oi2AxgDcCALRGEgJjDhOVw7sS8rRKEgC8GIyIRt22MisicPiMJBkmD0z+j6MWSyTsSt5vXvcl9H4gLGjZm8nChs+k1quQQY43WiLRyJkghhHgPYCeBV0gawWdJ
							x5S3pWmkSW+w3yyCtPuo2c8jYEc/zbopINRTUN0R9zPypWYBWlIeL64u6Kf0uM9+MYjf+xD4J4GVdYvoi5X0rEjWIoTepK+vqnWbmyVgQ/ZKINPXs+dkgQMurx
							O22Yy9Dieg6gPstz9As4ENmvtZYNfFqWZ8fROSwiHSb6RdbSyk1VSqVpqrV6ve4SLnckReLYKa+DGLWTq2rtWQc+Qu79LFRZ28khgAAAABJRU5ErkJggg==" 
							alt="">
							<span data-v-4a43e45d="">
								Sign In
							</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" onclick="window.location.href='order.php';">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB6ElEQVRoQ+2asUoDQRCGZyBP
							YKeV1r6EPoKgQsBGIYKN1Y1CGrU7bg4uYGvAxiCm8Q2Sh7ASCytLsRNygZGDPTkuF3PLJZtzs6nCMMPONzP7J3t7CJZ80BIOcCB16+TMjniet1OHpMMwHP6Vx1Q
							QIroAgDMA2KwDiIi8AkAvDMObonwKQYioCwAndQAoyOGQmft5+wRIu91ej+P4o6YQSVrvzLw1EyTZE4g4SB1F5LoOUIj4m4eI7Ob3zERHikCmzaUpQM/zrhxIdr
							RcR+Y0e2608qpVNFqqSqcAMBiPx60oir6TBmTsG7oNEZFuo9Hwfd9/y8YutCNE9AIA22rBO2ZuJd9zdl2WxP+cmW9NgvQAoKkWPGbmewWStWuDIOJeEATPJkGaI
							rKPiMNsBYkota/pUiBifzQa9TqdzpcxEN0kq/gvdI9USUw31oGUkV/dqlbxdx0p05GMOs1VteI4foyi6NOYahHREwAcqAUvmTlQvyNZu/ZEIeJREAQPDiStQNmD
							lTWjpT0zFQKcapVRrQoF1g51HVmpjixKtYz/jSciaw5Wdhx1rXn4oK2hFQKc/K6U/FaYFO1QN1pWXPRYc/Wmjqv//zI03YlWXE/nDv7/+4UBbY1ccsDMVziWnF/
							p5R1I6VIZcvwBChr8Ue16BMAAAAAASUVORK5CYII=" alt="">
							<span data-v-4a43e45d="">
								Orders
							</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" onclick="window.location.href='promotion.php';">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEMUlEQVRoQ+1ZXYgbVRT+zoSQp
							VtFfBHqCorgikJRXwoVoT4o+tBiH1pBfLD+IasRJfeMsBQ2FczuzpndQAsLSpGCCGJfSvdBqEIXEX/oi/qgtqC0FFZELIKLP2ySU6ZNlsnsJDOTmYm65EIecu/5+
							b57ztxz7gxhiwzaIjwwIvJfi2TqiDDznaq6E4D3AxFdFpF3+xFl5mdV9ba2/LlCofDd3NzcxTSbMzCRqamp7ePj4wLgpRAApwAcEZGv/WvMfB+AGQBPhOgsNxqNZ
							+r1+pVBCA1EpFKp3G1Z1vcRDn8H8KKInPTkmPkAgHcA3NRPr1gs7qjVaj8nJTMQEWb+AcBkHGeq+nA7hc7GkQewIiLXdJKMxESMMTNEVA1xsgJgT495b7rX2qZ5V
							a26rnskVyLM/CEAL002RrPZnFxcXLxgjNlFRF/GARChsywi++LY6cgkjggzXwYw4XPiiMgbnf+2bVdU1Y0AEaWzKiK35krEGHOeiO7qOAmmQZ/U28AVQ+eiiNyRK
							xHbtuuq+lrAySEROdE+mbzUizP66ZwQkUNxjPRNLWPMHiJ6HsDjAG5OYjBH2V9V9bRlWWcdx3k/6GfTM8LMpwHszRFQFqY3RayLSJJTJws0KW3c7+8cuogw8+sAF
							lM66FInok9V9W8Aj2ZpN3hgBIl41ddfoFZU1St0sUZIofwJwIOtVqthWdZnwW7AAxPL8PVm1MPVhc3fAUQSidMu2LY9oapfAdjhA/YPEe11HOdjb46ZHwJwBsCYT
							+ZSsVjcVavVfokixMybNjlzIsz8EYDH/GBardbLCwsLS/45Zi4DOBoAfVJEDv7rRJh5HoAdAHJcRF4IA8fMHwB4MrDGItK3G8g1IsaYp4noPT8oIrpQKBR2z87O/
							hZGZHp6+pb19fVzAK5drDpDVfe5rrvcKzK5ETHG7CQir4p3tfOq+ojrup/0S5UeHcC3RHTQcZzzPSKZzzMS1gWr6mHXdd+Kyndv3RhzjIheifu85BaRNpinALxNR
							NsBfCEiu+OQ6Mgw8zftu75XZ2ZExBl6avnAPEBEbzabTe+UupSEiG3bk6p6lIjmHMfpe4PMNSId0NVqdVu1Wv0zCYmOrG3bNziO80eU7lCIRIHIYn1EpL2LA73Ry
							CICQRupI5KkacyDQMdm2qYxT2xpbXdlS1T3m9ZZnvojInnu7iC2RxEZZNfy1EkUka1TR+Lc2fPcdl9zms99ZBjg/T5SV/b/a0SC3z5iv9MaUoT877VOicj+jRbGD
							8AY8xwRHR8SqLRuXhWRY6FEyuXyjWNjY6sAxtN6yVn/SqPRmKjX63+FEvEmK5XKPZZleSl2b85gBjW/alnWgfn5+c/9BkI/vZXL5VKpVNpPRLeramlQj1nqWZblX
							aV/XFtbO7O0tLQWtJ34G2KW4LK0NSKS5W5mYWvLROQqDqopUSkA7bQAAAAASUVORK5CYII=" alt="">
							<span data-v-4a43e45d="">
								Promotion
							</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" onclick="window.location.href='redenvelope.php';">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAA
							FEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4b
							Wxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICA
							iPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91d
							D0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM
							6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIge
							G1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3A
							gQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0yM1QxNDozMTozNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMjhUMTM6MzE6MjErM
							Dg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMjhUMTM6MzE6MjErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSI
							zIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzNmNGMxMGQtYmI1OS0xYTRkLTk2ZjgtM
							2U1MTUxMzM3YTlmIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjczZjRjMTBkLWJiNTktMWE0ZC05NmY4LTNlNTE1MTMzN2E5ZiIgeG1wTU06T3JpZ2luYWxEb2N
							1bWVudElEPSJ4bXAuZGlkOjczZjRjMTBkLWJiNTktMWE0ZC05NmY4LTNlNTE1MTMzN2E5ZiI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2d
							DphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NzNmNGMxMGQtYmI1OS0xYTRkLTk2ZjgtM2U1MTUxMzM3YTlmIiBzdEV2dDp3aGVuPSI
							yMDIwLTA3LTIzVDE0OjMxOjM1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDwvcmRmOlNlcT4gPC94b
							XBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpeylawAAAaVSURBVGiBvZprbFv
							lGcd/z7F97JCEtlnDQkIvi2giNnGNUGGMUW0QBBtFAcQgTEPdxto4DSIUSM34kA+odYpQt7QxpKISUNFdWgaVgHbTKIVxK2ydpq4ZLQWqtF0bmrq4xLHjy3n3wUl37
							NqJzzlO/1LkvM953+f//P3en2NRSjEBEaFk6Ovxo6lmNB5k6crB0jn+P8yxu6eDgGfXLEAZT6PwYVAB3DgtPCZo0+JVqVYUvsz//JBnelZMC48J0yWkJatsqC76114
							4LVzjKP3QCvUsBnV5lk2oJhV/AminPzgDg1YMdT1IE0IDyAb8XUud0NoTEgq+BTQBA4hsR2Qzyx77NBO0ehKVp42In77gjaRpGC+bHqoGW3GY3dtatULBo0BtjnUXi
							u8gVFuOwjB+xPLH37DazBy73TmyN49tkS0RIt12ROTCnhBRa5wSj+O/aPqGUjiyJ6QtsBPhFcfsIhtY2nnMsR+cLL9KAiCHHXCXrDfAiRB/136EgAPuf5SqN8Dphtj
							W9RLwG5uthx1x58D5zl4WDwDvWm+ojjvmNsG5kCXdcVC9FlsdR7Qxx9wm2NsQ8yEUXAssAq4wWUdBnQQZBo4AH6G0j5D0x/gDp+yTZZAV+7TdR84BSnsfCQV7ERYBm
							9HYPOUlqq+7AnyXIfJjlNGCyCeMxZfQ2f2VkzCc9Ugo+GegOcf6LiJ/PauuUvXApeN/2V+gsBeRTpZ1vWmFvjRDqy94HOGbVoinQAqRFbR1Fb1wOBPS230+bl/EWow
							WIPSjfd7B0g3JqaraF9LbcxFu5eRYUhyUegPd+DkP/Hpo8mp2hPT1XIKoAedRFo0DaEYLyx4vyGn9PrJ+1cJzLAKgAUPbR1/we8VUnlrI+lUL0bQPHYdlF8LfCPU8N
							GW1SYdWf3AuKT5Dpin/ZQ0P4l+5zmwobo78sVvnhO8dhIWW6JQBYzEwJqkjbvB5M+MhX6KisPO78Qe2nCkVJSQUfAp4xAoNSkHaYG7NPObrhReOcleK3UNDhGMpcFk
							6t36OpL5P2xNHM3RTHVHWrV6EVRFkRMxv/AFfNF8zedXIHhq3HCJsuMFliaQe3Mvh7Atd/h4JBXcAN1uiQIES5sy7jPuqdEaTSdxllXz3W03cOdsHpHnv0B42fRFm/
							5EBdp38Grw+LI4tgBE090KWPTIw+dAKrboftOetej+DWARiCTAM0L0wq46WG1r4U+OFDPx7O5dveo1UTR2UeTPzyRbUs/gDbVMIWb0NZLEt/+k0FVX1bGxezE2VLpQ
							yiCVixDwVXFymA5CIjzIU3stNf9nJ/ogC3drYGkcEXa9Xv+gMTxiyZ1p/8FLbIlAgGhfVLaDBnSA8FmM4HuXYaJRIavybN9J8HRvlzYOfMXh6DDy2RADMIJm8xWzIn
							uyG3GFjzI5DwAWf/OtlrnxrJLP8emdSVltH63W381xlDeHDH3DVC9sYnDULPOdhnwuAVuCliULOqqXmO/FMWnFeeRO/uvYCZqaFGeXV3NzYyCU6wFc8vfefDM6YBW4
							XDkWAUreai9lClCywT6AgpTjfdyVrr6432dN8emSA3/79AzYeCoOvLLPfFISBnZxIbotGyx7OQMBlMBzfTf/wRIJkhP6dW7nu5a30HTxKXPcVIaLGFnuOEFVuy8sEX
							C5S0QN07niVTZEUUMFPrmji1uqqzPMp720G8G1b1LlCwvmrFQsBj5fY0D4e2LaFzSNJZlZdzPO330XH3GoYiYI2mRoBThRLlpVOyhGinbQSdsFgyssZ+3IfS7Zu4fe
							nk1BeR+9td9ExZzZEoqAVmgMuYE+xPFkJjhL3yIQboLKSxPAAP3t1K787lYSyGnpbWlk+5xtweiTn1ZsZ3mJJ3jaXsoWIPGc96gIwgIpKkif+w/2vv8KLw2Pgnc26O
							++lY94FMBpz5l/k46xi1hFl49oqEolDQKUzFjMUJJK4K6uo1TV8Hp34aITB6JjVI7wZu/GvvKbwnf2XD4cR9YL9oPNBQPeQip5iMDzMgaFjDMYS4HaQPxdZl2s625u
							hr4FSp3wE3B7w6ODxZOaH/Y19+/h7mSycLaR9xWGUVqqXnaXGCIon8z3I37/tXetR6h6ESRNk5xxpdRvtK9/P96jwQG0P/AGVbgYp2QtLB9iPx1VPR2BXoQrFZRpDq
							5tAfgpcT+anG+cKB4HtRF0BHn00mvvQWRK7v3s2Ke9ViFaHohaNWgxVh1CLIvNpD6eA48AQig9BvU17YMdkDcyx/w8HL3OqkQG2xwAAAABJRU5ErkJggg==" 
							alt="">
							<span data-v-4a43e45d="">
								Red Envelope
							</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<div data-v-4a43e45d="" class="van-collapse van-hairline--top-bottom">
							<div data-v-4a43e45d="" class="van-collapse-item">
								<div role="button" tabindex="0" aria-expanded="false" class="van-cell van-cell--clickable van-collapse-item__title" id="wallet">
									<div class="van-cell__title">
										<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACfElEQVRoQ+2av4vUQB
										THv29hS8EflYjddTbC2Vh5lorbCAqizaF/gEomgs3dtftmtUgpiJUIFhZ6tVtcYSGChVrZXCHaWAjCLgvzJOLCbnayySSTmLtN2sx77/t572UyMwnhkFx
										0SDjQgjStkqtREaXUWRE5+j+zPx6PP0RR9CtLg7UiYRhuGmMeEtFaloOa7r8GcI+Zv6bFWwBRSr0FsFGTQKcwxpgzg8Hgs81oDiQIgi0i2nbyXu/gT6PR
										aD2KonEy7ByIUuoJgDv1anOOtmZrsSRIY9tqiisiF7XWw6yKtCALGSL6ISL7AH47N88SAxHZqbMiPWZ+4xMgy5f3Z2TZFJklpsx9ryAisq213ikjqKitb
										5AbWusXRcWUsfMNMjc1BkGwQURbZQSm2YrIcLb6dYDEU7r3K9nGLYgtxcm37r/WaiuyrB/b1srztBZord5kMtnrdrsnROSWyxaiMRWxrQCUUlcAxLvBzK
										spIM+YedOmNgiCfSI6nUXSFJA+Mz+wiVVKvQewflBAXjHz1RSQnwCOHRSQWOd1Zn45K9jlzKAprfVXfyym0+l8BHBERHoArmVVYnq/USB5RaesIua2DO1
										aq11rlemnGdv2GcmTSNtaC8CFPLZFxlS2QwRwm5mfFhFV1sbrrAXgOTPfLCuqiL1vEOsbu4gwV5sqQKZv7F1jzBettdcj0zTASkBcs+kyfuVO43cBXHbJ
										UN1jieh8v99/l4ybbK1H8UfHusU5xjvJzN+zQHLvmR2D+xr+mJnv25wtfNV12dz4UpfTzzdmPpVr1poOCsPwnIjcBXAJwPGcgaoaNkweWOeqSFVqqva7G
										v+iVJ1Fn/7/AEvxCVHd7ZIcAAAAAElFTkSuQmCC" alt="">
										<div data-v-4a43e45d="" class="nav_name">
											Wallet
										</div>
									</div>
									<i class="van-icon van-icon-arrow van-cell__right-icon" id="walletarrow"><!----></i>
								</div>
								<div class="van-collapse-item__wrapper" style="height: 0px; display: none;" id="walletcontent">
									<div class="van-collapse-item__content">
										<div data-v-4a43e45d="" class="nav_content" onclick="window.location.href='recharge.php';">Recharge</div>
										<div data-v-4a43e45d="" class="nav_content" onclick="window.location.href='withdrawal.php';">Withdrawal</div>
										<div data-v-4a43e45d="" class="nav_content" onclick="window.location.href='transactions.php';">Transactions</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" onclick="window.location.href='bankcard.php';">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABaElEQVRoQ+1ZO07DQBCdOQhSLkEfLkCfj
							gopBZ1HchnqWblIBRWpcgFaJLhIquQYlidyFEfGARPLO/aymW29fm/fvNnfLEIkDSPRASYkNCfNEXNEKQI/plaappM8zydKnL1gi6LYZFm2bYKcCSGiJQA89WLT//mdme/rN
							N+EENEjALzqj6M/g4gsnHPPFVJTyBsAPBw/fvWnU0GYHlF3zHzzm5BPADh0FJE751xQYpIkmSJiOcZDY+aTEU1HTIhKEjVAr96RxRBR7sqBiKdxXTRHuhKM0d+EjBH1Nk5z5
							L86EtSuXgtidUSxnX30zLr6nd1Ov1o5aKmlfbEiojUi3rY5KCIfzDwv+wTrSCkEAGZ/pOKLCRnqzm6OhFZ8iMmRqobWOt+ZeRX0qtV14wx2+TUhoU12TUfqReyuPEP3by1ix
							/GsUIY0ioeeKjeieHobOtF98dk7u69I+sIxR3xF0heOOeIrkr5w9v4wfUJPH/TeAAAAAElFTkSuQmCC" alt="">
							<span data-v-4a43e45d="">
								Bank Card
							</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" onclick="window.location.href='address.php';">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADGElEQVRoQ+2aPWgUQRTH/28TsDGFQiqbx
							I9CAxYqRGxMGiFga6WFwY9A1GpnwqUQY5WQma3UgF+YQhtrIWBjbMSACgpqoeI1VgGb2EiSeTLqhctm9tydu13ucKedNx+/+b95M/N2CS0qUsrbAE4A6EvZZRXAU6XUWEr7h
							mbUik6EENeIaMqnL2ae0lpf92lb36ZpkEql0re+vv61mYl0dXX1z8zMWIW8S9MgQoghInrmPQMAzDystV5spo8SpLZ6CYqMKaXuuFZYSnkRgA0MG6VdFfmilNrbyE2klJ8B7
							KnZtCuI9fmjWuslF4wQYpCIXnaCIrU5Jm3eoThg2yqSNfqUIHUrVobff4TfTN7Vzq4VMfMTFw0RnQQQdkLUWu7u7h6Ynp5edoFMTk72rq2tvQfQ29bnCDN/C4Jg/+zs7IoLZ
							GJioscY85GIduUOUqlUdqyuru4mop40zu64ND5k5vsJrnUOwJncXauZt0UaaJdNyze7lPIUgMe+E/JtlweIhbAwhZY8QOwDactdKG+qEiTpiiKldCnyHcACM3+KK0NE+wCMA
							NgZq1ti5oWEqGXtB3ONWi4QZp7TWl9Kci8hxC0iGq+r/wngmFLqjauNlPIQgBcAtuV2jiQoMqqUmk8CkVKeBfCgrr6qlOpvtK+klDbrspH/KmqPVJnZgjx3TO44EVmQeFLuE
							TPfS3Ct8wBOewaQFSJ6a4y5Gs+6bLrGJyjiOWa+zYwxA1EUfaiN0rEg9gqktbbq/i4dCwJgUSk1XILk6/mZev9/Fcn9ZAfgM0Y2RQo62bPeHqwPZgMBkPvJ7jGGF0gRJ7vPG
							JkVyRRKCjQuQQpc7FRDlYqkWqYCjQpTJPWHHk/4/EGMMUeiKHrtmmAYhoeDIHjlOfn6ZrmDbBog4d3eirRTCZLWG0pF0q7UX7tk1xJC3CCiyxk7jJsXoggz39RaX3E+dVvxg
							wyAeaXUaKPFkFLaPJhNI3mXeC5sy1fdMAwPENHdIAgOMvP2jCNVjTHjURQ506W1vsIwHAmCYC7DT2p/MiVEP4wx75j5Qn0qyNb9AvxLOVFLLAVxAAAAAElFTkSuQmCC" 
							alt="">
							<span data-v-4a43e45d="">
								Address
							</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<div data-v-4a43e45d="" class="van-collapse van-hairline--top-bottom">
							<div data-v-4a43e45d="" class="van-collapse-item">
								<div role="button" tabindex="0" aria-expanded="false" class="van-cell van-cell--clickable van-collapse-item__title" id="security">
									<div class="van-cell__title">
										<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEbUlEQVRoQ+2aTWgkVRDH/0
										UCzuYQvehF1IN68QuRXUFcP+NBXBe/RfADQQ0GjOsk7z0UD44g6HS9STJMZDWrB9GDqCuKJnhZ8WPFg4u4rnpZ9+B6cz1oDmGEJCUvdEtn7On3umeUEOYd86r
										qX79XXd013SFsk0XbhAMDkJBKKqXuI6J9zlZEmtbat0P8ytj0vSLj4+Mjo6Oj+4joKQBndST1m4jMLS8vNxcWFlbKJNzNp28g09PTF7nkieixkARF5ICDajQa
										P4XY+2x6BlFK7SGiKoAxn1iX/UMiMmutXSzpv+FWGkQp9QQRaQDnehJYAnBLQJInRYSttfMBtv8yKQQyNTV1ztDQ0DSAjQbOW0R0gIhertfrR7XW4rPv2G+ur
										a01ZmZmfg31CwLRWl8HwASc7O8iMr+6utqcm5v7I0miBEji6qoZMfPnPqBcEK31ozHAhXmBROQoEc0z82tZdj2AJOGOx0CZ8XN7JFB8SUQa1tpP80ADY/kOfW
										OfmTMPv2tFPOL719fX641G45cQ9a0GcoqI6lEUNUKST9tsKRARucFa+1lRCGc/AMk4tZ57ZFCRwaWV3Y2DSys5l0GPDHpk0CObT0Br7cbw07dYj/zJzGdk1Sp
										vaHQD4T+//kSkVmY86dWHiNK6J5n5vKIg3wO4tNdE8kZvX2xjzP0i8lbK7hgzX1YIRCn1JRHt9omF7Hd7iPl8lVLPpSsiIoettdcUBdkUxCeat18WRGv9PoA7
										Un1as9Y+XwjEGLNTRL7pBSDxLQOitT4fwDEAO5I4RLQriqIjhUDi3xE/ALi4V5gyIEqpZ4nohZT2j8x8SbdcfC8f5kJe/fhAy4BorV010ok3mdm9hs1cPpCrA
										Rz2JerbLwqitX4IwBsdcXcz81elQOLL6wMAt/mS7Weza60PAbgxFfNDZr49T8P7gk5rfQ+Ad/4vEGPMnSJysEPvXmZ+tyeQuCru7rWzLEzopaWUcg+7JSI6O6
										V1hJl3+bS9FYlBbgXwkS9Yt/0QkGq1umN4eNi9Ir2+I85eZv7Ypx0EEsO8COBpX8Cs/RAQrfWrAMY7/F9i5mdCNINBarXa8MrKivuWcW1I4LSND6RzFHG+RPT
										FyMjIWK1WWw3RCwZxwZRSVwH4hIhGQ4InNnkgxphZEdn0fBCRZQA3W2u/DtUpBBLDPEBEb4YKOLtuIFprdzd0d8VNS0QetNamp16vXGGQGMZ9K5z1Ro8NOkGU
										UjcBeJKI9mZAVK21bqIotEqBOAVjzOMisj9ELQExxlwpIhMAHs7yI6KJKIpeCYnZaVMaxAXSWl8O4D0AblLtukSkSkRuOui8tSY+JwDczczflYFwPj2BuACTk
										5NnVioVV5m7SiZxsN1uT7RarVMl/TfcegZJxJVS7ibgPlNfEZjQt/Fn6UJN3S1230Di6pxWqVSqIvIIEV2QJSoiPxPR6+12e7bVav0VCO016ytIWs0YMyYi7p
										8J9ri/i8giES1GUeQm276v/wyk75l6Am4bkL8BJdARUQFzPqAAAAAASUVORK5CYII=" alt="">
										<div data-v-4a43e45d="" class="nav_name">
											Account Security
										</div>
									</div>
									<i class="van-icon van-icon-arrow van-cell__right-icon" id="securityarrow"><!----></i>
								</div>
								<div class="van-collapse-item__wrapper" style="height: 0px; display: none;" id="securitycontent">
									<div class="van-collapse-item__content">
										<div data-v-4a43e45d="" class="nav_content" onclick="window.location.href='forgot-pass.php';">
											Reset Password
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li data-v-4a43e45d="">
						<div data-v-4a43e45d="" class="van-collapse van-hairline--top-bottom">
							<div data-v-4a43e45d="" class="van-collapse-item">
								<div role="button" tabindex="0" aria-expanded="false" class="van-cell van-cell--clickable van-collapse-item__title" id="download">
									<div class="van-cell__title">
										<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAA
										BYklEQVRoQ+3a3RGCMAwA4HQJh9AldAmf6SSek5Rnl9AldAiXqJcT7zi1JW0S4CC8eRd+voQWGnSwkM0txAEG6VfSe3/lVDaEcODsj/uKVKSD7Csv5maQXuasIn/GiN
										1aNkZsjCTmV5t+34mx50j/BrHniD1HficMGyOkMeK938YYN5Q3WufcCQCqX1FijGfieZ4hhMe/2OxgRwwAXABgRzmRYswdAI4pBGk9MgPMIIIEwaAJMSQEGTIRhowog
										oyMKUIUQ0bCFCOqIMqYKkQ1RAlTjWBBhDEsBBsihGEjRCBMjAhCDFKJEUOIQgoxoghxCBEjjlCBDGBUEGqQBEYNoQr5wuDP7HoCAzibSBcldwHdEgByiyIO4LOvOkTi
										IinHMAglS2PGrKMiTdNgm2c2W9u2ybbRUDsIPzvX9qukE5DtSBpEOt2E41lFsDHH+msGIctFIbmvv+uYfovSNXHwYiryAhi53DPcFIGeAAAAAElFTkSuQmCC" 
										alt="">
										<div data-v-4a43e45d="" class="nav_name">
											App Download
										</div>
									</div>
									<i class="van-icon van-icon-arrow van-cell__right-icon" id="downloadarrow"><!----></i>
								</div>
								<div class="van-collapse-item__wrapper" style="height: 0px; display: none;" id="downloadcontent">
									<div class="van-collapse-item__content">
										<div data-v-4a43e45d="" class="nav_content">
											<a data-v-4a43e45d="" target="_self" href="/testapp_1.0.0.apk" download="app.apk" style="color: rgb(78, 78, 78); font-size: 16px;">
												Android Download
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li data-v-4a43e45d="">
						<ol data-v-4a43e45d="" onclick="window.location.href='complaints.php';">
							<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACOUlEQVRoQ+2aMWzTQBSG3ztLWVmpGJEYysgEU
							9lZGGAqEy4LEgO+mzK0LEl0d6aDJQZEp26txEA3pkx0YiwbEkOlVurUsiRD7qFUDG1yjRv71bGry5z3v/97/50vtoNwSz54SzgggNQtyZBI4xJRSt0djUZLQog7izDvnDuNoujIG
							HM8q/+VSytJkkdCCAsAK4sA8PTsO+dkmqY/fX68IFLKx4j4oyYAl2wQ0RNr7f6kNy+IUmoHAF7UEQQAdo0xL3NBkiRZFkIc1BTi3JZz7mGapr8uepxKREr5GhG/1BmEiGJr7VYey
							DoibtQcZMNa+yGA1CUlIgqJ1CWMcx+siYzFWq3W506nc8RFqZR6Q0QJIj6YpckG4hNihHkGAHtVgTy11va5zE/qKKWoKpCpqwYXlJTyOSJ+rQRk3AQRV6Mo+t7tdk84INrt9r3hc
							Bgj4isAuF8ZCIf5ohpsm72oAa66AMI1SS4d1kTCgZgTi1IqHIiXZiSlzL2xusmfKIs4ED8KIbJer/eHYxOHA/H/FH0PH3KXFkcCZTRYL79ljJStDSBlJ8hdHxLhnmhZPSKaukNt4
							lXrEBGXtdZ/Lw6kiSDvjTGbk6k2DSQzxrzzLc0mgBwCwD4i7mmtt6/aX/OCnCBirLX+VnbDctfPA3JARGu+117cporoXRdk/DAuNsb8LtKkiprrgOwOBoM4y7KzKgwV7TEThIg+W
							WvfFhWvss4HsoKI60TUn3y9VaWxeXuF/6LMO7Gb/v4/Av6hQgwN1SIAAAAASUVORK5CYII=" alt="">
							<span data-v-4a43e45d="">Complaints &amp; Suggestions</span>
						</ol>
						<ol data-v-4a43e45d="">
							<i data-v-4a43e45d="" class="van-icon van-icon-arrow-down"><!----></i>
						</ol>
					</li>
					<li data-v-4a43e45d="">
						<div data-v-4a43e45d="" class="van-collapse van-hairline--top-bottom">
							<div data-v-4a43e45d="" class="van-collapse-item">
								<div role="button" tabindex="0" aria-expanded="false" class="van-cell van-cell--clickable van-collapse-item__title" id="about">
									<div class="van-cell__title">
										<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACNUlEQVRoQ+2aMYgaQRSG33PLtUq
										ZwkauCimEFOelyRXCtaYISJokpUUOwdXS2OnOgFwK26RJhFjYBixyzcVrDuGOdCeIhDSBVG4T0HfswnGnt+uuG28yIzP17Lz/+9//BhlE2JKFW8IBGkS2TuqOKNeRU
										qn0wDCMA0R8DAC7ggFOiehiNpt9bbVaf1bVXhmtSqXykohsAHgoGGC53C9ErNi2/SlIRyBItVrdm8/nJ/8ZYKF8IpF42mw2v/tp8gUpFotJ0zRPAeCRTCAA8MNxnN1
										2uz1d1uULYlnWKwD4IBnEtZzXjLGPkUDK5fIRIr6VEYSI3nPODyOBWJb1DQCeyQgCAMeMsX3hIOl02qs5Go025Yt4kHw+D9ls1gMYDAbQ6/U2ASMepFargWmannjHc
										aBer6sJUigUIJPJeOKHwyF0Oh01QVzVuVzOE9/v9zcB4Z4hPlqbUr50jgaJZaw75MlkcuHb6XTqDf0/LrEdcUHcW+v2cm8tDXLjiO5IrEjraIXbpqMV7pHPDh2tcNt
										0tMI90tGK5ZH4aKVSqQWlk8lEvZ8osbyO9pHYjkTTFGuXBoll2319RETvOOd3XjGCnkylfaAjouec8zvvSqqBnDHGnvh1WykQwzB2Go3GpcogfUR8Y9v2z6DZW7cjx
										/c1xH7nEtE5Ig7H4/Hnbrf7d1XtdUC6jLEXIkHWqRUVRGoIFzgKiPQQUUCUgAgD+S3zTCzPT1C0vqgEEdiRdW4LWfZuzZ9qrgC4511CCe5B/QAAAABJRU5ErkJggg=
										=" alt="">
										<div data-v-4a43e45d="" class="nav_name">
											About
										</div>
									</div>
									<i class="van-icon van-icon-arrow van-cell__right-icon" id="aboutarrow"><!----></i>
								</div>
								<div class="van-collapse-item__wrapper" style="height: 0px; display: none;" id="aboutcontent">
									<div class="van-collapse-item__content">
										<div data-v-4a43e45d="" class="nav_content" onclick="window.location.href='privacypolicy.php';">
											Privacy Policy
										</div>
										<div data-v-4a43e45d="" class="nav_content" onclick="window.location.href='riskagreement.php';">
											Risk Disclosure Agreement
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div data-v-4a43e45d="" class="goout_box">
				<button data-v-4a43e45d="" class="ripplegrey" id="logoutbutton">Logout</button>
			</div>
			<?php include("include/footer.php");?>
			<a data-v-4a43e45d="" href="https://<?php echo $telev; ?>" target="_blank" class="fixed_kefu">
				<img data-v-4a43e45d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAABJJJREFUaEPtmFtoHGUUx39nkrSuqA9aH2pEUKnWC0p
				p+1CtkOKDoKZQhfiQVhDMZWfbSkubnRUfWpTubFJqabOzSSo+aPtQwQuNIEiKgSp9sMYLxFtRX0zyIIqoGNtk98hMLm6a3Z2ZZDdNMN/j7rn8f+ecme+bT1jiS5a4fpYBrnYHK9eBI0ciXDO6xgP8J3KRvXtHK
				wFbPoBMch056hDZCroGpHamYB0CuYjqGQz6iSY+LwfQ/AC6X11N7nIzqs8A94QU9A0ipzFW9NCyZySk77T53ACOHVtJzaiFajNwy1yTT/oNI9LDWMRm9+5LYWOFBzjRcTuXs28hbCiQzBUwhDKMeCMzNGGjtaj
				UIh6sO1orZ/kqF1hR1UDT/p/CQIQDSNubEc4VSPAnSCcylib60qToIjIyr9SiNTHQncD1BUAeIWZ9HBQiOEDX4XvJjQ8WCJymKtdJy4vfBk3q2XUfWkvWcCFis/yM6vto3fd1kHjBADzxY+dBbvgvqP6F8CzRx
				LtBEhW1ySS3obwBcl1e7D8wajYFgQgG4NgXgPV5IkYwZAet8bPzEj/l3JV6lJy+CazOi/cZplXoOZuR0h/ASTaDdOd5fY8hjbTGXajyra7UBnJ6CrgrrxMtmImeUkkCAFxRfTHqiba9Xz7leZEy7U+iud4wXSg
				NkEk1onoyL2AvprW1IuKngjr2GaB+OofIdqJxtzMFV2mAdPIkIo3TnoZsLPvoXClrYpQ+nf5Z9RSxxPa5ATj2r8CNE85ymmyuC9FRqnI/+77vw7bJ3R+yxq2oRKgyWsE7nrjrN0zrpvAAx5N1VMlHxXXIJ6haY
				TadgrG8zVFs0IeL5srqFnYl+gv9X3yEnOTzICdKFlL5hWpjEy1tP4QtuGff3X4n47nzCDeX9tcmzMRr4QDSdgqhzVeYqkMsMXs39XUE0sk0IqavqdJOzIqHA3Dst4GnfIPDd5jW2gB2s00c2z1+3B3A9x1M6+m
				wAO781wUIDqblv58UCuTYGig+9GNaW5YBilZruQO+g/T/HKGgb6FRTOta3xoWfoj/BiIBfN/DtLaFe4gzqZ2oHvcPLl9hxh/0tytg4aS+BH3A11fZT8w6HA7ASa4HCXDmlx7MeIuviIIdSHWDd7PhsxHrY8QSH
				4YDcK3T9j6EjpLR5/oGmgrqtxeI7CIa7yymwX8Dmj5suTumrgLcK8IfUXqJWQm/4gX6P20nEe8b4I4Zz0SAY4o/QCAFZTRy7AFgHQEPiosLwLFfB57zyiEkiFq2X2kWD0DafgHh6IR4GWAs8lCQq8bFAeCkEqC
				HJqs9iFHdEOROaKJRC7kyHfczPr6K8UtfsOfA73TZ9Sgvo0ztI6HELwxAxm5A2Qw8MfmWcfMOg5zL++51SzmAVO8IWvmpule2Axm7B6XJp8kjKEeJWe1zGYbKATjJVpBMSVEiB4jGD85FeOU74NjuXWfR+xzgA
				0zr8fmIr+wzMPtWL19rP1k9WOyqJAxU5UbIO0t5N3sbEW5DGQTpg1wfZqIvjMhStpUFKJfKEnGWARagyKVfZFdbwHzzL/kR+hcVZX1ArdQS3AAAAABJRU5ErkJggg==" alt="" srcset="">
					Online
			</a>
			<div data-v-4a43e45d="" class="notice_zz" style="display: none;" id="noticecontent">
				<div data-v-4a43e45d="" class="wrapper" style="max-height: 70vh;">
					<p data-v-4a43e45d="" class="tz_title">Notice</p>
					<p data-v-4a43e45d="" class="tz_info">no notice</p>
					<div data-v-4a43e45d="" class="tz_close">
						<button data-v-4a43e45d="" id="noticeclose">CLOSE</button>
					</div>
				</div>
			</div>
			<div data-v-4a43e45d="" class="notice_zz" style="display: none;">
				<div data-v-4a43e45d="" class="wrapper special_wrapper">
					<p data-v-4a43e45d="" class="tz_title special">Change Nick Name</p>
					<div data-v-4a43e45d="" class="input_box">
						<span data-v-4a43e45d="">Nick Name</span>
						<input data-v-4a43e45d="" type="text">
					</div>
					<div data-v-4a43e45d="" class="tz_close">
						<button data-v-4a43e45d="" style="color: rgb(97, 97, 97);">CANCEL</button>
						<button data-v-4a43e45d="">CONFIRM</button>
					</div>
				</div>
			</div>
			<div data-v-4a43e45d="" class="notice_zz" style="display: none;" id="logoutmenu">
				<div data-v-4a43e45d="" class="wrapper">
					<p data-v-4a43e45d="" class="tz_title">
						Confirm
					</p>
					<p data-v-4a43e45d="" class="tz_info">
						Do you want to logout?
					</p>
					<div data-v-4a43e45d="" class="tz_close">
						<button data-v-4a43e45d="" style="color: rgb(136, 136, 136);" id="logoutcancel">CANCEL</button>
						<button data-v-4a43e45d="" id="logoutyes">YES</button>
					</div>
				</div>
			</div>
			<div data-v-4a43e45d="" class="notice_zz" style="display: none;" id="signinmenu">
				<div data-v-4a43e45d="" class="wrapper">
					<p data-v-4a43e45d="" class="tz_title">Sign In</p>
					<div data-v-4a43e45d="" class="signinInfo">
						<p data-v-4a43e45d="" class="signinfo">Total： <?php echo $totaldays; ?> Days</p>
						<p data-v-4a43e45d="" class="signinfo">Today Rebates：₹ <?php echo $todayrebates; ?></p>
						<p data-v-4a43e45d="" class="signinfo">Total Rebates：₹ <?php echo $totalrebates; ?></p>
						<p data-v-4a43e45d="" class="signinfo">Status： <?php if($status == 1){echo "Had signed in";}else{echo "No sign in";} ?></p><!--Had signed in--><!---->
					</div>
					<div data-v-4a43e45d="" class="tz_close">
						<button data-v-4a43e45d="" style="color: rgb(136, 136, 136);" id="signincancel">CANCEL</button>
						<button data-v-4a43e45d="" onclick="signinfn();">SIGN IN</button>
					</div>
				</div>
			</div>
			<div data-v-74fec56a="" data-v-4a43e45d="" class="loading" style="display: none;">
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
			<div class="popup">
				<span class="popuptext" id="myPopup"></span>
			</div>
		</div>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script>
			var notice = document.getElementById("notice");
			var noticecontent = document.getElementById("noticecontent");
			var noticeclose = document.getElementById("noticeclose");
			notice.addEventListener("click", function(event){
				event.stopPropagation();
				if (noticecontent.style.display === "none") {
				  noticecontent.style.display = "";
				} else {
				  noticecontent.style.display = "none";
				}
			});
			noticeclose.addEventListener("click", function(event){
				event.stopPropagation();
				noticecontent.style.display = "none";
			});
		
			var wallet = document.getElementById("wallet");
			var walletcontent = document.getElementById("walletcontent");
			var walletarrow = document.getElementById("walletarrow");
			wallet.addEventListener("click", function(event){
				event.stopPropagation();
				if (walletcontent.style.display === "none") {
				  walletcontent.style.display = "block";
				  walletcontent.style.height = "auto";
				  walletcontent.style.animationName = "incre";
				  walletcontent.style.animationDuration = ".3s";
				  walletarrow.style.transform = "rotateX(180deg)";
				} else {
				  setTimeout(walletcontentdisp, 300);
				  walletcontent.style.height = "0px";
				  walletcontent.style.animationName = "decre";
				  walletcontent.style.animationDuration = ".3s";
				  walletarrow.style.transform = "rotateY(180deg)";
				}
			});
			
			function walletcontentdisp(){
				walletcontent.style.display = "none";
			}
			
			var security = document.getElementById("security");
			var securitycontent = document.getElementById("securitycontent");
			var securityarrow = document.getElementById("securityarrow");
			security.addEventListener("click", function(event){
				event.stopPropagation();
				if (securitycontent.style.display === "none") {
				  securitycontent.style.display = "block";
				  securitycontent.style.height = "auto";
				  securitycontent.style.animationName = "incresec";
				  securitycontent.style.animationDuration = ".3s";
				  securityarrow.style.transform = "rotateX(180deg)";
				} else {
				  setTimeout(securitycontentdisp, 300);
				  securitycontent.style.height = "0px";
				  securitycontent.style.animationName = "decresec";
				  securitycontent.style.animationDuration = ".3s";
				  securityarrow.style.transform = "rotateY(180deg)";
				}
			});
			
			function securitycontentdisp(){
				securitycontent.style.display = "none";
			}
			
			var download = document.getElementById("download");
			var downloadcontent = document.getElementById("downloadcontent");
			var downloadarrow = document.getElementById("downloadarrow");
			download.addEventListener("click", function(event){
				event.stopPropagation();
				if (downloadcontent.style.display === "none") {
				  downloadcontent.style.display = "block";
				  downloadcontent.style.height = "auto";
				  downloadcontent.style.animationName = "incresec";
				  downloadcontent.style.animationDuration = ".3s";
				  downloadarrow.style.transform = "rotateX(180deg)";
				} else {
				  setTimeout(downloadcontentdisp, 300);
				  downloadcontent.style.height = "0px";
				  downloadcontent.style.animationName = "decresec";
				  downloadcontent.style.animationDuration = ".3s";
				  downloadarrow.style.transform = "rotateY(180deg)";
				}
			});
			
			function downloadcontentdisp(){
				downloadcontent.style.display = "none";
			}
			
			var about = document.getElementById("about");
			var aboutcontent = document.getElementById("aboutcontent");
			var aboutarrow = document.getElementById("aboutarrow");
			about.addEventListener("click", function(event){
				event.stopPropagation();
				if (aboutcontent.style.display === "none") {
				  aboutcontent.style.display = "block";
				  aboutcontent.style.height = "auto";
				  aboutcontent.style.animationName = "increabt";
				  aboutcontent.style.animationDuration = ".3s";
				  aboutarrow.style.transform = "rotateX(180deg)";
				} else {
				  setTimeout(aboutcontentdisp, 300);
				  aboutcontent.style.height = "0px";
				  aboutcontent.style.animationName = "decreabt";
				  aboutcontent.style.animationDuration = ".3s";
				  aboutarrow.style.transform = "rotateY(180deg)";
				}
			});
			
			function aboutcontentdisp(){
				aboutcontent.style.display = "none";
			}
			
			document.getElementById("signin").addEventListener("click", function() {
				document.getElementById("signinmenu").style.display = "";
			});			
			document.getElementById("signincancel").addEventListener("click", function() {
				document.getElementById("signinmenu").style.display = "none";
			});
			
			function signinfn(){
				$.ajax({
					type: "Post",
					data:"snf=" + "inc",
					url: "signin.php",
					
					success: function (html) { 
					 var arr = html.split('~');
					if (arr[0]== 1) {
						document.getElementById("signinmenu").style.display = "none";
						var popup = document.getElementById("myPopup");
						popup.innerHTML = ('Success');
						popup.style.width = "100px";
						popup.classList.add("show");
						setTimeout(function(){
							popup.classList.remove("show");
						}, 2000);
					}
							else if (arr[0]== 2) {
								document.getElementById("signinmenu").style.display = "none";
								var popup = document.getElementById("myPopup");
								popup.innerHTML = ('Failed');
								popup.style.width = "100px";
								popup.classList.add("show");
								setTimeout(function(){
									popup.classList.remove("show");
								}, 2000);
							}
							else if (arr[0]== 3) {
								document.getElementById("signinmenu").style.display = "none";
								var popup = document.getElementById("myPopup");
								popup.innerHTML = ('Had signed in');
								popup.style.width = "120px";
								popup.classList.add("show");
								setTimeout(function(){
									popup.classList.remove("show");
								}, 2000);
							}
					  return false;
					  },
					  error: function (e) {}
					  });
					
					}
					
			var logoutbutton = document.getElementById("logoutbutton");
			var logoutmenu = document.getElementById("logoutmenu");
			var logoutcancel = document.getElementById("logoutcancel");
			var logoutyes = document.getElementById("logoutyes");
			logoutbutton.addEventListener("click", function() {
				document.getElementById("logoutmenu").style.display = "";
			});	
			logoutcancel.addEventListener("click", function() {
				document.getElementById("logoutmenu").style.display = "none";
			});	
			logoutyes.addEventListener("click", function() {
				window.location.href='logout.php';
			});	
		</script>
	</body>
</html>