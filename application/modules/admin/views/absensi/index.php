<?php
$date = date('Y-m-d');
$time = date('H:i');
$jadwal = array(
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
?>
<div class="login_wrapper">
  <div class="animate form login_form">
	<section class="login_content">
		<div class="login_alert">
		<?php alert('success','data saved successfully',1); ?>
	  </div>
		<?php
		$jamke = 0;
		foreach ($jadwal as $key => $value)
		{
			if($time <= $value)
			{
				echo '<label class="jamke">masuk jam ke '.$key.'</label>';
				$jamke = $key;
				break;
			}
		}
		echo '<br>';
		$user_id = $this->session->userdata(base_url().'_logged_in')['id'];
		?>
		<label><?php echo $date ?></label>
		<label class="clock"><?php echo $time ?></label>
		<?php
		if(!empty($jamke) && !empty($user_id))
		{
			$data['jam_ke']   = @intval($jamke);
			$data['user_id'] = @intval($user_id);
			$output = $this->absensi_model->getStatus($data);
			if(!empty($output))
			{
				alert('success', 'Anda Sudah Masuk di '.$output['kelas'].' jam ke '.$output['jam_ke']);
			}else{
				?>
				<form action="" method="post" id="form_absen">
					<input type="text" name="kelas" class="form-control" placeholder="kelas" required="">
					<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
					<input type="hidden" name="jam_ke" value="<?php echo $jamke ?>" id="jamke">
						<button class="btn btn-success btn-xl" style="font-size: 22px;">
							<i class="fa fa-sign-in"></i> MASUK
						</button>
				</form>
				<?php
			}
		}
		?>
		<br>
		<a href=""><button class="btn btn-default"><i class="fa fa-refresh"></i> RELOAD</button></a>
	</section>
  </div>
</div>