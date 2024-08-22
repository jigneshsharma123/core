

<?php $data['theme'] = $theme_name; ?>
<?php $data_header['meta'] = $meta; ?>

<?php if (isset($records) && isset($records['resource_material']) && isset($records['resource_material']->included) && $records['resource_material']->included == 1) { 
  $rm_details = get_resource_detail($records['resource_material']->id);
  $data_header['current_brochure'] = $rm_details;
}
        helper("application_helper"); ?>

<?php echo view('themes/coreitx/header.php'); ?>
    <main id="main-wrapper" class="layout-main-wrapper clearfix">
			<section class="first-sec" id="Home">
					<section class="cloud-revamp-slider-wrapper cloud-main-banner">
						<section class="banner cloud-revamp-slider">
							<div class="cloud-slider-item slider-item1" data-title="Infrastructure">
								<div class="container">
									<div class="banner-flex">
										<div class="banner-content-wrapper">
											<div class="banner-info">
												<h2>Compliance Driven IT</h2>
												<p>a brief and clear statement about the company's offerings</p>
												<a aria-label="Learn more The Digital Path Forward" class="CTA-btn" href="#digital-enterprise" tabindex="-1">CTA Button</a>
											</div>
										</div>
										<div class="banner-img-wrapper">
											<img src="<?= base_url(); ?>/assets/coreitx/images/banner-img1.png" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="cloud-slider-item slider-item2" data-title="Cloud">
								<div class="container">
									<div class="banner-flex">
										<div class="banner-content-wrapper">
											<div class="banner-info">
												<h2>Cloud Services</h2>
												<p>a brief and clear statement about the company's offerings</p>
												<a aria-label="Learn more The Digital Path Forward" class="CTA-btn" href="#digital-enterprise" tabindex="-1">CTA Button</a>
											</div>
										</div>
										<div class="banner-img-wrapper">
											<img src="<?= base_url(); ?>/assets/coreitx/images/banner-img2.png" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="cloud-slider-item slider-item3 banner-has-tab-img" data-title="Professional">
								<div class="container">
									<div class="banner-flex">
										<div class="banner-content-wrapper">
											<div class="banner-info">
												<h2>Professional  Services</h2>
												<p>a brief and clear statement about the company's offerings</p>
												<a aria-label="Learn more The Digital Path Forward" class="CTA-btn" href="#digital-enterprise" tabindex="-1">CTA Button</a>
											</div>
										</div>
										<div class="banner-img-wrapper">
											<img src="<?= base_url(); ?>/assets/coreitx/images/Professional-Services-img.png" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="cloud-slider-item slider-item4" data-title="Managed Hosting" style="background: url(<?= base_url(); ?>/assets/coreitx/images/Managed-Hositing.jpg) no-repeat;">
								<div class="cloud-slider-img mobile-view">
									<img alt="" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/mobile-managed-hositing.jpg" title="">
								</div>
								<div class="container">
									<div class="banner-info banner-info1">
										<h2 class="text-white">
											Managed Hosting
										</h2>
										<p class="text-white">a brief and clear statement about the company's offerings</p>
										<a aria-label="Learn more The Digital Path Forward" class="CTA-btn" href="#digital-enterprise" tabindex="-1">CTA Button</a>
									</div>
								</div>
							</div>
							<div class="cloud-slider-item slider-item5" data-title="Application" style="background: url(<?= base_url(); ?>/assets/coreitx/images/banner-Infrastructure.jpg) no-repeat;" data-mode="light">
								<div class="cloud-slider-img mobile-view">
									<img alt="" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/mobile-banner-Infrastructure.jpg" title="">
								</div>
								<div class="container">
									<div class="banner-info banner-info1">
										<h2 class="text-white">
											Application</h2>
										<p class="text-white">a brief and clear statement about the company's offerings</p>
										<a aria-label="Learn more The Digital Path Forward" class="CTA-btn" href="#digital-enterprise" tabindex="-1">CTA Button</a>
									</div>
								</div>
							</div>
						</section>
					</section>
			</section>
			
			<!------------------------------------------------------------------Featured Trends and Insights------------------------------------------------------------------->
			<!-- <section class="section insights-events-wrap" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-title mb-5">
								<h2>Featured Trends and Insights</h2>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="progress-delivered-slider-section">
								<div class="progress-delivered-slider about-us-slider">
									<div class="item">
										<div class="about-us">
											<div class="about-us-img">
												<span class="trending-tag">Counter Attack : Cyber Attack</span>
												<img src="<?= base_url(); ?>/assets/coreitx/images/trends-insights1.jpg" alt="">
											</div>
											<div class="about-us-info">
												<span class="tag-date">Whitepaper |
													<time datetime="00Z" class="datetime">April 12, 2023</time>
												</span>
												<div class="about-us-body">
													<p>From our offerings to operations, gain an in-depth understanding of our organization right here.
													</p>
												</div>
												<a href="corporate-overview.html" class="link-box oursolutions" data-log="Corporate overview">
													<span class="card-view-content">
														<span class="arrow-btn" tabindex="-1">
															<span>Read more
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="about-us">
											<div class="about-us-img">
												<img src="<?= base_url(); ?>/assets/coreitx/images/trends-insights2.jpg" alt="">
											</div>
											<div class="about-us-info">
												<span class="tag-date">Article |
													<time datetime="00Z" class="datetime">September 06, 2022</time>
												</span>
												<div class="about-us-body">
													<p>Owing to the need to integrate several additional components in order to address an ever-growing list of security issues.</p>
												</div>
												<a href="corporate-overview.html" class="link-box oursolutions" data-log="Corporate overview">
													<span class="card-view-content">
														<span class="arrow-btn" tabindex="-1">
															<span>Read more
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="about-us">
											<div class="about-us-img">
												<span class="trending-tag">Featured</span>
												<img src="<?= base_url(); ?>/assets/coreitx/images/trends-insights1.jpg" alt="">
											</div>
											<div class="about-us-info">
												<span class="tag-date">Whitepaper |
													<time datetime="00Z" class="datetime">April 12, 2023</time>
												</span>
												<div class="about-us-body">
													<p>From our offerings to operations, gain an in-depth understanding of our organization right here.
													</p>
												</div>
												<a href="corporate-overview.html" class="link-box oursolutions" data-log="Corporate overview">
													<span class="card-view-content">
														<span class="arrow-btn" tabindex="-1">
															<span>Read more
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="about-us">
											<div class="about-us-img">
												<img src="<?= base_url(); ?>/assets/coreitx/images/trends-insights2.jpg" alt="">
											</div>
											<div class="about-us-info">
												<span class="tag-date">Article |
													<time datetime="00Z" class="datetime">September 06, 2022</time>
												</span>
												<div class="about-us-body">
													<p>Owing to the need to integrate several additional components in order to address an ever-growing list of security issues.</p>
												</div>
												<a href="corporate-overview.html" class="link-box oursolutions" data-log="Corporate overview">
													<span class="card-view-content">
														<span class="arrow-btn" tabindex="-1">
															<span>Read more
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="events-section">
								<div class="events-section-item">
									<a aria-label="Learn more Adobe Summit 2023" class="link-box text-hide" href="#">insight</a>
									<div class="events-box">
										<span>Blog</span>
										<div class="events-date-info">
											<div class="events-date">March 23, 2023</div>
											<div class="events-category">London</div>
										</div>
										<h4>3 Common Tech Acceleration Mistakes</h4>
										<div class="events-item-footer">
											<div class="arrow-btn arrow-btn-light-blue">
												<span>Learn more</span>
											</div>
										</div>
									</div>
								</div>
								<div class="events-section-item">
									<a aria-label="Gartner Digital Workplace Summit" class="link-box text-hide" href="#">insight</a>
									<div class="events-box">
										<span>Blog</span>
										<div class="events-date-info">
											<div class="events-date">March 13, 2023</div>
											<div class="events-category">San Diego</div>
										</div>
										<h4>Top Tech Acceleration Technologies for 2023</h4>
										<div class="events-item-footer">
											<div class="arrow-btn arrow-btn-light-blue">
												<span>Learn more</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-row">
								<a aria-label="Explore more" class="see-all-btn see-all-btn-dark" href="/events/upcoming">Explore more</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			-->
			<!------------------------------------------------------------------We Stand For------------------------------------------------------------------->
			<section class="section bg-gray" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-title">
								<h2>We Stand For</h2>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="big-p">
								<p>We at Core IT deliver world class IT infrastructure services by aligning technology to business needs. Our team provides the competitive edge by optimizing technology, delivering high grades of trust, agility, flexibility and skills in each engagement. With a proven track record of twenty years, we have been empowering enterprises globally in building flexible, cost-effective breakthrough solutions and services.</p>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="award-card">
                              <div class="award-card-header"><img alt="Collaborative Approach" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/collaborative-approach-icon.png" title="Collaborative Approach"></div>
                              <div class="award-card-title"> <h6>Collaborative Approach</h6></div>
                              <div class="award-body">
                                <p>We work to bring transparency and build trust in our relationships by working closely with client teams to meet business goals.</p>
                              </div>
                            </div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="award-card">
                              <div class="award-card-header"><img alt="Experience & Expertise" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/experience-expertise-icon.png" title="Experience & Expertise"></div>
                              <div class="award-card-title"> <h6>Experience &amp; Expertise</h6></div>
                              <div class="award-body">
                                <p>Our team has the experience to provide the 'right-fit' solution and expertise to implement and manage the IT services across industry verticals.</p>
                              </div>
                            </div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="award-card">
                              <div class="award-card-header"><img alt="Accountability & Ownership" class="img-fluid" src="<?= base_url(); ?>/assets/coreitx/images/accountability-ownership-icon.png" title="Accountability & Ownership"></div>
                              <div class="award-card-title"> <h6>Accountability &amp; Ownership</h6></div>
                              <div class="award-body">
                                <p>We take ownership of service issues and are committed to agreed service KPIs. Our team will ensure that the issue is resolved in minimum time.</p>
                              </div>
                            </div>
						</div>
					</div>
				</div>
			</section>
			
			<!------------------------------------------------------------------Our Areas of Expertise------------------------------------------------------------------->
			<section class="section insights-events-wrap" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-title">
								<h2>Our Areas of Expertise</h2>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="big-p">
								<p>With expertise in Digital, Engineering and Cloud, we deliver solutions that fulfill the traditional, transformational and future needs of clients across the globe.</p>
							</div>
						</div>
						<div class="col-lg-4 views-row">
							<div class="planet-card">
									<a href="#" class="link-box" data-log="Corporate overview" tabindex="0"></a>
									<div class="planet-card-title">
										<h6>Infrastructure Services</h6>
									</div>
									<div class="planet-body">
										<p>We understand that impact starts with us. We act in the most responsible and sustainable manner. We ensure we use every resource&nbsp;efficiently to maximize value.</p>
									</div>
									<div class="case-card-footer">
										<div class="arrow-btn"><span>Learn more</span></div>
									</div>
									
							</div>
						</div>
						<div class="col-lg-4 views-row">
							<div class="planet-card">
									<a href="#" class="link-box" data-log="Corporate overview" tabindex="0"></a>
									<div class="planet-card-title">
										<h6>Cloud Services</h6>
									</div>
									<div class="planet-body">
										<p>We Offer A Wide Variety of Cloud Services such as Cloud Monitoring &amp; Management, Cloud Consulting, Hybrid Cloud Services, Cloud Integration, Cloud Migration, Backup &amp; DRAAS...</p>
									</div>
									<div class="case-card-footer">
										<div class="arrow-btn"><span>Learn more</span></div>
									</div>
									
							</div>
						</div>
						<div class="col-lg-4 views-row">
							<div class="planet-card">
									<a href="#" class="link-box" data-log="Corporate overview" tabindex="0"></a>
									<div class="planet-card-title">
										<h6>Professional Services</h6>
									</div>
									<div class="planet-body">
										<p>Our professional services are vendor agnostic and provide 360-degree services from planning to execution, enabling unification of people, process, and technology.</p>
									</div>
									<div class="case-card-footer">
										<div class="arrow-btn"><span>Learn more</span></div>
									</div>
							</div>
						</div>
						
						
						<div class="col-lg-4 views-row">
							<div class="planet-card">
									<a href="#" class="link-box" data-log="Corporate overview" tabindex="0"></a>
									<div class="planet-card-title">
										<h6>Managed Hosting</h6>
									</div>
									<div class="planet-body">
										<p>We provide customized managed hosting services by providing in-depth pre-sales technical consultation, cutting-edge technology, and technical expertise.</p>
									</div>
									<div class="case-card-footer">
										<div class="arrow-btn"><span>Learn more</span></div>
									</div>
							</div>
						</div>
						<div class="col-lg-4 views-row">
							<div class="planet-card">
									<a href="#" class="link-box" data-log="Corporate overview" tabindex="0"></a>
									<div class="planet-card-title">
										<h6>Audit Services</h6>
									</div>
									<div class="planet-body">
										<p>CoreIT's IT audit services assist businesses in recognizing, mitigating and controlling their key technology risks. </p>
									</div>
									<div class="case-card-footer">
										<div class="arrow-btn"><span>Learn more</span></div>
									</div>
							</div>
						</div>
						<div class="col-lg-4 views-row">
							<div class="planet-card">
									<a href="#" class="link-box" data-log="Corporate overview" tabindex="0"></a>
									<div class="planet-card-title">
										<h6>Training</h6>
									</div>
									<div class="planet-body">
										<p>At Core IT we partner with you to identify the skill gaps within your teams and work with you to prepare tailored training programs.</p>
									</div>
									<div class="case-card-footer">
										<div class="arrow-btn"><span>Learn more</span></div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!------------------------------------------------------------------Trusted by Global Compaines------------------------------------------------------------------->
			<section class="section bg-gray" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-title">
								<h2>Trusted by Global Compaines</h2>
							</div>
						</div>
						<div class="col-lg-12">
							
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
								<a href="<?php echo base_url('contact-us'); ?>" class="request-demo-btn">Request a Demo</a>
								<a href="<?php echo base_url('contact-us'); ?>" class="choose-arrow-btn-blue">Contact Us</a>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<section class="section i-footer" id="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="in-footer"><img src="<?= base_url(); ?>/assets/coreitx/images/logo-footer.png" alt=""/></div>
						</div>
						<div class="col-lg-12">
							<p>Address</p>
							<div class="address-bar">
							  <div class="address-bar-item">
								<div class="loction-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/icons/location-icon.png" alt=""/></div>
								<dov class="location-add">
									440 Cobia Dr, Unit 1101, Katy TX 77494 USA
								</dov>
							  </div>
							  <div class="address-bar-item">
								<div class="loction-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/icons/location-icon.png" alt=""/></div>
								<dov class="location-add">
									7 Teleport Dr, Staten Island, NY 10311 USA
								</dov>
							  </div>
							  <div class="address-bar-item">
								<div class="loction-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/icons/location-icon.png" alt=""/></div>
								<dov class="location-add">
									308-308A Mint Chambers, 45/47 Mint Road, Mumbai 400001 INDIA
								</dov>
							  </div>
							  <div class="address-bar-item">
								<div class="loction-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/icons/location-icon.png" alt=""/></div>
								<dov class="location-add">
									313 Tower-B, SNS Atria, Maharana  Pratap Rd, Vesu, Surat 395007 INDIA
								</dov>
							  </div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="E-mail-bar">
							  <div class="E-mail-bx">
									<div class="E-mail-icon"><img src="<?= base_url(); ?>/assets/coreitx/images/icons/E-mail-icon.png" alt=""/></div>
									<div class="E-mail-text">E-mail:  <a href="mailto:info@coreitx.com">info@coreitx.com</a></div>
							  </div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
		</main>
		

<?php echo view('themes/coreitx/footer.php'); ?>
