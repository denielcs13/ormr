function ajax_request(v_url,v_postdata,v_id){
	$.ajax({
		url: v_url,
		type: 'POST',
		data: v_postdata,
		success: function (response) {
			v_id.css('display','block').html(response);
		}
	}); 
}
function check_image(thisval,ok_image,error_image,max_size){
		var val = thisval.val();
		var size =thisval[0].files[0].size;		
		if(size>max_size){
		thisval.val('');
		ok_image.hide();
		error_image.show().css("color","red").html("Size Not Be Excced 300kb");	
		}else{
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
			case 'gif': case 'jpg': case 'png': case 'jpeg':
			error_image.hide();	
			ok_image.show(); 
			break;
			default:
				thisval.val('');
				ok_image.hide();
				error_image.show().css("color","red").html("This is Not An Image Type");
				break;
		}
		}
		}
function update_status(a_status,a_id,thisval,a_url,postdata,activedata,inactivedata){
$.ajax({
	type: "POST",
	url: a_url,
	data: postdata,
	success: function(response){
	if(response==1){
		if(a_status==0){
			thisval.replaceWith(activedata);
		}else{
			thisval.replaceWith(inactivedata);
		}
	}else{
		alert(response);	//$("#error-hotel").html(response).show().delay(5000).fadeOut("slow");
	}
	}
});
}
function delete_data(v_url,del_data){
	$.ajax({
	type: "POST",
	url: v_url,
	data: del_data,
	success: function(response){
	if(response!=1){
		alert(response);		//$("#error-package").html(response).show().delay(5000).fadeOut("slow");	
	}
	}
	});
}
function delete_data_row(v_url,del_data,cur_location){
	$.ajax({
	type: "POST",
	url: v_url,
	data: del_data,
	success: function(response){
	if(response==1){
	cur_location.slideUp();
	}else{
		alert(response);
	}
	}
	});
}
function ajax_add(a_url,a_postdata,showid){
$.ajax({
	type: "POST",
	url: a_url,
	data: a_postdata,
	success: function(response){
	if(response==1){
	location.reload();	
	}else{
	showid.html(response).show().delay(5000).fadeOut("slow");
	}
	}
}); 
}
function ajax_add_image(a_url,a_postdata,showid){
	  //var requestdata=new FormData($("#create-form")[0]);			  
		 $.ajax({
			type: "POST",
			url: a_url,
			data: a_postdata,
			processData: false,
            contentType: false,
			success: function(response){
			if(response==1){
			location.reload();	
			}else{ 
			showid.html(response).show().delay(5000).fadeOut("slow");	
			} 
			}
		});
return false;		
}
function remove_loader(img_loader){
	img_loader.slideUp(200, function() {
	$(this).remove(); 
	});
	}