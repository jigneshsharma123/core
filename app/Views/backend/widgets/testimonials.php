
<div class="x_panel" id="widget<?php echo $customsection; ?>">
  <div class="x_title">
    <h2>Testimonials</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
    <div>
      <select id="testimonial_id" name="testimonial" class="form-control">
        <option value="0">Select</option>
        <option value="slider" <?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and $module_selected_values['testimonial'] == 'slider') ? 'selected' : ''; ?>>Testimonial Slider</option>
        <option value="listing" <?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and $module_selected_values['testimonial'] == 'listing') ? 'selected' : ''; ?>>Testimonial Listing</option>
      </select>
    </div>
    <div class="testimonial_widget_short_code_slider testimonial_widget_short_code" style="display:<?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and $module_selected_values['testimonial'] == 'slider') ? 'block' : 'none'; ?>;">Paste the below code where you want the Testimonial Slider to be displayed<br>[[TESTIMONIAL_SLIDER]]</div>
    <div class="testimonial_widget_short_code_listing testimonial_widget_short_code" style="display:<?php echo (isset($module_selected_values) and isset($module_selected_values['testimonial']) and $module_selected_values['testimonial'] == 'listing') ? 'block' : 'none'; ?>;">Paste the below code where you want the Testimonial Slider to be displayed<br>[[TESTIMONIAL_LISTING]]</div>
  </div>
</div>

<script>
$("#testimonial_id").change(function(){
  $(".testimonial_widget_short_code").hide()
  $(".testimonial_widget_short_code_"+$(this).val()).show()
})
</script>
