<?= $this->extend('backend/theme/_layouts/default') ?>
<?php   use App\Models\HotelDetail;    ?>
<?= $this->section('content') ?>
<div class="box">
<div class="form-group pull-left">
<a href="<?php echo base_url();?>/admin/hotel_room/add" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Hotel Rooms</a>
</div>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Hotel name </th>	
			<th>Room</th>	
			<th>Status</th>	
			<th>Action</th>				
		</tr>
	</thead>
	<tbody>
	
	<?php  $room_count = 0; ?>
	<?php foreach ($hotel_room_list as $p_key){ 
		$hoteldetails = new HotelDetail();
		  $hotel_data=$hoteldetails->get_hotel_by_hotelId($p_key['hotel_id']);
		  ?> 


     
		<tr>
			<td><?php echo $room_count = $room_count + 1; ?></td>
			<td><?php echo $hotel_data->hotel_name; ?> </td>
			<td><?php echo $p_key['room_name']; ?>
       </td>
			
			<td><?php if($p_key['is_active']=="1"){?>
			 <span class="label-success label label-default">	Active	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> Inactive</span>
				
				<?php }?>  </td>
			<td class="center">
				<a class="btn btn-info" href="<?php echo base_url();?>/admin/hotel_room/edit/<?php echo $p_key['id'];?>">
					<i class="fa fa-edit icon-white"></i>
					Edit
				</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>/admin/hotel_room/delete/<?php echo $p_key['id'];?>" onclick="return confirm('Click OK to confirm deletion.')">
          <i class="glyphicon glyphicon-trash icon-white"></i> Delete
        </a>
				<a class="btn btn-success" href="<?php echo base_url();?>/admin/hotel_room/changestatus/<?php echo $p_key['id'];?>">
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
