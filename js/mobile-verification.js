function sendOTP() {
	$(".error").html("").hide();
	console.log("inside send");
	var number = $("#mobile").val();
	if (number.length == 10 && number != null) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp"
		};
		console.log("ajax set");
		$.ajax({
			url : 'includes/mobile-verification-controller.inc.php',
			type : 'POST',
			data : input,
			success : function(response) {
				$(".login-form").html(response);
			},
			error:function(data){
				console.log(data);
				alert("ajax error, json: " + data);
			}
		});
	} else {
		$(".error").html('Please enter a valid number!')
		$(".error").show();
	}
}

function verifyOTP() {
	$(".error").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : '../includes/mobile-verification-controller.inc.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
				$("." + response.type).html(response.message)
                $("." + response.type).show();
                setTimeout(() => {
                    window.location="../profile.php"
                }, 1500);
			},
			error : function() {
				alert("ss");
			}
		});
	} else {
		$(".error").html('You have entered wrong OTP.')
		$(".error").show();
	}
}