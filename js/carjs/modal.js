function open_modal(send_data,send_url){
	var url=$(this).attr("href", "#myModal");
	jQuery.ajax({
	type: "POST",
	url: send_url,
	dataType:"text", 
	data:send_data, 
	success:function(response){
	$('.modal-content').html(response);
	},
	error:function (xhr, ajaxOptions, thrownError){
		alert(thrownError);
	}
	}); 
}