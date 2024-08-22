<section class="section" id="">
  <div class="container">
    <div class="view-content row">
        <?php foreach($partners as $partner) { ?>
        <div class="views-row">
          <div class="partner-logo-item"><?php echo show_image('partner',$partner,'image','',"",'name'); ?> </div>
        </div>
        <?php } ?>
    </div>
  </div>
</section>