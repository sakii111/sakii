$(document).ready(function () { 
	$("#bankotp").click(function(event){
	  event.preventDefault();
	  mobileveryfication();
	});
});

function mobileveryfication(){
	var mobile = $('input#accountphone').val();
	if ((mobile)== "") {
				$("input#mobile").focus();
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Mobile number is required');
				popup.style.width = "180px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				return false;
				}
	if (mobile.length<10) {
				$("input#mobile").focus();
				var popup = document.getElementById("myPopup");
				popup.innerHTML = ('Enter valid phone number');
				popup.style.width = "180px";
				popup.classList.add("show");
				setTimeout(function(){
					popup.classList.remove("show");
				}, 2000);
				return false;
				}
	$.ajax({
		type: "Post",
		data:"mobile=" + mobile+ "& type=" + "mobile",
		url: "veryfynumberBank.php",
		
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
					var popup = document.getElementById("myPopup");
					popup.innerHTML = ('Mobile number not registered');
					popup.style.width = "240px";
					popup.classList.add("show");
					setTimeout(function(){
						popup.classList.remove("show");
					}, 2000);
				}
		  return false;
		  },
		  error: function (e) {}
	});
	
}

let intervalId, timeoutId;
const button = document.getElementById("bankotp");
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

document.getElementById("botp").addEventListener("click", function() {
	document.getElementById("vcr").style.zIndex="-1";
});	

$("#bankdetailform").on('submit',(function(e) {
	e.preventDefault();
	var name = $('input#name').val();
	var ifsc = $('input#ifsc').val();
	var bankname = $('input#bankname').val();
	var bankaccount = $('input#bankaccount').val();
	var state = $('input#state').val();
	var city = $('input#city').val();
	var address = $('input#address').val();
	var mobilenumber = $('input#mobilenumber').val();
	var email = $('input#email').val();	
	var mobile = $('input#accountphone').val();
	var botp = $('input#botp').val();
	var action = $('input#action').val();
				
	if ((botp)== "") {
		$("input#botp").focus();
		var vcr = document.getElementById("vcr");
		vcr.style.zIndex = "2";
		return false;
		}
	if ((name)== "") {
		$("input#name").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Actual name cannot be empty');
		popup.style.width = "210px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((bankaccount)== "") {
		$("input#bankaccount").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Bank account cannot be empty');
		popup.style.width = "210px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((ifsc)== "") {
		$("input#ifsc").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('IFSC code cannot be empty');
		popup.style.width = "200px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((bankname)== "") {
		$("input#bankname").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Bank name cannot be empty');
		popup.style.width = "200px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((state)== "") {
		$("input#state").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('State cannot be empty');
		popup.style.width = "170px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}	
	if ((city)== "") {
		$("input#city").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('City cannot be empty');
		popup.style.width = "155px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((address)== "") {
		$("input#address").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Address cannot be empty');
		popup.style.width = "170px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((mobilenumber)== "") {
		$("input#mobilenumber").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Mobile Number cannot be empty');
		popup.style.width = "220px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((email)== "") {
		$("input#email").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Email cannot be empty');
		popup.style.width = "160px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}
	if ((mobile)== "") {
		$("input#mobile").focus();
		var popup = document.getElementById("myPopup");
		popup.innerHTML = ('Actual Mobile cannot be empty');
		popup.style.width = "160px";
		popup.classList.add("show");
		setTimeout(function(){
			popup.classList.remove("show");
		}, 2000);
		return false;
		}

		$.ajax({
			type: "POST", 
			url: "addbankcardFast.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,      

			success: function(html)   
			{
				var arr = html.split('~');
				
				if (arr[0]== 1) {
					$("#bankdetailform")[0].reset();
					var popup = document.getElementById("myPopup");
					popup.innerHTML = ('Success');
					popup.style.width = "174px";
					popup.classList.add("show");
					setTimeout(function(){
						popup.classList.remove("show");
					}, 2000);
					setTimeout(function(){
						window.location.href = "withdrawal.php";
					}, 2100);
					resetTimer();
				}
				else if (arr[0]== 2) {
					$("input#accountphone").focus();
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
					$("input#accountphone").focus();
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
					$("input#botp").focus();
					var popup = document.getElementById("myPopup");
					popup.innerHTML = ('OTP does not match');
					popup.style.width = "150px";
					popup.classList.add("show");
					setTimeout(function(){
						popup.classList.remove("show");
						$('#sotp').removeClass('borderline');
					}, 2000);
				}
				else if(arr[0]==0){ 
					var popup = document.getElementById("myPopup");
					popup.innerHTML = ('Some technical error');
					popup.style.width = "150px";
					popup.classList.add("show");
					setTimeout(function(){
						popup.classList.remove("show");
					}, 2000);
				}
				else if(arr[0]==3){ 
					var popup = document.getElementById("myPopup");
					popup.innerHTML = ('Only one bank card can be bound');
					popup.style.width = "250px";
					popup.classList.add("show");
					setTimeout(function(){
						popup.classList.remove("show");
					}, 2000);
				}
			}
			
		});	
}));