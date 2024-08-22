<?php echo  view('themes/'.$theme_name.'/header.php'); ?>

<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title mb-5">
          <h2><?php echo plural($page_title); ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>


<?php foreach ($resources_list as $resource) { ?>
<section class="section resources-bg" id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="resources-flex">
                    <div class="resources-bx">
                        <div class="resources-title"><?php echo $category_names[$resource['category_id']]; ?></div>
                        <h2><?php echo $resource['title']; ?></h2>
                        <?php echo $resource['brief']; ?><br>
                            <a href="<?= base_url('/uploads/resources/'.$resource['attachment'])?>" target="_blank" class="download-btn1" contenteditable="false" style="cursor: pointer;">Download</a>
                    </div>
                    <div class="resources-brochure2"><img src="<?= base_url('/uploads/resources/'.$resource['image'])?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>