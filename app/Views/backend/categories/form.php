<?= $this->extend('backend/theme/_layouts/default') ?>
<?= $this->section('content') ?>
<form method="post" action="<?php echo base_url();?>/admin/categories/<?php echo (isset($form_action)) ? $form_action : ''?>" role="form" name="Formcategory" id="Formcategory" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label class='col-sm-2 control-label' for="resource_type">Module <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" required id='module' name="module">
                    <option value="">Select Module</option>
                    <?php foreach ($category_modules as $module_key=>$module_type) { ?>
                    <option value="<?php echo $module_key; ?>" <?=(isset($category) && $category['module'] == $module_key) ?  'selected' : set_select("module", $module_key);?>><?php echo $module_type; ?></option>
                    <?php } ?>
                </select>
                <?php if(isset($validation)) : ?>
                <span class="text-danger"><?= $error = $validation->getError('module'); ?></span>
                <?php endif; ?><br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="category_title">Category Title</label>
            <div class="col-sm-10">
                <input id="category_title" name="category_title" class="form-control" type="text" placeholder="Category Title" value="<?php echo (isset($category)) ? set_value("author",$category['title']) : set_value("designation")?>" >
                <span class="text-danger">
                    <?php if(isset($validation)) : ?>
                    <?= $error = $validation->getError('category_title'); ?>
                    <?php endif; ?> <br>
                </span> 
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="status"> Active</label>
            <div class="col-sm-10">
                <input type="checkbox"  id="status" name="status" value="1" <?php echo (isset($category['status']) && $category['status'] == 1) ? 'checked' : ''?> class="flat-red" >
            </div>
        </div>
        <?php
        if (isset($category))
        {
        ?>
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
        <?php
        }
        ?>
        <div class="box-footer">
            <a class="btn btn-default" href="<?php echo base_url() ?>/backend/categories">Cancel</a>
            <button class="btn btn-info pull-right" type="submit">Save</button>
        </div>
    </div>
</form>
<script src="<?= base_url('/assets/admin/js/jquery.validate.js'); ?>"></script>
<script src="<?=  base_url('/assets/admin/js/additional-methods.js'); ?>"></script>
<script>
$("#Formcategory").validate({
    rules: {
        'category_title': {
            required: true,
        },
    }
});
</script>  
<?= $this->endSection() ?>
