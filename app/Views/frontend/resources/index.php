<?php echo  view('themes/'.$theme_name.'/header.php'); ?>


<section class="blog-wrapper news-wrapper section-padding overflow-hidden mt-md-80">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title mb-40">
                    <h1><span>Blogs</span></h1>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row blog-posts">
                    <?php foreach ($blogs_list as $blog) { ?>
                    <div class="single-blog-post col-lg-6">
                        <div class="post-featured-thumb bg-cover" style="background-image: url('<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>')"></div>
                        <div class="post-content">
                            <h2><a href="<?php echo base_url('blog/'.$blog['slug']); ?>"><?php echo $blog['title']; ?></a></h2>
                            <div class="post-meta">
                                <span><i class="fal fa-calendar-alt"></i><?php echo date("d F, Y",strtotime($blog['publish_at'])); ?></span>
                            </div>
                            <p><?php echo $blog['brief']; ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-30">
                                <div class="post-link">
                                    <a href="<?php echo base_url('blog/'.$blog['slug']); ?>"><i class="fal fa-arrow-right"></i> Read More</a>
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
        </div>
    </div>
</section>

<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>