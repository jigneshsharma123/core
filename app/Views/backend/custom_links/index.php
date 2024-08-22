<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="box">
<div class="form-group pull-left">
<a href="<?php echo base_url();?>admin/custom_links/add" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Custom Link</a>
</div>
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>	
			<th>Link</th>	
			<th>Action</th>				
		</tr>
	</thead>
	<tbody>
	
	<?php $custom_links_count = 0; ?>
	<?php foreach ($custom_links_list as $p_key){
     ?>
		<tr>
			<td><?php echo $custom_links_count = $custom_links_count + 1; ?></td>
			<td><?php echo $p_key['title']; ?></td>
			<td><?php echo $p_key['link']; ?></td>
			<td class="center">
				<a class="btn btn-info" href="<?php echo base_url();?>admin/custom_links/edit/<?php echo $p_key['id'];?>">
					<i class="fa fa-edit icon-white"></i>
					Edit
				</a>
        <a class="btn btn-danger" href="<?php echo base_url();?>admin/custom_links/delete/<?php echo $p_key['id'];?>" onclick="return confirm('Click OK to confirm deletion.')">
          <i class="glyphicon glyphicon-trash icon-white"></i> Delete
        </a>
			</td>
		</tr>
   
	<?php } ?>
  </tbody>
</table>
</div>
<?= $this->endSection() ?>
