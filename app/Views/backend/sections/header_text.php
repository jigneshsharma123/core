
<div class="x_panel">
  <div class="x_title">
    <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['header_text']) and isset($module_selected_values['header_text']->included) and $module_selected_values['header_text']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Header Text</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <input type="checkbox" value="1" name="header_text[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['header_text']) and isset($module_selected_values['header_text']->included) and $module_selected_values['header_text']->included == 1) ? 'checked' : ''; ?> id="header_text_included"> Include
    <div class="form-group">
      <label>Content</label>
      <textarea rows="3" name="header_text[content]" class="form-control"><?php echo (isset($module_selected_values) and isset($module_selected_values['header_text']) and isset($module_selected_values['header_text']->content)) ? $module_selected_values['header_text']->content : ''; ?></textarea>
    </div>
  </div>
</div>

