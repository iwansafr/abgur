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