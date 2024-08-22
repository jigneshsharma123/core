<section class="first-sec" id="Home">
	<section class="cloud-revamp-slider-wrapper cloud-main-banner">
		<section class="banner cloud-revamp-slider">
			<?php foreach ($banners as $banner) { ?>
			<?php if (isset($banner) && isset($banner['banner_position']) && $banner['banner_position'] == 'background') { ?>
				<div class="<?php echo (isset($banner) && isset($banner['banner_class'])) ? $banner['banner_class'] : 'cloud-slider-item slider-item4'; ?>" data-title="<?php echo (isset($banner) && $banner['slider_item_tag']) ? $banner['slider_item_tag'] : $banner['title']; ?>"  data-mode="<?php echo (isset($banner)) ? $banner['banner_theme'] : ''; ?>" style="background: url(<?= base_url('/uploads/banners/'.$banner['image'])?>) no-repeat;">
					<div class="cloud-slider-img mobile-view">
						<img alt="" class="img-fluid" src="<?= base_url('/uploads/banners/'.$banner['image'])?>" title="">
					</div>
					<div class="container">
						<div class="banner-info banner-info1">
							<h2 class="<?php echo (isset($banner) && isset($banner['title_class'])) ? $banner['title_class'] : ''; ?>">
								<?php echo (isset($banner)) ? $banner['title'] : ''; ?>
							</h2>
							<p class="<?php echo (isset($banner) && isset($banner['sub_title_class'])) ? $banner['sub_title_class'] : ''; ?>"><?php echo (isset($banner)) ? $banner['sub_title'] : ''; ?></p>
                            <?php if (isset($banner) && isset($banner['button_text']) && $banner['button_text'] != '') { ?>
							<a href="<?php echo (isset($banner)) ? $banner['button_link'] : ''; ?>" aria-label="" class="CTA-btn" href="#" tabindex="-1"><?php echo (isset($banner)) ? $banner['button_text'] : ''; ?></a>
                            <?php } ?>
						</div>
					</div>
				</div>
			<?php } else if (isset($banner) && isset($banner['banner_position']) && $banner['banner_position'] == 'left') { ?>
				<div class="<?php echo (isset($banner) && isset($banner['banner_class'])) ? $banner['banner_class'] : 'cloud-slider-item slider-item4'; ?>" data-title="<?php echo (isset($banner) && $banner['slider_item_tag']) ? $banner['slider_item_tag'] : $banner['title']; ?>"  data-mode="<?php echo (isset($banner)) ? $banner['banner_theme'] : ''; ?>">
					<div class="container">
						<div class="banner-flex">
							<div class="banner-img-wrapper-left">
								<?php if (isset($banner) && isset($banner['image']) && !empty($banner['image'])) { ?>
								<img src="<?= base_url('/uploads/banners/'.$banner['image'])?>">
								<?php } ?>
							</div>
							<div class="banner-content-wrapper">
								<div class="banner-info" style="float:right;">
									<h2 class="<?php echo (isset($banner) && isset($banner['title_class'])) ? $banner['title_class'] : ''; ?>">
										<?php echo (isset($banner)) ? $banner['title'] : ''; ?>
									</h2>
									<p class="<?php echo (isset($banner) && isset($banner['sub_title_class'])) ? $banner['sub_title_class'] : ''; ?>" style="float:right;text-align:right;"><?php echo (isset($banner)) ? $banner['sub_title'] : ''; ?></p>
                                    <?php if (isset($banner) && isset($banner['button_text']) && $banner['button_text'] != '') { ?>
									<a href="<?php echo (isset($banner)) ? $banner['button_link'] : ''; ?>" aria-label="" class="CTA-btn" href="#" tabindex="-1"><?php echo (isset($banner)) ? $banner['button_text'] : ''; ?></a>
                                    <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="<?php echo (isset($banner) && isset($banner['banner_class'])) ? $banner['banner_class'] : 'cloud-slider-item slider-item4'; ?>" data-title="<?php echo (isset($banner) && $banner['slider_item_tag']) ? $banner['slider_item_tag'] : $banner['title']; ?>"  data-mode="<?php echo (isset($banner)) ? $banner['banner_theme'] : ''; ?>">
					<div class="container">
						<div class="banner-flex">
							<div class="banner-content-wrapper">
								<div class="banner-info">
									<h2 class="<?php echo (isset($banner) && isset($banner['title_class'])) ? $banner['title_class'] : ''; ?>">
										<?php echo (isset($banner)) ? $banner['title'] : ''; ?>
									</h2>
									<p class="<?php echo (isset($banner) && isset($banner['sub_title_class'])) ? $banner['sub_title_class'] : ''; ?>"><?php echo (isset($banner)) ? $banner['sub_title'] : ''; ?></p>
                                    <?php if (isset($banner) && isset($banner['button_text']) && $banner['button_text'] != '') { ?>
									<a href="<?php echo (isset($banner)) ? $banner['button_link'] : ''; ?>" aria-label="" class="CTA-btn" href="#" tabindex="-1"><?php echo (isset($banner)) ? $banner['button_text'] : ''; ?></a>
                                    <?php } ?>
								</div>
							</div>
							<div class="banner-img-wrapper">
								<?php if (isset($banner) && isset($banner['image']) && !empty($banner['image'])) { ?>
								<img src="<?= base_url('/uploads/banners/'.$banner['image'])?>">
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php } ?>
		</section>
	</section>
</section>
