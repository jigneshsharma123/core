<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/service_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formservice" id="Formservice" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Parent Service</label>
        <div class="col-sm-10">
          <select class="form-control" id='parent_id' name="parent_id">
            <option value="">Select Parent Service</option>
            <?php foreach($services as $curservice) { ?>
              <option value="<?= $curservice['id'];?>" <?=(isset($service) and isset($service['parent_id']) and $curservice['id'] == $service['parent_id']) ? "selected" : ''; ?> >	<?= $curservice['name']; ?></option>
            <?php } ?>
          </select>
          <span class="text-danger">
            <?php if(isset($validation)) : ?>	
            <span class="text-danger"><?= $error = $validation->getError('parent_id'); ?>
            <?php endif; ?> <br>
          </span>
        </div>	
      </div>                
      <div class="form-group">
        <label class='col-sm-2 control-label' for="template">Template</label>
        <div class="col-sm-10">
          <select class="form-control" id='template' name="template">
            <option value="service_with_child_boxes" <?=(isset($service) and isset($service['template']) and 'service_with_child_boxes' == $service['template']) ? "selected" : ''; ?> >Service With Child Boxes</option>
            <option value="service_with_child_tabs" <?=(isset($service) and isset($service['template']) and 'service_with_child_tabs' == $service['template']) ? "selected" : ''; ?> >Service With Child Tabs</option>
          </select>
          <span class="text-danger">
            <?php if(isset($validation)) : ?>	
            <?= $error = $validation->getError('template'); ?>
            <?php endif; ?> <br>
          </span>
        </div>	
      </div>      
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Service Title <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input id="name" name="name" class="form-control" type="text" placeholder="Service Title"  value="<?=(isset($service)) ?  set_value("name", $service['name']) : set_value("name");?>" required>
					<?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('name'); ?>
          <?php endif; ?> <br>
        </div>	
      </div>      
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="overview">Service Overview <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <textarea required class="form-control" id="overview" rows='4' placeholder="Enter Service Overview" name="overview"><?=(isset($service)) ?  set_value("overview", $service['overview']) : set_value("overview");?></textarea>
          <script>     
          CKEDITOR.replace('overview', {
            toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
            width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
          });
          </script>
          <span class="text-danger">
            <?php if(isset($validation)) : ?>	
            <?= $error = $validation->getError('overview'); ?>
            <?php endif; ?> <br>
          </span>
        </div>
      </div>       
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="why_us">Why This Service</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="why_us" rows='4' placeholder="Why This Service" name="why_us"><?=(isset($service)) ?  set_value("why_us", $service['why_us']) : set_value("why_us");?></textarea>
          <script>     
          CKEDITOR.replace('why_us', {
            toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
            width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
          });
          </script>
        </div>
      </div>       
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="powerful_strategies">Powerful Strategies</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="powerful_strategies" rows='4' placeholder="Enter Powerful Strategies" name="powerful_strategies"><?=(isset($service)) ?  set_value("powerful_strategies", $service['powerful_strategies']) : set_value("powerful_strategies");?></textarea>
          <script>     
          CKEDITOR.replace('powerful_strategies', {
            toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
            width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
          });
          </script>
        </div>
      </div> 
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Service Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="image" name="image" >
          <?php if (isset($service) && isset($service['image']) && !empty($service['image'])) { ?>
            <img src="<?= base_url('/uploads/services/'.$service['image'])?>" width="200px" height="100px" alt="Service Photo">
          <?php  } ?>
          <br>       
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('image'); ?></span>
          <?php endif; ?> <br>  
        </div>  
      </div> 
      <div class="form-group">
        <label class='col-sm-2 control-label' for="sort_order">Sort  Order <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input id="sort_order" name="sort_order" class="form-control" required type="text" placeholder="Service Sort Order"  value="<?=(isset($service)) ?  set_value("sort_order", $service['sort_order']) : set_value("sort_order");?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
        </div>  
      </div> 
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">FAQ Group</label>
        <div class="col-sm-10">
          <select class="form-control" id='faq_group_id' name="faq_group_id">
            <option value="">Select FAQ Group</option>
            <?php foreach($faqGroups as $faqGroup) { ?>
              <option value="<?= $faqGroup['id'];?>" <?=(isset($service) and isset($service['faq_group_id']) and $faqGroup['id'] == $service['faq_group_id']) ? "selected" : ''; ?> >	<?= $faqGroup['name']; ?></option>
            <?php } ?>
          </select>
          <span class="text-danger">
            <?php if(isset($validation)) : ?>	
            <span class="text-danger"><?= $error = $validation->getError('parent_id'); ?>
            <?php endif; ?> <br>
          </span>
        </div>	
      </div>   
			<div class="form-group">	
        <label class='col-sm-2 control-label' for="is_active">Active</label>
        <div class="col-sm-10">
          <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($service['is_active']) && $service['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
        </div>
      </div>
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/service_management">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
  <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
  <?= $this->endSection() ?>
