<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="box">
<div class="form-group pull-left">
<a href="<?php echo base_url();?>/admin/hotel_management/add" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Hotel Detail</a>
</div>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Name </th>	
			<th>Hotel Type</th>
			<th>Available Room</th>
			<th>Popular Hotel</th>	
			<th>Status</th>	
			<th>Action</th>				
		</tr>
	</thead>
	<tbody>
	
	<?php  $profile_count = 0; ?>
	<?php foreach ($hotel_detail_list as $p_key){
     ?>
		<tr>
			<td><?php echo $profile_count = $profile_count + 1; ?></td>
			<td><?php echo $p_key['hotel_name']; ?> </td>
			<td><?php echo $p_key['hotel_type']; ?> </td>
			<td><?php echo $p_key['available_room']; ?> </td>
			<td><?php if($p_key['popular_hotel']=="1"){?>
			 <span class="label-success label label-default">	yes	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> No</span>
				
				<?php }?>  </td>
			<td><?php if($p_key['is_active']=="1"){?>
			 <span class="label-success label label-default">	Active	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> Inactive</span>
				
				<?php }?>  </td>
			<td class="center">
				<a class="btn btn-info" href="<?php echo base_url();?>/admin/hotel_management/edit/<?php echo $p_key['id'];?>">
					<i class="fa fa-edit icon-white"></i>
					Edit
				</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>/admin/hotel_management/delete/<?php echo $p_key['id'];?>" onclick="return confirm('Click OK to confirm deletion.')">
          <i class="glyphicon glyphicon-trash icon-white"></i> Delete
        </a>
          <a class="btn btn-success" href="<?php echo base_url();?>/admin/hotel_management/changepopular/<?php echo $p_key['id'];?>">
				<?php if($p_key['popular_hotel']=="1"){?>
				Unpopular	
				<?php }else{?>
				Popular
				<?php }?>
				</a>	
				<a class="btn btn-success" href="<?php echo base_url();?>/admin/hotel_management/changestatus/<?php echo $p_key['id'];?>">
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
