<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/banner_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formbanner" id="Formbanner" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">  
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Banner For <span class="text-danger">*</span></label>
        <div class="col-sm-5">
          <select class="form-control" id='banner_for' name='banner_for' required1>
            <option value="">Select Banner For</option>
            <option value="service" <?=(isset($banner) and isset($banner['banner_for']) and $banner['banner_for'] == 'service') ?  'selected' : set_select("banner_for","service");?>>Service</option>
            <option value="page" <?=(isset($banner) and isset($banner['banner_for']) and $banner['banner_for'] == 'page') ?  'selected' : set_select("banner_for","page");?>>Page</option>
          </select>
          <span class="text-danger">
            <?php if(isset($validation)) : ?>
            <?= $error = $validation->getError('banner_for') ? $validation->getError('banner_for') : $validation->getError('banner_for_id'); ?>
            <?php endif; ?> <br>
          </span>
        </div>
        <div class="col-sm-5">
          <select class="form-control" id='banner_for_id' name='banner_for_id' required1>
            <?php if (isset($banner_items) && !empty($banner_items)) { ?>
            <option value="">Select <?php echo (isset($banner) ? ucwords($banner['banner_for']) : ucwords($banner_for)); ?> </option>
            <?php foreach($banner_items as $banner_item) { ?>
              <option value="<?= $banner_item['id'];?>" <?=(isset($banner) and isset($banner['banner_for_id']) and $banner_item['id'] == $banner['banner_for_id']) ? "selected" : set_select("banner_for_id",$banner_item['id']); ?> ><?= $banner_item['name']; ?></option>
            <?php } ?>
            <?php } else { ?>
            <option value="">Select Item</option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Banner Title <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input id="title" name="title" class="form-control" type="text" placeholder="Banner Title"  value="<?=(isset($banner)) ?  set_value("title", $banner['title']) : set_value("title");?>" required1>
					<?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('title'); ?>
          <?php endif; ?> <br>
        </div>	
      </div>   
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Banner Title CSS Class</label>
        <div class="col-sm-10">
          <input id="title_class" name="title_class" class="form-control" type="text" placeholder="Banner Title CSS Class"  value="<?=(isset($banner)) ?  set_value("title_class", $banner['title_class']) : set_value("title_class");?>" required1>
					<?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('title_class'); ?>
          <?php endif; ?> <br>
        </div>	
      </div>     
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="sub_title">Banner Sub Title </label>
        <div class="col-sm-10">
          <input id="sub_title" name="sub_title" class="form-control" type="text" placeholder="Banner Sub Title"  value="<?=(isset($banner)) ?  set_value("sub_", $banner['sub_title']) : set_value("sub_title");?>">
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('sub_title'); ?>
          <?php endif; ?> <br>
        </div>
      </div>        
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Banner Sub Title CSS Class</label>
        <div class="col-sm-10">
          <input id="sub_title_class" name="sub_title_class" class="form-control" type="text" placeholder="Banner Sub Title CSS Class"  value="<?=(isset($banner)) ?  set_value("sub_title_class", $banner['sub_title_class']) : set_value("sub_title_class");?>" required1>
					<?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('sub_title_class'); ?>
          <?php endif; ?> <br>
        </div>	
      </div>  
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Banner Image</label>
        <div class="col-sm-5">
          <input type="file" class="form-control" id="image" name="image">
          <?php if (isset($banner) && isset($banner['image']) && !empty($banner['image'])) { ?>
            <img src="<?= base_url('/uploads/banners/'.$banner['image'])?>" width="200px" height="auto" alt="Banner Photo">
          <br>       
          <?php  } ?>
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('image'); ?></span>
          <?php endif; ?> <br>  
        </div> 
        <div class="col-sm-5">
          <select class="form-control" id='banner_position' name='banner_position'>
            <option value="right" <?=(isset($banner) && isset($banner['banner_position']) && $banner['banner_position'] == 'right') ?  'selected' : set_select("banner_position","right");?>>Right</option>
            <option value="left" <?=(isset($banner) && isset($banner['banner_position']) && $banner['banner_position'] == 'left') ?  'selected' : set_select("banner_position","left");?>>Left</option>
            <option value="background" <?=(isset($banner) && isset($banner['banner_position']) && $banner['banner_position'] == 'background') ?  'selected' : set_select("banner_position","background");?>>Background</option>
          </select> 
        </div> 
      </div>   
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Button Theme</label>
        <div class="col-sm-10">
          <select class="form-control" id='banner_theme' name='banner_theme'>
            <option value="dark" <?=(isset($banner) && isset($banner['banner_theme']) && $banner['banner_theme'] == 'dark') ?  'selected' : set_select("banner_theme","dark");?>>Dark</option>
            <option value="light" <?=(isset($banner) && isset($banner['banner_theme']) && $banner['banner_theme'] == 'light') ?  'selected' : set_select("banner_theme","light");?>>Light</option>
          </select> <br>  
        </div>	
      </div>      
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Button Text</label>
        <div class="col-sm-10">
          <input id="button_text" name="button_text" class="form-control" type="text" placeholder="Button Text"  value="<?=(isset($banner)) ?  set_value("button_text", $banner['button_text']) : set_value("button_text");?>">
					<?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('button_text'); ?>
          <?php endif; ?> <br>
        </div>	
      </div>     
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Button Link</label>
        <div class="col-sm-10">
          <input id="button_link" name="button_link" class="form-control" type="text" placeholder="Button Link"  value="<?=(isset($banner)) ?  set_value("button_link", $banner['button_link']) : set_value("button_link");?>">
					<?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('button_link'); ?>
          <?php endif; ?> <br>
        </div>	
      </div>     
      <div class="form-group">
        <label class='col-sm-2 control-label' for="title">Button Link Target</label>
        <div class="col-sm-10">
          <select class="form-control" id='button_link_target' name='button_link_target'>
            <option value="_blank" <?=(isset($banner) && isset($banner['button_link_target']) && $banner['button_link_target'] == '_blank') ?  'selected' : set_select("button_link_target","_blank");?>>Blank</option>
            <option value="_self" <?=(isset($banner) && isset($banner['button_link_target']) && $banner['button_link_target'] == '_self') ?  'selected' : set_select("button_link_target","_self");?>>Self</option>
          </select>
        </div>	
      </div>     
			<div class="form-group">	
        <label class='col-sm-2 control-label' for="is_active"> Active</label>
        <div class="col-sm-10">
          <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($banner['is_active']) && $banner['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
        </div>
      </div>
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/banner_management">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
  <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
  
  <script>
  $( document ).ready(function() {
    $("#banner_for").change(function(){
      banner_for = $(this).val();
      banner_for_name = $("#banner_for :selected").text();
      $.ajax({
        url: '/admin/banner_management/banner_items/'+banner_for,
        type: 'get',
        dataType:"JSON",
        success: function(response) {
          $('#banner_for_id').find('option').remove();
          $('#banner_for_id').append('<option value="none" selected="" disabled="">Select '+banner_for_name+'</option>');
          $.each(response, function(i, value) {
            $('#banner_for_id').append($('<option>').text(value.name).attr('value', value.id));
          });                                           
        },
        error: function(response) {
          window.console.log(response);
        }
      });
    })
  });
  </script>
  <?= $this->endSection() ?>
