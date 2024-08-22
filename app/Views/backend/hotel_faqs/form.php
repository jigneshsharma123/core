<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/hotel_faqs/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="FormhotelDes" id="FormhotelDes" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
    <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Hotel</label>
        <div class="col-sm-10">
        <select class="form-control" id='hotel' name="hotel">
      <option value="">Select Hotel</option>
      <?php foreach($hotels as $hotel_list) { ?>
        <option value="<?= $hotel_list['id'];?>" <?=(isset($hotel_faq_edit['hotel_id']) and $hotel_list['id'] == $hotel_faq_edit['hotel_id']) ? set_value("hotel","selected" ) : set_select('hotel',$hotel_list['id']); ?> >  <?= $hotel_list['hotel_name']; ?></option>
      <?php } ?>
    </select>
         
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Category</label>
        <div class="col-sm-10">
        <!-- <input type="text" class="form-control" id="category" name="category" value="<?=(isset($hotel_faq_edit)) ?  set_value("category", $hotel_faq_edit['category']) : set_value("category");?>"  > --> 
        <select class="form-control" id='category' name="category">
      <option value="">Select category</option>
      <?php foreach($faqs_categories as $faqs_category) { ?>
        <option value="<?= $faqs_category;?>" <?=(isset($hotel_faq_edit['category']) and $faqs_category == $hotel_faq_edit['category']) ? set_value("category","selected" ) : set_select('category',$faqs_category); ?> >  <?= $faqs_category; ?></option>
      <?php } ?>
    </select>
         
        </div>  
      </div>
          
      
      
       <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Question</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="question" name="question" value="<?=(isset($hotel_faq_edit)) ?  set_value("question", $hotel_faq_edit['question']) : set_value("question");?>" required >
        <span class="text-danger">
      <?php if(isset($validation)) : ?>
  
       <?= $error = $validation->getError('question'); ?>
      <?php endif; ?> <br>
       </span> 
         
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Answer</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="answer"  placeholder="Enter  Practice areas" name="answer"> <?=(isset($hotel_faq_edit)) ?  set_value("answer", $hotel_faq_edit['answer']) : set_value("answer");?> </textarea>
         <span class="text-danger">
      <?php if(isset($validation)) : ?>
  
       <?= $error = $validation->getError('answer'); ?>
      <?php endif; ?> <br>
       </span> 
         
        </div>  
      </div>
       <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Active</label>
      <div class="col-sm-10">
        <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($hotel_faq_edit['is_active']) && $hotel_faq_edit['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
      </div>
    </div> 
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/hotel_faqs">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
   <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
  
  
  <?= $this->endSection() ?>
