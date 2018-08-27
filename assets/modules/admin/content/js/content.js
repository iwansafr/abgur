$(document).ready(function(){
	$('#content_table').DataTable({
		"pageLength" : 12,
		"ajax":{
			url: _URL+'admin/content/getContentPage',
			type: "GET"
		}
	});

});