class esg{
	constructor(module){
		this.module = module;
	}
	setTable(table){
		this.table = table;
	}
	setForm(form){
		this.form = form;
	}
	setUrl(url){
		this.url = url;
	}

	reload_table(){
		this.table.ajax.reload(null,false); //reload datatable ajax
	}

	delete_data(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			// ajax delete data to database
			var esg = this;
			$.ajax({
				url : this.url+'/'+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					//if success reload ajax table
					$('#modal_form').modal('hide');
					esg.reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});

		}
	}

	detail_data(id)
	{
		// save_method = 'update';
		this.form.reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url : this.url+'/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				var x;
				for(x in data){
					if(x!="password"){
						$('[name="'+x+'"]').val(data[x]);
					}
					if(data[x]=='1'){
						$('[name="'+x+'"]').attr('checked','checked');
					}else{
						$('[name="'+x+'"]').removeAttr('checked');
					}
				}
				// $('[name="id"]').val(data.id);
				// $('[name="firstName"]').val(data.firstName);
				// $('[name="lastName"]').val(data.lastName);
				// $('[name="gender"]').val(data.gender);
				// $('[name="address"]').val(data.address);
				// $('[name="dob"]').datepicker('update',data.dob);
				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				// $('.modal-title').text('Edit '); // Set title to Bootstrap modal title
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}
	bulk_delete(){
	  var list_id = [];
	  $(".data-check:checked").each(function() {
			list_id.push(this.value);
	  });
	  if(list_id.length > 0)
	  {
		if(confirm('Are you sure delete this '+list_id.length+' data?'))
		{
			var esg = this;
			$.ajax({
			type: "POST",
			data: {id:list_id},
			url: this.url,
			dataType: "JSON",
			success: function(data)
			{
			  if(data.status)
			  {
					esg.reload_table();
			  }
			  else
			  {
				alert('Failed.');
			  }
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			  alert('Error deleting data');
			}
			});
		}
	  }
	  else
	  {
		  alert('no data selected');
	  }
	}
	save(id){
	  $('#btnSave').text('saving...'); //change button text
	  $('#btnSave').attr('disabled',true); //set button disable

	  // ajax adding data to database
	  var formData = new FormData(this.form);
	  var form     = this.form;
	  var esg      = this;
	  // console.log(formData);
	  $.ajax({
			url : this.url+id,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data)
			{
			  if(data.status) //if success close modal and reload ajax table
			  {
					form.reset();
					$('#modal_form').modal('hide');
					if(esg.table !== ''){
						esg.reload_table();
					}
					if(data.message!==''){
						var a = $('.login_alert').find('.alert');
						if(a!==''){
							if(data.status) //if success close modal and reload ajax table
						  {
						  	a.removeClass('hide');
						  	a.addClass('alert-success');
						  	a.html('<strong>success! </strong> '+data.msg);
						  }else{
						  	a.removeClass('hide');
						  	a.addClass('alert-danger');
						  	a.html('<strong>danger! </strong> '+data.msg);
						  }
						}
					}
			  }else{
			  	if(data.alert === 'danger'){
			  		alert(data.alert+' '+data.message);
			  	}else{
						for (var i = 0; i < data.inputerror.length; i++)
						{
						  $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						  $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
			  	}
			  }
			  $('#btnSave').text('save'); //change button text
			  $('#btnSave').attr('disabled',false); //set button enable
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			  alert('Error adding / update data');
			  $('#btnSave').text('save'); //change button text
			  $('#btnSave').attr('disabled',false); //set button enable
			}
	  });
	}
}

$(document).ajaxStart(function(){
	$('#loading').css('display','block');
});

$(document).ajaxComplete(function(){
	$('#loading').css('display','none');
});
$("#check-all").click(function () {
	$(".data-check").prop('checked', $(this).prop('checked'));
});
// function reload_table(table){
//   table.ajax.reload(null,false); //reload datatable ajax
// }

function detail_data(module, table, form, id)
{
	// save_method = 'update';
	form.reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string


	//Ajax Load data from ajax
	$.ajax({
		url : _URL+module+'/'+id,
		type: "GET",
		dataType: "JSON",
		success: function(data)
		{
			var x;
			for(x in data){
				if(x!="password"){
					$('[name="'+x+'"]').val(data[x]);
				}
				if(data[x]=='1'){
					$('[name="'+x+'"]').attr('checked','checked');
				}else{
					$('[name="'+x+'"]').removeAttr('checked');
				}
			}
			// $('[name="id"]').val(data.id);
			// $('[name="firstName"]').val(data.firstName);
			// $('[name="lastName"]').val(data.lastName);
			// $('[name="gender"]').val(data.gender);
			// $('[name="address"]').val(data.address);
			// $('[name="dob"]').datepicker('update',data.dob);
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
			// $('.modal-title').text('Edit '); // Set title to Bootstrap modal title
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error get data from ajax');
		}
	});
}

function delete_data(module, table, id)
{
	if(confirm('Are you sure delete this data?'))
	{
		// ajax delete data to database
		$.ajax({
			url : _URL+module+'/'+id,
			type: "POST",
			dataType: "JSON",
			success: function(data)
			{
				//if success reload ajax table
				$('#modal_form').modal('hide');
				reload_table(table);
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error deleting data');
			}
		});

	}
}

function bulk_delete(module, table){
  var list_id = [];
  $(".data-check:checked").each(function() {
		list_id.push(this.value);
  });
  if(list_id.length > 0)
  {
	if(confirm('Are you sure delete this '+list_id.length+' data?'))
	{
		$.ajax({
		type: "POST",
		data: {id:list_id},
		url: _URL+module,
		dataType: "JSON",
		success: function(data)
		{
		  if(data.status)
		  {
			reload_table(table);
		  }
		  else
		  {
			alert('Failed.');
		  }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert('Error deleting data');
		}
		});
	}
  }
  else
  {
	  alert('no data selected');
  }
}

function save(url, table, form)
{
  $('#btnSave').text('saving...'); //change button text
  $('#btnSave').attr('disabled',true); //set button disable

  // ajax adding data to database
  var formData = new FormData(form);
  // console.log(formData);
  $.ajax({
	url : url,
	type: "POST",
	data: formData,
	contentType: false,
	processData: false,
	dataType: "JSON",
	success: function(data)
	{
	  if(data.status) //if success close modal and reload ajax table
	  {
		form.reset();
		$('#modal_form').modal('hide');
		reload_table(table);
	  }
	  else
	  {
		for (var i = 0; i < data.inputerror.length; i++)
		{
		  $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		  $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		}
	  }
	  $('#btnSave').text('save'); //change button text
	  $('#btnSave').attr('disabled',false); //set button enable
	},
	error: function (jqXHR, textStatus, errorThrown)
	{
	  alert('Error adding / update data');
	  $('#btnSave').text('save'); //change button text
	  $('#btnSave').attr('disabled',false); //set button enable
	}
  });
}