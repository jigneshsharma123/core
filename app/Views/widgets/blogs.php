<?php $blogs = get_blogs($data->count); ?>
<div class="widget">
  <div class="footer-popular-post ">
    <h5>Popular Post</h5>
    <?php foreach($blogs as $blog) { ?>
    <div class="footer-popular-single-post d-flex">
      <div class="single-post-img">
        <a href="<?php echo base_url()?>blogs/<?php echo $blog->slug?>">
          <?php echo show_image($blog,'featured_image',"thumb","title", "80", "80"); ?>
        </a>
      </div>
      <div class="popular-post-title">
        <a href="<?php echo base_url()?>blogs/<?php echo $blog->slug?>">
          <h6><?php echo $blog->title; ?></h6>
        </a>
        <p><?php echo date("F d, Y",strtotime($blog->publish_at)); ?></p>
      </div>
    </div>
    <?php } ?>
  </div> 
</div> 
