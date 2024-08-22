<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="box">
  <div class="x_content">

    <div class="row">
    <?php echo form_open_multipart('admin/gallery_management/do_upload');?>
    
     <div class="form-group"><label for="venue">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?=(isset($title)) ? $title : ''?>">
      </div>
      <div class="form-group"><label for="venue">Select Images</label>
        <input name="userfile[]" id="userfile" type="file" multiple="" class="form-control" />
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
        
    <?php echo form_close() ?>
    <!--<p>Prefered Size - 1000px X 600px</p>
      <form action="<?php echo base_url()?>admin/media_library/uploads" method="post" enctype="multipart/form-data">
        <div class="col-md-55"><input type="file" name="medias[]" id="medias" multiple=""></div>
        <div class="col-md-55"><input type="submit" name="subupload" value="Upload"></div>
      </form>-->
      <hr>
    </div>
    
  </div>
</div>
<?= $this->endSection() ?>