<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<form method="post" action="<?php echo base_url();?>/admin/resource_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formresource" id="Formresource" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label class='col-sm-2 control-label' for="category">Category <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" id='category_id' name="category_id">
                    <option value="">Select Category</option>
                    <?php foreach($categories as $category) { ?>
                    <option value="<?= $category['id'];?>" <?=(isset($resource['category_id']) and $category['id'] == $resource['category_id']) ? "selected" : ''; ?> >	<?= $category['title']; ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger">
                <?php if(isset($validation)) : ?>
                <?= $error = $validation->getError('category_id'); ?>
                <?php endif; ?> <br>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="partner_title">Resource Title <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input id="title" name="title" required class="form-control" type="text" placeholder="Resource Title"  value="<?=(isset($resource)) ?  set_value("title", $resource['title']) : set_value("title");?>" required>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('title'); ?>
                <?php endif; ?><br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="brief">Resource Overview</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="brief" rows='4' placeholder="Enter Resource Overview" name="brief"><?=(isset($resource)) ?  set_value("brief", $resource['brief']) : set_value("brief");?></textarea>
            </div> 
            <script>
                CKEDITOR.replace('brief', {
                    toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
                    width: '<?php echo $width; ?>',language: '<?php echo $language; ?>'
                });
            </script>
        </div>
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="image">Resource Image</label>
            <div class="col-sm-10">
                <?php if (isset($resource) && isset($resource['image']) && !empty($resource['image'])) { ?>
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="<?= base_url('/uploads/resources/'.$resource['image'])?>" width="200px" height="auto" alt="Resource Image"><br>
                <?php } else { ?>
                    <input type="file" class="form-control" id="image" name="image">
                <?php } ?>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('image'); ?></span>
                <?php endif; ?><br>
            </div>
        </div>
        <div class="form-group">  
            <label class='col-sm-2 control-label' for="attachment">Resource PDF</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="attachment" name="attachment">
                <?php if (isset($resource) && isset($resource['attachment']) && !empty($resource['attachment'])) { ?>
                    <a href="<?= base_url('/uploads/resources/'.$resource['attachment'])?>" alt="Resource PDF" target="_blank">View</a><br>
                <?php  } ?>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('attachment'); ?></span>
                <?php endif; ?><br>  
            </div>  
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="publish_date">Publish Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" readonly id="publish_date" placeholder="publish date" name="publish_date" value="<?=(isset($resource)) ? set_value("publish_date", $resource['publish_date']) : set_value("publish_date"); ?>">
                <span class="text-danger">
                    <?php if(isset($validation)) : ?>
                        <?= $error = $validation->getError('publish_date'); ?>
                    <?php endif; ?> <br>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="external_link">External Link</label>
            <div class="col-sm-10">
                <input id="external_link" name="external_link" class="form-control" type="text" placeholder="External Link"  value="<?=(isset($resource)) ?  set_value("external_link", $resource['external_link']) : set_value("external_link");?>" >
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('external_link'); ?>
                <?php endif; ?><br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="is_active">Active</label>
            <div class="col-sm-10">
                <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($resource['is_active']) && $resource['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-default" href="<?php echo base_url() ?>/admin/resource_management">Cancel</a>
            <button class="btn btn-info pull-right" type="submit">Save</button>
        </div>
    </div>
</form>
<script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
<script>
    $( document ).ready(function() {
        $('#publish_date').datepicker({
            dateFormat:'yy-mm-dd',
            closeOnDateSelect: true,
            scrollMonth : false,
            scrollInput : false
        });
    })
</script>
<?= $this->endSection() ?>
