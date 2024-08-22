<div class="row">
  <div class="fullimg">
    <ul class="profile_slider">
      <!-- Client -->
      <?php foreach($profiles as $profile) { ?>
      <li class="item">
        <?php echo show_image('profile',$profile,'profile_photo', '', '', '', '', ''); ?>
        <?php //echo get_image_url('profile',$profile,'profile_photo', '', ''); ?>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>
