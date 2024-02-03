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
	$user=mysqli_query($con,"select * from `tbl_bank` where `userid`='".$userid."' ORDER BY ID DESC");
	$userRows=mysqli_num_rows($user);
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
	<body style="font-size: 12px;"><!-- class="van-overflow-hidden" -->
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-be68bb7c="" class="bankcard">
			<nav data-v-be68bb7c="" class="top_nav">
				<div data-v-be68bb7c="" class="left">
					<img data-v-be68bb7c="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e
					/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys
					7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACex
					IHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOax
					To85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7
					EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAAB
					JRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-be68bb7c="">Bank Card</span>
				</div>
				<div data-v-be68bb7c="" class="right">
					<img data-v-be68bb7c="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABnElEQVRoQ+2aMU4DMRBF/+
					+4AEKiTYM4AhVHoKGCAspQcgK4AB0oZZo0VNwAKrgBHRIVEuICUA2ytEFmkzCrib0Sq7+td8Yzb75teXaJgTwcSB5QIl0qaWb7AM6ad29IPnSxi7xTrSJmNgL
					wBGCzCewNwIjkZyRQz6ZmItdZNeZxjElOvKAi4zUTuQeQpJU/FyQvI4F6NkrEI2RmqogHadm4pOVRk7Q8QivGJS0PnKTlEZK0goQkrSA47VoeOEnLI9R112pu
					ducAdoM+c7P2faTEVfcZwBXJl3yiX2vEzPYA3GXX0wK5VHHxAeCA5OPcezuRZXeIKpEUcDojebwqkVsAhwUm6cPFhOR4VSJJ0zMA231EssYcqSNzlLeXFs4RM
					9sAcAJga42JkmmCstB8WNNnMn8HMG23lXQgemR1IHqEuh6IQT8LZqpIkKQWuwdO0vIIabEHCUlaQXDatTxwkpZHSLtWkNCQpLXs8/QpyWmQzZ9mNXet9g8Drw
					B2SH79q0RSsE17Kf+F46d9UzqZahUpHajnT4l4hPoe/wbmcuQzOS0vzQAAAABJRU5ErkJggg==" alt="" onClick="window.location.href='addbankcard.php';">
				</div>
			</nav>
			<div data-v-be68bb7c="" class="address_list">
				<ul data-v-be68bb7c="" class="list_ul">
				<?php 
					if($userRows>=1){
						$i = 1;
						while($i <= $userRows){
							$userArray = mysqli_fetch_array($user);
							$id = $userArray['id'];
							$name = $userArray['name'];
							$bankaccount = $userArray['bankaccount'];
				?>
					<li data-v-be68bb7c="">
						<ol data-v-be68bb7c="" class="left_icon">
							<img data-v-be68bb7c="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAA
							LEwEAmpwYAAAFwmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjO
							WQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCA
							yMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5b
							nRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5
							zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUe
							XBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDo
							vL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlY
							XRlRGF0ZT0iMjAyMC0wNy0xNFQxMTowMzoxNSswODowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMC0wNy0xNFQxMTowMzoxNSswODowMCIgeG1wOk1
							vZGlmeURhdGU9IjIwMjAtMDctMTRUMTE6MDM6MTUrMDg6MDAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZmMyMzc2MDgtMmQ0NC01NjQ0LWFlZ
							TAtNTA0NGRlYWJmYzFhIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6YTk3OWMxMWMtZmZjYi1lOTQ1LTg2ODMtYmNiNGQ
							wMjMyNDc1IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZDA0NzZhNTktYjQyZS0yNjQ1LWFiNTQtNTM4ZDAxOWQ3NjNlIiBkYzpmb
							3JtYXQ9ImltYWdlL3BuZyIgcGhvdG9zaG9wOkNvbG9yTW9kZT0iMyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3R
							pb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZDA0NzZhNTktYjQyZS0yNjQ1LWFiNTQtNTM4ZDAxOWQ3NjNlIiBzdEV2dDp3a
							GVuPSIyMDIwLTA3LTE0VDExOjAzOjE1KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDx
							yZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpmYzIzNzYwOC0yZDQ0LTU2NDQtYWVlMC01MDQ0ZGVhY
							mZjMWEiIHN0RXZ0OndoZW49IjIwMjAtMDctMTRUMTE6MDM6MTUrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyA
							oV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSR
							EY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+M6WVOwAAA15JREFUaIHV2j9sHEUUx/HPrawtQkAWBgokQghSrEsTZEGRMoeULoLGBAu
							kiM5poKJNAXQ00JC4QVGkkAANfzokO2UK/qXicBAOfySKgIWFrEjewqaYPdtn3Z/dvd3by1dycb6Zeb+3Ozcz781rLC8vK4mncBrPYxZH8RgeQgOb+
							Ae/YRXf4Sb+LMP41Ij9j+A8XsWJIW0fTf+O48y+//+EG7iK34sKiQr2O4nPcBfvGO7EIE6kY6ylY54sMkheR57AFfyI+QL9h2mZT8e+ktrK1Tkr88L
							cPi/M+apopDZWU5uZyOJIjI+E1z5dRFlBplObl1INAxnmyGF8jQsjyyrOYqrh8KBGgxw5hG90rzB1cUbQcqhfg36OxMJTOFWBqKKcwlf6TLN+jnyAV
							kWCRuFFfNjri16OnFPvb2IYi8IG3MVBR57E5bHIGY1LgtZdDjryvvEusUWZFrTust+ROSyMU82ILAia0e3IRdXu2GXTEDRj7/T7NM5m6T0zM6PZbIr
							joZttIZIk0W63ra+vZ2l+Fs/gbueNvC7juatKJyCOY81mM2vzCG+w90Zey2MIVlZWcsjLTqvVyvugzuFiJER2mR/BBHIcxyKTuYPn5fSUEGPnptWaK
							P+fi4RX86AzG+HZulWUwLEIj9etogSmp/BIkZ5VLr8FeLjMLEitRPivbhElsBnh77pVlMC/EX6tW0UJrEW4U7eKEliNhKz4g87tCNWso+PlZiTcT7T
							rVjICv2CtE49cw3tZeiVJIo7jSg+NSZLkaf4pe1HhNWxn6dVut/MaysXW1pZ2O/ME2cbH0Nh39fYFXipdWbV8iZfpjtPfxU4dagqyI9x0oduR73F97
							HKKcx0/dD4cPDS+jY1xqinIhqB1l4OO/GWyE9gdLghad+l1jL9hshPZS4LGLvrFI2+ZzB1/BW/2+qKfI4mQjrxVlaIC3BI09dzEBkWI9+3d3dVN5y7
							zfr8Gw0LdTeEpLJUoKi9LqYbNQY2yxOyJcN31ivEuzRtCXndRn+m0nzzJh8+Fqp+rqj0B7KQ2ZoWCgUzkzaLcE8or5gTHMh00M7KdjjmX2riXp3PRM
							qfbwlTrlDktKJ7R/xmfGLHMqVFi4dkRofDsBSGffFQoPOuUXuwvPLuDb4XCsz/KMP4/Zcak671xbaEAAAAASUVORK5CYII=" alt="">
						</ol>
						<ol data-v-be68bb7c="" class="center">
							<p data-v-be68bb7c="" class="name" name="n<?php echo $id; ?>"><?php echo $name; ?></p>
							<p data-v-be68bb7c="" class="info_text" name="b<?php echo $id; ?>"><?php echo $bankaccount; ?></p>
						</ol>
						<ol data-v-be68bb7c="" class="right_icon" id="option" onclick="funkedit(<?php echo $id; ?>);">
							<img data-v-be68bb7c="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAAL
							EwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQ
							iPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMD
							E3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRhe
							C1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRj
							PSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjA
							vIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLz
							EuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0Z
							T0iMjAyMC0wNy0wOVQxNDoyMzozMCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDlUMTQ6MjU6MDgrMDg6MDAiIHhtcDpNZXRhZGF0YURh
							dGU9IjIwMjAtMDctMDlUMTQ6MjU6MDgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A
							6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NGM2MjIzYzUtMmM0Zi04NjQxLTk2NzMtYTFkZW
							JiZDdhYTMzIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjRjNjIyM2M1LTJjNGYtODY0MS05NjczLWExZGViYmQ3YWEzMyIgeG1wTU06T3JpZ2luY
							WxEb2N1bWVudElEPSJ4bXAuZGlkOjRjNjIyM2M1LTJjNGYtODY0MS05NjczLWExZGViYmQ3YWEzMyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4g
							PHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NGM2MjIzYzUtMmM0Zi04NjQxLTk2NzMtYTFkZWJ
							iZDdhYTMzIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTA5VDE0OjIzOjMwKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0
							MgKFdpbmRvd3MpIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gP
							D94cGFja2V0IGVuZD0iciI/Pi/bMeUAAAN4SURBVGiB5ZoxTBNRGMf/3+tt1s0BOpiQGBISJzo0TqW8ApGY1EVXXHCgOzLihu5l0A66yiIJsUHuFW8y
							DLAZFxITh9LEkXO73ufQV3Itpb1e31GKv6RJ+/ru+/7/vKbv3fcdwRC7u7t3k8nkEwBpACkimmTmFBFNAgAznxFRjZnPANQAHLuuu1coFM5N5KdhLj4
							8PHzg+/5jAK1XFCoAKkKISi6XO42qJZIRx3FmGo1GkZmLURN3FUNUSiQSpWw2+3PgaweZfHBwcF8IsQagCCA5aLKQuABKvu9vLyws/A57UWgjtm2vEN
							EWgIko6iJQZ+aNfD7/MczkUEaUUq8AbA0lKzobUso3/Sb1NVKtVj8zc8GMpmgQ0e78/PzTnnN6famUYqOKhkRKeaVecdUXSqnjeOREp5emrkaUUu8Bz
							MamKDqzWtslLi2VbdtrRFQykZWZ3xHRd/3+ERG9NBS3mM/nt4NjbUb0PnEEM3+xO1LK58EBpdQnAM8MxK77vp8J7jNtPy292RnZJzpNBMb+GAg/obVe
							cGHEcZwZNHfsWCGiH4ZCFbVmAAEjjUYjzmPHBcz80FCopNYMQBtxHGfK9AGwWq1e2o312D1TOZi56DjOFABYAOB5njQVPJBkXSklmfkIAIgow8xp03m
							09rKlPy+aTqBJE5Fx8R0sAijT/v7+Hcuy3JiTxYrneUlhWdZyjDk2pZSkz0ibcSWxLGtZAMjElUBK+brb+xjICACpOCIT0bcwY4ZIiVaVY5whoknBzL
							GsyHXCzLdoRUYtwhRCV/7GGmY+E0RUG7WQYSGi2u1ZETQLyuNOTQC4cdWSCBwL13X3Rq1iWFzX3RO6P1EZtZghqBQKhfPWPjLWRgB9qyuEGFsjLe0CA
							HK53Kmpotx1QkSlVpfr4oiSSCRKaDZZxgVXawYQMKLbXeO0Km0turZDo+/72wDqJrIw85xt29Otz7ZtTzPznInYaJZMr6796oQrRPTBUEIw81sAIKJ1
							gzFfdLbkujZORtxq60fXVtyVHaCb0HLrpFcL7va33gIXnhhXNDgnvUwAfYwAgJQyDaBsTNLglLWGnoS6Z5dSrupqvZG/5pDUmbkopVwNM/n/e4QjyNg
							/VNOJ4zhTuj+xiOhNzh0AXy3LUtls9ldULUMZCaLbE8toFsXDPHh25Hnel6Wlpb8m8v8D1QZzT64wvioAAAAASUVORK5CYII=" alt="">
						</ol>
					</li>
				<?php			
							$i++;
						}
					} 
				?>
				</ul><!---->
				<div class="van-overlay" style="z-index: 10000; display: none;" id="tlay"></div>
				<div data-v-be68bb7c="" class="van-popup van-popup--bottom" style="z-index: 10001; display: none;" id="topt">
					<div data-v-be68bb7c="" class="popup_box">
						<p data-v-be68bb7c="" class="popup_title">Select</p>
						<ul data-v-be68bb7c="" class="popup_ul">
							<li data-v-be68bb7c="" id="edit">
								<img data-v-be68bb7c="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADS0lEQVRoQ+
								2Yz2sTURDHZ7K56EFBiigIWhDUoyj0JHjw5EkQgxRERfEHohIz8yJBMVbENG9XVAQrQi2CiKbaP0AEDx486LF6tOBNDyKSU3FHniQSm03yNtn
								sLqV7nh/fz8z7sfMQlsmHy4QDVkDS1snUdKRQKIwg4j4A2CAi857nvQ5TrFSAMPMhALgBANtaxE9rrU/YwiQO0oB40UFwTWuds4FJFKQHRFO/
								FUyiIOVyOVuv12sAcKBH1ae01me72SQKYoTl8/lV2Wx2FgD2dxPqOM5opVJZ6GQTOwgRXRORmud5n5qiisXiWt/3DYw5tQI/3/d3e573MRUgz
								HylcTrN+76fa4Uxx28mk3kFAHuCxDqOs65SqfxIHISZSwBws0VIG0ypVNq4uLg4BwBjSwSz1tpNfI8opYoiUgkQEtSZzYg4h4g7jb2IlF3Xvd
								7rCB76HiEiRsRqFyFtMPl8fms2m50TkVkbCBN7qCBEdAkRvV7VBIA2GKXUjmq1+tnC96/J0ECY+SIA3LEVEgQTwnc4IMx8HgDuhRHSsG3rjG2
								MyDvCzOcA4L6tgFY7240dFDtSEKXUGRF5EDdEpHuEmU8BwMMkICIDYeaTAPAoKYhIQJRSx0VkOkmIgUGUUkdFZCZpiIFACoXCkUwm8yQNEH2D
								ENE4Ij5NC0RfIER0GBGfpQkiNAgR5RDxedogQoMYB2Y2S2o8DMwgN7Ztnr5udmZ+DADHbJLEAWHVESJaLyIjrWNpozNTAHC6G0xcEFYgzGweB
								bYvnbGNs1LqrohcCIKJE8IKhIh+IuKaTvMCM5tZuhDVX6zNcg3990tEY4j4vsUxcF5g5lsAcNnYxd2Jpraum52IJhDx6pIKBMIopSZ83/9tO2
								P3W/lOfr1APiDirgDnvie5qAF6dkQptUlEvnZJnCqYjh2xnDFSA9MNxBy7BwM68t283QLAN8dx3kxOTr4b1nIJEzcQpFwuZ+r1+i8AWN0I1hR
								fc133bZgEcdkGgjCzeeKfaVQ+teJbixQIQkR701r5vo7fuJZFFHn+64h5q40iaFwxXNe9HXiPMPMXANgSl5AB8yxorUeXN4hS6uWAVYrVvVqt
								/rvn+poQY1VrmWwFxLJQsZn9AUaWrUJJm+cTAAAAAElFTkSuQmCC" alt="">
								<span data-v-be68bb7c="">Edit</span>
							</li>
							<li data-v-be68bb7c="" id="del">
								<img data-v-be68bb7c="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACi0lEQVRoQ+
								1aO4sUQRCuOtidSIwu8gThMv0DKoJ3gRgYGSgIBj5AQdnE6R5YNvAMloWpnsRFwQM1EQRNLjEQAzc5TzAwulAQ1OgiMdodmJI572Qf86hdem9
								EurPd+bqqvu6vurp7BuE/aWibh+/75xDxBAAczrH9k5m3oyh6Z9O3VSJa61cAcEkY4GsiuizElsKsEVFKPULEO6UehwDM/NgYc3eaPnlYK0SC
								IDjEzF8AYHHKoHYQcTkMw19T9puAWyGilFpBxPezBMPMq8aY3ix9h/tYIRIEgc/MZpZgEFGFYRjN0ldEpNFoeJ7nnZI4QMRbAHBFgs3AvGTmd
								Unffr+/1e12+1nYzBnRWj8FgBsS4xVgnhHRzXG/E0RardaRwWDwvYIAxS7r9fpSu93+USitIAiWmPmb2GoFQEQ8GobhyGDnSesDAIjyowIeW0
								R0ulRa+wDf988j4sn934i4VkHQqcseM+8uz8z8MYqit+JkHwcqpe5XSYSIVssGUVRHHJGyYZQ97811Rph5DRE/AcAyADzMiwkRr+7p+0VB3Pe
								Y+TMAnM2Q8HyJENFfWWqt033WynigKVljzIP0/wJ5jgSqteYxO47IhAKyRtPNyGSiOGkV7rWyVhYnLbdqjejCLb9u+XWVfWib7rYokp20qyOu
								jrg6UpwpLkdcjrgccTmyOwLuFuWPEKo9swPA9TiONzzPO54kyWaOOL8mSXIhfbawsPAGAI7l4M4Q0abW+hoAPD/Qey3JHs0SZr4nREtBSsw4I
								qKjrmQoLWE2iOhima1//v3I8EV4ERkRkb1a8QQA0vfpB9nWiei2xKGYSGqs2WwuxnGcfsI091ar1bY7nc6O1NFURKRGq8D9Bs0q1VGDvbJRAA
								AAAElFTkSuQmCC" alt="">
								<span data-v-be68bb7c="">Delete</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php include("include/footer.php");?>
			<!-- Footer -->
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
			<div data-v-be68bb7c="" class="delete_zz" style="display: none;" id="delzz">
				<div data-v-be68bb7c="" class="warpper">
					<p data-v-be68bb7c="" class="title">Confirm</p>
					<p data-v-be68bb7c="" class="text">Do you want to delete this bank card? 
						<span data-v-be68bb7c="" id="nameaccount"></span>
					</p>
					<div data-v-be68bb7c="" class="bot_btn">
						<button data-v-be68bb7c="" onclick="hidedel();">CANCEL</button>
						<button data-v-be68bb7c="" class="btn" onclick="executedel();">DELETE</button>
					</div>
				</div>
			</div>
		</div>
		<div class="popup">
			<span class="popuptext" id="myPopup"></span>
		</div>
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/plugins/owl.carousel.min.js"></script>
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
			
			document.addEventListener("click", function(event){
				if (topt.style.display === "") {
				  setTimeout(listdisp, 300);
				  topt.style.animationName = "decre";
				  topt.style.animationDuration = ".3s";
				}
			});
			
			function funkedit(id){
				document.getElementById("edit").dataset.index = id;
				document.getElementById("del").dataset.index = id;
			}
			
			var ed = document.getElementById("edit");
			var del = document.getElementById("del");
			
			ed.addEventListener("click", function(event){
				event.stopPropagation();
				var ind = document.getElementById("edit").dataset.index;
				window.location.href = "addbankcard.php?cardId=" + ind;	
			});
			
			del.addEventListener("click", function(event){
				event.stopPropagation();
				var dl = document.getElementById("del").dataset.index;
				var y = "n"+dl;
				var z = "b"+dl;
				var name = document.getElementsByName(y)[0].innerHTML;
				var account = document.getElementsByName(z)[0].innerHTML;
				document.getElementById("nameaccount").innerHTML = name+" "+account;
				setTimeout(listdisp, 100);
				  topt.style.animationName = "decre";
				  topt.style.animationDuration = ".2s";
				document.getElementById("delzz").style.display = "";
			});
			
			function hidedel(){
				document.getElementById("delzz").style.display = "none";
			}
			
			function executedel(){
				document.getElementById("delzz").style.display = "none";
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Bank card information cannot be deleted');
				popup.style.width = "270px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
			}
		</script>
	</body>
</html>