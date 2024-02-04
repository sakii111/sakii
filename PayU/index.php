
<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}


$am=$_GET['am'];


$MERCHANT_KEY = "zBIoUA";
$SALT = "szrKh5qj";
// Merchant Key and Salt as provided by Payu.

//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Paytm Secure Online Payment Gateway</title>
    <meta name="description" content="Paytm Secure Online Payment Gateway">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="https://staticpg.paytm.in/pgp/v2/mobile/assets/paytm_fav.png">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1">
    <meta name="previous-version" content="2153">
    <meta name="current-version" content="2156">

    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            box-sizing: border-box
        }

        html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(201, 224, 253, 0);
            font-size: 62.5%
        }

        body {
            font-size: 1.7rem;
            line-height: 1.2;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-weight: 400;
            color: #000;
            background: #fff;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        body,
        html {
            -webkit-overflow-scrolling: touch;
            height: 100%
        }

        .tempheader {
            background: #f4f7f8;
            font-weight: 400 !important;
            height: 100px !important;
            padding: 20px !important;
            margin-top: 0 !important;
            font-size: 18px
        }

        section.s-s {
            width: auto;
            clear: both;
            padding-bottom: 21px;
            margin-left: 50px;
            margin-top: 20px
        }

        .check,
        .line {
            background: #f7f9fa
        }

        .check {
            border-radius: 4px;
            width: 12px;
            height: 12px;
            left: -24px
        }

        .line {
            height: 11px;
            border-radius: 2px;
            margin-top: 5px
        }

        .w50 {
            width: 50%
        }

        .w70 {
            width: 70%
        }

        #topHead {
            font-size: 17px;
            width: 90%;
            top: 60px
        }

        .fr {
            float: right
        }

        @media screen and (max-width:319px) {
            .tempheader {
                padding: 8px !important;
                height: 42px !important
            }

            #topHead {
                top: 12px;
                font-size: 15px
            }

            section.s-s {
                padding-bottom: 10px;
                margin: 20px 0 0 35px
            }
        }
    </style>
    <meta name="theme-color" content="#00b9f5">
    <link id="page-animation" defer-href="https://staticpg.paytm.in/pgp/v2/lib/animation/animation.css" rel="stylesheet"
        href="https://staticpg.paytm.in/pgp/v2/lib/animation/animation.css">
    <style>
        .sprite {
            background-image: url(https://staticpg.paytm.in/pgp/v2/mobile/assets/sprite2@1x.png)
        }

        .sprite1 {
            background-image: url(https://staticpg.paytm.in/pgp/v2/mobile/assets/sprite1@1x.png)
        }
    </style>
    <link rel="shortcut icon" href="https://staticpg.paytm.in/pgp/v2/mobile/favicon.ico">
    <style>
        @-webkit-keyframes bounce {

            0%,
            80%,
            to {
                -webkit-transform: scale(.2);
                transform: scale(.2)
            }

            40% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes bounce {

            0%,
            80%,
            to {
                -webkit-transform: scale(.2);
                transform: scale(.2)
            }

            40% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @-webkit-keyframes _2FV0 {
            0% {
                visibility: hidden;
                opacity: 0;
                -webkit-transform: translateY(-100px);
                transform: translateY(-100px)
            }

            to {
                -webkit-transform: translate(0);
                transform: translate(0);
                visibility: visible;
                opacity: 1
            }
        }

        @keyframes _2FV0 {
            0% {
                visibility: hidden;
                opacity: 0;
                -webkit-transform: translateY(-100px);
                transform: translateY(-100px)
            }

            to {
                -webkit-transform: translate(0);
                transform: translate(0);
                visibility: visible;
                opacity: 1
            }
        }

        @-webkit-keyframes _11dj {
            0% {
                opacity: 0;
                overflow: hidden
            }

            to {
                opacity: 1;
                height: auto;
                overflow: initial;
                visibility: visible
            }
        }

        @keyframes _11dj {
            0% {
                opacity: 0;
                overflow: hidden
            }

            to {
                opacity: 1;
                height: auto;
                overflow: initial;
                visibility: visible
            }
        }

        @-webkit-keyframes _2aj_ {
            0% {
                background: 0 0
            }

            to {
                background: rgba(0, 0, 0, .5)
            }
        }

        @keyframes _2aj_ {
            0% {
                background: 0 0
            }

            to {
                background: rgba(0, 0, 0, .5)
            }
        }

        @-webkit-keyframes _1eRN {
            0% {
                -webkit-transform: translate(-50%, -100%);
                transform: translate(-50%, -100%)
            }

            to {
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%)
            }
        }

        @keyframes _1eRN {
            0% {
                -webkit-transform: translate(-50%, -100%);
                transform: translate(-50%, -100%)
            }

            to {
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%)
            }
        }

        @-webkit-keyframes _3gAD {
            0% {
                bottom: -100%
            }

            to {
                bottom: 0
            }
        }

        @keyframes _3gAD {
            0% {
                bottom: -100%
            }

            to {
                bottom: 0
            }
        }

        @-webkit-keyframes _3GvM {
            0% {
                left: 100%
            }

            to {
                left: 0
            }
        }

        @keyframes _3GvM {
            0% {
                left: 100%
            }

            to {
                left: 0
            }
        }

        .btn,
        button,
        input,
        select,
        textarea {
            -webkit-appearance: none
        }

        .custom-check input~.c-mark:after,
        .custom-radio input~.c-mark:after {
            content: "";
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out
        }

        .btn,
        .spinner,
        .text-center {
            text-align: center
        }

        .text-left {
            text-align: left
        }

        .spinner {
            width: 70px;
            height: 12px
        }

        .spinner.verify-otp {
            width: 200px
        }

        .spinner>div {
            width: 10px;
            height: 10px;
            background: #012b71;
            border-radius: 100%;
            z-index: 2;
            -webkit-animation: bounce 1s infinite ease-in-out both;
            animation: bounce 1s infinite ease-in-out both
        }

        .spinner.verify-otp>span.text {
            font-style: italic;
            margin-right: 16px
        }

        .spinner .bounce4,
        .spinner .bounce5 {
            background: #48baf5
        }

        .spinner .bounce1 {
            -webkit-animation-delay: -.64s;
            animation-delay: -.64s
        }

        .spinner .bounce2 {
            -webkit-animation-delay: -.48s;
            animation-delay: -.48s
        }

        .spinner .bounce3 {
            -webkit-animation-delay: -.32s;
            animation-delay: -.32s
        }

        .spinner .bounce4 {
            -webkit-animation-delay: -.16s;
            animation-delay: -.16s
        }

        .custom-check,
        .custom-radio {
            height: 20px;
            width: 20px
        }

        .custom-check input,
        .custom-radio input {
            opacity: 0;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            z-index: 1;
            cursor: pointer
        }

        .custom-check input~.c-mark {
            border-radius: 3px
        }

        .custom-check input~.c-mark,
        .custom-radio input~.c-mark {
            border: 1px solid #b8c2cb;
            height: 18px;
            width: 18px;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            position: relative
        }

        .custom-check input:disabled~.c-mark {
            opacity: .5
        }

        .custom-check input~.c-mark:after {
            left: 6px;
            top: 2px;
            width: 3px;
            height: 8px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            -webkit-transform: rotate(45deg) scale(0);
            -ms-transform: rotate(45deg) scale(0);
            transform: rotate(45deg) scale(0)
        }

        .custom-check input[type=checkbox]:checked~.c-mark,
        .custom-check.selected input[type=checkbox]~.c-mark,
        .type-option-list.active .po-icon input[type=checkbox]~.c-mark {
            border: 1px solid #00b9f5;
            background: #00b9f5
        }

        .custom-check input[type=checkbox]:checked~.c-mark:after,
        .custom-check.selected input[type=checkbox]~.c-mark:after,
        .type-option-list.active .po-icon input[type=checkbox]~.c-mark:after {
            -webkit-transform: rotate(45deg) scale(1);
            -ms-transform: rotate(45deg) scale(1);
            transform: rotate(45deg) scale(1)
        }

        .custom-radio input~.c-mark {
            border-radius: 50%;
            border-width: 1.5px
        }

        .custom-radio input~.c-mark:after {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #00b9f5;
            -webkit-transform: translate(-50%, -50%) scale(0);
            -ms-transform: translate(-50%, -50%) scale(0);
            transform: translate(-50%, -50%) scale(0);
            opacity: 0
        }

        .custom-radio input[type=radio]:checked~.c-mark,
        .custom-radio.selected input[type=radio]~.c-mark,
        .type-option-list.active .po-icon input[type=radio]~.c-mark {
            border: 1.5px solid #00b9f5
        }

        .custom-radio input[type=radio]:checked~.c-mark:after,
        .custom-radio.selected input[type=radio]~.c-mark:after,
        .type-option-list.active .po-icon input[type=radio]~.c-mark:after {
            opacity: 1;
            -webkit-transform: translate(-50%, -50%) scale(1);
            -ms-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1)
        }

        .clearfix:after {
            content: " ";
            display: table;
            clear: both
        }

        .fl {
            float: left
        }

        .fr {
            float: right
        }

        .p20 {
            padding: 20px
        }

        .prl-20 {
            padding-right: 20px;
            padding-left: 20px
        }

        .arrow-down,
        .arrow-left,
        .arrow-right,
        .btn,
        .check,
        .choosed-emi p,
        .ib,
        .icon-chevron_down_dark.arrow-down,
        .icon-chevron_down_dark.arrow-down-convc,
        .nb-banks.active .po-n .tick-select,
        .p-option>.active .po-n .p-amount,
        .spinner,
        .spinner>div,
        .sprite,
        span .icon-chevron_down_dark.arrow-right {
            display: inline-block
        }

        .d-block {
            display: block
        }

        .vt {
            vertical-align: top
        }

        .btn,
        .vm {
            vertical-align: middle
        }

        .qr-header:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            width: 100%;
            background: #fff;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px
        }

        .center-logo img {
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            height: 0;
            width: 91px;
            -webkit-transition: .4s ease;
            transition: .4s ease
        }

        .scrolled-header {
            position: fixed;
            top: -100%;
            background: #fff;
            z-index: 3;
            -webkit-transition: .5s ease-in-out;
            transition: .5s ease-in-out;
            padding: 16px 16px 14px 48px;
            -webkit-box-shadow: 0 2px 12px rgba(0, 0, 0, .06);
            box-shadow: 0 2px 12px rgba(0, 0, 0, .06)
        }

        .sticky-header {
            top: 0
        }

        .scrolled-header .sop-on-scroll {
            font-size: 1.6rem;
            padding: 0
        }

        .scrolled-header .sop-on-scroll .fr {
            float: left;
            margin: 2px 0 0 2px
        }

        .hw-on-scroll {
            padding: 0 16px
        }

        .scrolled-header .hw-on-scroll {
            padding: 8px 0 0
        }

        .scrolled-header .ba-on-scroll {
            top: 13px;
            left: 16px
        }

        .nb-option .nb-banks:last-of-type .po-n {
            border-bottom: 0
        }

        .option-list.nb-option .po-icon {
            width: 25px;
            margin-right: 10px
        }

        .fixHeight-onus {
            min-height: calc(100% - 110px)
        }

        .fixHeight-offus {
            min-height: calc(100% - 50px)
        }

        .h100 {
            height: 100%
        }

        ul {
            list-style: none
        }

        a {
            text-decoration: none;
            color: #00b9f5
        }

        img {
            max-width: 100%
        }

        .hide {
            display: none
        }

        .w100 {
            width: 100%
        }

        .w91 {
            width: 91%
        }

        .btn {
            white-space: nowrap;
            border: 1px solid transparent;
            padding: 13px 15px;
            height: 50px;
            font-size: 1.6rem;
            line-height: 1.5;
            border-radius: 8px;
            cursor: pointer
        }

        .btn-primary {
            color: #fff;
            background: #00b9f5
        }

        .btn-primary:disabled {
            background: #ababab;
            cursor: default;
            color: #fff
        }

        .hasPopup,
        .hasPopupFixed,
        .o-h,
        body.fixed,
        body.hasPopup .auto-overflow {
            overflow: hidden
        }

        .mask {
            padding: 5px;
            -webkit-text-security: disc
        }

        section.paytm-wallet {
            -webkit-transition: margin .4s ease;
            transition: margin .4s ease;
            cursor: pointer
        }

        .paytm-wallet .type-option-list {
            top: 65px
        }

        .small-text {
            font-size: 1.3rem;
            color: #868585;
            margin-top: 5px;
            font-weight: 400
        }

        .sub-label {
            font-size: 1.2rem;
            color: #333;
            letter-spacing: .5px;
            margin-top: 2px;
            line-height: 17px
        }

        .po-icon {
            width: 53px;
            height: 20px;
            padding-top: 21px
        }

        .po-icon img {
            width: 25px;
            height: 25px;
            margin-top: -3px
        }

        .type-option-list>label {
            margin: 2px 16px 0 0
        }

        .po-n {
            padding: 0 42px 16px 0
        }

        .p-option>.paytm-wallet:first-child,
        .po-n {
            border-bottom: 1px solid #e8edf3
        }

        .p-option>.paytm-wallet:first-child .po-n {
            border-bottom: 0
        }

        .p-option>.active>.po-n {
            border: 0
        }

        .nb-banks .po-n .tick-select {
            display: none
        }

        .p-option>.active .po-n .tick-select {
            margin-left: 10px
        }

        .list-view-inner>* .active .type-option-list>.po-n,
        .list-view-inner>.active>.type-option-list>.po-n,
        .list-view-inner>.p-option:last-child>.type-option-list>.po-n,
        .list-view-inner>:last-child .type-option-list>.po-n {
            border-bottom: 0
        }

        .list-view-inner>.active:nth-last-child(2):after,
        .list-view-inner>:last-child .active:after,
        .list-view-inner>:last-child.active:after {
            display: none
        }

        .p-option.active:after {
            content: "";
            display: block;
            margin-left: 36px;
            border-bottom: 1px solid #e8edf3
        }

        .grid-view .p-option.active:after,
        .p-amount,
        .p-option.pob-wrap.active:after,
        .tick-select {
            display: none
        }

        .p-option .payment-type-methods+section,
        .payment-type-methods .p-option:not(.active):last-child:first-child .po-n {
            border-bottom: 1px solid #e8edf3
        }

        .payment-type-methods .p-option.pob-wrap:not(.active):last-child:first-child .po-n {
            border-bottom: 0
        }

        .form-ctrl {
            padding: 12px 16px;
            border: 1px solid #e8edf3;
            color: #222;
            font-size: 1.4rem;
            border-radius: 8px;
            display: block;
            background: #fff;
            -webkit-transition: border .5s ease;
            transition: border .5s ease;
            letter-spacing: 1px;
            font-weight: 700
        }

        .form-ctrl:focus,
        .on-focus:focus-within {
            border-color: #00b9f5
        }

        .form-ctrl:disabled {
            background: #f3f7f8;
            cursor: default;
            border: 1px solid #e2ebee
        }

        .pb15,
        .pb25 {
            padding-bottom: 25px
        }

        .pb13 {
            padding-bottom: 13px
        }

        .pb10 {
            padding-bottom: 10px
        }

        .pt10 {
            padding-top: 10px
        }

        .pt20 {
            padding-top: 20px
        }

        .pt25 {
            padding-top: 25px
        }

        .pt16 {
            padding-top: 16px
        }

        .pl25 {
            padding-left: 25px
        }

        .mtn25 {
            margin-top: -25px
        }

        .custom-check,
        .custom-radio,
        .icon-chevron_down_dark.arrow-left,
        .pos-r,
        .spinner>div,
        p.alignMsg,
        section.s-s {
            position: relative
        }

        #topHead,
        .check,
        .custom-check input,
        .custom-check input~.c-mark:after,
        .custom-radio input,
        .custom-radio input~.c-mark:after,
        .hasPopup,
        .inactive:before,
        .pos-a {
            position: absolute
        }

        .custom-radio input~.c-mark:after {
            left: 50%;
            top: 50%
        }

        .pos-f {
            position: fixed;
            z-index: 11
        }

        .ltrp0 {
            bottom: 0;
            left: 0;
            right: 0;
            top: 0
        }

        .fs15 {
            font-size: 1.5rem
        }

        .fs14 {
            font-size: 1.4rem
        }

        .fs13 {
            font-size: 1.3rem
        }

        .fs11 {
            font-size: 1.1rem
        }

        .fs12 {
            font-size: 1.2rem
        }

        .w176 {
            width: 160px
        }

        .row {
            margin-left: -20px;
            margin-right: -20px
        }

        .inactive:before {
            width: 100%;
            height: 100%;
            content: "";
            top: 0;
            left: 0;
            z-index: 1;
            background: rgba(255, 255, 255, .7);
            cursor: auto
        }

        select.form-ctrl {
            background: #f3f7f8;
            border: 1px solid #e2ebee;
            color: #222
        }

        body.fixed {
            width: 100%;
            height: 100%;
            position: fixed
        }

        .choosed-emi {
            background: #f5f9fe;
            border-radius: 8px
        }

        .choosed-emi div {
            margin-top: 5px
        }

        .choosed-emi p {
            line-height: 2.1rem
        }

        .choosed-emi .icon-ic_close {
            right: 10px;
            top: 10px;
            -webkit-transform: scale(.6);
            -ms-transform: scale(.6);
            transform: scale(.6)
        }

        .dot-symbol {
            right: 10px;
            top: 13px
        }

        .card-dots {
            line-height: .3;
            font-size: 2rem;
            margin: 0 1px
        }

        .icon-ic_close {
            width: 32px;
            height: 32px;
            background-position: -40px -118px;
            cursor: pointer
        }

        .icon-cvv_help_icon {
            width: 20px;
            height: 15px;
            background-position: -2px -159px
        }

        .icon-tick_green {
            width: 24px;
            height: 24px;
            background-position: -24px -157px;
            margin-top: -1px
        }

        .icon-chevron_down_dark {
            width: 18px;
            height: 18px;
            background-position: -69px -160px
        }

        .error-trip,
        .success {
            color: gray
        }

        .error-trip,
        .success,
        .warning {
            font-size: 1.2rem;
            line-height: 1.5rem;
            padding: 8px 12px;
            margin-top: 5px;
            border-radius: 4px
        }

        .grey-error {
            color: gray
        }

        .success {
            background: #bef8ce
        }

        .warning {
            background: #fff5e5;
            color: #ff9d00
        }

        .error-info {
            color: #999
        }

        .error {
            color: #fd5c5c
        }

        .yellow {
            color: #ffa400
        }

        .error label,
        .errorRed,
        .errorRed label {
            color: #fd5c5c
        }

        p.error {
            margin-top: 7px
        }

        .hasPopup,
        .hasPopupFixed {
            width: 100%;
            height: 100%;
            -webkit-overflow-scrolling: auto
        }

        .hasPopupFixed {
            position: fixed
        }

        .auto-overflow {
            overflow-y: scroll
        }

        .bold {
            font-weight: 800
        }

        .card-dots,
        .fw700 {
            font-weight: 700
        }

        .card-dots {
            letter-spacing: .2px
        }

        .p-option {
            padding: 16px 0 0 16px
        }

        .nb-banks.active .po-n .bank-d,
        .p-option.active>.type-option-list>.po-n .bank-d,
        .p-option.active>.type-option-list>.po-n>.w-bal {
            font-weight: 600;
            letter-spacing: .5px
        }

        .po-n .bank-d {
            font-size: 1.4rem;
            line-height: 20px
        }

        .btn-primary,
        .fw500 {
            font-weight: 500
        }

        .fw600,
        .saotp {
            font-weight: 600
        }

        .mt5 {
            margin-top: 5px
        }

        .mt10 {
            margin-top: 10px
        }

        .mt15 {
            margin-top: 15px
        }

        .mt16 {
            margin-top: 16px
        }

        .mt20 {
            margin-top: 20px
        }

        .mt30 {
            margin-top: 40px
        }

        .mt50 {
            margin-top: 50px
        }

        .mtn20 {
            margin-top: -5px
        }

        .mtn24 {
            margin-top: -24px
        }

        .mtn40 {
            margin-top: -40px
        }

        .separator {
            border-bottom: 5px solid #f4f7f8
        }

        .emi-option {
            padding-bottom: 26px
        }

        .emi-another-card {
            padding-top: 12px
        }

        .emi-another-card .type-option-list:last-child .po-n {
            border-bottom: 0;
            padding-bottom: 2px
        }

        .has-emi-padding {
            padding-top: 20px
        }

        .emi-option-block {
            padding-top: 6px
        }

        .zeroCost {
            padding: 0 16px 16px 0;
            border-bottom: 1px solid #f3f7f8
        }

        .zeroCostLabel {
            margin-left: 20px;
            padding: 33px 20px 3px 0
        }

        .zeroCostLabel+.emi-option .customSelect {
            border: 0;
            padding: 16px 16px 16px 30px
        }

        .zeroCostLabel+.emi-option .customSelect .fs15 {
            line-height: 2.1rem
        }

        .zeroCostLabel+.emi-option .small-text {
            margin-top: 9px
        }

        .zeroCostLabel+.emi-option .w176 {
            width: 194px
        }

        .verify-otp span {
            font-style: italic
        }

        .hide-wallet {
            margin-top: -25px
        }

        .willFixed section:nth-child(2),
        .willFixed section:nth-child(3),
        .willFixed section:nth-child(4) {
            padding-bottom: 13px
        }

        .willFixed .ws {
            margin-bottom: 0
        }

        body.height100 {
            height: 100% !important
        }

        @font-face {
            font-family: WebRupee;
            src: url(https://staticpg.paytm.in/pgp/v2/mobile/30b42a0428fad208556f5e672717780b.eot);
            src: local("WebRupee"), url(https://staticpg.paytm.in/pgp/v2/mobile/388288fc6b37f7c46d4e23b19d31e8af.ttf) format("truetype"), url(https://staticpg.paytm.in/pgp/v2/mobile/5bb128f740689bd22a816d8f6bcfaba3.woff) format("woff");
            font-weight: 400;
            font-style: normal
        }

        .rupee-icon {
            font-family: WebRupee;
            font-style: normal;
            margin: 0 1px
        }

        .onus .card-list {
            min-height: calc(100% - 77.53px)
        }

        .offus .card-list {
            min-height: calc(100% - 41.53px)
        }

        .saotp {
            font-size: 1.2rem;
            letter-spacing: 1px;
            padding: 23px 20px 0;
            background: #fff;
            text-transform: uppercase
        }

        p.alignMsg {
            font-size: 1.2rem;
            z-index: 1
        }

        .clear {
            clear: both
        }

        .arrow-left,
        .icon-chevron_down_dark.arrow-left {
            width: 7px;
            height: 7px;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .arrow-left {
            border: solid #000;
            border-width: 0 0 2px 2px
        }

        .icon-chevron_down_dark.arrow-left {
            top: -1px
        }

        .arrow-down,
        .icon-chevron_down_dark.arrow-down {
            width: 11px;
            height: 11px;
            border: solid #000;
            border-width: 0 0 2px 2px;
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .arrow-right,
        span .icon-chevron_down_dark.arrow-right {
            width: 11px;
            height: 11px;
            border: solid #000;
            border-width: 2px 2px 0 0;
            -webkit-transform: rotate(41deg);
            -ms-transform: rotate(41deg);
            transform: rotate(41deg);
            right: 3px !important;
            top: 5px
        }

        .customSelect .icon-chevron_down_dark.arrow-down {
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            transform: rotate(-45deg);
            top: 18px
        }

        .customSelect .icon-chevron_down_dark.arrow-down-active,
        .icon-chevron_down_dark.arrow-down-active {
            -webkit-transform: rotate(133deg);
            -ms-transform: rotate(133deg);
            transform: rotate(133deg);
            top: 23px
        }

        .icon-chevron_down_dark.arrow-down-active {
            right: 18px
        }

        .icon-chevron_down_dark.arrow-down-convc {
            width: 6px;
            height: 6px;
            border: solid gray;
            border-width: 2px 2px 0 0;
            -webkit-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            transform: rotate(135deg);
            right: 0;
            top: -1px
        }

        .icon-chevron_down_dark.arrow-down-subs {
            width: 8px;
            height: 8px;
            left: 3px
        }

        footer {
            background-color: #fafbfb;
            color: #666
        }

        .b-minHeight {
            min-height: 600px
        }

        @font-face {
            font-family: ptm-masked-input;
            font-display: swap;
            src: url(https://staticpg.paytm.in/common/lib/fonts/masked-input/masked-input-disc.eot);
            src: url(https://staticpg.paytm.in/common/lib/fonts/masked-input/masked-input-disc.woff2) format("woff2"), url(https://staticpg.paytm.in/common/lib/fonts/masked-input/masked-input-disc.woff) format("woff"), url(https://staticpg.paytm.in/common/lib/fonts/masked-input/masked-input-disc.ttf) format("truetype")
        }

        @-moz-document url-prefix() {
            .mask:not(:placeholder-shown) {
                font-family: ptm-masked-input
            }

            .fb-wrap-content-padding.IE-padding:after {
                content: "";
                display: block;
                width: 100%;
                height: var(--sudoHeigth, 0)
            }

            .fb-wrap-content-padding.IE-padding {
                padding-bottom: 0 !important
            }
        }

        .ellipsis {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .centerlized {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .zeroCostLabel~div p.alignMsg {
            padding-left: 20px;
            margin-top: 0
        }

        .hide-p::-webkit-input-placeholder {
            opacity: 0
        }

        .hide-p::-moz-placeholder {
            opacity: 0
        }

        .hide-p::-ms-input-placeholder {
            opacity: 0
        }

        .hide-p::placeholder {
            opacity: 0
        }

        .hide-p:-ms-input-placeholder {
            color: transparent
        }

        .disabled {
            pointer-events: none;
            opacity: .5;
            cursor: not-allowed
        }

        .ptm-cross {
            right: 20px;
            top: 22px
        }

        .pointer-cursor {
            cursor: pointer
        }

        .remove-webview-scroll {
            max-height: 100vh
        }

        .txt-uc {
            text-transform: uppercase
        }

        .account-alert {
            padding: 5px 16px 0;
            background-color: #fff
        }

        .tt-wrap {
            right: 12px;
            top: 12px;
            z-index: 2
        }

        .option-pd {
            padding: 0 16px 0 36px
        }

        .option-pd .opd-child>* {
            padding-bottom: 16px
        }

        .option-pd .opd-child>.empty-pdc {
            padding-bottom: 0
        }

        .po-icons {
            width: 22px;
            top: 10px;
            right: 17px
        }

        .pob-wrap .po-icons {
            right: 8px
        }

        [data-key=aoa] .po-icons,
        [data-key=cod] .po-icons,
        [data-key=smb] .po-icons,
        [data-key=upipush] .po-icons {
            top: 2px
        }

        .va-wrap {
            margin-top: 24px;
            text-align: center
        }

        .pob-wrap,
        .view-all {
            border: 1px solid #e8edf3
        }

        .view-all {
            display: inline-block;
            height: 36px;
            line-height: 36px;
            padding: 0 16px;
            color: #333;
            letter-spacing: .5px;
            font-size: 1.2rem;
            font-weight: 500;
            cursor: pointer;
            border-radius: 16px
        }

        .view-all .d-arrow {
            margin-left: 8px
        }

        .view-all .u-arrow {
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .view-all .s-icon {
            margin-right: 8px;
            top: 2px
        }

        .pob-wrap {
            border-radius: 12px;
            margin: 12px 8px 8px
        }

        .pob-wrap.p-option {
            padding-left: 8px
        }

        .pob-wrap .po-n {
            padding-right: 12px;
            border: 0
        }

        .card-section {
            padding: 0 16px
        }

        .sop {
            font-size: 2rem;
            padding: 14px 16px 4px;
            -webkit-transition: .2s ease-in-out;
            transition: .2s ease-in-out
        }

        .plr-16 {
            padding: 0 16px
        }

        .pb-16 {
            padding-bottom: 16px
        }

        .p-16 {
            padding: 16px
        }

        .pr-30 {
            padding-right: 30px
        }

        .pr35 {
            padding-right: 35px
        }

        .offer-wrap {
            border-radius: 4px;
            font-size: 1.2rem;
            padding: 8px;
            font-weight: 400;
            background: rgba(38, 208, 124, .1);
            margin-top: 10px
        }

        .offer-wrap .offer-applied-img {
            margin-right: 6px;
            position: relative;
            top: 1px
        }

        .fb-wrap {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background: #fff;
            -webkit-box-shadow: 0 -2px 12px rgba(0, 0, 0, .06);
            box-shadow: 0 -2px 12px rgba(0, 0, 0, .06);
            padding: 8px 8px 16px;
            z-index: 2
        }

        .pu-large-wrap {
            min-height: calc(95vh - 70px)
        }

        .pu-sticky-top {
            position: sticky;
            z-index: 1;
            top: 32px
        }

        .grid-wrap {
            padding: 16px 0;
            margin: 16px 16px 0
        }

        .brdr-box,
        .grid-wrap,
        .list-view-inner {
            border: 1px solid #e8edf3;
            border-radius: 12px;
            overflow: hidden
        }

        .list-view-inner {
            margin: 16px;
            padding-top: 16px
        }

        .grid-view .s-s,
        .grid-view>.p-option>.type-option-list .custom-radio,
        .grid-wrap .po-icons,
        .login-btn button .spinner {
            display: none
        }

        .login-title {
            padding-bottom: 16px;
            font-size: 1.6rem
        }

        .opo-title {
            margin: 0 16px 6px;
            font-size: 1.6rem
        }

        .grid-wrap .active .po-n {
            border: 0;
            padding-bottom: 5px
        }

        .grid-wrap .active .option-pd {
            border-bottom: 1px solid #e8edf3
        }

        .grid-wrap .active .option-pd .cod-text {
            margin-left: -36px
        }

        .main-inner {
            min-height: 100%;
            padding-bottom: 60px
        }

        .pu-title {
            padding: 0 50px 24px 16px;
            font-size: 2rem;
            font-weight: 700
        }

        .pu-sub-text {
            font-size: 1.2rem;
            color: gray;
            font-weight: 400;
            margin-top: 8px
        }

        .pu-sub-text>div {
            margin: 0
        }

        .pb30 {
            padding-bottom: 30px
        }

        .text-btn {
            font-size: 1.4rem;
            color: #00b9f5;
            letter-spacing: .5px;
            font-weight: 500
        }

        .info-icon {
            display: inline-block;
            margin-left: 7px;
            width: 14px;
            cursor: pointer
        }

        .info-strip,
        .sub-info-strip {
            padding: 10px 16px;
            color: #1d2f54
        }

        .info-strip {
            background: #f5f9fe;
            margin: 16px 0 32px
        }

        .sub-info-strip {
            background: #fff8e1;
            margin: 16px 10px;
            border-radius: 4px
        }

        .mb20 {
            margin-bottom: 20px
        }

        .mb10 {
            margin-bottom: 10px
        }

        .mb16 {
            margin-bottom: 16px
        }

        .pop-wrap {
            padding: 16px 16px 48px
        }

        .pop-title {
            font-size: 1.6rem;
            margin-bottom: 10px
        }

        .pop-txt {
            line-height: 20px;
            color: #333;
            margin-bottom: 24px
        }

        .sp-error {
            padding: 8px 0 6px
        }

        .mtn18 {
            margin-top: -18px
        }

        .mtn12 {
            margin-top: -12px
        }

        .cursor-p,
        .mgv-wallet,
        .paytm-wallet,
        .small-text,
        .type-option-list {
            cursor: pointer
        }

        .tooltip-shadwo {
            -webkit-box-shadow: 0 0 6px 2px rgb(0 0 0/3%);
            box-shadow: 0 0 6px 2px rgb(0 0 0/3%)
        }

        section.inner-shimmer.s-s {
            margin-left: 0
        }

        .invert {
            -webkit-filter: contrast(0);
            filter: contrast(0)
        }

        .dsktp-mode {
            background: rgba(0, 0, 0, .6)
        }

        .dsktp-mode .desk-popup,
        .dsktp-mode>main {
            top: 7.5%;
            border-radius: 6px;
            max-width: 424px;
            left: 50%;
            margin-left: -212px
        }

        .dsktp-mode>main {
            width: 100%;
            max-height: 85%;
            position: absolute;
            background: #fff
        }

        .dsktp-mode .bt-fixed,
        .dsktp-mode .dsk-otp-msg,
        .dsktp-mode .fb-wrap,
        .dsktp-mode .indicator-pos {
            max-width: 424px;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        .dsktp-mode .desk-popup {
            bottom: 7.5%;
            right: auto
        }

        .dsktp-mode .desk-full .deskp-content,
        .dsktp-mode .deskp-overlay {
            border-radius: 6px
        }

        .dsktp-mode .deskp-content {
            border-radius: 12px 12px 6px 6px
        }

        .dsktp-mode .dsk-alrt {
            max-width: 424px;
            top: 7.5%;
            display: none
        }

        .dsktp-mode .desk-alert {
            border-radius: 6px 6px 0 0
        }

        .dsktp-mode .fb-wrap {
            bottom: 7.5%;
            border-radius: 0 0 6px 6px
        }

        .dsktp-mode .indicator-pos {
            bottom: calc(7.5% + 10px)
        }

        .dsktp-mode .dsk-otp-msg,
        .dsktp-mode .sticky-header {
            top: 7.5%
        }

        .dsktp-mode .bt-fixed {
            bottom: 7.5%;
            border-radius: 0 0 6px 6px
        }

        .dsktp-mode .scrolled-header {
            display: none;
            top: 7.5%;
            -webkit-transition: none;
            transition: none;
            border-radius: 6px 6px 0 0;
            max-width: 424px;
            margin: 0 auto
        }

        .dsktp-mode .sticky-header {
            display: block
        }

        .dsktp-mode .desk-nb-letter {
            right: calc(50% - 208px);
            top: calc(152px + 7.5%)
        }

        .ml-36 {
            margin-left: -36px
        }

        .box-title {
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: -.41px
        }

        .offer-content-wrapper {
            padding: 0 16px 16px;
            max-height: 300px;
            overflow-y: auto
        }

        .offers-header {
            margin-top: 0;
            margin-bottom: 35px;
            font-size: 1.8rem
        }

        .upi-select>label {
            margin: 1px 10px 0 0
        }

        .static-btn {
            padding: 0 16px 16px 0
        }

        .secure-card {
            background: #ffa400;
            color: #fff;
            border-radius: 4px;
            font-size: 1rem;
            line-height: 16px;
            padding: 0 8px
        }

        .note {
            color: #8b8b8b;
            line-height: 16px
        }

        @media (-ms-high-contrast:active),
        (-ms-high-contrast:none) {
            .dsktp-mode .mask {
                font-family: ptm-masked-input
            }

            .dsktp-mode .mask:-ms-input-placeholder {
                font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif
            }

            .dsktp-mode .IE-padding:after {
                content: "";
                display: block;
                height: 74px;
                width: 100%
            }

            .dsktp-mode .fb-wrap-content-padding.IE-padding {
                padding-bottom: 0 !important
            }

            .pu-sticky-top {
                top: 0
            }
        }

        @media (min-width:320px) and (max-width:500px) {
            body {
                font-size: 1.5rem
            }
        }

        @media only screen and (min-device-width:414px) and (max-device-width:736px) and (-webkit-min-device-pixel-ratio:3) {
            offer-strip html {
                font-size: 75%
            }
        }

        @media (max-width:360px) {
            .offer-content-wrapper {
                max-height: 200px
            }
        }

        @media screen and (max-width:320px) {
            .sop {
                font-size: 1.7rem
            }

            .pra-wrap,
            .scrolled-header .sop-on-scroll {
                font-size: 1.5rem
            }

            .choosed-emi .icon-ic_close {
                top: 0;
                right: 0;
                -webkit-transform: scale(.5);
                -ms-transform: scale(.5);
                transform: scale(.5)
            }
        }

        ._3URX {
            background: #fce9c7
        }

        ._Ow1N {
            padding: 12px 16px
        }

        ._2QKm {
            display: inline-block
        }

        ._NG15 {
            margin-top: 5px
        }

        ._2VqR {
            border: 1px solid #222;
            color: #222;
            padding: 5px 8px;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            width: 52px;
            height: 25px;
            border-radius: 12px
        }

        ._3FIp {
            max-width: calc(100% - 60px)
        }

        ._35mq {
            font-weight: lighter;
            color: #666
        }

        ._1PZF {
            margin: 0;
            background: #fff5e5;
            padding: 10px 16px;
            -webkit-box-shadow: 0 2px 12px 2px rgba(0, 0, 0, .06);
            box-shadow: 0 2px 12px 2px rgba(0, 0, 0, .06);
            min-height: 48px
        }

        ._7QpM {
            max-width: 900px;
            z-index: 4;
            margin: auto;
            visibility: hidden;
            opacity: 0
        }

        ._b5Oi {
            max-width: 700px;
            line-height: 1.7rem;
            letter-spacing: .5px
        }

        ._2xuX {
            left: 0;
            right: 0;
            top: 0
        }

        ._2xuX>div>span {
            top: 50%;
            margin-top: 0
        }

        ._2xuX button {
            max-width: 66px
        }

        ._7QpM._1vbL {
            -webkit-animation: _2FV0 .2s linear .15s forwards;
            animation: _2FV0 .2s linear .15s forwards
        }

        ._1O0L {
            min-width: 66px;
            color: #222;
            border: 1px solid #222;
            height: 28px;
            border-radius: 14px;
            line-height: 1.8rem;
            font-size: 1rem;
            padding: 0 12px;
            cursor: pointer;
            background: 0 0;
            right: 16px;
            top: 0;
            bottom: 0;
            margin: auto
        }

        ._20F1 {
            position: fixed
        }

        ._20F1 ._1PZF {
            background: #ffe7e7;
            color: #fd5c5c;
            min-height: auto
        }

        @media screen and (min-width:768px) {
            ._7QpM._1vbL {
                -webkit-animation: none;
                animation: none;
                visibility: visible;
                opacity: 1;
                display: block
            }
        }

        ._1Plx {
            padding: 16px 16px 14px
        }

        ._2zBE {
            padding: 8px 16px
        }

        ._1Plx:empty,
        ._2zBE:empty {
            display: none
        }

        ._11dj {
            -webkit-animation: _11dj 1s both;
            animation: _11dj 1s both
        }

        ._1Bvb,
        ._1fTB,
        ._2Ibj,
        ._2PL9 {
            padding: 11px 15px;
            border-radius: 2px
        }

        ._1fTB {
            background: #ffa400;
            color: #fff
        }

        ._2PL9 {
            background: #e8f8f1;
            border: 1px solid #21c17a;
            color: #21c17a
        }

        ._1Bvb {
            background: #fdfbd3;
            color: #666
        }

        ._2Ibj {
            background: #d5edf9
        }

        ._1HbL,
        ._29-N {
            color: #fd5c5c
        }

        ._3N1S {
            -webkit-animation: _2aj_ .1s ease forwards;
            animation: _2aj_ .1s ease forwards;
            z-index: 4
        }

        ._1yH7 {
            background: #fff;
            width: 100%;
            left: 0;
            bottom: 0;
            min-height: 80px;
            max-height: 95%;
            border-radius: 12px 12px 0 0;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 4;
            -ms-overflow-style: -ms-autohiding-scrollbar
        }

        ._1yH7:before {
            content: "";
            display: block;
            height: 32px;
            background: inherit;
            position: sticky;
            top: 0;
            z-index: 4
        }

        ._3JMP._1yH7:before {
            display: none
        }

        ._I7As ._1yH7 {
            border-radius: 12px;
            max-width: 92%;
            left: 50%;
            top: 50%;
            bottom: auto;
            -webkit-animation: _1eRN .3s ease forwards;
            animation: _1eRN .3s ease forwards
        }

        ._2eyK ._1yH7 {
            max-height: 100%;
            height: 100%;
            padding-top: 0;
            border-radius: 0
        }

        ._EV8s ._1yH7 {
            background: 0 0;
            padding-top: 0;
            text-align: center;
            min-height: auto
        }

        ._2Kmf {
            z-index: 2;
            right: 16px;
            top: 27px;
            cursor: pointer
        }

        ._3stn {
            padding: 0 50px 24px 16px;
            font-size: 2rem;
            line-height: 26px
        }

        ._2z6W {
            overflow: inherit
        }

        @media screen and (max-width:767px) {
            ._1yH7 {
                -webkit-animation: _3gAD .3s ease forwards;
                animation: _3gAD .3s ease forwards;
                overflow-y: scroll
            }

            ._2eyK ._1yH7 {
                bottom: auto;
                left: 100%;
                -webkit-animation: _3GvM .4s ease forwards;
                animation: _3GvM .4s ease forwards
            }
        }

        ._33Ja {
            padding-bottom: 24px;
            font-weight: 400
        }

        ._2rKf {
            margin-bottom: 24px
        }

        ._tyWe {
            color: gray;
            margin-bottom: 6px
        }

        ._21Qi {
            font-size: 1.6rem
        }

        ._2f8Q {
            margin-top: 2px;
            color: gray;
            font-size: 1rem
        }

        ._1VsU {
            pointer-events: none;
            cursor: no-drop
        }

        ._1f6s {
            margin: 2px 0 0 24px
        }

        ._2Dnd {
            float: right
        }

        ._97Gc {
            text-align: center;
            padding-top: 0;
            border-radius: 10px 10px 0 0;
            margin-bottom: 10px;
            font-size: 1.8rem
        }

        ._97Gc>div,
        ._gypY>div {
            float: none;
            text-align: center;
            display: inline
        }

        ._1t1I {
            font-weight: 400;
            font-size: 1.4rem
        }

        @media screen and (max-width:375px) {
            ._2u_m {
                max-width: 49%
            }
        }

        ._2OB7 {
            float: right
        }

        ._gypY {
            text-align: center;
            padding-top: 0;
            border-radius: 10px 10px 0 0;
            margin-bottom: 10px;
            font-size: 1.8rem
        }

        ._2Jxv {
            font-weight: 400;
            font-size: 1.4rem
        }

        @media screen and (max-width:375px) {
            ._1YM7 {
                max-width: 49%
            }
        }

        ._2UCJ {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }

        ._1xgD {
            min-width: calc(100% - 48px);
            max-width: calc(100% - 48px);
            padding-right: 16px;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1
        }

        ._2eSq {
            font-size: 2rem;
            margin-top: 4px
        }

        ._1bPS {
            letter-spacing: .5px
        }

        ._1hfj {
            border-radius: 4px
        }

        ._2F0W {
            width: 230px;
            margin: 0 auto;
            text-align: center
        }

        ._2F0W img {
            width: 77px
        }

        ._DFYT {
            left: 0;
            top: 2px;
            z-index: 1;
            cursor: pointer;
            -webkit-transition: .2s ease-in-out;
            transition: .2s ease-in-out
        }

        ._3nKe {
            background-repeat: no-repeat;
            margin-left: 10px
        }

        ._2ni9 {
            height: 13px;
            width: 35px;
            background-position: -2px -4px
        }

        ._zkl- {
            width: 51px;
            height: 19px;
            background-position: -85px -1px
        }

        ._1dpZ {
            width: 23px;
            height: 20px;
            background-position: -61px 0
        }

        ._1kCr {
            width: 24px;
            height: 17px;
            background-position: -36px -1px
        }

        ._1ZId,
        ._3jKm {
            width: 22px;
            height: 19px;
            background-position: -138px 0
        }

        ._3jKm {
            height: 15px;
            background-position: -162px -2px
        }

        ._3esd {
            width: 56px;
            height: 16px;
            background-position: -185px -3px
        }

        ._2d3j,
        ._3LMQ {
            width: 59px;
            height: 16px;
            background-position: -241px 0
        }

        ._2b9e {
            margin-left: 5px
        }

        ._3I9O:last-child ._202C {
            border-bottom: 0
        }

        ._2WI7 {
            -webkit-transition: all .3s ease;
            transition: all .3s ease
        }

        ._2WI7 label {
            cursor: pointer
        }

        ._WEmx ._202C {
            border-bottom: 0
        }

        ._2xyY {
            font-style: italic
        }

        ._2FX7 {
            margin-left: 8px
        }

        ._2AqM {
            display: inline-block;
            margin: -2px 0 0 5px
        }

        ._1o-r {
            color: #787878
        }

        ._2hP8 {
            overflow: visible
        }

        ._11w3+span svg,
        ._yocA+span svg {
            height: 18px;
            margin-left: 0;
            display: block
        }

        ._m6DF {
            pointer-events: none;
            opacity: .4;
            cursor: no-drop
        }

        ._2ge5 {
            max-width: 19px;
            margin-left: 5px
        }

        ._1Cv4 {
            color: #fd5c5c;
            margin-top: 4px;
            padding-right: 35px
        }

        ._qfmr {
            z-index: 1;
            top: 5px
        }

        ._10es {
            display: inline-block;
            margin-left: 8px;
            margin-top: -2px
        }

        ._OVKA {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-top: 7px
        }

        ._1y74 {
            margin-left: 8px;
            font-size: 13px;
            font-weight: 500;
            line-height: 20px;
            color: #333;
            letter-spacing: -.08px
        }

        @media (max-width:767px) {
            ._2qxE {
                margin-top: 3px
            }
        }

        ._1lTe {
            -webkit-transition: all .4s ease;
            transition: all .4s ease;
            margin-top: 4px
        }

        ._BVAv {
            letter-spacing: .3px;
            font-weight: 600
        }

        ._3oxu {
            background: #ebfafe;
            padding: 0 15px
        }

        ._2fNU {
            white-space: pre
        }

        ._2Bd- ._2Fdk {
            display: block;
            margin-top: -3px
        }

        ._115J {
            height: 60px;
            padding: 9px 15px
        }

        ._5It- {
            padding: 0;
            height: auto;
            width: auto;
            font-size: 1.2rem;
            background: 0 0;
            color: #00b9f5;
            font-weight: 500
        }

        ._2Leg {
            margin: 8px 0;
            color: gray
        }

        ._3D4s {
            margin-right: 8px;
            top: 2px
        }

        ._17Tw {
            padding: 0 16px 24px
        }

        ._3GC_ {
            width: 42px;
            height: 42px;
            background-position: -96px -113px;
            -webkit-transform: scale(.7);
            -ms-transform: scale(.7);
            transform: scale(.7);
            right: 16px;
            top: 26px
        }

        ._17Tw p {
            line-height: 20px;
            margin-bottom: 15px
        }

        ._2tSK {
            margin-top: 39px
        }

        ._2tSK:before {
            content: "";
            width: 30px;
            height: 3px;
            background: #e2ebee;
            position: absolute;
            right: 0;
            left: 0;
            top: -20px;
            margin: auto
        }

        ._3GJx {
            width: 20px;
            height: 24px;
            background-position: -229px -156px
        }

        ._1iS0 {
            margin-bottom: 20px;
            font-size: 12px
        }

        ._3rx1 li,
        ._3rx1 p {
            margin: 10px 0
        }

        ._3rx1 ul {
            display: block;
            list-style-type: disc;
            padding: 0 18px
        }

        ._3rx1 li {
            display: list-item
        }

        ._vnPi {
            white-space: nowrap;
            border-bottom: 1px solid #e8edf3
        }

        ._vnPi:last-child {
            border-bottom: none
        }

        ._vnPi:not(:first-of-type) {
            margin-top: 20px
        }

        ._1oYr {
            width: 48px;
            height: 48px;
            position: relative
        }

        ._1oYr img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: inherit;
            height: inherit
        }

        ._x5y2 {
            color: #333;
            line-height: 18px
        }

        ._NpmG {
            display: inline-block;
            padding: 0 0 20px 16px;
            white-space: pre-wrap;
            width: calc(100% - 48px)
        }

        ._NpmG ._2pOJ {
            text-transform: capitalize;
            line-height: 22px
        }

        ._1iMx,
        ._2DnO {
            font-weight: 400
        }

        ._1iMx {
            margin-top: 5px;
            color: #00b9f5
        }

        ._2DnO {
            color: #fd5c5c;
            font-size: 1.2rem;
            padding-top: 4px
        }

        ._sNZ5 svg {
            height: 12px
        }

        ._2kIv {
            pointer-events: none;
            cursor: no-drop
        }

        ._3pX0 {
            padding: 0 20px
        }

        ._3lGS {
            top: 2px
        }

        ._uQcw {
            padding: 0 16px 16px 0
        }

        ._3-zL {
            padding-right: 60px;
            letter-spacing: -.32px;
            line-height: 24px
        }

        ._3-9g {
            max-width: 22px;
            max-height: 22px;
            right: 16px;
            top: 0
        }

        ._1M1J>img {
            max-width: 116px;
            right: auto;
            left: 0
        }

        ._36c2 {
            margin-top: -3px
        }

        ._26D8 {
            margin-right: 8px
        }

        ._1UxE {
            color: #506d85;
            margin-bottom: 15px
        }

        ._lU0x {
            padding: 20px 16px 0;
            font-size: 1.6rem;
            margin-bottom: 16px
        }

        ._1IPa {
            margin: -10px 0 24px
        }

        ._nzYA {
            padding: 16px 16px 0
        }

        @media screen and (max-width:320px) {
            ._lU0x {
                font-size: 1.5rem
            }
        }

        ._3vIX {
            padding: 20px 8px 0
        }

        ._2AW8 {
            background: rgba(0, 185, 245, .05);
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #e8edf3
        }

        ._3LW8 {
            float: left;
            width: 58px;
            height: 58px
        }

        ._3LW8 img {
            width: 100%
        }

        ._3Fz1 {
            margin: 13px 0 0 12px
        }

        ._2VcC {
            font-weight: 700;
            letter-spacing: 1px;
            color: #000;
            margin-bottom: 4px
        }

        ._oJzq {
            color: #21c17a
        }

        ._oJzq img {
            margin-right: 3px
        }

        ._15WL {
            right: 15px;
            top: 38px;
            -webkit-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            transform: rotate(-135deg)
        }

        ._5Lfu {
            margin-top: 5px;
            color: #fd5c5c;
            font-size: 10px;
            margin-left: 10px
        }

        ._3yYX {
            padding: 14px 6px;
            bottom: 0;
            left: 0
        }

        ._3s2N {
            padding: 10px 0
        }

        ._3s2N:after,
        ._3s2N:before {
            border: 0
        }

        ._3zAu {
            padding-top: 3px
        }

        ._qGRg i {
            width: 18px;
            height: 20px;
            background-position: -49px -157px
        }

        ._2Pb4,
        ._3zAu {
            margin-left: 10px
        }

        @media screen and (min-width:320px) and (max-width:345px) {
            ._3yYX span {
                font-size: 9px
            }
        }

        ._2apO {
            padding: 20px 8px 0;
            display: inline-block
        }

        ._CTIe {
            background: #e5f6fd;
            padding: 10px 22px 10px 0;
            border-radius: 6px;
            height: 88px
        }

        ._hQo- {
            margin-left: 10px;
            float: left
        }

        ._38VT {
            margin-left: 14px
        }

        ._Y1q3 {
            font-size: 16px;
            letter-spacing: 1px;
            font-weight: 600;
            color: #000;
            margin-bottom: 5px
        }

        ._2R9q {
            font-weight: lighter;
            color: #506d85;
            font-size: 12px
        }

        ._tGr_ {
            right: 17px;
            top: 39px;
            -webkit-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            transform: rotate(-135deg)
        }

        ._2KvM {
            margin-top: 5px;
            color: #fd5c5c;
            font-size: 10px;
            margin-left: 10px
        }

        ._3htg {
            display: inline-block;
            margin-top: 10px;
            margin-left: 14px;
            height: 26px;
            width: 80px
        }

        ._3gd4 {
            margin-left: 5px;
            float: left
        }

        ._2Nbh {
            padding: 8px 65px 8px 40px;
            background: rgba(38, 208, 124, .1);
            border-radius: 4px
        }

        ._2oqp {
            padding: 10px 16px
        }

        ._oFYd {
            margin-top: 12px
        }

        ._2gqS {
            margin: 0
        }

        ._oFYd span {
            margin-left: 4px
        }

        ._Z9Qn>span {
            display: inline-block
        }

        ._Z9Qn>span>* {
            vertical-align: top
        }

        ._3FQU {
            width: 20px;
            height: 20px;
            left: 10px;
            top: 9px
        }

        ._YUyU {
            top: 12px;
            right: 16px
        }

        ._YUyU._1kWA {
            top: 20px
        }

        ._2aE5,
        ._YUyU {
            color: #00b9f5
        }

        ._WD02 {
            display: inline-block;
            width: 100%
        }

        ._KV7g {
            letter-spacing: .2px;
            color: #333;
            text-transform: capitalize
        }

        ._3b3B,
        ._KV7g {
            text-overflow: ellipsis;
            overflow: hidden;
            max-width: 100%;
            white-space: nowrap
        }

        @media (max-width:320px) {
            ._WD02 {
                display: inline-block
            }
        }

        ._1Kj_ {
            padding: 0 16px 16px
        }

        ._27x8 {
            margin-bottom: 25px;
            cursor: pointer
        }

        ._3uwF {
            padding: 15px 0 25px;
            line-height: 18px;
            color: #000
        }

        ._1jFd {
            height: 3px;
            background: #f3f7f8;
            width: 50px;
            margin: 0 auto 19px
        }

        ._sbNf {
            padding: 23px 16px 24px;
            background: #fff;
            min-height: 183px;
            margin: 15px;
            text-align: center
        }

        ._1n33 {
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600
        }

        ._3yqK {
            font-size: 10px;
            color: #506d85;
            margin-top: 4px
        }

        ._1kj- {
            font-size: 14px;
            margin: 20px 0 10px;
            font-weight: 600
        }

        ._1Oj3 {
            font-size: 12px;
            max-width: 260px;
            margin-top: 15px
        }

        ._2iLx {
            position: relative;
            text-align: center
        }

        ._3YNr {
            width: 170px;
            height: 170px;
            display: inline-block
        }

        ._3b6A {
            font-size: 9px;
            color: #8ba6c1;
            letter-spacing: .8px;
            padding: 7px 0
        }

        ._k2zT {
            margin-top: 5px;
            font-size: 11px;
            cursor: pointer
        }

        ._3eZn {
            padding: 12px 12px 0;
            border: 1px solid #dde5ed;
            border-radius: 4px
        }

        ._15hx {
            margin-top: 15px
        }

        ._1HlP {
            margin-top: 25px
        }

        ._15hx img {
            max-width: 48px;
            margin: 0 2px
        }

        ._3Ww5 {
            background-color: #fff;
            width: 170px;
            height: 170px;
            vertical-align: middle;
            border: 1px solid #dde5ed;
            border-radius: 4px;
            text-align: center;
            margin: auto auto 18px
        }

        ._3Ww5>div {
            margin-top: 42%
        }

        ._JEy5 {
            position: relative;
            top: -2px
        }

        ._ThFS {
            margin-top: 20px;
            width: 340px;
            margin-left: auto;
            margin-right: auto
        }

        ._N9Du:last-child {
            margin-right: 0
        }

        ._N9Du {
            font-size: 1rem;
            color: #506d85;
            border: 1px solid #f3f7f8;
            border-radius: 25px;
            padding: 6px 3px;
            vertical-align: top;
            margin-right: 8px
        }

        ._N9Du img {
            display: inline-block;
            margin-left: 5px
        }

        ._2NFB {
            color: #7e7e7e;
            margin-top: 13px;
            margin-left: auto;
            margin-right: auto;
            width: 290px
        }

        ._2uFl {
            font-size: 10px;
            margin: 0 5px
        }

        ._2uIO {
            max-width: 180px
        }

        ._27PW {
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 14px
        }

        ._Phek {
            font-size: 14px;
            line-height: 22px
        }

        ._17Gn {
            margin-bottom: 25px
        }

        ._17Gn input {
            width: 36px;
            height: 42px;
            border: 1px solid #e2ebee;
            line-height: 42px;
            font-size: 20px;
            margin-right: 5px;
            text-align: center
        }

        ._14ek {
            color: #fd5c5c;
            font-size: 10px;
            margin-top: 10px
        }

        ._3Za2 {
            position: relative;
            width: 160px;
            margin-top: 20px
        }

        ._3Za2 button {
            height: 36px;
            padding: 5px 15px;
            font-weight: 400;
            font-size: 16px
        }

        ._1mUv {
            max-width: 355px;
            display: inline-block
        }

        ._dJlq {
            float: right;
            margin-right: 22px
        }

        ._VjaZ {
            background: #fff5e5;
            margin-top: 20px
        }

        ._3XhK {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 14px
        }

        ._10uM {
            font-size: 14px;
            line-height: 22px
        }
    </style>
    
    <style type="text/css">
        ._3ijw {
            padding: 16px 16px 32px
        }

        ._3ijw:after,
        ._3ijw:before {
            content: "";
            position: absolute;
            height: 8px;
            left: 0;
            width: 100%
        }

        ._3ijw:before {
            bottom: 8px;
            background: #00b9f5
        }

        ._3ijw:after {
            bottom: 0;
            background: #07448e
        }

        ._23b9 {
            margin-bottom: 32px;
            line-height: 20px
        }

        ._23b9 a {
            font-weight: 400
        }

        ._1qLp ._1pvx {
            border-bottom: none
        }

        ._3EMS {
            padding: 30px 20px 10px;
            color: #222;
            letter-spacing: 1px;
            text-transform: uppercase
        }

        ._1r0O {
            color: #86a0c2;
            margin-top: 8px
        }

        ._xWuq {
            padding: 22px 20px 23px 0
        }

        ._25TI {
            position: relative;
            z-index: 0
        }

        ._25TI:after {
            content: "";
            width: 100%;
            background-color: #fff;
            opacity: .7;
            position: absolute;
            z-index: 3;
            height: 100%;
            left: 0;
            top: 0
        }

        ._2lVo {
            padding-left: 45px
        }

        ._286A {
            font-size: 1.6rem;
            color: #7a7b7d;
            letter-spacing: -.41px;
            left: 12px;
            top: 12px;
            z-index: 1
        }

        ._kJUb {
            display: none
        }

        ._2dfU {
            opacity: .3
        }

        ._2dfU,
        ._3oMo {
            background: #fff
        }

        ._3oMo {
            top: 100%;
            left: 0;
            z-index: 100;
            border-radius: 0 0 4px 4px;
            border: 1px solid #00b9f5;
            width: 100%;
            border-top: 0
        }

        ._2d5j {
            line-height: 19px;
            color: #222;
            border-bottom: 1px solid #00b9f5;
            padding: 12px
        }

        ._2d5j:last-child {
            border-bottom: 0
        }

        ._2vlx ._2lVo {
            padding-left: 12px
        }

        ._2HF2 {
            color: #222;
            margin-top: 12px
        }

        ._2YKv {
            margin-top: 2px;
            margin-right: 3px
        }

        ._2iwH {
            margin: 16px
        }

        ._2Xch {
            color: #7e7e7e;
            margin-bottom: 13px
        }

        ._3pkP {
            margin-bottom: 28px
        }

        ._yW71 {
            font-size: 1rem;
            color: #506d85;
            border: 1px solid #f3f7f8;
            border-radius: 25px;
            padding: 8px 6px;
            vertical-align: top
        }

        ._yW71:not(:last-child) {
            margin: 0 4px 4px 0
        }

        ._yW71 img {
            margin-right: 4px
        }

        ._1LH0 {
            margin-top: 2px
        }
    </style>
</head>

<body class="bgcolor" onload="submitPayuForm()">
    <div id="app" style="" class=" h100 xsd-wrap  offus ">
        <main class="h100 fb-wrap-content-padding auto-overflow">
            <div class="main-inner pos-r body-bg-global">
                <div class="top-headerbox ">
                    <header class=" undefined  w100">
                        <section class="undefined">
                            <div class="_1Plx">
                                <div class="pos-r">
                                    <section onclick="window.location.href='https://malinimall.in/recharge#'" class="_DFYT pos-a ba-on-scroll"><img class=""
                                            src="https://staticpg.paytm.in/pgp/v2/mobile/assets/back-arrow.png"
                                            width="24" alt=""></section>
                                    <div class="_2F0W">
                                </div>
                            </div>
                            <div class="_2zBE md-on-scroll header-bg-global">
                                <div class="_2UCJ xs-fs14 xs-fw600 xs-h35 clearfix">
                                    <div class="_1xgD fl">
                                        <div class="_2eSq ellipsis xs-txtcontrol fw700" style="text-align: center;">malinimall</div>
                                    </div>
                                </div>
                            </div>
                            <div class="fixed-on-scroll body-style">
                                <section class="sop clearfix xs-np xs-nm fw700 sop-on-scroll ">
                                    <div class="fl xs-am">Continue With Payment</div>
                                    <div class="fr xs-am"><i class="rupee-icon">Rs</i><?php echo $am;?></div>
                                </section>
                            </div>
                        </section>
                    </header>
                    <div class="scrolled-header undefined w100 header-bg">
                        <section class="_DFYT pos-a ba-on-scroll"><img class=""
                                src="https://staticpg.paytm.in/pgp/v2/mobile/assets/back-arrow.png" width="24" alt="">
                        </section>
                        <div class="fixed-on-scroll header-bg">
                            <section class="sop clearfix xs-np xs-nm fw700 sop-on-scroll ">
                                <div class="fl xs-am">Continue With Payment</div>
                                <div class="fr xs-am"><i class="rupee-icon">Rs</i><?php echo $am;?></div>
                            </section>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="payment-type-methods pbank">
                        <div class="card-list">
                            <div id="ptm-login" class="">
                                <div class="hide xs-visible type-option-list pos-r"><span class="po-n xs-nb">Paytm
                                        Login</span><span class="hide option-list-arrow arrow-left xs-visible"></span>
                                </div>
                                <div class="xs-hide">
                                    <section class="_1qLp hide">
                                        <div class=""><span class="po-icon fl text-center xs-hide"><label
                                                    class="custom-radio ib"><input type="radio"><span class="c-mark ib"
                                                        area-hidden="true"></span></label></span><span
                                                class="d-block _xWuq o-h xs-p8"><span><img
                                                        src="https://staticpg.paytm.in/pgp/v2/mobile/assets/logo.png"
                                                        width="50" class="logo" alt="Paytm"></span><label
                                                    class="_1r0O fs12 d-block sub-txt-global">Pay easily using your
                                                    saved payment methods</label></span></div>
                                    </section>
                                    <div class="_2iwH">
                                        <div class="_3ijw brdr-box border-global pos-r o-h">
                                            <section>
                                             
                                                        <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
                                              <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
    
        <tr>

          <td><input type="hidden" name="amount" value="<?php echo $am ?>" /></td>
            <div class="box-title">First Name:</div>
                                                <div
                                                    class="undefined   xs-hover-box xs-nm pos-r wrap-global pos-r mt10">
                                                    <span
                                                        class=" _286A sub-txt-global pos-a fs16 fw600"></span><input
                                                         name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"
                                                        class=" _2lVo input-color w100 fw600 xs-form-ctrl xs-input form-ctrl"
                                                        autofocus="">
                                                </div>
         
           <div class="box-title">Email:</div>
                                                <div
                                                    class="undefined   xs-hover-box xs-nm pos-r wrap-global pos-r mt10">
                                                    <span
                                                        class=" _286A sub-txt-global pos-a fs16 fw600"></span><input
                                                        type="email"name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>"
                                                        class=" _2lVo input-color w100 fw600 xs-form-ctrl xs-input form-ctrl"
                                                        autofocus="">
                                                </div>
           <div class="box-title">Phone:</div>
                                                <div
                                                    class="undefined   xs-hover-box xs-nm pos-r wrap-global pos-r mt10">
                                                    <span
                                                        class=" _286A sub-txt-global pos-a fs16 fw600"></span><input
                                                        type="number" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"
                                                        class=" _2lVo input-color w100 fw600 xs-form-ctrl xs-input form-ctrl"
                                                        autofocus="">
                                                </div>
        
        <tr>
       
          <td style="display:none;" ><textarea type="hidden" name="productinfo"><?php echo "recharge" ?></textarea></td>
        </tr>
        <tr>
       
          <td ><input type="hidden" name="surl" value="https://malinimall.in/PayU/success.php" size="64" /></td>
        </tr>
        <tr>
   
          <td ><input type="hidden" name="furl" value="https://malinimall.in/failed#" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

    
        <tr>
       
          <td><input name="lastname" type="hidden" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
         
          <td><input type="hidden" name="curl" value="https://malinimall.in/failed#" /></td>
        </tr>
        <tr>
  
          <td><input name="address1" type="hidden" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
   
          <td><input name="address2" type="hidden" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
         
          <td><input name="city" type="hidden" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
    
          <td><input name="state" type="hidden" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
   
          <td><input name="country" type="hidden" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
  
          <td><input name="zipcode" type="hidden" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
    
          <td><input name="udf1" type="hidden" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
     
          <td><input name="udf2" type="hidden" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
 
          <td><input name="udf3" type="hidden" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
       
          <td><input name="udf4" type="hidden" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
         
          <td><input name="udf5" type="hidden" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
        
          <td><input name="pg" type="hidden" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
               <div class="mt16">
                                                    <section><button onclick="submit()"   class="btn btn-primary w100 pos-r _2fNU   " type="submit" value="Submit" ><span
                                                               class="_2Bd-"><span>Proceed</span></span></button>
                                                    </section>
                                                </div>
            
          <?php } ?>
        </tr>
      </table>
    </form>
                                      
                                              
                                             
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <footer class="_3yYX _3s2N  pos-a xs-p8 xs-hide-ba xs-mt8 w100">
                    <div class="vm">
                        <div class="_qGRg text-center xs-tl clearfix"><i class="vm sprite xs-fl xs-f-icon"></i><span
                                class="_3zAu fs12 xs-fl xs-f-sth xs-np sub-text-global">100% Secure Payments </span></div>
                    </div>
                </footer>
            </div>
            <div></div>
        </main>
    </div>

   
    <style>
        .main {
            padding: 20px 55px;
            background: #fff;
            border-radius: 6px;
            text-align: center;
            padding-top: 70px
        }

        .heading {
            margin: 21px 0 5px 0;
            font-size: 18px;
            font-weight: 700
        }

        .txt {
            font-weight: 200;
            margin-bottom: 15px
        }

        .img-height {
            min-height: 144px
        }

        #app-invoke-cancel {
            text-align: center;
            width: 100%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%)
        }
    </style>
    <div id="app-invoke" class="main" style="display:none">
        <div class="img-height"><img src="https://staticpg.paytm.in/pgp/v2/mobile/assets/process_screen.svg"
                alt="Paytm"></div>
        <p class="heading">Processing Payment</p>
        <p class="txt">Please wait while we redirect you to the merchant page</p>
    </div>
    <div id="app-invoke-cancel" style="display:none">
        <h2>Cancelling your transaction....</h2>
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <div class="bounce4"></div>
            <div class="bounce5"></div>
        </div>
    </div>
    <script>
      var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
function submit(){
     if(document.getElementById("upi").value==""){

       
     }else{
          document.getElementById("payment").submit();
     }
    
   }
   </script>
</body>

</html>


<?php

?>
<html>
  <head>
  <script>
  
  </script>
  </head>
  <body >
    <h2>PayU Form</h2>
    <br/>

   
  </body>
</html>
