<div class="vertical-center">
  <div class="container">
    <div id="accordionFAQ">
      <?php foreach($faq_groups->faqs->get() as $faq) { ?>
      <h3 class="acc-title"><?php echo $faq->question?> <i class="fas fa-angle-down"></i></h3>
      <div class="acc-content">
        <?php echo $faq->answer?>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
