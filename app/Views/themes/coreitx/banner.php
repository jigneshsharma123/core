<?php if (isset($media_element_id)) { $media = get_media_element($media_element_id); } ?>
<section class="first-sec about-bg" id="Home">
	<div class="container">
			<div class="all-banner">
				<div class="all-banner-content-wrapper">
					<div class="all-banner-info">
						<h2><?php echo (isset($banners) && isset($banners[0])) ? $banners[0]['title'] : $page_title; ?></h2>
						<p><?php echo (isset($banners) && isset($banners[0])) ? $banners[0]['sub_title'] : ''; ?></p>
						<?php if (isset($banners) && isset($banners[0]) && isset($banners[0]['button_text']) && isset($banners[0]['button_link']) && isset($banners[0]['button_link_target']) && !empty($banners[0]['button_text']) && !empty($banners[0]['button_link']) && !empty($banners[0]['button_link_target'])) { ?>
						<a aria-label="<?php echo (isset($banners) && isset($banners[0])) ? $banners[0]['title'] : ''; ?>" class="CTA-btn" href="<?php echo (isset($banners) && isset($banners[0])) ? $banners[0]['button_link'] : ''; ?>" tabindex="-1" target=<?php echo (isset($banners) && isset($banners[0])) ? $banners[0]['button_link_target'] : ''; ?>><?php echo (isset($banners) && isset($banners[0])) ? $banners[0]['button_text'] : ''; ?></a>
						<?php } ?>
					</div>
				</div>
				<div class="banner-img-wrapper">
					<?php if (isset($banners) && isset($banners[0]) && isset($banners[0]['image']) && !empty($banners[0]['image'])) { ?>
					<img src="<?= base_url('/uploads/banners/'.$banners[0]['image'])?>">
					<?php } else if (isset($media) && !empty($media)) { ?>
					<img src="<?= base_url($media['media']); ?>">
					<?php } else { ?>
					<img src="<?= base_url(); ?>/assets/coreitx/images/audit-services-banner-img.png" alt="">
					<?php } ?>
				</div>
			</div>
		</div>
</section>