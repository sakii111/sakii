<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}?>
<!doctype html>
<html lang="en" style="">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include 'head.php';?>
		<link rel="stylesheet" href="assets/css/style.css">
		<!--<link rel="stylesheet" href="assets/css/inc/bootstrap/bootstrap.min.css">-->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<!--<link href="Test/js/app.1b48dbbc.js" rel="preload" as="script">
		<link href="Test/js/chunk-vendors.45119046.js" rel="preload" as="script"> To be removed-->
		<!--<style>
			.modal-title{ font-weight:normal; color:#fff;}
			.modal::before {
				content: '';
				display: inline-block;
				vertical-align: middle;
				margin-right: -4px;
			}
			.mt-1 {
				margin-top:10px !important
			}
			.row {
				margin-left:-10px;
				margin-right:-10px
			}
			.col-12 {
				padding-left:10px;
				padding-right:10px
			}
			.mb-1 {
				margin-bottom:10px !important
			}
			.mb-2 {
				margin-bottom:20px !important
			}
			.btn-group .btn:active {
				-webkit-transform:none;
				transform:none
			}
			.btn-group {
				border-radius:4px;
				-webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
				box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
			}
			.btn-group .btn {
				height: 36px;
				padding: 0px 8px;
				margin: 0px 0px;
				font-size: 13px;
				box-shadow:none;	
			}
		</style>-->
		<style>
			/* App */
			.mine_info_btn .btn-app button[data-v-5f666fee] {
				padding: 0 15px;
				box-shadow: 0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);
				color: rgba(0,0,0,.87);
				height: 36px;
				line-height: 36px;
				font-size: 14px;
				border: 0;
				border-radius: 2px;
				background: #f5f5f5;
				margin-right: 10px
			}
			
			.close_btn[data-v-7c145c82]{
				margin-top:8px; /*Added*/
			}
		</style>
		<style>
			/* Style V */
			.btn-v {
				height:44px;
				padding:0 20px;
				margin:6px 8px;
				font-size:14px;
				line-height:1.2em;
				font-weight:500;
				display:-webkit-inline-box;
				display:inline-flex;
				-webkit-box-align:center;
				align-items:center;
				-webkit-box-pack:center;
				justify-content:center;
				-webkit-transition:0.2s all;
				transition:0.2s all;
				text-decoration:none !important;
				border-radius: 2px;
				-webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
				box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
			}
			
			#payment .modal-dialog {
				padding:15px 17px;
				margin-top:200px; /*Before 145 - 165*/
			}
			/* Bootstrap has a properties */
			.modal-dialog {
				max-width: none;
				margin: 2.75rem auto;
			}
			.btn-v {
				border-radius: 3px 3px 3px 3px; 
				border: 0px solid white;
				transition: 0.5s;
				color:#d9d5db;
			}
			/* The container */
			.container {
			  /*display: block;*/
			  position: relative;
			  padding-left: 30px;
			  margin-bottom: 0px;
			  cursor: pointer;
			  font-size: 14px;
			  -webkit-user-select: none;
			  -moz-user-select: none;
			  -ms-user-select: none;
			  user-select: none;
			}

			/* Hide the browser's default checkbox */
			.container input {
			  position: absolute;
			  opacity: 0;
			  cursor: pointer;
			  height: 0;
			  width: 0;
			}

			/* Create a custom checkbox */
			.checkmark {
			  position: absolute;
			  top: 0;
			  left: 0;
			  height: 1.50em;
			  width: 1.50em;
			  background-color: #eee;
			}

			/* On mouse-over, add a grey background color */
			.container:hover input ~ .checkmark {
			  background-color: #ccc;
			}

			/* When the checkbox is checked, add a blue background */
			.container input:checked ~ .checkmark {
			  background-color: black;
			}

			/* Create the checkmark/indicator (hidden when not checked) */
			.checkmark:after {
			  content: "";
			  position: absolute;
			  display: none;
			}

			/* Show the checkmark when checked */
			.container input:checked ~ .checkmark:after {
			  display: block;
			}

			/* Style the checkmark/indicator */
			.container .checkmark:after {
			  left: 7px;
			  top: 2px;
			  width: 7px;
			  height: 13px;
			  border: solid white;
			  border-width: 0 2px 2px 0;
			  -webkit-transform: rotate(42deg);
			  -ms-transform: rotate(42deg);
			  transform: rotate(42deg);
			}
			
			.number-input.number-input button:before, .number-input.number-input button:after {
				width: 1.3rem;
				background-color: grey;
			}
			
			.center_notes li button[data-v-5f666fee] {
				display: inline-block;
				padding: 10px 0;
				width: 80%;
				text-align: center;
				font-size: 14px;
				color: #fff;
				border-radius: 2px;
				border: 0px;
				background: #2196f3;
				margin-bottom: 15px;
				box-shadow: 0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);
				transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
			}
			
			.table-container {
				box-shadow: none;
				webkit-box-shadow: none;
			}
			/* .ol_btn takes over */
			.yellowback {
				background: #yellow!important;
				color: #333!important;
			}
			/*For adjusting footer*/
			.appBottomMenu .item span{
				bottom: 4px;
			}
			
			/*Update*/
			.modal-content{
				height:405px; /*Added*/
			}
			#camt{
				margin-top: 35px !important;
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<?php
			include("include/connection.php");
			$userid=$_SESSION['frontuserid'];
			$selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
			$userresult=mysqli_fetch_array($selectruser);
			$selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
			$walletResult=mysqli_fetch_array($selectwallet);
		?>
		<div data-v-5f666fee="" class="win" style="margin-bottom: 6px;">
			<div data-v-5f666fee="" class="mine_top">
				<div data-v-5f666fee="" class="mine_info">
					<p data-v-5f666fee="" class="balance">Available balance: ₹ <span id="balance" style="font-size: 18px;"><?php echo number_format(wallet($con,'amount',$userid), 2); ?></span></p>
					<div data-v-5f666fee="" class="mine_info_btn">
						<div data-v-5f666fee="" class="btn-app">
							<a href="recharge.php"><button data-v-5f666fee="" class="one_btn">Recharge</button></a>
							<a href="trend.php"><button data-v-5f666fee="">Trend</button></a>
						</div>
						<div data-v-5f666fee="" class="refresh">
							<a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);" class="reaload text-white pull-right mt-1" onclick="getResultbyCategory(parity,parity)">
								<img data-v-5f666fee="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpw
								YAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wb
								WV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM
								5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0a
								W9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWV
								udHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlL
								mNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3J
								Ub29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wNlQxNjozNzowOCswODowMCIgeG1wOk1vZGlmeURhd
								GU9IjIwMjAtMDctMDZUMTY6Mzg6MTkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDZUMTY6Mzg6MTkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2U
								vcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9Inhtc
								C5paWQ6M2IwNzljZTEtNGFmNi1kYTRhLWJjMDEtNDJjNzExODllNmYwIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjNiMDc5Y2UxLTRhZjYtZGE0YS1iYzA
								xLTQyYzcxMTg5ZTZmMCIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjNiMDc5Y2UxLTRhZjYtZGE0YS1iYzAxLTQyYzcxMTg5ZTZmMCI+IDx4b
								XBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6M2IwNzljZTEtNGF
								mNi1kYTRhLWJjMDEtNDJjNzExODllNmYwIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTA2VDE2OjM3OjA4KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZ
								SBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1
								wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuGtKhwAAAVjSURBVGiBzZpJjBRVGMd/PdMNzAgzMDOOMFFQljDGFUTc0KDowaiMGzEhJCZGD6DGA14wwYOJxoMxJ
								sRgVHRikAt4wAWEBDzglrAoEsGAsoyigsYFmYVZ+Hv4XlHV1d0zXdXV3fyTl1q63qvvX+993/uWTkmiChjj2j9JDZhOaqAiUQ/cDXQAXcBq4HgSA1eayFRgKbA
								AENAELEti4JokBomA00C7O09hpBYnMXCliXQBr4buvQLMKXXgVJmUPQWMBYaA8UADcAb4HWgGOrHl5eFj4FHgr7gvTFJHajHBZwBzsSV0ETABGIcpeh2wF1tiQ
								dwLPAm8CJyN8/KkZuRyYAqwEJgJXAm0An2YmfVw1rUhYHRojH+Bh4BtcQQodUYagEXAEuA2bPnUBX73SAziC1+DLb0wGoHHgH3AyaiCxCUyGls+y4D5wER33yN
								xBls+vwJHnWADQC9G7h5gcmhMARe7vpERh0gD8DCwArgM0w0PQ8BOTA8+A34E/gN+c8c09tXvC4055Pq8BZyKIRNIitImSnpehrPy8bekTyUtkXSdezYV6tss6
								SVJe5SNQUnvSZotaVREec61KA+3OkHOhAT5StIzjmRYeK9lJD0n6VSg35CkbknLJU2KSyAqkVpH4s8QiQ8k3VJE/2ZJ6wP9uiXtkLRAUrpUEsUSyUh6OkRiUNJ
								GSdcU+aKUpEWS9kn6WtIqSdOSIFAskVpJ8yUdDJDocyTaI76sTtI8STcEyFWMyHRJG5St2NslXZGkEEm0kZzG24F5+BvYT8AqYH8sE1lGFNpHUth+sRBz8sBci
								zXAVmzzOq8w3IzMAm7FJ3sIWAd0l1uoOChEpBZzsxvd9QDmzB2rhFBxUGhp1QM3Ba6PAB+WX5yCaMJk6sYSFjlLu9CMjMfccg97gV3JylYUarBw4GVMN18AWvI
								9WGhGLsFX8gHM4YsdvZUAATcCT7jzFmALFlFmodCMtOKb3Ixr1bBUAtrc0bOkV+d7sBCRAaA/cO254NVAA9DjzjMYoZzArBCRnzGl8uLnX9wg1cAF+ILXYCHxq
								PBDhb7yESzT0QHsBjaQPUOVQiMWSda76z7gcF5ZhvFfxki6UFJjFX2ouZK+Cfh530maku/Z4dZ9n2vVxBzMgnrYgeXGclDpTGNU3Ikpu4fPMUOUg2pZopFQBzy
								AZWg8038Y09e8OB9nJAVcDzyLZSnBXJONWBiRNxNZTiK15E/EjYRW4HHg2sC9PcB6LG2UF0kvrQxwKbYkUsBmbE8qFpMwf6oD/yP0Amsxf68wEjSVDZIelLRV0
								glZumd5hP5TJb3h+nk4LWm1pLEj9U+KxFRJKyV1yTIsHt6WNKGI/u2S3lQ2+iS9I6mpGBlKJZCWdIcsQSFlJykOSXpEw+etxklaLGlb6ANIUqciZGpKIdEiaam
								kXSEBjkta5wiGUz7e9UxJHZLeV27ST5LWSJoRRZ64yp7CKkxPYcrtoRuz958A32K+0njMqKScMt8FzAZudr+dU1fgBPA68C4Rq71xCz11wBeYiQya2AHgD+AAV
								noYwK9ONQHTMAcwuFuDuelbMEd1O7kVrRERd0bSGJFZofsZLBBqc9dDZJcdgujHPsIezLteSwE/qhiUUnqbDnyEX2720IMJnyabRD9+HLETOAhsAr7HqlSxaoc
								eSiGSwgo2nfiuBNgX3o1Vn/qxQmgvFhAdxfJjB7ANbtC10lGC1UKWqV8hqT9gcY5JmuV+nyzpKndERWxscVsSg9RL2hwyn685kmUROl9LwmnsAZZjhU8P9+MXS
								CuCpLzf/cBKzM0+CXxJhaPLJP/CMRqL6NqwSO4HKpgLK9d/USqO/wEXo9O25jGbsQAAAABJRU5ErkJggg==" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
			<div data-v-5f666fee="" class="main">
				<ul data-v-5f666fee="" class="main_nav">					
					<li data-v-5f666fee="" class="active">
						<a style="color: black;" id="home-tab3" data-toggle="tab" href="#parity" role="tab" onClick="tabname('parity');getResultbyCategory('parity','parity');">
							Parity
						</a>
					</li>					
				</ul>
				<div data-v-5f666fee="" class="center_text">
					<ul data-v-5f666fee="" class="center_top">
						<li data-v-5f666fee="" class="left_li">
							<ol data-v-5f666fee="" class="top_ol">
								<img data-v-5f666fee="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9N
								x8mYCfYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oW
								qiZlJKSBExk5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0v
								mm6P/utdQfAOU3IoOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8R
								Cn1qgxCLMs6SETPAWwI8mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3
								yGymWCJaMB13Q//CFmblb1EdAvA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB
								5mmuaO7u/vQmqjVwWrXw8z+AppbWVl56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R
								38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQjSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPM
								rM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSl
								kCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII=" alt="">
								<span data-v-5f666fee="">Period</span>
							</ol>
							<ol data-v-5f666fee="" class="bot_ol">
								<span id="gameid" style="font-size: 22px;"><?php echo sprintf("%03d",gameid($con));?></span>
								<input type="hidden" id="futureid" name="futureid" value="<?php echo sprintf("%03d",gameid($con));?>">
							</ol>
						</li>
						<li data-v-5f666fee="" class="right_li">
							<ol data-v-5f666fee="" class="top_ol">
								<span data-v-5f666fee="">Count Down</span>
							</ol>
							<ol data-v-5f666fee="" class="bot_ol">
								<div data-v-5f666fee="" class="countdown" id="countdown">
									<div data-v-5f666fee="" class="van-count-down">
										<p id="demo"></p>
									</div>
								</div>
								<div data-v-5f666fee="" class="ol_btn" style="display: none;" id="cont">
									<button data-v-5f666fee="" class="grayback" id="contbt">
										Continue
									</button>
								</div>
							</ol>
						</li>
					</ul>
					<div data-v-5f666fee="" class="btn_center">
						<button data-v-5f666fee="" class="back_one gbutton" onClick="betbutton('#4caf50','button','Green');">
							Join Green
						</button>
						<button data-v-5f666fee="" class="back_two gbutton" onClick="betbutton('#9c27b0','button','Violet');">
							Join Violet
						</button>
						<button data-v-5f666fee="" class="back_three gbutton" onClick="betbutton('#f44336','button','Red');">
							Join Red
						</button>
					</div>
					<ul data-v-5f666fee="" class="center_notes">
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: linear-gradient(to right bottom, rgb(156, 39, 176) 50%, rgb(244, 67, 54) 50%);" onClick="betbutton('#0D96F3','number','0');">
								0
							</button>
						</li>
						<li data-v-5f666fee="">
							<button  data-v-5f666fee="" class="gbutton" style="background: rgb(76, 175, 80);" onClick="betbutton('#0D96F3','number','1');">
								1
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(244, 67, 54);" onClick="betbutton('#0D96F3','number','2');">
								2
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(76, 175, 80);" onClick="betbutton('#0D96F3','number','3');">
								3
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(244, 67, 54);" onClick="betbutton('#0D96F3','number','4');">
								4
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: linear-gradient(to right bottom, rgb(156, 39, 176) 50%, rgb(76, 175, 80) 50%);" onClick="betbutton('#0D96F3','number','5');">
								5
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(244, 67, 54);" onClick="betbutton('#0D96F3','number','6');">
								6
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(76, 175, 80);" onClick="betbutton('#0D96F3','number','7');">
								7
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(244, 67, 54);" onClick="betbutton('#0D96F3','number','8');">
								8
							</button>
						</li>
						<li data-v-5f666fee="">
							<button data-v-5f666fee="" class="gbutton" style="background: rgb(76, 175, 80);" onClick="betbutton('#0D96F3','number','9');">
								9
							</button>
						</li>
					</ul>
				</div>
				<div id="parity" role="tabpanel"></div>
				<div data-v-5f666fee="" style="display: flex; align-items: center; justify-content: center; margin-top: 10px;">
					<button data-v-5f666fee="" class="order_btn one_btn" onclick="window.location.href='order.php';">
						My Orders
					</button>
				</div>
			</div>
			<div id="payment" class="modal fade" role="dialog">
				<div class="modal-dialog test-dialog" role="document">
					<div class="modal-content test-content">
						<div class="modal-header paymentheader test-header" id="paymenttitle"> 
							<h4 class="modal-title" id="chn"></h4>
						</div>
						<form action="#" method="post" id="bettingForm" autocomplete="off">
							<div class="modal-body mt-1" id="loadform">
								<div class="row">
									<div class="col-12">
										<p class="mb-1">Contract Money</p>
										<div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
											<label class="btn btn-secondary active" onClick="contract(10);">
											<input class="contract" type="radio" name="contract" id="hoursofoperation" value="10" checked >
											10 </label>
											<label class="btn btn-secondary" onClick="contract(100);">
											<input type="radio" class="contract" name="contract" id="hoursofoperation" value="100">
											100 </label>
											<label class="btn btn-secondary" onClick="contract(1000);">
											<input type="radio" class="contract" name="contract" id="hoursofoperation" value="1000">
											1000 </label>
											<label class="btn btn-secondary" onClick="contract(10000);">
											<input type="radio" class="contract" name="contract" id="hoursofoperation" value="10000" >
											10000 </label>
										</div>                     
										<input type="hidden" id="contractmoney" name="contractmoney" value="10">                         
										<p class="mb-1">Number</p>
										<div class="def-number-input number-input safari_only">
											<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); addvalue();" class="minus" style="position: absolute; left:10px; width: 60px;"></button>
											<input class="quantity" min="1" name="amount" id="amount" value="1" type="number" onKeyUp="addvalue();">
											<button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); addvalue();" class="plus" style="position: absolute; right:10px; width: 60px;"></button>
										</div>
										<input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
										<input type="hidden" name="type" id="type" class="form-control">
										<input type="hidden" name="value" id="value" class="form-control" >
										<input type="hidden" name="counter" id="counter" class="form-control" >
										<input type="hidden" name="inputgameid" id="inputgameid" class="form-control" value="<?php echo sprintf("%03d",gameid($con));?>"> 
										<div class="mt-2" id="camt">Total contract money is <span id="showamount">10</span>
										</div>
										<input type="hidden" name="finalamount" id="finalamount" value="10">
										<div style="padding-top:35px;"><!-- was 30 | Client Mon -->
											<label class="container" for="remember">I agree <a data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false" style="color: #009688;">PRESALE RULE</a>
												<input type="checkbox" checked="checked"  id="presalerule" name="presalerule">
												<span class="checkmark"></span>
											</label>
													
									   </div>
									</div>                   
								</div>
							</div>
							<input type="hidden" name="tab" id="tab" value="parity">
							<div data-v-7c145c82 class="close_btn" style="position: relative;"> 
								<button data-v-7c145c82 type="button" class="" data-dismiss="modal">CANCEL</button>
								<button data-v-7c145c82 type="submit" class="" style="color: #009688;">CONFIRM</button> 
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="alert" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
				  <div class="modal-body" id="alertmessage"> </div>
				  <div class="text-right pb-1 pr-2">
				<a type="button" class="text-info" data-dismiss="modal">OK</a>
				</div> 
				</div>
			  </div>
			</div>
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 10003; display: none;" id="popup">
				<div class="van-toast__text" id="popuptext"></div>
			</div>
			<div data-v-74fec56a="" data-v-5f666fee="" id="loading" class="loading" style="display: none;">
				<div data-v-74fec56a="" class="v-dialog v-dialog--persistent" style="width: 300px; display: block;">
					<div data-v-74fec56a="" data-v-5197ff2a="" class="v-card v-sheet theme--dark teal">
						<div data-v-74fec56a="" data-v-5197ff2a="" class="v-card__text">
							<span data-v-74fec56a="">Loading</span>
							<div data-v-74fec56a="" data-v-5197ff2a="" role="progressbar" aria-valuemin="0" aria-valuemax="100" class="v-progress-linear mb-0" style="height: 7px;">
								<div data-v-74fec56a="" class="v-progress-linear__background white" style="height: 7px; opacity: 0.3; width: 100%;">
								</div>
								<div data-v-74fec56a="" class="v-progress-linear__bar">
									<div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate v-progress-linear__bar__indeterminate--active">
										<div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate long white">
										</div>
										<div data-v-74fec56a="" class="v-progress-linear__bar__indeterminate short white">
										</div>
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
		<!-- Bootstrap--> 
		<script src="assets/js/lib/popper.min.js"></script> 
		<script src="assets/js/lib/bootstrap.min.js"></script> 
		<!-- Owl Carousel --> 
		<script src="assets/js/plugins/owl.carousel.min.js"></script> 
		<!-- Main Js File --> 
		<script src="assets/js/app.js"></script>
		<script src="assets/js/betting.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function () {  
			var x = setInterval(function() { 
			start_count_down(); 
			  //$('#closbtnloader').click(); 
			}, 1e3);
			getResultbyCategory('parity','parity');
			$('#example').DataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": false,
				  "ordering": false,
				  "info": true,
				  "autoWidth": false
				});
			});
		function start_count_down() {
			//debugger;
			$(".showload").hide();
			$(".none").show();
			var countDownDate = Date.parse(new Date) / 1e3;
			  var now = new Date().getTime();
			  var distance = 180 - countDownDate % 180;
			  //alert(distance);
			  var i = distance / 60,
			   n = distance % 60,
			   o = n / 10,
			   s = n % 10;
			  var minutes = Math.floor(i);
			  var seconds = ('0'+Math.floor(n)).slice(-2);
			  var firstDigit = seconds.charAt(0);
			  var secondDigit = seconds.charAt(1);
			  //document.getElementById("demo").innerHTML = "<span class='timer'>0"+Math.floor(minutes)+"</span>" + "<span>:</span>" +"<span class='timer'>"+seconds+"</span>";
			  document.getElementById("demo").innerHTML = "<span data-v-5f666fee='' class='span'>0</span>" + "<span data-v-5f666fee='' class='span'>" + Math.floor(minutes)+"</span>" + "<span data-v-5f666fee='' class='span'>:</span>" + "<span data-v-5f666fee='' class='span'>"+firstDigit+"</span>" + "<span data-v-5f666fee='' class='span'>"+secondDigit+"</span>";
			document.getElementById("counter").value = distance;
			if(distance==180 || distance==175 || distance==170 || distance==165 || distance==160){
			generateGameid();
			getResultbyCategory('parity','parity');
			//getResultbyCategory('sapre','sapre');
			//getResultbyCategory('bcone','bcone');
			//getResultbyCategory('emerd','emerd');
			}
			if(distance<=30)
			{
			$(".gbutton").prop('disabled', true);
			}else{ 
			$(".gbutton").prop('disabled', false);
				}
			
			if(distance==1){
				var cont = document.getElementById("cont");
				cont.style.display = "flex";
				var tmr = document.getElementById("countdown");
				tmr.style.display = "none";
			}
			if(distance==172){
				var cont = document.getElementById("cont");
				cont.style.display = "none";
				var tmr = document.getElementById("countdown");
				tmr.style.display = "flex";
				$("#contbt").removeClass("yellowback");
				$("#contbt").addClass("grayback");
				$("#contbt").off("click", continuebtn);
			}
			if (distance === 178) {
				$("#contbt").removeClass("grayback");
				$("#contbt").addClass("yellowback");
				$("#contbt").on("click", continuebtn);
			}
		}
		
		function generateGameid()
			{
				var futureid=$('#futureid').val();
				$.ajax({
				type: "Post",
				data:"futureid=" + futureid + "& type=" + "generate" ,
				url: "periodid-generation.php",
				success: function (html) {
				 //alert(html);
				 var arr = html.split('~');
				 //alert(arr[1]);
				 document.getElementById("gameid").innerHTML=arr[0];
				 document.getElementById("inputgameid").value=arr[0];
				 document.getElementById("futureid").value=arr[0];
				  return false;
				  },
				  error: function (e) {}
				  });
			}
		
		function betbutton(color,type,name)
		{
			$.ajax({
			type: "Post",
			data:"type=" + type+ "& name=" + name ,
			url: "betform.php",
			success: function (html) {
				
			 document.getElementById("loadform").innerHTML=html;
			  return false;
			  },
			  error: function (e) {}
			  });

			if(type=='number'){
			$(".paymentheader").css("background-color", color);
			document.getElementById('chn').innerHTML = 'Select '+name;

				}else{
			$(".paymentheader").css("background-color", color);
			document.getElementById('chn').innerHTML = 'Join '+name;
			}
			$('#payment').modal({backdrop: 'static', keyboard: false})  
			 $('#payment').modal('show');
			 document.getElementById('type').value = type;
			 document.getElementById('value').value = name;

		}
		
		//=====================amount calculation======================	
		function contract(abc){ //alert(abc);
			var amount =$("#amount").val();
			document.getElementById('contractmoney').value = abc;
			var addvalue=abc*amount;
			document.getElementById('showamount').innerHTML = addvalue;
			document.getElementById('finalamount').value = addvalue;

		};	
		function addvalue()
		{ 
			var amount =$("#amount").val();
			var contractmoney =$("#contractmoney").val();
			var addvalue=contractmoney*amount;
			document.getElementById('showamount').innerHTML = addvalue;
			document.getElementById('finalamount').value = addvalue;
		}

		function tabname(tabname){
			document.getElementById('tab').value = tabname;	
		}	

