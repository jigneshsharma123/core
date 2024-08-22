
<div class="x_panel">
  <div class="x_title">
    <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and isset($module_selected_values['event']->included) and $module_selected_values['event']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Event Calendar</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <div>
      <input type="checkbox" value="1" name="event[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and isset($module_selected_values['event']->included) and $module_selected_values['event']->included == 1) ? 'checked' : ''; ?> id="event_included"> Include
      <select id="event_format" name="event[format]" class="form-control">
        <option value="0">Select</option>
        <option value="calendar" <?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and isset($module_selected_values['event']->format) and $module_selected_values['event']->format == 'calendar') ? 'selected' : ''; ?>>Event Calendar</option>
        <option value="listing" <?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and isset($module_selected_values['event']->format) and $module_selected_values['event']->format == 'listing') ? 'selected' : ''; ?>>Event Listing</option>
      </select>
    </div>
    <div class="event_widget_short_code_calendar event_widget_short_code" style="display:<?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and isset($module_selected_values['event']->format) and $module_selected_values['event']->format == 'calendar') ? 'block' : 'none'; ?>;">Paste the below code where you want the Event Calendar to be displayed<br>[[SECTION:EVENT]]</div>
  </div>
</div>

<script>
$("#event_include_status").click(function(){
  if ($(this).prop("checked"))
    $(".event_widget_short_code").show()
  else
    $(".event_widget_short_code").hide()
})
</script>
<script>
$("#event_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:EVENT]]')
  }
})
</script>
