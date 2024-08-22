<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/destination_itinerary/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="FormhotelDes" id="FormhotelDes" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Destination</label>
        <div class="col-sm-10">
          <select class="form-control" id='destination_id' name="destination_id">
      <option value="">Select Destination</option>
      <?php foreach($destinations as $destination) { ?>
        <option value="<?= $destination['id'];?>" <?=(isset($hotel_itinerary_edit['destination_id']) and $destination['id'] == $hotel_itinerary_edit['destination_id']) ? set_value("destination_id","selected" ) : set_select('destination_id',$destination['id']); ?> >  <?= $destination['city']; ?></option>
      <?php } ?>
    </select>
    <span class="text-danger">
    <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('destination_id'); ?>
    <?php endif; ?> <br>
  </span> 
        </div>	
      </div>
      
       <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Title</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" value="<?=(isset($hotel_itinerary_edit)) ?  set_value("title", $hotel_itinerary_edit['title']) : set_value("title");?>" >
         <span class="text-danger">
    <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('title'); ?>
    <?php endif; ?> <br>
  </span> 
        </div>  
      </div>
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="category_description"> Description </label>
        <div class="col-sm-10">
          <textarea class="form-control" id="description"  placeholder="Enter  Practice areas" name="description"> <?=(isset($hotel_itinerary_edit)) ?  set_value("description", $hotel_itinerary_edit['description']) : set_value("description");?> </textarea>
           <span class="text-danger">
         <?php if(isset($validation)) : ?>
  
         <?= $error = $validation->getError('description'); ?>
        <?php endif; ?> <br>
         </span> 

       </div>
      </div>
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image"> Photo</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="photo" name="photo" >
          <?php if (isset($hotel_itinerary_edit) && isset($hotel_itinerary_edit['itinerary_photo'])) {
      ?>
      <img src="<?= base_url('/uploads/hotel_destinations/desti_itinerary/'.$hotel_itinerary_edit['itinerary_photo'])?>" width="200px" height="100px" alt="Destination Photo">
           
          <?php  } ?>
          <br>  
          <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('photo'); ?>
        <?php endif; ?> <br>
        </span>          
         
        
        </div> </div>
         
        <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Active</label>
      <div class="col-sm-10">
        <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($hotel_itinerary_edit['is_active']) && $hotel_itinerary_edit['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
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
