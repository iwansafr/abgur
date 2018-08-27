$(document).ready(function(){
	$('#btn_login').on('click', function(){
		var formData = new FormData($('#login')[0]);
		$.ajax({
		url : _URL+'admin/login/ajax_login',
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		dataType: "JSON",
		success: function(data)
		{
	  	var a = $('.login_alert').find('.alert');
		  if(data.status) //if success close modal and reload ajax table
		  {
		  	a.removeClass('hide');
		  	// a.addClass('alert-success');
		  	a.html('<strong>success! </strong> '+data.msg);
		  	window.location = data.redirect_to;
		  }else{
		  	a.removeClass('hide');
		  	a.addClass('alert-danger');
		  	a.html('<strong>danger! </strong> '+data.msg);
		  }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert('Error Login');
		  // $('#btnSave').text('save'); //change button text
		  // $('#btnSave').attr('disabled',false); //set button enable
		}
	  });
		return false;
	});
});