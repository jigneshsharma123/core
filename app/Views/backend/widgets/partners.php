
<div class="x_panel" id="widget<?php echo $customsection; ?>">
  <div class="x_title">
    <h2>Partners</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
    <div class="form-control">
      
      <div>
        <select id="partner_format" name="partner[format]" class="form-control">
          <option value="0">Select</option>
          <option value="calendar" <?php echo (isset($module_selected_values) and isset($module_selected_values['partner']) and isset($module_selected_values['partner']['format']) and $module_selected_values['partner']['format'] == 'slider') ? 'selected' : ''; ?>>Partner Slider</option>
        </select>
      </div>
    </div>
  </div>
</div>

<script>
$("#event_id").click(function(){
  if ($(this).prop("checked"))
    $(".event_widget_short_code").show()
  else
    $(".event_widget_short_code").hide()
})
</script>
