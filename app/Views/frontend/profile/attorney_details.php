<?=  view('themes/oldmancooley/header.php'); ?>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Attorney Profiles</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="<?php echo base_url(); ?>">Home</a> / <span>Attorney Profiles</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="parallax-section">
  <div class="container">
    <div class="attorneytop">
      <div class="row">
        <div class="col-md-4 col-xs-12"><img src="<?= base_url('/uploads/profiles/'.$profile_detail['profile_photo'])?>" class="lawimg" alt="" /></div>
        <div class="col-md-8 col-xs-12">
          <h2><?php echo $profile_detail['first_name']; ?> <?php echo $profile_detail['middle_name']; ?> <?php echo $profile_detail['last_name']; ?></h2>
          <h3>Practice areas</h3>
          <div class="scrollbar" id="style-3">
          <p class="force-overflow"><?php echo $profile_detail['brief']; ?> <br> <?php echo $profile_detail['profile_description']; ?></p>
          <!-- <ul class="address">
            <li><i class="fa fa-phone"></i><?php echo $profile_detail['phone_number']; ?></li>
            <li><i class="fa fa-envelope-o"></i><a href="mailto:mfapanius@oclslaw.com?Subject=Hello%20from%20website"><?php echo $profile_detail['email_id']; ?></a></li>
			  <li><i class="fa fa-download"></i><a href="#">Download Vcard</a></li>
            <li><i class="fa fa-print"></i><a href="#">Print, PDF</a></li>
          </ul> -->
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="attorneydetail">
      <h1>Practice areas</h1>
      <p><?php //echo $profile_detail['profile_description']; ?></p>
     
    </div> -->
  </div>
</div>
<?=  view('themes/oldmancooley/footer.php'); ?>

