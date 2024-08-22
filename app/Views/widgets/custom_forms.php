<?php echo (isset($data) and isset($data->title) and $data->title != "") ? '<h5>'.$data->title.'</h5>' : ''?>
<?php echo (isset($data) and isset($data->id)) ? show_custom_form_section($data,'coreitx2021') : ''?>
