<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<a href="<?php echo base_url('admin/resource_management/add');?>" class="btn btn-warning"><i class="fa fa-plus"></i> Add Resource material</a>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Type</th>
      <th>Title</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

  <?php $resource_count = 0; ?>
  <?php foreach ($resourceManagement_list as $e_key){
   ?>
    <tr>
      <td><?php echo $resource_count = $resource_count + 1; ?></td>
      <td><?php echo ucwords(str_replace("_"," ",$category_names[$e_key['category_id']])); ?></td>
      <td><?php echo $e_key['title']; ?></td>
      <td>
        <?php if($e_key['is_active']=="1") { ?>
        <span class="label-success label label-default">Active</span>
        <?php } else { ?>
        <span class="label-danger label label-default">Inactive</span>
        <?php } ?>  
      </td>
      <td class="center">
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <?php if($e_key['is_active']=="1"){?>
            <a title="Mark Inactive" href="<?php echo base_url('admin/resource_management/changestatus/'.$e_key['id']);?>"><i class="fa fa-eye-slash icon-white"></i></a>
            <?php }else{?>
            <a title="Mark Active" href="<?php echo base_url('admin/resource_management/changestatus/'.$e_key['id']);?>"><i class="fa fa-eye icon-white"></i></a>
            <?php }?>
          </li>
          <li>
            <a href="<?php echo base_url('admin/resource_management/edit/'.$e_key['id']);?>" alt="Edit" title="Edit"><i class="fa fa-edit icon-white"></i></a>
          </li>
          <li>
            <a class="delbtn"  alt="Delete" title="Delete"  href="<?php echo base_url('admin/resource_management/delete/'.$e_key['id']);?>" onclick="return confirm('Click OK to confirm deletion.')"><i class="fa fa-trash "></i></a>
          </li>
        </ul>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?= $this->endSection() ?>
