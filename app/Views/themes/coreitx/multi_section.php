<?php $data['theme'] = $theme_name; ?>
<?php $data_header['meta'] = (isset($meta)) ? $meta : ''; ?>

<?php helper("application_helper"); ?>

<?php echo view('themes/coreitx/header.php'); ?>
<?php if (count($banners) > 0) { ?>
<?php echo view('themes/coreitx/banner_slider.php',$data_header) ?>
<?php } else {?>
<?php echo view('themes/coreitx/banner.php',$data_header) ?>
<?php } ?>

<?php if (!empty(strip_tags($page->page_content))) { ?>
  <?php echo show_page_content($page) ?>
<?php } ?>

<?php if (isset($relatedpage)) { ?>
<?php $count = 1; ?>
<?php foreach($relatedpage as $page_section) { ?>           
        <?php if ($page_section->featured_image_position == "") { ?>
          <?php echo show_content($page_section) ?>
        <?php $count = $count + 1; ?>
        <?php } else { ?>
          <?php $data['page_section'] = $page_section; ?>
          <?php //echo show_content($page_section) ?>
          <?php //echo $page_section->featured_image_position; ?>
          <?php //echo 'themes/'.$theme_name.'/multi_sections/'.$theme_multi_sections[$page_section->featured_image_position]['file']; ?>
          <?php echo view('themes/'.$theme_name.'/multi_sections/'.$theme_multi_sections[$page_section->featured_image_position]['file'],$data); ?>
        <?php } ?>
          
<?php } ?>
<?php } ?>
  <!--  <div id="page" class="page">
      Start section about-->


<?php echo view('themes/coreitx/footer.php'); ?>
