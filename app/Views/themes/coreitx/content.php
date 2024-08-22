<?php helper("application_helper"); ?>
<?php $data_header['theme'] = $theme_name; ?>
<?php $data_header['page_title'] = $page->title; ?>
<?php $data_header['media_element_id'] = $page->media_element_id; ?>
<?php $data_header['meta'] = (isset($meta)) ? $meta : ''; ?>
<?php echo view('themes/coreitx/header.php'); ?>
<?php echo view('themes/coreitx/banner.php',$data_header) ?>

<section class="section insights-events-wrap" id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title mb-5">
                    <h2><?php echo $page->title; ?></h2>
                </div>
            </div>
            <?php if (!empty(strip_tags($page->page_content))) { ?>
                    <?php echo $page->page_content; ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php echo view('themes/coreitx/footer.php'); ?>
