$(document).ready(function(){
	var table = $('#absensi_table').DataTable({
		"pageLength" : 12,
		"ajax":{
			url: _URL+'admin/absensi/getAbsensi',
			type: "GET"
		},
		dom: 'Bfrtip',
		buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
	});

	var esgs = new esg();
	esgs.setTable(table);
	esgs.setUrl(_URL+'admin/absensi/ajax_edit/');
	esgs.setForm($('#form_absen')[0]);
	var start = new Date();
	var jadwal = new Array(
		'07:00',
		'07:45',
		'08:30',
		'09:30',
		'10:15',
		'11:00',
		'12:15',
		'13:00',
		'13:45',
		'14:30'
	);
	$('#reload_absensi').on('click',function(){
		esgs.reload_table();
		// reload_table(table);
	});
	setInterval(function(){
		var hour = new Date().getHours();
		var minute = new Date().getMinutes();
		var second = new Date().getSeconds();
		if(hour < 10){
			hour = '0'+hour;
		}
		if(minute < 10){
			minute = '0'+minute;
		}
		if(second < 10){
			second = '0'+second;
		}

		for(var i=0;i<jadwal.length;i++){
			if(hour+':'+minute <= jadwal[i]){
				$('.jamke').text('masuk jam ke '+i);
				$('#jamke').val(i);
				break;
			}
		}

		$('.clock').text(hour+':'+minute+':'+second);
	}, 1000);
	$('#form_absen').on('submit', function(e){
		e.preventDefault();
		// var data = new FormData(esg.form);
		// console.log(data);
		esgs.save(0);
		$('#form_absen').remove();
	});
});