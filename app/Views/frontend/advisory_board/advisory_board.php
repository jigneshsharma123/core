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

        <!-- SERVICES
        ================================================== -->
        <section class="bg-light">
            <div class="container position-relative z-index-1">
                <div class="title-style2 text-center mb-2-3 mb-md-6">
                    <h2 class="h1 mb-0">Advisory Board Members</h2>
                </div>
                <div class="row mt-n1-9">
                <?php foreach ($profileManagement_list as  $p_key) { ?>
                    
               
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="200ms">
                        <div class="card card-style10 border-0 border-radius-10 ms-4">
                            <div class="position-relative">
                                <img src="<?= base_url('/uploads/profiles/'.$p_key['profile_photo'])?>" alt="...">
                            </div>
                            <div class="card-heading position-relative">
                                <h3 class="h5 mb-0 text-white"><a href="<?= base_url(); ?>/advisory-board-member/<?= $p_key['id'];  ?>"><?php echo $p_key['first_name']; ?> <?php echo $p_key['middle_name']; ?> <?php echo $p_key['last_name']; ?></a></h3>
                            </div>
                            <div class="card-body p-1-9">
                                <p class="mb-3"><?php echo $p_key['brief']; ?></p>
                                <a href="<?= base_url(); ?>/advisory-board-member/<?= $p_key['id'];  ?>" class="text-primary-hover font-weight-600">Read more</a>
                            </div>
                        </div>
                    </div> <?php  } ?>
                    
                </div>
            </div>
            <div class="round-shape-one top-n10 left-90"></div>
            <div class="ani-left-right light-title text-white opacity1 left bottom-n10 bottom-xl-n15 alt-font d-none d-lg-block z-index-0 wow fadeIn" data-wow-delay="200ms">services</div>
        </section>
     <?=  view('themes/henagon/footer.php'); ?> 
        

       
