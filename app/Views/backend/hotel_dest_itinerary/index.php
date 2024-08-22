<?= $this->extend('backend/theme/_layouts/default') ?>
<?php   use App\Models\Hotel_Destination_model;    ?>
<?= $this->section('content') ?>
<div class="box">
<div class="form-group pull-left">
<a href="<?php echo base_url();?>/admin/destination_itinerary/add" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Destination Itinerary  </a>
</div>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Destination </th>	
			<th>Title</th>	
			<th>Status</th>	
			<th>Action</th>				
		</tr>
	</thead>
	<tbody>
	
	<?php  $itinerary_count = 0; ?>
	<?php foreach ($hotel_itinerary_list as $p_key){ 
		$hotelDestination = new Hotel_Destination_model();
		$hotelDes_data=$hotelDestination->get_city_by_cityID($p_key->destination_id);

		  ?> 


     
		<tr>
			<td><?php echo $itinerary_count = $itinerary_count + 1; ?></td>
			<td><?php echo $hotelDes_data->city; ?> </td>
			<td><?php echo $p_key->title; ?>
       </td>
			
			<td><?php if($p_key->is_active =="1"){?>
			 <span class="label-success label label-default">	Active	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> Inactive</span>
				
				<?php }?>  </td>
			<td class="center">
				<a class="btn btn-info" href="<?php echo base_url();?>/admin/destination_itinerary/edit/<?php echo $p_key->id;?>">
					<i class="fa fa-edit icon-white"></i>
					Edit
				</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>/admin/destination_itinerary/delete/<?php echo $p_key->id;?>" onclick="return confirm('Click OK to confirm deletion.')">
          <i class="glyphicon glyphicon-trash icon-white"></i> Delete
        </a>
				<a class="btn btn-success" href="<?php echo base_url();?>/admin/destination_itinerary/changestatus/<?php echo $p_key->id;?>">
				<?php if($p_key->is_active=="1"){?>
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
