<?php if ($page_section->media_element_id != "" and $page_section->media_element_id > 0) { ?>
  <?php $media_element = get_media_element($page_section->media_element_id); ?>
<?php } ?>
<div class="<?php echo (isset($page_section->section_class) and $page_section->section_class != "") ? $page_section->section_class : '' ?>" style="<?php echo (isset($page_section) and $page_section->media_element_id != "" and $page_section->media_element_id > 0) ? "background-image:url('".base_url()."/".$media_element['media']."');" : ""; ?>">
  <div class="container">
					<div class="row">
    <?php if ($page_section->show_title == 1) { ?>
      <div class="col-lg-12">
        <div class="page-title">
          <h2><?php echo $page_section->title ?></h2>
        </div>
      </div>
    <?php } ?>
    <?php echo show_content($page_section) ?>
    <?php if ($page_section->read_more_link_type != "none" && $page_section->read_more_link_type != "") { ?>
      <a href="<?php echo base_url().'/'.$page_section->read_more_link; ?>" class="readmore">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    <?php } ?>
  </div>
  </div>
</div>