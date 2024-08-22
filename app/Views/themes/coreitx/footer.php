		</main>
		<footer class="main-footer">
			<div class="container">
				<div class="row top-footer">
					<div class="col-sm-3">
                    <?php echo view('themes/'.$theme_name.'/common_sections/footer_top_first.php') ?>
					</div>
                    <div class="col-sm-3">
                    <?php echo view('themes/'.$theme_name.'/common_sections/footer_top_second.php') ?>
                    </div>
                    <div class="col-sm-3">
                    <?php echo view('themes/'.$theme_name.'/common_sections/footer_top_third.php') ?>
                    </div>
                    <div class="col-sm-3">
                    <?php echo view('themes/'.$theme_name.'/common_sections/footer_top_fourth.php') ?>
                    </div>
				</div>
				<div class="row bootom-footer">
					<div class="col-lg-12">
                    <?php echo view('themes/'.$theme_name.'/common_sections/footer_bottom.php') ?>
					</div>
				</div>
			</div>
		</footer>
		<script src="<?= base_url(); ?>/assets/coreitx/js/jquery-3.5.1.min.js"></script>
		<script src="<?= base_url(); ?>/assets/coreitx/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url(); ?>/assets/coreitx/js/easyResponsiveTabs.js"></script>
		<script src="<?= base_url(); ?>/assets/coreitx/js/slick.js"></script>
		<script src="<?= base_url(); ?>/assets/coreitx/js/script.js"></script>
	</body>
</html>
