<?php echo  view('themes/'.$theme_name.'/header.php'); ?>
<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="page-title mb-5">
          <h2><?php echo $blog['title']; ?></h2>
        </div>
                            <img src="<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>" alt="">
      </div>
    </div>
  </div>
</section>

<section class="blog-wrapper news-wrapper section-padding overflow-hidden mt-md-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-post-details border-wrap">
                    <div class="single-blog-post post-details">                            
                        <div class="post-content">
                            <div class="post-meta">
								<span class="tag-date"> <?php echo (isset($category_names[$blog['category_id']])) ? $category_names[$blog['category_id']] : '' ?> |
                                        <time datetime="00Z" class="datetime"><?php echo date("M d, Y",strtotime($blog['publish_at'])); ?></time>
                                    </span>
                            </div>
                            <?php echo $blog['blog_content']; ?>
                        </div>
                    </div>
                    <div class="row tag-share-wrap">
                        <div class="col-lg-6 col-12">
                            <br>
                            <br>
                            <br>
                        </div>
                        <hr>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title mb-5">
          <h2>Related Posts</h2>
        </div>
      </div>
    </div>

    <div class="related-post-wrap">
        <div class="row">
            <?php foreach($related_blogs as $blog) { ?>
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
    </div>
  </div>
</section>

<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>