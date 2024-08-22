<script type="text/javascript">
function show_confirm(act,gotoid)
{
if(act=="edit")
var r=confirm("Do you really want to edit?");
else
var r=confirm("Do you really want to delete?");
if (r==true)
{
window.location="<?php echo base_url();?>admin/banners/"+act+"/"+gotoid;
}
}
</script>

<a href="<?php echo base_url();?>admin/media_library/add" class="btn btn-success"><i class="fa fa-plus"></i> Add banner</a>

<table id="example1" class="table table-bordered table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Page</th>	
    <th>Image</th>
    <th>Status</th>				
    <th>Action</th>				
  </tr>
</thead>
<tbody>

<?php $categories_count = 0; ?>
<?php foreach ($title as $b_key) { ?>
  <tr>
    <td><?php echo $categories_count = $categories_count + 1; ?></td>
    <td><?php echo ucwords(str_replace("_"," ",$b_key->page_name)); ?></td>
    <td>
      <?php if (isset($b_key) && isset($b_key->image)) { ?>
        <?php echo show_image($b_key,'image','','')?>
      <?php } ?>
    </td>
   <td><?php if($b_key->status=="1"){?>
			 <span class="label-success label label-default">	Active	</span>
				<?php }else{?>
		 <span class="label-danger label label-default"> Inactive</span>
				
				<?php }?>  </td>
    <td class="center">
      <ul class="nav navbar-right panel_toolbox">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" alt="Actions" title="Actions" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
           <li>
							<a href="<?php echo base_url();?>admin/banners/changestatus/<?php echo $b_key->id;?>">
								<?if($b_key->status=="1"){?>
								Mark Inactive	
								<?}else{?>
								Mark Active
								<?}?>
							</a>	
						</li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url();?>admin/banners/edit/<?php echo $b_key->id;?>" alt="Edit" title="Edit"><i class="fa fa-edit icon-white"></i></a>
        </li>
        <li>
           <a class="delbtn"  alt="Delete" title="Delete"  href="<?php echo base_url();?>admin/banners/delete/<?php echo $b_key->id;?>" onclick="return confirm('Click OK to confirm deletion.')"><i class="fa fa-trash "></i></a>	
        </li>
      </ul>
    </td>
  </tr>
<?php } ?>
</tbody>
