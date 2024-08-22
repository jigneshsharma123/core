<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>

<form method="post" action="<?php echo base_url();?>/admin/blogs/<?=(isset($form_action)) ? $form_action : ''?>" role="form" name="Formblog"  enctype="multipart/form-data" id="frmroduct">
	<div class="form-group">
		<label for="title">Category <span class="error">*</span></label><?php //echo form_error('category_id'); ?>
		<select class="form-control" id='category_id' name="category_id">
			<option value="">Select Category</option>
			<?php foreach($categories as $category) { ?>
				<option value="<?= $category['id'];?>" <?=(isset($blog['category_id']) and $category['id'] == $blog['category_id']) ? "selected" : ''; ?> >	<?= $category['title']; ?></option>
			<?php } ?>
		</select>
	 <span class="text-danger">
		<?php if(isset($validation)) : ?>	
		 <?= $error = $validation->getError('category_id'); ?>
		<?php endif; ?> <br>
	</span>
	</div>
	<div class="form-group">	
		<hr>
		<label for="title">Blog Title <span class="error">*</span></label><?php //echo form_error('title'); ?>
		<span class="err" id="err_meta_title"></span>
		<input type="text" class="form-control" id="meta_title" placeholder="Enter Blog Title" name="title" value="<?=(isset($blog)) ?  set_value("title", $blog['title']) : set_value("title");?>">
	 <span class="text-danger">
		<?php if(isset($validation)) : ?>
	
		 <?= $error = $validation->getError('title'); ?>
		<?php endif; ?> <br>
	</span>		
	</div>	
	<div class="form-group">	
		<label for="title">Brief <span class="error">*</span></label><?php //echo form_error('brief'); ?>
		<span class="err" id="err_meta_description"></span>
		<textarea class="form-control" id="brief" rows='4' placeholder="Enter Meta Brief" name="brief"><?=(isset($blog)) ? set_value("brief", $blog['brief']) : set_value("brief"); ?></textarea>
	 <span class="text-danger">
		<?php if(isset($validation)) : ?>
	
		 <?= $error = $validation->getError('brief'); ?>
		<?php endif; ?> <br>
	</span>		
	</div>
	<div class="form-group"  id="content_id" >
		<label for="detail">Content <span class="error">*</span></label> <?php //echo form_error('blog_content'); ?>
		<textarea name="content" id="editor1" rows="15" cols="80">
				
         <?=(isset($blog)) ? set_value("content", $blog['blog_content']) : set_value("content"); ?>       
         </textarea>
         <span class="text-danger">
            <?php if(isset($validation)) : ?>
        
             <?= $error = $validation->getError('Content'); ?>
            <?php endif; ?> <br>
        </span>         
        <script>       
            //CKEDITOR.replace( 'editor1' );
             CKEDITOR.replace('editor1', {
                toolbar: <?php echo json_encode($toolbar); ?>,
                height: '<?php echo $height; ?>',
                width: '<?php echo $width; ?>',language: '<?php echo $language; ?>',extraAllowedContent: '<?php echo $extraAllowedContent; ?>',startupOutlineBlocks: '<?php echo $startupOutlineBlocks; ?>',autoParagraph: '<?php echo $autoParagraph; ?>',fillEmptyBlocks: '<?php echo $fillEmptyBlocks; ?>',forcePasteAsPlainText: '<?php echo $forcePasteAsPlainText; ?>'
            });
        </script>  
        <span class="err" id="err_desc"></span>
    </div>
	<div class="form-group">
      <label for="publish_at">Publish Date <span class="error">*</span></label>
			
      <input type="text" class="form-control" required readonly id="publish_at" placeholder="publish at" name="publish_at" value="<?=(isset($blog)) ? set_value("publish_at", $blog['publish_at']) : set_value("publish_at"); ?>">
	 <span class="text-danger">
		<?php if(isset($validation)) : ?>
	
		 <?= $error = $validation->getError('publish_at'); ?>
		<?php endif; ?> <br>
	</span>      
  </div>
	
	<div class="form-group">	
		<label for="title">Image</label>
		<span class="err" id="err_image"></span>
		<input type="file" class="form-control" id="featured_image" placeholder="Select Image" name="featured_image"  > (Width:800px, height:400px)
		<?php if(isset($errors)){  foreach ($errors as $error): ?>
        <li><?= esc($error) ?></li>
        <?php endforeach ?>
        <?php  } ?>
		
		 <?php if (isset($blog) && isset($blog['featured_image'])) {
		  ?>
		  <img src="<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>" width="800px" height="400px">
           
          <?php  } ?>
					<hr>
	</div>	
	<div class="form-group">	
		<hr>
		<label for="title">Author <span class="error">*</span></label><?php //echo form_error('title'); ?>
		<span class="err" id="err_meta_title"></span>
		<input type="text" class="form-control" id="author" placeholder="Enter Author" name="author" value="<?=(isset($blog)) ? set_value("author", $blog['author']) : set_value("author"); ?>">
	 <span class="text-danger">
		<?php if(isset($validation)) : ?>
	
		 <?= $error = $validation->getError('author'); ?>
		<?php endif; ?> <br>
	</span>		
	</div>	
	<div class="form-group">	
	
		<label for="title">Designation</label><?php //echo form_error('title'); ?>
		<span class="err" id="err_meta_title"></span>
		<input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation" value="<?=(isset($blog)) ? set_value("designation", $blog['designation']) : set_value("designation"); ?>">
	 <span class="text-danger">
		<?php if(isset($validation)) : ?>
	
		 <?= $error = $validation->getError('designation'); ?>
		<?php endif; ?> <br>
	</span>		
	</div>
	
	<div class="form-group" >	
		<input type="checkbox" id="active" name="is_active" value="1" <?=(isset($blog['is_active']) && $blog['is_active'] == 1) ? 'checked' : ''?> >
		<label for="title">Active</label>
	</div>
		<?php 
		if (isset($blog))
		{
		?>
		<input type="hidden" name="id" value="<?php echo $blog['id']; ?>" />
		<?php
		}
		?>
	<div class="form-group">
		<button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
	</div>
</form>
<script>
	$( document ).ready(function() {
		$('#publish_at').datepicker({		
			dateFormat:'yy-mm-dd',
	    closeOnDateSelect: true,
			scrollMonth : false,
		scrollInput : false
		});

	// $('#frmroduct').submit(function(e) {
 //    e.preventDefault();
 //    $("#meta_title,#category_id,#brief,#editor1,#publish_at,#author ,#designation ").each(function(){
 //        if($.trim(this.value) == ""){
 //            alert('you did not fill out one of the fields');
 //        } 
 //      })
 //     })
	
	})
</script>

<script>
	$( document ).ready(function() {
		$("#tweet").change(function() {
			if(this.checked) {
					$('#tweet_div').show();
			}
			else{
				$('#tweet_div').hide();
			}
	});
	})
</script>

<script type="text/javascript">

$( function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tag_id" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) { 
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?=base_url()?>/backend/blogs/get_tags", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
</script>
 <script src="<?= base_url('/assets/admin/js/form-active.js')?> "></script> 
<?= $this->endSection() ?>
