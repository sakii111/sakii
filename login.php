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
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />

<style>
    #loginForm{
	 color: #868f8b;	
	}
	.btn { background-image: linear-gradient(
#009688 , 
#009688 );
    border-radius: 5px 5px 5px 5px;
    border: 0.5px solid white;
    color: white;
    transition: 0.5s;
    
}
.chng {
	background-image: linear-gradient(#f5f5f5 , #f5f5f5);
	color: rgba(0,0,0,.87);
}
.two_btn[data-v-309ccc10]  {
	margin-top: 0px;
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
	margin-top: -200px;
	/* margin-left: 695px; */
	/*transition: visibility 1s;*/
}
.popup .show {
	 visibility: visible;
	}
.popup .hide {
	 visibility: hidden;
	}   
</style>
</head>

<body>


<!-- * Page loading --> 

<!-- App Header -->
<div class="appHeader1" style="background-color:#009688 !important">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack"><i class="icon ion-md-arrow-back"></i></a>
            <div class="pageTitle">Login</div>
        </div>
 
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
    <form action="#" id="loginForm" method="post" class="" autocomplete="off">
		<div data-v-309ccc10="" class="recharge_box">
				<div data-v-309ccc10="" class="input_box">
					<img data-v-309ccc10="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7Q
					NX0CiMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4
					dQK8RqyEjPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85
					btELGWbRCDlm0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2
					wRwWC5rZH8kcqYk8LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0Fx
					X+xH7CsCOhjAx5prkroZTJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII=" alt="" id="mobicon1">
					<img data-v-309ccc10="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHR
					YTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZ
					TpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczp
					yZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9uc
					y5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29
					tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwL
					zEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1Q
					xNjo0OToxNCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjI6NTkrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjI6NTkrMDg6M
					DAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3R
					hbmNlSUQ9InhtcC5paWQ6NDRhYWM4MjAtOWE3MC02MzQ0LWJmMDQtMjViNDVjYjQwM2Y1IiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6MDJlNTNjM
					jYtMTE3OS0zYTQwLThjM2EtZTY5YzMyODNmOGYxIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6NTliZmRlZmQtYjQzZi04NzQ4LWIzOWYtYTUzYTZhM2Y0MTF
					mIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo1OWJmZGVmZC1iNDNmL
					Tg3NDgtYjM5Zi1hNTNhNmEzZjQxMWYiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NDk6MTQrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCB
					DQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjQ0YWFjODIwLTlhNzAtNjM0NC1iZjA0LTI1YjQ1Y
					2I0MDNmNSIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyMjo1OSswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3R
					FdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlb
					mQ9InIiPz6d6mY/AAABXklEQVRoge2aoU4DQRCGvxKeAY0kIcGQoIuHoA5Vh8OSgOQqeQheAFQDnhoMCR6JrakEeYguybVc0pnpTTIJ8yUndrO3/3y53TO7g6ZpWMf93gTgDjh
					aO7g/3oCbi48z0eBt4aS3wLW1IiND4AsYSwZvCSetrNVsiDhXKrKvLKAGBh1PrZxHnCtdWlpqFktjla6+XvASAceiu7CIvANPfRfS4hQ41L6kFZkCx9oQJWPgBeUXlW72X6bK8
					VbUOVqRsKRINFIkGikSjRSJRopEI0WikSLRSJFopEg0UiQaKRKNFIlGikQjRaLxb0V2XKroIUd70HMJfAPP2iAFJyVHheXo7ao8ofA8DIXlk6ehZ5CnyCNw3mo/4HjxwOuvNWN
					ZgtKeOeW5imj6N8ZL5IC/y6gq/S5IRT4Nc7f3RFXaWsS50s3+CuwaCrEUv5orQvpFRiwuyswt1RiYl7yR9IUfjyIqQMLbQWwAAAAASUVORK5CYII=" alt="" style="display: none;" id="mobicon2">
					<img data-v-309ccc10="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF62lUWHR
					YTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZ
					TpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczp
					yZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9uc
					y5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29
					tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwL
					zEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1Q
					xNjo0OToxNCswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjM6MjgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjM6MjgrMDg6M
					DAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3R
					hbmNlSUQ9InhtcC5paWQ6ZmM4MmI1ZWYtZWU5Ny0zZDQ1LTkyZWUtN2FjZDhlNGVlYzlmIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZDA5YmJlY
					mYtYWViZi0xMzQ0LTgyZGEtM2QyMGMyODVkMzlmIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZGM5M2RmMTktZTUyZi03MjQ1LWE5NTEtODY5YjgxMmNlMzM
					4Ij4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpkYzkzZGYxOS1lNTJmL
					TcyNDUtYTk1MS04NjliODEyY2UzMzgiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NDk6MTQrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCB
					DQyAoV2luZG93cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmZjODJiNWVmLWVlOTctM2Q0NS05MmVlLTdhY2Q4Z
					TRlZWM5ZiIgc3RFdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyMzoyOCswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3R
					FdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlb
					mQ9InIiPz5B8LpeAAABX0lEQVRoge2aoU4DQRCGvyM8A0HiSTAk6CJwIA/VJ+ABQHKVvApIcBXUYEh4B2RrKkEeoktyLZd0ZnqTTMJ8ScVt5vafL7dbs1u1bctWDi8AHoCz7cW
					D8Q7cMZ+KiveFk94Dt9aOjIyAL2AiKd4TTlpbu9kRca5U5FjZQANUPb9GOY84V7q0tDSslsYmfWOD4CUCjk33YRH5AJ6HbqTDFXCqfUkrMgPOtSFKJsAryi8q3ey/zJT1VtQ5W
					pGwpEg0UiQaKRKNFIlGikQjRaKRItFIkWikSDRSJBopEo0UiUaKRCNFovFvRQ5cuhggR3vQcwN8Ay/aIAWXJUdFJbwwIChyYj6tJGWeh6GwfvI08gzyFHkCrjvPjzhePPD611q
					wLkF5XjjluYpoxnfGS+SEv8uoLuMuSEU+DXN390RdnrWIc6Wb/Q04MjRiaX4zV4T0i4xZXZRZWroxsCx5Y+kLPzI4LlR6fx8RAAAAAElFTkSuQmCC" alt="" style="display: none;">
					<input data-v-309ccc10="" type="tel" id="login_mobile" name="login_mobile" placeholder="Mobile Number" maxlength="13" style="color:rgba(0,0,0,.87);">
					<!--<span data-v-309ccc10="" class="tips_span">Mobile number is required</span>-->
				</div>
				<div data-v-309ccc10="" class="input_box">
					<img data-v-309ccc10="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRY
					TUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTp
					uczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZG
					Y9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZ
					G9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bo
					b3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9
					zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MT
					o0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIGRjO
					mZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9
					InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOmViYjZmNDRmLTkyYTktZWM0Yi05YjlhLTVjMzY
					4NDljOTU1YyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOmViYjZmNDRmLTkyYTktZWM0Yi05YjlhLTVjMzY4NDljOTU1YyI+IDx4bXBNTTpIaXN0b3J5PiA8cm
					RmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjI
					iBzdEV2dDp3aGVuPSIyMDIwLTA3LTA3VDE2OjUxOjQ3KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDwvcmRmOlNl
					cT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PndQ10oAAAiYSURBVGiB7ZlrrF1
					FFcd//9n7nNOWWlrSogKClCqltBBQCc8EooCCkAgE8QMxRBPxAyISGqOiH/QLEEN8EBMfiUoMGPwkEAGbRqHIQx4CQhWwvIQAt1Bp6b33nLP3/P1w9pzOPb339oGJDen6cs/eM7
					Nm/WbWXmvNXNnm3SDh/23A/0r2guxpshdkT5O9IHualACrV68GQBK2sY0kJFFVFZJot9vDdyn3VFVFjHG+pLdtE2MEIISAJGKM1HVNURSUZTnUnaQoCmxT1zUhBDqdDiEEJicnh
					/OGEKbYE2MczgNQluU2kF2RGONBksbqur4wxvimJNkubJfA2hDCJklzY4xVXdf92SCSUTnExMQEdV3vEkRVVTsFEgb2x+NDCK1+v39JURT71HW9StIRwOPA5hDCSbb/JGmd7adj
					jI8URfF8WZY929VMEEVR0G63dwlCEkVRDCFCCDsEmQd0JH01xrgixngGUNd1vUhS6nNU+i3pNOA0SZtCCPcXRXGr7bttPzkTRKfTQdIQIrnlrkDA7K61EDguhHCJpIuACigbo6t
					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" alt="" id="passicon1">
					<img data-v-309ccc10="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGtmlUWHRY
					TUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTp
					uczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZG
					Y9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZ
					G9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bo
					b3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9
					zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MT
					o0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MDErMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MDErMDg6MDAiIGRjO
					mZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9
					InhtcC5paWQ6ZWZhZmY1NWQtNzQ1Yi01NjRkLWE2NzctM2Y2ZTYzY2UwZWIyIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6NTgzNjU4ZWQtOWViYi0
					yMzQzLWFkMDUtMjEwZDBiZWEwM2M1IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIj4gPHhtcE
					1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplYmI2ZjQ0Zi05MmE5LWVjNGItOWI5Y
					S01YzM2ODQ5Yzk1NWMiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NTE6NDcrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93
					cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmNlZDlhOWUyLWU2NWItODE0My05MjRkLTE3YmY1NzMyYjcxZiIgc3R
					FdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyNDowMSswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD
					0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ZWZhZmY1NWQtNzQ1Yi01NjRkLWE2NzctM2Y2ZTYzY2UwZWIyIiBzd
					EV2dDp3aGVuPSIyMDIwLTA3LTE2VDEzOjI0OjAxKzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2Vk
					PSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PidSzWM
					AAAVZSURBVGiB7dpZiF1FGgfw3+2O3WYx6UjUcaKOSzRxi7gybhBx3BcwisuDDKKgPrijDK6ITyoi6gwDo4LLgzPoixpxJWhc4hJ3k8yMmhijokaNJrZmMX19+Kq8dS/dSbr7tD
					bSfzicU+fUqar/qe/7f1/VvbV6ve73gLbfegBVYYTIcMMIkeGGESLDDaPg7mkPD6aNcfi+ktEMAqMG8M42WIZT8Q1qaE9tzcZyjMZPWFvNMDeMjSHShh78GZvgLIzFntgV72AFD
					sazeAH/xxv4CGsEqSHFhoiMQScuxm44Euswsagzvbg+LB3L8TIexRzMr2a4fWN9RLpwgJiB08VXzfXz9SqsxBYt9yfiGDGLb+BfmIUfKh19gb6IdAkf+CsOKur+hG5hPguxLR7B
					JJyJDkFq09TGRByOQ3Al7sNXlbPQO5FxOBEXCXPKmI/PcLVw5ucSgR/S8QCmiVnYI7UxQYhBJ85P17cMAY9eiRyKy1tIzE4DfUY4cEb5dZel43nsgFdxMg4UMzQFN+A73KtiRav
					V6/XWOPI69inKT+F6MSPf9bP9g3GOMNMx6d4CnCJMszK0RvYLNJN4C9cKcv0lAXPxd8xDXsFNxcwBtLVelEQm4cKivBK34k2sHmD7PeIj3IRP0r12IQw7DrDNXlESmSHsOONRPC
					gC2mDxBF4sylPxFxFgK0Em0oGTivs/4rZ0rgLr8FjLvWOFQlaCTGSCRrwgHPHNqjpJeAqLivJemjOE9o1sp7SiWr7I8jsefywqzFN9wvelIHNeKo8VRI7D/0QGPV2kNwsF0XaRy
					/0hje99YSV7ipj2qcj3FmYiWwvzyvigYhIZswsi43GZCJ7jRNzZUsSvV4U57i1EYhF2FxL+ErYTwfcFoYY3ZSJbtnS4sdPcX6wsrjtxhkZ+toNQuTackOrU8ScRj1and6YJAeoQ
					OSDcWDr7qqKTyZVTCEwtrtel8yh8na7bWp7VinF1Fu9m6+lJ59F5Rr7VCFiE7bYXDVaFUt6X42YRgLvFLOQseikewvFirXNA8d79IubNwGLhJ/VMZInIk7ZL5W1S5S8qJNEu1io
					Zq0TAXSuc94ji2TyR792OszUTuUekS1PSOBfj7UxkqXCwTGQPEXmrJLKfcNiM9zRM413NprNYEF8qlKrEx0IB89g6sCbbZLeIvt2pPF5krpsOfvy/4NyW8iwN0+3SrJplVj6+5b
					12zW6whoZz1UWKnoPgJiJDPVI1W0YHivwqY5n4cBlt4ktn2V9RPOsSapeXDL1mAyXzJSKNOCSVJ+MS4ZTP93voDeyCa4q+enAnPizqdOMu4TdfpD7zbM3BTnhbqFivW0+tC6tZI
					sXePz2bIQJYu1h7r9Q8rRvC3mI9cmhx72vc3VJvNe4QAtO6FH5RrGFGiZms6QWtZvNfkXIvKAZ8NC7FURp2vD5zyx3NxFU4TbM5XKY55yrR13p+uSBBHx+ydUbW4UkRTS9I582F
					xm8vEst/iI25b4Tu5w52FeZyanrnOuFrmxXt3yziQOVoJVIX5vOAmO6zhBR3CK3Pej9fEB6NncUe1lEizRiHfTXSjXz+G/45FCTofc0udTxBqFbeTenULMc9wkR2Eub0rVCYEp8
					LebwC/6l26M3oa1+rR9jl48KEjhOOu4+YtbGCbJlydGl8fXhNSPozIusdUmxoy3QFnhbp8nSxqpsiMtC6yAS2EJG5JoLXv7EVbhT7XUuGYuCt2Njd+B/xSjp2FIueDiEOk0UcmJ
					OezRU7LjX9k+pBYSA/KyxKxxixllgj1Gmt2IXP+FV/wK+N/GFgmGGEyHDDCJHhhhEiww2/GyI/AzYzM6L+LxHkAAAAAElFTkSuQmCC" alt="" style="display: none;"id="passicon2">
					<img data-v-309ccc10="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAGtmlUWHRY
					TUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTp
					uczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZG
					Y9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZ
					G9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bo
					b3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9
					zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MT
					o0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MTQrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMTZUMTM6MjQ6MTQrMDg6MDAiIGRjO
					mZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9
					InhtcC5paWQ6MmE0NDM1ZmEtMWYxNy1jZDRiLWJjMDItZDhiNzMwZTc4YjdhIiB4bXBNTTpEb2N1bWVudElEPSJhZG9iZTpkb2NpZDpwaG90b3Nob3A6ZDY5MGZkYjctM2Y2ZS1
					hMzQxLTg2MGUtNjg4YmYxMTg1ZWZlIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZWJiNmY0NGYtOTJhOS1lYzRiLTliOWEtNWMzNjg0OWM5NTVjIj4gPHhtcE
					1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplYmI2ZjQ0Zi05MmE5LWVjNGItOWI5Y
					S01YzM2ODQ5Yzk1NWMiIHN0RXZ0OndoZW49IjIwMjAtMDctMDdUMTY6NTE6NDcrMDg6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93
					cykiLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMxY2ZmNjI0LTViZTQtOTc0MC05YWY4LThmYjBjZmQ2NGI0OCIgc3R
					FdnQ6d2hlbj0iMjAyMC0wNy0xNlQxMzoyNDoxNCswODowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD
					0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MmE0NDM1ZmEtMWYxNy1jZDRiLWJjMDItZDhiNzMwZTc4YjdhIiBzd
					EV2dDp3aGVuPSIyMDIwLTA3LTE2VDEzOjI0OjE0KzA4OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2Vk
					PSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PsgaxJw
					AAAUiSURBVGiB7dppjJ1TGAfw38zUjC6mQ2otpba2tKS22D6Q0FJLosTyAWlI8MEeItb4qCJCiAQRS2IJn7RCG2moWkLtqtZWFcHQooa2dK4Pz3vcc6870870HSYy/+Tmfc97zz
					nv8z/Pes69TZVKxf8Bzf+1AGVhiMhgwxCRwYYhIoMNw8AOx27OHKPwaxnCbA6G9WPMzujE6ViFJrQUcy3AagzHn/ijHDE3jk0h0oxuHIotMAsjMQWT8B5+wRF4AYvwCd7CF1gvS
					A0omiqVSm+mNQJtuAz7YBo2YOuNzLsar2EOFmJJGcL2ht6IdOAQoYEzxaomDab7tViDbeueJ6wWmrkXc/FbueJX0RORDuED5+Lw7Pmf6BLmsxS74GmMwdloFaS2LOZoKsatw7V4
					GD+UT6Oxj4zCybhUmFPCEnyD64UzvygI/FZ8HsNE4UuTizlGCzJtuKi4v20AeDTUyPGYXQiTsKAQ9HnhwBvDeMzAqThMaAh+xyV4SMkRrRGRN3FA1p6Pm4VGfu7j/EfgfGGmI4p
					nH+I0YZqloT6zX6yWxDu4UZDrKwl4FXdhMdIObgJm9mOuXpETGSPUnrAGt+Nt4az9QbdYhNn4qnjWIgLD7v2csyFyIkdhz6w9B0+KhLa5eA4vZ+0JOEYk2FKQiLTilOz577ijuJ
					aBDXim7tkMESFLQSIyWm2+WCpMqkzMx7Ksvb/aCqFlE+fJrSjlqb/zSDt2yjosVn7B970gc2HRHimInICPRQW9n6gGlgqiLaKW26GQ71NhJVNETvta1HtLE5EdhXklfFYyiYQFG
					ZF2XCny1Si8ju1EEn5dmONUESSWYV8Rwl/BOJF8F4loODsR2a7uhZuq5r5iTXbfhrNU67PxIso146SiTwW7iny0rhgzUQSgVlEDwi25s6/NXjK2dAqBCdn9huI6DD8W98113zVl
					crVlY5P1dBfX4UkjP6kmLMJ2W7IJy0Ie3lfjVpGAu4QWUhW9Ek/hRLHXOSQb94jIeUdhufCTSiKyQuz6xhXtnYvO35VIogVHZ+21IuH+IZw3r5MW4yrcifPUEnlQlEt7FnIux7u
					JyErhYInIZJF5yyRykHDYhA9UTeN9taazXBBfKSJVji9FBEyytWJ9sskukX27ina7qFy3VB4uqGvPVTXdDrVRM99etNeNa1HrBuupOldFlOgpCW4hKtRpyjkyOkzUVwmdYuESms
					VKp7D/S/Zdh4h2aUPWsBrIma8QZcSRRXssLhdO+VKfRa9ib9yQvasb9+HzrE8X7hd+813xzqSthdgD74oo1vDoqX4/MhkP4OCsz6PFi98SK9OXH1Smiv3IOaor2Sl2kcsa9B+j8
					VZ4a7EQnYLMP2SoN5uPRMn9Ydb5OFyB6ap23Ju5pfpnJq7DGWrN4coeSOiBBKGhzuK+4ULW79k3YJ7IphcX121EjN9NFJZ3i4O5VSLupxdMEuZyejHmJuFrW2Xz3yryQOno6RRl
					J7Gis4S55RFlSfGZJw4h9hJnWNNFmTEKB6qWG+l6De5R68gDTqRZlPbTVE9T2tSG425hInsIc/pJRJgc34rweDWeKFf0WvR0ZNot7PJZYUInCMc9QNjoSEE2Lzk6VFcf3hAh/Xl
					R9Q4oNnZkmjBc7BVmCOEnCkLjhJ+8L7TSjsexPW4R510rBkTyOmwqkRy7i01PqwgOY0UeWFh896o4cWkYJgcK/SGSMELsJdaL6PSv/YTQCE1DfxgYZBgiMtgwRGSwYYjIYMP/hs
					hfCcU+w0Xx35gAAAAASUVORK5CYII=" alt="" style="display: none;">
					<input data-v-309ccc10="" type="password" id="login_password" name="login_password" placeholder="Password" style="color:rgba(0,0,0,.87);">
					<!--<span data-v-309ccc10="" class="tips_span">Password is required</span>-->
				</div>
				<input type="hidden" name="action" value="login">
				<div data-v-309ccc10="" class="input_box_btn">
					<button data-v-309ccc10="" class="login_btn ripple">Login</button>
				</div>
				
		</div>
    </form>
	<div data-v-309ccc10="" class="input_box_btn">
		<div data-v-309ccc10="" class="two_btn">
			<a href="register.php"><button data-v-309ccc10="" class="ripplegrey">Register</button></a>
			<a href="forgotpass.php"><button data-v-309ccc10="" class="ripplegrey">Forgot Password?</button></a>
		</div>
	</div>
</div>
<!-- appCapsule -->
<div class="popup">
	<span class="popuptext" id="myPopup"></span>
</div>
<?php include("include/footer.php");?>
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
<script>
	var login_mobile = document.getElementById("login_mobile");
	var mobicon1 = document.getElementById("mobicon1");
	var mobicon2 = document.getElementById("mobicon2");
	
	var login_password = document.getElementById("login_password");
	var passicon1 = document.getElementById("passicon1");
	var passicon2 = document.getElementById("passicon2");
	
	login_mobile.addEventListener("click", function(event){
				event.stopPropagation();
				if (!login_mobile.value.startsWith("+91") && !login_mobile.value.startsWith("+9") && !login_mobile.value.startsWith("+")) {
					login_mobile.value = "+91" + login_mobile.value;
				}
				mobicon1.style.display="none";
				mobicon2.style.display="";
				passicon1.style.display="";
				passicon2.style.display="none";
				
				login_mobile.style.caretColor="#9C27B0";
	});
	
	login_password.addEventListener("click", function(event){
				event.stopPropagation();
				passicon1.style.display="none";
				passicon2.style.display="";
				mobicon1.style.display="";
				mobicon2.style.display="none";
				
				login_password.style.caretColor="#9C27B0";
	});
	
	document.addEventListener("click", function(event) {
		if (!event.target.matches("#login_mobile, #login_password")) {
			passicon1.style.display = "";
			passicon2.style.display = "none";
			mobicon1.style.display = "";
			mobicon2.style.display = "none";
		}
	});
</script>
</body>
</html>