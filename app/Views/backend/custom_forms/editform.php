<form  name="frmcustomform" method="post" action="<?php echo base_url();?>admin/custom_forms/<?=(isset($form_action)) ? $form_action : ''?>" role="form">
<div class="x_panel">

  <div class="x_title">
    <h2>Form Settings</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: none;">
    <div class="col-lg-6">
     
      <div class="form-group">
        <label for="name">Name</label><span class="err" id="err_name"></span><?php echo form_error('name'); ?>
            
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?=(isset($custom_form)) ? $custom_form->name : ''?>">
      </div>

      <div class="form-group">
        <label for="title">Title</label><span class="err" id="err_title"></span><?php echo form_error('title'); ?>
            
        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?=(isset($custom_form)) ? $custom_form->title : ''?>">
      </div>
      
      <div class="form-group">
        <label for="description">Description</label><span class="err" id="err_description"></span><?php echo form_error('description'); ?>
            
        <textarea class="form-control" id="description" name="description"><?=(isset($custom_form)) ? $custom_form->description : ''?></textarea>
      </div>

      <div class="form-group">
        <label for="css_class">CSS Class</label><span class="err" id="err_css_class"></span><?php echo form_error('css_class'); ?>
            
        <input type="text" class="form-control" id="css_class" placeholder="Enter CSS Class" name="css_class" value="<?=(isset($custom_form)) ? $custom_form->css_class : ''?>">
      </div>

      <div class="form-group">
        <label for="custom_css">Custom CSS</label><span class="err" id="err_custom_css"></span><?php echo form_error('custom_css'); ?>
            
        <input type="text" class="form-control" id="custom_css" placeholder="Enter Custom CSS" name="custom_css" value="<?=(isset($custom_form)) ? $custom_form->custom_css : ''?>">
      </div>
      
      <div class="form-group">
        <label for="custom_css">Form Class</label><span class="err" id="err_form_class"></span><?php echo form_error('form_class'); ?>
            
        <input type="text" class="form-control" id="form_class" placeholder="Enter Form Class" name="form_class" value="<?=(isset($custom_form)) ? $custom_form->form_class : ''?>">
      </div>

      <div class="form-group">
        <label for="custom_css">Parent Class</label><span class="err" id="err_parent_class"></span><?php echo form_error('parent_class'); ?>
            
        <input type="text" class="form-control" id="parent_class" placeholder="Enter Parent Class" name="parent_class" value="<?=(isset($custom_form)) ? $custom_form->parent_class : ''?>">
      </div>
    </div>


    <div class="col-lg-6">
      <div class="form-group">
        <label for="successfull_message">Successfull Message</label><span class="err" id="err_successfull_message"></span><?php echo form_error('successfull_message'); ?>
            
        <input type="text" class="form-control" id="successfull_message" placeholder="Enter Successfull Message" name="successfull_message" value="<?=(isset($custom_form)) ? $custom_form->successfull_message : ''?>">
      </div>
      
      <div class="form-group">
        <label for="mail_to">Mail To</label><span class="err" id="err_title"></span><?php echo form_error('title'); ?>
            
        <input type="text" class="form-control" id="mail_to" placeholder="Enter Mail To" name="mail_to" value="<?=(isset($custom_form)) ? $custom_form->mail_to : ''?>">
      </div>

      <div class="form-group">
        <label for="mail_subject">Mail Subject</label><span class="err" id="err_mail_subject"></span><?php echo form_error('mail_subject'); ?>
            
        <input type="text" class="form-control" id="mail_subject" placeholder="Enter Mail Subject" name="mail_subject" value="<?=(isset($custom_form)) ? $custom_form->mail_subject : ''?>">
      </div>
      
      <div class="form-group">
        <label for="mail_content">Mail Content</label><span class="err" id="err_mail_content"></span><?php echo form_error('mail_content'); ?>
            
        <textarea class="form-control" id="mail_content" name="mail_content"><?=(isset($custom_form)) ? $custom_form->mail_content : ''?></textarea>
      </div>
      
      <div class="form-group">
        <input type="checkbox" id="include_form_data_in_mail" name="include_form_data_in_mail" value="1" <?=(isset($custom_form) and $custom_form->include_form_data_in_mail == 1) ? 'checked' : ''?>>
        <label for="include_form_data_in_mail">Include Form Data In Mail</label><span class="err" id="err_include_form_data_in_mail"></span><?php echo form_error('include_form_data_in_mail'); ?>
      </div>

      <div class="form-group">
        <label for="customer_mail_subject">Customer Mail Subject</label><span class="err" id="err_customer_mail_subject"></span><?php echo form_error('customer_mail_subject'); ?>
            
        <input type="text" class="form-control" id="customer_mail_subject" placeholder="Enter Customer Mail Subject" name="customer_mail_subject" value="<?=(isset($custom_form)) ? $custom_form->customer_mail_subject : ''?>">
      </div>
      
      <div class="form-group">
        <label for="customer_mail_content">Customer Mail Content</label><span class="err" id="err_customer_mail_content"></span><?php echo form_error('customer_mail_content'); ?>
            
        <textarea class="form-control" id="customer_mail_content" name="customer_mail_content"><?=(isset($custom_form)) ? $custom_form->customer_mail_content : ''?></textarea>
      </div>
      
      <div class="form-group">
        <input type="checkbox" id="include_form_data_in_customer_email" name="include_form_data_in_customer_email" value="1" <?=(isset($custom_form) and $custom_form->include_form_data_in_customer_email == 1) ? 'checked' : ''?>>
        <label for="include_form_data_in_mail">Include Form Data In Customer Mail</label><span class="err" id="err_include_form_data_in_customer_email"></span><?php echo form_error('include_form_data_in_customer_email'); ?>
      </div>

      <div class="form-group">
        <input type="checkbox" id="include_captcha" name="include_captcha" value="1" <?=(isset($custom_form) and $custom_form->include_captcha == 1) ? 'checked' : ''?>>
        <label for="include_captcha">Include Captcha</label><span class="err" id="err_include_captcha"> Applicable if Google Captcha Keys provided in Settings</span><?php echo form_error('include_captcha'); ?>
      </div>

      <div class="form-group">
        <input type="checkbox" id="by_ajax" name="by_ajax" value="1" <?=(isset($custom_form) and $custom_form->by_ajax == 1) ? 'checked' : ''?>>
        <label for="title">Submit by AJAX</label><span class="err" id="err_by_ajax"></span><?php echo form_error('by_ajax'); ?>
      </div>

      <div class="form-group" id="thankyou_div" style="display: block;">
        <label for="thankyou_url">Thank you URL</label><span class="err" id="err_thankyou_url"></span><?php echo form_error('thankyou_url'); ?>
            
        <input type="text" class="form-control" id="thankyou_url" placeholder="Enter Thank you URL" name="thankyou_url" value="<?=(isset($custom_form)) ? $custom_form->thankyou_url : ''?>">
      </div>
      
      <div class="form-group">
        <?
        if (isset($custom_form) and isset($custom_form->id))
        {
        ?>
        <input type="hidden" name="id" value="<?php echo $custom_form->id; ?>" />
        <?
        }
        ?>
        <button type="submit" class="btn btn-default">Save</button>
      </div>
    </div>
    
  </div>
