<form name="frmnewtextbox" method="post" action="<?php echo base_url(); ?>admin/custom_forms/<?php echo (isset($form_element) and isset($form_element->id)) ? 'updateelement' : 'createnewelement' ?>">
  <?php if (isset($form_element) and isset($form_element->id)) { ?>
  <input type="hidden" name="form_element_id" id="form_element_id" class="form-control" value="<?php echo $form_element->id; ?>">
  <?php } ?>
  <input type="hidden" name="custom_form_id" id="custom_form_id" class="form-control" value="<?php echo $custom_form_id; ?>">
  <input type="hidden" name="element_type" id="element_type" class="form-control" value="<?php echo $element_type; ?>">
  <div class="form-group">
    <label for="name">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->title)) ? $form_element->title : '' ?>">
  </div>

  <div class="form-group">
    <label for="name">Default Value</label>
    <input type="text" name="default_value" id="default_value" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->default_value)) ? $form_element->default_value : '' ?>">
  </div>

  <div class="form-group">
    <label for="name">Placeholder Text</label>
    <input type="text" name="placeholder_text" id="placeholder_text" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->placeholder_text)) ? $form_element->placeholder_text : '' ?>">
  </div>

  <div class="form-group">
    <input type="checkbox" id="is_required" name="is_required" value="1" <?php echo (isset($form_element) and isset($form_element->is_required) and $form_element->is_required == 1) ? 'checked' : '' ?>>
    <label for="name">Is Required</label>
  </div>

  <div class="form-group">
    <label for="name">CSS Class</label>
    <input type="text" name="css_class" id="css_class" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->css_class)) ? $form_element->css_class : '' ?>">
  </div>

  <div class="form-group">
    <label for="name">Custom CSS</label>
    <input type="text" name="custom_css" id="custom_css" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->custom_css)) ? $form_element->custom_css : '' ?>">
  </div>

  <div class="form-group">
    <label for="name">Parent CSS Class</label>
    <input type="text" name="parent_css_class" id="parent_css_class" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->parent_css_class)) ? $form_element->parent_css_class : '' ?>">
  </div>

  <div class="form-group">
    <input type="checkbox" id="show_title" name="show_title" value="1" <?php echo (isset($form_element) and isset($form_element->show_title) and $form_element->show_title == 1) ? 'checked' : '' ?>>
    <label for="name">Show Title</label>
  </div>

  <div class="form-group" id="label_position_ele">
    <label for="name">Title Position</label>
    <select name="label_position" id="label_position" class="form-control">
      <option value="top" <?php echo (isset($form_element) and isset($form_element->label_position) and $form_element->label_position == 'top') ? 'selected' : '' ?>>Top</option>
      <option value="left" <?php echo (isset($form_element) and isset($form_element->label_position) and $form_element->label_position == 'left') ? 'selected' : '' ?>>Left</option>
    </select>
  </div>

  <div class="form-group">
    <label for="name">Sort Order</label>
    <input type="text" name="sort_order" id="sort_order" class="form-control" value="<?php echo (isset($form_element) and isset($form_element->sort_order)) ? $form_element->sort_order : '' ?>">
  </div>

  <button type="button" class="cancelbutton btn btn-default">Cancel</button>
  <button type="submit" class="btn btn-default">Save</button>
</form>

<script>
if ($("#show_title").prop("checked"))
  $("#label_position_ele").show()
else
  $("#label_position_ele").hide()
$("#show_title").click(function(){
    if ($(this).prop("checked"))
      $("#label_position_ele").show()
    else
      $("#label_position_ele").hide()
})
</script>
