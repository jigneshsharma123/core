<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="box">
<div class="form-group pull-left">
<a href="<?php echo base_url();?>/admin/profile_management/add" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Profile</a>
</div>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Name </th>	
			<th>Email Id</th>
			<th>Phone Number</th>
			<th>Sort Order</th>		
			<th>Status</th>
			<th>Action</th>				
		</tr>
	</thead>
	<tbody>
	
	<?php  $profile_count = 0; ?>
	<?php foreach ($profileManagement_list as $p_key){
     ?>
		<tr>
			<td><?php echo $profile_count = $profile_count + 1; ?></td>
			<td><?php echo $p_key['first_name']; ?> <?php echo $p_key['middle_name']; ?> <?php echo $p_key['last_name']; ?></td>
			<td><?php echo $p_key['email_id']; ?> </td>
			<td><?php echo $p_key['phone_number']; ?> </td>
			<td><?php echo $p_key['sort_order']; ?> </td>
			<td><?php if($p_key['is_active']=="1"){?>
			 <span class="label-success label label-default">	Active	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> Inactive</span>
				
				<?php }?>  </td>

			<td class="center">
				<a class="btn btn-info" href="<?php echo base_url();?>/admin/profile_management/edit/<?php echo $p_key['id'];?>">
					<i class="fa fa-edit icon-white"></i>
					Edit
				</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>/admin/profile_management/delete/<?php echo $p_key['id'];?>" onclick="return confirm('Click OK to confirm deletion.')">
          <i class="glyphicon glyphicon-trash icon-white"></i> Delete
        </a>
				<a class="btn btn-success" href="<?php echo base_url();?>/admin/profile_management/changestatus/<?php echo $p_key['id'];?>">
				<?php if($p_key['is_active']=="1"){?>
				Inactive	
				<?php }else{?>
				Active
				<?php }?>
				</a>	
			</td>
		</tr>
   
	<?php } ?>
  </tbody>
</table>
</div>
<?= $this->endSection() ?>
