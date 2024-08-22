
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['custom_form']) and isset($module_selected_values['custom_form']->included) and $module_selected_values['custom_form']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Custom Form</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: none;">
        <input type="checkbox" value="1" name="custom_form[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['custom_form']) and isset($module_selected_values['custom_form']->included) and $module_selected_values['custom_form']->included == 1) ? 'checked' : ''; ?> id="custom_form_included"> Include
        <select id="custom_form_id" name="custom_form[id]" class="form-control">
          <option value="0">Select Custom Form</option>
        <?php foreach($records as $custom_form) { ?>
          <option value="<?php echo $custom_form->id; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['custom_form']) and isset($module_selected_values['custom_form']->id) and $module_selected_values['custom_form']->id == $custom_form->id) ? 'selected' : ''; ?>> <?php echo ($custom_form->title == '') ? $custom_form->name : $custom_form->title ?></option>
        <?php } ?>
        </select>
        <div>Paste the below code where you want the Custom Form to be displayed<br>[[CUSTOM_FORM]]</div>
      </div>
    </div>

<script>
$("#custom_form_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:CUSTOM_FORM]]')
  }
})
</script>
