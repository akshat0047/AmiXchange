function sendOTP() {
	$(".error").html("").hide();
	$("#loader").html("<br/><i class='fas fa-spinner fa-spin' style='color:white'></i>");
	var number = $("#mobile").val();
	if (number.length == 10 && number != null) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp"
		};
		$.ajax({
			url : 'includes/mobile-verification-controller.inc.php',
			type : 'POST',
			data : input,
			success : function(response) {
				$(".login-form").html(response);
			},
			error:function(data){
				
			}
		});
	} else {
		
	    $(".error").html('<p class="num-error">Please enter a valid number!</p>');
		$(".error").show();
		$("#loader").hide();	
	}
}

function verifyOTP() {
	$(".error").html("").hide();
	$("#loader").html("<br/><i class='fas fa-spinner fa-spin' style='color:white'></i>");
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : 'includes/mobile-verification-controller.inc.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
				$(".log-head").hide();
				$("#loader").html("<br/><i class='fas fa-spinner fa-spin' style='color:white'></i>");
				$("." + response.type).html("<class='error'>"+response.message+"</div>");
                $("." + response.type).show();
                setTimeout(() => {
                    window.location="profile.php";
                }, 1500);
			},
			error : function(ts) {
				alert(ts.responseText);
			}
		});
	} else {
		$(".error").html('<p class="num-error">You have entered wrong OTP</p>')
		$(".error").show();
		$("#loader").html("<br/><i class='fas fa-spinner fa-spin' style='color:white'></i>");
	}
}