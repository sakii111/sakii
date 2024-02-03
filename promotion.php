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
	$user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	$userRows=mysqli_num_rows($user);
	$userResult=mysqli_fetch_array($user);
	$owncode=$userResult['owncode'];
	$userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
	$userlevel1Rows=mysqli_num_rows($userlevel1);
	$total2 = 0;
	$total3 = 0;
	$i=1;
	while($i <= $userlevel1Rows){
		$userlevel1Array=mysqli_fetch_array($userlevel1);
		if(!empty($userlevel1Array['owncode'])){
			$lvl1owncode = $userlevel1Array['owncode'];
			$userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$lvl1owncode."' order by id asc");
			$userlevel2Rows=mysqli_num_rows($userlevel2);
			$total2 = $total2 + $userlevel2Rows;
			$j = 1;
			while($j <= $userlevel2Rows){
				$userlevel2Array=mysqli_fetch_array($userlevel2);
				if(!empty($userlevel2Array['owncode'])){
					$lvl2owncode = $userlevel2Array['owncode'];
					$userlevel3=mysqli_query($con,"select * from `tbl_user` where `code`='".$lvl2owncode."' order by id asc");
					$userlevel3Rows=mysqli_num_rows($userlevel3);
					$total3 = $total3 + $userlevel3Rows;
				}
				$j++;
			}
		}
		$i++;
	}
	$totpeps = $userlevel1Rows + $total2 + $total3;
	
	//Contribution
	$betsum1=mysqli_query($con,"select * from `tbl_bonussummery` where `level1id`='".$userid."' order by id asc");
	$betsum1row = mysqli_num_rows($betsum1);
	$betsum1total = 0;
	$k = 1;
	while($k <= $betsum1row){
		$betsum1Array=mysqli_fetch_array($betsum1);
		if(!empty($betsum1Array['tradeamount'])){
			$lvl1amt = $betsum1Array['tradeamount'];
			$betsum1total = $betsum1total + $lvl1amt;
		}
		$k++;
	}
	$betsum2=mysqli_query($con,"select * from `tbl_bonussummery` where `level2id`='".$userid."' order by id asc");
	$betsum2row = mysqli_num_rows($betsum2);
	$betsum2total = 0;
	$l = 1;
	while($l <= $betsum2row){
		$betsum2Array=mysqli_fetch_array($betsum2);
		if(!empty($betsum2Array['tradeamount'])){
			$lvl2amt = $betsum2Array['tradeamount'];
			$betsum2total = $betsum2total + $lvl2amt;
		}
		$l++;
	}
	$betsum3=mysqli_query($con,"select * from `tbl_bonussummery` where `level3id`='".$userid."' order by id asc");
	$betsum3row = mysqli_num_rows($betsum3);
	$betsum3total = 0;
	$m = 1;
	while($m <= $betsum3row){
		$betsum3Array=mysqli_fetch_array($betsum3);
		if(!empty($betsum3Array['tradeamount'])){
			$lvl3amt = $betsum3Array['tradeamount'];
			$betsum3total = $betsum3total + $lvl3amt;
		}
		$m++;
	}
	$totcont = $betsum1total + $betsum2total + $betsum3total;
