<div class="form-group">
  <?php if (($form_element->show_title and $form_element->label_position == "top") or (!$form_element->show_title)) { ?>
    <?php if ($form_element->show_title) { ?>
    <label for="name"><?php echo $form_element->title; ?> <?php echo isset($form_element->is_required) ? '<span>*</span>' : ''; ?></label>
    <?php } ?>
    <input type="text" class="form-control" value="<?php echo $form_element->default_value; ?>" placeholder="<?php echo $form_element->placeholder_text; ?>">
  <?php } else { ?>
    <?php if ($form_element->show_title) { ?>
    <label for="name" class="pull-left"><?php echo $form_element->title; ?> <?php echo isset($form_element->is_required) ? '<span>*</span>' : ''; ?></label>
    <?php } ?>
    <div class="pull-right">
    <input type="text" class="form-control" value="<?php echo $form_element->default_value; ?>" placeholder="<?php echo $form_element->placeholder_text; ?>">
    </div>
    <div class="clearfix"></div>
  <?php } ?>
  <div class="pull-right"><a href="javascript:void(0)" id="<?php echo $form_element->id; ?>" class="managevalidations">Validations</a> | <a href="javascript:void(0)" id="<?php echo $form_element->id; ?>" class="editelement">Edit</a> | <a href="javascript:void(0)" id="<?php echo $form_element->id; ?>" class="removeelement">Remove</a></div>
</div>
<div class="clearfix"></div>
