<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/app.466ecb22.css">
<link rel="stylesheet" href="assets/css/chunk-vendors.cf06751b.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="" />
<style>
#appCapsule{
	overflow-y: scroll; /* Creates a scrollbar for the y-axis (vertical) */
	height: 500px;
}
#Register{
	color: #868f8b;
}
.btn { background-image: linear-gradient(
#009688 , 
#009688);
    border-radius: 5px 5px 5px 5px;
    border: 0.5px solid white;
    color: white;
    transition: 0.5s;
    
}
.otpbtn {
	background-image: linear-gradient(#f5f5f5, #f5f5f5);
    /*width: 105px;*/
    padding: 25px 0px;
    margin-left: 0px;
    margin-top: -1px;
    border-radius: 0px;
	color: rgba(0,0,0,.87);
}
#forgotpass_otp{
	font-size:14px;
}
.popup {

		}
.popup .popuptext {
	position: relative;
	visibility: hidden;
	display: block;
	background-color: #555;
	color: #fff;
	text-align: center;
	border-radius: 6px;
	padding: 8px 5px;
	width: 100px;
	z-index: 1;
	margin: auto;
	margin-top: -300px;
	/* margin-left: 695px; */
	/*transition: visibility 1s;*/
}
.popup .show {
	 visibility: visible;
	}
.popup .hide {
	 visibility: hidden;
	}
.popupnum .popupnumtext {
	position: relative;
	visibility: hidden;
	display: block;
	background-color: #555;
	color: #fff;
	text-align: center;
	border-radius: 6px;
	padding: 8px 0;
	width: 180px;
	z-index: 1;
	margin: auto;
	margin-top: -50px;
	transition: visibility 1s;
}
.popupnum .show {
	 visibility: visible;
	}
.popupnum .hide {
	 visibility: hidden;
	}
.otpactive .ex1 {
  pointer-events: none;
}
.otpactive .ex2 {
  pointer-events: auto;
}	
/* The container */
.container {
  /*display: block;*/
  position: relative;
  padding-left: 30px;
  margin-bottom: 0px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 1.50em;
  width: 1.50em;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: black;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 7px;
  top: 2px;
  width: 7px;
  height: 13px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(42deg);
  -ms-transform: rotate(42deg);
  transform: rotate(42deg);
}
</style>
</head>

<body>
<?php include("include/connection.php");?>


<!-- App Header -->
<div class="appHeader1" style="background-color:#009688 !important">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Reset Password</div>
        </div>
 
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
<form action="#" method="post" id="Resetpassword" class="" autocomplete="off">
  <div data-v-14ed88ba="" class="recharge_box">
				<div data-v-14ed88ba="" class="input_box">
					<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7QNX0C
					iMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4dQK8RqyE
					jPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85btELGWbRCDlm
					0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2wRwWC5rZH8kcqYk8
					LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0FxX+xH7CsCOhjAx5prkroZ
					TJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII=" alt="" id="mobicon1">
					<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRYTUw
					6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZ
					XRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA
					6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20ve
					GFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjA
					vIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZ
					UV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo0OToxNCswODowMCIgeG1wOk1
					vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjI6NTkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjI6NTkrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nI
					iBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDRhYWM4MjAtOWE
					3MC02MzQ0LWJmMDQtMjViNDVjYjQwM2Y1IiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MDJlNTNjMjYtMTE3OS0zYTQwLThjM2EtZTY5YzMyODNmOGYxI
					iB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6NTliZmRlZmQtYjQzZi04NzQ4LWIzOWYtYTUzYTZhM2Y0MTFmIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmR
					mOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo1OWJmZGVmZC1iNDNmLTg3NDgtYjM5Zi1hNTNhNmEzZjQxMWYiIHN0RXZ0OndoZW49I
					jIwMjAtMDctMDdUMTY6NDk6MTQrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InN
					hdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ0YWFjODIwLTlhNzAtNjM0NC1iZjA0LTI1YjQ1Y2I0MDNmNSIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyMjo1OSswO
					DowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4
					gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6d6mY/AAABXklEQVRoge2aoU4DQRCGvxKeAY0kIcGQoIuHoA5Vh8OSg
					OQqeQheAFQDnhoMCR6JrakEeYguybVc0pnpTTIJ8yUndrO3/3y53TO7g6ZpWMf93gTgDjhaO7g/3oCbi48z0eBt4aS3wLW1IiND4AsYSwZvCSetrNVsiDhXKrKvLKAGBh1PrZxHnCt
					dWlpqFktjla6+XvASAceiu7CIvANPfRfS4hQ41L6kFZkCx9oQJWPgBeUXlW72X6bK8VbUOVqRsKRINFIkGikSjRSJRopEI0WikSLRSJFopEg0UiQaKRKNFIlGikQjRaLxb0V2XKroI
					Ud70HMJfAPP2iAFJyVHheXo7ao8ofA8DIXlk6ehZ5CnyCNw3mo/4HjxwOuvNWNZgtKeOeW5imj6N8ZL5IC/y6gq/S5IRT4Nc7f3RFXaWsS50s3+CuwaCrEUv5orQvpFRiwuyswt1Ri
					Yl7yR9IUfjyIqQMLbQWwAAAAASUVORK5CYII=" alt="" style="display: none;" id="mobicon2">
					<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRYTUw
					6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZ
					XRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA
					6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20ve
					GFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjA
					vIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZ
					UV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo0OToxNCswODowMCIgeG1wOk1
					vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjM6MjgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjM6MjgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nI
					iBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZmM4MmI1ZWYtZWU
					5Ny0zZDQ1LTkyZWUtN2FjZDhlNGVlYzlmIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZDA5YmJlYmYtYWViZi0xMzQ0LTgyZGEtM2QyMGMyODVkMzlmI
					iB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZGM5M2RmMTktZTUyZi03MjQ1LWE5NTEtODY5YjgxMmNlMzM4Ij4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmR
					mOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpkYzkzZGYxOS1lNTJmLTcyNDUtYTk1MS04NjliODEyY2UzMzgiIHN0RXZ0OndoZW49I
					jIwMjAtMDctMDdUMTY6NDk6MTQrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InN
					hdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmZjODJiNWVmLWVlOTctM2Q0NS05MmVlLTdhY2Q4ZTRlZWM5ZiIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyMzoyOCswO
					DowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4
					gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5B8LpeAAABX0lEQVRoge2aoU4DQRCGvyM8A0HiSTAk6CJwIA/VJ+ABQ
					HKVvApIcBXUYEh4B2RrKkEeoktyLZd0ZnqTTMJ8ScVt5vafL7dbs1u1bctWDi8AHoCz7cWD8Q7cMZ+KiveFk94Dt9aOjIyAL2AiKd4TTlpbu9kRca5U5FjZQANUPb9GOY84V7q0tDS
					slsYmfWOD4CUCjk33YRH5AJ6HbqTDFXCqfUkrMgPOtSFKJsAryi8q3ey/zJT1VtQ5WpGwpEg0UiQaKRKNFIlGikQjRaKRItFIkWikSDRSJBopEo0UiUaKRCNFovFvRQ5cuhggR3vQc
					wN8Ay/aIAWXJUdFJbwwIChyYj6tJGWeh6GwfvI08gzyFHkCrjvPjzhePPD611qwLkF5XjjluYpoxnfGS+SEv8uoLuMuSEU+DXN390RdnrWIc6Wb/Q04MjRiaX4zV4T0i4xZXZRZWro
					xsCx5Y+kLPzI4LlR6fx8RAAAAAElFTkSuQmCC" alt="" style="display: none;">
					<input data-v-14ed88ba="" type="tel" placeholder="Mobile Number" name="mobile" id="mobile" value="" maxlength="13" style="color:rgba(0,0,0,.87);">
						<!--<span data-v-14ed88ba="" class="tips_span">Mobile number is required</span>-->
				</div>
				<div data-v-14ed88ba="" class="special_box">
					<div data-v-14ed88ba="" class="input_box" style="width: 70%;">
						<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACOUlEQVRoQ+2aMWzTQBSG3ztLWVmpGJEYysgE
						U9lZGGAqEy4LEgO+mzK0LEl0d6aDJQZEp26txEA3pkx0YiwbEkOlVurUsiRD7qFUDG1yjRv71bGry5z3v/97/50vtoNwSz54SzgggNQtyZBI4xJRSt0djUZLQog7izDvnDuNouj
						IGHM8q/+VSytJkkdCCAsAK4sA8PTsO+dkmqY/fX68IFLKx4j4oyYAl2wQ0RNr7f6kNy+IUmoHAF7UEQQAdo0xL3NBkiRZFkIc1BTi3JZz7mGapr8uepxKREr5GhG/1BmEiGJr7V
						YeyDoibtQcZMNa+yGA1CUlIgqJ1CWMcx+siYzFWq3W506nc8RFqZR6Q0QJIj6YpckG4hNihHkGAHtVgTy11va5zE/qKKWoKpCpqwYXlJTyOSJ+rQRk3AQRV6Mo+t7tdk84INrt9
						r3hcBgj4isAuF8ZCIf5ohpsm72oAa66AMI1SS4d1kTCgZgTi1IqHIiXZiSlzL2xusmfKIs4ED8KIbJer/eHYxOHA/H/FH0PH3KXFkcCZTRYL79ljJStDSBlJ8hdHxLhnmhZPSKa
						ukNt4lXrEBGXtdZ/Lw6kiSDvjTGbk6k2DSQzxrzzLc0mgBwCwD4i7mmtt6/aX/OCnCBirLX+VnbDctfPA3JARGu+117cporoXRdk/DAuNsb8LtKkiprrgOwOBoM4y7KzKgwV7TE
						ThIg+WWvfFhWvss4HsoKI60TUn3y9VaWxeXuF/6LMO7Gb/v4/Av6hQgwN1SIAAAAASUVORK5CYII=" alt="" id="otpicon1">
						<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRY
						TUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTp
						uczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZG
						Y9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZ
						G9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bo
						b3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9
						zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0yM1QxNDozMT
						ozNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMjNUMTY6MDU6NTIrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMjNUMTY6MDU6NTIrMDg6MDAiIGRjO
						mZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9
						InhtcC5paWQ6MmQ0NmMwM2QtYmYxZi1iNzRiLWEwMjYtYzJmNGRhNzQ3OTgzIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MDhiMzkwMzAtOTQ2ZS0
						zZDRjLThiOTEtNDNlMjJlYTlkYjY5IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6OWM2MzdkMWMtN2U0ZC0zZjRmLThiYjMtMGIyM2I5OTZjMzIxIj4gPHhtcE
						1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo5YzYzN2QxYy03ZTRkLTNmNGYtOGJiM
						y0wYjIzYjk5NmMzMjEiIHN0RXZ0OndoZW49IjIwMjAtMDctMjNUMTQ6MzE6MzUrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93
						cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjJkNDZjMDNkLWJmMWYtYjc0Yi1hMDI2LWMyZjRkYTc0Nzk4MyIgc3R
						FdnQ6d2hlbj0iMjAyMC0wNy0yM1QxNjowNTo1MiswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD
						0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5EdMpTA
						AABnklEQVRoge2av0rDUBSHv4qzrv57AHF1ctI3KA51c1JwVnwA3UWHgoPgpJuTfyandnKpoyCi4FBU6KQ+QByuQ5vctOm5ucltOR9kuckJv49zyUlJK1EUMQ5MlB0gL1QkNFQk
						NCbjC+eL1/GlGWAWmC4ikIVv4BP46l7ceq72XJQQ6WIZOALWcg4mpQHsA4+2k2lbawVoEY4EmCwtTLYEaSK7vtLkgDWbTWQJqPnN4kQNk7EHm4i1dYGRyGgTWSggiCuJjGMzR1Q
						kNFQEOADmgEqOxw7wIgnT7xVlkMShsLYfZ8AHcDtsobQjTWFdFu4kRVKRVWFdFtYlRS5b6xW4BzrCe8SZB7aBTUmxVATg0qE2d/TxGxoqgg7EvuhA1IEITAF14F14jzilDcS9/y
						MI9PEbGioSGipSMomBPIoibSyfFkZR5Bj4jS+OmkgdOLGdcJnsRdEGHjBvxBdpFw0r0sG8D93Ic/lhmK31BFQJUAKyd6SB6cSbvyhuZOnIFaYTwUrAYJFTYAP4KSCLE7at1cRsp
						QZ+fpd7oaL/1wqMPzIjP36UceDFAAAAAElFTkSuQmCC" alt="" style="display: none;" id="otpicon2">
						<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHRY
						TUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTp
						uczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZG
						Y9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZ
						G9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bo
						b3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9
						zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0yM1QxNDozMT
						ozNSswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMjNUMTY6MDY6MDQrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMjNUMTY6MDY6MDQrMDg6MDAiIGRjO
						mZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9
						InhtcC5paWQ6OWQwYjhhYWItY2YyZS0zYzQzLTkyMWQtOTE2MGM3MmRlNWQyIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MjRmYjA2M2YtOTA4OC1
						hMzQ3LWIwYzUtNGNhYWZhYTgxNjI3IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6YjhhYzZhZWMtYzQ5MC1iYzQwLThkZmMtM2E0YjllN2QwNzdiIj4gPHhtcE
						1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpiOGFjNmFlYy1jNDkwLWJjNDAtOGRmY
						y0zYTRiOWU3ZDA3N2IiIHN0RXZ0OndoZW49IjIwMjAtMDctMjNUMTQ6MzE6MzUrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93
						cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjlkMGI4YWFiLWNmMmUtM2M0My05MjFkLTkxNjBjNzJkZTVkMiIgc3R
						FdnQ6d2hlbj0iMjAyMC0wNy0yM1QxNjowNjowNCswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD
						0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6wH4dgA
						AABmElEQVRoge2arU4DQRRGzxI0WP6eAItCgUETRHE4EjSEBwBPQDRBYMHhAAWmVZgiMQQSRANNqoAHWMSQkN2Ztts7+zPb3JOs6Gzv5ju5k727aaM4jpkEpqoOkBcqEhoqEhrT
						1srchrUCzAOzJeRx8QV8Ar3Eau8h8dEW+WcFOAHW880lpgUcAk+uk4O21irQIRwJMFk6mGwWg0T2i0qTA85sLpFloFFsFi8amIwJXCLO1gWGldElslRCEF+sjBMzR1QkNFQEOAI
						WgCjHYw94kYQZ9ogySuJYWDuMC+ADuB23UNqRtrAuC3eSIqnImrAuC1uSIp+t9QrcA33hNdIsArvAjqRYKgJw5VGbO3r7DQ0VQQfiUHQg6kAEZoAm8C68RprKBuLB3xEEevsNDR
						UJDRWpGGsg11Gki+OnhTqKnAI/6cW6iTSBM9cJn8leFl3gEfNEfDnoS+OK9DHPQzfyXMUwztZ6BjYJUAKyd6SF6cRbcVH8yNKRa0wngpWA0SLnwDbwXUIWL1xbq43ZSi2KeS8vh
						Ej/rxUYv6SuPn7rNxWIAAAAAElFTkSuQmCC" alt="" style="display: none;">
						<input data-v-14ed88ba="" type="text" placeholder="Verification Code" name="sotp" id="sotp" style="color:rgba(0,0,0,.87);">
							<!--<span data-v-14ed88ba="" class="tips_span">Verification Code is required</span>-->
					</div>
					<button data-v-14ed88ba="" class="gocode" href="javascript:void(0);" id="forgotpass_otp">OTP</button>
				</div>
				<div data-v-14ed88ba="" class="input_box">
					<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y
					29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhL
					yIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d
					3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuM
					C8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuc
					zp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIge
					G1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9I
					jIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q
					29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtN
					WMzNjg0OWM5NTVjIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOmViYjZmNDRmLTkyYTktZWM0Yi05YjlhLTVjMzY4NDljOTU1YyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4b
					XAuZGlkOmViYjZmNDRmLTkyYTktZWM0Yi05YjlhLTVjMzY4NDljOTU1YyI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0R
					XZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTA3VDE2OjUxOjQ3KzA4OjAwIiBzdEV2d
					Dpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGP
					iA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PndQ10oAAAiYSURBVGiB7ZlrrF1FFcd//9n7nNOWWlrSogKClCqltBBQCc8EooCCkAgE8QMxRBPxAyISGqOiH/QLEEN8EBMfi
					UoMGPwkEAGbRqHIQx4CQhWwvIQAt1Bp6b33nLP3/P1w9pzOPb339oGJDen6cs/eM7Nm/WbWXmvNXNnm3SDh/23A/0r2guxpshdkT5O9IHualACrV68GQBK2sY0kJFFVFZJot9vDdyn3V
					FVFjHG+pLdtE2MEIISAJGKM1HVNURSUZTnUnaQoCmxT1zUhBDqdDiEEJicnh/OGEKbYE2MczgNQluU2kF2RGONBksbqur4wxvimJNkubJfA2hDCJklzY4xVXdf92SCSUTnExMQEdV3vE
					kRVVTsFEgb2x+NDCK1+v39JURT71HW9StIRwOPA5hDCSbb/JGmd7adjjI8URfF8WZY929VMEEVR0G63dwlCEkVRDCFCCDsEmQd0JH01xrgixngGUNd1vUhS6nNU+i3pNOA0SZtCCPcXR
					XGr7bttPzkTRKfTQdIQIrnlrkDA7K61EDguhHCJpIuACigbo6tm7CSwRdISANvp/aIQwqdsHw88AvwUuK0oivFRCOAdQ8QYZwRZCFxo+/OSTmzelQ3AVtvrbK8PIXxA0u+73e7iTqdzM
					dC2vUTSnEbHIuDjwMmSvhFj/HWMceMoRPpOdhdC0rQg84FzgcuBFdn7J22/0m63v1VV1dyqqv5se3G/3x+PMY7HGG8Clks6XtJK2+cC+wICOsCXY4wqy/L77XZ7CGF7Woi6rofBYTaIN
					HY6kFMkXZVD2F4L3BRCWCPp+RSFut3uRiCt7pikMUn32D4UeBA4HzgBmGN7maTvSnoL+NXExEQ/N/ydQMD0CfF7wMrs+S7bVwO32H4+RZVWq0UIgVarNZwwyzHPATc0424Gxhtdc21fM
					TExsWxXIGxTVdUQaBTC9lQQ25cBx2av/gZ8W9LDtt+yTb/fH67MvHnzKIpiu0SZlEu6D/gx8BBggLquD7d93s5ApJ1PSTUl3VGI0R1ZDHwlM2QLcD3wqKRuPqiu62HmnQUCIAIPA9cC/
					26aC+BiSUt3BJFXBrNBjIKcCizLnm8FbgF6sK3sSEqqqqKqqu0ydgaRyx3AvelB0uG2PyGplRZmNoi8ApgOInetNvCZbOIJST8AJnJr8los+e1OQGC7tn37iK6zgPkxxh1C5JFtOgjYt
					iP7Aidm86yX9Oh2FsEwauS7swMIAFqt1l3Ahqzp6Bjjogyi2EmIkPTa1nABGqULgAOy1XrIdn86kDRw9PZlNoiyLJH0uu27JF3atO1je5Gks4F/lmX5dozxqLquNxVFsd720baLEMLjk
					t4HHGD7GWDC9irgFeBlSUdIWp9A3s/AvZIBz860wqNGpxWbDiBBAPR6PWyvTSDAAklXSloJzLf9YIxx/xDCCuBB23UI4RgGQWKD7SMlzbP9F+BgScuBdYPi29cmkP1HDClmgsgjzUztO
					URRFExOTqYF2JJ17Uj6HE3dFmM8VFIEgu1zGv0GDrF9EtBlUCEsl9RjsPAXNfNdk3/sk2kGSQfOBpEkPxvkkkBTKZ7lmsOzbnXiBd5ofoeRNmV2dbJFSt6TDJibduQ/DX2SRQzifVI4K
					0QedVKfVPSlg1Vd19R1vSzTsSnGeJ2kY4Gtks4BljRtLwG/Az4NbAaOy2y7kUHOO5VBBfEy4ATyAjAGHNw8H9R0fm02iJncK42p68E6NDBFXdenpXZJk5KujzH2Ja2SdHo29iFJV0n6o
					e0vjID8EniSQc47qIF5LIG8xKDISyArgaXAazuCsD1c8dG+OYztj0o6MjPo70VRxGY3n2Dg/0meizEWIYSXgGdG1uhF4HWaRWbgZr3kk1tt3wFsbZ4XAOfbnrMjiKIoCCEMI1f+sad+j
					Vt9acSg29jmugvJoiZTD3wLRsYVnhr7B5VHY6BtrwFSEmzZvkDSGVmf7SDKshxm4tG2ETlB0sXZ8xiDsiVJsP0i8GzzvDlrWwhsATY2uuePKp9CHkJ4AbgdOLkx6kDgCgYf5T2jLpNCa
					7/fH0LkIJmbfRi4OpsrAj+z/a+kT9JW4OfApO3XgE1s2627gcOAx5pM/vaMIFnZcZvt84CPNW2n2r6UQQR7BNhi2zlEvht5KdHIMcAXgVOyRXij3W7/oqqq4TigK+lHthfTrHym517gK
					Q+um8YYhOTtZJiSm4H/sH2t7adowrGkT0r6GnAm0G61WhRFERKEbXq9XsrczRABnGf7m8BnGRyfAZgzZ86V7XZ7QzprpLmb3xtH7EnwmxoImJomhlLmg2KMNXAncAhwWfN3vybGf9D2i
					UVR3NDr9d5sLueW9Pv9sSZfHNG4y4WS9gO+05Tp78nmuy6EcKOam8vpKuhpIKaze3qQBiLRbpF0k+1uCOES2ysZRJRVwKp+v3+6B/dUd4YQ5rZarQ9Jur/Vap0p6VAGddNHGHwLIf0NI
					Xw9xviTbrdLu92m1WoNb1JymN2BGILkWbrZ5lcl/QYYs325pBUMaqM5TfF2pKQLbG8oiuKwEMLlDKqDhZnuALwK9EIIq0MIv015pdfrAUyBSUFjdyCGICMQSIqSNlVV9YcQwpvA2cAxk
					o6NMVrSPo2hy7IJF7JtF7D91xDCGmCN7bUp50wHk9wsfXO7CjEFJIMASGfyzZL+CKwry/KoqqrOApZJWt4AHcygPnrCtiQtAG6OMb7X9jUhhHFJL+RH1XRgSjBqbko6nQ7dbndYCewWy
					ChEfn0JUJblhO0HbD/QarWWVlV1NIPvprZ9oO2ttu+WtBS4r67rtwDVde3mUDXl8iDfmW63S6fToSxLOp0O4+Pj01u6MyA7gBhGl1arhe0Ntjc0h5zKds92C+jbfjq5hW3nReN0MGlnu
					t0utod3ZLsj2h1/3BPlXfOvt70ge5rsBdnTZC/InibvGpD/AoKp8oshNVzOAAAAAElFTkSuQmCC" alt="" id="passicon1">
					<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGtmlUWHRYTUw6Y
					29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhL
					yIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d
					3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuM
					C8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuc
					zp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIge
					G1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9I
					jIwMjAtMDctMTZUMTM6MjQ6MDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MDErMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q
					29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZWZhZmY1NWQtNzQ1Yi01NjRkLWE2NzctM
					2Y2ZTYzY2UwZWIyIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6NTgzNjU4ZWQtOWViYi0yMzQzLWFkMDUtMjEwZDBiZWEwM2M1IiB4bXBNTTpPcmlnaW5hb
					ERvY3VtZW50SUQ9InhtcC5kaWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvb
					j0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplYmI2ZjQ0Zi05MmE5LWVjNGItOWI5YS01YzM2ODQ5Yzk1NWMiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NTE6N
					DcrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZ
					UlEPSJ4bXAuaWlkOmNlZDlhOWUyLWU2NWItODE0My05MjRkLTE3YmY1NzMyYjcxZiIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyNDowMSswODowMCIgc3RFdnQ6c29mdHdhcmVBZ
					2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9Inhtc
					C5paWQ6ZWZhZmY1NWQtNzQ1Yi01NjRkLWE2NzctM2Y2ZTYzY2UwZWIyIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTE2VDEzOjI0OjAxKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZ
					G9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGP
					iA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PidSzWMAAAVZSURBVGiB7dpZiF1FGgfw3+2O3WYx6UjUcaKOSzRxi7gybhBx3BcwisuDDKKgPrijDK6ITyoi6gwDo4LLgzPoi
					xpxJWhc4hJ3k8yMmhijokaNJrZmMX19+Kq8dS/dSbr7tDbSfzicU+fUqar/qe/7f1/VvbV6ve73gLbfegBVYYTIcMMIkeGGESLDDaPg7mkPD6aNcfi+ktEMAqMG8M42WIZT8Q1qaE9tz
					cZyjMZPWFvNMDeMjSHShh78GZvgLIzFntgV72AFDsazeAH/xxv4CGsEqSHFhoiMQScuxm44Euswsagzvbg+LB3L8TIexRzMr2a4fWN9RLpwgJiB08VXzfXz9SqsxBYt9yfiGDGLb+Bfm
					IUfKh19gb6IdAkf+CsOKur+hG5hPguxLR7BJJyJDkFq09TGRByOQ3Al7sNXlbPQO5FxOBEXCXPKmI/PcLVw5ucSgR/S8QCmiVnYI7UxQYhBJ85P17cMAY9eiRyKy1tIzE4DfUY4cEb5d
					Zel43nsgFdxMg4UMzQFN+A73KtiRavV6/XWOPI69inKT+F6MSPf9bP9g3GOMNMx6d4CnCJMszK0RvYLNJN4C9cKcv0lAXPxd8xDXsFNxcwBtLVelEQm4cKivBK34k2sHmD7PeIj3IRP0
					r12IQw7DrDNXlESmSHsOONRPCgC2mDxBF4sylPxFxFgK0Em0oGTivs/4rZ0rgLr8FjLvWOFQlaCTGSCRrwgHPHNqjpJeAqLivJemjOE9o1sp7SiWr7I8jsefywqzFN9wvelIHNeKo8VR
					I7D/0QGPV2kNwsF0XaRy/0hje99YSV7ipj2qcj3FmYiWwvzyvigYhIZswsi43GZCJ7jRNzZUsSvV4U57i1EYhF2FxL+ErYTwfcFoYY3ZSJbtnS4sdPcX6wsrjtxhkZ+toNQuTackOrU8
					ScRj1and6YJAeoQOSDcWDr7qqKTyZVTCEwtrtel8yh8na7bWp7VinF1Fu9m6+lJ59F5Rr7VCFiE7bYXDVaFUt6X42YRgLvFLOQseikewvFirXNA8d79IubNwGLhJ/VMZInIk7ZL5W1S5
					S8qJNEu1ioZq0TAXSuc94ji2TyR792OszUTuUekS1PSOBfj7UxkqXCwTGQPEXmrJLKfcNiM9zRM413NprNYEF8qlKrEx0IB89g6sCbbZLeIvt2pPF5krpsOfvy/4NyW8iwN0+3SrJplV
					j6+5b12zW6whoZz1UWKnoPgJiJDPVI1W0YHivwqY5n4cBlt4ktn2V9RPOsSapeXDL1mAyXzJSKNOCSVJ+MS4ZTP93voDeyCa4q+enAnPizqdOMu4TdfpD7zbM3BTnhbqFivW0+tC6tZI
					sXePz2bIQJYu1h7r9Q8rRvC3mI9cmhx72vc3VJvNe4QAtO6FH5RrGFGiZms6QWtZvNfkXIvKAZ8NC7FURp2vD5zyx3NxFU4TbM5XKY55yrR13p+uSBBHx+ydUbW4UkRTS9I582Fxm8vE
					st/iI25b4Tu5w52FeZyanrnOuFrmxXt3yziQOVoJVIX5vOAmO6zhBR3CK3Pej9fEB6NncUe1lEizRiHfTXSjXz+G/45FCTofc0udTxBqFbeTenULMc9wkR2Eub0rVCYEp8LebwC/6l26
					M3oa1+rR9jl48KEjhOOu4+YtbGCbJlydGl8fXhNSPozIusdUmxoy3QFnhbp8nSxqpsiMtC6yAS2EJG5JoLXv7EVbhT7XUuGYuCt2Njd+B/xSjp2FIueDiEOk0UcmJOezRU7LjX9k+pBY
					SA/KyxKxxixllgj1Gmt2IXP+FV/wK+N/GFgmGGEyHDDCJHhhhEiww2/GyI/AzYzM6L+LxHkAAAAAElFTkSuQmCC" alt="" style="display: none;" id="passicon2">
					<img data-v-14ed88ba="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGtmlUWHRYTUw6Y
					29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhL
					yIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d
					3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuM
					C8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuc
					zp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIge
					G1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9I
					jIwMjAtMDctMTZUMTM6MjQ6MTQrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MTQrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q
					29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MmE0NDM1ZmEtMWYxNy1jZDRiLWJjMDItZ
					DhiNzMwZTc4YjdhIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZDY5MGZkYjctM2Y2ZS1hMzQxLTg2MGUtNjg4YmYxMTg1ZWZlIiB4bXBNTTpPcmlnaW5hb
					ERvY3VtZW50SUQ9InhtcC5kaWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvb
					j0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplYmI2ZjQ0Zi05MmE5LWVjNGItOWI5YS01YzM2ODQ5Yzk1NWMiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NTE6N
					DcrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZ
					UlEPSJ4bXAuaWlkOjMxY2ZmNjI0LTViZTQtOTc0MC05YWY4LThmYjBjZmQ2NGI0OCIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyNDoxNCswODowMCIgc3RFdnQ6c29mdHdhcmVBZ
					2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9Inhtc
					C5paWQ6MmE0NDM1ZmEtMWYxNy1jZDRiLWJjMDItZDhiNzMwZTc4YjdhIiBzdEV2dDp3aGVuPSIyMDIwLTA3LTE2VDEzOjI0OjE0KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZ
					G9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGP
					iA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsgaxJwAAAUiSURBVGiB7dppjJ1TGAfw38zUjC6mQ2otpba2tKS22D6Q0FJLosTyAWlI8MEeItb4qCJCiAQRS2IJn7RCG2moW
					kLtqtZWFcHQooa2dK4Pz3vcc6870870HSYy/+Tmfc97zznv8z/Pes69TZVKxf8Bzf+1AGVhiMhgwxCRwYYhIoMNw8AOx27OHKPwaxnCbA6G9WPMzujE6ViFJrQUcy3AagzHn/ijHDE3j
					k0h0oxuHIotMAsjMQWT8B5+wRF4AYvwCd7CF1gvSA0omiqVSm+mNQJtuAz7YBo2YOuNzLsar2EOFmJJGcL2ht6IdOAQoYEzxaomDab7tViDbeueJ6wWmrkXc/FbueJX0RORDuED5+Lw7
					Pmf6BLmsxS74GmMwdloFaS2LOZoKsatw7V4GD+UT6Oxj4zCybhUmFPCEnyD64UzvygI/FZ8HsNE4UuTizlGCzJtuKi4v20AeDTUyPGYXQiTsKAQ9HnhwBvDeMzAqThMaAh+xyV4SMkRr
					RGRN3FA1p6Pm4VGfu7j/EfgfGGmI4pnH+I0YZqloT6zX6yWxDu4UZDrKwl4FXdhMdIObgJm9mOuXpETGSPUnrAGt+Nt4az9QbdYhNn4qnjWIgLD7v2csyFyIkdhz6w9B0+KhLa5eA4vZ
					+0JOEYk2FKQiLTilOz577ijuJaBDXim7tkMESFLQSIyWm2+WCpMqkzMx7Ksvb/aCqFlE+fJrSjlqb/zSDt2yjosVn7B970gc2HRHimInICPRQW9n6gGlgqiLaKW26GQ71NhJVNETvta1
					HtLE5EdhXklfFYyiYQFGZF2XCny1Si8ju1EEn5dmONUESSWYV8Rwl/BOJF8F4loODsR2a7uhZuq5r5iTXbfhrNU67PxIso146SiTwW7iny0rhgzUQSgVlEDwi25s6/NXjK2dAqBCdn9h
					uI6DD8W98113zVlcrVlY5P1dBfX4UkjP6kmLMJ2W7IJy0Ie3lfjVpGAu4QWUhW9Ek/hRLHXOSQb94jIeUdhufCTSiKyQuz6xhXtnYvO35VIogVHZ+21IuH+IZw3r5MW4yrcifPUEnlQl
					Et7FnIux7uJyErhYInIZJF5yyRykHDYhA9UTeN9taazXBBfKSJVji9FBEyytWJ9sskukX27ina7qFy3VB4uqGvPVTXdDrVRM99etNeNa1HrBuupOldFlOgpCW4hKtRpyjkyOkzUVwmdY
					uESmsVKp7D/S/Zdh4h2aUPWsBrIma8QZcSRRXssLhdO+VKfRa9ib9yQvasb9+HzrE8X7hd+813xzqSthdgD74oo1vDoqX4/MhkP4OCsz6PFi98SK9OXH1Smiv3IOaor2Sl2kcsa9B+j8
					VZ4a7EQnYLMP2SoN5uPRMn9Ydb5OFyB6ap23Ju5pfpnJq7DGWrN4coeSOiBBKGhzuK+4ULW79k3YJ7IphcX121EjN9NFJZ3i4O5VSLupxdMEuZyejHmJuFrW2Xz3yryQOno6RRlJ7Gis
					4S55RFlSfGZJw4h9hJnWNNFmTEKB6qWG+l6De5R68gDTqRZlPbTVE9T2tSG425hInsIc/pJRJgc34rweDWeKFf0WvR0ZNot7PJZYUInCMc9QNjoSEE2Lzk6VFcf3hAh/XlR9Q4oNnZkm
					jBc7BVmCOEnCkLjhJ+8L7TSjsexPW4R510rBkTyOmwqkRy7i01PqwgOY0UeWFh896o4cWkYJgcK/SGSMELsJdaL6PSv/YTQCE1DfxgYZBgiMtgwRGSwYYjIYMP/hshfCcU+w0Xx35gAA
					AAASUVORK5CYII=" alt="" style="display: none;">
					<input data-v-14ed88ba="" type="password" placeholder="New Password" name="password" id="password" style="color:rgba(0,0,0,.87);">
						<!--<span data-v-14ed88ba="" class="tips_span">Password is required</span>-->
				</div>
				<input type="hidden" name="action" value="resetpassword">
				<!--<div data-v-14ed88ba="" class="agree_box">
					<div data-v-14ed88ba="" role="checkbox" tabindex="0" aria-checked="true" class="van-checkbox">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" checked class="custom-control-input" id="remember" name="remember">
						</div>
						<div class="van-checkbox__icon van-checkbox__icon--square van-checkbox__icon--checked">
							<input type="checkbox" checked id="remember" name="remember" class="van-icon van-icon-success" style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);"/>
						</div>
						<span class="van-checkbox__label">I agree <span data-v-14ed88ba="" class="greencolor">Privacy Policy</span></span>
					</div>
				</div>-->
				
				<div data-v-14ed88ba="" class="input_box_btn">
					<button data-v-14ed88ba="" type="submit" class="login_btn ripple submit-button" id="chck">Continue</button>
				</div>
			</div>
