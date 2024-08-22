<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<form method="post" action="<?php echo base_url();?>/admin/job_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formjob" id="Formjob" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label class='col-sm-2 control-label' for="job_title">Job Title <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input id="title" name="title" class="form-control" type="text" placeholder="Job Title"  value="<?=(isset($job)) ?  set_value("title", $job['title']) : set_value("title");?>" required>
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('title'); ?>
                <?php endif; ?><br>
            </div>
        </div>      
        <div class="form-group">
            <label class='col-sm-2 control-label' for="overview">Job Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="editor1" rows='4' placeholder="Enter Job Description" name="description"><?=(isset($job)) ?  set_value("description", $job['description']) : set_value("description");?></textarea>
                 <script>       
                    //CKEDITOR.replace( 'editor1' );
                     CKEDITOR.replace('editor1', {
                        toolbar: <?php echo json_encode($toolbar); ?>,
                        height: '<?php echo $height; ?>',
                        width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',extraAllowedContent: '<?php echo $extraAllowedContent; ?>',startupOutlineBlocks: '<?php echo $startupOutlineBlocks; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
                    });
                 </script>  
                <?php if(isset($validation)) : ?>
                    <span class="text-danger"><?= $error = $validation->getError('description'); ?>
                <?php endif; ?> <br>
            </div>
        </div>
        <div class="form-group">
            <label class='col-sm-2 control-label' for="is_active"> Active</label>
            <div class="col-sm-10">
                <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($job['is_active']) && $job['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-info" type="submit">Save</button>
            <a class="btn btn-default pull-right" href="<?php echo base_url() ?>/admin/job_management">Cancel</a>
        </div>
    </div>
</form>
<script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
<?= $this->endSection() ?>
