

<div class="vertical-center">
  <div class="container">
    <div class="row resourse_block_row">
      <?php foreach($blogs as $blog) { ?>
      <div class="col-sm-3 resource_text_block">
        <p style="    word-spacing: 4px;    letter-spacing: 2px;    font-weight: 300;"><?php echo date("j F Y",strtotime($blog->publish_at)); ?></p>
        <h3 style="    font-weight: 400;    word-spacing: 5px;    letter-spacing: 2px;    line-height: inherit;    padding-bottom: 36px;"><?php echo $blog->title; ?></h3>
        <p style="height: 240px;font-weight: 400;"><?php echo $blog->brief; ?></p>
        <div style="height: 1px;background-color: #ffaa00" ></div>
        <a href="<?php echo base_url()?>blogs/<?php echo $blog->slug?>" style="padding: 10px 0px;font-size: 12px;color:#FFFFFF">READ FULL BLOG</a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
