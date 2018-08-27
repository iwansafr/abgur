<?php defined('BASEPATH') OR exit('No direct script access allowed');

function form($field = array(), $type = 'full')
{
	if(!empty($field) && is_array($field))
	{
		$size = array('label'=>12,'input'=>12, 'label_class'=>'');
		if(!empty($type))
		{
			switch($type)
			{
				case 'full':
					$size = array('label'=>12,'input'=>12, 'label_class'=>'');
				break;
				case 'half':
					$size = array('label'=>6,'input'=>6, 'label_class'=>'');
				break;
				case 'small':
					$size = array('label'=>3,'input'=>6, 'label_class'=>'control-label');
				break;
				default:
					$size = array('label'=>12,'input'=>12, 'label_class'=>'');
				break;
			}
		}
		foreach ($field as $key => $value)
		{
			echo '<div class="form-group">' ;
			echo form_label($value['label'],$key, array(
					'class'=>$size['label_class'].' col-md-'.$size['label'].' col-sm-'.$size['label'].' col-xs-12',
					'for'=>'first-name'
				));
			echo '<div class="col-md-'.$size['input'].' col-sm-'.$size['input'].' col-xs-12">';
			if($value['type']=='dropdown')
			{
				echo form_dropdown($key, $value['option'], 1, 'class="form-control col-md-'.$size['input'].' col-xs-12"');
			}else{
				echo ($value['type']=='checkbox') ? '<div class="checkbox">': '';
				echo ($value['type']=='checkbox') ? '<label>': '';
				$input = array(
					'type'  => $value['type'],
					'name'  => $key,
					'id'    => $key,
					'class' => $value['type']== 'checkbox' ? '': 'form-control col-md-'.$size['input'].' col-xs-12',
					'value' => $value['type']== 'checkbox' ? $key: '',
				);
				if(!empty($value['attribute']))
				{
					$attribute = $value['attribute'];
					if(is_array($attribute))
					{
						foreach ($attribute as $attr_key => $attr_value)
						{
							$input[$attr_key] = $attr_value;
						}
					}
				}
				echo form_input($input);
				echo ($value['type']=='checkbox') ? $value['label'].'</label>': '';
				echo ($value['type']=='checkbox') ? '</div>': '';
			}
			echo '</div>';
			echo '</div>';
		}
	}else{
		echo alert('danger','form parameter is not array');
	}

}

function _validate($input = array(), $except = '')
{
	if(is_array($input) && !empty($input))
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		foreach ($input as $key => $value)
		{
			if($key != $except)
			{
				if($input[$key] == '')
				{
					$data['inputerror'][] = $key;
					$data['error_string'][] = $key.' is required';
					$data['status'] = FALSE;
				}
			}
		}
		if(!empty($_FILES))
		{
			foreach ($_FILES as $key => $value)
			{
				if($key != $except)
				{
					if(empty($_FILES[$key]['name']))
					{
						$data['inputerror'][]   = $key;
						$data['error_string'][] = $key.' is required';
						$data['status']         = FALSE;
					}
				}
			}
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}

function image_module($module='', $img = '')
{
	return base_url('images'.DIRECTORY_SEPARATOR.$module.DIRECTORY_SEPARATOR.$img);
}