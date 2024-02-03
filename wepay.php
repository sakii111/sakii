<?php 
	ob_start();
	session_start();
	if($_SESSION['frontuserid']==""){
		header("location:login.php");
		exit();
	}
?>
<?php include ("include/connection.php");?>
<?php 
if(isset($_GET['ramt'])){
	$ramt = $_GET['ramt'];
} else{
	$ramt = 0;
}
$dot_pos = strpos($ramt, '.');
if ($dot_pos === false) {
    $ramt = $ramt . '.00';
}else {
    $after_dot = substr($ramt, $dot_pos + 1);
    $after_dot_length = strlen($after_dot);
    if ($after_dot_length > 2) {
        $after_dot = substr($after_dot, 0, 2);
        $ramt = substr($ramt, 0, $dot_pos + 1) . $after_dot;
    } elseif ($after_dot_length < 2) {
        $zeros_to_add = 2 - $after_dot_length;
        $ramt = $ramt . str_repeat('0', $zeros_to_add);
    }
}
$date = date("Ymd");
$time = time();
$serial = $date . $time;
?>
<?php 
	$s_upi = "SELECT * FROM tbl_upiid WHERE status='1'";
	$r_upi = mysqli_query($con, $s_upi);
	$f_upi = mysqli_fetch_array($r_upi);
	$upi_id = $f_upi['value'];
?>

