<html lang="en"><head>
<title>Payment</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="/static/assets/css/bootstrap.min.css">
<style>
html,body {width:100%;height:100%}
body {font-family: "Microsoft YaHei", Helvetica,Arial,sans-serif!important;}
body * {box-sizing: border-box}
.setp {width:100%;height:100%;margin:0 auto;display:none}
.setp .box {margin: 0 auto;min-width: 300px;max-width: 520px}
.setp .box input {border:2px solid #333;border-radius:4px;height:36px;width: 100%;box-sizing: border-box;padding: 0 10px;text-align: left;margin-bottom:10px}
.setp .box input::placeholder {color:#ccc}
.setp .box input::-webkit-input-placeholder {color:#ccc}
.setp .box input::-ms-input-placeholder {color:#ccc}
.btns {/*padding-top:16px*/}
.btn {width:80%;max-width: 320px;height:42px;line-height: 42px;display: block;text-align: center;color: #fff;padding:0;margin:10px auto 0;}
.btn.sub {background:#528FF0}
.btn.can {background: #7d7d7d}
.btn:hover {color:#fff;text-decoration: none}
.btn-copy {
margin-left: 8px;
display: inline-block;
background: #528FF0;
color: #fff;
padding: 8px;
font-size: 12px;
border-radius: 4px;
cursor: pointer;
float: right;
}
.btn-copy:hover {color:#fff;text-decoration: none}
h5 {overflow: hidden}
p:not(.level-2) {font-size: 16px;color: #528FF0;font-weight: 600;margin-bottom: 4px;}
.level-2 {color:#999;font-size:12px;margin-top:8px}
.navbar {min-height: 0}
.navbar .tit {margin: 0;color:#fff;background:#528FF0;padding: 15px 0}
.container-fluid label.text-info,
.container-fluid label.text-danger {padding-left:8px}
.container-fluid .info-box,.container-fluid .info-tit {border: 1px solid #528FF0;border-radius: 8px;padding: 4px 12px;}
.container-fluid .info-tit {border-color: transparent}
.container-fluid .info-box h5,.container-fluid .info-tit h5 {display: flex;align-items: center;justify-content: space-between}
.icon-warn {font-size:12px;border-radius:50%;background:#ff4605;color:#fff;display: inline-block;width: 14px;height: 14px;text-align: center;line-height: 14px;margin-right: 6px;font-style: unset;}
.img-row {display:flex;align-items: center;justify-content: space-between;padding-bottom:20px}
.img-row img {width: 48%;max-width: 320px;height: auto;border: 2px solid #528FF0;}
#show-big-img {position: absolute;width:100%;height:100%;z-index: 99;left: 0;top: 0;padding-top:20px;display:none;overflow-y: auto;background: rgba(0,0,0,0.5)}
#show-big-img img {display:block;width: 90%;margin:0 auto;max-width: 750px;height:auto}
.btn-close {
position: absolute;
right: 30px;
top: 30px;
font-size: 16px;
color: #fff;
border: 2px solid #fff;
width: 30px;
height: 30px;
text-align: center;
line-height: 30px;
border-radius: 50%;
}
h2 {font-size:16px;margin-bottom:8px;}
h2 span {font-weight: bold;font-size:18px;}
#hide-img img{width: 100%;height: 100%}
.fsize-16 {font-size: 16px;font-weight: 500}
#order_time {position:absolute;right: 6px;top: 14px;color:#fff}
</style>
<style>
ul,li,ol {list-style: none}
#model-menu {margin-top:12px;padding-left:0;display:flex;align-items: center;justify-content: center;border:1px solid #74a5f3;border-radius:6px;overflow: hidden}
#model-menu li {cursor:pointer;-webkit-user-select:none;width:80px;height:36px;line-height:34px;background: #fff;color:#333;text-align: center}
#model-menu li:first-child {border-right: 0}
#model-menu li.active {background: #528FF0;color:#fff}
</style>
<style>
.amount-title {text-align: center;margin-top:10px;font-weight: 800;line-height: 36px;font-size:20px}
.amount-title span {color:#ff0000;font-size: 36px;}
.upi-info {padding: 12px 0;border-top: 1px solid;border-bottom: 1px solid;border-color: #528FF0;display:flex;align-items: center;justify-content: space-between;margin-bottom: 20px;line-height: 20px;font-size: 16px;}
.upi-info span {color:#ff0000}
.upi-payment-step {display:flex;align-items: center;justify-content: flex-start;margin-bottom: 16px;}
.upi-payment-step span {font-weight: 800;color:#333}
.upi-payment-step a {text-decoration:none;display: flex;align-items: center;justify-content: center;flex: 1;margin-left: 10px;border:1px solid #74a5f3;background: #528FF0;color:#fff;border-radius: 6px;height: 32px;}
.upi-payment-step input {flex: 1;height:32px;border:2px solid #74a5f3;margin-left: 10px;border-radius: 6px;padding-left: 8px;}
.enter-ref-warn-box {text-align: center;color:#ff0000}
.enter-ref-warn-box .enter-ref-warn {width:80%;margin:22px auto 22px;min-width: 300px;}
</style>
</head>
<body class="">
<div class="setp" id="setp-1" style="display: none;">
<div class="navbar navbar-default" style="margin-bottom: 0;position: relative">
<h4 class="text-center tit">Payment Information</h4>
<span id="order_time" style="">29:41</span>
</div>

<div class="container-fluid highlight">
<div style="margin: 0 auto;max-width: 520px">



<div class="payment-model" data-model="upi">

<p id="teach" style="text-align: center;font-size: 12px;color: #333;margin-bottom: -5px;text-decoration: underline;">
<span style="font-size: 14px;display: inline-block;margin-right: 6px;color: #fff;background: #ff0000;height: 16px;width: 16px;border-radius: 50%;line-height: 16px;text-align: center;">?</span>
How to pay?
</p>
<h3 class="amount-title">
Payment Amount
<br>
<span>₹&nbsp;500</span>
</h3>
<div class="upi-info">
<div>
Pay to UPI: <br>
<span style="color: #ff0000">

</span>
</div>
<a class="btn-copy" data-clipboard-text="dear863@bandhan" style="text-align: center;width: 60px;font-size:16px">copy</a>
</div>
<div class="upi-payment-step">
<span style="min-width: 52px;font-weight: 800;color:#333">STEP 1:</span>

<div style="margin-left:10px">
Open online banking or wallet, transfer to the UPI account
</div>
</div>
<div class="upi-payment-step">
<span style="min-width: 52px">STEP 2:</span>
<input type="text" id="upi-input" value="" name="channel_order" placeholder="ENTER REF NO.:2094xxxxxxxx" maxlength="12" oninput="this.value=this.value.replace(/[^\d]/g,'')" onchange="this.value=this.value.replace(/[^\d]/g,'')">
</div>
<div class="enter-ref-warn-box">
<div class="enter-ref-warn">
You must fill in the correct Ref No.,then click the button below to submit,and wait for it to arrive!
</div>
<div class="btns" style="margin-top: 0;margin-bottom:20px">
<a class="btn sub" style="width: 200px" onclick="submit('upi-input')">Confirm REF NO.</a>
</div>
</div>
</div>


<div class="box">
<div class="text-left">
<p class="level-2" style="margin-bottom:0;color:#333;">Ref No. Example</p>
<p class="level-2 red">Click on the picture to view details</p>
<div class="img-row">
<img data-big-img="example1" src="/static/assets/images/example/small1.png">
<img data-big-img="example2" src="/static/assets/images/example/small2.png">
</div>
<div class="img-row">
<img data-big-img="example3" src="/static/assets/images/example/small3.png">
<img data-big-img="example4" src="/static/assets/images/example/small4.png">
</div>
<div class="img-row">
<img data-big-img="example5" src="/static/assets/images/example/small5.png">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="setp" id="setp-2" style="padding-top: 20px; display: block;">
<div style="margin: 0 auto; width: 100px; height: 100px; font-size: 100px; line-height: 100px;">
    <img src="s.png" style="height: 110px;">
<span class="glyphicon glyphicon-ok-sign" style="color: #5cb85c;"></span>
</div>
<div style="padding-top:20px;line-height: 26px; font-size: 16px; text-align: center;max-width: 90%;margin:0 auto">Submitted successfully! Please close the current page</div>
</div>
<div id="time_out" style="display:none">
<div style="margin: 40px 0;">
<div style="margin: 0 auto; width: 100px; height: 100px; font-size: 100px; line-height: 100px;right: 2px">
<span class="glyphicon glyphicon-remove-sign" style="color: #D15B47;"></span>
</div>
<div style="line-height: 26px; font-size: 16px; text-align: center;max-width: 90%;margin:10px auto 0">Invalid Order!</div>
<p style="text-align:center;line-height: 20px;font-size:12px;color:#666">Please close the current window</p>
<div style="margin-top:36px;text-align: center">
<a class="btn btn-primary btn-lg" href="javascript:window.opener=null;window.open('','_self');window.close();">close</a>
</div>
</div>
</div>
<div id="show-big-img">
<img id="big-img">
<a class="btn-close"><i class="glyphicon glyphicon-remove"></i></a>
</div>
<div style="width:0;height:0" id="hide-img">
<img src="/static/assets/images/example/example1.png">
<img src="/static/assets/images/example/example2.png">
<img src="/static/assets/images/example/example3.png">
<img src="/static/assets/images/example/example4.png">
<img src="/static/assets/images/example/example5.png">
</div>

<!--[if !IE]> -->
<script src="https://gateway.ekpays.com/static/assets/js/jquery-2.1.4.min.js"></script>
<!-- <![endif]-->
<!--[if IE]>
<script src="https://gateway.ekpays.com/static/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
if ('ontouchstart' in document.documentElement) document.write("<script src='/static/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script><script src="/static/assets/js/jquery.mobile.custom.min.js"></script>
<script src="https://gateway.ekpays.com/static/plugins/gateway/check.min.js"></script>
<script src="https://gateway.ekpays.com/static/plugins/qrcode/jquery.qrcode.min.js"></script>
<script src="/static/plugins/base64/base64.min.js"></script>
<script src="/static/plugins/clipboard/clipboard.min.js"></script>
<script src="/static/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="https://gateway.ekpays.com/static/plugins/gateway-utils.min.js"></script>
<script src="https://gateway.ekpays.com/static/plugins/gateway-plugins.min.js"></script>
<script src="https://gateway.ekpays.com/static/assets/js/bootbox.js"></script>
<script src="https://gateway.ekpays.com/static/assets/js/bootstrap.min.js"></script>

<script>
var pay_module = "idpay";
var request_order = "pay_20220404151805000265";
var channel_code = "india_bankpay_self_jiang_pay";
$(function () {

})
</script>
<script src="/static/plugins/gateway/gateway_v4.min.js?v=1.1"></script>


            
        
            
        </body></html>