<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="box">
  <div class="form-group pull-left">
  <a href="<?php echo base_url('/admin/gallery_management/add');?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Gallery</a>
  </div>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <? $events_count = 0; ?>
    <?php foreach ($gallery as $e_key){ ?>
      <tr>
        <td><?php echo $events_count = $events_count + 1; ?></td>
        <td><?php echo $e_key->title; ?></td>
        <td><?php if($e_key->status=="1"){?>
         <span class="label-success label label-default">	Active	</span>
          <?php }else{?>
       <span class="label-danger label label-default"> Inactive</span>
          
          <?php }?>  </td>
        <td class="center">
          
          <a class="btn btn-info" href="#" onClick="show_confirm('edit',<?php echo $e_key->id;?>)">
            <i class="glyphicon glyphicon-edit icon-white"></i>
            Edit
          </a>
          <a class="btn btn-danger" href="#" onClick="show_confirm('delete',<?php echo $e_key->id;?>)">
            <i class="glyphicon glyphicon-trash icon-white"></i>
            Delete
          </a>
          
          <a class="btn btn-success" href="<?php echo base_url();?>admin/galleries/changestatus/<?php echo $e_key->id;?>">
          <?if($e_key->status==1){?>
          Inactive	
          <?}else{?>
          Active
          
          <?}?>
          </a>
        <a class="btn btn-primary " href="<?php echo base_url();?>admin/galleries/view/<?php echo $e_key->id;?>">
          View Gallery
          </a>
          
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>