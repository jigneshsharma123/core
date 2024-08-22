<?php $data['theme'] = $theme_name; ?>
<?php $data_header['page_title'] = $page_title; ?>

<?php helper("application_helper"); ?>

<?php echo view('themes/coreitx/header.php'); ?>
<?php echo view('themes/coreitx/banner.php',$data_header) ?>


<!------------------------------------------------------------------Overview------------------------------------------------------------------->
<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
	<div class="page-title mb-5">
	  <h2>Overview</h2>
	</div>
      </div>
      <div class="col-lg-12">
	<div class="justify-text">
          <?php echo $service_detail['overview']; ?>
	</div>
      </div>
    </div>
  </div>
</section>

<?php if (count($child_services) > 0) { ?>
<!------------------------------------------------------------------Our Offereings------------------------------------------------------------------->
<section class="section services-bg" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
	<div class="page-title">
	  <h2>Our Offerings</h2>
	</div>
      </div>
      
    </div>
    <div class="audit-content row">
	<?php foreach($child_services as $child_service) { ?>
	<div class="audit-row">
	  <div class="card">
	    <div class="newsroom-header">
	      <div class="newsroom-title"><?php echo $child_service['name']; ?></div>
	      <?php if ($child_service['image'] != '') { ?>
	      <div><img src="<?= base_url('/uploads/services/'.$child_service['image'])?>" alt=""/></div>
	      <?php } ?>
	    </div>
	    <div class="newsroom-body">
	      <?php echo get_first_paragraph($child_service['overview']); ?>
	    </div>
	  </div>
	</div>
	<?php } ?>
      </div>
  </div>
</section>
<?php } ?>

<!------------------------------------------------------------------RESOURCES------------------------------------------------------------------->
<!--
<section class="section resources-bg2" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
	  <div class="resources-flex2">
	     <div class="resources-bx2">
	      <div class="resources-title2">RESOURCES</div>
		 <h2>Get a copy of our brochure  on <span>Technology solution &amp; Cloud Services</span></h2>
		 <a href="#" class="download-btn1">Download</a>
	    </div>
	    <div class="resources-brochure2"><img src="images/brochure2.png" alt=""/></div>
	</div>
      </div>
      
    </div>
  </div>
</section>
-->
<!------------------------------------------------------------------How to Choose CoreIT------------------------------------------------------------------->
<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
	<div class="page-title">
	  <h2>How to Choose CoreIT</h2>
	</div>
      </div>
      <div class="col-lg-12">
	<div class="big-p" style="max-width: 870px;">
	  <p>With expertise in Digital, Engineering and Cloud, we deliver solutions that fulfill the traditional, transformational and future needs of clients across the globe.</p>
	</div>
      </div>
      <div class="col-lg-12">
	<div class="choose-group-btn">
	  
	  <a href="<?php echo base_url('contact-us'); ?>" class="choose-arrow-btn-blue">Contact Us</a>
	</div>
      </div>
    </div>
  </div>
</section>

<?php if (count($faqs) > 0) { ?>
<section class="section" id="">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
	<div class="page-title">
	  <h2>FAQs</h2>
	</div>
      </div>
      
      <div class="col-lg-12">
	<div class="faq">
	  <div class="accordion" id="servicefaq">
	    <?php $show = 'show'; foreach($faqs as $faq) { ?>
	      <div class="accordion-item">
	      <h2 class="accordion-header" id="headingOne">
		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $faq['id']; ?>" aria-expanded="true" aria-controls="faq<?php echo $faq['id']; ?>">
		<?php echo $faq['question']; ?>
		</button>
	      </h2>
	      <div id="faq<?php echo $faq['id']; ?>" class="accordion-collapse collapse <?php echo $show; ?>" aria-labelledby="headingOne" data-bs-parent="#servicefaq">
		<div class="accordion-body">
		<?php echo $faq['answer']; ?>
		</div>
	      </div>
	      </div>
	    <?php  $show = ''; } ?>
	  </div>
	</div>
      </div>
    </div>
  </div>
</section>
<?php } ?>


<?php echo view('themes/coreitx/footer.php'); ?>
