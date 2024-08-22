 <label for="venue">Add More Images</label>
<div class="row">

 <div class="col-md-3">
  <?php echo form_open_multipart('admin/galleries/do_upload_inner');?>
  
      <input type="hidden" class="form-control" id="title" placeholder="Enter title" name="gallery_id" value="<?=(isset($gallery_id)) ? $gallery_id : ''?>">
   
    <div class="form-group">
      <input name="userfile[]" id="userfile" type="file" multiple="" class="form-control" />
       
    </div>
   </div>
   <div class="col-md-2">
   <div class="form-group">
     
       <button type="submit" class="btn btn-default form-control ">Submit</button>
    </div>
   </div>
      
  <?php echo form_close() ?>


    
  </div>
  <div class="row">
  <?php foreach ($medias as $m){?>
     <div class="col-md-55">
		<div class="thumbnail">
		  <div class="image view view-first">
			<img style="width: 100%; display: block;" src="<? echo base_url(); ?><?php echo $m->thumb;?>" alt="image" />
			<div class="mask">
			  <p><br></p>
			  <div class="tools tools-bottom">
			  <a href="<?php echo base_url();?>admin/galleries/changestatus_image/<?php echo $m->id;?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?=(isset($m->is_active) and $m->is_active == 1) ? "Make Inactive" : "Make Active"?>"><i class="fa fa-eye <?=(isset($m->is_active) and $m->is_active == 1) ? "text-success" : "text-danger"?>"></i></a>
			 
				<a href="<?php echo base_url();?>admin/galleries/delete_image/<?php echo $m->id;?>" onclick="return confirm('Click OK to confirm deletion.')" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete"><i class="fa fa-trash text-danger"></i></a>
			  </div>
			</div>
		  </div>
		 
		</div>
	  </div>
  <?php } ?>
  </div>
</div>
