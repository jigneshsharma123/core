
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['faq_group']) and isset($module_selected_values['faq_group']->included) and $module_selected_values['faq_group']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> FAQ Group</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: none;">
        <input type="checkbox" value="1" name="faq_group[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['faq_group']) and isset($module_selected_values['faq_group']->included) and $module_selected_values['faq_group']->included == 1) ? 'checked' : ''; ?> id="faq_group_included"> Include
        <select id="faq_group_id" name="faq_group[id]" class="form-control">
          <option value="0">Select FAQ Group</option>
        <?php foreach($records as $faq_group) { ?>
          <option value="<?php echo $faq_group->id; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['faq_group']) and isset($module_selected_values['faq_group']->id) and $module_selected_values['faq_group']->id == $faq_group->id) ? 'selected' : ''; ?>><?php echo $faq_group->name; ?></option>
        <?php } ?>
        </select>
        <div>Paste the below code where you want the FAQs to be displayed<br>[[FAQ_GROUP]]</div>
      </div>
    </div>
    
<script>
$("#faq_group_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:FAQ_GROUP]]')
  }
})
</script>
