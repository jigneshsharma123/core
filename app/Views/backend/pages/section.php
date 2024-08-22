<div class="x_panel">
<div class="row">
  <label class="control-label col-md-10">SECTION <?php echo $section; ?></label>
  <div class="col-md-2">
    <a href="javascript:void(0)" class="btn btn-danger btn-sm removesection pull-right"><i class="fa fa-remove"></i></a> 
    <?php if (isset($page_section) and isset($page_section['id'])) { ?>
    <a href="<?php echo base_url();?>/admin/pages/edit/<?php echo $page_section['id']; ?>" target="_blank" class="btn btn-success btn-sm pull-right"><i class="fa fa-edit"></i></a>
    <?php } ?>    
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label>Section ID</label>
    <input type="text" class="form-control" name="section_id[<?php echo $section; ?>]" id="section_id_<?php echo $section; ?>" value="<?php echo (isset($page_section) and isset($page_section['section_id'])) ? $page_section['section_id'] : ''; ?>">
    <input type="hidden" class="form-control" name="sid[<?php echo $section; ?>]" id="sid_<?php echo $section; ?>" value="<?php echo (isset($page_section) and isset($page_section['id'])) ? $page_section['id'] : ''; ?>">
  </div>
  <div class="col-md-4">
    <label>Section Title</label>
    <input type="text" class="form-control" name="section_title[<?php echo $section; ?>]" id="section_name_<?php echo $section; ?>" value="<?php echo (isset($page_section) and isset($page_section['title'])) ? $page_section['title'] : ''; ?>">
    <input type="checkbox" name="show_title[<?php echo $section; ?>]" value="1" <?php echo (isset($page_section) and isset($page_section['show_title']) and $page_section['show_title'] == 1) ? 'checked' : ''; ?>> Show Title
  </div>
  <div class="col-md-5">
    <label>Section Class</label>
    <input type="text" class="form-control section" name="section_class[<?php echo $section; ?>]" value="<?php echo (isset($page_section) and isset($page_section['section_class'])) ? $page_section['section_class'] : ''; ?>">
    <input type="checkbox" name="padding_class[<?php echo $section; ?>]" value="1" <?php echo (isset($page_section) and isset($page_section['padding_class']) and $page_section['padding_class'] == 1) ? 'checked' : ''; ?>> Include Section Padding
  </div>
</div>
<div class="row">
  <!-- 
  <div class="col-md-1">
    <input type="text" class="form-control my-colorpicker1 colorpicker-element section" name="background_color[<?php echo $section; ?>]" value="<?php echo (isset($page_section) and isset($page_section->join_background_color)) ? $page_section->join_background_color : ''; ?>">
  </div>
  <div class="col-md-1">
    <input type="text" class="form-control section" name="text_color[<?php echo $section; ?>]" value="<?php echo (isset($page_section) and isset($page_section->join_text_color)) ? $page_section->join_text_color : ''; ?>">
  </div>
  <div class="col-md-1">
    <input type="text" class="form-control section" name="heading_color[<?php echo $section; ?>]" value="<?php echo (isset($page_section) and isset($page_section->join_heading_color)) ? $page_section->join_heading_color : ''; ?>">
  </div> -->
  <div class="col-md-3">
    <label>Sort Order</label>
    <input type="text" class="form-control" name="sort_order[<?php echo $section; ?>]" value="<?php echo (isset($page_section) and isset($page_section['sort_order'])) ? $page_section['sort_order'] : ''; ?>">
  </div>
  <div class="col-md-4">
    <label>Section Template</label>
    <select class="form-control section" name="featured_image_position[<?php echo $section; ?>]">
      <option value="">None</option>
      <?php foreach($theme_multi_sections as $theme_multi_section_key=>$theme_multi_section_detail) { ?>
      <option value="<?php echo $theme_multi_section_key; ?>" <?php echo (isset($page_section) and isset($page_section['featured_image_position']) and $page_section['featured_image_position'] == $theme_multi_section_key) ? 'selected' : ''; ?>><?php echo $theme_multi_section_detail['name']; ?></option>
      <?php } ?>
    </select>
  </div>
  <div class="col-md-5">
    <label>Read More Link</label>
    <select class="form-control section read_more_link_type" name="read_more_link_type[<?php echo $section; ?>]">
      <option value="none" <?php echo (isset($page_section) and isset($page_section['read_more_link_type']) and $page_section['read_more_link_type'] == 'none') ? 'selected' : ''; ?>>None</option>
      <option value="self" <?php echo (isset($page_section) and isset($page_section['read_more_link_type']) and $page_section['read_more_link_type'] == 'self') ? 'selected' : ''; ?>>Self</option>
      <option value="internal" <?php echo (isset($page_section) and isset($page_section['read_more_link_type']) and $page_section['read_more_link_type'] == 'internal') ? 'selected' : ''; ?>>Internal</option>
      <option value="external" <?php echo (isset($page_section) and isset($page_section['read_more_link_type']) and $page_section['read_more_link_type'] == 'external') ? 'selected' : ''; ?>>External</option>
    </select>
    <input type="text" class="form-control section" style="display:<?php echo (isset($page_section) and isset($page_section['read_more_link']) and ($page_section['read_more_link'] != "")) ? 'block' : 'none'; ?>;" name="read_more_link[<?php echo $section; ?>]" value="<?php echo (isset($page_section) and isset($page_section['read_more_link'])) ? $page_section['read_more_link'] : ''; ?>">
  </div>
  <script>
  $("#section_name_<?php echo $section; ?>").autocomplete({
    source: "<?php echo base_url();?>/admin/pages/get_page", // path to the get_author method
    minLength: 2,
    select: function( event, ui ) {
      $("#sid_<?php echo $section; ?>").val(ui.item.id)
    }
  });
  </script>
</div>
</div>
