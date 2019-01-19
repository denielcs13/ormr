	var hotel_id=$("#hotel_id").val();
	var patternmobile= (/^[789][0-9]{9}$/);
			var patternemail=(/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i);	
			var patternofwebsite=(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i);	
/* 	$("#default_price").keypress(function (e) {
				 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
					$("#error-cr-package").html('<div class="alert alert-warning fade in"><strong><i class="fa fa-frown-o"></i></strong> Price Should be in Numeric</div>').delay(5000).show().fadeOut("slow");
						   return false;
				}
			   }); */
	   $("#up_hotel_file").change(function() {
		var val = $(this).val();
		var size =$(this)[0].files[0].size;		
		if(size>8000000){
		$(this).val('');
		$("#ok_image").hide();
		$("#error_image").show().css("color","red").html("Size Not Be Excced 1MB");	
		}else{
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
			case 'gif': case 'jpg': case 'png': case 'jpeg':
			$("#error_image").hide();	
			$("#ok_image").show(); 
			break;
			default:
				$(this).val('');
				$("#ok_image").hide();
				$("#error_image").show().css("color","red").html("This is Not An Image Type");
				break;
		}
		} 
	   });
	   $("#up_logo_file").change(function() {
		var val = $(this).val();
		var size =$(this)[0].files[0].size;		
		if(size>30720){
		$(this).val('');
		$("#ok_logo").hide();
		$("#error_logo").show().css("color","red").html("Size Not Be Excced 30kb");	
		}else{
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
			case 'gif': case 'jpg': case 'png': case 'jpeg':
			$("#error_logo").hide();	
			$("#ok_logo").show(); 
			break;
			default:
				$(this).val('');
				$("#ok_logo").hide();
				$("#error_logo").show().css("color","red").html("This is Not An Image Type");
				break;
		}
		} 
	   });
	   $("#update_hotel").click(function(){
		   if($("#up_hotel_detail").val()==''){
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Hotel Description not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else  if($("#consider_child_age").val()==''){
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Children Age not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }  else  if($("#hotel_rating").val()==''){
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Hotel Rating not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   } else  if($("#hotel_address").val()==''){
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Hotel Adrress not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   } else  if($("#hotel_landmark").val()==''){
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Hotel Landmark not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else if(!patternemail.test($("#alt_email").val()) && $("#alt_email").val() !=''){
				$(window).scrollTop($('#page-wrapper').offset().top);
				$("#error-cr-hotel").html('<div class="alert alert-danger"> Wrong Alternate EmailID.</div>').show().delay(5000).fadeOut("slow");
				return false;
			}else {
		  var requestdata=new FormData($("#update-form")[0]);
		 $.ajax({
			type: "POST",
			url: "request/hotel-details.php",
			data: requestdata,
			processData: false,
            contentType: false,
			success: function(response){
			if(response==1){
			window.location="hotel-details";
			}else{
			$("#error-cr-hotel").html(response).show().delay(5000).fadeOut("slow");	
			}
			} 
		});
return false;		
		   }
	   });
	    $("#create_ta_hotel").click(function(){	
				
		   if($("#user_name").val()==''){
			   $(window).scrollTop($('#page-wrapper').offset().top);
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Name not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else if($("#user_emailid").val()==''){
			   $(window).scrollTop($('#page-wrapper').offset().top);
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Email ID not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else if(!patternemail.test($("#user_emailid").val())){
				$(window).scrollTop($('#page-wrapper').offset().top);
				$("#error-cr-hotel").html('<div class="alert alert-danger"> Wrong EmailID.</div>').show().delay(5000).fadeOut("slow");
				return false;
			}else if($("#user_mobile").val()==''){
				$(window).scrollTop($('#page-wrapper').offset().top);
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Mobile not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else if(!patternmobile.test($("#user_mobile").val())){
				$(window).scrollTop($('#page-wrapper').offset().top);
				$("#error-cr-hotel").html('<div class="alert alert-danger"> Wrong Mobile Number.</div>').show().delay(5000).fadeOut("slow");
				return false;
			}else if($("#user_uname").val()==''){
			   $(window).scrollTop($('#page-wrapper').offset().top);
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">UserName not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else if($("#user_uname").val().length<8){
			$(window).scrollTop($('#page-wrapper').offset().top);
			$("#error-cr-hotel").html('<div class="alert alert-danger"> UserName Length Should Be Greater than or eaual to 8.</div>').show().delay(5000).fadeOut("slow");
			return false;
		}else if($("#user_uname").val().length>16){
			$(window).scrollTop($('#page-wrapper').offset().top);
			$("#error-cr-hotel").html('<div class="alert alert-danger"> UserName Length Should Be Less than or eaual to 16.</div>').show().delay(5000).fadeOut("slow");
			return false;
		}else if($("#user_pass").val()==''){
			   $(window).scrollTop($('#page-wrapper').offset().top);
			   	$("#error-cr-hotel").html('<div class="alert alert-danger">Password not be Empty</div>').show().delay(5000).fadeOut("slow");	
				return false;
		   }else if($("#agency_type").val() == ''){
	$(window).scrollTop($('#page-wrapper').offset().top);
	$("#error-cr-hotel").html('<div class="alert alert-danger"> Please Select Country</div>').show().delay(5000).fadeOut("slow");
	return false;
}else {
		  var requestdata=new FormData($("#update-form")[0]);
		 $.ajax({
			type: "POST",
			url: "request/user-ta-details.php",
			data: requestdata,
			processData: false,
            contentType: false,
			success: function(response){
				if(response==1){
				window.location="user-l";	
				} else if(response==2){
				window.location="user-ta-add?token="+$("#update_hotel_id").val();	
				}else{
				$("#error-cr-hotel").html(response);	
				}
			//.show().delay(5000).fadeOut("slow");	
			} 
		});
return false;		
		   }
	   });