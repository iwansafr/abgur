<?php defined('BASEPATH') OR exit('No direct script access allowed');

function mod_js($mod = '', $file = '')
{
	$mod    = !empty($mod) ? base_url('assets/modules/').$mod : base_url('assets/modules/');
	$file   = !empty($file) ? $file : 'script.js';
	$output = $mod.'/'.$file;
	return $output;
}

function mod_css($mod = '', $file = '')
{
	$mod    = !empty($mod) ? base_url('assets/modules/').$mod : base_url('assets/modules/');
	$file   = !empty($file) ? $file : 'style.css';
	$output = $mod.'/'.$file;
	return $output;
}

function encrypt($string = '')
{
	$key = '';
	if(!empty($string))
	{
		$key = password_hash($string, PASSWORD_DEFAULT);
	}
	return $key;
}

function decrypt($string = '', $current_key = '')
{
	$key = '';
	if(!empty($string) && !empty($current_key))
	{
		$key = password_verify($string, $current_key);
	}
	return $key;
}

function recursive_rmdir($directory)
{
	foreach(glob("{$directory}/*") as $file)
	{
		if(is_dir($file)) {
			recursive_rmdir($file);
		} else {
			unlink($file);
		}
	}
	if(is_dir($directory))
	{
		rmdir($directory);
	}
}

if(!function_exists('pr'))
{
	function pr($text='', $return = false)
	{
		$is_multiple = (func_num_args() > 2) ? true : false;
		if(!$is_multiple)
		{
			if(is_numeric($return))
			{
				if($return==1 || $return==0)
				{
					$return = $return ? true : false;
				}else $is_multiple = true;
			}
			if(!is_bool($return)) $is_multiple = true;
		}
		if($is_multiple)
		{
			echo "<pre style='text-align:left;'>\n";
			echo "<b>1 : </b>";
			print_r($text);
			$i = func_num_args();
			if($i > 1)
			{
				$j = array();
				$k = 1;
				for($l=1;$l < $i;$l++)
				{
					$k++;
					echo "\n<b>$k : </b>";
					print_r(func_get_arg($l));
				}
			}
			echo "\n</pre>";
		}else{
			if($return)
			{
				ob_start();
			}
			echo "<pre style='text-align:left;'>\n";
			print_r($text);
			echo "\n</pre>";
			if($return)
			{
				$output = ob_get_contents();
				ob_end_clean();
				return $output;
			}
		}
	}
}