$("#rideacar-login").click(function(){
var username=$("#exampleInputEmail1").val();	
var gpassword=$("#exampleInputPassword1").val();	
if(username==''){
	$("#error-login").html('<div class="alert alert-danger"> Please Enter Your UserName.</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if(gpassword==''){
	$("#error-login").html('<div class="alert alert-danger"> Please Enter Your Password.</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if(username.length<6){
	$("#error-login").html('<div class="alert alert-danger"> UserName Length Should Be Greater than or eaual to 6.</div>').show().delay(5000).fadeOut("slow");
	return false;
}/* else if(username.length>15){
	$("#error-login").html('<div class="alert alert-danger"> UserName Length Should Be Less than 15.</div>').show().delay(5000).fadeOut("slow");
	return false;
} */else if(gpassword.length<8){
	$("#error-login").html('<div class="alert alert-danger">  Password Length Should Be greater or equal to 8.</div>').show().delay(5000).fadeOut("slow");
	return false;
}/* else if(gpassword.length>15){
	$("#error-login").html('<div class="alert alert-danger"> Password Length Should Be less 15.</div>').show().delay(5000).fadeOut("slow");
	return false;
} */else{
	$.ajax({
		type: "POST",
		url: "request/login.php",
		data: "scar_username="+username+"&scar_password="+gpassword,
		success: function(response){
		$("#error-login").html(''); 
		if(response==1){
		window.location='index';	
		}else if(response==2){
		window.location='master-dashboard';	
		}else{
		$("#error-login").html(response).show().delay(5000).fadeOut("slow");	
		}
		}
	});
	return false;
}
});

$("#hotel-login").click(function(){
var username=$("#hotel-username").val();	
var gpassword=$("#hotel-password").val();	
if(username==''){
	$("#error-login").html('<div class="alert alert-danger"> Please Enter Your UserName.</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if(gpassword==''){
	$("#error-login").html('<div class="alert alert-danger"> Please Enter Your Password.</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if(username.length<6){
	$("#error-login").html('<div class="alert alert-danger"> UserName Length Should Be Greater than or eaual to 6.</div>').show().delay(5000).fadeOut("slow");
	return false;
}/* else if(username.length>15){
	$("#error-login").html('<div class="alert alert-danger"> UserName Length Should Be Less than 15.</div>').show().delay(5000).fadeOut("slow");
	return false;
} */else if(gpassword.length<8){
	$("#error-login").html('<div class="alert alert-danger">  Password Length Should Be greater or equal to 8.</div>').show().delay(5000).fadeOut("slow");
	return false;
}/* else if(gpassword.length>15){
	$("#error-login").html('<div class="alert alert-danger"> Password Length Should Be less 15.</div>').show().delay(5000).fadeOut("slow");
	return false;
} */else{
	$.ajax({
		type: "POST",
		url: "request/login.php",
		data: "hotel_username="+username+"&hotel_password="+gpassword,
		success: function(response){
		$("#error-login").html('');
		if(response==1){
		window.location='hotel-dashboard';	
		}else{
		$("#error-login").html(response).show().delay(5000).fadeOut("slow");	
		}
		}
	});
	return false;
}
}); 
$("body").on("click","#reset_password",function(){
	var v_postdata="password_reset=password_reset&password_reset_type="+$("[name='login_client[]']:checked").val();
	open_modal(v_postdata,"request/login.php");
	
});
$("body").on("click","#reset_submit",function(){
	if($("#reset_emailid").val()==''){
		$("#error-password").html('<div class="alert alert-danger"> Please Enter Your Email ID</div>').show().delay(5000).fadeOut("slow");
	return false;
	}else{
	var datasend="reset_password_email="+$("#reset_emailid").val()+"&reset_password_reset_type="+$("#reset_password_reset_type").val();
	$.ajax({
		type: "POST",
		url: "request/login.php",
		data: datasend,
		success: function(response){
		if(response==1){
		$("#error-password").html('<div class="alert alert-success">Please Check Your EmailID</div>').show().delay(5000).fadeOut("slow");	
		$("#reset_emailid").val('');
		}else{
		$("#error-password").html(response).show().delay(5000).fadeOut("slow");	
		}
		}
	}); 
	}
}); 
$("body").on("click","#access-password",function(){
	if($("#verification-code").val()==''){
		$("#error-verification").html('<div class="alert alert-danger"> Please Enter Your Verification Code</div>').show().delay(5000).fadeOut("slow");
		return false;
	}else{
	var datasend="verification_code="+$("#verification-code").val();
	$.ajax({
		type: "POST",
		url: "request/login.php",
		data: datasend,
		success: function(response){
		if(response==1){
		get_password();
		}else{
		$("#error-verification").html(response).show().delay(5000).fadeOut("slow");	
		}
		}
	}); 
	}
});
function get_password(){
	var datasend="get_password=get_password";
	$.ajax({
		type: "POST",
		url: "request/login.php",
		data: datasend,
		success: function(response){
		$(".signin").html(response);
		}
	});
	
}

$("body").on("click","#new-password",function(){
	if($("#reset-newpassword").val()==''){
		$("#error-verification").html('<div class="alert alert-danger"> Please Enter Your New Password Code</div>').show().delay(5000).fadeOut("slow");
		return false;
	}else if($("#reset-newpassword1").val()==''){
		$("#error-verification").html('<div class="alert alert-danger"> Please Confirm Your New Password</div>').show().delay(5000).fadeOut("slow");
	return false;
	}else if($("#reset-newpassword1").val() !=$("#reset-newpassword").val()){
		$("#error-verification").html('<div class="alert alert-danger"> Password Does Not Match</div>').show().delay(5000).fadeOut("slow");
	return false;
	}else{
	var datasend="reset_password_user_id="+$("#password_user_id").val()+"&reset_c_password="+$("#reset-newpassword1").val()+"&request_from="+$("#request_from").val();;
	$.ajax({
		type: "POST",
		url: "request/profile.php",
		data: datasend,
		success: function(response){
		if(response==1){
		$("#error-verification").html(response);
		window.location='./';
		}else{
		$("#error-verification").html(response).show().delay(5000).fadeOut("slow");	
		}
		}
	}); 
	}
});