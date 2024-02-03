<?php 
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en" style="">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include 'head.php';?>
		<link rel="stylesheet" href="assets/css/style.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="assets/css/app.466ecb22.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="preload" as="style">
		<link href="assets/css/chunk-vendors.cf06751b.css" rel="stylesheet">
		<link href="assets/css/app.466ecb22.css" rel="stylesheet">
		<style>	
			/*For adjusting footer*/
			.appBottomMenu .item span{
				bottom: 4px;
			}
		</style>
		<style>
			body{
				background: #fff;
			}
			.recharge[data-v-08793c8d] {
				padding-bottom: 0px;
			}
			.shadow_box[data-v-08793c8d] {
				box-shadow: 0 0;
			}
			#myrecordparityt_paginate{
				display: none;
			}
			.nomore{
				border-bottom: 1px solid #a6a6a6;
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
			
			//For no more
			$today=date('Y-m-d');
			$category = "parity";
			$periodid = sprintf("%03d",gameid($con));
		?>
		<div data-v-08793c8d="" class="recharge">
			<div data-v-08793c8d="" class="shadow_box">
				<nav data-v-08793c8d="" class="top_nav">
					<div data-v-08793c8d="" class="left">
						<img data-v-08793c8d="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AW
						tpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZS
						JKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAO
						cxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerl
						qZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW
						0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg==" alt="" onClick="goBack();">
						<span data-v-08793c8d="">Orders</span>
					</div>
				</nav>
				<div data-v-08793c8d="" class="recharge_box">
					<ul data-v-08793c8d="" class="orders_nav">
						<li data-v-08793c8d="" class="active" id="allbut">
							ALL
						</li>
						<li data-v-08793c8d="" class="" id="undeliverbut">
							UNDELIVER
						</li>
						<li data-v-08793c8d="" class="" id="unreceivebut">
							UNRECEIVE
						</li>
						<li data-v-08793c8d="" class="" id="successbut">
							SUCCESS
						</li>
					</ul>
				</div>
			</div>
		</div>
		<input type="hidden" id="futureid" name="futureid" value="<?php echo sprintf("%03d",gameid($con));?>">
		<div data-v-5f666fee="" class="win" style="margin-bottom: 6px;">			
			<div data-v-5f666fee="" class="main" id="all">								
				<div id="parity" role="tabpanel"></div>
				<?php
				   $userWaitQuery=mysqli_query($con,"select * from `tbl_betting` where `userid`='".$userid."' and `tab`='".$category."' and `periodid`='".$periodid."' order by id desc limit 480");
				   $userResultr=mysqli_num_rows($userWaitQuery);
				   $userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' order by id desc limit 480");
				   $userResultQueryR=mysqli_num_rows($userResultQueryA);
				   if($userResultr!=0 && $userResultQueryR!=0){
				   ?>
						<div class="van-list__finished-text nomore">no more</div>
				<?php 
				   } else if($userResultr!=0){
				?>
						<div class="van-list__finished-text nomore">no more</div>
				<?php
				   } else if($userResultQueryR!=0){
				?>
						<div class="van-list__finished-text nomore">no more</div>
				<?php 
				   }
				?>
			</div>
			<div data-v-5f666fee="" class="main" id="undeliver" style="display:none;">
				<div data-v-5f666fee="" class="nav_content">
					<div data-v-5f666fee="" class="content">
						<div data-v-5f666fee="" class="content_con" style="margin: 0px; border:0px;">
							<div class="table-container">
								<table class="table table-borderless" style="margin: 6px 0px 0px 0px;">
									<thead style="display: none;"><tr><th></th></tr></thead>    
									<tbody>
									   <?php
									   $userWaitQuery=mysqli_query($con,"select * from `tbl_betting` where `userid`='".$userid."' and `tab`='".$category."' and `periodid`='".$periodid."' order by id desc limit 480");
									   $userResultr=mysqli_num_rows($userWaitQuery);
									   $userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' order by id desc limit 480");
									   $userResultQueryR=mysqli_num_rows($userResultQueryA);
									   if($userResultr==0){
									   ?>
										<div data-v-5f666fee="" class="parity">
											<p data-v-5f666fee="" style="font-size: 12px; text-align: center; padding: 15px 0px; color: rgb(136, 136, 136); border-bottom: 1px solid #a6a6a6; margin-top: 12px;">
												No data available
											</p>
										</div>
									  <?php }
									  while($userResult=mysqli_fetch_array($userWaitQuery)){
										$post_date1 = $userResult['createdate'];
										$post_date21 = strtotime($post_date1);
										$convert1=date('Y-m-d',$post_date21);
									  ?>
										<tr data-toggle="collapse" data-target="#accordion<?php echo($userResult['id']);?>" class="clickable" style="border-bottom: 1px solid #e0e0e0;">
											<td class="pl-3" style="border:none;">
												<div class="van-cell__title" style="padding-bottom: 15px;">
													<div data-v-5f666fee="" class="myParity_info">
														<span data-v-5f666fee="" class="timenum" style="font-weight: 400;"><?php echo ($userResult['periodid']);?></span><!----><!---->
														<span data-v-5f666fee="" class="waitcolor" style="font-weight: 400;">Wait</span><!----><!---->
														<span data-v-5f666fee="" class="waitcolor" style="font-weight: 400;"></span>
													</div>
												</div>
												
												<!--<div style="border-bottom: 1px; border-bottom-color: black; border-bottom-style: solid;"><div>-->
												
												<div id="accordion<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1" style="padding:0px;">
													<div class="van-collapse-item__wrapper" style="">
														<div class="van-collapse-item__content" style="padding:0px;">
															<div data-v-5f666fee="" class="myParity">
																<p data-v-5f666fee="" class="myParity_title">Period Detail</p>
																<ul data-v-5f666fee="">
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Period
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo ($userResult['periodid']);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Contract Money
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['amount'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Contract Count
																		</ol>
																		<ol data-v-5f666fee="">
																			1
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<?php $x=$userResult['amount']*2/100;?>
																		<ol data-v-5f666fee="">
																			Delivery
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="orange" style="font-weight: 400;"><?php echo number_format($userResult['amount']-$x,2);?></span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Fee
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($x,2);?>
																		</ol>
																	</li><!----><!---->
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Select
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" style="font-weight: 400; color: 
																				<?php 
																					if($userResult['value']=='Red'){
																						echo "rgb(244, 67, 54)";
																					}
																					else if($userResult['value']=='Violet'){
																						echo "rgb(156, 39, 176)";
																					}
																					else if($userResult['value']=='Green'){
																						echo "rgb(76, 175, 80)";
																					}
																					else{
																						echo "rgb(33, 150, 243)";
																					} 
																				?>;">
																				<?php echo $userResult['value'];?>
																			</span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Status
																		</ol>
																		<ol data-v-5f666fee=""><!----><!---->
																			<span data-v-5f666fee="" style="font-weight: 400;" class="waitcolor">Wait</span>
																		</ol>
																	</li><!---->
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Create Time
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo $convert1;?>
																		</ol>
																	</li>
																	
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">Type</ol>
																		<ol data-v-5f666fee="">Parity</ol>
																	</li>
																</ul>
																<div data-v-5f666fee="" class="myParity_btn">
																	<button data-v-5f666fee="">Pre Pay</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<?php }?>			
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php
				   $userWaitQuery=mysqli_query($con,"select * from `tbl_betting` where `userid`='".$userid."' and `tab`='".$category."' and `periodid`='".$periodid."' order by id desc limit 480");
				   $userResultr=mysqli_num_rows($userWaitQuery);
				   $userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' order by id desc limit 480");
				   $userResultQueryR=mysqli_num_rows($userResultQueryA);
				   if($userResultr!=0 && $userResultQueryR!=0){
				   ?>
						<div class="van-list__finished-text nomore">no more</div>
				<?php 
				   } else if($userResultr!=0){
				?>
						<div class="van-list__finished-text nomore">no more</div>
				<?php
				   }
				?>
			</div>
			<div data-v-5f666fee="" class="main" id="unreceive" style="display:none;">								
				<div data-v-5f666fee="" class="nav_content">
					<div data-v-5f666fee="" class="content">
						<div data-v-5f666fee="" class="content_con" style="margin: 0px; border:0px;">
							<?php 
								$userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' and `status`='fail' order by id desc limit 480");
								$userResultQueryR=mysqli_num_rows($userResultQueryA);
								if($userResultQueryR>=1){													
							?>
							<div class="table-container">
							<table class="table table-borderless" style="margin: 0px; margin-top: 12px; margin-bottom: 0px;" id="myrecordparityt">
								<thead style="display: none;"><tr><th></th></tr></thead>
								<tbody>
									
									<?php
										$userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' and `status`='fail' order by id desc limit 480");
										while($userResult=mysqli_fetch_array($userResultQuery)){
										$post_date = $userResult['createdate'];
										$post_date2 = strtotime($post_date);
										$convert=date('Y-m-d H:i',$post_date2);
									?>
										<tr data-toggle="collapse" data-target="#accordion<?php echo($userResult['id']);?>" class="clickable" style="border-bottom: 1px solid #e0e0e0;;">
											<td class="pl-3" style="border:none;">
												<div class="van-cell__title" style="padding-bottom: 15px;">
													<div data-v-5f666fee="" class="myParity_info">
														<span data-v-5f666fee="" class="timenum" style="font-weight: 400;"><?php echo ($userResult['periodid']);?></span><!----><!---->
														<span data-v-5f666fee="" class="success" style="font-weight: 400; color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>"><?php echo ucfirst($userResult['status']);?></span><!----><!---->
														<span data-v-5f666fee="" class="success" style="font-weight: 400; color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";}?><?php echo number_format($userResult['paidamount'],2);?></span>
													</div>
												</div>
												
												<!--<div style="border-bottom: 1px; border-bottom-color: black; border-bottom-style: solid;"><div>-->
												
												<div id="accordion<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1" style="padding:0px;">
													<div class="van-collapse-item__wrapper" style="">
														<div class="van-collapse-item__content" style="padding:0px;">
															<div data-v-5f666fee="" class="myParity">
																<p data-v-5f666fee="" class="myParity_title">Period Detail</p>
																<ul data-v-5f666fee="">
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Period
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo ($userResult['periodid']);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Contract Money
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['amount'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Contract Count
																		</ol>
																		<ol data-v-5f666fee="">
																			1
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Delivery
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="orange" style="font-weight: 400;"><?php echo number_format($userResult['amount']-$userResult['fee'],2);?></span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Fee
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['fee'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Open Price
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['openprice'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Result
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="bluecolor" style="font-weight: 400;">
																				<?php echo $userResult['resultnumber']; ?>
																			</span>
																			<span data-v-5f666fee="" style="font-weight: 400; color: 
																				<?php 
																					if($userResult['resultcolor']=='red'){
																						echo "rgb(244, 67, 54)";
																					}
																					else if($userResult['resultcolor']=='green'){
																						echo "rgb(76, 175, 80)";
																					}
																					else{
																						echo "rgb(156, 39, 176)";
																					} 
																				?>;">
																				<?php $tt=explode("+",$userResult['resultcolor']); echo implode(",",$tt);?>
																			</span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Select
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" style="color:
																				<?php 
																					if($userResult['value']=='Red'){
																						echo "rgb(244, 67, 54)";
																					}
																					else if($userResult['value']=='Violet'){
																						echo "rgb(156, 39, 176)";
																					}
																					else if($userResult['value']=='Green'){
																						echo "rgb(76, 175, 80)";
																					}
																					else{
																						echo "rgb(33, 150, 243)";
																					} 
																				?>; font-weight: 400;">
																				<?php echo $userResult['value'];?>
																			</span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Status
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="success" style="color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>;">
																				<?php echo ucfirst($userResult['status']);?>
																			</span><!----><!---->
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Amount
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="success" style="color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>;">
																				<?php if($userResult['status']=='success'){echo"+";}else{echo"-";} echo number_format($userResult['paidamount'],2);?>
																			</span><!----><!---->
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Create Time
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo $convert;?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Type
																		</ol>
																		<ol data-v-5f666fee="">
																			Parity
																		</ol>
																	</li>
																</ul>
																<div data-v-5f666fee="" class="myParity_btn">
																	<button data-v-5f666fee="">Pre Pay</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							</div>
							<div class="van-list__finished-text nomore" style="margin-top: 5px;">no more</div>
							<?php } 
								else{ 
							?>
								<div data-v-5f666fee="" class="parity">
									<p data-v-5f666fee="" style="font-size: 12px; text-align: center; padding: 15px 0px; color: rgb(136, 136, 136); border-bottom: 1px solid #a6a6a6; margin-top: 12px;">
										No data available
									</p>
								</div>
							<?php 
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div data-v-5f666fee="" class="main" id="success" style="display:none;">								
				<div data-v-5f666fee="" class="nav_content">
					<div data-v-5f666fee="" class="content">
						<div data-v-5f666fee="" class="content_con" style="margin: 0px; border:0px;">
							<?php 
								$userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' and `status`='success' order by id desc limit 480");
								$userResultQueryR=mysqli_num_rows($userResultQueryA);
								if($userResultQueryR>=1){													
							?>
							<div class="table-container">
							<table class="table table-borderless" style="margin: 0px; margin-top: 12px; margin-bottom: 0px;" id="myrecordparityt">
								<thead style="display: none;"><tr><th></th></tr></thead>
								<tbody>
									
									<?php
										$userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' and `status`='success' order by id desc limit 480");
										while($userResult=mysqli_fetch_array($userResultQuery)){
										$post_date = $userResult['createdate'];
										$post_date2 = strtotime($post_date);
										$convert=date('Y-m-d H:i',$post_date2);
									?>
										<tr data-toggle="collapse" data-target="#accordion<?php echo($userResult['id']);?>" class="clickable" style="border-bottom: 1px solid #e0e0e0;;">
											<td class="pl-3" style="border:none;">
												<div class="van-cell__title" style="padding-bottom: 15px;">
													<div data-v-5f666fee="" class="myParity_info">
														<span data-v-5f666fee="" class="timenum" style="font-weight: 400;"><?php echo ($userResult['periodid']);?></span><!----><!---->
														<span data-v-5f666fee="" class="success" style="font-weight: 400; color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>"><?php echo ucfirst($userResult['status']);?></span><!----><!---->
														<span data-v-5f666fee="" class="success" style="font-weight: 400; color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";}?><?php echo number_format($userResult['paidamount'],2);?></span>
													</div>
												</div>
												
												<!--<div style="border-bottom: 1px; border-bottom-color: black; border-bottom-style: solid;"><div>-->
												
												<div id="accordion<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1" style="padding:0px;">
													<div class="van-collapse-item__wrapper" style="">
														<div class="van-collapse-item__content" style="padding:0px;">
															<div data-v-5f666fee="" class="myParity">
																<p data-v-5f666fee="" class="myParity_title">Period Detail</p>
																<ul data-v-5f666fee="">
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Period
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo ($userResult['periodid']);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Contract Money
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['amount'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Contract Count
																		</ol>
																		<ol data-v-5f666fee="">
																			1
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Delivery
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="orange" style="font-weight: 400;"><?php echo number_format($userResult['amount']-$userResult['fee'],2);?></span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Fee
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['fee'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Open Price
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo number_format($userResult['openprice'],2);?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Result
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="bluecolor" style="font-weight: 400;">
																				<?php echo $userResult['resultnumber']; ?>
																			</span>
																			<span data-v-5f666fee="" style="font-weight: 400; color: 
																				<?php 
																					if($userResult['resultcolor']=='red'){
																						echo "rgb(244, 67, 54)";
																					}
																					else if($userResult['resultcolor']=='green'){
																						echo "rgb(76, 175, 80)";
																					}
																					else{
																						echo "rgb(156, 39, 176)";
																					} 
																				?>;">
																				<?php $tt=explode("+",$userResult['resultcolor']); echo implode(",",$tt);?>
																			</span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Select
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" style="color:
																				<?php 
																					if($userResult['value']=='Red'){
																						echo "rgb(244, 67, 54)";
																					}
																					else if($userResult['value']=='Violet'){
																						echo "rgb(156, 39, 176)";
																					}
																					else if($userResult['value']=='Green'){
																						echo "rgb(76, 175, 80)";
																					}
																					else{
																						echo "rgb(33, 150, 243)";
																					} 
																				?>; font-weight: 400;">
																				<?php echo $userResult['value'];?>
																			</span>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Status
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="success" style="color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>;">
																				<?php echo ucfirst($userResult['status']);?>
																			</span><!----><!---->
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Amount
																		</ol>
																		<ol data-v-5f666fee="">
																			<span data-v-5f666fee="" class="success" style="color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>;">
																				<?php if($userResult['status']=='success'){echo"+";}else{echo"-";} echo number_format($userResult['paidamount'],2);?>
																			</span><!----><!---->
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Create Time
																		</ol>
																		<ol data-v-5f666fee="">
																			<?php echo $convert;?>
																		</ol>
																	</li>
																	<li data-v-5f666fee="">
																		<ol data-v-5f666fee="">
																			Type
																		</ol>
																		<ol data-v-5f666fee="">
																			Parity
																		</ol>
																	</li>
																</ul>
																<div data-v-5f666fee="" class="myParity_btn">
																	<button data-v-5f666fee="">Pre Pay</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							</div>
							<div class="van-list__finished-text nomore" style="margin-top: 5px;">no more</div>
							<?php } 
								else{ 
							?>
								<div data-v-5f666fee="" class="parity">
									<p data-v-5f666fee="" style="font-size: 12px; text-align: center; padding: 15px 0px; color: rgb(136, 136, 136); border-bottom: 1px solid #a6a6a6; margin-top: 12px;">
										No data available
									</p>
								</div>
							<?php 
								}
							?>
						</div>
					</div>
				</div>
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
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function () {  
			var x = setInterval(function() { 
			start_count_down();  
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
			
		function waitlist(category,userid,containerid){
			var inputgameid=$("#futureid").val();
				$.ajax({
				type: "Post",
				data:"category=" + category+ "& userid=" + userid +"& periodid=" + inputgameid,
				url: "getwaitlistOrder.php",
				success: function (html) {
					document.getElementById(containerid).innerHTML=html;
					},
				  error: function (e) {}
				  });
		}
			
		function start_count_down() {
			$(".showload").hide();
			$(".none").show();
			var countDownDate = Date.parse(new Date) / 1e3;
			  var now = new Date().getTime();
			  var distance = 180 - countDownDate % 180;
			  var i = distance / 60,
			   n = distance % 60,
			   o = n / 10,
			   s = n % 10;
			  var minutes = Math.floor(i);
			  var seconds = ('0'+Math.floor(n)).slice(-2);
			  var firstDigit = seconds.charAt(0);
			  var secondDigit = seconds.charAt(1);
			if(distance==180 || distance==175 || distance==170 || distance==165 || distance==160){
				generateGameid();
				getResultbyCategory('parity','parity');
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
				 var arr = html.split('~');
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
			url: "getResultbyCategoryOrder.php",
			success: function (html) {
			 document.getElementById(containerid).innerHTML=html;
			 waitlist('parity',<?php echo $userid;?>,'paritywait');
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
			  "paging": false,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": false,
			  "info": false,
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
			
			document.getElementById("undeliverbut").addEventListener("click", function() {
				document.getElementById("all").style.display = "none";
				document.getElementById("undeliver").style.display = "";
				document.getElementById("unreceive").style.display = "none";
				document.getElementById("success").style.display = "none";
				
				document.getElementById("allbut").classList.remove("active");
				document.getElementById("unreceivebut").classList.remove("active");
				document.getElementById("successbut").classList.remove("active");
				document.getElementById("undeliverbut").classList.add("active");
			});	
			
			document.getElementById("allbut").addEventListener("click", function() {
				document.getElementById("all").style.display = "";
				document.getElementById("undeliver").style.display = "none";
				document.getElementById("unreceive").style.display = "none";
				document.getElementById("success").style.display = "none";
				
				document.getElementById("undeliverbut").classList.remove("active");
				document.getElementById("unreceivebut").classList.remove("active");
				document.getElementById("successbut").classList.remove("active");
				document.getElementById("allbut").classList.add("active");
			});

			document.getElementById("unreceivebut").addEventListener("click", function() {
				document.getElementById("unreceive").style.display = "";
				document.getElementById("undeliver").style.display = "none";
				document.getElementById("all").style.display = "none";
				document.getElementById("success").style.display = "none";
				
				document.getElementById("undeliverbut").classList.remove("active");
				document.getElementById("allbut").classList.remove("active");
				document.getElementById("successbut").classList.remove("active");
				document.getElementById("unreceivebut").classList.add("active");
			});	
			
			document.getElementById("successbut").addEventListener("click", function() {
				document.getElementById("success").style.display = "";
				document.getElementById("undeliver").style.display = "none";
				document.getElementById("all").style.display = "none";
				document.getElementById("unreceive").style.display = "none";
				
				document.getElementById("undeliverbut").classList.remove("active");
				document.getElementById("allbut").classList.remove("active");
				document.getElementById("unreceivebut").classList.remove("active");
				document.getElementById("successbut").classList.add("active");
			});	
		</script>
	</body>