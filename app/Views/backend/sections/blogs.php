
<div class="x_panel">
  <div class="x_title">
    <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['blog']) and isset($module_selected_values['blog']->included) and $module_selected_values['blog']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Blogs</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <div>
      <input type="checkbox" value="1" name="blog[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['blog']) and isset($module_selected_values['blog']->included) and $module_selected_values['blog']->included == 1) ? 'checked' : ''; ?> id="blog_included"> Include
      <select id="blog_format" name="blog[format]" class="form-control">
        <option value="0">Select</option>
        <option value="latest" <?php echo (isset($module_selected_values) and isset($module_selected_values['blog']) and isset($module_selected_values['blog']->format) and $module_selected_values['blog']->format == 'latest') ? 'selected' : ''; ?>>Latest Blogs</option>
      </select>
      Blog Count
      <input type="text" class="form-control" name="blog[count]" id="blog_count" value="<?php echo (isset($module_selected_values) and isset($module_selected_values['blog']) and isset($module_selected_values['blog']->count)) ? $module_selected_values['blog']->count : ''; ?>"> 
    </div>
    <div class="blog_widget_short_code_calendar blog_widget_short_code">Paste the below code where you want the Blogs to be displayed<br>[[SECTION:BLOG]]</div>
  </div>
</div>

<script>
$("#blog_include_status").click(function(){
  if ($(this).prop("checked"))
    $(".blog_widget_short_code").show()
  else
    $(".blog_widget_short_code").hide()
})
</script>

<script>
$("#blog_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:BLOG]]')
  }
})
</script>
