
<div class="x_panel">
  <div class="x_title">
    <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and isset($module_selected_values['testimonial']->included) and $module_selected_values['testimonial']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Testimonials</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <div>
      <input type="checkbox" value="1" name="testimonial[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and isset($module_selected_values['testimonial']->included) and $module_selected_values['testimonial']->included == 1) ? 'checked' : ''; ?> id="testimonial_included"> Include
      <select id="testimonial_format" name="testimonial[format]" class="form-control">
        <option value="0">Select</option>
        <option value="slider" <?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and isset($module_selected_values['testimonial']->format) and $module_selected_values['testimonial']->format == 'slider') ? 'selected' : ''; ?>>Testimonial Slider</option>
        <option value="listing" <?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and isset($module_selected_values['testimonial']->format) and $module_selected_values['testimonial']->format == 'listing') ? 'selected' : ''; ?>>Testimonial Listing</option>
      </select>
    </div>
    <div class="testimonial_widget_short_code_slider testimonial_widget_short_code" style="display:<?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and isset($module_selected_values['testimonial']->format) and $module_selected_values['testimonial']->format == 'slider') ? 'block' : 'none'; ?>;">Paste the below code where you want the Testimonial Slider to be displayed<br>[[SECTION:TESTIMONIAL]]</div>
  </div>
</div>

<script>
$("#testimonial_format").change(function(){
  if ($(this).prop("checked"))
  {
    $(".testimonial_widget_short_code").hide()
    $(".testimonial_widget_short_code_"+$(this).val()).show()
  }
})
</script>

<script>
$("#testimonial_included").click(function(){
  var editor_data = CKEDITOR.instances.page_content.getData();
  CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:TESTIMONIAL]]')
})
</script>
