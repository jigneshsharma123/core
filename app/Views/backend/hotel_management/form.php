<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/hotel_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formhotel" id="Formhotel" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  Name</label>
        <div class="col-sm-10">
          <input id="hname" name="hname" class="form-control" type="text" placeholder=" Hotel Name"  value="<?=(isset($hotel_detail_edit)) ?  set_value("name", $hotel_detail_edit['hotel_name']) : set_value("name");?>" required>
					<?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('hname'); ?>
    <?php endif; ?> <br>
        </div>	
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  Hotel Type </label>
        <div class="col-sm-10">
          <input id="lname" name="hotel_type" class="form-control" type="text" placeholder="Hotel Type"  value="<?=(isset($hotel_detail_edit)) ?  set_value("hotel_type", $hotel_detail_edit['hotel_type']) : set_value("hotel_type");?>" required>
          <?php if(isset($validation)) : ?>
  
         <?= $error = $validation->getError('hotel_type'); ?>
         <?php endif; ?> <br>
          
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  Extra People </label>
        <div class="col-sm-10">
          <input id="hname" name="extra_people" class="form-control" type="text" placeholder=" Extra People"  value="<?=(isset($hotel_detail_edit)) ?  set_value("extra_people", $hotel_detail_edit['extra_people']) : set_value("extra_people");?>" required>
          <?php if(isset($validation)) : ?>
  
         <?= $error = $validation->getError('extra_people'); ?>
         <?php endif; ?> <br>
          
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  Minimum Stay </label>
        <div class="col-sm-10">
          <input id="hname" name="minimum_stay" class="form-control" type="text" placeholder="Minimum Stay"  value="<?=(isset($hotel_detail_edit)) ?  set_value("minimum_stay", $hotel_detail_edit['minimum_stay']) : set_value("minimum_stay");?>" required>
           <?php if(isset($validation)) : ?>
  
         <?= $error = $validation->getError('minimum_stay'); ?>
         <?php endif; ?> <br>
          
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> Available Room </label>
        <div class="col-sm-10">
          <input id="lname" name="available_room" class="form-control" type="text" placeholder=" Available Room"  value="<?=(isset($hotel_detail_edit)) ?  set_value("available_room", $hotel_detail_edit['available_room']) : set_value("available_room");?>">
          <?php if(isset($validation)) : ?>
  
         <?= $error = $validation->getError('available_room'); ?>
         <?php endif; ?> <br>
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">  Security Deposite </label>
        <div class="col-sm-10">
          <input  id="security_deposite" name="security_deposite" class="form-control" type="text" placeholder="Security Deposite"  value="<?=(isset($hotel_detail_edit)) ?  set_value("security_deposite", $hotel_detail_edit['security_deposite']) : set_value("security_deposite");?>" >
          <?php  if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('security_deposite'); ?>
    <?php endif;  ?> <br>
        </div>  
      </div>
     
      
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> country </label>
        <div class="col-sm-10">
          <select class="form-control" id='country' name="country">
      <option value="">Select Country</option>
      <?php foreach($countries as $country) { ?>
        <option value="<?= $country['id'];?>" <?=(isset($hotel_detail_edit['country_id']) and $country['id'] == $hotel_detail_edit['country_id']) ? set_value("country","selected" ) : set_select('country',$country['id']); ?> >  <?= $country['country_name']; ?></option>
      <?php } ?>
    </select>
         <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('country'); ?>
    <?php endif; ?> <br>
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> State </label>
        <div class="col-sm-10">
          <select name="state" id="stateid" class="form-control">
           <option value="none" selected="" disabled="">Select State</option>
           <?php if (isset($hotel_detail_edit)) {

            foreach($states as $state){ ?>

              <option value="<?= $state['id'];?>" <?=(isset($hotel_detail_edit['state_id']) and $state['id'] == $hotel_detail_edit['state_id']) ? set_value("state","selected" ) : set_select('state',$state['id']); ?> >  <?= $state['state_name']; ?></option>

         <?php   }
            
           }    ?>
         </select>
          <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('state'); ?>
    <?php endif; ?> <br>
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> City </label>
        <div class="col-sm-10">
         <select name="city" id="cityid" class="chosen-select1 form-control rprop">
         <option value="">Select City</option>
          <?php if (isset($hotel_detail_edit)) {

            foreach($cities as $p_key){ ?>

              <option value="<?= $p_key['id'];?>" <?=(isset($hotel_detail_edit['city_id']) and $p_key['id'] == $hotel_detail_edit['city_id']) ? set_value("city","selected" ) : set_select('city',$p_key['id']); ?> >  <?= $p_key['city']; ?></option>

         <?php   }
            
           }    ?>
          </select>
          <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('city'); ?>
    <?php endif; ?> <br>
        </div>  
      </div>
       <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> Neighborhood </label>
        <div class="col-sm-10">
          <input id="neighborhood" name="neighborhood" class="form-control" type="text" placeholder="Neighborhood "  value="<?=(isset($hotel_detail_edit)) ?  set_value("neighborhood", $hotel_detail_edit['neighborhood']) : set_value("neighborhood");?>" >
          <?php if(isset($validation)) : ?>
  
     <?= $error = $validation->getError('neighborhood'); ?>
    <?php endif; ?> <br>
        </div>  
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title"> Cancellation </label>
        <div class="col-sm-10">
          <input id="hname" name="cancellation" class="form-control" type="text" placeholder=" Cancellation (ex- Strict ) "  value="<?=(isset($hotel_detail_edit)) ?  set_value("cancellation", $hotel_detail_edit['cancellation']) : set_value("cancellation");?>" required>
          
        </div>  
      </div>
      <div class="form-group">  
      <label class='col-sm-2 control-label' for="is_active"> Amenities</label>
      <div class="col-sm-10">
        <?php foreach($amenities_checkbox  as $key=>$value) { ?>
        

        <input type="checkbox"   name="amenities[]" value="<?=$key;?>" <?= (isset($hotel_detail_edit['hotel_amenities']) && (in_array($key, $hotel_amenities_data))) ? 'checked' : '';   ?> class="flat-red" >
        <label >  <?=$value?> </label>
        <?php  } ?>
      </div>
    </div>  
        
      
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="category_description"> Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="description" rows='4' placeholder="Enter  Description" name="description"> <?=(isset($hotel_detail_edit)) ?  set_value("description", $hotel_detail_edit['description']) : set_value("description");?> </textarea>
          <script>     
                //CKEDITOR.replace('profile_description');
        CKEDITOR.replace('description', {
        toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
        width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
    });
         </script>
        </div>
      </div> 
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Hotel Primary Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="image" name="image" >
          <?php if (isset($hotel_detail_edit) && isset($hotel_detail_edit['hotel_photo'])) {
      ?>
      <img src="<?= base_url('/uploads/hotel_details/'.$hotel_detail_edit['hotel_photo'])?>" width="200px" height="100px" alt="Profile Photo">
           
          <?php  } ?>
          <br> 
          <span class="text-danger">
        <?php if(isset($validation)) : ?>
  
        <?= $error = $validation->getError('image'); ?>
        <?php endif; ?> <br>
        </span>         
         
        
        </div>  
      </div>  
      <div class="form-group">  
        <label class='col-sm-2 control-label' for="image">Hotel Gallery Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="image" name="hotel_image[]" multiple="">
          <?php if (isset($hotel_detail_edit) && isset($hotel_detail_edit['hotel_photo'])) {
      ?>
      
           
          <?php  } ?>
          <br>         
         
        
        </div>  
      </div> 
           <?php if (isset($hotel_detail_edit)) { ?>

      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">   </label>
        <div class="col-sm-10">
          
          <a href="<?= base_url() ?>/admin/hotel_gallery/<?php echo $hotel_detail_edit['id'];  ?>" target="_blank" class="link" style="font-size: 18px;"> <font></font> Click Here View Gallery </a>

        </div> </div>   <?php  } ?>
			<div class="form-group">	
			<label class='col-sm-2 control-label' for="is_active"> Active</label>
			<div class="col-sm-10">
				<input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($hotel_detail_edit['is_active']) && $hotel_detail_edit['is_active'] == 1) ? 'checked' : ''?> class="flat-red" >
			</div>
		</div>
          
        
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/hotel_management">Cancel</a>
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
               url:"  <?=site_url('/admin/hotel_destination/get_hotelDestination')?> ",
               method:"post",
               data:{stateid:stateid},
               dataType:"JSON",
               success:function(json)
               { 
                     $('#cityid').find('option').remove();
                     $('#cityid').append('<option value="">Select City</option>');
                     $.each(json, function(i, value) {
                        $('#cityid').append($('<option>').text(value.city).attr('value', value.id));
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
