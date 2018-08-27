$(document).ready(function(){
	var table = $('#user_table').DataTable({
		"pageLength" : 12,
		"ajax":{
			url: _URL+'admin/user/getUser',
			type: "GET"
		}
	});
	esg = new esg();
	esg.setTable(table);
	esg.setUrl(_URL+'admin/user/ajax_edit');
	esg.setForm($('#form')[0]);
	$('#add_user').on('click', function(){
		$('#modal_form').modal('show'); // show bootstrap modal
	  $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
	});
	$('#delete_user').on('click',function(){
		bulk_delete('admin/user/bulk_delete', table);
	});
	$('#reload_user').on('click',function(){
		esg.reload_table();
		console.log(esg.form);
		// reload_table(table);
	});
	$('#btnSave').on('click',function(){
		esg.save();
		// save(_URL+'admin/user/ajax_edit', table, $('#form')[0]);
	});

	$(document).on('click','.delete-data',function(){
		var id = $(this).closest('tr').find('.data-check').val();
		delete_data('admin/user/delete', table, id);
	});
	$(document).on('click','.edit-data',function(){
		var id = $(this).closest('tr').find('.data-check').val();
		detail_data('admin/user/detail', table, $('#form')[0], id);
	});
});