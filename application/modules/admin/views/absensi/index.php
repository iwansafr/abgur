<?php
$date = date('Y-m-d');
$time = date('h:i');
$jadwal = array(
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
?>

<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">
    	<?php
    	foreach ($jadwal as $key => $value)
    	{
    		if($time <= $value)
    		{
    			echo 'masuk jam ke '.$key;
    			break;
    		}
    	}
    	echo '<br>';
    	?>
    	<label><?php echo $date ?></label>
    	<label><?php echo $time ?></label>
    	<form action="">
    		<input type="text" name="" class="form-control" placeholder="kelas" required="">
				<button class="btn btn-success btn-xl" style="font-size: 22px;">
					<i class="fa fa-sign-in"></i> MASUK
				</button>
    	</form>
    </section>
  </div>
</div>