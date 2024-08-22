
<form method="post" action="<?php echo base_url();?>admin/advantages/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formfaq"  enctype="multipart/form-data" id="frmroduct">

  
	<div class="form-group">	
		<label for="question">Title</label><?php echo form_error('title'); ?>
		<span class="err" id="err_question"></span>
		<input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?=(isset($advantage)) ? $advantage->title : ''?>">
	</div>	
	<div class="form-group" id="answer" >
		<label for="answer">Core Challenges</label> <?php echo form_error('answer'); ?>
		<span class="err" id="err_answer"></span>
		<?php echo $this->ckeditor->editor("core_challenges",((isset($advantage)) ? $advantage->core_challenges : ''));?>		
	</div>
	<div class="form-group" id="answer" >
		<label for="answer">Solutions</label> <?php echo form_error('solutions'); ?>
		<span class="err" id="err_answer"></span>
		<?php echo $this->ckeditor->editor("solutions",((isset($advantage)) ? $advantage->solutions : ''));?>		
	</div>	
  
	<div class="form-group" >	
		<input type="checkbox" id="active" name="is_active" value="1" <?=(isset($advantage->is_active) && $advantage->is_active == 1) ? 'checked' : ''?> >
		<label for="title">Active</label>
	</div>

  <?
  if (isset($advantage))
  {
  ?>
  <input type="hidden" name="id" value="<?php echo $advantage->id; ?>" />
  <?
  }
  ?>
	<div class="form-group">
		<button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</form>

<script>
	$( document ).ready(function() {
		$("#faq_group_id").change(function() {
			if($(this).val() == "addnew") {
        $('#addnew').show();
			}
			else{
				$('#addnew').hide();
			}
    });
	})
</script>
