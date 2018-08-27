<?php defined('BASEPATH') OR exit('No direct script access allowed');

function alert($type = 'success', $value = 'success', $hide = 0)
{
	$hide = !empty($hide) ? 'hide' : '';
	?>
	<div class="alert alert-<?php echo $type?> alert-dismissible fade in <?php echo $hide ?>" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<strong><?php echo $type ?>!</strong> <?php echo $value ?>.
	</div>
	<?php
}