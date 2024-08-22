<?php echo  view('themes/'.$theme_name.'/header.php'); ?>

<section class="blog-wrapper news-wrapper section-padding overflow-hidden mt-md-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-post-details border-wrap">
                    <div class="single-blog-post post-details">                            
                        <div class="post-content">
                            <h2><?php echo $blog['title']; ?></h2>
                            <div class="post-meta">
                                <span><i class="fal fa-calendar-alt"></i><?php echo date("d F, Y",strtotime($blog['publish_at'])); ?></span>
                            </div>
                            <img src="<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>" alt="">
                            <?php echo $blog['blog_content']; ?>
                        </div>
                    </div>
                    <div class="row tag-share-wrap">
                        <div class="col-lg-6 col-12">
                        </div>
                        <div class="col-lg-6 col-12 text-lg-right">
                            <h4>Social Share</h4>
                            <div class="social-share">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>                                    
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="related-post-wrap">
                        <h3>Related Post</h3>

                        <div class="row">
                            <?php foreach($related_blogs as $blog) { ?>
                            <div class="col-md-6 col-12">
                                <div class="single-related-post">
                                    <div class="featured-thumb bg-cover" style="background-image: url('<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>')"></div>
                                    <div class="post-content">
                                        <div class="post-date">
                                            <span><i class="fal fa-calendar-alt"></i><?php echo date("d F, Y",strtotime($blog['publish_at'])); ?></span>
                                        </div>
                                        <h4><a href="<?php echo base_url('blog/'.$blog['slug']); ?>"><?php echo $blog['title']; ?></h4>
                                        <p><?php echo $blog['brief']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>


<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>