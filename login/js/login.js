$(document).ready(function(){
	$("#otp").hide();
	$("#login_form").submit(function(e){
		e.preventDefault();
		phone_no = document.getElementById('ph_no').value;  
		$.ajax({
			type : "POST",
			url : "../controller/login_controller.php",
			data : {phone_no : phone_no},
			success: function(data){
				console.log(data);
				if(data == "error"){
					document.getElementById('response').innerHTML = '<div class="alert alert-danger"><strong>Sorry!</strong>Contact Administrator!</div>' ;
					console.log("error");
				}else{
					$("#mobile_otp").text("OTP:"+data);

					$("#login").hide();
					$("#otp").show();
					$("#mobile").show();
					$("#otp_form").submit(function(e){
						e.preventDefault();
						otp = $("#otp_content").val();
						    // otp = "#500"+otp;
						    // console.log(otp);
						    if(data == otp){
                            get_user_details(phone_no);
                        }else{
                            $("#otp").hide();
                            document.getElementById('response').innerHTML = '<div class="alert alert-danger"><strong>Sorry!</strong>Invalid OTP</div>' ; 
                        }
						
					});

				}
			}
		});
	});	
});

function get_user_details(phone_no){
	// console.log("hwllo");
	$.ajax({
		type : "POST",
		url : "../controller/validate_login_details.php",
		data : {phone_no : phone_no},
		success: function(data){
			// console.log(data);
			if(data == "error"){
				document.getElementById('footer_response').innerHTML = '<div class="alert alert-danger"><strong>Sorry!</strong> Signup your Account </div>' ;
			}else{
				window.location = "../view/";
			}
		}
	});
}
