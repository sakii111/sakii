<?php 
	session_start();
	if (!isset($_SESSION['frontuserid'])) {
		echo "<script> 
		window.location = './login.php';
		</script>";
	}
	include("include/connection.php");
?>

<?php 
	if(isset($_GET['amt'])){
	$amt = $_GET['amt'];
	} else{
		$amt = 0;
	}
	if(isset($_GET['refnum'])){
	$refnum = $_GET['refnum'];
	} else{
		$refnum = 0;
	}
	if(isset($_GET['srl'])){
	$srl = $_GET['srl'];
	} else{
		$srl = 0;
	}
?>
<html lang="zh-cmn-Hans">
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
		<title>Payment successful</title>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
		<meta content="True" name="HandheldFriendly">
		<meta content="320" name="MobileOptimized">
		<meta content="on" http-equiv="cleartype">
		<meta content="telephone=no,email=no,adress=no" name="format-detection">
		<meta content="yes" name="mobile-web-app-capable">
		<link href="assets/css/wepay/weui2.min.css" rel="stylesheet">
		<link href="assets/css/wepay/weuix.min.css" rel="stylesheet">
		<link href="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" rel="shortcut icon" type="image/x-icon">
		<style type="text/css" id="operaUserStyle"></style>
	</head>
	<body data-weui-theme="light">
		<div class="weui-pay">
			<h1 class="weui-payselect-title">
				<i class="weui-icon-info-circle"></i> 
				<span id="_m"></span>
				<span id="_s"></span>
			</h1>
			<p class="weui-pay-num">₹<?php echo $amt; ?></p>
			<ul class="weui-pay-u">
				<li>
					<span class="title">UTR / Ref No</span>
					<span class="content"><?php echo $refnum; ?></span>
				</li>
				<li>
					<span class="title">Tansaction No</span>
					<span class="content"><?php echo $srl; ?></span>
				</li>
			</ul>
			<div class="weui-msg" style="opacity: 1;" id="s2">
				<div class="weui-msg__text-area">
					<h2 class="weui-msg__title">The transaction is being confirmed, please do not close the page</h2>
					<p class="weui-msg__desc">Generally, your transfer will be confirmed within 10 minutes</p>
				</div>
				<div class="weui-msg__extra-area">
				</div>
			</div>
			<div class="pay-div">
				<a href="javascript:;" class="weui-btn weui-btn_primary weui-btn_loading">
					<i class="weui-loading"></i>confirming
				</a>
			</div>
		</div>

<script src="assets/js/wepay/jquery-2.2.4.min.js"></script>
<script>

    // var base_url = '';
    var base_url = '';
    var order_no = "ApOGapJbJkm6";
    var refNo = "017706149240";

    $(function (){
        countTime();

        //setInterval(check, 3000);
        // setInterval(submitUtr, 5000);
    })

    // function submitUtr(){
    //     $.post(base_url + "/cashier/v1/IN_UPI/ref/" + order_no, {refNo: refNo}, function (e){
    //         console.log(e)
    //     });
    // }

    function check(){
        $.post(base_url + "/cashier/v1/IN_UPI/" + order_no, function(e) {
            console.log(e)
            if (e.code == -1){
                window.location.href = base_url + "/cashier/v1/IN_UPI/fail/" + order_no;
                return;
            }
            if (e.data.success != null && e.data.success){
                window.location.href =base_url + "/cashier/v1/IN_UPI/success/" + order_no;
                return;
            }

        });
    }
	
	var edate = new Date();
    var enow = edate.getTime();
    var endTime = enow + 600000;

    function countTime() {
        //获取当前时间
        var date = new Date();
        var now = date.getTime();
        //设置截止时间
        var endDate = new Date(endTime);
        var end = endDate.getTime();
        //时间差
        var leftTime = end-now;
        //定义变量 d,h,m,s保存倒计时的时间
        var d,h,m,s;
        if (leftTime>=0) {
            m = Math.floor(leftTime/1000/60%60);
            s = Math.floor(leftTime/1000%60);
        }
        if (m == undefined || s == undefined){
            m = 0;
            s = 0;
            alert("Please check the UTR/Ref No as same as the Amount, otherwise the transaction may not be confirmed!");
            location.reload();
        }

        //将倒计时赋值到div中
        document.getElementById("_m").innerHTML = m+"m";
        document.getElementById("_s").innerHTML = s+"s";
        //递归每秒调用countTime方法，显示动态时间效果
        setTimeout(countTime,1000);

    }

    function getQueryString(e) {
        var url = window.location.href;
        var index = url.lastIndexOf("/");
        return url.substring(index + 1, url.length);
    }


</script>
</body></html>