
<div class="x_panel" id="widget<?php echo $customsection; ?>">
  <div class="x_title">
    <h2>Socials</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
    <form name="frmwidget" action="<?php echo base_url('/admin/cms/add_widget_content'); ?>" method="post">
    <input type="hidden" name="customsection" value="<?php echo $customsection; ?>">
    <input type="hidden" name="section" value="<?php echo $section; ?>">
    <input type="hidden" name="widget" value="social">
    <div class="form-group">
      <select id="social_format" name="social[format]" class="form-control">
        <option value="0">Select</option>
        <option value="icons" <?php echo (isset($data) and isset($data->format) and $data->format == 'icons') ? 'selected' : ''; ?>>Social Icons</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success">Save</button><a href="javascript:void(0)" id="<?php echo $customsection; ?>" class="removewidget">Remove</a>
    </div>
    </form>
  </div>
</div>
