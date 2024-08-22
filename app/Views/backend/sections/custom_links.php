
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['custom_link']) and isset($module_selected_values['custom_link']->included) and $module_selected_values['custom_link']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Custom Links</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: none;">
        <input type="checkbox" value="1" name="custom_link[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['custom_link']) and isset($module_selected_values['custom_link']->included) and $module_selected_values['custom_link']->included == 1) ? 'checked' : ''; ?> id="custom_link_included"> Include
       <select id="custom_link_id" multiple=true size=5 name="custom_link[id][]" class="form-control link-control">
        <?php foreach($records as $custom_link) { ?>
          <option value="<?php echo $custom_link->id; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['custom_link']) and isset($module_selected_values['custom_link']->id) and in_array($custom_link->id,$module_selected_values['custom_link']->id) == 1) ? 'selected' : ''; ?>><?php echo $custom_link->title; ?></option>
        <?php } ?>
        </select>
        <div>Paste the below code where you want the Custom Link to be displayed<br>[[CUSTOM_LINK]]</div>
        <label>Links Per Row</label>
        <input class="form-control" type="text" name="custom_link[per_row]" value="<?php echo (isset($module_selected_values) and isset($module_selected_values['custom_link']) and isset($module_selected_values['custom_link']->per_row)) ? $module_selected_values['custom_link']->per_row : ''; ?>" id="custom_link_included">
      </div>
    </div>

<script>
$("#custom_link_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:CUSTOM_LINK]]')
  }
})
</script>
