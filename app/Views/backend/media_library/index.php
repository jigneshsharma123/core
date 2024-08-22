<?= $this->extend('backend/theme/_layouts/default') ?>
<?= $this->section('content') ?>
<div class="col-lg-12">
  <div class="x_panel">
    <div class="box1">
      <div class="x_content">

        <div class="row">
        <?php echo form_open_multipart('/admin/media_library/do_upload');?>
        
         <div class="col-md-55"><input name="userfile[]" id="userfile" type="file" multiple="" /></div>
            <div class="col-md-55"><input type="submit" name="subupload" value="Upload"></div>
            
        <?php echo form_close() ?>
          <!--<form action="<?php echo base_url()?>admin/media_library/uploads" method="post" enctype="multipart/form-data">
            <div class="col-md-55"><input type="file" name="medias[]" id="medias" multiple=""></div>
            <div class="col-md-55"><input type="submit" name="subupload" value="Upload"></div>
          </form>-->
          <hr>
        </div>
        <div class="row">
        <?php foreach ($medias as $m){?>
           <div class="col-md-55">
          <div class="thumbnail">
            <div class="image view view-first">
            <?php $titles = explode("/",$m['media']); ?>
            <img style="width: 100%; display: block;" src="<?php echo base_url(); ?>/<?php echo $m['thumb'];?>" alt="<?php echo $titles[count($titles) - 1];?>" />
            <div class="mask">
              <p><?php echo $titles[count($titles) - 1];?></p>
              <div class="tools tools-bottom">
              <a href="<?php echo base_url();?>/admin/media_library/changestatus/<?php echo $m['id'];?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?=(isset($m['is_active']) and $m['is_active'] == 1) ? "Make Inactive" : "Make Active"?>"><i class="fa fa-eye <?=(isset($m['is_active']) and $m['is_active'] == 1) ? "text-success" : "text-danger"?>"></i></a>
              
              <!--<a href="<?php echo base_url();?>admin/media_library/mark_available/<?php echo $m['id'];?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?=(isset($m->mark_available) and $m->mark_available == 1) ? "Make Unavailable" : "Make Available"?>"><i class="fa fa-check <?=(isset($m->mark_available) and $m->mark_available == 1) ? "text-success" : "text-danger"?>"></i></a>-->
              
              <!-- <button data-toggle="modal" data-target="#mod_add_emp" data-backdrop="static" onclick="set_data(<?php echo $m['id']?>)"><i class="fa fa-edit text-primary"></i></button> -->
              
              <a href="<?php echo base_url();?>/admin/media_library/delete/<?php echo $m['id'];?>" onclick="return confirm('Click OK to confirm deletion.')" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash text-danger"></i></a>
            </div>
            </div>
            </div>
              <p style="color:black;text-align:center"><?php echo $m['media'];?></p>
           <!--<button style="margin:10px;" class="editmedia btn btn-primary btn-sm" mediaid="<?php echo $m['id']; ?>">
            Edit
          </button>-->
          </div>

          </div>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function set_data(imageid){
 // alert(id);
    $.ajax({
       
        url: "<?php echo base_url();?>admin/galleries/edit_image",
        type: "get",
        data: {imageid:imageid},
        success: function(resp){
            var obj = jQuery.parseJSON(resp);
            $("#id").val(obj.id);      
            $("#imagetitle").val(obj.title);
            $("#description").val(obj.description);
            $("#alt_tag").val(obj.image_alt_tag);
            $('#mod_add_emp').modal({
                backdrop: 'static'
              });
            $('#mod_add_emp').modal('show'); 
        },
        error:function(event, textStatus, errorThrown) {
            $("#myResponDeptLabel").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
        }
    });
}
</script>
 <div class="modal fade" id="mod_add_emp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content col-lg-6 col-md-offset-3">
      <form action="<?php echo  base_url()?>admin/galleries/imageupdate" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLocationLabel">
              <i class="fa fa-fw fa-user"></i>
             Edit Image Info
          </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xs-12">
                    <div id="myResponDeptLabel" class=" animated fadeInDown"></div>
                    </div>
                </div>
            </div>            
             <input type="hidden" class="form-control" id="id" name="id">
            <div class="row">
                <div class="col-lg-12">  
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="title">Title</label>
                        
                          
                            <input type="text" class="form-control" id="imagetitle" name="title" 
                                     placeholder="Enter Title Name" >
                         
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="alt_tag">Description</label>
                        
                           
                            <textarea class="form-control" id="description" name="description" 
                                     placeholder="Enter description" ></textarea>
                        
                        </div>
                    </div> 
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="alt_tag">Alt Tag</label>
                         
                            <input type="text" class="form-control" id="alt_tag" name="alt_tag" 
                                     placeholder="Enter alt tag" >
                          </div>
                      
                    </div> 
                </div>  
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true" onclick="cancel();">Cancel</button>
        </div>
        </form>
      </div>
    </div>
</div>
<?= $this->endSection() ?>

