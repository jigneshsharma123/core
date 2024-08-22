<?php $data['theme'] = $theme_name; ?>
<?php $data_header['meta'] = (isset($meta)) ? $meta : ''; ?>

<?php helper("application_helper"); ?>

<?php echo view('themes/coreitx/header.php'); ?>
<?php echo view('themes/coreitx/banner.php',$data_header) ?>


<?php if (!empty(strip_tags($page->page_content))) { ?>
        <?php echo $page->page_content; ?>
<?php } ?>


<?php echo view('themes/coreitx/footer.php'); ?>
