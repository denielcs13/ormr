$("body").on("click", " a#user_view", function(e) {
e.preventDefault();	
var send_data ="view_hotel_detail="+$(this).data('hotel_id');
var send_url= "request/user-list.php";
open_modal(send_data,send_url);
});
$("body").on("click", " a#password_update", function(e) {
e.preventDefault();	
var send_data ="update_hotel_password="+$(this).data('hotel_id')+"&update_hotel_name="+$(this).data('hotel_name');
var send_url= "request/hotel-list.php";
open_modal(send_data,send_url);
});
$("body").on("click", " a#bank_details", function(e) {
e.preventDefault();	
var send_data ="view_bank_detail="+$(this).data('hotel_id')+"&view_bank_id=0";
var send_url= "request/hotel-list.php";
open_modal(send_data,send_url);
});
$("body").on("click","#edit_bank_detail",function(){
var send_data ="view_bank_detail="+$(this).data('hotel_id')+"&view_bank_id="+$(this).data('bank_id');
var send_url= "request/hotel-list.php";
open_modal(send_data,send_url);
});
$("body").on("click","#list_bank_detail",function(){
	var send_data ="view_bank_detail="+$(this).data('hotel_id')+"&view_bank_id=0";
	var send_url= "request/hotel-list.php";
	open_modal(send_data,send_url);
		});
$("body").on("click","#add_new_bank_detail",function(){
			$("#div_view_details").css("display","none");
			$("#div_bank_details").css("display","block");
		});
		
 $("body").on("click","#change_password",function(){
	 if($("#password").val() == ''){
	$("#error-password").html('<div class="alert alert-danger"> Please Enter Password</div>').show().delay(5000).fadeOut("slow");
	return false; 
}else if($("#password").val().length<8){
	$("#error-password").html('<div class="alert alert-danger"> Password Length Should Be Greater than or eaual to 8.</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if($("#password").val().length>16){
	$("#error-password").html('<div class="alert alert-danger"> Password Length Should Be Less than 16.</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if($("#con-password").val() == ''){
	$("#error-password").html('<div class="alert alert-danger"> Please Enter Confirm Password</div>').show().delay(5000).fadeOut("slow");
	return false;
}else if($("#password").val() != $("#con-password").val()){
	$("#error-password").html('<div class="alert alert-danger"> Password and Confirm Password Does not Match</div>').show().delay(5000).fadeOut("slow");
	return false;
}else{
	var add_url="request/hotel-list.php";
	var add_postdata="update_password_id="+$(this).data("hotel_id")+"&update_password="+$("#password").val();
	var add_showid=$("#error-password");
	ajax_add(add_url,add_postdata,add_showid);
}
return false;   
		   
	   });
	   $("body").on("click","#add_bank_detail",function(){
	 if($("#b_bank_name").val() == ''){
	$("#error-bank").html('<div class="alert alert-danger"> Please Enter Bank Name.</div>').show().delay(5000).fadeOut("slow");
	return false; 	   
	}else if($("#b_contact_name").val() == ''){
	$("#error-bank").html('<div class="alert alert-danger"> Please Enter Contact Name.</div>').show().delay(5000).fadeOut("slow");
	return false; 
	}else if($("#b_contact_number").val() == ''){
	$("#error-bank").html('<div class="alert alert-danger"> Please Enter Contact Number.</div>').show().delay(5000).fadeOut("slow");
	return false; 
	}else if($("#b_account_holder").val() == ''){
	$("#error-bank").html('<div class="alert alert-danger"> Please Enter Account Holder Name.</div>').show().delay(5000).fadeOut("slow");
	return false; 
	}else if($("#b_account_number").val() == ''){
	$("#error-bank").html('<div class="alert alert-danger"> Please Enter Account Number.</div>').show().delay(5000).fadeOut("slow");
	return false; 
	}else if($("#b_ifsc_code").val() == ''){
	$("#error-bank").html('<div class="alert alert-danger"> Please Enter ifsc.</div>').show().delay(5000).fadeOut("slow");
	return false; 
	} else{
	var add_url="request/hotel-list.php";
	var add_postdata="add_bank_detail_id="+$(this).data("hotel_id")+"&b_bank_name="+$("#b_bank_name").val()+"&b_contact_name="+$("#b_contact_name").val()+"&b_contact_number="+$("#b_contact_number").val()+"&b_account_holder="+$("#b_account_holder").val()+"&b_account_number="+$("#b_account_number").val()+"&b_ifsc_code="+$("#b_ifsc_code").val()+"&b_id="+$("#b_id").val();
	var add_showid=$("#error-bank");
	$("#add_bank_detail").css("display","none");
	$("#add_bank_detail").after('<div id="loader"><img src="images/loading_bar.gif" alt="loading" style="width: 100%;" /></div>');	
	ajax_add(add_url,add_postdata,add_showid);
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	$("#add_bank_detail").css("display","block");
}
return false;   
		   
	   });
	    
		
	   
 $("body").on("click","#admin_hotel_login",function(){
		   var username=$(this).data('username');
		   var password=$(this).data('password');
			$.ajax({
				type: "POST",
				url: "request/login.php",
				data: "hotel_username="+username+"&hotel_password="+password+"&login_type="+$("#login_type").val(),
				success: function(response){
				if(response==1){
				var redirectWindow = window.open('../admin/dashboard', '_blank');
				redirectWindow.location;
				//window.location='hotel-dashboard';
				}else{
				$("#error-hotel").html(response).show().delay(5000).fadeOut("slow");	
				}
				},async: false
			});
			return false;   
		   
	   });
	  $("body").on("click","#hotel_status",function(){	   
		   var thisval=$(this);
		   var a_status=$(this).data('status');
		   var a_id=$(this).data('hotel_id');
		   var postdata="hotel_status="+a_status+"&hotel_id="+a_id+"&hotel_userid="+user_id;
		   var activedata='<a href="#" data-hotel_id="'+a_id+'" title="Admin Active" class="btn btn-xs btn-success" id="hotel_status" data-status="1"><i class="fa  fa-plus-circle"></i> Active</a>';
		   var inactivedata='<a href="#" data-hotel_id="'+a_id+'" title="Admin In-Active" class="btn btn-xs btn-danger" id="hotel_status" data-status="0"><i class="fa  fa-minus-circle"></i> In-active</a>';
		   update_status(a_status,a_id,thisval,v_url,postdata,activedata,inactivedata);
	   });