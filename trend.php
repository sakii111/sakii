<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}
require_once "config.php";
?>

<?php
                       

//retrieve the selected results from database   
$query2 = "SELECT clo FROM betrec WHERE DATE(`time`) = CURDATE() ORDER BY id DESC";  //CONVERT_TZ(CURDATE(), '+00:00', '+05:30')
//SELECT clo FROM betrec WHERE DATE(time) = DATE_ADD(CURDATE(), INTERVAL 1 DAY) ORDER BY id DESC
$result2 = mysqli_query($conn, $query2);  
  $a=array();
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result2)) {   
	array_push($a," $row2[0]");  
}
$query1 = "SELECT period ,ans FROM betrec WHERE DATE(`time`) = CURDATE() ORDER BY id DESC";  
$result1 = mysqli_query($conn, $query1);  
   $a1=array();
   $a2=array();
//display the retrieved result on the webpage  
while ($row12 = mysqli_fetch_array($result1)) {   
	array_push($a1," $row12[period]");
	array_push($a2," $row12[ans]");    
}

//Total rows and column
$roww = 0;
$column = 0;

//Location - Current 
$currentrow = 0;
$currentcolumn = 0;

//Place 1st element in 1st Row
$i = 0;
$p=substr($a1[$i], -3); //Last three digits of the period        
$n=$a2[$i]; //Winning number 
if($n==5 or $n==0){
	$c="violet-".trim($a[$i]); //Color | Removes whitespace and adds violet
}else{
	$c=trim($a[$i]); //Color
}
${"rowp".$roww} = "<div class='cell border'>
					<div class='item-$c'>
						$p
					</div>
				 </div>";
${"rowa".$roww} = "<div class='cell border'>
					<div class='item-$c'>
						$n
					</div>
				 </div>";

//Loop through array
while($i < count($a)-1){
	if($a[$i] == $a[$i+1]){
		//Place it in next row
			//Check row's existance
			if($currentrow+1 <= $roww){
				//Don't create row
			}
			else{
				//Create row
				$roww = $roww + 1;
				if($column > 0){
					$c = 0;
					while($c < $column){
						${"rowp".$roww} = ${"rowp".$roww}."<div class='cell border'>
															<div class='item-null'>
			  
															</div>
														</div>";
						${"rowa".$roww} = ${"rowa".$roww}."<div class='cell border'>
															<div class='item-null'>
			  
															</div>
														</div>";
						$c++;
					}
				}
			}
			//Place it in new row
			$p=substr($a1[$i+1], -3); //Last three digits of the period        
			$n=$a2[$i+1]; //Winning number 
			if($n==5 or $n==0){
				$c="violet-".trim($a[$i+1]); //Color | Removes whitespace and adds violet
			}else{
				$c=trim($a[$i+1]); //Color
			}
			//
			$currentrow = $currentrow + 1;
			${"rowp".$currentrow} = ${"rowp".$currentrow}."<div class='cell border'>
																	<div class='item-$c'>
																		$p
																	</div>	
																</div>";
			${"rowa".$currentrow} = ${"rowa".$currentrow}."<div class='cell border'>
																	<div class='item-$c'>
																		$n
																	</div>	
																</div>";
		$i++;
	}
	
	if(isset($a[$i+1]) && $a[$i] != $a[$i+1]){
		$spacevar = $currentrow+1;
		while($spacevar<=$roww){
			${"rowp".$spacevar} = ${"rowp".$spacevar}."<div class='cell border'>
											<div class='item-null'>

											</div>
										</div>";
			${"rowa".$spacevar} = ${"rowa".$spacevar}."<div class='cell border'>
											<div class='item-null'>

											</div>
										</div>";
			$spacevar++;
		}
		//Place it in the next column
			//Check column's existance
			if($currentcolumn+1 <= $column){
				//Don't create column
			}
			else{
				//Create column
				$column = $column+1;
			}
			//Place it in new column
			$p=substr($a1[$i+1], -3); //Last three digits of the period        
			$n=$a2[$i+1]; //Winning number 
			if($n==5 or $n==0){
				$c="violet-".trim($a[$i+1]); //Color | Removes whitespace and adds violet
			}else{
				$c=trim($a[$i+1]); //Color
			}
			//
			${"rowp".'0'} = ${"rowp".'0'}."<div class='cell border'>
												<div class='item-$c'>
													$p
												</div>	
											</div>";
			${"rowa".'0'} = ${"rowa".'0'}."<div class='cell border'>
												<div class='item-$c'>
													$n
												</div>	
											</div>";
			//Update location
			$currentcolumn = $currentcolumn	+ 1;
			$currentrow = 0;
		$i++;
	}
}

