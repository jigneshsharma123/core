
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo (isset($module_selected_values) and isset($module_selected_values['resource_material']) and isset($module_selected_values['resource_material']->included) and $module_selected_values['resource_material']->included == 1) ? '<i class="fa fa-check text-success"></i>' : ''; ?> Resource</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content" style="display: none;">
        <input type="checkbox" value="1" name="resource_material[included]" <?php echo (isset($module_selected_values) and isset($module_selected_values['resource_material']) and isset($module_selected_values['resource_material']->included) and $module_selected_values['resource_material']->included == 1) ? 'checked' : ''; ?> id="resource_material_included"> Include
        <select id="resource_material_type" name="resource_material[type]" class="form-control">
          <option value="0">Select Resource Type</option>
        <?php foreach($category_modules as $category_key=>$category_name) { ?>
          <option value="<?php echo $category_key; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['resource_material']) and isset($module_selected_values['resource_material']->type) and $module_selected_values['resource_material']->type == $category_key) ? 'selected' : ''; ?>><?php //echo ucwords(substr($resourceresource_type,0,1)); ?> - <?php echo $category_name; ?></option>
        <?php } ?>
        </select>
        <select id="resource_material_category" name="resource_material[category]" class="form-control">
          <option value="all">Select Resource Category</option>
        <?php foreach($records as $resource) { ?>
          <option value="<?php echo $resource->id; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['resource_material']) and isset($module_selected_values['resource_material']->id) and $module_selected_values['resource_material']->id == $resource->id) ? 'selected' : ''; ?>><?php //echo ucwords(substr($resourceresource_type,0,1)); ?> - <?php echo $resource->title; ?></option>
        <?php } ?>
        </select>
        <select id="resource_material_id" name="resource_material[id]" class="form-control">
          <option value="all">Select Resource</option>
        <?php foreach($records as $resource) { ?>
          <option value="<?php echo $resource->id; ?>" <?php echo (isset($module_selected_values) and isset($module_selected_values['resource_material']) and isset($module_selected_values['resource_material']->id) and $module_selected_values['resource_material']->id == $resource->id) ? 'selected' : ''; ?>><?php //echo ucwords(substr($resourceresource_type,0,1)); ?> - <?php echo $resource->title; ?></option>
        <?php } ?>
        </select>
      </div>
    </div>

<script>
$("#resource_material_type").click(function(){  
var resource_type =  $("#resource_material_type").val();

$.ajax({
    url: '<?=base_url()?>admin/pages/categories',
    type: 'get',
    data: {
      resource_type: resource_type
    },
    dataType: 'json',
    success: function(response) {
      $("#resource_material_category").html("<option value=''>Select Village</option>");
      $.each(response, function() {
        if (vid == this['id'])
          $("#resource_material_category").append("<option value='" + this['id'] + "' selected>" + this['value'] + "</option>");
        else
          $("#resource_material_category").append("<option value='" + this['id'] + "'>" + this['value'] + "</option>");
      });
      $("#resource_material_category").show();
    },
    error: function(response) {
      window.console.log(response);
    }
});

return false;
})
</script>