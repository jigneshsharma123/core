<?php echo view('backend/theme/_partials/navbar'); ?>

<div class="right_col" role="main" style="min-height: 387px;">
       <?= $this->renderSection('content') ?>     
</div>

<?php echo view('backend/theme/_partials/footer'); ?>
