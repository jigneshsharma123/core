<?=  view('themes/henagon/header.php'); ?>

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section2 top-position1 bg-img cover-background text-start" data-background="<?= base_url(); ?>/assets/henagon/img/bg/bg-advisory.jpg">
            <div class="container">

                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7 col-xxl-5">
                        <h1 class="mb-0 text-shadow-large">Advisory Board</h1>
                    </div>
                </div>

            </div>
        </section>

        <!-- TEAM
        ================================================== -->
        <section class="pt-17 pt-xxl-20">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-11">
                        <div class="bg-white border-radius-10 box-shadow-large pt-0 p-1-6 p-lg-1-9 p-xxl-6 mb-1-9 mb-lg-6">
                            <div class="row">
                                <div class="col-lg-6 mb-1-9 mb-lg-0 position-relative wow fadeIn" data-wow-delay="200ms">
                                    <div>
                                        <img src="<?= base_url('/uploads/profiles/'.$profile_detail['profile_photo'])?>" class="border-radius-10 mt-n5" alt="<?php echo $profile_detail['first_name']; ?> <?php echo $profile_detail['middle_name']; ?> <?php echo $profile_detail['last_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeIn position-relative" data-wow-delay="400ms">
                                    <div class="pt-lg-1-9 pt-xxl-6 ps-lg-1-6 ps-xxl-6">
                                        <h2 class="mb-3 mb-xl-4"><?php echo $profile_detail['first_name']; ?> <?php echo $profile_detail['middle_name']; ?> <?php echo $profile_detail['last_name']; ?></h2>
                                        <p><?php echo $profile_detail['profile_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>

       <?=  view('themes/henagon/footer.php'); ?> 
