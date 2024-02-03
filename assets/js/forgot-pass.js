$(document).ready(function () { 
	$("#reg_otp").click(function(event){
	  event.preventDefault();
	  mobileveryfication();
	});
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
		url: "veryfynumberPass.php",
		
		success: function (html) { 
			var arr = html.split('~');
			if (arr[0]== 1) {
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

$("#Changepass").on('submit',(function(e) {
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
			url: "passwordNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ 
			var arr = html.split('~');
			
			if (arr[0]== 1) {
				$("#Changepass")[0].reset();
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Success');
				popup.style.width = "100px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				resetTimer();
				setTimeout(function(){
					window.location.href="login.php";
				}, 2100);
			}
			else if (arr[0]== 2) {
				$("input#mobile").focus();
				$('#mobile').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Mobile number not registered');
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
			if (arr[0]== 6) {
				$("input#password").focus();
				$('#password').addClass('borderline');
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Error');
				popup.style.width = "100px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				resetTimer();
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