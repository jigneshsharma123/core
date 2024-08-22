<?php echo (isset($data) and isset($data->title)) ? '<h3 class="title">'.$data->title.'</h3>' : ''?>
<?php $socials = get_socials(); ?>
<ul class="footer-social">
  <?php foreach($socials as $social) { ?>
  <li><a href="<?php echo $social->url; ?>"><span class="ti-<?php echo $social->title; ?>"></span></a></li>
  <?php } ?>
</ul>
