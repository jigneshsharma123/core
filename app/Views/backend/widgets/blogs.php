
<div class="x_panel" id="widget<?php echo $customsection; ?>">
  <div class="x_title">
    <h2>Blogs</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" style="display: block;">
    <form name="frmwidget" action="<?php echo base_url('/admin/cms/add_widget_content'); ?>" method="post">
    <input type="hidden" name="customsection" value="<?php echo $customsection; ?>">
    <input type="hidden" name="section" value="<?php echo $section; ?>">
    <input type="hidden" name="widget" value="blog">
    <div class="form-group">
      <select id="blog_format" name="blog[format]" class="form-control">
        <option value="0">Select</option>
        <option value="list" <?php echo (isset($data) and isset($data->format) and $data->format == 'list') ? 'selected' : ''; ?>>Blog List</option>
      </select>
    </div>
    <div class="form-group">
      <input id="blog_count" name="blog[count]" class="form-control" value="<?php echo (isset($data) and isset($data->count)) ? $data->count : ''; ?>">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success">Save</button><a href="javascript:void(0)" id="<?php echo $customsection; ?>" class="removewidget">Remove</a>
    </div>
    </form>
  </div>
</div>
