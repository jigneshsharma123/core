<div class="x_content">

  <div class="row">
  <form name="Formpage" action="<?php echo base_url();?>admin/galleries/update" method="post" accept-charset="utf-8" >  
   <div class="form-group"><label for="venue">Title</label>
      <input type="hidden" class="form-control" id="id" name="id" value="<?=(isset($gallery)) ? $gallery->id : ''?>">
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?=(isset($gallery)) ? $gallery->title : ''?>">
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
