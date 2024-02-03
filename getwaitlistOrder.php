<?php
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}

include("include/connection.php");
$category=$_POST['category'];
$userid=$_SESSION['frontuserid'];
$periodid=$_POST['periodid'];
$today=date('Y-m-d');
if($category!='')
{?>
        
        <div class="table-container">
			<table class="table table-borderless" style="margin: 6px 0px 0px 0px;">
				<thead style="display: none;"><tr><th></th></tr></thead>    
				<tbody>
				   <?php
				   $userWaitQuery=mysqli_query($con,"select * from `tbl_betting` where `userid`='".$userid."' and `tab`='".$category."' and `periodid`='".$periodid."' order by id desc limit 480");
				   $userResultr=mysqli_num_rows($userWaitQuery);
				   $userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' order by id desc limit 480");
				   $userResultQueryR=mysqli_num_rows($userResultQueryA);
				   if($userResultr==0 && $userResultQueryR==0){
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
        
	
<?php }?>