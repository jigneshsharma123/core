
<div class="form-group">
  <?php if (($form_element->show_title and $form_element->label_position == "top") or (!$form_element->show_title)) { ?>
    <?php if ($form_element->show_title) { ?>
    <label for="name"><?php echo $form_element->title; ?> <?php echo isset($form_element->is_required) ? '<span>*</span>' : ''; ?></label><br>
    <?php } ?>

    <?php foreach($form_element->form_element_option as $form_element_option) { ?>
      <input type="radio" class="flat"  name="iCheck" <?=(isset($form_element_option->option_value) and $form_element->default_value == $form_element_option->option_value) ? "checked" : ""?>> <?php echo $form_element_option->option_value; ?>
    <?php } ?>
  <?php } else { ?>
    <?php if ($form_element->show_title) { ?>
    <label for="name" class="pull-left"><?php echo $form_element->title; ?> <?php echo isset($form_element->is_required) ? '<span>*</span>' : ''; ?></label>
    <?php } ?>
    <div class="pull-right">
    <?php foreach($form_element->form_element_option as $form_element_option) { ?>
      <input type="radio" class="flat"  name="iCheck" <?=(isset($form_element_option->option_value) and $form_element->default_value == $form_element_option->option_value) ? "checked" : ""?>> <?php echo $form_element_option->option_value; ?>
    <?php } ?>
 
  
    </div>
    <div class="clearfix"></div>
  <?php } ?>
  <div class="pull-right"><a href="javascript:void(0)" id="<?php echo $form_element->id; ?>" class="managevalidations">Validations</a> | <a href="javascript:void(0)" id="<?php echo $form_element->id; ?>" class="editelement">Edit</a> | <a href="javascript:void(0)" id="<?php echo $form_element->id; ?>" class="removeelement">Remove</a></div>
</div>
<div class="clearfix"></div>
