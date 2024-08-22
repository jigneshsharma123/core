<?php echo (isset($data) and isset($data->title)) ? '<h3 class="title">'.$data->title.'</h3>' : ''?>
<div><?php echo (isset($data) and isset($data->id)) ? show_form($data->id) : ''?></div>
