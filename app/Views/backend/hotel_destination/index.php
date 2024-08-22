<?= $this->extend('backend/theme/_layouts/default') ?>
<?php use App\Models\State_model;  use App\Models\Country_model;    ?>
<?= $this->section('content') ?>
<div class="box">
<div class="form-group pull-left">
<a href="<?php echo base_url();?>/admin/hotel_destination/add" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Hotel Destination</a>
</div>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr> 
			<th>ID</th>
			<th>Country </th>	
			<th>State</th>
			<th>City</th>
			<th>Display on Homepage</th>		
			<th>Status</th>	
			<th>Action</th>				
		</tr>
	</thead>
	<tbody>
	
	<?php  $profile_count = 0; ?>
	<?php foreach ($hotel_des_list as $p_key){ 

		$state = new State_model();
		$states = $state->get_states_by_stateId($p_key['state_id']); 
		 $country = new Country_model(); 
		  $country_data=$country->get_country_by_countryId($p_key['country_id']);
		  ?> 


     
		<tr>
			<td><?php echo $profile_count = $profile_count + 1; ?></td>
			<td><?php echo $country_data->country_name; ?> </td>
			<td><?php echo $states->state_name; ?>
       </td>
			<td><?php echo $p_key['city']; ?> </td>
			<td><?php if($p_key['display_on_homepage']=="1"){?>
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
				<a class="btn btn-info" href="<?php echo base_url();?>/admin/hotel_destination/edit/<?php echo $p_key['id'];?>">
					<i class="fa fa-edit icon-white"></i>
					Edit
				</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>/admin/hotel_destination/delete/<?php echo $p_key['id'];?>" onclick="return confirm('Click OK to confirm deletion.')">
          <i class="glyphicon glyphicon-trash icon-white"></i> Delete
        </a>
         <a class="btn btn-success" href="<?php echo base_url();?>/admin/hotel_destination/change_display_homepage/<?php echo $p_key['id'];?>">
				<?php if($p_key['display_on_homepage']=="1"){?>
				Hide on Homepage	
				<?php }else{?>
				Show on Homepage
				<?php }?>
				</a>
				<a class="btn btn-success" href="<?php echo base_url();?>/admin/hotel_destination/changestatus/<?php echo $p_key['id'];?>">
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
