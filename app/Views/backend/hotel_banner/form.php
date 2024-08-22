<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/hotel_banner/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="FormhotelDes" id="FormhotelDes" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
    <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Title</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" value="<?=(isset($hotel_banner_edit)) ?  set_value("title", $hotel_banner_edit['title']) : set_value("title");?>"  >  
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Page</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="page" name="page" value="<?=(isset($hotel_banner_edit)) ?  set_value("page", $hotel_banner_edit['page']) : set_value("page");?>"  >  
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Description</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="description"  placeholder="Enter  description " name="description"> <?=(isset($hotel_banner_edit)) ?  set_value("description", $hotel_banner_edit['description']) : set_value("description");?> </textarea>
         <span class="text-danger">
      <?php if(isset($validation)) : ?>
  
       <?= $error = $validation->getError('description'); ?>
      <?php endif; ?> <br>
       </span> 
         
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Link</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="link" name="link" value="<?=(isset($hotel_banner_edit)) ?  set_value("link", $hotel_banner_edit['link']) : set_value("link");?>"  > 
         
        </div>  
      </div>
       <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Link Text</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="link_text" name="link_text" value="<?=(isset($hotel_banner_edit)) ?  set_value("link_text", $hotel_banner_edit['link_text']) : set_value("link_text");?>"  >
        
         
        </div>  
      </div>
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image"> Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="photo" name="photo" >
          <?php if (isset($hotel_banner_edit) && isset($hotel_banner_edit['banner_image'])) {
      ?>
      <img src="<?= base_url('/uploads/hotel_banners/'.$hotel_banner_edit['banner_image'])?>" width="200px" height="100px" alt="Banner Image">
           
          <?php  } ?>
          <br>   
       <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('photo'); ?>
      <?php endif; ?> <br>
      </span>        
         
        
        </div> </div>
        <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Banner Gallery Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="banner_image" name="banner_image[]" multiple="">
          <?php if (isset($hotel_des_edit) && isset($hotel_des_edit['image'])) {
          ?> 
          <?php  } ?>
          <br>         
        </div>  
        </div> 
       <?php if (isset($hotel_banner_edit)) { ?>

        <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">   </label>
        <div class="col-sm-10">
          
          <a href="<?= base_url() ?>/admin/banner_gallery/<?php echo $hotel_banner_edit['id'];  ?>" target="_blank" class="link" style="font-size: 18px;"> <font></font> Click Here View Gallery </a>

        </div> </div>   <?php  } ?> 
      
       <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Active</label>
      <div class="col-sm-10">
        <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($hotel_banner_edit['is_active']) && $hotel_banner_edit['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
      </div>
    </div> 
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/hotel_banner">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
   <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
  
  
  <?= $this->endSection() ?>
