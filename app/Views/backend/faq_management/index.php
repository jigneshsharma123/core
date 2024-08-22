<?= $this->extend('backend/theme/_layouts/default') ?>

<?= $this->section('content') ?>
<div class="form-group pull-left">
  <a href="<?php echo base_url();?>/admin/faq_management/add" class="btn btn-warning"><i class="fa fa-plus"></i> Add Faq</a>
</div>
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>FAQ Group</th>
      <th>Question</th>
      <th>status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $faqs_count = 0; ?>
    <?php foreach ($faqManagement_list as $e_key) { ?>
    <tr>
      <td><?php echo $faqs_count = $faqs_count + 1; ?></td>
      <td><?php echo $e_key['name']; ?> </td> 
      <td><?php echo $e_key['question']; ?></td>
      <td> <?php if($e_key['is_active']=="1"){?>
      <span class="label-success label label-default">Active </span> 
      <?php  }else{?>
      <span class="label-danger label label-default">Inactive </span> 
      <?php } ?>
      </td>
      <td class="center">          
	<ul class="nav navbar-right panel_toolbox">      
	  <li>
	    <a href="<?php echo base_url('admin/faq_management/changestatus/'.$e_key['id']);?>">
	      <?php if($e_key['is_active']=="1"){?>
	      Mark Inactive
	      <?php }else{?>
	      Mark Active
	      <?php }?>
	    </a>
	  </li>
	  <li>
	    <a href="<?php echo base_url('admin/faq_management/edit/'.$e_key['id']);?>" alt="Edit" title="Edit"><i class="fa fa-edit icon-white"></i></a>
	  </li>
	  <li>
	    <a  href="<?php echo base_url('admin/faq_management/delete/'.$e_key['id']);?>" onclick="return confirm('Click OK to confirm deletion.')">
	      <i class="glyphicon glyphicon-trash icon-white"></i> 
	    </a>
	  </li>
	</ul>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php foreach ($faqManagement_list as $e_key){?>
<div class="modal fade loginBox" id="loginModal<?php echo $e_key['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color:#000">
  <div class="modal-dialog"  style="width:40%" role="document">
    <div class="modal-content">
      <div class="modal-header" >
          <h3 class="modal-title text-center" >Compose Tweet
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h3>
          
      </div>
      <form action="<?echo base_url();?>admin/faqs/send_tweet" method="POST" >
        <div class="modal-body loginForm">
          <div class="form-group">
            <textarea style="font-size:2em;" rows="5" class="form-control" placeholder="Tweet content" name="tweet_content"><?php //echo $e_key['title']?>&#013;<?php // echo base_url().'faqs/'.$e_key['slug']?></textarea>
          </div>
        </div>
        <div class="modal-footer">
            <div class="pull-right text-center">
                <button type="submit" class="btn btn-primary">Tweet It</button><br><br>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<?php }?>
<?= $this->endSection() ?>