?>
<html lang="en" style="font-size: 102.8px;">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" href="favicon.ico">
		<?php include 'head.php';?>
		<!--<link href="js/app.1b48dbbc.js" rel="preload" as="script">
		<link href="js/chunk-vendors.45119046.js" rel="preload" as="script">
		<link rel="stylesheet" href="assets/css/inc/ionicons.min.css">-->
		<link rel="stylesheet" href="assets/css/style.css">
		<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<style type="text/css" id="operaUserStyle"></style>
		<style>
			body{
				color: black;
				line-height: normal;
				letter-spacing: normal;
			}
			.right_zz[data-v-46279928]{
				position: initial !important;
				height: auto;
			}
			.toasta{
                height: 40px;
                width: 100px;
                background-color: rgba(0,0,0,.5);
                border-radius: 5px;
                position:absolute;
                left: 50%;
                top: 30%;
                margin-left: -70px;
                margin-top: -30px;
                line-height: 40px;
                color: #FFF;
                text-align: center;
                white-space: nowrap;
            }
			.pro_content[data-v-46279928]{
				background-color: #fff;
			}
			.parity table th[data-v-5f666fee]{
				font-weight: 400;
				color: black;
			}
			.dataTables_paginate{
				top: -10px;
			}
			.dataTables_info{
				top: 6px;
			}
			/*For adjusting footer*/
			.appBottomMenu .item span{
				bottom: 7px;
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-46279928="" class="promotion">
			<nav data-v-46279928="" class="top_nav">
				<div data-v-46279928="" class="left">
					<img data-v-46279928="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AWt
					pbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJK
					RQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxI
					lJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/
					Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA9
					2Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-46279928="">Promotion</span>
				</div>
				<div data-v-46279928="" class="right" id="promooption">
					<img data-v-46279928="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAA30lEQVRoQ+2YUQ7CMAxD65uxkyFOxjhZE
					AeATKndocz7j1P7JVpVjCYfmvgYNvJvJE3EREQJeLREwZZlr0MkIu7lmIiFAB6/5FIiEfEcY9yIZ6pI7QA2G/kk0IlIjx2pDPQZNemyn3GoSk8bqaSmrDERZboVbROppKasS
					Yl0+rP70kgcJd9+iWGukUqXfc0x5rvYyHyGXAUT4eY5r2Yi8xlyFVIioge6F4CdaeWIEcVda7ORLxgvRUTxQLd+R5gLqdRKR0vZnKltI8w0GVomwkiRqWEizDQZWibCSJGp8
					QahV0QzxiHkWgAAAABJRU5ErkJggg==" alt="">
				</div>
			</nav>
			<div data-v-46279928="" class="pro_content">
				<div data-v-46279928="" class="container">
					<div data-v-46279928="" class="headline">
						Bonus:₹ <span data-v-46279928=""><?php $bns = (bonus($con,'amount',$userid)); if($bns == null || $bns == 0){echo 0;} else {echo $bns;}?></span>
					</div>
				</div>
				<div data-v-46279928="" class="level_box">
					<div data-v-46279928="" class="level_content">
						<div data-v-46279928="" class="level_list">
							<ul data-v-46279928="" class="layout">
								<li data-v-46279928="">
									<ol data-v-46279928="">
										Total People
									</ol>
									<ol data-v-46279928="" class="two_ol">
										<?php echo $totpeps; ?>
									</ol>
								</li>
								<li data-v-46279928="">
									<ol data-v-46279928="">
										Contribution
									</ol>
									<ol data-v-46279928="" class="two_ol">
										₹
										<?php echo $totcont; ?>
									</ol>
								</li>
							</ul>
							<div data-v-46279928="" class="layout_bot">
								<div data-v-46279928="" class="bot_list">
									<p data-v-46279928="" class="titles">My Promotion Code</p>
									<p data-v-46279928="" class="answer"><?php echo user($con,'owncode',$userid);?></p>
								</div>
								<div data-v-46279928="" class="bot_list">
									<p data-v-46279928="" class="titles">My Promotion Link</p>
									<p data-v-46279928="" class="answer heights">
										<?php echo $_SERVER['SERVER_NAME']; //echo getcwd(); ?>/register?r_code=<?php echo user($con,'owncode',$userid);?>
									</p>
								</div>
							</div>
							<div data-v-46279928="" class="openlink">
								<button data-v-46279928="" data-clipboard-text="<?php echo $_SERVER['SERVER_NAME']; //echo getcwd(); ?>/register?r_code=<?php echo user($con,'owncode',$userid);?>" class="tag-read ripplegrey btn copyBtn">
									Copy Link
								</button>
							</div>
						</div>
					</div>
				</div>
				<div data-v-46279928="" class="van-tabs van-tabs--line" style="margin-bottom: 50px;">
					<div class="van-tabs__wrap van-hairline--top-bottom">
						<div role="tablist" class="van-tabs__nav van-tabs__nav--line">
							<div role="tab" class="van-tab van-tab--active" aria-selected="true" id="lvla">
								<span class="van-tab__text van-tab__text--ellipsis">Level 1（<?php echo $userlevel1Rows; ?>）</span>
							</div>
							<div role="tab" class="van-tab" id="lvlb">
								<span class="van-tab__text van-tab__text--ellipsis">Level 2（<?php echo $total2; ?>）</span>
							</div>
							<div role="tab" class="van-tab" id="lvlc">
								<span class="van-tab__text van-tab__text--ellipsis">Level 3（<?php echo $total3; ?>）</span>
							</div>
							<div class="van-tabs__line" style="width: 0px; transform: translateX(171.5px) translateX(-50%); height: 0px; border-radius: 0px; transition-duration: 0.3s;">
							</div>
						</div>
					</div>
					<div id="maryx">
						<div data-v-46279928="" class="van-search">
							<div data-v-46279928="" class="van-search__content van-search__content--square">
								<div data-v-46279928="" class="van-cell van-cell--borderless van-field">
									<div class="van-field__left-icon">
										<i class="van-icon van-icon-search"><!----></i>
									</div>
									<div class="van-cell__value van-cell__value--alone van-field__value">
										<div class="van-field__body">
											<input type="search" id="myCustomSearchBox" placeholder="search" class="van-field__control">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div  id="lvlx" role="tabpanel">
							
						</div>
					</div>
					<div id="maryy" style="display: none;">
						<div data-v-46279928="" class="van-search">
							<div data-v-46279928="" class="van-search__content van-search__content--square">
								<div data-v-46279928="" class="van-cell van-cell--borderless van-field">
									<div class="van-field__left-icon">
										<i class="van-icon van-icon-search"><!----></i>
									</div>
									<div class="van-cell__value van-cell__value--alone van-field__value">
										<div class="van-field__body">
											<input type="search" id="myCustomSearchBoxy" placeholder="search" class="van-field__control">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div  id="lvly" role="tabpanel">
							
						</div>
					</div>
					<div id="maryz" style="display: none;">
						<div data-v-46279928="" class="van-search">
							<div data-v-46279928="" class="van-search__content van-search__content--square">
								<div data-v-46279928="" class="van-cell van-cell--borderless van-field">
									<div class="van-field__left-icon">
										<i class="van-icon van-icon-search"><!----></i>
									</div>
									<div class="van-cell__value van-cell__value--alone van-field__value">
										<div class="van-field__body">
											<input type="search" id="myCustomSearchBoxz" placeholder="search" class="van-field__control">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div  id="lvlz" role="tabpanel">
							
						</div>
					</div>											
				</div>
			</div>
		</div>
		<?php include("include/footer.php");?>	
			<div data-v-74fec56a="" data-v-46279928="" class="loading" style="display: none;">
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
			<div data-v-46279928="" class="notice_zz" id="not">
				<div data-v-46279928="" class="wrapper" style="max-height: 70vh;">
					<p data-v-46279928="" class="tz_title">Notice</p>
					<p data-v-46279928="" class="tz_info">When your friends trade, you will also receive a 30% commission. Therefore, the more friends you invite, the higher 
					your commission. There is a fixed income every day, the commission is permanent, but the reward is only onceWhen they make money, they will invite their 
					friends to join them, and then you can get a 20% commission. In this way, your team can spread quickly. Therefore, I hope everyone can use our platform to 
					make money, make money, and make money!When they make money, they will invite their friends to join them, and then you can get a 20% commission. In this way, 
					your team can spread quickly. Therefore, I hope everyone can use our platform to make money, make money, and make money!Level 1 commission: Friends who join 
					through your own link belong to your level, when they trade, you will get 30% commission.Tier 2 commission: Friends who join through your friend link belong 
					to your secondary commission. When they trade, you can get 20% commission.Level 3 commission: Friends who join through friends of friends belong to your level 
					3. When they trade, you get 10% commission.Promotional rewards: 10% bonus amount for the first recharge after the first-level lower level joins. If your friend 
					joins through your invitation and recharges 1000 for the first time, you will get 200</p>
					<div data-v-46279928="" class="tz_close">
						<button data-v-46279928="" id="clnot">CLOSE</button>
					</div>
				</div>
			</div>
			<div data-v-46279928="" class="right_zz" style="display: none;" id="promolist">
				<div data-v-46279928="" class="wrapper">
					<ul data-v-46279928="" class="right_nav">
						<li data-v-46279928="">Bonus Record</li>
						<li data-v-46279928="">Apply Record</li>
					</ul>
				</div>
			</div>
		</div>
		<!--<script src="js/chunk-vendors.45119046.js"></script>
		<script src="js/app.1b48dbbc.js?id=2"></script>-->
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
		<script>
			$(document).ready(function () {  
				getReferralbyLevel('lvlx','lvlx');
			});
			document.getElementById("clnot").addEventListener("click", function() {
				document.getElementById("not").style.display = "none";
			});
			var promolist = document.getElementById("promolist");
			var promooption = document.getElementById("promooption");
			promooption.addEventListener("click", function(event){
				event.stopPropagation();
				if (promolist.style.display === "none") {
				  promolist.style.display = "";
				} else {
				  promolist.style.display = "none";
				}
			});
			document.addEventListener("click", function(event){
				if (promolist.style.display === "") {
				  promolist.style.display = "none";
				}
			});
			document.getElementById("lvlb").addEventListener("click", function() {
			  document.getElementById("lvla").classList.remove("van-tab--active");
			  document.getElementById("lvla").removeAttribute("aria-selected");
			  document.getElementById("lvlc").classList.remove("van-tab--active");
			  document.getElementById("lvlc").removeAttribute("aria-selected");
			  document.getElementById("maryx").style.display = "none";
			  document.getElementById("maryz").style.display = "none";

			  document.getElementById("lvlb").classList.add("van-tab--active");
			  document.getElementById("lvlb").setAttribute("aria-selected", "true");
			  document.getElementById("maryy").style.display = "";
			  getReferralbyLevel('lvly','lvly');
			});
			document.getElementById("lvlc").addEventListener("click", function() {
			  document.getElementById("lvla").classList.remove("van-tab--active");
			  document.getElementById("lvla").removeAttribute("aria-selected");
			  document.getElementById("lvlb").classList.remove("van-tab--active");
			  document.getElementById("lvlb").removeAttribute("aria-selected");
			  document.getElementById("maryx").style.display = "none";
			  document.getElementById("maryy").style.display = "none";

			  document.getElementById("lvlc").classList.add("van-tab--active");
			  document.getElementById("lvlc").setAttribute("aria-selected", "true");
			  document.getElementById("maryz").style.display = "";
			  getReferralbyLevel('lvlz','lvlz');
			});
			document.getElementById("lvla").addEventListener("click", function() {
			  document.getElementById("lvlb").classList.remove("van-tab--active");
			  document.getElementById("lvlb").removeAttribute("aria-selected");
			  document.getElementById("lvlc").classList.remove("van-tab--active");
			  document.getElementById("lvlc").removeAttribute("aria-selected");
			  document.getElementById("maryy").style.display = "none";
			  document.getElementById("maryz").style.display = "none";

			  document.getElementById("lvla").classList.add("van-tab--active");
			  document.getElementById("lvla").setAttribute("aria-selected", "true");
			  document.getElementById("maryx").style.display = "";
			  getReferralbyLevel('lvlx','lvlx');
			});
			
			function getReferralbyLevel(level,levelid){
				$.ajax({
				type: "Post",
				data:"level=" + level,
				url: "getReferralbyLevel.php",
				success: function (html) {
					document.getElementById(levelid).innerHTML=html;
					if(level=='lvlx'){
						dTable = $('#lvlm').DataTable({
						"paging": true,
						"lengthChange": false,
						"searching": true,
						"ordering": false,
						"info": true,
						"autoWidth": false,
						"dom": "lrtip"
						});
					}
					else if(level=='lvly'){
						dTabley = $('#lvln').DataTable({
						"paging": true,
						"lengthChange": false,
						"searching": false,
						"ordering": false,
						"info": true,
						"autoWidth": false,
						"dom": "lrtip"
						});
					}
					else if(level=='lvlz'){
						dTablez = $('#lvlo').DataTable({
						"paging": true,
						"lengthChange": false,
						"searching": false,
						"ordering": false,
						"info": true,
						"autoWidth": false,
						"dom": "lrtip"
						});
					}
					return false;
				},
				error: function (e) {}
				});
			}
			
			$('#myCustomSearchBox').keyup(function() {
				dTable.search($(this).val()).draw(); 
			})
			$('#myCustomSearchBoxy').keyup(function() {
				dTable.search($(this).val()).draw(); 
			})
			$('#myCustomSearchBoxz').keyup(function() {
				dTable.search($(this).val()).draw(); 
			})
			
			function showToast(text){
                var ele = document.createElement("div");
                ele.className = "toasta";
                ele.innerHTML = text;
                document.body.appendChild(ele);
                setTimeout(function(){
                    document.body.removeChild(ele);
                }, 2000)
            }
            var btns = document.querySelectorAll('.btn');
            var clipboard = new ClipboardJS(btns);
            clipboard.on('success', function(e) {
                showToast("SUCCESS");
            });

            clipboard.on('error', function(e) {
                showToast("FAIL");
            });
		</script>
	</body>
</html>