//=====================amount calculation======================
		
		function getResultbyCategory(category,containerid)
		{ 
		$.ajax({
			type: "Post",
			data:"category=" + category,
			url: "getResultbyCategory.php",
			success: function (html) {
			 document.getElementById(containerid).innerHTML=html;
			 waitlist('parity',<?php echo $userid;?>,'paritywait');
			 //waitlist('sapre',<?php echo $userid;?>,'saprewait');
			 //waitlist('bcone',<?php echo $userid;?>,'bconewait');
			 //waitlist('emerd',<?php echo $userid;?>,'emerdwait');
			 if(category=='parity'){
			  $('#parityt').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			$('#myrecordparityt').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			 }
			 else if(category=='sapre'){
			  $('#sapret').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			$('#myrecordsapret').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			 }
			 else if(category=='bcone'){
			  $('#bconet').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			$('#myrecordbconet').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			 }
			 else if(category=='emerd'){
			  $('#emerdt').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			$('#myrecordemerdt').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": true,
			  "autoWidth": false
			});
			 }
			  return false;
			  },
			  error: function (e) {}
			  });
			 
		}
			
			$(document).ready(function () {
				waitlist('parity',<?php echo $userid;?>,'paritywait');
			});
			
			function reloadbtn(id){
				var load = document.getElementById("loading");
				load.style.display = "flex";
				setTimeout(function(){
					load.style.display = "none";
				}, 1000);
				$.ajax({
					type: "Post",
					data:"userid=" + id,
					url: "getwalletbalance.php",
					success: function (html) {	 
						document.getElementById('balance').innerHTML =html;
						return false;
					},
					error: function (e) {}
				});
	
			}
			
			function continuebtn(){
				var load = document.getElementById("loading");
				load.style.display = "flex";
				setTimeout(function(){
					load.style.display = "none";
				}, 1000);
				var cont = document.getElementById("cont");
				cont.style.display = "none";
				var tmr = document.getElementById("countdown");
				tmr.style.display = "flex";
				$("#contbt").removeClass("yellowback");
				$("#contbt").addClass("grayback");
				$("#contbt").off("click", continuebtn);
				$.ajax({
					type: "Post",
					data:"userid=" + id,
					url: "getwalletbalance.php",
					success: function (html) {	 
						document.getElementById('balance').innerHTML =html;
						return false;
					},
					error: function (e) {}
				});
			}
		</script>
	</body>