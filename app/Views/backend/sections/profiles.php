
<div class="x_panel">
  <div class="x_title">
    <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['profile']) and isset($module_selected_values['profile']->included) and $module_selected_values['profile']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Profiles</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <div>
      <input type="checkbox" value="1" name="profile[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['profile']) and isset($module_selected_values['profile']->included) and $module_selected_values['profile']->included == 1) ? 'checked' : ''; ?> id="profile_included"> Include
      <select id="profile_format" name="profile[format]" class="form-control">
        <option value="0">Select</option>
        <option value="slider" <?php echo (isset($module_selected_values) and isset($module_selected_values['profile']) and isset($module_selected_values['profile']->format) and $module_selected_values['profile']->format == 'slider') ? 'selected' : ''; ?>>Profile Slider</option>
      </select>
    </div>
    <div class="profile_widget_short_code_calendar profile_widget_short_code">Paste the below code where you want the Profiles to be displayed<br>[[SECTION:PROFILE]]</div>
  </div>
</div>

<script>
$("#profile_include_status").click(function(){
  if ($(this).prop("checked"))
    $(".profile_widget_short_code").show()
  else
    $(".profile_widget_short_code").hide()
})
</script>

<script>
$("#profile_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:PROFILE]]')
  }
})
</script>
