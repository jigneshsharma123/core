<?php echo (isset($data) and isset($data->title) and $data->title != "") ? '<h5>'.$data->title.'</h5>' : ''?>
<?php echo (isset($data) and isset($data->content)) ? $data->content : ''?>
