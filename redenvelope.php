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
		<div data-v-a6ff3118="" class="recharge">
			<nav data-v-a6ff3118="" class="top_nav">
				<div data-v-a6ff3118="" class="left">
					<img data-v-a6ff3118="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-a6ff3118="">RedEnvelope</span>
				</div>
				<div data-v-a6ff3118="" class="right">
					<img data-v-a6ff3118="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABnElEQVRoQ+2aMU4DMRBF/++
					4AEKiTYM4AhVHoKGCAspQcgK4AB0oZZo0VNwAKrgBHRIVEuICUA2ytEFmkzCrib0Sq7+td8Yzb75teXaJgTwcSB5QIl0qaWb7AM6ad29IPnSxi7xTrSJmNgLwB
					GCzCewNwIjkZyRQz6ZmItdZNeZxjElOvKAi4zUTuQeQpJU/FyQvI4F6NkrEI2RmqogHadm4pOVRk7Q8QivGJS0PnKTlEZK0goQkrSA47VoeOEnLI9R112puduc
					AdoM+c7P2faTEVfcZwBXJl3yiX2vEzPYA3GXX0wK5VHHxAeCA5OPcezuRZXeIKpEUcDojebwqkVsAhwUm6cPFhOR4VSJJ0zMA231EssYcqSNzlLeXFs4RM9sAc
					AJga42JkmmCstB8WNNnMn8HMG23lXQgemR1IHqEuh6IQT8LZqpIkKQWuwdO0vIIabEHCUlaQXDatTxwkpZHSLtWkNCQpLXs8/QpyWmQzZ9mNXet9g8DrwB2SH7
					9q0RSsE17Kf+F46d9UzqZahUpHajnT4l4hPoe/wbmcuQzOS0vzQAAAABJRU5ErkJggg==" alt="" onclick="window.location.href='addredenvelope.php';">
				</div>
			</nav>
			<div data-v-a6ff3118="" class="recharge_box"><!---->
				<p data-v-a6ff3118="" class="null_data">No data available</p>
				<div data-v-a6ff3118="" class="pagination">
					<ul data-v-a6ff3118="" class="page_box">
						<li data-v-a6ff3118="" class="page"><span data-v-a6ff3118="">1-10</span> of 
						</li>
						<li data-v-a6ff3118="" class="page_btn">
							<i data-v-a6ff3118="" class="van-icon van-icon-arrow-left"><!----></i>
							<i data-v-a6ff3118="" class="van-icon van-icon-arrow"><!----></i>
						</li>
					</ul>
				</div>
				<div data-v-a6ff3118="" class="choose_page">
					<div data-v-a6ff3118="" class="choose_page_par">
						<span data-v-a6ff3118="">Rows per page:</span>
						<div data-v-a6ff3118="" class="page_box_two">
							<div data-v-a6ff3118="" class="van-dropdown-menu">
								<div class="van-dropdown-menu__bar">
									<div role="button" tabindex="0" class="van-dropdown-menu__item">
										<span class="van-dropdown-menu__title">
											<div class="van-ellipsis">10</div>
										</span>
									</div>
								</div>
								<div data-v-a6ff3118="">
									<div class="van-dropdown-item van-dropdown-item--down" style="top: 0px; display: none;"><!---->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<?php include("include/footer.php");?>
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
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
	</body>
</html>