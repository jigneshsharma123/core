<div id="<?php echo (isset($page_section->section_id) and $page_section->section_id != "") ? $page_section->section_id : '' ?>" class="<?php echo (isset($page_section->section_class) and $page_section->section_class != "") ? $page_section->section_class : '' ?>" style="<?php echo (isset($page_section) and $page_section->media_element_id != "" and $page_section->media_element_id > 0) ? "background-image:url('".base_url().$page_section->media_element->media."');" : ""; ?>">
  <?php if ($page_section->show_title == 1) { ?>
  <h3><?php echo $page_section->title ?></h3>
  <?php } ?>
  <?php echo show_content($page_section) ?>
  <?php $inner_sections = get_sections($page_section); ?>

  <?php if (isset($inner_sections)) { ?>
  <?php $count = 1; ?>
    <?php foreach($inner_sections as $page_section) { ?>
      <div id="<?php echo (isset($page_section->section_id) and $page_section->section_id != "") ? $page_section->section_id : '' ?>" class="<?php echo (isset($page_section->section_class) and $page_section->section_class != "") ? $page_section->section_class : '' ?>" style="<?php echo (isset($page_section) and $page_section->media_element_id != "" and $page_section->media_element_id > 0) ? "background-image:url('".base_url().$page_section->media_element->media."');" : ""; ?>">
      <?php echo show_content($page_section) ?>
      </div>
    <?php } ?>
  </div>
  <?php } ?>
</div>

