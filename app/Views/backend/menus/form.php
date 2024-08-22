	
<?
if (isset($banners_image))
{
	extract($banners_image);
	if (isset($id))
		$m_id=$id;
	
	else
		$m_id=0;
}
?><?
if (isset($menus))
{
	extract($menus);
	
}
?>

<form method="post" action="<?php echo base_url();?>admin/menus/<?=(isset($action)) ? $action : ''?>" role="form" name="Formsmenu" enctype="multipart/form-data">
  
    <?
    if (isset($parent_menu) && $parent_menu > 0)
    {
    ?>
    <input type="text" name="parent_menu" value="<?=$parent_menu?>">
    <?
    }
    ?>
 <?  if (isset($error)){
	 echo $error;} ?>
 <div class="form-group">
		<label for="title"><span class="err" style="font-size:18px">*</span>Menu Name</label><span class="err" id="err_menu_name"></span><?php echo form_error('menu_name'); ?>
				
		<input type="text" class="form-control" id="menu_name" placeholder="Enter Menu name" name="menu_name" value="<?=(isset($menu_name)) ? $menu_name : ''?>">
	</div>
	<div class="form-group">
		<label for="sort_order">Sort Order</label><?php echo form_error('sort_order'); ?>
		<span class="err" id="err_sort_order"></span>
		<input type="sort_order" class="form-control" id="sort_order" placeholder="Enter Sort Order" name="sort_order" value="<?=(isset($sort_order)) ? $sort_order : ''?>"> 
	</div>
	<div class="form-group">
        <label class="control-label" for="selectError">Select Position</label><?php echo form_error('position'); ?>
		<span class="err" id="err_position"></span>
		<div class="controls">
            <select id="status" data-rel="chosen" name="position">
                <option value="<?=(isset($position) and $position == "") ? 'selected' : ''?>">Select position</option>
				<option value="Top" <?=(isset($position) and $position == "Top") ? 'selected' : 'Top'?>>Top</option>
				<option value="Bottom"  <?=(isset($position) and $position == "Bottom") ? 'selected' : 'Bottom'?>>Bottom</option>
				<option value="Both" <?=(isset($Both) and $position == "Both") ? 'selected' : 'Both'?>>Both</option>
				</select> 
         </div>
		 </div>
	<div class="form-group">
			<label for="link">Link</label><?php echo form_error('link'); ?>
			<span class="err" id="err_link"></span>
			<input type="link" class="form-control" id="link" placeholder="Enter page link" name="link" value="<?=(isset($link)) ? $link : ''?>">
	</div>
	<div class="form-group">
        <label class="control-label" for="selectError">Select Target Window</label><?php echo form_error('target_window'); ?>
		<span class="err" id="err_target_window"></span>
		<div class="controls">
            <select id="status" data-rel="chosen" name="target_window">
                <option value="<?=(isset($target_window) and $target_window == "") ? 'selected' : ''?>">Select Target Window</option>
				<option value="_self" <?=(isset($target_window) and $target_window == "_self") ? 'selected' : '_self'?>>Self</option>
				<option value="_blank" <?=(isset($target_window) and $target_window == "_blank") ? 'selected' : '_blank'?>>New Window</option>
				
				</select> 
         </div>
	 </div>
	 <div class="form-group">
        <label class="control-label" for="selectError">Select Template</label><?php echo form_error('template'); ?>
		<span class="err" id="err_target_window"></span>
		<div class="controls">
            <select id="status" data-rel="chosen" name="template">
			<option value="<?=(isset($template) and $template == "") ? 'selected' : ''?>"> Select Template</option>
			<?php foreach ($themes as $e_key){ ?>
                <? if ($e_key!='.' and $e_key!='..'){?>
                  <?	$extension = explode('.', $e_key);     ?>
                  <? if ($extension[1] == "php") { ?>
                    <option value="<?php echo $e_key ?>" <?=(isset($template) and $template == $e_key) ? 'selected' :  $e_key ?>><? echo $extension[0]; ?></option>
                  <? } ?>
				
				<?php	}?>
				<?php	}?>
				</select> 
         </div>
	 </div>
<div class="form-group">
		<label for="exampleInputFile"> <span class="err" style="font-size:18px">*</span> Add Banner Image</label><?php echo form_error('image'); ?>
		<span class="err" id="err_img"></span>
		
		<input type="file" id="exampleInputFile" name="image" value="<?=(isset($image)) ? $image : ''?>">
		<? if (isset($image) and file_exists("./".$image)) { ?>
			<a href="<?=base_url().$image?>" target="_blank">View File</a>
		<?
		}
		?>
	</div>
 
	
	
	<div class="form-group">
		<?
		if (isset($id))
		{
		?>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<?
		}
		?>
		<button type="submit" class="btn btn-default">Submit</button>
	</div>
</form>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
