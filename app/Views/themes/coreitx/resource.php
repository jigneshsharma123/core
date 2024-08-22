<?php echo  view('themes/'.$theme_name.'/header.php'); ?>
<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-title mb-5">
          <h2><?php echo $blog['title']; ?></h2>
        </div>
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
                                <span><i class="fal fa-calendar-alt"></i><?php echo date("d F, Y",strtotime($blog['publish_date'])); ?></span>
                            </div>
                            <img src="<?= base_url('/uploads/blogs/'.$blog['image'])?>" alt="">
                            <?php echo $blog['brief']; ?>
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
            <div class="col-md-6 col-12">
                <div class="single-related-post">
                    <div class="featured-thumb bg-cover" style="background-image: url('<?= base_url('/uploads/blogs/'.$blog['image'])?>')"></div>
                    <div class="post-content">
                        <div class="post-date">
                            <span><i class="fal fa-calendar-alt"></i><?php echo date("d F, Y",strtotime($blog['publish_date'])); ?></span>
                        </div>
                        <h4><a href="<?php echo base_url('blog/'.$blog['slug']); ?>"><?php echo $blog['title']; ?></a></h4>
                        <p><?php echo $blog['brief']; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
  </div>
</section>

<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>