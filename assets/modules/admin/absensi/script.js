$(document).ready(function(){
	var esgs = new esg();
	esgs.setTable('');
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
		'13:45'
	);

	setInterval(function() {
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
			}
		}

		$('.clock').text(hour+':'+minute+':'+second);
	}, 1000);
	$('#form_absen').on('submit', function(e){
		e.preventDefault();
		// var data = new FormData(esg.form);
		// console.log(data);
		esgs.save(0);
	});
});