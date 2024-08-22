
<div class="x_panel">
  <div class="x_title">
    <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['partner']) and isset($module_selected_values['partner']->included) and $module_selected_values['partner']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Partners</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <div>
      <input type="checkbox" value="1" name="partner[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['partner']) and isset($module_selected_values['partner']->included) and $module_selected_values['partner']->included == 1) ? 'checked' : ''; ?> id="partner_included"> Include
      <select id="partner_format" name="partner[format]" class="form-control">
        <option value="0">Select</option>
        <option value="slider" <?php echo (isset($module_selected_values) and isset($module_selected_values['partner']) and isset($module_selected_values['partner']->format) and $module_selected_values['partner']->format == 'slider') ? 'selected' : ''; ?>>Partner Slider</option>
      </select>
    </div>
    <div class="partner_widget_short_code_calendar partner_widget_short_code">Paste the below code where you want the Partners to be displayed<br>[[SECTION:PARTNER]]</div>
  </div>
</div>

<script>
$("#partner_include_status").click(function(){
  if ($(this).prop("checked"))
    $(".partner_widget_short_code").show()
  else
    $(".partner_widget_short_code").hide()
})
</script>

<script>
$("#partner_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:PARTNER]]')
  }
})
</script>