<html class="pixel-ratio-2 retina ios ios-13 ios-13-2-3 ios-gt-12 ios-gt-11 ios-gt-10 ios-gt-9 ios-gt-8 ios-gt-7 ios-gt-6">
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
		<title>
			UPIPAY Checkout
		</title>
		<meta content="width=device-width,initial-scale=1,user-scalable=0" name="viewport">
		<link rel="icon" href="/favicon.ico">
		<link href="assets/css/wepay/weui2.min.css" rel="stylesheet">
		<link href="assets/css/wepay/weuix.min.css" rel="stylesheet">
		<script src="assets/js/wepay/jquery-2.2.4.min.js"></script>
		<style type="text/css" id="operaUserStyle"></style>
		<script src="assets/js/wepay/clipboard.min.js"></script>
		<script src="assets/js/wepay/layer.js"></script>
		<link rel="stylesheet" href="assets/css/wepay/layer.css" id="layuicss-layer">
		<style type="text/css">
			body{
				font-family:Arial
			}
			.weui-tabbar__item{
				padding:5px 0 8px 0
			}
			.weui-tabbar__label{
				font-size:12px;
				margin-top:-5px
			}
		</style>
		<style type="text/css">
			.diylabel{
				font-size:12px;
				color:#999
			}
			.money_syb{
				font-size:16px;
				position:relative;
				top:0;
				left:0
			}
			.money_val{
				font-size:16px
			}
			table.minfo td{
				padding:0;
				margin:0;
				border:none;
				padding-right:10px;
				line-height:30px;
				font-family:Arial
			}
			.membermenu .weui-cell__ft{
				font-size:12px
			}
			.menuname{
				font-size:15px!important
			}
			.membermenu .menuicon{
				width:24px;
				height:24px;
				margin-right:10px;
				display:block
			}
			.weui-pay-inner{
				border-radius:8px
			}
			.weui-pay-inner:after{
				border:0
			}
			.moneytable{
				background:0 0
			}
			.moneytable td{
				padding:0;
				margin:0;
				text-align:left;
				border:0;
				color: #16bffa
			}  
			.weui-payselect-li{
				width:50%
			}  
			.weui-payselect-a{
				background-color:#f6fdff;
				color:#888
			}  
			.weui-payselect-on{
				background-color:#fff
			}  
			.weui-pay-line{
				line-height:25px
			}  
			.weui-pay-name{
				padding-bottom:10px
			}  
			.weui-pay-label{
				width:60px
			}  
			.weui-pay-m::before{
				border:0
			}  
			#refnoeg{
				padding-bottom:20px
			}  
			#refnoeg>div{
				width:90%;
				margin-top:5px;
				text-align:center;
				margin:0 auto
			}
			#refnoeg img{
				width:100%
			}
			#refout:after{
				border-bottom:1px solid #16bffa
			 }
		</style>
		<style type="text/css">
			#wraper_all{
				margin: 0 auto;
				position: relative;
				max-width: 750px;
			}
			.tab-bottom{
				max-width: 750px;
			}
			.main_title_wraper{
				height: 120px;
				line-height: 120px;
				background-image: radial-gradient(circle at center top,#ff6600,#c10707);
				color: white;
				font-size: 30px;
				/*box-shadow: yellow 0px 0px 10px 5px inset;*/
			}
			.main_title{
				padding: 10px;
				padding-left: 20px;
			}
			.mimo_title{
				font-size: 14px;
				padding-left: 14px;
			}
			.ensure_btn{
				color: white;
				width: 100%;
				background: #ff6600;
			}
			.liner-border{
				height: 10px;
			}
			.order-info{
				font-size: 12px;
				color: rgba(0,0,0,.7)
			}
			.lable-left{
				display: inline-block;
				width: 80px;
				color: rgba(0,0,0,.4);
			}
			.moeny_part{
				padding-top: 10px;
				width: 100%;
				text-align: center;
				font-size: 60px;
				line-height: 60px;
				font-weight: 700;
			}
			.order_mino{
				width: 100%;
				text-align: center;
				padding-bottom: 20px;
			}
			.logo{
				width: 60px;
				height: 60px;
				position: absolute;
				top: 0px;
				left: 20px;
			}
			.logo img{
				width: 100%;
			}
			.close {
				font-size: 28px;
				line-height: 28px;
				padding: 6px 12px 12px;
			}

			.video-shadow{
				width:100%;
				height:100%;
				position:absolute;
				left:0;
				top:0;
				z-index:998;
				background-color:#000;
				opacity:0.6;
				display:none;
			}
			.video-box-iconleft{
				width:20px;
				height:20px;
				vertical-align: middle;
			}
		</style>
	</head>
	<body data-gr-ext-installed="" data-new-gr-c-s-check-loaded="14.1012.0" ontouchstart="">
		<div id="wraper_all">
			<div class="weui-flex main_title_wraper">
				<div class="main_title">
					<span>UPIPAY</span>
					<span class="mimo_title">UPI Cashier</span>
				</div>
			</div>
			<div class="liner-border"></div>
			<div id="copyAmount">
				<p class="weui-payselect-info">click the amount to copy</p>
				<div class="moeny_part">
					<span>₹</span> 
					<span class="moeny"><?php echo $ramt; ?></span> 
				</div>
				<div class="order_mino"> 
					<span class="lable-left">Serial No:</span> 
					<span class="order_no"><?php echo $serial; ?></span> 
				</div>
			</div>
			<div class="weui-panel weui-panel_access">
				<div class="weui-panel__hd" style="color:#e71111">
					Step 1: Transfer&nbsp;&nbsp;
					<span style="color:#d375de;font-weight:bold"> ₹ <span class="moeny"><?php echo $ramt; ?></span> &nbsp;&nbsp;to the following upi </span>
				</div>
				<div class="weui-panel__bd">
					<div class="weui-media-box weui-media-box_text" style="padding-top:10px">
						<h4 class="weui-media-box__title" id="upi" style="color:#333;font-weight:500;margin:0 0 10px 0;text-shadow:1px 1px 0 #fff;background-color: #e0e73a4f;text-align:center;padding:10px 0;letter-spacing:1px;"><?php echo $upi_id;?></h4>
						<div style="text-align:center;padding-top:5px">
							<a class="weui-btn weui-btn_mini b-green" href="javascript:" id="btncopy" style="color:#487ef5;border:1px solid #487ef5!important"> Copy Beneficiary UPI </a>
						</div>
						<p class="weui-media-box__desc" style="margin-top:5px;text-align:left;"> 1. Open your UPI wallet and complete the transfer </p>
						<p class="weui-media-box__desc" style="margin-top:5px;text-align:left;"> 2. Record your reference No.(Ref No.) after payment </p>
					</div>
				</div>
			</div>
			<div id="bankinfo" class="weui-media-box weui-media-box_text" style="padding-top:10px; display: none">
				<ul class="weui-pay-u">
					<li>
						<span class="title">bank acc</span>
						<span class="content" id="bankAcc">loading</span>
						<span class="content"><a href="javascript:;" id="bankAccCopy" class="weui-btn weui-btn_mini  bg-blue">copy</a></span>
					</li>
					<li>
						<span class="title">IFSC</span>
						<span class="content" id="ifsc">loading</span>
						<span class="content"><a href="javascript:;" id="ifscCopy" class="weui-btn weui-btn_mini  bg-blue">copy</a></span>
					</li>
					<li>
						<span class="title">acc name</span>
						<span class="content" id="accName">loading</span>
						<span class="content"><a href="javascript:;" id="accNameCopy" class="weui-btn weui-btn_mini  bg-blue">copy</a></span>
					</li>
				</ul>
				<p class="weui-media-box__desc" style="margin-top:5px;text-align:left;"> 1. If UPI payment fails, try to transfer BANK account </p>
				<p class="weui-media-box__desc" style="margin-top:5px;text-align:left;"> 2. Open your BANK wallet and complete the transfer </p>
				<p class="weui-media-box__desc" style="margin-top:5px;text-align:left;"> 3. Record your reference No.(Ref No.) after payment </p>
			</div>
			<div style="background: rgba(0,0,0,.1); width: 100%; height: 1px; display: block; position: relative;"></div>
			<p class="weui-media-box__desc" id="open-video" style="margin-left: 15px; margin-top:5px;text-align:left; color: #0b77ff">
				<img class="video-box-iconleft open-video" id="video" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADIBAMAAABfdrOtAAAAHlB
				MVEVHcEzcIRbcIhbcIhfcIhbcIhf////zr6vobWX52NY+JjLHAAAABXRSTlMAMKRq1hyT/2AAAAK9SURBVHja7dvPbqpQEAZwsXSvNd0bxb2tdd8o7Ctwcu8T0PYBSPoCvEM
				f90JII95aMjOHb9KQ+bY2/przFzxnJhOLxWKxWCwWi8XyGzKbX2Q28/3CYL7Y7VZ1oiiOY9eT+uO4+cP1evcwp7n1dz+uot5v7U98WDXaz//9InKD5fBw1bjZuEGTbq8YiRs
				4+RZvfFeCjQMkvRxtTw6S40VjOVC6DbZHIVmnRxws514JccgzvrU67QVsrXN7hUjkq702SCRVaC3nwDOxOx9DLNJ2yj0WOeH7/avnEyySK/R72/MqSIhGmuF1i0Ze8CO4HcN
				7NJLhp0k7URI00kwUBw98oW83RxXkBo9sdZApHlmOCAnxyDN1Ef7rtQwTkT+lBlKUHsg9FZErJwYiVlhIUWkgQoWJvFcyZM9BZErGREQKG5EofKR4rRQQvpJRH7s6SPHKfvA
				SIFxFhjAVIcJTpEjxxkISGcJRcjFSfGogdMUHISs59c3hGkJWvJDiQwMhKp4I7eHCFyEp3ghF8UcIij9C2I/9kUqhuaqRDOFSYTKWCstKqbBAkt9XPJAPh0fohhyhb/E1Itx
				+OYZ0j+cYUoRlCBGeUSOCx9Q3niF6FuYaEoT7CiRB+AYfERg1wnsxlRjct1+RwUT4r/B8RGiwEKlRI+Sfot6lBuP3LrnBQOQGHfGJEnKLR15GhKgcbdhxEwsZzznjeM5+VY7
				KdQ79N2gk1bqIAd9QTlqXY+DrylLrwlKgMBd1LpGhx3Cmd7Fvih9cSpctsT2f468Lny8MT/FdonQpWeV6NfJRdal75R036bNuPUWCnYlt7jDGcYIv20j/L0QCKN9LaYLBlWt
				FQZO7YXv/+EPR1uJxKCde99WFBZ7VYG0x2IxR19YUtkX9VW15HseHA6+srUcNLuvz5oGVLFosFovFYrFYLL8i/wCdk3qgGTqe1wAAAABJRU5ErkJggg==" 
				style="width:20px;height:20px; vertical-align: middle;">
					How it works ? need help? click here！
			</p>
			<div class="video-shadow"></div>
			<div id="videoFrame" style="display:none; position:fixed; z-index:1000; width:100%; height:100%; left:50%; top:50%; transform:translate(-50%,-50%)">
				<video controls="" height="100%" id="video1" loop="" src="" style="vertical-align:baseline" width="100%">
				</video>
				<div class="close" id="close-video" style="border-radius:100px;position:fixed;bottom:30px;left:50%;transform:translate(-50%,0);z-index:10000;width:20px;height:20px;background:#39c;top:initial;color:#fff;display:flex;justify-content:center">
					×
				</div>
			</div>
			<div class="weui-panel weui-panel_access">
				<div class="weui-panel__hd" style="color:#e71111">
					Step 2: Submit Ref No/Reference No/UTR
				</div>
			</div>
			<div class="weui-pay" style="padding:0;padding-top:0">
				<div class="weui-pay-inner" style="border-radius:0">
					<div class="weui-pay-input" id="refout">
						<input class="weui-pay-inputs" id="refno" placeholder="Input 12-digit here" minlength="12" maxlength="12" style="padding-left:0;text-align:center;font-size:36px" type="number">
					</div>
					<div class="weui-pay-intro">
						Generally, your transfer will be confirmed within 10 minutes
					</div>
				</div>
			</div>
			<div class="weui-panel weui-panel_access" style="background-color:#f1f1f1;margin-top:0">
				<div class="weui-panel__hd" style="color:#888">
					Where to find Ref No.
				</div>
				<div id="refnoeg">
					<div>
						<img src="assets/img/wepay/demo-1.png">
					</div>
					<div>
						<img src="assets/img/wepay/demo-2.png">
					</div>
					<div>
						<img src="assets/img/wepay/demo-3.png">
					</div>
					<div>
						<img src="assets/img/wepay/demo-4.png">
					</div>
					<div>
						<img src="assets/img/wepay/demo-5.png">
					</div>
					<div>
						<img src="assets/img/wepay/demo-6.png">
					</div>
				</div>
			</div>
			<div style="clear:both;height:75px">
				&nbsp;
			</div>
			<div class="weui-tabbar tab-bottom" style="padding:15px 0 20px 0">
				<a class="weui-btn weui-btn_primary ensure_btn" href="javascript:" id="savebtn"> Submit Ref Number </a>
			</div>
			<div class="loading2 hide" data-text="confirming, please wait"></div>
		</div>
		<script type="text/javascript">
		  // var bankAccCopyBoard = new ClipboardJS("#bankAccCopy", {
		  //     text: function() {
		  //         var e = $("#bankAcc").html();
		  //         return e
		  //     }
		  // });
		  // bankAccCopyBoard.on("success", function() {
		  //     layer.msg("bank acc copied successfully")
		  // });
		  // bankAccCopyBoard.on("error", function() {
		  //     layer.msg("bank acc failed, Please input manually")
		  // });

		  var ifscCopyBoard = new ClipboardJS("#ifscCopy", {
			  text: function() {
				  var e = $("#ifsc").html();
				  return e
			  }
		  });
		  ifscCopyBoard.on("success", function() {
			  layer.msg("ifsc copied successfully")
		  });
		  ifscCopyBoard.on("error", function() {
			  layer.msg("ifsc failed, Please input manually")
		  });


		  var accNameCopy = new ClipboardJS("#accNameCopy", {
			  text: function() {
				  var e = $("#accName").html();
				  return e
			  }
		  });
		  accNameCopy.on("success", function() {
			  layer.msg("acc name copied successfully")
		  });
		  accNameCopy.on("error", function() {
			  layer.msg("acc name failed, Please input manually")
		  });

		function process() {
			$.post(base_url + "/cashier/v1/IN_UPI/" + order_no,
				function(e) {
					if (e.code == -1){
						window.location.href = base_url + "/cashier/v1/IN_UPI/fail/" + order_no;
						return;
					}
					if (e.data.success != null && e.data.success){
						window.location.href = success_url+order_no;
						return;
					}
					if (100 === e.code) {
						if (100 === parseInt(status)) return;
						status = parseInt(e.code),
							pa = e.data.upi.pa,
							cu = e.data.upi.cu,
							mc = e.data.upi.mc,
							tn = e.data.upi.tn,
							tr = e.data.upi.tr,
							am = e.data.upi.am,
							pn = e.data.upi.am,
							// bank = e.data.upi.bank,
							// ifsc = e.data.upi.ifsc,
							// accName = e.data.upi.accName,
							tno = e.data.order_no,
							$(".moeny").html(am),
							$(".order_no").html(tno),
							$("#upi").html(pa)
							// $("#bankAcc").html(bank)
							// $("#ifsc").html(ifsc)
							// $("#accName").html(accName)

							// if (parseFloat(am) >= 10000){
							//     $("#bankinfo").show();
							// }
					} else - 1 === e.code ? alert(e.msg) : 200 === e.code ? alert(e.msg) : 40006 === e.code && alert(e.msg)
				})
		}
		function getQueryString(e) {
			var url = window.location.href;
			var index = url.lastIndexOf("/");
			return url.substring(index + 1, url.length);
		}
		var pa = "",
			cu = "",
			mc = "",
			tn = "",
			tr = "",
			am = "",
			pn = "",
			order_no = null,
			tno = null,
			status = -1,
			// base_url = "http://127.0.0.1:5566";
			// base_url = 'https://checkout.atpay.cc';
			base_url = '';
			success_url = "success/",
		order_no = getQueryString("no"),
			null === order_no || "" === order_no ? alert("Please replace your order.") : process(),
			layer.alert("<span style='word-break:break-word;'>After the payment is successful, you must coming back here to submit the Ref/UTR No.(12 digits) Only then your money be reached to the account.</span>", {
				title: "Cashier",
				icon: 0,
				btn: ["OK"]
			});
		</script>
		<div class="layui-layer-shade" id="layui-layer-shade1" times="1" style="z-index: 19891014; background-color: rgb(0, 0, 0); opacity: 0.3;">
		</div>
		<div class="layui-layer layui-layer-dialog" id="layui-layer1" type="dialog" times="1" showtime="0" contype="string" style="z-index: 19891015; width: 360px; top: 282px; left: 334px; display:none;">
			<div class="layui-layer-title" style="cursor: move;">Cashier</div>
			<div id="" class="layui-layer-content layui-layer-padding">
				<i class="layui-layer-ico layui-layer-ico0"></i>
				<span style="word-break:break-word;">After the payment is successful, you must coming back here to submit the Ref/UTR No.(12 digits) 
				Only then your money be reached to the account.</span>
			</div>
			<span class="layui-layer-setwin">
				<a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a>
			</span>
			<div class="layui-layer-btn layui-layer-btn-">
				<a class="layui-layer-btn0">OK</a>
			</div>
			<span class="layui-layer-resize"></span>
		</div>
		<div class="layui-layer-move"></div>
		<script>
			var ramt = <?php echo $ramt; ?>;
			var serial = <?php echo $serial; ?>;
			var upi = document.getElementById("upi").innerHTML;
		
			var copyAmount = new ClipboardJS("#copyAmount", {
			  text: function() {
				  var e = am;
				  return e
			  }
			});
			copyAmount.on("success",
			function() {
			  layer.msg("amount copied successfully")
			});

			var clipboard = new ClipboardJS("#btncopy", {
				text: function() {
					var e = $("#upi").html();
					return e
				}
			});
			clipboard.on("success",
				function() {
					layer.msg("UPI copied successfully")
				}),
				clipboard.on("error",
					function() {
						layer.msg("UPI copied failed, Please input manually")
					}),
				$(function() {
					$('#refno').bind('input propertychange', function() {
					   var v =  $("#refno").val();
					   if (v.length >= 12){
						   $("#savebtn").click();
					   }
					});

					$("#savebtn").on("click",
						function() {
							var e = $("#refno").val();
							var refNo = e;
							return 12 != e.length ? (layer.msg("Invalid Ref Number"), !1) : void layer.confirm("<span style='word-break:break-word'><span style='color:#f80'>For your money security, please confirm the following information carefully</span><br><br>UPI : <code style='color:#487ef5'>" + upi + "</code><br>Transfer amount : <code style='color:#487ef5'>" + ramt + "</code><br>Ref No : <code style='color:#487ef5'>" + refNo + "</code></span>", {
									title: "Security",
									btn: ["Confirm", "Cancel"]
								},
								function() {
									layer.closeAll();
									//showLoading();
									//setTimeout(closeLoading, 2000);
									adddep(ramt,refNo,serial);
								},
								function() {})
						})

					 $("#open-video").click(function (){

						//

						layer.load();
						 $(".video-shadow").css({'display':'block'});
						 $('.addBox').show();
						$("#videoFrame").fadeIn(500);
						document.getElementById("video1").src = "https://objects.bzpay.cc/demo/payment_demo_low.mp4"
						document.getElementById("video1").load();
						$("#video1")[0].play();
						layer.closeAll();
					});

					$("#close-video").click(function (){
						$("#video1")[0].pause();
						$("#videoFrame").fadeOut(500);
						$(".video-shadow").css({'display':'none'});
						$('.addBox').hide();
						layer.closeAll();
					});
				});

			function handelResp(e){
				0 == e.code ? 0 == e.data.type ? layer.alert(e.msg, {
					title: "Congratulations",
					icon: 6,
					btn: ["OK"]
				},
				function() {
					window.location.href = e.data.redirectUrl
				}) : 1 == e.data.type ? layer.alert(e.msg, {
					title: "Sorry",
					icon: 5,
					btn: ["OK"]
				},
				function() {
					window.location.href = e.data.redirectUrl
				}) : 2 == e.data.type ? layer.alert("<span style='word-break:break-word'>" + e.msg + "</span>", {
					title: "Cashier",
					icon: 6,
					btn: ["OK"]
				},
				function() {
					window.location.href = e.data.redirectUrl
				}) : window.location.href = e.data.redirectUrl: layer.alert(e.msg, {
				title: "Sorry",
				icon: 5,
				btn: ["OK"]
				})
			}


			function showLoading(){
				$(".loading2").show();
			}
			function closeLoading(){
				$(".loading2").hide();
			}
			
			function depconfirm(refnum){
				window.location.href = 'depositconfirm.php?amt=' + ramt + '&refnum=' + refnum + '&srl=' + serial;
			}
			
			function adddep(amt,refnum,srl)
			{
				$.ajax({
				type: "Post",
				data:"amt=" + amt+ "& refnum=" + refnum+ "& srl=" + srl+ "& source=" + "wepay" ,
				url: "adddeposit.php",
				success: function(html)   
					{ //alert(html);
						var arr = html.split('~');
						
						if (arr[0]== 1) {
							showLoading();
							setTimeout(depconfirm, 1900, refnum);
						}	
						else if(arr[0]==0)
						{ 
							alert("Error");
						}				
					},
					  error: function (e) {}
				});				
			}
		</script>
	</body>
</html>