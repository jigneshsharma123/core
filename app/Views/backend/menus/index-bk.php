<script type="text/javascript">
function show_confirm(act,gotoid)
{
if(act=="edit")
var r=confirm("Do you really want to edit?");
else
var r=confirm("Do you really want to delete?");
if (r==true)
{
window.location="<?php echo base_url();?>admin/menus/"+act+"/"+gotoid;
}
}
function addarticle(act,gotoid)
{
if(act=="add")

window.location="<?php echo base_url();?>admin/articles/"+act+"/"+gotoid;

}



</script>
<a href="<?php echo base_url();?>admin/menus/add?pid=<?=$parent_menu?>">Add Menu</a><br><br>
<div style="display:none;" class="alert alert-info"></div>
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	<thead>
		<tr>
			<th>ID</th>
			<th>Menu Name</th>
			<th>Link</th>
			<th>Target_window</th>
			<th>Sort Order</th>
			<th>Position</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	
	<? $menus_count = 0; ?>
	<?php foreach ($menus_list as $e_key){ ?>
		<tr>
			<td><?php echo $menus_count = $menus_count + 1; ?></td>
			<td><?php echo $e_key->menu_name; ?></td>
			<td><?php echo $e_key->link; ?></td>
			<td><?php echo $e_key->target_window; ?></td>
			<td><?php echo $e_key->sort_order; ?></td>
			<td><?php echo $e_key->position; ?></td>
			<td> <span class="label-success label label-default"><?php echo $e_key->status; ?> </span> </td>
			<td class="center">
				
				<a class="btn btn-info" href="#" onClick="show_confirm('edit',<?php echo $e_key->id;?>)">
					<i class="glyphicon glyphicon-edit icon-white"></i>
					Edit
				</a>
				<a class="btn btn-danger" href="#" onClick="show_confirm('delete',<?php echo $e_key->id;?>)">
					<i class="glyphicon glyphicon-trash icon-white"></i>
					Delete
				</a>
				
				<a class="btn btn-success" href="<?php echo base_url();?>admin/menus/changestatus/<?php echo $e_key->id;?>">
				<?if($e_key->status=="active"){?>
				Inactive	
				<?}else{?>
				Active
				
				<?}?>
				</a>
        
				<a class="btn btn-info" href="<?php echo base_url();?>admin/menus/?pid=<?php echo $e_key->id;?>">
					<i class="glyphicon glyphicon-edit icon-white"></i>
					Sub Menus
				</a>
			</td>
		</tr>
	<?php } ?>
		</tbody>
	</table>
