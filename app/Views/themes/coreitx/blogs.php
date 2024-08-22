<?php echo  view('themes/'.$theme_name.'/header.php'); ?>

<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title mb-5">
          <h2>Blogs</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="blog-wrapper news-wrapper section-padding overflow-hidden mt-md-80">
    <div class="container">
        <div class="row">

            <?php foreach ($blogs_list as $blog) { ?>
            <div class="col-lg-4">
                <div class="progress-delivered-slider-section">
                    <div class="progress-delivered-slider">
                        <div class="item">
                            <div class="about-us">
                                <div class="about-us-img">
                                    <img src="<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>" alt="">
                                </div>
                                <div class="about-us-info">
                                    <span class="tag-date"> <?php echo (isset($category_names[$blog['category_id']])) ? $category_names[$blog['category_id']] : '' ?> |
                                        <time datetime="00Z" class="datetime"><?php echo date("M d, Y",strtotime($blog['publish_at'])); ?></time>
                                    </span>
                                    <div class="about-us-body">
                                        <h3><?php echo $blog['title']; ?></h3>
                                        <?php echo substr($blog['brief'],0,100); ?>
                                    </div>
                                    <a href="<?= base_url('/blog/'.$blog['slug'])?>" class="link-box oursolutions" data-log="<?php echo $blog['title']; ?>">
                                        <span class="card-view-content">
                                            <span class="arrow-btn" tabindex="-1">
                                                <span>Read More
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    
        <div class="page-nav-wrap mt-60 text-center mb-40">
            <?= $pager_links ?>
        </div> <!-- /.col-12 col-lg-12 --> 
    </div>
</section>

<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>