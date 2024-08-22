<link href="<? echo base_url(); ?>assets/coreitx/css/icons.css" rel="stylesheet">
<div class="container-fluid customlinks">
<?php 
  $class = 12/$module_data->per_row;
  $total_records = count($custom_links->all);
  $offset_class = '';
  if ($total_records < $module_data->per_row)
  {
      $offset = $module_data->per_row - $total_records;
      $offset_class = "col-sm-offset-".$offset;
  }
  $custom_link_html = '<div class="row">';
  foreach($custom_links as $custom_link)
  {
    $custom_link_html .= '<div class="col-sm-'.$class.' '.$offset_class.' col-xs-12 text-center ptb-20">
            <a href="'.base_url().$custom_link->link.'" class="'.strtolower($custom_link->link).'"><span></span></a>
            <h5><a href="'.base_url().$custom_link->link.'">'.$custom_link->title.'</a></h5>
            <p>'.$custom_link->brief.'</p>
          </div>';
    $offset_class = '';
  } 
  
  $custom_link_html .= '</div><div class="clearfix"></div>';

  echo $custom_link_html;
?>
</div>
