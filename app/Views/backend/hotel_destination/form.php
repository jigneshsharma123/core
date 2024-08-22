<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/hotel_destination/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="FormhotelDes" id="FormhotelDes" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  Country</label> 
        <div class="col-sm-10">
          <select class="form-control" id='country' name="country">
      <option value="">Select Country</option>
      <?php foreach($countries as $country) { ?>
        <option value="<?= $country['id'];?>" <?=(isset($hotel_des_edit['country_id']) and $country['id'] == $hotel_des_edit['country_id']) ? set_value("country","selected" ) : set_select('country',$country['id']); ?> >  <?= $country['country_name']; ?></option>
      <?php } ?>
    </select>
    <span class="text-danger">
    <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('country'); ?>
    <?php endif; ?> <br>
  </span> 
        </div>	
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  State </label>
        <div class="col-sm-10">
          <select name="state" id="stateid" class="form-control">
           <option value="none" selected="" disabled="">Select State</option>
           <?php if (isset($hotel_des_edit)) {

            foreach($states as $state){ ?>

              <option value="<?= $state['id'];?>" <?=(isset($hotel_des_edit['state_id']) and $state['id'] == $hotel_des_edit['state_id']) ? set_value("state","selected" ) : set_select('state',$state['id']); ?> >  <?= $state['state_name']; ?></option>

         <?php   }
            
           }    ?>
         </select>
         <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('state'); ?>
        <?php endif; ?> <br>
       </span>
          
        </div>

      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> City </label>
        <div class="col-sm-10">
          <input id="lname" name="city" class="form-control" type="text" placeholder="city"  value="<?=(isset($hotel_des_edit)) ?  set_value("city", $hotel_des_edit['city']) : set_value("city");?>">
          <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('city'); ?>
        <?php endif; ?> <br>
       </span>
          
        </div>  
      </div>
       <div class="form-group">  
        <label class='col-sm-2 control-label' for="category_description"> Description </label>
        <div class="col-sm-10">
          <textarea class="form-control" id="description"  placeholder="Enter  description" name="description"> <?=(isset($hotel_des_edit)) ?  set_value("description", $hotel_des_edit['description']) : set_value("description");?> </textarea>
          <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('description'); ?>
        <?php endif; ?> <br>
       </span>

       </div>
      </div>
       <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> Video Url </label>
        <div class="col-sm-10">
          <input id="lname" name="video_url" class="form-control" type="text" placeholder="Video url"  value="<?=(isset($hotel_des_edit)) ?  set_value("video_url", $hotel_des_edit['video_url']) : set_value("video_url");?>">
          <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('video_url'); ?>
        <?php endif; ?> <br>
       </span>
        </div>  
      </div>
       <div class="form-group">  
        <label class='col-sm-2 control-label' for="image"> Banner Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="banner_image" name="banner_image" >
          <?php if (isset($hotel_des_edit) && isset($hotel_des_edit['banner_image'])) {
      ?>
      <img src="<?= base_url('/uploads/hotel_destinations/destination_banner/'.$hotel_des_edit['banner_image'])?>" width="200px" height="100px" alt="Banner Image">
           
          <?php  } ?>
          <br>  
          <span class="text-danger">
    <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('banner_image'); ?>
    <?php endif; ?> <br>
  </span>        
         
        </div> </div>
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Destination Primary Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="photo" name="photo" >
          <?php if (isset($hotel_des_edit) && isset($hotel_des_edit['photo'])) {
      ?>
      <img src="<?= base_url('/uploads/hotel_destinations/'.$hotel_des_edit['photo'])?>" width="200px" height="100px" alt="Destination Photo">
           
          <?php  } ?>
          <br>  
        <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('photo'); ?>
       <?php endif; ?> <br>
       </span>         
         
        </div> </div>
        <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Destination Gallery Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="dest_image" name="dest_image[]" multiple="">
          <?php if (isset($hotel_des_edit) && isset($hotel_des_edit['image'])) {
      ?>
      
           
          <?php  } ?>
          <br>         
         
        
        </div>  
      </div> 
       <?php if (isset($hotel_des_edit)) { ?>

      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">   </label>
        <div class="col-sm-10">
          
          <a href="<?= base_url() ?>/admin/destination_gallery/<?php echo $hotel_des_edit['id'];  ?>" target="_blank" class="link" style="font-size: 18px;"> <font></font> Click Here View Gallery </a>

        </div> </div>   <?php  } ?>
        <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Active</label>
      <div class="col-sm-10">
        <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($hotel_des_edit['is_active']) && $hotel_des_edit['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
      </div>
    </div> 
          
      
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/hotel_destination">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
   <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
   <script type="text/javascript">                          
   $(document).ready(function(){

     $('#country').change(function(){       
           var country_id = $('#country').val();  
           if(country_id != '')
           {
               $.ajax({
                   url:"  <?=site_url('/admin/hotel_destination/getstate')?> ",
                   method:"post",
                   data:{country_id:country_id},
                   dataType:"JSON",
                   success:function(json)
                   { 
                       $('#stateid').find('option').remove();
                       $('#stateid').append('<option value="none" selected="" disabled="">Select State</option>');
                      $.each(json, function(i, value) {
                        $('#stateid').append($('<option>').text(value.state_name).attr('value', value.id));
                      });                                                  
                    }
                  });
               };        
           });


      $('#stateid').change(function(){       
   var stateid = $('#stateid').val();
   if(stateid != '')
   {
         $.ajax({
               url:"  <?=site_url('/getCity')?> ",
               method:"post",
               data:{stateid:stateid},
               dataType:"JSON",
               success:function(json)
               { 
                     $('#cityid').find('option').remove();
                     $('#cityid').append('<option value="">Select City</option>');
                     $.each(json, function(i, value) {
                        $('#cityid').append($('<option>').text(value.name).attr('value', value.id));
                     });   
                     var cid = $("#cid").val();
                     if(cid != '')
                       $('#cityid').val(cid);                                               
                }
             });
         };        
      });      



    
});      
</script>
  
  <?= $this->endSection() ?>
