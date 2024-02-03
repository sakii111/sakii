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
	$user=mysqli_query($con,"select * from `tbl_transaction` where `userid`='".$userid."' AND `transtype` = 'LVL1COMM' ORDER BY ID DESC");
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
		<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
		<link href="assets/css/style.css" rel="stylesheet"/>
		<style>
			.right_info[data-v-5ac41059] {
				width: 24px;
				height: 24px;
				display: flex;
				justify-content: center;
				align-items: center;
				border: 2px solid #fff;
				color: #fff;
				border-radius: 50%;
			}
			#inter{
				width: 100%;
			}
			#interbody{
				padding: 0 0 5px;
			}
			#interdata{
				display: grid;
				padding: 10px 0;
				border-bottom: 1px solid #e8e8e8;
			}
			#interpara{
				display: flex;
				flex-direction: row;
				justify-content: space-between;
				font-size: 14px;
				margin-bottom: 10px;
				color: #757575;
				width: 100%;
			}
			
			.dataTables_paginate{
				top: -2px;
			}
			
			#rowsperpage{
				-webkit-appearance: none;
				-moz-appearance: none;
				border: none;
			}
			
			/*For adjusting footer*/
			.appBottomMenu .item span{
				bottom: 4px;
			}
		</style>
	</head>
	<body style="font-size: 12px;">
		<noscript><strong>We're sorry but default doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
		<div data-v-5ac41059="" class="recharge">
			<nav data-v-5ac41059="" class="top_nav">
				<div data-v-5ac41059="" class="left">
					<img data-v-5ac41059="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AW
					tpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZS
					JKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAO
					cxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerl
					qZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW
					0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg==" alt="" onClick="goBack();">
					<span data-v-5ac41059="">Reward</span>
				</div>
				<div data-v-5ac41059="" class="right_info" id="notinfo">?</div>
			</nav>
			<div data-v-5ac41059="" class="recharge_box">
				<?php 
					if($userRows==0){
				?>
						<p data-v-5ac41059="" class="null_data">
							No data available
						</p>
				<?php 
					}
					else {
							$i = 1;
				?>
							<div data-v-5ac41059="" class="completed_list">
								<table data-v-5ac41059="" id="inter">
									<thead data-v-5ac41059="">
										<tr data-v-5ac41059="">
											<th data-v-5ac41059=""></th>
										</tr>
									</thead>
									<tbody data-v-5ac41059="" id="interbody">
							<?php 
								while($i <= $userRows){
								$userArray = mysqli_fetch_array($user);
								$interest = $userArray['amount'];
								$obalance = $userArray['obalance'];
								$nbalance = $userArray['nbalance'];
								$date = $userArray['createdate'];
								$dot_pos = strpos($obalance, '.');
								if ($dot_pos === false) {
									$obalance = $obalance . '.00';
								}else {
									$after_dot = substr($obalance, $dot_pos + 1);
									$after_dot_length = strlen($after_dot);
									if ($after_dot_length > 2) {
										$after_dot = substr($after_dot, 0, 2);
										$obalance = substr($obalance, 0, $dot_pos + 1) . $after_dot;
									} elseif ($after_dot_length < 2) {
										$zeros_to_add = 2 - $after_dot_length;
										$obalance = $obalance . str_repeat('0', $zeros_to_add);
									}
								}
								$dot_pos1 = strpos($nbalance, '.');
								if ($dot_pos1 === false) {
									$nbalance = $nbalance . '.00';
								}else {
									$after_dot1 = substr($nbalance, $dot_pos1 + 1);
									$after_dot_length1 = strlen($after_dot1);
									if ($after_dot_length1 > 2) {
										$after_dot1 = substr($after_dot1, 0, 2);
										$nbalance = substr($nbalance, 0, $dot_pos1 + 1) . $after_dot1;
									} elseif ($after_dot_length1 < 2) {
										$zeros_to_add1 = 2 - $after_dot_length1;
										$nbalance = $nbalance . str_repeat('0', $zeros_to_add1);
									}
								}
								$dot_pos2 = strpos($interest, '.');
								if ($dot_pos2 === false) {
									$interest = $interest . '.00';
								}else {
									$after_dot2 = substr($interest, $dot_pos2 + 1);
									$after_dot_length2 = strlen($after_dot2);
									if ($after_dot_length2 > 2) {
										$after_dot2 = substr($after_dot2, 0, 2);
										$interest = substr($interest, 0, $dot_pos2 + 1) . $after_dot2;
									} elseif ($after_dot_length2 < 2) {
										$zeros_to_add2 = 2 - $after_dot_length2;
										$interest = $interest . str_repeat('0', $zeros_to_add2);
									}
								}
							?>
										<tr data-v-5ac41059="" id="interdata">
											<td data-v-5ac41059="">
												<div id="interpara"><span>₹ <?php echo $interest; ?></span><span>₹ <?php echo $obalance; ?></span></div>
												<div id="interpara">₹ <?php echo $nbalance; ?></div>
												<div id="interpara"><?php echo $date; ?></div>
											</td>
										</tr>
										
							<?php
								$i++;
							}
							?>
									</tbody>
								</table>
							</div>									
				<?php 
					}
				?>
				<div data-v-5ac41059="" class="choose_page">
					<div data-v-5ac41059="" class="choose_page_par">
						<span data-v-5ac41059="">Rows per page:</span>
						<div data-v-5ac41059="" class="page_box_two">
							<div data-v-5ac41059="" class="van-dropdown-menu">
								<div class="van-dropdown-menu__bar">
									<div role="button" tabindex="0" class="van-dropdown-menu__item">
										<select class="van-dropdown-menu__title" id="rowsPerPage">
											<option value="10" class="van-ellipsis">10</option>
											<option value="20" class="van-ellipsis">20</option>
										</select>
									</div>
								</div>
								<div data-v-5ac41059="">
									<div class="van-dropdown-item van-dropdown-item--down" style="top: 0px; display: none;"><!---->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("include/footer.php");?>
			<div data-v-5ac41059="" class="notice_zz" style="display: none;" id="notdetail">
				<div data-v-5ac41059="" class="wrapper" style="max-height: 70vh;">
					<p data-v-5ac41059="" class="tz_title">Explain</p>
					<p data-v-5ac41059="" class="tz_info">
						When your friends trade, you will also receive a 30% commission. Therefore, the more friends you invite, 
						the higher your commission. There is a fixed income every day, the commission is permanent, but the reward 
						is only onceWhen they make money, they will invite their friends to join them, and then you can get a 20% 
						commission. In this way, your team can spread quickly. Therefore, I hope everyone can use our platform to 
						make money, make money, and make money!When they make money, they will invite their friends to join them, 
						and then you can get a 20% commission. In this way, your team can spread quickly. Therefore, I hope everyone 
						can use our platform to make money, make money, and make money!Level 1 commission: Friends who join through 
						your own link belong to your level, when they trade, you will get 30% commission.Tier 2 commission: Friends 
						who join through your friend link belong to your secondary commission. When they trade, you can get 20% commission.
						Level 3 commission: Friends who join through friends of friends belong to your level 3. When they trade, you get 
						10% commission.Promotional rewards: 10% bonus amount for the first recharge after the first-level lower level joins. 
						If your friend joins through your invitation and recharges 1000 for the first time, you will get 200
					</p>
					<div data-v-5ac41059="" class="tz_close">
						<button data-v-5ac41059="" id="notclose">
							CLOSE
						</button>
					</div>
				</div>
			</div>
		</div>
		
		<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
		<script src="assets/js/app.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script>
			var dataDatatable = $('#inter').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": false,
				"info": true,
				"autoWidth": false,
				
			});
			
			$('#rowsPerPage').on('change', function() {
				let row = $("#rowsPerPage").val() 
				dataDatatable.page.len(row).draw();
			});
			
			document.getElementById("notinfo").addEventListener("click", function() {
				document.getElementById("notdetail").style.display = "";
			});
			document.getElementById("notclose").addEventListener("click", function() {
				document.getElementById("notdetail").style.display = "none";
			});
		</script>
	</body>
</html>