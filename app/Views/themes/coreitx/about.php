<?php $data['theme'] = $theme_name; ?>
<?php $data_header['meta'] = (isset($meta)) ? $meta : ''; ?>

<?php helper("application_helper"); ?>

<?php echo view('themes/coreitx/header.php'); ?>
<?php echo view('themes/coreitx/banner.php',$data_header) ?>

        <!-- ABOUT
        ================================================== -->
<section class="section about-company-bg" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-title mb-5">
								<h2>About Company</h2>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="justify-text">
								<p>Since its establishment in 1990, CoreIT Services has remained a steadfast entity in the ever-changing world of IT. Our dedication to progression and innovation earmarks us as a trustworthy ally for businesses needing advanced solutions. We offer a wide array of services, from efficient cloud-based solutions and strong IT infrastructure management to strategic consulting, secure hosting, cybersecurity audits, and custom application development. We effortlessly traverse the constantly shifting technology landscape. What sets us apart is our diverse offerings and our unwavering commitment to stay at the forefront, working closely with our global clientele, and delivering unparalleled quality through our highly skilled and certified team. Discover our range of services and partner with us to sculpt the future of technology.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="it-services-flex">
								<div class="it-services-left">
									<div class="it-services-left-item">
									  <div class="it-services-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/vission-icon.png" alt=""/></div>
									  <h2 class="vission">Our Vission</h2>
										<p>Helping clients to utilize time in the market and enhance ROI from their IT implementations.</p>
									</div>
									<div class="it-services-left-item">
										<div class="it-services-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/mission-icon.png" alt=""/></div>
									  <h2 class="mission">Our Mission</h2>
										<p>To provide competitive edge by optimizing technology &amp; delivering high grades of trust, agility, flexibility and skills in each engagement.</p>
									</div>
								</div>
								<div class="it-services-img"><img src="<?= base_url(); ?>/assets/coreitx/images/it-services.png" alt=""/></div>
								<div class="it-services-right">
									<div class="it-services-right-item">
										<div class="it-services-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/endeavor-icon.png" alt=""/></div>
									  <h2 class="endeavor">Our Endeavor</h2>
										<p>To form everlasting relationships with our clients, prioritizing trust over transactions, creating business values, reducing implementation risk and accelerates speed-to-market.</p>
									</div>
									<div class="it-services-right-item">
										<div class="it-services-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/strategy-icon.png" alt=""/></div>
									  <h2 class="strategy">Our Strategy</h2>
										<p>We acknowledge nurturing relationships and surpass our responsibilities to steer growth for our clients</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!------------------------------------------------------------------Why Choose Us------------------------------------------------------------------->
			<section class="section bg-gray" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-title">
								<h2>Why Choose Us</h2>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="justify-text">
								<p>Select CoreITX for unparalleled IT solutions. Merging cutting-edge technology with a commitment to compliance, we optimize technology, ensuring trust, agility, flexibility, and skills in every engagement. With a three-decade track record, we empower enterprises globally.</p>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="award-card">
                              <div class="award-card-header"><img alt="Collaborative Approach" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/collaborative-approach-icon.png" title="Collaborative Approach"></div>
                              <div class="award-card-title"> <h6>Collaborative Approach</h6></div>
                              <div class="award-body">
                                <p>Strategic partnerships for innovative solutions and shared success.</p>
                              </div>
                            </div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="award-card">
                              <div class="award-card-header"><img alt="Experience & Expertise" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/experience-expertise-icon.png" title="Experience & Expertise"></div>
                              <div class="award-card-title"> <h6>Experience &amp; Expertise</h6></div>
                              <div class="award-body">
                                <p>Decades of seasoned proficiency driving tailored, cutting-edge IT solutions.</p>
                              </div>
                            </div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="award-card">
                              <div class="award-card-header"><img alt="Accountability & Ownership" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/accountability-ownership-icon.png" title="Accountability & Ownership"></div>
                              <div class="award-card-title"> <h6>Accountability &amp; Ownership</h6></div>
                              <div class="award-body">
                                <p>Dedicated commitment to delivering excellence with utmost responsibility.</p>
                              </div>
                            </div>
						</div>
					</div>
				</div>
			</section>
			
			<!------------------------------------------------------------------Trusted by Global Compaines------------------------------------------------------------------->
			<section class="section" id="">
				<div class="container">
					<div class="view-content row">
					  <div class="views-row">
							<div class="partner-logo-item"><img src="<?= base_url(); ?>/assets/coreitx/images/global-compaines-icon1.jpg" alt=""/> </div>
					  </div>
					  <div class="views-row">
							<div class="partner-logo-item"><img src="<?= base_url(); ?>/assets/coreitx/images/global-compaines-icon2.jpg" alt=""/> </div>
					  </div>
					  <div class="views-row">
							<div class="partner-logo-item"><img src="<?= base_url(); ?>/assets/coreitx/images/global-compaines-icon3.jpg" alt=""/> </div>
					  </div>
					  <div class="views-row">
							<div class="partner-logo-item"><img src="<?= base_url(); ?>/assets/coreitx/images/global-compaines-icon4.jpg" alt=""/> </div>
					  </div>
					  <div class="views-row">
							<div class="partner-logo-item"><img src="<?= base_url(); ?>/assets/coreitx/images/global-compaines-icon5.jpg" alt=""/> </div>
					  </div>
					</div>
				</div>
			</section>
			
			<!------------------------------------------------------------------Sign Up To Get Latest Updates------------------------------------------------------------------->
			<section class="section latest-updates" id="">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-6">
								<h3>Sign Up To Get Latest Updates</h3>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="wrap">
							   <div class="search">
								  <input type="text" class="searchTerm form-control" placeholder="Enter your email..."  aria-describedby="button-addon1" >
								  <button type="submit" class="searchButton">Subscribe</button>
							   </div>
							</div>
						</div>
					</div>
				</div>
			</section>
		

<?php echo view('themes/coreitx/footer.php'); ?>

