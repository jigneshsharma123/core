<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/hotel_room/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="FormhotelDes" id="FormhotelDes" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Hotel</label>
        <div class="col-sm-10">
          <select class="form-control" id='hotel' name="hotel">
      <option value="">Select Hotel</option>
      <?php foreach($hotels as $hotel_list) { ?>
        <option value="<?= $hotel_list['id'];?>" <?=(isset($hotel_room_edit['hotel_id']) and $hotel_list['id'] == $hotel_room_edit['hotel_id']) ? set_value("hotel","selected" ) : set_select('hotel',$hotel_list['id']); ?> >  <?= $hotel_list['hotel_name']; ?></option>
      <?php } ?>
    </select>
    <span class="text-danger">
    <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('hotel'); ?>
    <?php endif; ?> <br>
  </span>
        </div>	
      </div>
      
       <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Room</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="room" name="room" value="<?=(isset($hotel_room_edit)) ?  set_value("room", $hotel_room_edit['room_name']) : set_value("room");?>" >
        <span class="text-danger">
       <?php if(isset($validation)) : ?>
  
       <?= $error = $validation->getError('room'); ?>
      <?php endif; ?> <br>
     </span>
         
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Price</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="price" name="price" value="<?=(isset($hotel_room_edit)) ?  set_value("price", $hotel_room_edit['price']) : set_value("price");?>" >
        <span class="text-danger">
       <?php if(isset($validation)) : ?>
  
       <?= $error = $validation->getError('price'); ?>
       <?php endif; ?> <br>
       </span>
         
        </div>  
      </div>
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image"> Photo</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="photo" name="photo" >
          <?php if (isset($hotel_room_edit) && isset($hotel_room_edit['room_image'])) {
      ?>
      <img src="<?= base_url('/uploads/hotel_rooms/'.$hotel_room_edit['room_image'])?>" width="200px" height="100px" alt="Destination Photo">
           
          <?php  } ?>
          <br>   
       <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('photo'); ?>
      <?php endif; ?> <br>
      </span>        
         
        
        </div> </div>
          <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Amenities</label>
      <div class="col-sm-10">
        <?php foreach($Room_Amenities  as $key=>$value) { ?>
        <!-- <input type="checkbox"   name="amenities[]" value="<?=$key;?>" <?=(isset($hotel_room_edit['amenities']) && $hotel_room_edit['amenities'] == $value) ? 'checked' : ''?> class="flat-red" >  -->

        <input type="checkbox"   name="amenities[]" value="<?=$key;?>" <?= (isset($hotel_room_edit['amenities']) && (in_array($key, $hotel_room_amenities))) ? 'checked' : ''; ?> class="flat-red" >
        <label >  <?=$value?> </label>
        <?php  } ?>
      </div>
    </div>  
        <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Active</label>
      <div class="col-sm-10">
        <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($hotel_room_edit['is_active']) && $hotel_room_edit['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
      </div>
    </div> 
          
      
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/hotel_room">Cancel</a>
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