function getdata($row){
    global $a;
    global $a2;
    $i=1;
   
     while($i <= $row){
         echo" <div class='row'> <div class='index'>
                                        $i
                                    </div>"; 
                                   
                                    $g=0;
                                 

                                    while($g < (count($a)/$row)){
                                        $q=($g*$row)+$i-1;
                                        
                                        $n=$a2[$q];
                                        if($n==5 or $n==0){
                                                    $c="violet-".trim($a[$q]);
                                                      }else{
                                                         $c=trim($a[$q]);
                                                            }
        
                                         echo"<div class='cell border'>
                                        <div class='item-$c'>
                                        $n
                                        </div>
                                        </div>";
                                     
                                       $g++;
            
                                    }
                                   
                                    echo"</div>";
                                    $i++;
}

}
 
// Initialize the session
   $sql3 = "SELECT gameid FROM tbl_gameid ORDER BY id DESC LIMIT 1"; //"SELECT gameid FROM tbl_gameid ORDER BY id DESC LIMIT 1"
    $result3 =$conn->query($sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $perio=$row3['gameid'];//game id
    $p=($perio-1);
     $sql = "SELECT * FROM betrec WHERE period=$p";
   $result =$conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $period=$p;
    $price=$row['num'];
    $result=$row['ans'];
    if($result % 2==0){
       $c="red"; 
    }else{
         $c="green"; 
    }
    
    $opt11="SELECT COUNT(*) as total11 FROM `betrec` WHERE clo='green' AND DATE(`time`) = CURDATE()";
$optres11=$conn->query($opt11);
$sum11= mysqli_fetch_assoc($optres11);

if($sum11['total11']==""){
    $bonus11=0;
   
}else{
    $bonus11=$sum11['total11'];
}

 $opt12="SELECT COUNT(*) as total12 FROM `betrec` WHERE clo='red' AND DATE(`time`) = CURDATE()";
$optres12=$conn->query($opt12);
$sum12= mysqli_fetch_assoc($optres12);

if($sum12['total12']==""){
    $bonus12=0;
   
}else{
    $bonus12=$sum12['total12'];
}

 $opt13="SELECT COUNT(*) as total13 FROM `betrec` WHERE res1='violet' AND DATE(`time`) = CURDATE()";
$optres13=$conn->query($opt13);
$sum13= mysqli_fetch_assoc($optres13);

if($sum13['total13']==""){
    $bonus13=0;
   
}else{
    $bonus13=$sum13['total13'];
}
    ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Parity</title>
    <link href="assets/css/app.5d712b158b516e760fbff54839dedd12.css" rel="stylesheet">
	<style>
		.yellowback {
			background: #yellow!important;
		}
	</style>
</head>

<body class="">
    <div id="app">
        <div class="layout-content">
            <div class="parity-content">
                <div class="van-nav-bar van-hairline--bottom" style="z-index: 1;">
                    <div class="van-nav-bar__left"></div>
                    <div class="van-nav-bar__title van-ellipsis">Parity Record</div>
                    <div class="van-nav-bar__right"></div>
                </div>
                <div>
                    <div class="kline">
                        <div class="reservation-chunk">
                            <div class="reservation-chunk-sub">
                                <div class="reservation-chunk-sub-title">
                                    Period
                                </div>
                                <div class="reservation-chunk-sub-num">
                                    <?php echo $perio; ?>
                                </div>
                            </div>
                            <div class="reservation-chunk-sub" style="text-align: right;">
                                <div class="reservation-chunk-sub-title">
                                    Count Down
                                </div>
                                <div class="reservation-chunk-sub-num">
                                    <!---->
                                    <div id="demo" class="time">
                                    </div>
									<div data-v-5f666fee="" class="ol_btn" style="display: none;" id="cont">
										<button data-v-5f666fee="" class="grayback" id="contbt">
											Continue
										</button>
									</div>
										
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kline">
                        <div class="reservation-chunk">
                            <div class="reservation-chunk-sub">
                                <div class="reservation-chunk-sub-title">
                                    PrePeriod
                                </div>
                                <div class="reservation-chunk-sub-num">
                                    <?php echo $period; ?>
                                </div>
                            </div>
                            <div class="reservation-chunk-sub" style="text-align: center;">
                                <div class="reservation-chunk-sub-title">
                                    Result
                                </div>
                                <div class="reservation-chunk-sub-num">
                                    <div class="item-<?php echo $c; ?>" style="margin: 5px 0px 0px 35px;">
                                      <?php echo $result; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="reservation-chunk-sub" style="text-align: right;">
                                <div class="reservation-chunk-sub-title">
                                    OpenPrice
                                </div>
                                <div class="reservation-chunk-sub-num">
                                    <div style="color: rgb(232, 57, 241);">
                                        <?php echo $price; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kline">
                        <div class="title">
                            <div class="red">
                                Red:<?php echo $bonus12; ?>
                            </div>
                            <div class="green">
                                Green:<?php echo $bonus11; ?>
                            </div>
                            <div class="violet">
                                Violet:<?php echo $bonus13; ?>
                            </div>
                        </div>
                        <div class="switchBox"><button id="bper" class="van-button van-button--small van-button--default" onclick="per()"><span
                                    class="van-button__text">ShowPeriod</span></button> <button
                                    onclick="num()" id="bnum"
                                class="van-button van-button--small van-button--primary"><span
                                    class="van-button__text">ShowOpenNum</span></button></div>
                        <div id="num" class="box">
                            <div class="grid">
                                <?php 
								$countrow = 0;
								while($countrow <= $roww){
								?>
								
								<div class="row">
									<div class="index">
										<?php echo $countrow+1; ?>
									</div>
									<?php echo ${"rowa".$countrow}; ?>
								</div>
								
								<?php
								$countrow++;
								}
								?> 
                            </div>
                        </div>
                        <div id="per" style="display:none;" class="box">
							<div class="grid">
							   <?php 
								$countrowa = 0;
								while($countrowa <= $roww){
								?>
								
								<div class="row">
									<div class="index">
										<?php echo $countrowa+1; ?>
									</div>
									<?php echo ${"rowp".$countrowa}; ?>
								</div>
								
								<?php
								$countrowa++;
								}
								?> 
							</div>
						</div>
                    </div>
                    <div class="kline">
                        <div class="top-selete">
                            <div id="3" onclick="a3a()" class="top-selete-sub active">
                                Rd.3
                            </div>
                            <div id="4" onclick="a4a()" class="top-selete-sub">
                                Rd.4
                            </div>
                            <div id="5" onclick="a5a()" class="top-selete-sub">
                                Rd.5
                            </div>
                            <div id="6" onclick="a6a()" class="top-selete-sub">
                                Rd.6
                            </div>
                            <div id="7" onclick="a7a()" class="top-selete-sub">
                                Rd.7
                            </div>
                            <div id="8" onclick="a8a()" class="top-selete-sub">
                                Rd.8
                            </div>
                        </div>
                        <div id="3box" class="box">
                            <div class="grid">
                                <?php echo getdata(3); ?> 
                                
                            </div>
                        </div>
                        <div id="4box" style="display:none;" class="box">
                            <div class="grid">
                                <?php echo getdata(4); ?> 
                                
                            </div>
                        </div>
                        <div id="5box" style="display:none;" class="box">
                            <div class="grid">
                                <?php echo getdata(5); ?> 
                                
                            </div>
                        </div>
                        <div id="6box" style="display:none;" class="box">
                            <div class="grid">
                                <?php echo getdata(6); ?> 
                                
                            </div>
                        </div>
                        <div id="7box" style="display:none;" class="box">
                            <div class="grid">
                                <?php echo getdata(7); ?> 
                                
                            </div>
                        </div>
                        <div id="8box" style="display:none;" class="box">
                            <div class="grid">
                                <?php echo getdata(8); ?> 
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="kline">
                        <div class="box">
                            <div class="van-cell-group van-hairline--top-bottom">
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(245, 40, 39); width: 160.32px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 137.28px; background: rgb(245, 40, 39);">Red:<?php echo trim($bonus12); ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(21, 114, 57); width: 170.34px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 141.27px; background: rgb(21, 114, 57);">Green:<?php echo trim($bonus11); ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(232, 57, 241); width: 60.12px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 51.3px; background: rgb(232, 57, 241);">Violet:<?php echo trim($bonus13);?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 26.72px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 23.84px; background: rgb(0, 122, 204);">0:28</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 33.4px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 29.8px; background: rgb(0, 122, 204);">1:34</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 23.38px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 20.86px; background: rgb(0, 122, 204);">2:24</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 30.06px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 26.82px; background: rgb(0, 122, 204);">3:31</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 30.06px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 26.82px; background: rgb(0, 122, 204);">4:30</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 30.06px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 26.82px; background: rgb(0, 122, 204);">5:31</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 36.74px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 32.78px; background: rgb(0, 122, 204);">6:35</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 36.74px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 32.78px; background: rgb(0, 122, 204);">7:36</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 33.4px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 29.8px; background: rgb(0, 122, 204);">8:34</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="van-cell">
                                    <div class="van-cell__value van-cell__value--alone">
                                        <div class="van-progress"><span class="van-progress__portion"
                                                style="background: rgb(0, 122, 204); width: 30.06px;"><span
                                                    class="van-progress__pivot"
                                                    style="left: 26.82px; background: rgb(0, 122, 204);">9:30</span></span>
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
    <!--<script type="text/javascript" src="assets/static/js/manifest.2ae2e69a05c33dfc65f8.js"></script>
    <script type="text/javascript" src="assets/static/js/vendor.656e947823cf7884258e.js"></script>
    <script type="text/javascript" src="assets/static/js/app.9024e67d906b6dca91e5.js"></script>-->
	<script src="assets/js/lib/jquery-3.6.1.min.js"></script>
    <div class="van-toast van-toast--middle van-toast--loading" style="z-index: 2001; display: none;" id="loadinga">
        <div class="van-loading van-loading--circular van-toast__loading"><span
                class="van-loading__spinner van-loading__spinner--circular"><svg viewBox="25 25 50 50"
                    class="van-loading__circular">
                    <circle cx="50" cy="50" r="20" fill="none"></circle>
                </svg></span></div>
        <div class="van-toast__text">Loading...</div>
    </div>
    <script>
    function time(){
        var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 180 - countDownDate % 180;
  //alert(distance);
  var i = distance / 60,
   n = distance % 60,
   o = n / 10,
   s = n % 10;
  var minutes = Math.floor(i);
  var seconds = ('0'+Math.floor(n)).slice(-2);
  var sec1= (seconds%100-seconds%10)/10;
var sec2=seconds%10;
  document.getElementById("demo").innerHTML = "<span class='time-sub'>0</span><span class='time-sub'>"+Math.floor(minutes)+"</span><span class='time-sub-dot'>:</span><span class='time-sub'>"+sec1+"</span><span class='time-sub'>"+sec2+"</span>";
    
	if(distance==1){
		var cont = document.getElementById("cont");
		cont.style.display = "";
		var tmr = document.getElementById("demo");
		tmr.style.display = "none";
	}
	if(distance==178){
		var cont = document.getElementById("cont");
		cont.style.display = "none";
		var tmr = document.getElementById("demo");
		tmr.style.display = "";
		$("#contbt").removeClass("yellowback");
		$("#contbt").addClass("grayback");
		$("#contbt").off("click", continuebtn);
		var load = document.getElementById("loadinga");
					load.style.display = "";
					setTimeout(function(){
						load.style.display = "none";
					}, 1000);
		location.reload(true);
	}
	if (distance === 180) {
		$("#contbt").removeClass("grayback");
		$("#contbt").addClass("yellowback");
		$("#contbt").on("click", continuebtn);
	}
}
                        var interval = setInterval(time, 1000);
                        
                        function num(){
                            document.getElementById("bnum").className="van-button van-button--small van-button--primary"
                             document.getElementById("bper").className="van-button van-button--small van-button--default"
                             document.getElementById("num").style.display=""
                             document.getElementById("per").style.display="none"
                        }
                        function per(){
                            document.getElementById("bnum").className="van-button van-button--small van-button--default"
                             document.getElementById("bper").className="van-button van-button--small van-button--primary"
                             document.getElementById("num").style.display="none"
                             document.getElementById("per").style.display=""
                        }
                        
                        
                        function a3a(){
                           document.getElementById("3").className="top-selete-sub active"; 
                           document.getElementById("4").className="top-selete-sub"; 
                           document.getElementById("5").className="top-selete-sub"; 
                           document.getElementById("6").className="top-selete-sub"; 
                           document.getElementById("7").className="top-selete-sub"; 
                           document.getElementById("8").className="top-selete-sub"; 
                           document.getElementById("3box").style.display="";
                           document.getElementById("4box").style.display="none"; 
                           document.getElementById("5box").style.display="none"; 
                           document.getElementById("6box").style.display="none";
                           document.getElementById("7box").style.display="none"; 
                           document.getElementById("8box").style.display="none"; 
                        }
                        
                        function a4a(){
                             document.getElementById("3").className="top-selete-sub"; 
                           document.getElementById("4").className="top-selete-sub active"; 
                           document.getElementById("5").className="top-selete-sub"; 
                           document.getElementById("6").className="top-selete-sub"; 
                           document.getElementById("7").className="top-selete-sub"; 
                           document.getElementById("8").className="top-selete-sub"; 
                           document.getElementById("3box").style.display="none";
                           document.getElementById("4box").style.display=""; 
                           document.getElementById("5box").style.display="none"; 
                           document.getElementById("6box").style.display="none";
                           document.getElementById("7box").style.display="none"; 
                           document.getElementById("8box").style.display="none"; 
                        }
                        function a5a(){
                             document.getElementById("3").className="top-selete-sub"; 
                           document.getElementById("4").className="top-selete-sub"; 
                           document.getElementById("5").className="top-selete-sub active"; 
                           document.getElementById("6").className="top-selete-sub"; 
                           document.getElementById("7").className="top-selete-sub"; 
                           document.getElementById("8").className="top-selete-sub"; 
                           document.getElementById("3box").style.display="none";
                           document.getElementById("4box").style.display="none"; 
                           document.getElementById("5box").style.display=""; 
                           document.getElementById("6box").style.display="none";
                           document.getElementById("7box").style.display="none"; 
                           document.getElementById("8box").style.display="none"; 
                        }
                        function a6a(){
                             document.getElementById("3").className="top-selete-sub"; 
                           document.getElementById("4").className="top-selete-sub"; 
                           document.getElementById("5").className="top-selete-sub"; 
                           document.getElementById("6").className="top-selete-sub active"; 
                           document.getElementById("7").className="top-selete-sub"; 
                           document.getElementById("8").className="top-selete-sub"; 
                           document.getElementById("3box").style.display="none";
                           document.getElementById("4box").style.display="none"; 
                           document.getElementById("5box").style.display="none"; 
                           document.getElementById("6box").style.display="";
                           document.getElementById("7box").style.display="none"; 
                           document.getElementById("8box").style.display="none"; 
                        }
                        function a7a(){
                             document.getElementById("3").className="top-selete-sub"; 
                           document.getElementById("4").className="top-selete-sub"; 
                           document.getElementById("5").className="top-selete-sub"; 
                           document.getElementById("6").className="top-selete-sub"; 
                           document.getElementById("7").className="top-selete-sub active"; 
                           document.getElementById("8").className="top-selete-sub"; 
                           document.getElementById("3box").style.display="none";
                           document.getElementById("4box").style.display="none"; 
                           document.getElementById("5box").style.display="none"; 
                           document.getElementById("6box").style.display="none";
                           document.getElementById("7box").style.display=""; 
                           document.getElementById("8box").style.display="none"; 
                        }
                        function a8a(){
                             document.getElementById("3").className="top-selete-sub"; 
                           document.getElementById("4").className="top-selete-sub"; 
                           document.getElementById("5").className="top-selete-sub"; 
                           document.getElementById("6").className="top-selete-sub"; 
                           document.getElementById("7").className="top-selete-sub"; 
                           document.getElementById("8").className="top-selete-sub active"; 
                           document.getElementById("3box").style.display="none";
                           document.getElementById("4box").style.display="none"; 
                           document.getElementById("5box").style.display="none"; 
                           document.getElementById("6box").style.display="none";
                           document.getElementById("7box").style.display="none"; 
                           document.getElementById("8box").style.display=""; 
                        }                        

					function continuebtn(){
						/*var load = document.getElementById("loadinga");
						load.style.display = "";
						setTimeout(function(){
							load.style.display = "none";
						}, 1000);*/
						var cont = document.getElementById("cont");
						cont.style.display = "none";
						var tmr = document.getElementById("demo");
						tmr.style.display = "";
						$("#contbt").removeClass("yellowback");
						$("#contbt").addClass("grayback");
						$("#contbt").off("click", continuebtn);
						//location.reload(true);
					}
    </script>
</body>

</html>