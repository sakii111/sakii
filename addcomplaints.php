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
		<link href="assets/css/style.css" rel="stylesheet"/>
		<style>
			/*For adjusting footer*/
			.appBottomMenu .item span{
				bottom: 4px;
			}
			/*For adjusting form*/
			ul{
				margin-bottom: 0;
			}
			body{
				line-height: 1.15em;
			}
			
			@keyframes incre {
				0% {
					transform: translateY(100%);
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
					transform: translateY(100%);
					opacity: 0;
				}
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-471d7b07="" class="addbankcard">
			<nav data-v-471d7b07="" class="top_nav">
				<div data-v-471d7b07="" class="left">
					<img data-v-471d7b07="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-471d7b07="">Add Complaints &amp; Suggestion</span>
				</div>
			</nav>
			<div data-v-471d7b07="" class="input_card">
				<ul data-v-471d7b07="" class="card_ul">
					<li data-v-471d7b07="">
						<p data-v-471d7b07="">Type</p>
						<div data-v-471d7b07="" role="button" tabindex="0" class="van-cell van-cell--clickable van-field" id="option">
							<div class="van-cell__value van-cell__value--alone van-field__value">
								<div class="van-field__body">
									<input type="text" readonly="readonly" class="van-field__control" id="type">
								</div>
							</div>
						</div>
						<div class="van-overlay" style="z-index: 10001; display: none;" id="tlay"></div>
						<div data-v-471d7b07="" class="van-popup van-popup--round van-popup--bottom" style="z-index: 10002; display: none;" id="topt">
							<div data-v-471d7b07="" class="van-picker" id="chkjs">
								<div class="van-picker__toolbar">
									<button type="button" class="van-picker__cancel" id="cancel">Cancel</button>
									<button type="button" class="van-picker__confirm" id="confirm">Confirm</button>
								</div><!---->
								<div class="van-picker__columns" style="height: 220px;">
									<div class="van-picker-column">
										<ul class="van-picker-column__wrapper" style="transform: translate3d(0px, 88px, 0px); transition-duration: 200ms; transition-property: all;" id="totallist">
											<li role="button" tabindex="0" class="van-picker-column__item van-picker-column__item--selected" style="height: 44px;" id="suggestion">
												<div class="van-ellipsis">Suggestion</div>
											</li>
											<li role="button" tabindex="0" class="van-picker-column__item" style="height: 44px;" id="consult">
												<div class="van-ellipsis">Consult</div>
											</li>
											<li role="button" tabindex="0" class="van-picker-column__item" style="height: 44px;" id="recharge">
												<div class="van-ellipsis">Recharge Problem</div>
											</li>
											<li role="button" tabindex="0" class="van-picker-column__item" style="height: 44px;" id="withdraw">
												<div class="van-ellipsis">Withdraw Problem</div>
											</li>
											<li role="button" tabindex="0" class="van-picker-column__item" style="height: 44px;" id="parity">
												<div class="van-ellipsis">Parity Problem</div>
											</li>
											<li role="button" tabindex="0" class="van-picker-column__item" style="height: 44px;" id="gift">
												<div class="van-ellipsis">Gift Receive Problem</div>
											</li>
											<li role="button" tabindex="0" class="van-picker-column__item" style="height: 44px;" id="other">
												<div class="van-ellipsis">Other</div>
											</li>
										</ul>
									</div>
									<div class="van-picker__mask" style="background-size: 100% 88px;"></div>
									<div class="van-hairline-unset--top-bottom van-picker__frame" style="height: 44px;"></div>
								</div><!---->
							</div>
						</div>
					</li>
					<li data-v-471d7b07="">
						<p data-v-471d7b07="">Out Id</p>
						<input data-v-471d7b07="" type="text" id="outid">
					</li>
					<li data-v-471d7b07="">
						<p data-v-471d7b07="">WhatsApp</p>
						<input data-v-471d7b07="" type="text" id="whatsapp">
					</li>
					<li data-v-471d7b07="">
						<p data-v-471d7b07="">Description</p>
						<textarea data-v-471d7b07="" name="" id="description"></textarea>
					</li>
				</ul>
				<p data-v-471d7b07="" class="tips">Service: 10:00~17:00, Mon~Fri about 1~5 business days</p>
				<div data-v-471d7b07="" class="continue_btn">
					<button data-v-471d7b07="" class="ripple" id="continue">Continue</button>
				</div>
			</div>
			<!--footer-->
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
			<div class="van-toast van-toast--middle van-toast--text" style="z-index: 10003; display: none;" id="popup">
				<div class="van-toast__text" id="popuptext"></div>
			</div>
		</div>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script>
			var tlay = document.getElementById("tlay");
			var topt = document.getElementById("topt");
			var option = document.getElementById("option");
			option.addEventListener("click", function(event){
				event.stopPropagation();
				if (topt.style.display === "none") {
				  topt.style.display = "";
				  tlay.style.display = "";
				  topt.style.animationName = "incre";
				  topt.style.animationDuration = ".3s";
				} else {
				  setTimeout(listdisp, 300);
				  topt.style.animationName = "decre";
				  topt.style.animationDuration = ".3s";
				}
			});
			
			function listdisp(){
				topt.style.display = "none";
				tlay.style.display = "none";
			}
			
			tlay.addEventListener("click", function(event){
				if (topt.style.display === "") {
				  setTimeout(listdisp, 300);
				  topt.style.animationName = "decre";
				  topt.style.animationDuration = ".3s";
				}
			});
			
			var suggestion = document.getElementById("suggestion");
			var consult = document.getElementById("consult");
			var recharge = document.getElementById("recharge");
			var withdraw = document.getElementById("withdraw");
			var parity = document.getElementById("parity");
			var gift = document.getElementById("gift");
			var other = document.getElementById("other");
			var totallist = document.getElementById("totallist");

			suggestion.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, 88px, 0px)";
			  suggestion.classList.add("van-picker-column__item--selected");
			  consult.classList.remove("van-picker-column__item--selected");
			  recharge.classList.remove("van-picker-column__item--selected");
			  withdraw.classList.remove("van-picker-column__item--selected");
			  parity.classList.remove("van-picker-column__item--selected");
			  gift.classList.remove("van-picker-column__item--selected");
			  other.classList.remove("van-picker-column__item--selected");
			});
			consult.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, 44px, 0px)";
			  consult.classList.add("van-picker-column__item--selected");
			  suggestion.classList.remove("van-picker-column__item--selected");
			  recharge.classList.remove("van-picker-column__item--selected");
			  withdraw.classList.remove("van-picker-column__item--selected");
			  parity.classList.remove("van-picker-column__item--selected");
			  gift.classList.remove("van-picker-column__item--selected");
			  other.classList.remove("van-picker-column__item--selected");
			});
			recharge.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, 0px, 0px)";
			  recharge.classList.add("van-picker-column__item--selected");
			  consult.classList.remove("van-picker-column__item--selected");
			  suggestion.classList.remove("van-picker-column__item--selected");
			  withdraw.classList.remove("van-picker-column__item--selected");
			  parity.classList.remove("van-picker-column__item--selected");
			  gift.classList.remove("van-picker-column__item--selected");
			  other.classList.remove("van-picker-column__item--selected");
			});
			withdraw.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, -44px, 0px)";
			  withdraw.classList.add("van-picker-column__item--selected");
			  consult.classList.remove("van-picker-column__item--selected");
			  recharge.classList.remove("van-picker-column__item--selected");
			  suggestion.classList.remove("van-picker-column__item--selected");
			  parity.classList.remove("van-picker-column__item--selected");
			  gift.classList.remove("van-picker-column__item--selected");
			  other.classList.remove("van-picker-column__item--selected");
			});
			parity.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, -88px, 0px)";
			  parity.classList.add("van-picker-column__item--selected");
			  consult.classList.remove("van-picker-column__item--selected");
			  recharge.classList.remove("van-picker-column__item--selected");
			  withdraw.classList.remove("van-picker-column__item--selected");
			  suggestion.classList.remove("van-picker-column__item--selected");
			  gift.classList.remove("van-picker-column__item--selected");
			  other.classList.remove("van-picker-column__item--selected");
			});
			gift.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, -132px, 0px)";
			  gift.classList.add("van-picker-column__item--selected");
			  consult.classList.remove("van-picker-column__item--selected");
			  recharge.classList.remove("van-picker-column__item--selected");
			  withdraw.classList.remove("van-picker-column__item--selected");
			  parity.classList.remove("van-picker-column__item--selected");
			  suggestion.classList.remove("van-picker-column__item--selected");
			  other.classList.remove("van-picker-column__item--selected");
			});
			other.addEventListener("click", function() {
			  totallist.style.transform = "translate3d(0px, -176px, 0px)";
			  other.classList.add("van-picker-column__item--selected");
			  consult.classList.remove("van-picker-column__item--selected");
			  recharge.classList.remove("van-picker-column__item--selected");
			  withdraw.classList.remove("van-picker-column__item--selected");
			  parity.classList.remove("van-picker-column__item--selected");
			  gift.classList.remove("van-picker-column__item--selected");
			  suggestion.classList.remove("van-picker-column__item--selected");
			});
			
			var confirm = document.getElementById("confirm");
			confirm.addEventListener("click", function() {
				let selectedElement = document.querySelector('.van-picker-column__item--selected');
				let innerDiv = selectedElement.querySelector('.van-ellipsis');
				let innerHTML = innerDiv.innerHTML;
				document.getElementById("type").value = innerHTML;
				setTimeout(listdisp, 300);
				topt.style.animationName = "decre";
				topt.style.animationDuration = ".3s";
			});
			
			var cancel = document.getElementById("cancel");
			cancel.addEventListener("click", function() {
				setTimeout(listdisp, 300);
				topt.style.animationName = "decre";
				topt.style.animationDuration = ".3s";
			});
			
			function popupdisp(){
				document.getElementById("popup").style.display="none";
			}
			function loadingdisp(){
				document.getElementById("loading").style.display="none";
			}
			function loadingdispon(){
				document.getElementById("loading").style.display="";
			}
			function changeloc(){
				window.location.href='complaints.php';
			}
			
			var cont = document.getElementById("continue");
			cont.addEventListener("click", function() {
				var type = document.getElementById("type").value;
				var outid = document.getElementById("outid").value;
				var whatsapp = document.getElementById("whatsapp").value;
				var description = document.getElementById("description").value;
				
				var popup = document.getElementById("popup");
				
				if(type == ""){
					document.getElementById("popuptext").innerHTML = "Type cannot be empty";
					popup.style.display = "";
					setTimeout(popupdisp, 1500);
				}
				else if(whatsapp == ""){
					document.getElementById("popuptext").innerHTML = "WhatsApp cannot be empty";
					popup.style.display = "";
					setTimeout(popupdisp, 1500);
				}
				else if(description == ""){
					document.getElementById("popuptext").innerHTML = "Description cannot be empty";
					popup.style.display = "";
					setTimeout(popupdisp, 1500);
				}
				else{
					$.ajax({
					type: "Post",
					data:"type=" + type+ "& outid=" + outid+ "& whatsapp=" + whatsapp+ "& description=" + description,
					url: "addcomplaintnow.php",
					
					success: function (html) { 
					 var arr = html.split('~');
					if (arr[0]== 1) {			
							document.getElementById("popuptext").innerHTML = "Success";
							popup.style.display = "";
							setTimeout(popupdisp, 1500);
							setTimeout(loadingdispon, 1500);
							setTimeout(loadingdisp, 2500);
							setTimeout(changeloc, 2550);
					}
							else if (arr[0]== 2) {
								document.getElementById("popuptext").innerHTML = "Failed";
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