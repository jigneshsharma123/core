
<div class="x_panel" id="widget<?php echo $customsection; ?>">
  <div class="x_title">
    <h2>Event Calendar</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
    <div class="form-control">
      <input type="checkbox" name="event" id="event_id" value="1" <?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and $module_selected_values['event'] == 1) ? 'checked' : ''; ?>>Include Event Calendar
    </div>
    <div class="event_widget_short_code" style="display:<?php echo (isset($module_selected_values) and isset($module_selected_values['event']) and $module_selected_values['event'] == 1) ? 'block' : 'none'; ?>;">Paste the below code where you want the Event Calendar to be displayed<br>[[EVENT_CALENDAR]]</div>
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
