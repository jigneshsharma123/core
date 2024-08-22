<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="form-group pull-left">
  <a href="<?php echo base_url();?>/admin/hotel_faqs/add" class="btn btn-warning"><i class="fa fa-plus"></i> Add Hotel Faq</a>
</div>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Question</th>
			<th>status</th>			
			<th>Action</th>			
		</tr>
	</thead>
	<tbody>
	
	<?php $faqs_count = 0; ?>
	<?php foreach ($faq_list as $e_key){
     ?>
		<tr>
			<td><?php echo $faqs_count = $faqs_count + 1; ?></td>
			
			<td><?php echo $e_key->question; ?></td>
		
	  <td> <?php if($e_key->is_active =="1"){?>
				<span class="label-success label label-default">Active	 </span> 
				<?php  }else{?>
				<span class="label-danger label label-default">Inactive </span> 
				
				<?php } ?></td>
				
        <td class="center">
          	
			 <ul class="nav navbar-right panel_toolbox">
      
        <li>
          <a href="<?php echo base_url();?>/admin/hotel_faqs/changestatus/<?php echo $e_key->id;?>">
            <?php if($e_key->is_active =="1"){?>
            Mark Inactive	
            <?php }else{?>
            Mark Active
            <?php }?>
          </a>	
        </li>
				<li>
					<a href="<?php echo base_url();?>/admin/hotel_faqs/edit/<?php echo $e_key->id;?>" alt="Edit" title="Edit"><i class="fa fa-edit icon-white"></i></a>
				</li>
				<li>				
           <a  href="<?php echo base_url();?>/admin/hotel_faqs/delete/<?php echo $e_key->id;?>" onclick="return confirm('Click OK to confirm deletion.')">
                <i class="glyphicon glyphicon-trash icon-white"></i> 
              </a>
				</li>
			</ul>

			</td>
		</tr>
		
	<?php } ?>
  </tbody>
</table>

</div>

<?= $this->endSection() ?>
