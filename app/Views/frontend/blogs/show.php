<?php echo  view('themes/'.$theme_name.'/header.php'); ?>

<?php helper("application_helper"); ?>
<section class="section insights-events-wrap" id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title mb-5">
                    <h2><?php echo $blog['title']; ?></h2>
                </div>
                <div>
                    <img src="<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>" alt="">
                </div>
            </div>
            <div class="col-12">
                <div class="progress-delivered-slider-section">
                    <div class="progress-delivered-slider about-us-slider">
                        <div class="item">
                            <div class="about-us">
                                <div class="about-us-info">
                                    <span class="tag-date">
                                        <time datetime="00Z" class="datetime"><?php echo date("F d, Y",strtotime($blog['publish_at'])); ?></time>
                                    </span>
                                    <div class="about-us-body">
                                        <p><?php echo $blog['blog_content']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="insights-events-wrap" id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title mb-5">
                    <h2>Related Blogs</h2>
                </div>
            </div>
            <?php foreach ($related_blogs as $blog) { ?>
            <div class="col-lg-6">
                <div class="progress-delivered-slider-section">
                    <div class="progress-delivered-slider about-us-slider">
                        <div class="item">
                            <div class="about-us">
                                <div class="about-us-img">
                                    <span class="trending-tag"><?php echo $blog['title']; ?></span>
                                    <img src="<?= base_url('/uploads/blogs/'.$blog['featured_image'])?>" alt="">
                                </div>
                                <div class="about-us-info">
                                    <span class="tag-date">
                                        <time datetime="00Z" class="datetime"><?php echo date("F d, Y",strtotime($blog['publish_at'])); ?></time>
                                    </span>
                                    <div class="about-us-body">
                                        <p><?php echo $blog['brief']; ?></p>
                                    </div>
                                    <a href="<?php echo base_url('blog/'.$blog['slug']); ?>" class="link-box oursolutions" data-log="<?php echo $blog['title']; ?>">
                                        <span class="card-view-content">
                                            <span class="arrow-btn" tabindex="-1">
                                                <span>Read more
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
</section>

<?php echo  view('themes/'.$theme_name.'/footer.php'); ?>
