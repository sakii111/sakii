<?php
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}

include("include/connection.php");
$category=$_POST['category'];
$userid=$_SESSION['frontuserid'];
$today=date('Y-m-d');
if($category=='parity')
{?>
        
    <div data-v-5f666fee="" class="nav_content">
		<div data-v-5f666fee="" class="content">
			<div data-v-5f666fee="" class="content_con" style="margin: 0px; border: 0px;">
				<div data-v-5f666fee="" class="content_title">
					<img data-v-5f666fee="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAADF0lEQVRoQ+1aO2gUURQ9Nx8mYC
					fYiR+w0EbsTMD4qyVqwA/aGBG7FUdm3jYBYxOYeS+OmE6IBoL4Az9gk8L4BbVSUlkIiXY2dkKEZK9MSGR8O7PzdXeKmXLn3nvOub/d91hCwse2bU5oWqiZlJKSBEx
					k5AeqhCRJZwubqiJRySl9a3WKYM6Oa3KnSkjRKc0Zr6pIzgQW7h5akbDd3alZSsqlElJ4b0QETFORTwD2BON0dXVtdRzne/CzsrRWvV7f0mg0vmm6P/utdQfAOU3I
					oOM470oqZF+j0XirCZn2hQgAjvbikZTyZBmF2Lb9EMAJjW+dhBBDzPxMb1EiOu+6rl+t1acMrSWEGGHm2yFcj66eRyzLek1E+zWDX8x8RCn1qgxCLMs6SETPAWwI8
					mTmN0qpA+tCjhPR45DFsUBEV1zXfdrJigghjjHzdQDbdY7MPKyUevL3hGjb9n0ApyK2oD9cg+1auRpOK+wHUsrTvv1fIUKIfmZ+3yGymWCJaMB13Q//CFmblb1EdA
					vA7kyR2+c0z8wXlVIf1yGbLh9M09zY09NzE8DZ9vFKhXR3eXn5kud5P4NekbcolmVdBXA4ZJulQi3K2N9OAOaUUtfCYsZeB5mmuaO7u/vQmqjVwWrXw8z+AppbWVl
					56Xne11a4sUKCzrZtLwDY1iYhi1LKpnUbhZ1KSNQ36/8Qpv+yiMNIJaRWqxl9fX1f2lCVxaWlpZ2Tk5O/4wREbq04R38JENFYnF2e98w8FjXUhbTWehAhhMfMl/OQ
					jSREdMN1XTNt7FStpQ1+0zkmLXiI/bSUciRLnMxCfLCwQ1kWEr4PM08ppS5k9c8lxAe1LOsMEY0C2JWFBDPPMrM3MTExm8U/87CHgdVqtU2GYYwS0TCAzQkJvWDme
					0qpqYT2Lc1yVyQY3V/PhmEMEFE/gAEAQxr6PICZ3t7emfHx8R9FCCi0ImGEwtZ0lrWaVGyhFQmCVkKSlkCzqyoSl7iqteIyFPG+aq24xFWtFZehqrVaZKjoa9Skf9
					cIo5Rr2CshEVWuKhK8xM6yLMrUWn8AMZSO49QGBtUAAAAASUVORK5CYII=" alt="">
					<p data-v-5f666fee="">Parity Record</p>
				</div>
				<div data-v-5f666fee="" class="parity">
					<table data-v-5f666fee="" id="parityt">
						<thead data-v-5f666fee="">
							<tr data-v-5f666fee="">
								<th data-v-5f666fee="">Period</th>
								<th data-v-5f666fee="">Price</th>
								<th data-v-5f666fee="">Number</th>
								<th data-v-5f666fee="">Result</th>
							</tr>
							<tr data-v-5f666fee="" style="border: 0px; width: 100%; display: none;">
								<th data-v-5f666fee="" colspan="4" style="height: 0px; line-height: 0;">
									<div data-v-5f666fee="" class="table_loading">
										<div data-v-5f666fee="" class="v-progress-linear__bar">
											<div data-v-5f666fee="" class="
											v-progress-linear__bar__indeterminate
											v-progress-linear__bar__indeterminate--active
											">
												<div data-v-5f666fee="" class="
												v-progress-linear__bar__indeterminate
												long
												primary
												"></div>
												<div data-v-5f666fee="" class="
												v-progress-linear__bar__indeterminate
												short
												primary
												"></div>
											</div>
										</div>
									</div>
								</th>
							</tr>
						</thead>
						<tbody data-v-5f666fee="">
							<?php
								$parityrecordQuery=mysqli_query($con,"select * from `tbl_result` where `tabtype`='parity' order by id desc limit 480");
								$parityrecordRow=mysqli_num_rows($parityrecordQuery);
								if($parityrecordRow==''){
							?>
								<tr data-v-5f666fee="">
									<td data-v-5f666fee="">No data available</td>
								</tr>
							<?php 
								}else{
									while($parityResult=mysqli_fetch_array($parityrecordQuery)){
										if($parityResult['resulttype']=='real'){
							?>
											<tr data-v-5f666fee="">
												<td data-v-5f666fee=""><?php echo $parityResult['periodid'];?></td>
												<td data-v-5f666fee=""><?php echo $parityResult['randomprice'];?></td>
												<td data-v-5f666fee=""><span style="color:<?php if($parityResult['color']=='green'){echo"#1DCC70";}else if($parityResult['color']=='red'){echo"#ff2d55";}else if($parityResult['color']=='red+violet'){echo"#ff2d55";}else if($parityResult['color']=='green+violet'){echo"#1DCC70";}?>;"><?php echo $parityResult['result'];?></span></td>
												<td data-v-5f666fee="">
													<?php if($parityResult['color']=='green'){ ?>
														<span data-v-5f666fee="" class="red" style="background: rgb(76, 175, 80);"></span>
													<?php }else if($parityResult['color']=='red'){?>
														<span data-v-5f666fee="" class="red" style="background: rgb(244, 67, 54);"></span>
													<?php }else if($parityResult['color']=='red+violet'){?>
														<span data-v-5f666fee="" class="red" style="background: rgb(244, 67, 54);"></span>
														<span data-v-5f666fee="" class="red" style="background: rgb(156, 39, 176);"></span>
													<?php }else if($parityResult['color']=='green+violet'){?>
														<span data-v-5f666fee="" class="red" style="background: rgb(76, 175, 80);"></span>
														<span data-v-5f666fee="" class="red" style="background: rgb(156, 39, 176);"></span>
													<?php }?>
												</td>
											</tr>
										<?php }else if($parityResult['resulttype']=='random'){?>
											<tr data-v-5f666fee="">
												<td data-v-5f666fee=""><?php echo $parityResult['periodid'];?></td>
												<td data-v-5f666fee=""><?php echo $parityResult['randomprice'];?></td>
												<td data-v-5f666fee=""><span style="color:<?php if($parityResult['randomcolor']=='green'){echo"#1DCC70";}else if($parityResult['randomcolor']=='red'){echo"#ff2d55";}else if($parityResult['randomcolor']=='red++violet'){echo"#ff2d55";}else if($parityResult['randomcolor']=='green++violet'){echo"#1DCC70";}?>;"><?php echo $parityResult['randomresult'];?></span></td>
												<td data-v-5f666fee="">
													<?php if($parityResult['randomcolor']=='green'){ ?>
														<span data-v-5f666fee="" class="red" style="background: rgb(76, 175, 80);"></span>
													<?php }else if($parityResult['randomcolor']=='red'){?>
														<span data-v-5f666fee="" class="red" style="background: rgb(244, 67, 54);"></span>
													<?php }else if($parityResult['randomcolor']=='red++violet'){?>
														<span data-v-5f666fee="" class="red" style="background: rgb(244, 67, 54);"></span>
														<span data-v-5f666fee="" class="red" style="background: rgb(156, 39, 176);"></span>
													<?php }else if($parityResult['randomcolor']=='green++violet'){?>
														<span data-v-5f666fee="" class="red" style="background: rgb(76, 175, 80);"></span>
														<span data-v-5f666fee="" class="red" style="background: rgb(156, 39, 176);"></span>
													<?php }?>
												</td>
											</tr>
										<?php }?>
									<?php }
								}?>
						</tbody>
					</table>
				</div>
				<div data-v-5f666fee="" class="content_con" style="margin: 0px; border:0px;">
					<div data-v-5f666fee="" class="content_title">
						<img data-v-5f666fee="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB6ElEQVRoQ+2asUoDQRCGZyBPYKeV1r6EPoKgQsBGIYK
						N1Y1CGrU7bg4uYGvAxiCm8Q2Sh7ASCytLsRNygZGDPTkuF3PLJZtzs6nCMMPONzP7J3t7CJZ80BIOcCB16+TMjniet1OHpMMwHP6Vx1QQIroAgDMA2KwDiIi8AkAvDMObonwKQYioCwAnd
						QAoyOGQmft5+wRIu91ej+P4o6YQSVrvzLw1EyTZE4g4SB1F5LoOUIj4m4eI7Ob3zERHikCmzaUpQM/zrhxIdrRcR+Y0e2608qpVNFqqSqcAMBiPx60oir6TBmTsG7oNEZFuo9Hwfd9/y8Y
						utCNE9AIA22rBO2ZuJd9zdl2WxP+cmW9NgvQAoKkWPGbmewWStWuDIOJeEATPJkGaIrKPiMNsBYkota/pUiBifzQa9TqdzpcxEN0kq/gvdI9USUw31oGUkV/dqlbxdx0p05GMOs1VteI4f
						oyi6NOYahHREwAcqAUvmTlQvyNZu/ZEIeJREAQPDiStQNmDlTWjpT0zFQKcapVRrQoF1g51HVmpjixKtYz/jSciaw5Wdhx1rXn4oK2hFQKc/K6U/FaYFO1QN1pWXPRYc/Wmjqv//zI03Yl
						WXE/nDv7/+4UBbY1ccsDMVziWnF/p5R1I6VIZcvwBChr8Ue16BMAAAAAASUVORK5CYII=" alt="">
						<p data-v-5f666fee="">My Record</p>
					</div>
					<div id="paritywait"></div> <!-- Brought it out of table beneath -->
					<?php 
						$userResultQueryA=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' order by id desc limit 480");
						$userResultQueryR=mysqli_num_rows($userResultQueryA);
						if($userResultQueryR>=1){													
					?>
					<div class="table-container">
					<table class="table table-borderless" style="margin: 0px; margin-top: 0px; margin-bottom: 0px;" id="myrecordparityt">
						<thead style="display: none;"><tr><th></th></tr></thead>
						<tbody>
							
							<?php
								$userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='parity' and date(`createdate`)='".$today."' order by id desc limit 480");
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
																	<span data-v-5f666fee="" class="success" style="color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>; font-weight: 400;">
																		<?php echo ucfirst($userResult['status']);?>
																	</span><!----><!---->
																</ol>
															</li>
															<li data-v-5f666fee="">
																<ol data-v-5f666fee="">
																	Amount
																</ol>
																<ol data-v-5f666fee="">
																	<span data-v-5f666fee="" class="success" style="color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>; font-weight: 400;">
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
					<?php } ?>
				</div>
			</div>
		</div>
	</div>    
	
<?php }
else if($category=='sapre')
{?>
	    <div class="containerrecord text-center">
        <a href="gamedashboard.php" class="recordlink">
    <p> <i class="icon ion-md-trophy"></i> <div class="title">Sapre Record</div> </p>
    </a>
        </div>
        <div class="table-container">
        <table class="table table-borderless table-hover text-center" id="sapret">
        <thead>
        <tr>
        <th>Period</th>
        <th>Price</th>
        <th>Number</th>
        <th>Result</th>
        </tr>
        </thead>
        <tbody>
        <?php
 $saprerecordQuery=mysqli_query($con,"select * from `tbl_result` where `tabtype`='sapre' order by id desc limit 480");
 $saprerecordRow=mysqli_num_rows($saprerecordQuery);
 if($saprerecordRow==''){?>
 <tr>
        <td colspan="4">
        <div style="display: flex;">
        <div class="spacer"></div>
        <div>No data available !</div>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php 
		}else{
		while($sapreResult=mysqli_fetch_array($saprerecordQuery)){
			if($sapreResult['resulttype']=='real'){
			?>
        <tr>
        <td><?php echo $sapreResult['periodid'];?></td>
        <td><?php echo $sapreResult['randomprice'];?></td>
        <td><span style="color:<?php if($sapreResult['color']=='green'){echo"#1DCC70";}else if($sapreResult['color']=='red'){echo"#ff2d55";}else if($sapreResult['color']=='red+violet'){echo"#ff2d55";}else if($sapreResult['color']=='green+violet'){echo"#1DCC70";}?>;"><?php echo $sapreResult['result'];?></span></td>
        <td>
        <div style="display: flex;">
        <div class="spacer"></div>
        <?php if($sapreResult['color']=='green'){ ?>
        <div class="point green" style="background:#1DCC70;"></div>
        <?php }else if($sapreResult['color']=='red'){?>
        <div class="point red" style="background:#ff2d55;"></div>
        <?php }else if($sapreResult['color']=='red+violet'){?>
         <div class="point" style="background:#ff2d55;"></div>&nbsp;
        <div class="point" style="background:#9c27b0;"></div>
 <?php }else if($sapreResult['color']=='green+violet'){?>
 <div class="point" style="background:#1DCC70;"></div>&nbsp;
         <div class="point" style="background:#9c27b0;"></div>
        <?php }?>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php }else if($sapreResult['resulttype']=='random'){?>
        <tr>
        <td><?php echo $sapreResult['periodid'];?></td>
        <td><?php echo $sapreResult['randomprice'];?></td>
        <td><span style="color:<?php if($sapreResult['randomcolor']=='green'){echo"#1DCC70";}else if($sapreResult['randomcolor']=='red'){echo"#ff2d55";}else if($sapreResult['randomcolor']=='red++violet'){echo"#ff2d55";}else if($sapreResult['randomcolor']=='green++violet'){echo"#1DCC70";}?>;"><?php echo $sapreResult['randomresult'];?></span></td>
        <td>
        <div style="display: flex;">
        <div class="spacer"></div>
        <?php if($sapreResult['randomcolor']=='green'){ ?>
        <div class="point green" style="background:#1DCC70;"></div>
        <?php }else if($sapreResult['randomcolor']=='red'){?>
        <div class="point red" style="background:#ff2d55;"></div>
        <?php }else if($sapreResult['randomcolor']=='red++violet'){?>
         <div class="point" style="background:#ff2d55;"></div>&nbsp;
        <div class="point" style="background:#9c27b0;"></div>
 <?php }else if($sapreResult['randomcolor']=='green++violet'){?>
 <div class="point" style="background:#1DCC70;"></div>&nbsp;
         <div class="point" style="background:#9c27b0;"></div>
        <?php }?>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php }?>
        <?php }}?>
         </tbody>
          </table>
        </div>
        <div class="containerrecord text-center mt-1">
        <a href="#" class="recordlink">
    <p> <i class="icon ion-md-paper"></i> <div class="title">My Sapre Record</div> </p>
    </a>
        </div>
        <div class="table-container">
        <table class="table table-borderless" id="myrecordsapret">
        <thead><tr><th></th></tr></thead>    
    <tbody>
        <div id="saprewait"></div>
    <?php
  $userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='sapre' and date(`createdate`)='".$today."' order by id desc limit 480");
  while($userResult=mysqli_fetch_array($userResultQuery)){
	  $post_date = $userResult['createdate'];
 $post_date2 = strtotime($post_date);
 $convert=date('Y-m-d H:i',$post_date2);

	?>
        <tr data-toggle="collapse" data-target="#accordionsapre<?php echo($userResult['id']);?>" class="clickable" style="border-bottom:1px solid #ccc;">
            <td class="pl-3" style="border:none;">
            <?php echo ($userResult['periodid']);?> <span style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>"> <?php echo ucfirst($userResult['status']);?> <?php if($userResult['status']=='success'){echo"+";}else{echo"-";}?><?php echo number_format($userResult['paidamount'],2);?></span>
            <div id="accordionsapre<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1 p-1" style="padding:0px 30px;">
                <span style="color:#1DCC70"> Period Detail</span>
         <div class="mt-1" style="display: flex;">
        <div class="point2">Periodid</div>
        <div class="point2"><?php echo ($userResult['periodid']);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Contract Money</div>
        <div class="point2"><?php echo number_format($userResult['amount'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Contract Count</div>
        <div class="point2">1</div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Delivery</div>
        <div class="point2"><?php echo number_format($userResult['amount']-$userResult['fee'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Fee</div>
        <div class="point2"><?php echo number_format($userResult['fee'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Open Price</div>
        <div class="point2"><?php echo number_format($userResult['openprice'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Result</div>
        <div class="point2" style="color:#1DCC70"><?php echo $userResult['resultnumber'].' ';
		$tt=explode("+",$userResult['resultcolor']); echo ucwords(implode(" + ",$tt));?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Select</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>"><?php echo $userResult['value'];?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Status</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php echo ucfirst($userResult['status']);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Amount</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";} echo number_format($userResult['paidamount'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Create Time</div>
        <div class="point2"><?php echo $convert;?></div>
        </div>
                </div>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
        </div>

<?php	
}else if($category=='bcone')
{
?>
<div class="containerrecord text-center">
        <a href="gamedashboard.php" class="recordlink">
    <p> <i class="icon ion-md-trophy"></i> <div class="title">Bcone Record</div> </p>
    </a>
        </div>        
        <div class="table-container">
        <table class="table table-borderless table-hover text-center" id="bconet">
        <thead>
        <tr>
        <th>Period</th>
        <th>Price</th>
        <th>Number</th>
        <th>Result</th>
        </tr>
        </thead>
        <tbody>
        <?php
 $bconerecordQuery=mysqli_query($con,"select * from `tbl_result` where `tabtype`='bcone' order by id desc limit 480");
 $bconerecordRow=mysqli_num_rows($bconerecordQuery);
 if($bconerecordRow==''){?>
 <tr>
        <td colspan="4">
        <div style="display: flex;">
        <div class="spacer"></div>
        <div>No data available !</div>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php 
		}else{
		while($bconeResult=mysqli_fetch_array($bconerecordQuery)){
			if($bconeResult['resulttype']=='real'){
			?>
        <tr>
        <td><?php echo $bconeResult['periodid'];?></td>
        <td><?php echo $bconeResult['randomprice'];?></td>
        <td><span style="color:<?php if($bconeResult['color']=='green'){echo"#1DCC70";}else if($bconeResult['color']=='red'){echo"#ff2d55";}else if($bconeResult['color']=='red+violet'){echo"#ff2d55";}else if($bconeResult['color']=='green+violet'){echo"#1DCC70";}?>;"><?php echo $bconeResult['result'];?></span></td>
        <td>
        <div style="display: flex;">
        <div class="spacer"></div>
        <?php if($bconeResult['color']=='green'){ ?>
        <div class="point green" style="background:#1DCC70;"></div>
        <?php }else if($bconeResult['color']=='red'){?>
        <div class="point red" style="background:#ff2d55;"></div>
        <?php }else if($bconeResult['color']=='red+violet'){?>
         <div class="point" style="background:#ff2d55;"></div>&nbsp;
        <div class="point" style="background:#9c27b0;"></div>
 <?php }else if($bconeResult['color']=='green+violet'){?>
 <div class="point" style="background:#1DCC70;"></div>&nbsp;
         <div class="point" style="background:#9c27b0;"></div>
        <?php }?>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php }else if($bconeResult['resulttype']=='random'){?>
        <tr>
        <td><?php echo $bconeResult['periodid'];?></td>
        <td><?php echo $bconeResult['randomprice'];?></td>
        <td><span style="color:<?php if($bconeResult['randomcolor']=='green'){echo"#1DCC70";}else if($bconeResult['randomcolor']=='red'){echo"#ff2d55";}else if($bconeResult['randomcolor']=='red++violet'){echo"#ff2d55";}else if($bconeResult['randomcolor']=='green++violet'){echo"#1DCC70";}?>;"><?php echo $bconeResult['randomresult'];?></span></td>
        <td>
        <div style="display: flex;">
        <div class="spacer"></div>
        <?php if($bconeResult['randomcolor']=='green'){ ?>
        <div class="point green" style="background:#1DCC70;"></div>
        <?php }else if($bconeResult['randomcolor']=='red'){?>
        <div class="point red" style="background:#ff2d55;"></div>
        <?php }else if($bconeResult['randomcolor']=='red++violet'){?>
         <div class="point" style="background:#ff2d55;"></div>&nbsp;
        <div class="point" style="background:#9c27b0;"></div>
 <?php }else if($bconeResult['randomcolor']=='green++violet'){?>
 <div class="point" style="background:#1DCC70;"></div>&nbsp;
         <div class="point" style="background:#9c27b0;"></div>
        <?php }?>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php }?>
        <?php }}?>
         </tbody>
          </table>
        </div>
        <div class="containerrecord text-center mt-1">
        <a href="#" class="recordlink">
    <p> <i class="icon ion-md-paper"></i> <div class="title">My Bcone Record</div> </p>
    </a>
        </div>
        <div class="table-container">
        <table class="table table-borderless" id="myrecordbconet">
        <thead><tr><th></th></tr></thead>    
    <tbody>
        <div id="bconewait"></div>
    <?php
  $userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='bcone' and date(`createdate`)='".$today."' order by id desc limit 480");
  while($userResult=mysqli_fetch_array($userResultQuery)){
	  $post_date = $userResult['createdate'];
 $post_date2 = strtotime($post_date);
 $convert=date('Y-m-d H:i',$post_date2);

	?>
        <tr data-toggle="collapse" data-target="#accordionbcone<?php echo($userResult['id']);?>" class="clickable" style="border-bottom:1px solid #ccc;">
            <td class="pl-3" style="border:none;">
            <?php echo ($userResult['periodid']);?> <span style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>"> <?php echo ucfirst($userResult['status']);?> <?php if($userResult['status']=='success'){echo"+";}else{echo"-";}?><?php echo number_format($userResult['paidamount'],2);?></span>
            <div id="accordionbcone<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1 p-1" style="padding:0px 30px;">
                <span style="color:#1DCC70"> Period Detail</span>
         <div class="mt-1" style="display: flex;">
        <div class="point2">Periodid</div>
        <div class="point2"><?php echo ($userResult['periodid']);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Contract Money</div>
        <div class="point2"><?php echo number_format($userResult['amount'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Contract Count</div>
        <div class="point2">1</div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Delivery</div>
        <div class="point2"><?php echo number_format($userResult['amount']-$userResult['fee'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Fee</div>
        <div class="point2"><?php echo number_format($userResult['fee'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Open Price</div>
        <div class="point2"><?php echo number_format($userResult['openprice'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Result</div>
        <div class="point2" style="color:#1DCC70"><?php echo $userResult['resultnumber'].' ';
		$tt=explode("+",$userResult['resultcolor']); echo ucwords(implode(" + ",$tt));?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Select</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>"><?php echo $userResult['value'];?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Status</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php echo ucfirst($userResult['status']);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Amount</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";} echo number_format($userResult['paidamount'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Create Time</div>
        <div class="point2"><?php echo $convert;?></div>
        </div>
                </div>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
        </div>

<?php
 }else if($category=='emerd')
 {
 ?>
         <div class="containerrecord text-center">
        <a href="gamedashboard.php" class="recordlink">
    <p> <i class="icon ion-md-trophy"></i> <div class="title">Emerd Record</div> </p>
    </a>
        </div>
        <div class="table-container">
        <table class="table table-borderless table-hover text-center" id="emerdt">
        <thead>
        <tr>
        <th>Period</th>
        <th>Price</th>
        <th>Number</th>
        <th>Result</th>
        </tr>
        </thead>
        <tbody>
        <?php
 $emerdrecordQuery=mysqli_query($con,"select * from `tbl_result` where `tabtype`='emerd' order by id desc limit 480");
 $emerdrecordRow=mysqli_num_rows($emerdrecordQuery);
 if($emerdrecordRow==''){?>
 <tr>
        <td colspan="4">
        <div style="display: flex;">
        <div class="spacer"></div>
        <div>No data available !</div>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php 
		}else{
		while($emerdResult=mysqli_fetch_array($emerdrecordQuery)){
			if($emerdResult['resulttype']=='real'){
			?>
        <tr>
        <td><?php echo $emerdResult['periodid'];?></td>
        <td><?php echo $emerdResult['randomprice'];?></td>
        <td><span style="color:<?php if($emerdResult['color']=='green'){echo"#1DCC70";}else if($emerdResult['color']=='red'){echo"#ff2d55";}else if($emerdResult['color']=='red+violet'){echo"#ff2d55";}else if($emerdResult['color']=='green+violet'){echo"#1DCC70";}?>;"><?php echo $emerdResult['result'];?></span></td>
        <td>
        <div style="display: flex;">
        <div class="spacer"></div>
        <?php if($emerdResult['color']=='green'){ ?>
        <div class="point green" style="background:#1DCC70;"></div>
        <?php }else if($emerdResult['color']=='red'){?>
        <div class="point red" style="background:#ff2d55;"></div>
        <?php }else if($emerdResult['color']=='red+violet'){?>
         <div class="point" style="background:#ff2d55;"></div>&nbsp;
        <div class="point" style="background:#9c27b0;"></div>
 <?php }else if($emerdResult['color']=='green+violet'){?>
 <div class="point" style="background:#1DCC70;"></div>&nbsp;
         <div class="point" style="background:#9c27b0;"></div>
        <?php }?>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php }else if($emerdResult['resulttype']=='random'){?>
        <tr>
        <td><?php echo $emerdResult['periodid'];?></td>
        <td><?php echo $emerdResult['randomprice'];?></td>
        <td><span style="color:<?php if($emerdResult['randomcolor']=='green'){echo"#1DCC70";}else if($emerdResult['randomcolor']=='red'){echo"#ff2d55";}else if($emerdResult['randomcolor']=='red++violet'){echo"#ff2d55";}else if($emerdResult['randomcolor']=='green++violet'){echo"#1DCC70";}?>;"><?php echo $emerdResult['randomresult'];?></span></td>
        <td>
        <div style="display: flex;">
        <div class="spacer"></div>
        <?php if($emerdResult['randomcolor']=='green'){ ?>
        <div class="point green" style="background:#1DCC70;"></div>
        <?php }else if($emerdResult['randomcolor']=='red'){?>
        <div class="point red" style="background:#ff2d55;"></div>
        <?php }else if($emerdResult['randomcolor']=='red++violet'){?>
         <div class="point" style="background:#ff2d55;"></div>&nbsp;
        <div class="point" style="background:#9c27b0;"></div>
 <?php }else if($emerdResult['randomcolor']=='green++violet'){?>
 <div class="point" style="background:#1DCC70;"></div>&nbsp;
         <div class="point" style="background:#9c27b0;"></div>
        <?php }?>
        <div class="spacer"></div>
        </div>
        </td>
        </tr>
        <?php }?>
        <?php }}?>
         </tbody>
          </table>
        </div>
        <div class="containerrecord text-center mt-1">
        <a href="#" class="recordlink">
    <p> <i class="icon ion-md-paper"></i> <div class="title">My Emerd Record</div> </p>
    </a>
        </div>
        <div class="table-container">
        <table class="table table-borderless" id="myrecordemerdt">
        <thead><tr><th></th></tr></thead>    
    <tbody>
        <div id="emerdwait"></div>
    <?php
  $userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultnumber,(select `color` from `tbl_result` where `periodid`=`tbl_userresult`.`periodid` and `tabtype`=`tbl_userresult`.`tab`)as resultcolor from `tbl_userresult` where `userid`='".$userid."' and `tab`='emerd' and date(`createdate`)='".$today."' order by id desc limit 480");
  while($userResult=mysqli_fetch_array($userResultQuery)){
	  $post_date = $userResult['createdate'];
 $post_date2 = strtotime($post_date);
 $convert=date('Y-m-d H:i',$post_date2);

	?>
        <tr data-toggle="collapse" data-target="#accordionemerd<?php echo($userResult['id']);?>" class="clickable" style="border-bottom:1px solid #ccc;">
            <td class="pl-3" style="border:none;">
            <?php echo ($userResult['periodid']);?> <span style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>"> <?php echo ucfirst($userResult['status']);?> <?php if($userResult['status']=='success'){echo"+";}else{echo"-";}?><?php echo number_format($userResult['paidamount'],2);?></span>
            <div id="accordionemerd<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1 p-1" style="padding:0px 30px;">
                <span style="color:#1DCC70"> Period Detail</span>
         <div class="mt-1" style="display: flex;">
        <div class="point2">Periodid</div>
        <div class="point2"><?php echo ($userResult['periodid']);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Contract Money</div>
        <div class="point2"><?php echo number_format($userResult['amount'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Contract Count</div>
        <div class="point2">1</div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Delivery</div>
        <div class="point2"><?php echo number_format($userResult['amount']-$userResult['fee'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Fee</div>
        <div class="point2"><?php echo number_format($userResult['fee'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Open Price</div>
        <div class="point2"><?php echo number_format($userResult['openprice'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Result</div>
        <div class="point2" style="color:#1DCC70"><?php echo $userResult['resultnumber'].' ';
		$tt=explode("+",$userResult['resultcolor']); echo ucwords(implode(" + ",$tt));?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Select</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>"><?php echo $userResult['value'];?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Status</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php echo ucfirst($userResult['status']);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Amount</div>
        <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";} echo number_format($userResult['paidamount'],2);?></div>
        </div>
        <div class="mt-1" style="display: flex;">
        <div class="point2">Create Time</div>
        <div class="point2"><?php echo $convert;?></div>
        </div>
                </div>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
        </div>

 <?php }?>