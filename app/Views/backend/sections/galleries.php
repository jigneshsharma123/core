
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['gallery']) and isset($module_selected_values['gallery']->included) and $module_selected_values['gallery']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Gallery</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: none;">
        <input type="checkbox" value="1" name="gallery[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['gallery']) and isset($module_selected_values['gallery']->included) and $module_selected_values['gallery']->included == 1) ? 'checked' : ''; ?> id="gallery_included"> Include
        <select id="gallery_id" name="gallery[id]" class="form-control">
          <option value="0">Select Gallery</option>
        <?php foreach($records as $gallery) { ?>
          <option value="<?php echo $gallery->id; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['gallery']) and isset($module_selected_values['gallery']->id) and $module_selected_values['gallery']->id == $gallery->id) ? 'selected' : ''; ?>><?php echo $gallery->title; ?></option>
        <?php } ?>
        </select>
        <div>Paste the below code where you want the Gallery to be displayed<br>[[GALLERY]]</div>
      </div>
    </div>
    
<script>
$("#gallery_included").click(function(){
  if ($(this).prop("checked"))
  {
    var editor_data = CKEDITOR.instances.page_content.getData();
    CKEDITOR.instances.page_content.setData(editor_data+'[[SECTION:GALLERY]]')
  }
})
</script>
