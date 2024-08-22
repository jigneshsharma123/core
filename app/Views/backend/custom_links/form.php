
  <form method="post" action="<?php echo base_url();?>admin/custom_links/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formcustom_link" id="Formcustom_link" class='form-horizontal' enctype="multipart/form-data">
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="custom_link_title">Title</label>
        <div class="col-sm-10">
          <input id="custom_link_title" name="title" class="form-control" maxlength='100' type="text" placeholder="Title" value="<?=(isset($custom_link)) ? $custom_link->title : ''?>">
					<?php echo form_error('name'); ?>
        </div>	
      </div>
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="image">Icon/Image</label>
        <div class="col-sm-2">
          <?php $allowed_types = array("image");?>
          <?php
          if (isset($custom_link) && isset($custom_link->media_element_id))
            echo media_library_button($allowed_types, 'image', $custom_link->media_element_id, $custom_link->media_element_alt_tag, 'custom_link', 'media_element');
          else
            echo media_library_button($allowed_types, '', 0, '', 'custom_link', 'media_element');
          ?>
        </div>	
      </div>	
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="category_description">Brief</label>
        <div class="col-sm-10">
          <textarea class="form-control" maxlength='100' id="brief" rows='4' placeholder="Enter Brief" name="brief"><?=(isset($custom_link)) ? $custom_link->brief : ''?></textarea>
        </div>
      </div> 
      <div class="form-group">
        <label class='col-sm-2 control-label' for="custom_link_title">Link Type</label>
        <div class="col-sm-10">
          <select name="link_type" class="form-control" id="link_type">
            <option value="internal" <?php echo (isset($custom_link) and $custom_link->link_type == "internal") ? 'selected' : ''?>>Internal Page</option>
            <option value="external" <?php echo (isset($custom_link) and $custom_link->link_type == "external") ? 'selected' : ''?>>External</option>
          </select>
					<?php echo form_error('name'); ?>
        </div>	
      </div>
      <div class="form-group">
        <label class='col-sm-2 control-label' for="custom_link_title">Link</label>
        <div class="col-sm-10">
          <div class="input-group customlink internal">
            <div class="input-group-addon">
              <?php echo base_url(); ?>
            </div>
            <input id="custom_link_internal" name="link[internal]" class="form-control" type="text" placeholder="Link" value="<?=(isset($custom_link)) ? $custom_link->link : ''?>">
          </div>
          <div class="form-group customlink external">
            <input id="custom_link_external" name="link[external]" class="form-control" type="text" placeholder="Link" value="<?=(isset($custom_link)) ? $custom_link->link : ''?>">
          </div>
					<?php echo form_error('name'); ?>
        </div>	
      </div>
        <?
        if (isset($custom_link))
        {
        ?>
        <input type="hidden" name="id" value="<?php echo $custom_link->id; ?>" />
        <?
        }
        ?>
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>admin/custom_links">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>

<script>
$(".customlink").hide()
$("."+$("#link_type").val()).show()
  
$("#link_type").change(function(){
    $(".customlink").hide()
    $("."+$(this).val()).show()
})
</script>
