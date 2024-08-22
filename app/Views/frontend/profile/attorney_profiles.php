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
    <div class="row"> 
      <!-- team 1 -->
      <?php foreach ($profile_list as $p_key){
     ?>
      <div class="col-md-3 col-sm-6 " >
        <div class="team-thumb">
        <div class="card h-100">
          <div class="thumb-image"><img src="<?= base_url('/uploads/profiles/'.$p_key['profile_photo'])?>" class="animate" alt="" width="20px" ></div>
          <h4><a href="<?php echo base_url(); ?>/attorney_details/<?php echo $p_key['slug']; ?>"><?php echo $p_key['first_name']; ?> <?php echo $p_key['middle_name']; ?> <?php echo $p_key['last_name']; ?></a></h4>
          <p><strong>Practice areas</strong>:<?php echo $p_key['brief']; ?> <br> </p>
          <!-- <ul class="">
            <li><i class="fa fa-phone"></i><?php echo $p_key['phone_number']; ?></li>
            <li><i class="fa fa-envelope-o"></i><a href="#"><?php echo $p_key['email_id']; ?></a></li> 
          </ul> -->
        </div> </div>
      </div>
      <?php }?>
    </div>
  </div>
</div>

<?=  view('themes/oldmancooley/footer.php'); ?>
