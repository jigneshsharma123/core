<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<form method="post" action="<?php echo base_url();?>/admin/partner_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formpartner" id="Formpartner" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">  
        <div class="form-group">
            <label class='col-sm-2 control-label' for="category">Category <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" id='category_id' name="category_id">
                    <option value="">Select Category</option>
                    <?php foreach($categories as $category) { ?>
                    <option value="<?= $category['id'];?>" <?=(isset($partner['category_id']) and $category['id'] == $partner['category_id']) ? "selected" : ''; ?> ><?= $category['title']; ?></option>
                    <?php } ?>
                </select>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('category_id'); ?></span>
                <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="partner_title">Partner Title <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input id="name" name="name" class="form-control" type="text" placeholder="Partner Title"  value="<?=(isset($partner)) ?  set_value("name", $partner['name']) : set_value("name");?>" required>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('name'); ?>
                <?php endif; ?><br>
            </div>
        </div>      
        <div class="form-group">
            <label class='col-sm-2 control-label' for="overview">Partner Overview</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="info" rows='4' placeholder="Enter Partner Overview" name="info"><?=(isset($partner)) ?  set_value("info", $partner['info']) : set_value("info");?></textarea>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('info'); ?>
                <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="image">Partner Image <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <?php if (isset($partner)) { ?>
                    <input type="file" class="form-control" id="image" name="image">
                <?php  } else { ?>
                    <input type="file" class="form-control" id="image" name="image" required>
                <?php  } ?>
                <?php if (isset($partner) && isset($partner['image']) && !empty($partner['image'])) { ?>
                    <img src="<?= base_url('/uploads/partners/'.$partner['image'])?>" width="200px" height="auto" alt="Partner Photo" style="border:1px solid; background:grey"><br>
                <?php  } ?>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('image'); ?></span>
                <?php endif; ?> <br>
            </div>
        </div> 
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="image">Secondary Image (Appear on Homepage)</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="secondary_image" name="secondary_image">
                <?php if (isset($partner) && isset($partner['secondary_image']) && !empty($partner['secondary_image'])) { ?>
                    <img src="<?= base_url('/uploads/partners/'.$partner['secondary_image'])?>" width="200px" height="auto" alt="Secondary Image" style="border:1px solid; background:grey"><br>
                <?php  } ?>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('secondary_image'); ?></span>
                <?php endif; ?> <br>
            </div>
        </div> 
        <div class="form-group">
            <label class='col-sm-2 control-label' for="is_active"> Active</label>
            <div class="col-sm-10">
                <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($partner['is_active']) && $partner['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-info" type="submit">Save</button>
            <a class="btn btn-default pull-right" href="<?php echo base_url() ?>/admin/partner_management">Cancel</a>
        </div>
    </div>
</form>
<script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
<?= $this->endSection() ?>
