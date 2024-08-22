
<div class="x_panel" id="widget<?php echo $customsection; ?>">
  <div class="x_title">
    <h2>Custom Form</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
    <form name="frmwidget" action="<?php echo base_url('/admin/cms/add_widget_content'); ?>" method="post">
    <input type="hidden" name="customsection" value="<?php echo $customsection; ?>">
    <input type="hidden" name="section" value="<?php echo $section; ?>">
    <input type="hidden" name="widget" value="custom_form">
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="custom_form[title]" value="<?php echo (isset($data) and isset($data->title)) ? $data->title : ''?>" class="form-control">
    </div>
    <div class="form-group">
      <select id="custom_form_id" name="custom_form[id]" class="form-control">
        <option value="0">Select Custom Form</option>
      <?php foreach($records as $contact_form) { ?>
        <option value="<?php echo $contact_form->id; ?>" <?php echo (isset($data) and isset($data->id) and $data->id == $contact_form->id) ? 'selected' : ''; ?>><?php echo $contact_form->name; ?></option>
      <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success">Save</button><a href="javascript:void(0)" id="<?php echo $customsection; ?>" class="removewidget">Remove</a>
    </div>
    </form>
  </div>
</div>
