<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<script>
$( document ).ready(function() {
  $(".removewidget").click(function(){
    element_id = $(this).attr("id");
    
    $.ajax({
      url: '<?echo base_url()?>admin/cms/remove_widget',
      type: 'post',
      data: {
        id: element_id
      },
      success: function(response) {
        $("#widget"+element_id).remove()
      },
      error: function(response) {
        window.console.log(response);
      }
    });
  })
});
</script>
<form name="Formpage" action="<?php echo base_url();?>admin/cms/<?=(isset($form_action)) ? $form_action : ''?>" method="post" accept-charset="utf-8" enctype="multipart/form-data"  >
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label class="control-label">Select Front Page</label>
        <div>
          <input type="text" class="form-control" id="page_title" name="page_title" value="<?php echo (isset($homepage) and isset($homepage->id)) ? $homepage->title : ''?>">
          <input type="hidden" class="form-control" id="page_id" name="page_id" value="<?php echo (isset($homepage) and isset($homepage->id)) ? $homepage->id : ''?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label">Available Widgets</label>
    </div>
    <div class="form-group">
      <div class="col-lg-6" style="display:none;">
        <div class="x_panel">
          <div class="x_title">
            <h2>Text/HTML</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: none;">
            <form name="frmwidget" action="<?php echo base_url(); ?>admin/cms/add_widget" method="post">
            Add Custom Text or HTML
            <div class="form-group">
              <input type="hidden" name="widget" value="custom_text">
              <select id="section" name="section" class="form-control">
              <?php foreach($common_sections as $common_section=>$common_section_detail) { ?>
                <option value="<?php echo $common_section; ?>"><?php echo $common_section_detail['title']; ?></option>
              <?php } ?>
              </select>
            </div>
            <a class="btn btn-info pull-right">Add</a>
            <button type="submit" class="btn btn-success">Save</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6" style="display:none;">  
        <div class="x_panel">
          <div class="x_title">
            <h2>Custom Menu</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: none;">
            <form name="frmwidget" action="<?php echo base_url(); ?>admin/cms/add_widget" method="post">
            Add Custom Menu
            <div class="form-group">
              <input type="hidden" name="widget" value="custom_menu">
              <select id="section" name="section" class="form-control">
              <?php foreach($common_sections as $common_section=>$common_section_detail) { ?>
                <option value="<?php echo $common_section; ?>"><?php echo $common_section_detail['title']; ?></option>
              <?php } ?>
              </select>
            </div>
            <a class="btn btn-info pull-right">Add</a>
            <button type="submit" class="btn btn-success">Save</button>
            </form>
          </div>
        </div>
      </div>
      <?php foreach($widgets as $widget=>$widget_title) { ?>
      <div class="col-lg-6">  
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $widget_title; ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content" style="display: none;">
            <form name="frmwidget" action="<?php echo base_url(); ?>admin/cms/add_widget" method="post">
            Add <?php echo $widget; ?>
            <div class="form-group">
              <input type="text" name="widget" value="<?php echo $widget; ?>">
              <select id="section" name="section" class="form-control">
              <?php foreach($common_sections as $common_section=>$common_section_detail) { ?>
                <option value="<?php echo $common_section; ?>"><?php echo $common_section_detail['title']; ?></option>
              <?php } ?>
              </select>
            </div>
            <a class="btn btn-info pull-right">Add</a>
            <button type="submit" class="btn btn-success">Save</button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label">Add Widgets In General Sections</label>
    </div>
    <?php foreach($common_sections as $common_section=>$common_section_detail) { //print_r($common_section_detail); exit;?>
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo $common_section_detail['title']; ?></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div id="<?php echo $common_section; ?>" class="x_content" style="display: none;">
        <?php foreach($common_section_detail['widgets'] as $widget_detail) { //print_r($widget_detail); exit;?>
          <!-- widget -->
          <?php $widget_data['section'] = $common_section; ?>
          <?php $widget_data['customsection'] = $widget_detail['customsection']; ?>
          <?php $widget_data['data'] = $widget_detail['data']; ?>
          <?php $widget_data['records'] = $widget_detail['records']; ?>
          <?php $widget_data['selected_value'] = ''; ?>
          <?php $widget_data['theme_multi_sections'] = $theme_multi_sections; ?>
          <?php echo $this->load->view('backend/widgets/'.$widget_detail['name'].'.php', $widget_data) ?>
          <!-- widget -->
        <?php } ?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<script>
$(function(){  
  $("#page_title").autocomplete({
    source: "<?php echo base_url();?>admin/menus/get_page", // path to the get_author method
    minLength: 2,
    select: function( event, ui ) {
      $("#page_id").val(ui.item.id)
    }
  });
});
</script>
<?= $this->endSection() ?>
