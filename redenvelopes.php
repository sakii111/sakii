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
	if(isset($_GET['code'])){
		$code = $_GET['code'];
		$selectuser=mysqli_query($con,"select * from `redenvelope_user` where `serial`='".$code."' AND `userid`='".$userid."'");
		$userrow = mysqli_num_rows($selectuser);
		if($userrow==0){
			$selectcode=mysqli_query($con,"select * from `redenvelope_admin` where `serial`='".$code."' AND `status`='1'");
			$coderow = mysqli_num_rows($selectcode);
			if($coderow>=1){
				$codearray = mysqli_fetch_array($selectcode);
				$price = $codearray['price'];
			}
			else{
				$price = 0;
			}	
		}
		else{
			$price = 0;
		}
		
	}
	else{
		$price = 0;
		$code = 0;
	}
?>
<html lang="en" style="font-size: 37.5px;">
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
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-de7dd6c6="" class="redenvelopes">
			<div data-v-de7dd6c6="" class="back_red">
				<img data-v-de7dd6c6="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZ4AAABwCAYAAAAuRRZJAAAACXBIWXMAAAsTAAALEw
				EAmpwYAAAFwmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4
				gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3
				LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiP
				iA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodH
				RwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZ
				lbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9w
				aG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0xN
				1QxNjozMzoyMiswODowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMC0wNy0xN1QxNjozMzoyMiswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMT
				dUMTY6MzM6MjIrMDg6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OWRjMGVjNzMtMzk0OC0xMzQ4LTlkN2MtYTQzNDgwZjQyYzg5IiB4bXBNTTp
				Eb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6NzEyOTQ1MDEtMDg4Mi02ZTQ4LTg1MmYtYzMzZmI3NjI5NDFiIiB4bXBNTTpPcmlnaW5hbERv
				Y3VtZW50SUQ9InhtcC5kaWQ6NTRjNmE4YzctYjllYS01NTQ1LTg1N2MtMGQzYjZmZmJiYjE0IiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgcGhvdG9zaG9wO
				kNvbG9yTW9kZT0iMyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSU
				Q9InhtcC5paWQ6NTRjNmE4YzctYjllYS01NTQ1LTg1N2MtMGQzYjZmZmJiYjE0IiBzdEV2dDp3aGVuPSIyMDIwLTA3LTE3VDE2OjMzOjIyKzA4OjAwIiB
				zdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6
				aW5zdGFuY2VJRD0ieG1wLmlpZDo5ZGMwZWM3My0zOTQ4LTEzNDgtOWQ3Yy1hNDM0ODBmNDJjODkiIHN0RXZ0OndoZW49IjIwMjAtMDctMTdUMTY6MzM6M
				jIrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2
				VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+r3h5qgA
				ACIdJREFUeJzt3W2MXFUdx/FvS5FalCpF0mIrFvpkKw8NCmqKiK0vRE3ERE2k0aDxgRfoG4MmmpiQqKDRF0qID4kiCYqY1FRFjbSlalVaSUqWgrRspSDt
				rrRs221tt7jb9cX/THaos3Rnd+65M3e+n+TkzkxnZ/5t0/PrPffcc6Zx522jSJKUyfSyC5AkdReDR5KUlcEjScrK4JEkZWXwSJKyMngkSVkZPJKkrAweS
				VJWBo8kKSuDR5KUlcEjScrK4JEkZWXwSJKyMngkSVkZPJKkrAweSVJWBo8kKSuDR5KUlcEjScrK4JEkZWXwSJKyMngkSVkZPJKkrAweSVJWBo8kKSuDR5
				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
				AAAAAElFTkSuQmCC" alt="">
			</div>
			<nav data-v-de7dd6c6="" class="top_nav">
				<div data-v-de7dd6c6="" class="left">
					<img data-v-de7dd6c6="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSs
					FURTH8e/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yI
					mkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUac
					RbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTw
					G0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYD
					xv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5
					R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg==" alt="" onclick="window.location.href='mine.php';">
					<span data-v-de7dd6c6="">Red Envelopes</span>
				</div>
			</nav>
			<div data-v-de7dd6c6="" class="content_box">
				<div data-v-de7dd6c6="" class="redenvelopes_box">
					<p data-v-de7dd6c6="" class="title">Surprise</p>
					<div data-v-de7dd6c6="" class="img_box">
						<div data-v-de7dd6c6="" class="hb_img_box">
							<div data-v-de7dd6c6="" class="price">
								₹ <span data-v-de7dd6c6="" id="price"><?php echo $price; ?></span>
							</div>
							<img data-v-de7dd6c6="" src="assets/img/icon39.cc57337c.png" alt="">
						</div>
					</div>
					<div data-v-de7dd6c6="" class="btn_box">
						<button data-v-de7dd6c6="" id="continue">Continue</button>
					</div>
				</div>
			</div>
		</div>
		<div class="van-toast van-toast--middle van-toast--text" style="z-index: 2001; display: none;" id="popup">
			<div class="van-toast__text" id="popuptext"></div>
		</div>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script>
			function popupdisp(){
				document.getElementById("popup").style.display="none";
			}
			var cont = document.getElementById("continue");
			cont.addEventListener("click", function() {
				var wow = "<?php echo $code; ?>";
				$.ajax({
					type: "Post",
					data:"wow=" + wow,
					url: "addrednow.php",
					
					success: function (html) { 
						var arr = html.split('~');
						if (arr[0]== 1) {			
							document.getElementById("popuptext").innerHTML = "Success";
							popup.style.display = "";
							document.getElementById("price").innerHTML = "0";
							setTimeout(popupdisp, 1500);
						}
						else if (arr[0]== 2) {
							document.getElementById("popuptext").innerHTML = "Failed";
							popup.style.display = "";
							setTimeout(popupdisp, 1500);
						}
						else if (arr[0]== 0) {
							document.getElementById("popuptext").innerHTML = "Not Valid";
							popup.style.display = "";
							setTimeout(popupdisp, 1500);
						}
						else if (arr[0]== 3) {
							document.getElementById("popuptext").innerHTML = "Has been received";
							popup.style.display = "";
							setTimeout(popupdisp, 1500);
						}
					  return false;
					},
					error: function (e) {}
				});
			});
		</script>
	</body>
</html>