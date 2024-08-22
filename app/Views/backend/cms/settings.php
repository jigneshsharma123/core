
  <form method="post" action="<?php echo base_url();?>admin/cms/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formsocial" id="Formsocial" class='form-horizontal' enctype="multipart/form-data">
          
      <?php foreach($settings_field as $setting_field_key=>$setting_field) { ?>
        <?php if (is_array($setting_field)) { ?>
          <div class="form-group">
            <label class='col-sm-12' for="social_title"><?php echo ucwords(str_replace("_"," ",$setting_field_key))?></label>
          </div>
          <?php foreach($setting_field as $setting_field_inner) { ?>
          <div class="form-group">
            <label class='col-sm-2 control-label' for="social_title"><?php echo ucwords(str_replace("_"," ",$setting_field_inner))?></label>
            <div class="col-sm-10">
              <input id="<?php echo $setting_field_inner?>" name="<?php echo $setting_field_inner?>" class="form-control" type="text" placeholder="" value="<?php echo (isset($setting_values) and isset($setting_values[$setting_field_inner])) ? $setting_values[$setting_field_inner] : ''?>" >
            </div>	
          </div>
          <?php } ?>
        <?php } else { ?>
        <div class="form-group">
          <label class='col-sm-2 control-label' for="social_title"><?php echo ucwords(str_replace("_"," ",$setting_field))?></label>
          <div class="col-sm-10">
            <input id="<?php echo $setting_field?>" name="<?php echo $setting_field?>" class="form-control" type="text" placeholder="" value="<?php echo (isset($setting_values) and isset($setting_values[$setting_field])) ? $setting_values[$setting_field] : ''?>" >
          </div>	
        </div>
        <?php } ?>
      <?php } ?>
          
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>admin/socials">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
