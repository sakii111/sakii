<?php
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}

	include("include/connection.php");
	$level=$_POST['level'];
	$userid=$_SESSION['frontuserid'];
	$today=date('Y-m-d');
	if($level=='lvlx')
	{
?>
		<div data-v-5f666fee="" class="nav_content">
			<div data-v-5f666fee="" class="content">
				<div data-v-5f666fee="" class="content_con" style="margin: 0px; border: 0px;">
					<div data-v-5f666fee="" class="parity">
						<table data-v-5f666fee="" id="lvlm">
							<thead data-v-5f666fee="">
								<tr data-v-5f666fee="">
									<th data-v-5f666fee="">ID</th>
									<th data-v-5f666fee="">Phone</th>
									<th data-v-5f666fee="">Water Reward</th>
									<th data-v-5f666fee="">First Reward</th>
								</tr>
							</thead>
							<tbody data-v-5f666fee="">
								<?php 
									$user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
									$userRows=mysqli_num_rows($user);
									$userResult=mysqli_fetch_array($user);
									$owncode=$userResult['owncode'];
									$userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
									$userlevel1Rows=mysqli_num_rows($userlevel1);
									$i=1;
									if($userlevel1Rows==null){
								?>
									<tr data-v-5f666fee="">
										<td data-v-5f666fee="">No data available</td>
									</tr>
								<?php 
									}
									else{
										while($userlevel1Array=mysqli_fetch_array($userlevel1)){
								?>
											<?php 
												$depositlevel1=mysqli_query($con,"select * from `deposits` where `uid`='".$userlevel1Array['id']."' order by id asc limit 1");
												$depositlevel1row = mysqli_num_rows($depositlevel1);
												if($depositlevel1row == 1){
													$depositlevel1array = mysqli_fetch_array($depositlevel1);
													$depositdup = $depositlevel1array['amount'];
													if($depositdup>='1' && $depositdup<='499'){
														$refbn = 0.1*$depositdup;
													}
													else if($depositdup>='500' && $depositdup<='999'){
														$refbn = 150;
													}
													else if($depositdup>='1000' && $depositdup<='1999'){
														$refbn = 200;
													}
													else if($depositdup>='2000' && $depositdup<='2999'){
														$refbn = 300;
													}
													else if($depositdup>='3000' && $depositdup<='3999'){
														$refbn = 400;
													}
													else if($depositdup>='4000' && $depositdup<='4999'){
														$refbn = 500;
													}
													else if($depositdup>='5000' && $depositdup<='9999'){
														$refbn = 600;
													}
													else if($depositdup>='10000'){
														$refbn = 1100;
													}
													else{
														$refbn = 0;
													}
												}
												else{
													$refbn = 0;
												}
												
												$waterlevel1=mysqli_query($con,"select * from `tbl_bonussummery` where `userid`='".$userlevel1Array['id']."'");
												$waterlevel1rows = mysqli_num_rows($waterlevel1);
												if($waterlevel1rows>0){
													$lvl1i = 1;
													$lvl1amt = 0;
													while($lvl1i<=$waterlevel1rows){
														$waterlevel1array = mysqli_fetch_array($waterlevel1);
														$lvl1amt = $lvl1amt + $waterlevel1array['level1amount'];
														$lvl1i++;
													}
												}
												else{
													$lvl1amt = 0;
												}
											?>
											<tr data-v-5f666fee="">
												<td data-v-5f666fee=""><?php echo $userlevel1Array['id']; ?></td>
												<td data-v-5f666fee=""><?php echo $userlevel1Array['mobile']; ?></td>
												<td data-v-5f666fee=""><?php echo number_format($lvl1amt, 2); ?></td>
												<td data-v-5f666fee=""><?php echo number_format($refbn, 2); ?></td>
											</tr>
										<?php 
										}
										?>
									<?php 
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<?php 
	}
?>
<?php
	if($level=='lvly')
	{
?>
		<div data-v-5f666fee="" class="nav_content">
			<div data-v-5f666fee="" class="content">
				<div data-v-5f666fee="" class="content_con" style="margin: 0px; border: 0px;">
					<div data-v-5f666fee="" class="parity">
						<table data-v-5f666fee="" id="lvln">
							<thead data-v-5f666fee="">
								<tr data-v-5f666fee="">
									<th data-v-5f666fee="">ID</th>
									<th data-v-5f666fee="">Phone</th>
									<th data-v-5f666fee="">Water Reward</th>
									<th data-v-5f666fee="">First Reward</th>
								</tr>
							</thead>
							<tbody data-v-5f666fee="">
								<?php 
									$user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
									$userRows=mysqli_num_rows($user);
									$userResult=mysqli_fetch_array($user);
									$owncode=$userResult['owncode'];
									$userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
									$userlevel1Rows=mysqli_num_rows($userlevel1);
									$total2 = 0;
									$total3 = 0;
									$lvl2id = array();
									$lvl2no = array();
									$i=1;
									while($i <= $userlevel1Rows){
										$userlevel1Array=mysqli_fetch_array($userlevel1);
										if(!empty($userlevel1Array['owncode'])){
											$lvl1owncode = $userlevel1Array['owncode'];
											$userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$lvl1owncode."' order by id asc");
											$userlevel2Rows=mysqli_num_rows($userlevel2);
											$total2 = $total2 + $userlevel2Rows;
											$j = 1;
											while($j<=$userlevel2Rows){
												$userlevel2Array=mysqli_fetch_array($userlevel2);
												if(!empty($userlevel2Array['id'])){
													array_push($lvl2id,"$userlevel2Array[id]"); 
													array_push($lvl2no,"$userlevel2Array[mobile]");		
												}
												$j++;
											}
										}
										$i++;
									}
									if($total2==0){
								?>
									<tr data-v-5f666fee="">
										<td data-v-5f666fee="">No data available</td>
									</tr>
								<?php 
									}
									else{
										$x = 0;
										while($x<count($lvl2id)){
								?>
											<?php 
												$depositlevel2=mysqli_query($con,"select * from `deposits` where `uid`='".$lvl2id[$x]."' order by id asc limit 1");
												$depositlevel2row = mysqli_num_rows($depositlevel2);
												if($depositlevel2row == 1){
													$depositlevel2array = mysqli_fetch_array($depositlevel2);
													$depositdup2 = $depositlevel2array['amount'];
													if($depositdup2>='1' && $depositdup2<='499'){
														$refbn2 = 0.1*$depositdup2;
													}
													else if($depositdup2>='500' && $depositdup2<='999'){
														$refbn2 = 150;
													}
													else if($depositdup2>='1000' && $depositdup2<='1999'){
														$refbn2 = 200;
													}
													else if($depositdup2>='2000' && $depositdup2<='2999'){
														$refbn2 = 300;
													}
													else if($depositdup2>='3000' && $depositdup2<='3999'){
														$refbn2 = 400;
													}
													else if($depositdup2>='4000' && $depositdup2<='4999'){
														$refbn2 = 500;
													}
													else if($depositdup2>='5000' && $depositdup2<='9999'){
														$refbn2 = 600;
													}
													else if($depositdup2>='10000'){
														$refbn2 = 1100;
													}
													else{
														$refbn2 = 0;
													}
												}
												else{
													$refbn2 = 0;
												}
												
												$waterlevel2=mysqli_query($con,"select * from `tbl_bonussummery` where `userid`='".$lvl2id[$x]."'");
												$waterlevel2rows = mysqli_num_rows($waterlevel2);
												if($waterlevel2rows>0){
													$lvl2i = 1;
													$lvl2amt = 0;
													while($lvl2i<=$waterlevel2rows){
														$waterlevel2array = mysqli_fetch_array($waterlevel2);
														$lvl2amt = $lvl2amt + $waterlevel2array['level2amount'];
														$lvl2i++;
													}
												}
												else{
													$lvl2amt = 0;
												}
											?>
											<tr data-v-5f666fee="">
												<td data-v-5f666fee=""><?php echo $lvl2id[$x]; ?></td>
												<td data-v-5f666fee=""><?php echo $lvl2no[$x]; ?></td>
												<td data-v-5f666fee=""><?php echo number_format($lvl2amt, 2); ?></td>
												<td data-v-5f666fee=""><?php echo number_format($refbn2, 2); ?></td>
											</tr>
										<?php 
										$x++;
										}
										?>
									<?php 
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<?php 
	}
?>
<?php
	if($level=='lvlz')
	{
?>
		<div data-v-5f666fee="" class="nav_content">
			<div data-v-5f666fee="" class="content">
				<div data-v-5f666fee="" class="content_con" style="margin: 0px; border: 0px;">
					<div data-v-5f666fee="" class="parity">
						<table data-v-5f666fee="" id="lvlo">
							<thead data-v-5f666fee="">
								<tr data-v-5f666fee="">
									<th data-v-5f666fee="">ID</th>
									<th data-v-5f666fee="">Phone</th>
									<th data-v-5f666fee="">Water Reward</th>
									<th data-v-5f666fee="">First Reward</th>
								</tr>
							</thead>
							<tbody data-v-5f666fee="">
								<?php 
									$user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
									$userRows=mysqli_num_rows($user);
									$userResult=mysqli_fetch_array($user);
									$owncode=$userResult['owncode'];
									$userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
									$userlevel1Rows=mysqli_num_rows($userlevel1);
									$total2 = 0;
									$total3 = 0;
									$lvl3id = array();
									$lvl3no = array();
									$i=1;
									while($i <= $userlevel1Rows){
										$userlevel1Array=mysqli_fetch_array($userlevel1);
										if(!empty($userlevel1Array['owncode'])){
											$lvl1owncode = $userlevel1Array['owncode'];
											$userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$lvl1owncode."' order by id asc");
											$userlevel2Rows=mysqli_num_rows($userlevel2);
											$total2 = $total2 + $userlevel2Rows;
											$j = 1;
											while($j<=$userlevel2Rows){
												$userlevel2Array=mysqli_fetch_array($userlevel2);
												if(!empty($userlevel2Array['id'])){
													$userlevel2code = $userlevel2Array['owncode'];
													$userlevel3=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2code."' order by id asc");
													$userlevel3Rows=mysqli_num_rows($userlevel3);
													$total3 = $total3 + $userlevel3Rows;
													$k = 1;
													while($k<=$userlevel3Rows){
														$userlevel3Array=mysqli_fetch_array($userlevel3);
														if(!empty($userlevel3Array['id'])){
															array_push($lvl3id,"$userlevel3Array[id]"); 
															array_push($lvl3no,"$userlevel3Array[mobile]");
														}
														$k++;
													}		
												}
												$j++;
											}
										}
										$i++;
									}
									if($total3==0){
								?>
									<tr data-v-5f666fee="">
										<td data-v-5f666fee="">No data available</td>
									</tr>
								<?php 
									}
									else{
										$x = 0;
										while($x<count($lvl3id)){
								?>
											<?php 
												$depositlevel3=mysqli_query($con,"select * from `deposits` where `uid`='".$lvl3id[$x]."' order by id asc limit 1");
												$depositlevel3row = mysqli_num_rows($depositlevel3);
												if($depositlevel3row == 1){
													$depositlevel3array = mysqli_fetch_array($depositlevel3);
													$depositdup3 = $depositlevel3array['amount'];
													if($depositdup3>='1' && $depositdup3<='499'){
														$refbn3 = 0.1*$depositdup3;
													}
													else if($depositdup3>='500' && $depositdup3<='999'){
														$refbn3 = 150;
													}
													else if($depositdup3>='1000' && $depositdup3<='1999'){
														$refbn3 = 200;
													}
													else if($depositdup3>='2000' && $depositdup3<='2999'){
														$refbn3 = 300;
													}
													else if($depositdup3>='3000' && $depositdup3<='3999'){
														$refbn3 = 400;
													}
													else if($depositdup3>='4000' && $depositdup3<='4999'){
														$refbn3 = 500;
													}
													else if($depositdup3>='5000' && $depositdup3<='9999'){
														$refbn3 = 600;
													}
													else if($depositdup3>='10000'){
														$refbn3 = 1100;
													}
													else{
														$refbn3 = 0;
													}
												}
												else{
													$refbn3 = 0;
												}
												
												$waterlevel3=mysqli_query($con,"select * from `tbl_bonussummery` where `userid`='".$lvl3id[$x]."'");
												$waterlevel3rows = mysqli_num_rows($waterlevel3);
												if($waterlevel3rows>0){
													$lvl3i = 1;
													$lvl3amt = 0;
													while($lvl3i<=$waterlevel3rows){
														$waterlevel3array = mysqli_fetch_array($waterlevel3);
														$lvl3amt = $lvl3amt + $waterlevel3array['level3amount'];
														$lvl3i++;
													}
												}
												else{
													$lvl3amt = 0;
												}
											?>
											<tr data-v-5f666fee="">
												<td data-v-5f666fee=""><?php echo $lvl3id[$x]; ?></td>
												<td data-v-5f666fee=""><?php echo $lvl3no[$x]; ?></td>
												<td data-v-5f666fee=""><?php echo number_format($lvl3amt, 2); ?></td>
												<td data-v-5f666fee=""><?php echo number_format($refbn3, 2); ?></td>
											</tr>
										<?php 
										$x++;
										}
										?>
									<?php 
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<?php 
	}
?>