<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div style="display:none;" class="alert alert-info"></div>
<a href="<?php echo base_url();?>/admin/pages/add" class="btn btn-primary"> <i class="fa fa-plus icon-white"></i> Add Page</a><br><br>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $pages_count = 0; ?>
    <?php foreach ($pages_list as $e_key){ ?>
    <tr>
      <td><?php echo $pages_count = $pages_count + 1; ?></td>
      <td><?php echo $e_key['title']; ?></td>
      <td>
        <?php if($e_key['status']=="1") { ?>
        <span class="label-success label label-default">Active</span>
        <?php } else { ?>
        <span class="label-danger label label-default">Inactive</span>
        <?php } ?>  
      </td>
      <td class="center">
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a href="<?php echo base_url();?>/admin/pages/changestatus/<?php echo $e_key['id'];?>">
              <?php if($e_key['status']=="1"){?>
              Mark Inactive	
              <?php }else{?>
              Mark Active
              <?php }?>
            </a>	
          </li>
          <li>
            <a href="<?php echo base_url();?>/<?php echo $e_key['slug'];?>" alt="view" title="view" target="_BLANK"><i class="fa fa-eye icon-white"></i></a>
          </li>
          <li>
            <a href="<?php echo base_url();?>/admin/pages/edit/<?php echo $e_key['id'];?>" alt="Edit" title="Edit"><i class="fa fa-edit icon-white"></i></a>
          </li>
          <li>
            <a class="delbtn"  alt="Delete" title="Delete"  href="<?php echo base_url();?>/admin/pages/delete/<?php echo $e_key['id'];?>" onclick="return confirm('Click OK to confirm deletion.')"><i class="fa fa-trash "></i></a>
          </li>
        </ul>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?= $this->endSection() ?>
