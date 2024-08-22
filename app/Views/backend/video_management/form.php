<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/video_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formvideo" id="Formvideo" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label class='col-sm-2 control-label' for="category">Category <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" id='category_id' name="category_id" required>
                    <option value="">Select Category</option>
                    <?php foreach($categories as $category) { ?>
                    <option value="<?= $category['id'];?>" <?=(isset($video['category_id']) and $category['id'] == $video['category_id']) ? "selected" : ''; ?> ><?= $category['title']; ?></option>
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
            <label class='col-sm-2 control-label' for="partner_title">Title <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input id="title" name="title" class="form-control" type="text" placeholder="Title" value="<?=(isset($video)) ?  set_value("title", $video['title']) : set_value("title");?>" required>
              <?php if(isset($validation)) : ?>
                <span class="text-danger"><?= $error = $validation->getError('title'); ?>
              <?php endif; ?> <br>
            </div>
        </div>                
        <div class="form-group">
        <label class='col-sm-2 control-label' for="video">Video (Youtube Code)<span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input id="video" name="video" class="form-control" type="text" placeholder="Video"  value="<?=(isset($video)) ?  set_value("video", $video['video']) : set_value("video");?>" required>
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('video'); ?>
          <?php endif; ?> <br>
        </div>
      </div>       
      <div class="form-group">
        <label class='col-sm-2 control-label' for="video_desc">Video Description <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <textarea class="form-control" id="video_desc" rows='4' required placeholder="Video Description" name="video_desc"><?=(isset($video)) ?  set_value("video_desc", $video['video_desc']) : set_value("video_desc");?></textarea>
        </div>
      </div>       
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="image" name="image" >
          <?php if (isset($video) && isset($video['image']) && !empty($video['image'])) { ?>
            <img src="<?= base_url('/uploads/videos/'.$video['image'])?>" width="200px" height="100px" alt="Photo">
          <?php  } ?>
          <br>       
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('image'); ?></span>
          <?php endif; ?> <br>  
        </div>  
      </div> 
      <div class="form-group">
        <label class='col-sm-2 control-label' for="show_on_home_page"> Show On Home Page</label>
        <div class="col-sm-10">
          <input type="checkbox"  id="show_on_home_page" name="show_on_home_page" value="1" <?=(isset($video['show_on_home_page']) && $video['show_on_home_page'] == 1) ? 'checked' : ''?> class="flat-red" > YES
        </div>
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="is_active"> Active</label>
        <div class="col-sm-10">
          <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($video['is_active']) && $video['is_active'] == 1) ? 'checked' : ''?> class="flat-red" > YES
        </div>
      </div>
      <hr>
      <div class="form-group">
        <h4>For Sampark Smart Shala Videos</h3>
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="refer_link">Refer Link</label>
        <div class="col-sm-10">
          <input id="refer_link" name="refer_link" class="form-control" type="text" placeholder="Refer Link"  value="<?=(isset($video)) ?  set_value("refer_link", $video['refer_link']) : set_value("refer_link");?>">
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('refer_link'); ?>
          <?php endif; ?> <br>
        </div>
      </div>      
      <div class="form-group">
        <label class='col-sm-2 control-label' for="suggestion">Suggestion</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="suggestion" rows='4' placeholder="Enter Suggestion" name="suggestion"><?=(isset($video)) ?  set_value("suggestion", $video['suggestion']) : set_value("suggestion");?></textarea>
          <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('suggestion'); ?>
          <?php endif; ?> <br>
        </div>
      </div>
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/video_management">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
  <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
  <?= $this->endSection() ?>