</form>
</div>
<!-- appCapsule -->

<?php include("include/footer.php");?>
<div id="registerthanksPopup" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-body">
        <div class="text-center">
          <h5>Thank you !</h5>
          <h6>Your account has been created successfully....</h6>
          <div class="text-center">
<button type="button" class="btn btn-sm btn-primary" onClick="window.location='';">OK</button></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="registertoast" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
        <div class="text-center" id="regtoast">          
        </div>
      </div>
    </div>
  </div>
</div>
<div id="privacy" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 style="font-weight:normal;">Privacy Policy</h5>
              </div>
      <div class="modal-body responsive">
      <?php echo content($con,"privacy");?>

      </div>
      <div class="modal-footer">
    <a class="pull-left" data-dismiss="modal"><strong>CLOSE</strong></a>
              </div>
    </div>
  </div>
</div>
<div class="popup">
	<span class="popuptext" id="myPopup"></span>
</div>
<div id="otpform" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" id="otpclose" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
       <p><strong>Plese Enter OTP</strong></p>
        <div class="pt-2">
   <form action="#" method="post" id="otpsubmitForm">
  <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" onKeyPress="return isNumber(event)">
      <input type="hidden" name="type" id="type" value="otpval">
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" style="width:264px;"> Submit OTP </button>
        </div>
        </form>          
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/lib/jquery-3.6.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/account.js"></script>
<script src="assets/js/fpassword.js"></script>
<script type="text/javascript">
	var umobile = document.getElementById("mobile");
	var mobicon1 = document.getElementById("mobicon1");
	var mobicon2 = document.getElementById("mobicon2");
	
	var uotp = document.getElementById("sotp");
	var otpicon1 = document.getElementById("otpicon1");
	var otpicon2 = document.getElementById("otpicon2");
	
	var upassword = document.getElementById("password");
	var passicon1 = document.getElementById("passicon1");
	var passicon2 = document.getElementById("passicon2");
	
	umobile.addEventListener("click", function(event){
		event.stopPropagation();
		if (!umobile.value.startsWith("+91") && !umobile.value.startsWith("+9") && !umobile.value.startsWith("+")) {
			umobile.value = "+91" + umobile.value;
		}
		mobicon1.style.display="none";
		mobicon2.style.display="";
		passicon1.style.display="";
		passicon2.style.display="none";
		otpicon1.style.display="";
		otpicon2.style.display="none";
		
		umobile.style.caretColor="#9C27B0";
	});
	
	uotp.addEventListener("click", function(event){
		event.stopPropagation();
		passicon1.style.display="";
		passicon2.style.display="none";
		mobicon1.style.display="";
		mobicon2.style.display="none";
		otpicon1.style.display="none";
		otpicon2.style.display="";
		
		uotp.style.caretColor="#9C27B0";
	});
	
	upassword.addEventListener("click", function(event){
		event.stopPropagation();
		passicon1.style.display="none";
		passicon2.style.display="";
		mobicon1.style.display="";
		mobicon2.style.display="none";
		otpicon1.style.display="";
		otpicon2.style.display="none";
		
		upassword.style.caretColor="#9C27B0";
	});
	
	document.addEventListener("click", function(event) {
		if (!event.target.matches("#umobile, #uotp, #upassword")) {
			passicon1.style.display = "";
			passicon2.style.display = "none";
			mobicon1.style.display = "";
			mobicon2.style.display = "none";
			otpicon1.style.display="";
			otpicon2.style.display="none";
		}
	});
</script>
</body>
</html>