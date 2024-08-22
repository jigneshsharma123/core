<?php
$latest_resources = get_latest_resources();
$latest_blogs = get_latest_blogs();
?>
<section class="section insights-events-wrap" id="">
    <div class="container">
        <div class="row">
        <?php if (isset($page_section) && $page_section->show_title == 1) { ?>
            <div class="col-lg-12">
                <div class="page-title">
                    <h2><?php echo $page_section->title ?></h2>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-lg-12">
                <div class="page-title mb-5">
                  <h2>Featured Trends and Insights</h2>
                </div>
            </div>
        <?php } ?>
            <div class="col-lg-8">
                <div class="progress-delivered-slider-section">
                    <div class="progress-delivered-slider about-us-slider">
                        <?php foreach ($latest_resources as $latest_resource) { ?>
                        <div class="item">
                            <div class="about-us">
                                <div class="about-us-img">
                                    <span class="trending-tag"><?php echo $latest_resource['title']; ?></span>
                                    <img src="<?= base_url('/uploads/resources/'.$latest_resource['image'])?>" alt="">
                                </div>
                                <div class="about-us-info">
                                    <span class="tag-date"><?php echo $latest_resource['category']; ?> |
                                        <time datetime="00Z" class="datetime"><?php echo date("M d, Y",strtotime($latest_resource['publish_at'])); ?></time>
                                    </span>
                                    <div class="about-us-body">
                                        <?php echo substr($latest_resource['brief'],0,100); ?>
                                    </div>
                                    <a href="<?= base_url('/uploads/resources/'.$latest_resource['attachment'])?>" class="link-box oursolutions" data-log="<?php echo $latest_resource['title']; ?>" target="_blank">
                                        <span class="card-view-content">
                                            <span class="arrow-btn" tabindex="-1">
                                                <span>Download
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="events-section">
                    <?php foreach ($latest_blogs as $latest_blog) { ?>
                    <div class="events-section-item">
                        <a aria-label="<?php echo $latest_blog['title'];?>" class="link-box text-hide" href="<?php echo base_url('/blog/'.$latest_blog['slug']);?>"></a>
                        <div class="events-box">
                            <span>Blog</span>
                            <div class="events-date-info">
                                <div class="events-date"><?php echo date("M d, Y",strtotime($latest_blog['publish_at'])); ?></div>
                                <div class="events-category"><?php echo $latest_blog['category'];?></div>
                            </div>
                            <h4><?php echo $latest_blog['title'];?></h4>
                            <div class="events-item-footer">
                                <div class="arrow-btn arrow-btn-light-blue">
                                    <span>Learn more</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <div class="btn-row">
                    <a aria-label="Explore more" class="see-all-btn see-all-btn-dark" href="<?php echo base_url('/blogs'); ?>">Explore more</a>
                </div>
            </div>
        </div>
    </div>
</section>
