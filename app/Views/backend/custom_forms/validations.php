<form name="frmnewtextbox" method="post" action="<?php echo base_url(); ?>admin/custom_forms/updatevalidations">
  <?php if (isset($form_element) and isset($form_element->id)) { ?>
  <input type="hidden" name="form_element_id" id="form_element_id" class="form-control" value="<?php echo $form_element->id; ?>">
  <?php } ?>
  <input type="hidden" name="custom_form_id" id="custom_form_id" class="form-control" value="<?php echo $custom_form_id; ?>">
  <input type="hidden" name="element_type" id="element_type" class="form-control" value="<?php echo $element_type; ?>">
  <div class="form-group validations">
    <label for="name">Validations For <?=$form_element->title;?></label>
    <?php if (isset($element_validations) && count($element_validations) > 0) { ?>
      <?php foreach($element_validations as $element_validation) { ?>
      <select name="validations[]" id="validation" class="form-control">
        <option value="">Select Validation</option>
      <?php foreach($validations as $validation=>$options) { ?>
        <option value="<?php echo $validation; ?>" <?php echo (($element_validation == $validation) ? 'selected' : '') ?>><?php echo $options['title']; ?></option>
      <?php } ?>
      </select>
      <?php } ?>
    <?php } else { ?>
      <select name="validations[]" id="validation" class="form-control">
        <option value="">Select Validation</option>
      <?php foreach($validations as $validation=>$options) { ?>
        <option value="<?php echo $validation; ?>"><?php echo $validation; ?></option>
      <?php } ?>
      </select>
    <?php } ?>
  </div>
  <button type="button" class="addmore btn btn-default">Add More</button>
  <button type="button" class="cancelbutton btn btn-default">Cancel</button>
  <button type="submit" class="btn btn-default">Save</button>
</form>

<script>
$(".addmore").click(function(){
  newvalidation = $("#validation").clone();
  $(".validations").append("<br>")
  $(".validations").append(newvalidation)
})
</script>
