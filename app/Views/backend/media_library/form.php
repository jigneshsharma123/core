<div class="x_content">

  <div class="row">
  <?php echo form_open_multipart((isset($action)) ? $action : '');?>
  
   <div class="form-group"><label for="venue">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?=(isset($gallery->title)) ? $gallery->title : ''?>">
    </div>
    <div class="form-group"><label for="venue">Select Images</label>
      <input name="userfile[]" id="userfile" type="file" multiple="" class="form-control" />
    </div>
    <input type="hidden"  id="id"  name="id" value="<?=(isset($gallery->id)) ? $gallery->id : ''?>">
    <button type="submit" class="btn btn-default">Submit</button>
      
  <?php echo form_close() ?>
    <p>Prefered Size - 1000px X 600px</p>
    <hr>
  </div>
  
</div>
