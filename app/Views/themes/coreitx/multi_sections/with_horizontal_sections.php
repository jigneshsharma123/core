<div id="<?php echo (isset($page_section->section_id) and $page_section->section_id != "") ? $page_section->section_id : '' ?>" class="<?php echo (isset($page_section->section_class) and $page_section->section_class != "") ? $page_section->section_class : '' ?>" style="<?php echo (isset($page_section) and $page_section->media_element_id != "" and $page_section->media_element_id > 0) ? "background-image:url('".base_url()."/".$page_section->media_element->media."');" : ""; ?>">
  <div class="container"> 
    <div class="section-title">
      <?php if ($page_section->show_title == 1) { ?>
      <h3><?php echo $page_section->title ?></h3>
      <?php } ?>
      <?php echo show_content($page_section) ?>
    </div>
    <?php $inner_sections = get_sections($page_section); ?>

    <?php if (isset($inner_sections)) { ?>
    <?php $count = 1; ?>
    <div class="row">
      <?php foreach($inner_sections as $page_section) { ?>
        <?php //print_r($page_section); exit;?>
        <?php $featured_image_position = $page_section->featured_image_position;?>
        <?php if ($page_section->media_element_id != "" and $page_section->media_element_id > 0) { ?>
          <?php $media_element = get_media_element($page_section->media_element_id); ?>
        <?php } ?>
        <div id="<?php echo (isset($page_section->section_id) and $page_section->section_id != "") ? $page_section->section_id : '' ?>" class="<?php echo (isset($page_section->section_class) and $page_section->section_class != "") ? $page_section->section_class : '' ?>" style="<?php echo (isset($page_section) and $page_section->media_element_id != "" and $page_section->media_element_id > 0 and $featured_image_position == 'background') ? "background-image:url('".base_url()."/".$media_element['media']."');" : ""; ?>">
        <?php if ($featured_image_position == "before") { ?>
          <div class="thumb-img"><img src="<?php echo base_url()."/".$media_element['media']; ?>" class="animate"></div>
        <?php } ?>
        <?php if ($page_section->show_title == 1) { ?>
        <h4><?php echo $page_section->title ?></h4>
        <?php } ?>
        <?php echo show_content($page_section) ?>
        <?php if ($featured_image_position == "after") { ?>
          <div class="thumb-img"><img src="<?php echo base_url()."/".$media_element['media']; ?>" class="animate"></div>
        <?php } ?>
        </div>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
</div>

