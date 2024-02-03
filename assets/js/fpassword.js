$(document).ready(function () { 

$("#forgotpass_otp").click(function(event){
	//debugger;
  event.preventDefault();
  // your code here
  mobileverification();
});

$("#Resetpassword").on('submit',(function(e) {
e.preventDefault();
var mobile = $('input#mobile').val();
var sotp = $('input#sotp').val();
var password = $('input#password').val();
			
if ((mobile)== "") {
            $("input#mobile").focus();
			$('#mobile').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Mobile number is required');
			popup.style.width = "180px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#mobile').removeClass('borderline');
			}, 2000);
            return false;
			}
if (mobile.length<10) {
            $("input#mobile").focus();
			$('#mobile').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Enter valid phone number');
			popup.style.width = "180px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#mobile').removeClass('borderline');
			}, 2000);
            return false;
			}
if ((sotp)== "") {
            $("input#sotp").focus();
			$('#sotp').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Verification code is required');
			popup.style.width = "200px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#sotp').removeClass('borderline');
			}, 2000);
            return false;
			}			
if ((password)== "") {
            $("input#password").focus();
			$('#password').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Password is required');
			popup.style.width = "150px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#password').removeClass('borderline');
			}, 2000);
            return false;
			}
if (password.length<5) {
            $("input#password").focus();
			$('#password').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Minimum 5 character password is required');
			popup.style.width = "280px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#password').removeClass('borderline');
			}, 2000);
            return false;
			}			

		$.ajax({
			type: "POST", 
			url: "forgot-passwordNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 1) {
				$("#Resetpassword")[0].reset();
				//window.location.href = "successvisitorNow";
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Successfully reset');
				popup.style.width = "140px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				resetTimerf();
			}
			else if (arr[0]== 2) {
				$("input#mobile").focus();
				$('#mobile').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Mobile number is not registered');
				popup.style.width = "240px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
					$('#mobile').removeClass('borderline');
				}, 2000);
			}			
			else if (arr[0]== 4) {
				$("input#mobile").focus();
				$('#mobile').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Verify Mobile number');
				popup.style.width = "150px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
					$('#mobile').removeClass('borderline');
				}, 2000);
			}
			else if (arr[0]== 5) {
				$("input#sotp").focus();
				$('#sotp').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('OTP does not match');
				popup.style.width = "150px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
					$('#sotp').removeClass('borderline');
				}, 2000);
			}
			else if (arr[0]== 6) {
document.getElementById('regtoast').innerHTML = ('<font size="2" style="color:#f00;">The reset password page has expired. Please reload the page.</font>');
			$('#registertoast').modal({backdrop: 'static', keyboard: false})  
                   $('#registertoast').modal('show');
			}
			else if (arr[0]== 7) {
document.getElementById('regtoast').innerHTML = ('<font size="2" style="color:#f00;">Please do not change the CSRF Token.</font>');
			$('#registertoast').modal({backdrop: 'static', keyboard: false})  
                   $('#registertoast').modal('show');
			}
			else if(arr[0]==0)
			{ document.getElementById('serror').innerHTML = ('<font size="2" style="color:#f00;">Some Technical error !</font>');
				}
			
			}
		});
	
	
}));
$("#forgotpotpsubmitForm").on('submit',(function(e) {
e.preventDefault();

var otp = $('input#otp').val();

		
if ((otp)== "") {
            $("input#otp").focus();
			$('#otp').addClass('borderline');
            return false;
			}

		$.ajax({
			type: "POST", 
			url: "verifynumberNow",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 1) {
			$("#otpclose").click();	
	document.getElementById('regtoast').innerHTML = ('<font size="2" style="color:#000;">OTP match successfully !</font>');
			$('#registertoast').modal({backdrop: 'static', keyboard: false})  
            $('#registertoast').modal('show');
			$('#mobile').attr('readonly', true);
			}	
			else if(arr[0]==0)
			{ document.getElementById('regtoast').innerHTML = ('<font size="2" style="color:#f00;">Wrong OTP Entered !</font>');
			$('#registertoast').modal({backdrop: 'static', keyboard: false})  
            $('#registertoast').modal('show');
				}
			
			}
		});
	
//=====================change password================================================================
	
}));
});

let intervalIdf, timeoutIdf;
	const buttonf = document.getElementById("forgotpass_otp");
	function startTimerf() {
	  // Disable the button
	  buttonf.setAttribute("disabled", true);
	  // Change the text of the button
	  buttonf.textContent = "WAIT 120s";
	  // Start the interval and store the interval ID
	  intervalIdf = setInterval(updateTimerf, 1000);
	  // Start the timeout and store the timeout ID
	  timeoutIdf = setTimeout(resetTimerf, 120000);
	}

	function updateTimerf() {
	  // Decrement the timer by 1 second
	  buttonf.textContent = "WAIT " + (parseInt(buttonf.textContent.split(" ")[1]) - 1) + "s";
	}

	function resetTimerf() {
	  // Clear the interval and timeout
	  clearInterval(intervalIdf);
	  clearTimeout(timeoutIdf);
	  // Reset the text of the button
	  buttonf.textContent = "OTP";
	  // Enable the button
	  buttonf.removeAttribute("disabled");
	  // Add the mobileveryfication function to the click event
	  buttonf.addEventListener("click", mobileverification);
	}

function mobileverification(){
var mobile = $('input#mobile').val();
if ((mobile)== "") {
            $("input#mobile").focus();
			$('#mobile').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Mobile number is required');
			popup.style.width = "180px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#mobile').removeClass('borderline');
			}, 2000);
            return false;
			}
if (mobile.length<10) {
            $("input#mobile").focus();
			$('#mobile').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Enter valid phone number');
			popup.style.width = "180px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#mobile').removeClass('borderline');
			}, 2000);
            return false;
			}
$.ajax({
    type: "Post",
    data:"mobile=" + mobile+ "& type=" + "mobile",
    url: "verifynumberNow.php",
	
    success: function (html) { 
	//alert(html);
	 var arr = html.split('~');
	if (arr[0]== 1) {
		//data = JSON.parse(arr[1])
				//alert(data.Status);
				
		//alert(data.Details);
		
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Success');
			popup.style.width = "100px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
			}, 2000);
			startTimerf();
	}
			else if (arr[0]== 2) {
				$("input#mobile").focus();
				$('#mobile').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Mobile number is not registered');
				popup.style.width = "240px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
					$('#mobile').removeClass('borderline');
				}, 2000);
			}
      return false;
      },
      error: function (e) {}
      });
	
	}