<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
  <form method="post" action="<?php echo base_url();?>/admin/faq_management/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formfaq" id="Formfaq" class='form-horizontal'>
    <div class="box-body">
          
      <div class="form-group">
        <label class='col-sm-2 control-label' for="partner_title">Faq Group <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <select class="form-control" id='faq_group_id' name='faq_group_id'>
            <option value="">Select Faq Group</option>
	    <option value="addnew" <?=(isset($faq)) ?  set_select("faq_group_id", $faq['faq_group_id']) : set_select("faq_group_id","addnew");?>>- Add New Group</option>
            <?php foreach($faq_groups as $curfaq) { ?>
	      <?php if (isset($edit) && $edit == 1) { ?>
	      <option value="<?= $curfaq['id'];?>" <?=(isset($faq) and isset($faq['faq_group_id']) and $curfaq['id'] == $faq['faq_group_id']) ? "selected" : ''; ?> >	<?= $curfaq['name']; ?></option>
	      <?php } else { ?>
              <option value=<?= $curfaq['id'];?> <?=(isset($faq)) ? set_select('faq_group_id', $faq['faq_group_id']) : set_select('faq_group_id', $curfaq['id']);?>><?= $curfaq['name']; ?></option>
	      <?php } ?>
            <?php } ?>
          </select>
          <span class="text-danger">
            <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('faq_group_id'); ?>
            <?php endif; ?> <br>
          </span>
        </div>
      </div>
      <?php $faq_group_error = ''; ?>
      <?php if(isset($validation)) : ?>	
      <?php $faq_group_error = $validation->getError('faq_group'); ?>
      <?php endif; ?> 
      <div class="form-group" id="addnew" style="<?php echo ($faq_group_error == '') ? 'display:none' : 'display:block'; ?>">
        <label class='col-sm-2 control-label' for="partner_title">Faq Group Name <span class="text-danger">*</span></label>
        <div class="col-sm-10">
	  <span class="err" id="err_faq_group"></span>
	  <input type="text" class="form-control" disabled required id="faq_group" placeholder="Enter FAQ Group Name " name="faq_group" value="<?=(isset($faq) && isset($faq['faq_group'])) ?  set_value("faq_group", $faq['faq_group']) : set_value("faq_group");?>"> 
	  <?php if(isset($validation)) : ?>
	  <span class="text-danger"><?= $validation->getError('faq_group'); ?></span>
	  <?php endif; ?> <br>
	</div>
      </div> 
      <div class="form-group">
        <label class='col-sm-2 control-label'>Question <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input id="question" name="question" class="form-control" type="text" placeholder="Question"  value="<?=(isset($faq)) ?  set_value("question", $faq['question']) : set_value("question");?>" required>
	  <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('question'); ?>
          <?php endif; ?> <br>
        </div>
      </div>      
      <div class="form-group">	
        <label class='col-sm-2 control-label' for="overview">Answer <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <textarea class="form-control" id="answer" rows='4' required placeholder="Enter Faq Answer" name="answer"> <?=(isset($faq)) ?  set_value("answer", $faq['answer']) : set_value("answer");?> </textarea>
	  <?php if(isset($validation)) : ?>
            <span class="text-danger"><?= $error = $validation->getError('answer'); ?>
          <?php endif; ?> <br>
	  <script>     
          CKEDITOR.replace('answer', {
            toolbar: <?php echo json_encode($toolbar); ?>,height: '<?php echo $height; ?>',
            width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
          });
          </script>
        </div>
      </div>  
      <div class="form-group">
        <label class='col-sm-2 control-label' for="sort_order">Sort Order <span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input id="sort_order" name="sort_order" required class="form-control" type="text" placeholder="Faq Sort Order"  value="<?=(isset($faq)) ?  set_value("sort_order", $faq['sort_order']) : set_value("sort_order");?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
	  <?php if(isset($validation)) : ?>
	    <span class="text-danger"><?= $error = $validation->getError('sort_order'); ?>
	  <?php endif; ?> <br>
        </div>  
      </div> 
      <div class="form-group">
        <label class='col-sm-2 control-label' for="is_active">Active</label>
        <div class="col-sm-10">
          <input type="checkbox"  id="is_active" name="is_active" value="1" <?=(isset($faq['is_active']) && $faq['is_active'] == true) ? 'checked' : ''?> class="flat-red" >
        </div>
      </div>
      <div class="box-footer">
        <a class="btn btn-default" href="<?php echo base_url() ?>/admin/faq_management">Cancel</a>
        <button class="btn btn-info pull-right" type="submit">Save</button>
      </div>
    </div>
  </form>
  <script src="<?= base_url('/assets/admin/js/form-active.js')?> "> </script>
<script>
$( document ).ready(function() {
  $("#faq_group_id").change(function() {
    if($(this).val() == "addnew") {
      $('#addnew').show();
      $('#faq_group').attr("disabled",false);
    }
    else{
      $('#addnew').hide();
      $('#faq_group').attr("disabled",true);
    }
  });
  if($("#faq_group_id").val() == "addnew") {
    $('#addnew').show();
      $('#faq_group').attr("disabled",false);
  }
  else{
    $('#addnew').hide();
      $('#faq_group').attr("disabled",true);
  }
})
</script>
  <?= $this->endSection() ?>

