
<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>

   <a href="<?php echo base_url('admin/categories/add');?>" class="btn btn-warning"> <i class="fa fa-plus icon-white"></i> Add Category</a><br><br>
<div style="display:none;" class="alert alert-info"></div>
<div class="box">
<table id="example1" class="table table-bordered table-striped dataTable" style="overflow-x:auto;!important"> 
	<thead>
		<tr>
			<th>ID</th>
			<th>Module</th>
			<th>Category</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	
	<?php $categories_count = 0; ?>
	<?php foreach ($categories_list as $parent_category){
     ?>
		<tr>
			<td><?php echo $categories_count = $categories_count + 1; ?></td>
			<td><?php echo $category_modules[$parent_category['module']]; ?></td>
			<td><?php echo $parent_category['title']; ?></td>
			<td><?php if($parent_category['status']=="1"){?>
			 <span class="label-success label label-default">	Active	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> Inactive</span>
				
				<?php }?>  </td>
			<td class="center">
					
			 <ul class="nav navbar-right panel_toolbox">
				<li>
					<a href="<?php echo base_url('admin/categories/changestatus/'.$parent_category['id']);?>" alt="Change Status" title="Change Status"><i class="fa fa-wrench"></i></a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/categories/edit/'.$parent_category['id']);?>" alt="Edit" title="Edit"><i class="fa fa-edit icon-white"></i></a>
				</li>
          <li>
			</ul>
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>
</div>

<?= $this->endSection() ?>

