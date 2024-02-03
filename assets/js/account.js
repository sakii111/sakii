	$.validator.setDefaults({
		submitHandler: function() {
		}
	});

//===============================================login validation=======================================================
$().ready(function() {
				
	});

$(document).ready(function () { 

$("#reg_otp").click(function(event){
	//debugger;
  event.preventDefault();
  // your code here
  mobileveryfication();
});


//=====================Login Script================================================================

$("#loginForm").on('submit',(function(e) {
e.preventDefault();

var loginmobile = $('input#login_mobile').val();
var loginpassword = $('input#login_password').val();
		
if ((loginmobile)== "") {
			$("input#login_mobile").focus();
			$('#login_mobile').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Mobile number is required');
			popup.style.width = "180px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#login_mobile').removeClass('borderline');
			}, 2000);
            return false;
			}
if (loginmobile.length<10) {
            $("input#login_mobile").focus();
			$('#login_mobile').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Enter valid phone number');
			popup.style.width = "180px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#login_mobile').removeClass('borderline');
			}, 2000);
            return false;
			}		
			
if ((loginpassword)== "") {
            $("input#login_password").focus();
			$('#login_password').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Password is required');
			popup.style.width = "150px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#login_password').removeClass('borderline');
			}, 2000);
            return false;
			}
			
if (loginpassword.length<5) {
            $("input#login_password").focus();
			$('#login_password').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Minimum 5 character password is required');
			popup.style.width = "280px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#login_password').removeClass('borderline');
			}, 2000);
            return false;
			}

		$.ajax({
			type: "POST", 
			url: "loginNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 1) {
				window.location.href = "mine.php";
			}	
			else if(arr[0]==0)
			{ 
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Wrong mobile number or password Entered !');
				popup.style.width = "290px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				return false;
			}
			
			}
		});
	
//=====================change password================================================================
	
}));

//================================================match otp===================================================
$("#otpsubmitForm").on('submit',(function(e) {
e.preventDefault();

var otp = $('input#otp').val();

		
if ((otp)== "") {
            $("input#otp").focus();
			$('#otp').addClass('borderline');
            return false;
			}

		$.ajax({
			type: "POST", 
			url: "veryfynumberNow.php",              
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

function mobileveryfication(){
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
    url: "veryfynumberNow.php",
	
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
			startTimer();
	}
			else if (arr[0]== 2) {
				$("input#mobile").focus();
				$('#mobile').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Mobile number already registered');
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
	
	let intervalId, timeoutId;
	const button = document.getElementById("reg_otp");
	function startTimer() {
	  // Disable the button
	  button.setAttribute("disabled", true);
	  // Change the text of the button
	  button.textContent = "WAIT 120s";
	  // Start the interval and store the interval ID
	  intervalId = setInterval(updateTimer, 1000);
	  // Start the timeout and store the timeout ID
	  timeoutId = setTimeout(resetTimer, 120000);
	}

	function updateTimer() {
	  // Decrement the timer by 1 second
	  button.textContent = "WAIT " + (parseInt(button.textContent.split(" ")[1]) - 1) + "s";
	}

	function resetTimer() {
	  // Clear the interval and timeout
	  clearInterval(intervalId);
	  clearTimeout(timeoutId);
	  // Reset the text of the button
	  button.textContent = "OTP";
	  // Enable the button
	  button.removeAttribute("disabled");
	  // Add the mobileveryfication function to the click event
	  button.addEventListener("click", mobileveryfication);
	}
	
	$("#Register").on('submit',(function(e) {
		//debugger;
e.preventDefault();
var mobile = $('input#mobile').val();
var sotp = $('input#sotp').val();
var password = $('input#password').val();
var rcode = $('input#rcode').val();
			
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
if ((rcode)== "") {
            $("input#rcode").focus();
			$('#rcode').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Recommendation code is required');
			popup.style.width = "230px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#rcode').removeClass('borderline');
			}, 2000);
            return false;
			}
if($('#remember').is(':checked')){}
else{
			$("input#remember").focus();
			$('#remember').addClass('borderline');
			var popup = document.getElementById("myPopup");
			popup.innerHTML = ('Agree to privacy policy');
			popup.style.width = "170px";
			popup.classList.add("show");
			setTimeout(function(){
				popup.classList.remove("show");
				$('#remember').removeClass('borderline');
			}, 2000);
	return false;}			

		$.ajax({
			type: "POST", 
			url: "registerNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 1) {
				$("#Register")[0].reset();
				//window.location.href = "successvisitorNow";
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Successfully registered');
				popup.style.width = "174px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				resetTimer();
				setTimeout(function(){
					window.location.href = "login.php"
				}, 2100);
			}
			else if (arr[0]== 2) {
				$("input#mobile").focus();
				$('#mobile').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Mobile number already registered');
				popup.style.width = "240px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
					$('#mobile').removeClass('borderline');
				}, 2000);
			}
			else if (arr[0]== 3) {
				$("input#rcode").focus();
				$('#rcode').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Wrong recommendation code entered');
				popup.style.width = "260px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
					$('#rcode').removeClass('borderline');
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
			else if(arr[0]==0)
			{ var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Some technical error');
				popup.style.width = "150px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
			}
			}
			
		});
	
	
}));