</div>

</form>
<div class="x_panel">

  <div class="x_title">
    <h2>Form Elements</h2>
    <div class="clearfix"></div>
  </div>

<div class="row">

  <div class="col-lg-2">
    <div class="x_panel">
      <div class="x_content formelements" style="display: block;">
        <a href="javascript:void(0)" id="newtextbox" class="addnewelement btn btn-default" style="width:100%">Text Box</a>
        <a href="javascript:void(0)" id="newemail" class="addnewelement btn btn-default" style="width:100%">Email</a>
        <a href="javascript:void(0)" id="newtextarea" class="addnewelement btn btn-default" style="width:100%">Textarea</a>
        <a href="javascript:void(0)" id="newdropdown" class="addnewelement btn btn-default" style="width:100%">Drop Down</a>
        <a href="javascript:void(0)" id="newradiobutton" class="addnewelement btn btn-default" style="width:100%">Radio Button</a>
        <a href="javascript:void(0)" id="newcheckbox" class="addnewelement btn btn-default" style="width:100%">Check Box</a>
        <a href="javascript:void(0)" id="newcaptcha" class="addnewelement btn btn-default" style="width:100%">Captcha</a>
        <a href="javascript:void(0)" id="newsubmitbutton" class="addnewelement btn btn-default" style="width:100%">Submit Button</a>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Element Settings</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" id="formelementsettings" style="display: none;">
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo $custom_form->title; ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content formelements" id="formview" style="display: block;">
        <p><?php echo $custom_form->description; ?></p>
        <?php foreach($custom_form->form_element as $form_element) { ?>
        <?php $form_element->form_element_option->include_join_fields()->get(); ?>
        <?php $data['form_element'] = $form_element; ?>
        <?php $this->load->view('backend/custom_forms/'.str_replace("new","",$form_element->element_type),$data); ?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
</div>
<style>
.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
}
</style>
<script>

  $('#by_ajax').click(function(){
    if($('#thankyou_div').css('display') == 'block'){
      $('#thankyou_div').css('display', 'none');
    }else{
      $('#thankyou_div').css('display', 'block');
    }
  });
  
  $(".addnewelement").click(function(){
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/custom_forms/addelement",
      data: { element_type: $(this).attr("id"), custom_form_id: <?php echo $custom_form->id; ?> }
    }).done(function( msg ) {
      $(".formelements").addClass("disabledbutton");
      $("#formelementsettings").html(msg)
      $("#formelementsettings").show()
      return false;
    });
  });
  
  $("#formelementsettings").on("click",".cancelbutton",function(){
    $("#formelementsettings").hide()
    $(".formelements").removeClass("disabledbutton");
  })
  
  $(".managevalidations").click(function(){
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/custom_forms/managevalidations",
      data: { element_id: $(this).attr("id") }
    }).done(function( msg ) {
      $(".formelements").addClass("disabledbutton");
      $("#formelementsettings").html(msg)
      $("#formelementsettings").show()
      return false;
    });
  });   
  
  $(".editelement").click(function(){
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/custom_forms/editelement",
      data: { element_id: $(this).attr("id") }
    }).done(function( msg ) {
      $(".formelements").addClass("disabledbutton");
      $("#formelementsettings").html(msg)
      $("#formelementsettings").show()
      return false;
    });
  });   
   
  $("#formview").on("click",".removeelement",function(){
    var e = $(this)
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/custom_forms/removeelement",
      data: { custom_form_id: $(this).attr("id") }
    }).done(function( msg ) {
        e.parent().parent().remove();
        return false;
      });
    return false;
  })
</script>
