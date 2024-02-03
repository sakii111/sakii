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
	$user=mysqli_query($con,"select * from `tbl_complaints` where `userid`='".$userid."' ORDER BY ID DESC");
	$userRows=mysqli_num_rows($user);
	
	$usercomp=mysqli_query($con,"select * from `tbl_complaints` where `userid`='".$userid."' AND `status`='2' ORDER BY ID DESC");
	$usercompRows=mysqli_num_rows($usercomp);
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
			
			/*For adjusting form*/
			ul{
				margin-bottom: 0;
			}
			body{
				line-height: 1.15em;
			}
			
			#intercomp{
				width: 100%;
			}
			#intercompbody{
				padding: 0 0 5px;
			}
			#intercompdata{
				display: grid;
				padding: 10px 0;
				border-bottom: 1px solid #e8e8e8;
			}
			#comprowsperpage{
				-webkit-appearance: none;
				-moz-appearance: none;
				border: none;
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
					<span data-v-5ac41059="">Complaints &amp; Suggestions</span>
				</div>
				<div data-v-483dad1f="" class="right">
					<img data-v-483dad1f="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABnElEQVRoQ+2aMU4DMRBF/+
					+4AEKiTYM4AhVHoKGCAspQcgK4AB0oZZo0VNwAKrgBHRIVEuICUA2ytEFmkzCrib0Sq7+td8Yzb75teXaJgTwcSB5QIl0qaWb7AM6ad29IPnSxi7xTrSJmNgL
					wBGCzCewNwIjkZyRQz6ZmItdZNeZxjElOvKAi4zUTuQeQpJU/FyQvI4F6NkrEI2RmqogHadm4pOVRk7Q8QivGJS0PnKTlEZK0goQkrSA47VoeOEnLI9R112pu
					ducAdoM+c7P2faTEVfcZwBXJl3yiX2vEzPYA3GXX0wK5VHHxAeCA5OPcezuRZXeIKpEUcDojebwqkVsAhwUm6cPFhOR4VSJJ0zMA231EssYcqSNzlLeXFs4RM
					9sAcAJga42JkmmCstB8WNNnMn8HMG23lXQgemR1IHqEuh6IQT8LZqpIkKQWuwdO0vIIabEHCUlaQXDatTxwkpZHSLtWkNCQpLXs8/QpyWmQzZ9mNXet9g8Drw
					B2SH79q0RSsE17Kf+F46d9UzqZahUpHajnT4l4hPoe/wbmcuQzOS0vzQAAAABJRU5ErkJggg==" alt="" onclick="window.location.href='addcomplaints.php';">
				</div>
			</nav>
			<div data-v-483dad1f="" class="completed_box">
				<ul data-v-483dad1f="" class="completed_nav" style="margin-bottom: 0px;">
					<li data-v-483dad1f="" id="completedbut">COMPLETED</li>
					<li data-v-483dad1f="" id="waitbut">WAIT</li>
					<div data-v-483dad1f="" class="li_line" style="left: 20px;" id="slider"></div>
				</ul>
				<div data-v-483dad1f="" class="content_box" id="completedlist"><!---->
					<div data-v-483dad1f="" class="content">
						<div data-v-5ac41059="" class="recharge_box">
							<?php 
								if($usercompRows==0){
							?>
									<table data-v-5ac41059="" id="intercomp">
										<thead data-v-5ac41059="">
											<tr data-v-5ac41059="">
												<th data-v-5ac41059=""></th>
											</tr>
										</thead>
										<tbody data-v-5ac41059="" id="intercompbody">
											<tr data-v-5ac41059="" id="">
												<td data-v-5ac41059="">
													<p data-v-5ac41059="" class="null_data">
														No data available
													</p>
												</td>
											</tr>
										</tbody>
									</table>
							<?php 
								}
								else {
										$j = 1;
							?>
										<div data-v-5ac41059="" class="completed_list">
											<table data-v-5ac41059="" id="intercomp">
												<thead data-v-5ac41059="">
													<tr data-v-5ac41059="">
														<th data-v-5ac41059=""></th>
													</tr>
												</thead>
												<tbody data-v-5ac41059="" id="intercompbody">
										<?php 
											while($j <= $usercompRows){
											$usercompArray = mysqli_fetch_array($usercomp);
											$usercomptype = $usercompArray['type'];
											$usercompwhatsapp = $usercompArray['whatsapp'];
											$usercompserial = $usercompArray['serial'];
											$usercompcreatedate = $usercompArray['createdate'];
										?>
													<tr data-v-5ac41059="" id="intercompdata">
														<td data-v-5ac41059="">
															<div id="interpara"><span><?php echo $usercomptype; ?></span><span><?php echo $usercompcreatedate; ?></span></div>
															<div id="interpara"><span><?php echo $usercompwhatsapp; ?></span>
																<span>
																	<img data-v-483dad1f="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAA
																	AFuUlEQVRoQ+WZa4hVVRTH/9s7dy5mjhWIktr7QQXqFGT2IYxKkiS0KIj60HPMiQHvnbNO6hQZOWpn7ZkrSFNNzw9GUKRFhr0
																	gicik6AVF+eodiVBaDXLnznXFlnMuew73cc6Zexmx82nm7rXXWr+9zlpn77UVTpBHnSAc+H+AdHV1tbW2ts5XSl0xnpETkU+G
																	h4d3btq06e9qftSMCBE9DsAdTwjLtsfMDyYFeQHAnccJyIvMfFdSkNsAPA1g8jjD/ANgGTO/nAjETOrp6ZlRKBTON38rpT4IF
																	InI1c2Aq2Qjk8ns6e3t/a2WvchVi4jmAvjCUnYfMz/bSBgiuhfAM5bOdmb+MoqNyCDZbHZGS0vLr1GTL4rxsEy4uIyMjMzM5/
																	M1IxHoiAzS0dGRnjJlyrD1am3RWt+cxOFqcxzHeU0pdVMwfvjw4dbBwcFiFBuRQYwyItoL4Fxf8dfMPCeKkagyRPQVgNm+/D5
																	mPi/q3LggWwAs9ZUfaWlpOXP9+vUHoxqrJbdq1aqpIyMjPwGY6MttZeZydOrZiAsy6gOplHrA87yBekaijLuu2ykiTyTNwVgg
																	juMssMsjgB3M3JAyTESmtC+wy7vWekeURTAysUD8PBmTwUqONWKBYoO4rnu/iDxpOfQSM98RdeUqyRHRZgC3l0upUss9z3sqj
																	s7YIJ2dnSdPmjTJfKSC6gUR6dVaPxTHcCDrOM5apVSPNXff0NDQ3IGBgX/j6IsNYpQ7jvOIUmqNbUgpNcvzPPuDWdcP13Vnis
																	gvtqCIrNFaP1p3ckggEYifK88BuDukL/KWosKWx6h6npnviQuRKNltI0T0HoBrQyua1VpvrOWM4zgrlFL5kMz7zHxdEogxg/i
																	R2Q7g+pADrzNz8OEcNUREWwEsCcm/zcyLkkI0BKRazgA4xMynhiL4F4BTGpETYejEORJWVKkAAHiVmW/1I/cKgFuaAdGwiIRW
																	Xaz/DzDzdB/kDwDTgjFmbtgiNhxk9erV04rFonE4eMpbGCL6DMBlwUA6nZ6+bt26A2PJC3tuQ1eFiEa9PiKyRGv9RpU8epOZb
																	zzuQMIQAD5l5ssDRzs6Ok5qa2v7SCnVbjn/OzPPaARMQyJCRFkA/baDpVJpcX9/v33GRy6Xa0+lUtsAnB7Iish3WuuLxgozZh
																	AiMpXIvFLBcwTAOcxs50p5kIhM8u+3DlCmO7PR8zyzGImfMYFUgEDUakREdnUzG89Ee6yAPDGI4zizlVLv2iVVRK7UWu+Msqy
																	O45ie8sejKo9SCz3PM9ue2E9iECJ6B8BCy2KOmcP7p5oOVcitXSJyjdZ6KC5JIhAiYrObL4dVqbc8z1sc17iRd113m4jcYM3N
																	M3Murq7YIK7rXigipm2T8Y2NiMhVUV+psIP+K/YhgBZ/rKCUmuN53vdxYGKDENFjAMqnwWpJ2tXVlclkMvNtZwqFgrnjKFSAC
																	R/U1jLzw00DcV13sh+Ns30jh1KpVPuGDRt+tI06jjNPKWXaRJeGnPlcRDq11rvs31euXHlWqVQy35xgZ/yDHxXThY/0xIoIES
																	0HUO5jVav/VXbCxxyqFkHXdfMissLyupOZ7SZHTaC4IOaupMPSWPFo293dfbFSaqtS6gLbuojsFpGlfX1934a9qnD0HWTmZZH
																	CEbevFTra7mHmUY7aRrPZ7MRUKjXP/q1UKu3K5/Pmy1/xIaLdAI7dxQCIdfSNG5F9ZvthrKgxlNxqIKFSvJ+Zyy2nepGJDJLL
																	5WalUqmfLYV9zFz+ltQzFGWciDSA7kC2VCqd0d/fP6pdVE1PXRDTJS8Wi5f4URiXq7d0Ov1Nva5/TRC/Q24acVOjrGgTZQ6ah
																	mCtzn+9e/ZKrZsm+ltTddUW07G3pdbUCncW4wVhikvNu5iaINls9rR0Or3o6NGjka/AmkE6YcKEvcVicXs+n/8zcbI3w7Fm6K
																	xbtZphtBk6TxiQ/wDHlUNRXtkjKAAAAABJRU5ErkJggg==" alt="" 
																	style="height:20px; width:20px; position: relative; top: 15px;">
																</span>
															</div>
															<div id="interpara"><?php echo $usercompserial; ?></div>
														</td>
													</tr>
													
										<?php
											$j++;
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
													<select class="van-dropdown-menu__title" id="comprowsPerPage">
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
					</div>
				</div>
				<div data-v-483dad1f="" class="content_box" id="waitlist" style="display: none;"><!---->
					<div data-v-483dad1f="" class="content">
						<div data-v-5ac41059="" class="recharge_box">
							<?php 
								if($userRows==0){
							?>
									<table data-v-5ac41059="" id="inter">
										<thead data-v-5ac41059="">
											<tr data-v-5ac41059="">
												<th data-v-5ac41059=""></th>
											</tr>
										</thead>
										<tbody data-v-5ac41059="" id="interbody">
											<tr data-v-5ac41059="" id="">
												<td data-v-5ac41059="">
													<p data-v-5ac41059="" class="null_data">
														No data available
													</p>
												</td>
											</tr>
										</tbody>
									</table>
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
											$type = $userArray['type'];
											$whatsapp = $userArray['whatsapp'];
											$serial = $userArray['serial'];
											$createdate = $userArray['createdate'];
											$id = $userArray['id'];
											$outid = $userArray['outid'];
											$description = $userArray['description'];
										?>
													<tr data-v-5ac41059="" id="interdata" onclick="funkedit(<?php echo $id; ?>);">
														<td data-v-5ac41059="">
															<div id="interpara"><span name="t<?php echo $id; ?>" style="color: black;"><?php echo $type; ?></span><span name="c<?php echo $id; ?>" style="font-size: 12px;"><?php echo $createdate; ?></span></div>
															<div id="interpara"><span name="w<?php echo $id; ?>" style="color: black;">WhatsApp: <?php echo $whatsapp; ?></span>
																<span>
																	<img data-v-483dad1f="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAA
																	AFuUlEQVRoQ+WZa4hVVRTH/9s7dy5mjhWIktr7QQXqFGT2IYxKkiS0KIj60HPMiQHvnbNO6hQZOWpn7ZkrSFNNzw9GUKRFhr0
																	gicik6AVF+eodiVBaDXLnznXFlnMuew73cc6Zexmx82nm7rXXWr+9zlpn77UVTpBHnSAc+H+AdHV1tbW2ts5XSl0xnpETkU+G
																	h4d3btq06e9qftSMCBE9DsAdTwjLtsfMDyYFeQHAnccJyIvMfFdSkNsAPA1g8jjD/ANgGTO/nAjETOrp6ZlRKBTON38rpT4IF
																	InI1c2Aq2Qjk8ns6e3t/a2WvchVi4jmAvjCUnYfMz/bSBgiuhfAM5bOdmb+MoqNyCDZbHZGS0vLr1GTL4rxsEy4uIyMjMzM5/
																	M1IxHoiAzS0dGRnjJlyrD1am3RWt+cxOFqcxzHeU0pdVMwfvjw4dbBwcFiFBuRQYwyItoL4Fxf8dfMPCeKkagyRPQVgNm+/D5
																	mPi/q3LggWwAs9ZUfaWlpOXP9+vUHoxqrJbdq1aqpIyMjPwGY6MttZeZydOrZiAsy6gOplHrA87yBekaijLuu2ykiTyTNwVgg
																	juMssMsjgB3M3JAyTESmtC+wy7vWekeURTAysUD8PBmTwUqONWKBYoO4rnu/iDxpOfQSM98RdeUqyRHRZgC3l0upUss9z3sqj
																	s7YIJ2dnSdPmjTJfKSC6gUR6dVaPxTHcCDrOM5apVSPNXff0NDQ3IGBgX/j6IsNYpQ7jvOIUmqNbUgpNcvzPPuDWdcP13Vnis
																	gvtqCIrNFaP1p3ckggEYifK88BuDukL/KWosKWx6h6npnviQuRKNltI0T0HoBrQyua1VpvrOWM4zgrlFL5kMz7zHxdEogxg/i
																	R2Q7g+pADrzNz8OEcNUREWwEsCcm/zcyLkkI0BKRazgA4xMynhiL4F4BTGpETYejEORJWVKkAAHiVmW/1I/cKgFuaAdGwiIRW
																	Xaz/DzDzdB/kDwDTgjFmbtgiNhxk9erV04rFonE4eMpbGCL6DMBlwUA6nZ6+bt26A2PJC3tuQ1eFiEa9PiKyRGv9RpU8epOZb
																	zzuQMIQAD5l5ssDRzs6Ok5qa2v7SCnVbjn/OzPPaARMQyJCRFkA/baDpVJpcX9/v33GRy6Xa0+lUtsAnB7Iish3WuuLxgozZh
																	AiMpXIvFLBcwTAOcxs50p5kIhM8u+3DlCmO7PR8zyzGImfMYFUgEDUakREdnUzG89Ee6yAPDGI4zizlVLv2iVVRK7UWu+Msqy
																	O45ie8sejKo9SCz3PM9ue2E9iECJ6B8BCy2KOmcP7p5oOVcitXSJyjdZ6KC5JIhAiYrObL4dVqbc8z1sc17iRd113m4jcYM3N
																	M3Murq7YIK7rXigipm2T8Y2NiMhVUV+psIP+K/YhgBZ/rKCUmuN53vdxYGKDENFjAMqnwWpJ2tXVlclkMvNtZwqFgrnjKFSAC
																	R/U1jLzw00DcV13sh+Ns30jh1KpVPuGDRt+tI06jjNPKWXaRJeGnPlcRDq11rvs31euXHlWqVQy35xgZ/yDHxXThY/0xIoIES
																	0HUO5jVav/VXbCxxyqFkHXdfMissLyupOZ7SZHTaC4IOaupMPSWPFo293dfbFSaqtS6gLbuojsFpGlfX1934a9qnD0HWTmZZH
																	CEbevFTra7mHmUY7aRrPZ7MRUKjXP/q1UKu3K5/Pmy1/xIaLdAI7dxQCIdfSNG5F9ZvthrKgxlNxqIKFSvJ+Zyy2nepGJDJLL
																	5WalUqmfLYV9zFz+ltQzFGWciDSA7kC2VCqd0d/fP6pdVE1PXRDTJS8Wi5f4URiXq7d0Ov1Nva5/TRC/Q24acVOjrGgTZQ6ah
																	mCtzn+9e/ZKrZsm+ltTddUW07G3pdbUCncW4wVhikvNu5iaINls9rR0Or3o6NGjka/AmkE6YcKEvcVicXs+n/8zcbI3w7Fm6K
																	xbtZphtBk6TxiQ/wDHlUNRXtkjKAAAAABJRU5ErkJggg==" alt="" 
																	style="height:20px; width:20px; position: relative; top: 15px;">
																</span>
															</div>
															<div id="interpara" name="s<?php echo $id; ?>"><?php echo $serial; ?></div>
															<div id="interpara" name="o<?php echo $id; ?>" style="display: none;"><?php echo $outid; ?></div>
															<div id="interpara" name="d<?php echo $id; ?>" style="display: none;"><?php echo $description; ?></div>
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
					</div>
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
			<div data-v-483dad1f="" class="agree_zz" style="display: none;" id="popdetail">
				<div data-v-483dad1f="" class="wrapper">
					<p data-v-483dad1f="" class="agree_title">Detail</p>
					<div data-v-483dad1f="" class="input_card">
						<div data-v-483dad1f="" class="contents">
							<ul data-v-483dad1f="" class="card_ul">
								<li data-v-483dad1f="">
									<p data-v-483dad1f="">Type</p>
									<input data-v-483dad1f="" type="text" disabled="disabled" id="poptype" style="color: black;">
								</li>
								<li data-v-483dad1f="">
									<p data-v-483dad1f="">Out Id</p>
									<input data-v-483dad1f="" type="text" disabled="disabled" id="popoutid" style="color: black;">
								</li>
								<li data-v-483dad1f="">
									<p data-v-483dad1f="">WhatsApp</p>
									<input data-v-483dad1f="" type="text" disabled="disabled" id="popwhatsapp" style="color: black;">
								</li>
								<li data-v-483dad1f="">
									<p data-v-483dad1f="">Description</p>
									<textarea data-v-483dad1f="" name="" disabled="disabled" id="popdescription" style="color: black;"></textarea>
								</li>
								<p data-v-483dad1f="" class="tips">Waiting for reply</p>
							</ul>
						</div>
					</div>
					<div data-v-483dad1f="" class="close_btn">
						<button data-v-483dad1f="" id="popclose">CLOSE</button>
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
			
			var compDatatable = $('#intercomp').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": false,
				"info": true,
				"autoWidth": false,
				
			});
			
			$('#comprowsPerPage').on('change', function() {
				let row = $("#comprowsPerPage").val() 
				compDatatable.page.len(row).draw();
			});
			
			var waitbut = document.getElementById("waitbut");
			var completedbut = document.getElementById("completedbut");
			var slider = document.getElementById("slider");
			var completedlist = document.getElementById("completedlist");
			var waitlist = document.getElementById("waitlist");
			var loading = document.getElementById("loading");
			
			function hideload(){
				loading.style.display="none";
			}
			
			waitbut.addEventListener("click", function(event){
				slider.style.left = "48%";
				completedlist.style.display="none";
				waitlist.style.display="";
				loading.style.display="";
				setTimeout(hideload, 700);
			});
			completedbut.addEventListener("click", function(event){
				slider.style.left = "20px";
				completedlist.style.display="";
				waitlist.style.display="none";
				loading.style.display="";
				setTimeout(hideload, 700);
			});
			
			function funkedit(id){
				var t = "t"+id;
				var c = "c"+id;
				var w = "w"+id;
				var s = "s"+id;
				var o = "o"+id;
				var d = "d"+id;
				var type = document.getElementsByName(t)[0].innerHTML;
				var createdate = document.getElementsByName(c)[0].innerHTML;
				var whatsapp = document.getElementsByName(w)[0].innerHTML;
				var serial = document.getElementsByName(s)[0].innerHTML;
				var outid = document.getElementsByName(o)[0].innerHTML;
				var description = document.getElementsByName(d)[0].innerHTML;
				
				document.getElementById("poptype").value = type;
				document.getElementById("popoutid").value = outid;				
				document.getElementById("popwhatsapp").value = whatsapp;
				document.getElementById("popdescription").value = description;
				
				document.getElementById("popdetail").style.display = "";
			}
			
			var popclose = document.getElementById("popclose");
			popclose.addEventListener("click", function(event){
				document.getElementById("popdetail").style.display = "none";
			});
		</script>
	</body>
</html>